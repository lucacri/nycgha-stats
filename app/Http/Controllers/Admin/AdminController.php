<?php namespace Stats\Http\Controllers\Admin;

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
	 * @return Response
	 */
	public function index() {
		return view('admin.index');
	}

}
