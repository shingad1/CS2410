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

//Generates the routes required for the user authentication
Auth::routes();

//Routes to the home page, using the name 'home'
Route::get('/home', 'HomeController@index')->name('home');

//Routes to the index page, returned by the index function in the PageController
Route::get('/', 'PageController@index');

//Routes to the display page, returned by the display function in AnimalController
Route::get('/display','AnimalController@display')->name('display_animal');

//Routes to the userrequests page, returned by the RequestController user function
Route::get('/userrequests', 'RequestController@user')->name('userrequests');

//Specifies RequestController as a resource so that correct functions are triggered
Route::resource('adoptions', 'RequestController');

//Routes  to the /user page, using the viewuser function from AnimalController
Route::get('/user', 'AnimalController@viewuser')->name('user');

//Routes to the user/{animal} given the animal ID, using the function viewuser
Route::get('/user/{animal}','AnimalController@viewuser')->name('viewuser');

//Specifies AnimalController as a resource
Route::resource('user', 'AnimalController');

//Specifies the routes that are only accessible by an admin - used in middleware
Route::middleware(['auth','admin'])->group(function(){

  //Specify the AnimalController as a resource
  Route::resource('animals','AnimalController');

  //Routes to the /user url using the viewUser function found in the AnimalController
  Route::get('/user', 'AnimalController@viewuser')->name('user');

  //Routes to the show/{id} page, given the id, using the show function in the AnimalController
  Route::get('show/{id}', 'AnimalController@show')->name('showanimal');

  //Routes to the reuqests page using the index function in the RequestController
  Route::get('/requests', 'RequestController@index')->name('requests');
});
