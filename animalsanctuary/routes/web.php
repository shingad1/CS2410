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

//List all of the animals
Route::get('list', 'AnimalController@listAll');
//List a specific animal, given it's ID (URL)
Route::get('show/{id}', 'AnimalController@show');

//User authentication routes
Auth::routes();
//Assign the home url to the home controller
Route::get('/home', 'HomeController@index')->name('home');
