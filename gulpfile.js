var elixir = require('laravel-elixir');
require('laravel-elixir-rename');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */


require('laravel-elixir-livereload');

elixir(function (mix) {
	mix.livereload(['app/**/*', 'public/**/*', 'resources/views/**/*', 'resources/assets/js/**/*', 'resources/assets/sass/**/*']);

	mix.copy('resources/assets/bower_components/bootstrap-sass/assets/fonts/bootstrap', 'public/fonts');
	mix.copy('resources/assets/bower_components/fontawesome/fonts', 'public/fonts');

	mix.styles([
		'bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css'
	], 'resources/assets/dist/css/otherCss', 'resources/assets');
	mix.rename('./resources/assets/dist/css/otherCss/all.css', '_otherCss.scss', './resources/assets/sass');

	mix.scripts([
		"bower_components/jquery/dist/jquery.js",
		'bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
		"bower_components/moment/moment.js",
		"bower_components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js",
		"js/*.js",
	], 'public/js/site.min.js', 'resources/assets');


	mix.sass();
});
