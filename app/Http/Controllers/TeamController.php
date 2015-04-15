<?php namespace Stats\Http\Controllers;

use Illuminate\Support\Collection;
use Stats\Calculators\PlayerWithGames;
use Stats\Http\Requests;
use Stats\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Stats\Calculators\StatCalculator;
use Stats\Team;

class TeamController extends Controller
{

	public function show(Team $team) {
		$currentSeason = $this->createOrderedStatCollection($team->currentSeason);

		$allSeasons = $this->createOrderedStatCollection($team->allSeasons);

		return view('team')
			->with('team', $team)
			->with('currentSeason', $currentSeason)
			->with('allSeasons', $allSeasons);
	}

	private function createOrderedStatCollection($rosterInfo) {
		$players = new Collection();

		foreach ($rosterInfo as $roster) {
			if ($players->has($roster->person->main_id) == FALSE) {
				$players->put($roster->person->main_id, new PlayerWithGames($roster->person, $roster->playerStat));
			} else {
				$personStats = $players->get($roster->person->main_id);
				$personStats->games = $personStats->games->merge($roster->playerStat);
				$players->put($roster->person->main_id, $personStats);
			}
		}

		$season = new Collection();
		foreach ($players as $rosterData) {
			$season->push(new StatCalculator($rosterData->person, $rosterData->games));
		}

		$season = $season->sortByDesc('points');

		return $season;
	}


}
