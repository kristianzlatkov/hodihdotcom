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


Route::prefix('contact')->as('contact.')->group(function() {
    Route::get('/','ContactController@show')->name('index');
    Route::post('/send','ContactController@sendMessage')->name('send');
});

