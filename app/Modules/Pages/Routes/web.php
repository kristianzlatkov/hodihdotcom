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
Route::get('/blog/attractions/{slug}','PagesController@returnSingleAttraction');
Route::get('/blog/news','PagesController@returnAllNews');
Route::get('/blog/news/{slug}','PagesController@returnSingleNewsArticle');
Route::get('/blog/attractions','PagesController@returnAllAttractions');
//Route::get('/blog/news','PagesController@returnNewsAllArticles');
//Route::get('/whatisnew/{slug}','PagesController@showNewsArticle');

