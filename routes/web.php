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
Route::get('/history', 'HomeController@history')->name('history');
Route::post('/book_room', 'HomeController@bookRoom')->name('user.rooms.book');
Route::get('/user/history/{historyId}', 'HomeController@showHistory')->name('user.history.show');

Route::group(array('middleware' => ['auth', 'admin']), function ()
{
    Route::get('/rooms', 'RoomController@index')->name('rooms.index');
    Route::get('/rooms/create', 'RoomController@create')->name('rooms.create');
    Route::post('/rooms', 'RoomController@store')->name('rooms.store');
    Route::get('/rooms/{room}/edit', 'RoomController@edit')->name('rooms.edit');
    Route::put('/rooms/{room}', 'RoomController@update')->name('rooms.update');
    Route::delete('/rooms/{room}', 'RoomController@destroy')->name('rooms.destroy');


    // Route::resource('room_types', 'RoomTypeController');

    Route::get('/room_types', 'RoomTypeController@index')->name('room_types.index');
    Route::get('/room_types/create', 'RoomTypeController@create')->name('room_types.create');
    Route::post('/room_types', 'RoomTypeController@store')->name('room_types.store');
    Route::get('/room_types/{roomType}/edit', 'RoomTypeController@edit')->name('room_types.edit');
    Route::put('/room_types/{roomType}', 'RoomTypeController@update')->name('room_types.update');
    Route::delete('/room_types/{roomType}', 'RoomTypeController@destroy')->name('room_types.destroy');



    // Route::get('/transactions', 'TransactionController@index')->name('transactions.index');
    Route::get('/transactions/report', 'TransactionController@report')->name('transactions.report');
    Route::resource('transactions', 'TransactionController');

});


