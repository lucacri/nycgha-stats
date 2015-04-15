<?php namespace Stats\Http\Controllers\Admin\Godmode;

use Stats\Http\Requests;
use Illuminate\Http\Request;
use Stats\Http\Requests\RemovePlayerFromRosterRequest;
use Stats\Roster;
use Stats\Season;
use Stats\Team;

class RosterController extends Controller
{

	/**
	 * Display the specified resource.
	 *
	 * @param Team   $team
	 * @param Season $season
	 * @return Response
	 */
	public function show(Team $team, Season $season) {
		$seasons = Season::orderBy('season_id', 'desc')->get();
		$roster = $team->roster()->with('person', 'playerRole', 'playerStatus')->season($season)->get();

		return view('admin.team.roster')
			->withTeam($team)
			->withSeason($season)
			->withSeasons($seasons)
			->withRoster($roster);
	}

	public function removePlayer(RemovePlayerFromRosterRequest $request, Team $team, Season $season) {
		$rosterLine = $team->roster()->season($season)->where('roster_id', $request->get('roster_id'))->firstOrFail();

		$rosterLine->delete();

		\Flash::success("Player removed");

		return redirect()->route('team.roster.index', [$team, $season]);
	}

	/**
	 * @param Requests\AddPlayerToRosterRequest $request
	 * @param Team                              $team
	 * @param Season                            $season
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function addPlayer(Requests\AddPlayerToRosterRequest $request, Team $team, Season $season) {
		$rosterLine = $team->roster()->season($season)->where('main_id', $request->get('main_id'))->first();
		if($rosterLine){
			\Flash::error("Player already present");
			return redirect()->route('team.roster.index', [$team, $season]);
		}

		$input = $request->all();
		$input['season_id'] = $season->season_id;

		$team->roster()->save(new Roster($input));

		\Flash::success("Player added");

		return redirect()->route('team.roster.index', [$team, $season]);
	}

}
