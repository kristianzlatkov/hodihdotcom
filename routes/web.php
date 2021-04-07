<?php

use Illuminate\Support\Facades\Route;


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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'Modules\Index\Http\Controllers\IndexController@index');
Route::get('/attractions/{slug}','Modules\Pages\Http\Controllers\PagesController@showArticle');
Route::view('/gallery','pages::gallery');
Route::view('/history','pages::history');
Route::view('/contact','pages::contact');
Route::get('/news','Modules\Pages\Http\Controllers\PagesController@showAllNews');
Route::get('/news/{slug}','Modules\Pages\Http\Controllers\PagesController@showNewsArticle');

