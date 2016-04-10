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

Route::get('/', function () {
    return view('welcome', ['banner'=>null]);
});

Route::get('/formation', function(){
	return view('formation', ['banner'=>null]);
});

Route::get('/calendrier', function(){
	return view('calendar', ['banner'=>null]);
});

Route::get('/articles/{article_name}', 'ArticleController@display');
	
