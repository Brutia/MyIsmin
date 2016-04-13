<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Assos;
use App\Clubs;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	$clubsNames = new Clubs();
    	$clubsNames = $clubsNames->getClubsNames();
    	$assosNames = new Assos();
    	$assosNames = $assosNames->getAssos();
    	view()->share('clubs', $clubsNames);
    	view()->share('assos', $assosNames);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
