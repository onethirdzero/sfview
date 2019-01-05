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

// Catch-all route from: https://blog.pusher.com/why-vuejs-laravel/
// This takes precedence over all other routes, effectively rendering them
// inaccessible.
// ->where() is used with regular expression constraints on routes.
// https://laravel.com/docs/5.7/routing#parameters-regular-expression-constraints
Route::get('/{any}', function(){
        return view('vueapp');
})->where('any', '.*');

Route::get('/locations', 'HomeController@locations')->name('locations');
Route::get('/upload', 'HomeController@upload')->name('upload');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/help', 'HomeController@help')->name('help');
Route::get('/panorama/{wildcard_filename}', 'HomeController@panorama')->name('panorama');
