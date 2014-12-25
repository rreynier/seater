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

Route::get('/', 'SeatsController@index');

Route::post('/seats/reserve', 'SeatsController@reserveSeat');

Route::get('login', array(
    'uses' => 'SessionsController@create',
    'as' => 'sessions.create'
));

Route::post('login', array(
    'uses' => 'SessionsController@store',
    'as' => 'sessions.store'
));

Route::get('logout', array(
    'uses' => 'SessionsController@destroy',
    'as' => 'sessions.destroy'
));

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {
    Route::get('/', 'Controller\\Admin\\SeatsController@index');
    Route::post('/seats/unreserve/{id}', 'Controller\\Admin\\SeatsController@unreserveSeat');
    Route::resource('codes', 'Controller\\Admin\\CodesController');
    Route::resource('seats', 'Controller\\Admin\\SeatsController');
});

