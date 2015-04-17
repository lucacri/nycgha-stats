<?php namespace Stats\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Collection;
use Stats\Game;
use Stats\Http\Controllers\Controller;
use Stats\Http\Requests;

use Illuminate\Http\Request;
use Stats\Http\Requests\UpdateScoresRequest;
use Stats\PlayerStat;
use Stats\Season;
use Stats\Team;

class ScoresController extends Controller
{

	/**
	 * @var Guard
	 */
	private $auth;

	public function __construct(Guard $auth) {
		$this->auth = $auth;
	}

	public function index(Request $request) {
		$team = $this->auth->user()->managedTeam;


		$seasons = $team->seasons()->sortByDesc('season_id');


		if ($request->has('season_id')) {
			$season = Season::findOrFail($request->get('season_id'));
		} else {
			$season = $seasons->first();
		}

		if ($request->has('game_id')) {
			$game = Game::where('ghateam_id', $this->auth->user()->manages_team_id)
						->where('game_id', $request->get('game_id'))
						->firstOrFail();
		} else {
			$game = Game::where('ghateam_id', $team->team_id)
						->where('season_id', $season->season_id)
						->where('datetime', '<', Carbon::now())
						->orderBy('datetime', 'desc')
						->first();
		}

		$games = Game::where('datetime', '<', Carbon::now())
					 ->where('ghateam_id', $team->team_id)
					 ->where('season_id', $season->season_id)
					 ->orderBy('datetime', 'desc')
					 ->get();


		$roster = $team->roster()
					   ->with('playerRole', 'person')
					   ->where('season_id', $season->season_id)
					   ->get()
					   ->sortBy('person.fname');

		$players = $this->getPlayersWithStats($game, $roster);


		return view('admin.scores.select')
			->withSeason($season)
			->withSeasons($seasons)
			->withGames($games)
			->withGame($game)
			->withTeam($team)
			->withPlayers($players);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateScoresRequest $request
	 * @param Season              $season
	 * @param Game                $game
	 * @return Response
	 */
	public function update(UpdateScoresRequest $request, Season $season, Game $game) {
		$game->fill($request->only(['goalsagainst', 'overtimestatus', 'playoffflag']));
		$game->save();

		foreach ($request->get('player') as $roster_id => $roster) {
			$stat = PlayerStat::where('game_id', $game->game_id)->where('roster_id', $roster_id)->first();
			$this->updateStat($game, $stat, $roster_id, $roster);

		}
		\Flash::success("Game information updated");

		return redirect()->route('admin.scores.index',
								 ['season_id' => $season->season_id, 'game_id' => $game->game_id]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

	/**
	 * @param Game $game
	 * @param      $stat
	 * @param      $roster_id
	 * @param      $roster
	 */
	private function updateStat(Game $game, $stat, $roster_id, $roster) {

		if ($stat && !isset($roster['played'])) {
			$stat->delete();

			return;
		}

		if (!$stat) {
			$stat = new PlayerStat();
			$stat->game_id = $game->game_id;
			$stat->roster_id = $roster_id;
		}

		$stat->goals = intval($roster['goals']);
		$stat->assists = intval($roster['assists']);
		$stat->penaltyminutes = intval($roster['penaltyminutes']);
		$stat->save();

	}

	/**
	 * @param $game
	 * @param $roster
	 * @return Collection
	 */
	private function getPlayersWithStats($game, $roster) {
		$players = new Collection();
		if ($game) {
			foreach ($roster as $player) {
				$stat = PlayerStat::where('game_id', $game->game_id)->where('roster_id', $player->roster_id)->first();
				$player->stat = $stat;

				$players->push($player);
			}

			return $players;
		}

		return $players;
	}

}
