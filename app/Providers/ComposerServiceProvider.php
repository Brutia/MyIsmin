<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Clubs;
use App\Assos;

class ComposerServiceProvider extends ServiceProvider
{
	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Using class based composers...
// 		view()->composer(
// 				'profile', 'App\Http\ViewComposers\ProfileComposer'
// 				);

		// Using Closure based composers...
		view()->composer('common.*', function ($view) {
			$clubsNames = Clubs::all();
			$assosNames = Assos::all();
			view()->share('clubs', $clubsNames);
			view()->share('assos', $assosNames);
		});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}