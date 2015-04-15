<?php namespace Stats\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Stats\Game;
use Stats\Person;
use Stats\Season;
use Stats\Team;
use Stats\User;

class RouteServiceProvider extends ServiceProvider
{

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'Stats\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 * @return void
	 */
	public function boot(Router $router) {
		parent::boot($router);

		$router->bind('teamname',
			function ($value) {
				$unslug = str_replace('-', ' ', $value);

				return Team::where('teamname', $unslug)->firstOrFail();
			});

		$router->model('team', Team::class);
		$router->model('season', Season::class);
		$router->model('user', User::class);
		$router->model('person', Person::class);
		$router->model('game', Game::class);
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 * @return void
	 */
	public function map(Router $router) {
		$router->group(['namespace' => $this->namespace],
			function ($router) {
				require app_path('Http/routes.php');
			});
	}

}
