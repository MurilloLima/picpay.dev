<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('conta/store/', 'HomeController@store')->name('conta.store');
Route::get('conta/delete/{id}', 'HomeController@delete')->name('conta.delete');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
