<?php namespace Stats\Http\Controllers;

use Stats\Team;

class WelcomeController extends Controller
{

	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(Team $team) {

		$teams = Team::where('active', TRUE)->orderBy('team_id', 'asc')->get();

		return view('welcome')->with(['teams' => $teams]);
	}

}
