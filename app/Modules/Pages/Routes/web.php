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


Route::get('/attractions/{slug}','PagesController@showAttraction');
Route::get('/news','PagesController@showAllNews');
Route::get('/news/{slug}','PagesController@showNewsArticle');
Route::get('/whatisnew','PagesController@whatIsNewAllArticles');
Route::get('/whatisnew/{slug}','PagesController@showNewsArticle');
Route::prefix('pages')->group(function() {
    Route::get('/', 'PagesController@index');
});
Route::get('/history','PagesController@showHistoryPage');
Route::get('/about','PagesController@showAboutPage');
