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
// 〜〜〜〜〜〜〜〜〜〜〜
Route::get('stamp', 'StampController@stamp' , function() {
    // 認証済みのユーザーのみが入れる
	return view('stamp');
})->middleware('auth');
// 〜〜〜〜〜〜〜〜〜〜〜


// 〜〜〜〜〜〜〜〜〜〜〜
Route::get('top', function () {
    return view('top');
});
// 〜〜〜〜〜〜〜〜〜〜〜


// 〜〜〜〜〜〜〜〜〜〜〜
Route::get('/record', 'RecordController@record')->name('record');
Route::get('record', 'RecordController@model');
// 〜〜〜〜〜〜〜〜〜〜〜


// 〜〜〜〜〜〜〜〜〜〜〜
Route::get('/database', function() {
    var_dump(((array) DB::select('SELECT database();')[0])['database()']);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// 〜〜〜〜〜〜〜〜〜〜〜〜





// 〜〜〜〜〜お試し〜〜〜〜〜〜
Route::post('/stamp', 'stampsController@punchIn')->name('stamp/punchin');
Route::post('/stamp', 'stampsController@punchOut')->name('stamp/punchout');
// 〜〜〜〜〜〜〜〜〜〜〜