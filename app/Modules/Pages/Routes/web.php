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

Route::prefix('/pages')->group(function() {
    Route::get('/{slug}','PagesController@showStaticPage');
});
Route::get('/attractions','PagesController@returnAllAttractions');
Route::get('/attractions/{slug}','PagesController@returnSingleAttraction');
Route::get('/news','PagesController@returnAllNews');
Route::get('/news/{slug}','PagesController@returnSingleNewsArticle');
//Route::get('/whatisnew/{slug}','PagesController@showNewsArticle');

