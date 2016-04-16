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
    return view('welcome', ['banner'=>null, 'content_header'=>'Le site des élèves Ismin']);
});

Route::get('/formation', function(){
	return view('formation', ['banner'=>null, 'content_header'=>'Formation ingénieur en 3 ans']);
});

Route::get('/calendrier', function(){
	return view('calendar', ['banner'=>null, 'content_header'=>null]);
});


Route::get('/eco-campus', function(){
	return view('ecocampus', ['banner'=>null, 'content_header'=>'Campus provence, campus écolo!']);
});

Route::get('/admin', function(){
	return view('admin.test');
});

Route::auth();

Route::resource('article', 'ArticleController');
