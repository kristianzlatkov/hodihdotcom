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
Route::get('/attractions','PagesController@returnAllAttractions');// Атракции
Route::get('/attractions/{slug}','PagesController@returnSingleAttraction');// Статия за атракция
Route::get('/news','PagesController@returnAllNews');// Новини
Route::get('/news/{slug}','PagesController@returnSingleNewsArticle');// Статия за новина
Route::get('/new','PagesController@returnAllWhatIsNewArticles');// Ново
Route::get('/new/{slug}','PagesController@returnSingleWhatIsNewArticle');// Статия от страница 'Ново'

