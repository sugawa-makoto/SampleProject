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

Route::get('/stamp', 'StampController@stamp');
Route::post('/stamp_in', 'StampController@in');
Route::post('/stamp_out', 'StampController@out');
Route::post('/calendar_update', 'CalendarController@update');
Route::post('/weekend_cleate', 'WeekendController@weekend_cleate');

Route::post('/yasumi', 'YasumiController@yasumi');

Route::get('/onsite_select', 'OnsiteController@select');
// フォームアクセス時のルーティング
Route::get('/onsite_form', 'OnsiteController@index');
// フォーム送信時のルーティング
Route::post('/onsite_form', 'OnsiteController@receiveData');
Route::get('/onsite_list', 'OnsiteController@list');
Route::post('/onsite_list_delete/{id}', 'OnsiteController@delete');
Route::get('/onsite_list_show/{id}', 'OnsiteController@show');
Route::get('/onsite_list_edit/{id}', 'OnsiteController@edit');
Route::post('/onsite_list_update/{id}', 'OnsiteController@update');
Route::post('/upload', 'PostsController@upload');
Route::get('/onsite_photo_list', 'PhotoController@photo_list');
Route::get('/onsite{id}', 'PhotoController@photo_detail');

Route::get('/top', 'TopController@top');

Route::get('/record', 'RecordController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/database', function() {
    var_dump(((array) DB::select('SELECT database();')[0])['database()']);
});
Auth::routes();