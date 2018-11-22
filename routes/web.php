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

// Route::get('/', function () {
//     return view('index');
// });

Auth::routes();

// name() creates a named route, which can be used for
// conveniently generating URLs for that route.
Route::get('/', 'HomeController@index')->name('home');
Route::get('/locations', 'HomeController@locations')->name('locations');
Route::get('/upload', 'HomeController@upload')->name('upload');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/help', 'HomeController@help')->name('help');
Route::get('/panorama/{wildcard_filename}', 'HomeController@panorama')->name('panorama');
