<?php namespace Stats\Http\Controllers\Admin;

use Illuminate\Contracts\Auth\Guard;
use Stats\Http\Controllers\Response;
use Stats\Http\Requests;
use Stats\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param Guard $auth
	 * @return Response
	 */
	public function index(Guard $auth) {
		if ($auth->user()->admin == FALSE) {
			return redirect()->route('admin.scores.index');
		}

		return view('admin.index');
	}

}
