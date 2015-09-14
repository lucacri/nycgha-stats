<?php namespace Stats\Http\Controllers\Admin\Godmode;

use Stats\Http\Controllers\Admin\Response;
use Stats\Http\Requests;

use Illuminate\Http\Request;
use Stats\Http\Requests\CreateUserRequest;
use Stats\Http\Requests\UpdateUserRequest;
use Stats\User;

class UsersController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return view('admin.user.index')->withUsers(User::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('admin.user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateUserRequest $request
	 * @return Response
	 */
	public function store(CreateUserRequest $request) {

		$user = User::create($request->all());
		\Flash::success("User created");

		return redirect()->route('admin.user.index');

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param User $user
	 * @return Response
	 */
	public function edit(User $user) {
		return view('admin.user.edit')->withUser($user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateUserRequest $request
	 * @param User              $user
	 * @return Response
	 */
	public function update(UpdateUserRequest $request, User $user) {

		$user->admin = $request->has('admin');
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		if ($request->get('password', '') != '') {
			$user->password = $request->get('password');
		}
		$user->manages_team_id = $request->get('manages_team_id');

		$user->save();
		\Flash::success("User updated");

		return redirect()->route('admin.user.index');
	}

	public function loginAs(User $user) {
		auth()->login($user);

		return redirect()->action('WelcomeController@index');
	}

}
