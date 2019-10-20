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

Route::get('hello', 'HelloController@hello');
Route::get('stamp', 'StampController@stamp');
Route::get('request', 'RequestController@index');


Route::get('/database', function() {
    var_dump(((array) DB::select('SELECT database();')[0])['database()']);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
