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
Route::get('/attractions','PagesController@returnAllArticles');// Атракции
Route::get('/attractions/{slug}','PagesController@returnSingleArticle');// Статия за атракция
/*Route::get('/news','PagesController@returnAllNews');// Новини
Route::get('/news/{slug}','PagesController@returnSingleNewsArticle');// Статия за новина*/

Route::prefix('news')->as('news.')->group(function() {
    Route::get('/','PagesController@returnAllArticles')->name('index');//Новини
    Route::get('/{slug}', 'PagesController@returnSingleArticle')->name('view');// Статия за новина
});

Route::get('/new','PagesController@returnAllArticles');// Ново
Route::get('/new/{slug}','PagesController@returnSingleArticle');// Статия от страница 'Ново'

