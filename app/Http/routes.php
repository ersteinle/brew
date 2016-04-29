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
    return view('home', ['menuSelect' => 0]);
});

//Dashboard
Route::get('dashboard', [ 'as' => 'dashboard', 'uses' => 'DashboardController@index'], ['editable' => 0])->middleware('auth');

//Dashboard Editable
Route::post('dashboard', function () {
    return view('dashboard', ['menuSelect' => -1, 'editable' => 1]);
})->middleware('auth');

//Dashboard Put Edit
Route::put('dashboard', 'DashboardController@update')->middleware('auth');

Route::get('subscribe', function() {
    return view('subscribe', ['menuSelect' => 5]);
});

//Events
Route::match(['get', 'post'],'events/{edit?}', [ 'as' => 'events', 'uses' => 'EventsController@index']);

//Form For Adding Event
Route::get('addEvent', function() {
    return view('addEvent', ['menuSelect' => 1]);
})->middleware('auth');

//Submit new events
Route::post('addEvent', 'EventsController@create');

//Edit Event Form
Route::post('editEvent', ['middleware' => 'editEvent', 'uses' => 'EventsController@edit']);

//Update Event
Route::put('editEvent', ['middleware' => 'editEvent', 'uses' => 'EventsController@update']);

//Delete Event
Route::delete('editEvent', ['middleware' => 'editEvent', 'uses' => 'EventsController@delete']);

//About page
Route::get('about', function() {
    return view('about',['menuSelect' => 3]);
});

//New Releases
Route::get('releases', 'ReleasesController@index');

Route::auth();

Route::get('/home', 'HomeController@index');


//Staggered Events
Route::get('events2', function() {
    return view('events2', ['menuSelect' => 1]);
});