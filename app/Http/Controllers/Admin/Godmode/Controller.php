<?php  namespace Stats\Http\Controllers\Admin\Godmode; 

class Controller extends \Stats\Http\Controllers\Controller
{
	public function __construct() {
		$this->middleware('auth.god');
	}
}
