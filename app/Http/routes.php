<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::controllers([
					   'auth'     => 'Auth\AuthController',
					   'password' => 'Auth\PasswordController',
				   ]);

Route::get('team/{teamname}', ['as' => 'team', 'uses' => "TeamController@show"]);

Route::group(['prefix' => 'admin', 'namespace' => "Admin", 'before' => 'auth'],
	function () {
		Route::get('/', 'AdminController@index');
		Route::get('scores', ['as' => 'admin.scores.index', 'uses' => "ScoresController@index"]);
		Route::post('scores/season/{season}/game/{game}',
				   ['uses' => 'ScoresController@update', 'as' => 'admin.scores.update']);

		Route::group(['namespace' => 'Godmode', 'before' => 'auth.god'],
			function () {
				Route::resource('user', 'UsersController');
				Route::resource('person', 'PersonController');
				Route::resource('team', 'TeamController');
				Route::resource('game', 'GameController');

				Route::get('team/{team}/season/{season}/roster',
						   ['uses' => 'RosterController@show', 'as' => 'team.roster.index']);
				Route::post('team/{team}/season/{season}/roster/add',
							['uses' => 'RosterController@addPlayer', 'as' => 'team.roster.addplayer']);
				Route::post('team/{team}/season/{season}/roster/remove',
							['uses' => 'RosterController@removePlayer', 'as' => 'team.roster.removeplayer']);
			});
	});


