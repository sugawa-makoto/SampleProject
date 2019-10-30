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

Route::get('stamp', 'StampController@stamp');
Route::get('top', 'TopController@top');
Route::get('record', 'RecordController@record')->name('record');
Route::get('record', 'RecordController@model');
Route::get('home', 'HomeController@index')->name('home');


Route::get('/database', function() {
    var_dump(((array) DB::select('SELECT database();')[0])['database()']);
});
Auth::routes();




