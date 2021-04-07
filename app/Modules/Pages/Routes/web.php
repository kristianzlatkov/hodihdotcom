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


Route::get('/attractions/{slug}','PagesController@showArticle');
Route::view('/gallery','pages::gallery');
Route::view('/contact','pages::contact');
Route::view('/history','pages::history');
Route::get('/news','PagesController@showAllNews');
Route::get('/news/{slug}','PagesController@showNewsArticle');
Route::get('/whatisnew','PagesController@whatIsNewAllArticles');
Route::get('/whatisnew/{slug}','PagesController@showNewsArticle');
Route::prefix('pages')->group(function() {
    Route::get('/', 'PagesController@index');
});
