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

Route::get('/', 'PhotoController@index' );

Route::get('/photos/create', 'PhotoController@create');

Route::resource('/photos', 'PhotoController');

Route::get('/photos/search', 'PhotoController@search');

Route::get('/photos/search-process', 'PhotoController@searchProcess');

Route::get('/photos/{photo}/delete', 'PhotoController@delete');

Auth::routes();

Route::get('/show-login-status', function () {
    $user = Auth::user();

    if ($user) {
        dump('You are logged in.', $user->toArray());
    } else {
        dump('You are not logged in.');
    }

    return;
});