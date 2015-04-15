<?php namespace Stats\Http\Controllers\Admin\Godmode;

use Stats\Http\Requests;

use Illuminate\Http\Request;
use Stats\Http\Requests\EditTeamRequest;
use Stats\Season;
use Stats\Team;

class TeamController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$lastSeason = Season::orderBy('season_id', 'desc')->first();

		return view('admin.team.index')->withTeams(Team::orderBy('active', 'desc')
													   ->orderBy('teamname', 'asc')
													   ->paginate(20))
									   ->with(['lastSeason' => $lastSeason]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('admin.team.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param EditTeamRequest $request
	 * @return Response
	 */
	public function store(EditTeamRequest $request) {
		Team::create($request->all());
		\Flash::success("Team created");

		return redirect()->route('admin.team.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Team $team
	 * @return Response
	 */
	public function edit(Team $team) {
		return view('admin.team.edit')->withTeam($team);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param EditTeamRequest $request
	 * @param Team            $team
	 * @return Response
	 */
	public function update(EditTeamRequest $request, Team $team) {
		$data = $request->all();

		if (!isset($data['active'])) $data['active'] = FALSE;

		$team->fill($data);
		$team->save();
		\Flash::success("Team updated");

		return redirect()->route('admin.team.index');
	}

}
