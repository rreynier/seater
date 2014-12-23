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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('login', array(
    'uses' => 'SessionController@create',
    'as' => 'session.create'
));

Route::post('login', array(
    'uses' => 'SessionController@store',
    'as' => 'session.store'
));

Route::get('logout', array(
    'uses' => 'SessionController@destroy',
    'as' => 'session.destroy'
));

Route::group(array('before' => 'auth'), function() {
    Route::resource('code', 'CodeController');
});

