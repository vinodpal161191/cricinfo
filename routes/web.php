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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function (){
	Route::resource('teams', 'TeamController');
	Route::resource('players', 'PlayerController');
	Route::resource('matches', 'MatchController');
	Route::resource('points', 'PointsTableController');
	Route::get('image-factory/{path}', [
	    'as' => 'image_factory',
	    'uses' => 'ImageFactoryController@show'
	])->where('path', '.+');
});
