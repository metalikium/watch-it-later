<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * HOMEPAGE
 */
Route::get('/', function()
{
	/* test
	$movies = Movie::all();
	return Response::json($movies);
	*/
	return View::make('index');
});




/**
 * FORM
 */
Route::get('/add-movie', function() {
	return View::make('form-add-movie');
});

Route::get('/add-movie-api', function() {
	return View::make('form-add-movie-api');
});


/**
 * API ROUTES
 */
Route::group(array('prefix' => 'api'), function()
{
	// since we will be using this just for CRUD, we won't need create and edit
	// Angular will handle both of those forms
	// this ensures that a user can't access api/create or api/edit when there's nothing there
	Route::resource('movies', 'MovieController',
		array('except' => array('create', 'edit', 'update')));

	Route::post('movies/poster', 'MovieController@moviePoster');
});



/**
 * CATCH ALL ROUTE
 */
App::missing(function($exception)
{
	// all routes that are not home or api will be redirected to the frontend
	// this allows angular to route them
	return View::make('index');
});