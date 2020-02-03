<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@home');
Route::get('/tutorials', 'PagesController@tutorials');
Route::get('/installations', 'PagesController@installations');


/*

	GET /commands (index)
	GET /commands/create (index)
	GET /commands/1 (show)

	GET /commands/1/edit (edit)
	PATCH /commands/1/ (update)

	POST /commands (store)
	DELETE

*/


/*
	Alternative approach if we were to create the above RESTful endpoints.  BUT the end points for the controller is already predetermind.

	php artisan route::list
*/

// Route::resource('commands','PagesController');

// Standard basic approach
Route::get('/commands', 'PagesController@commands');
Route::get('/commands/create', 'PagesController@commandsCreate');
Route::get('/commands/{command}', 'PagesController@commandsShow');
Route::post('/commands', 'PagesController@commandsStore');
Route::get('/commands/{command}/edit', 'PagesController@commandsEdit');
Route::patch('/commands/{command}', 'PagesController@commandsUpdate');
Route::delete('/commands/{id}', 'PagesController@commandsDelete');

Route::post('/commands/{command}/authors', 'CommandAuthorController@store');

Route::get('/authors', 'PagesController@showauthors');



Route::get('/about', 'PagesController@about');
