<?php namespace Stats\Http\Controllers\Admin\Godmode;

use Stats\Game;
use Stats\Http\Requests;

use Illuminate\Http\Request;
use Stats\Season;

class GameController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return view('admin.game.index')->withGames(Game::with('ghaTeam', 'otherTeam', 'season')
													   ->orderBy('datetime', 'desc')
													   ->paginate(25));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('admin.game.create')->withSeasons($this->makeSeasonsArray());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\EditGameRequest $request) {
		$game = Game::create($request->all());
		\Flash::success("Game created");

		return redirect()->route('admin.game.edit', [$game]);
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
	 * @param Game $game
	 * @return Response
	 */
	public function edit(Game $game) {
		return view('admin.game.edit')->withGame($game)->withSeasons($this->makeSeasonsArray());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Requests\EditGameRequest $request
	 * @param Game                     $game
	 * @return Response
	 */
	public function update(Requests\EditGameRequest $request, Game $game) {
		$game->fill($request->all());
		$game->save();
		\Flash::success("Game updated");

		return redirect()->route('admin.game.edit', [$game]);
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
	 * @return array
	 */
	private function makeSeasonsArray() {

		$seasons = [];

		foreach (Season::orderBy('season_id', 'desc')->get() as $season_now) {
			$seasons[$season_now->season_id] = $season_now->year . " " . $season_now->season;
		}

		return $seasons;
	}

}
