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
/*
Route::get('/', 'SitesController@index');
Route::get('/about','SitesController@about');
Route::get('contact','SitesController@contact');
*/
Route::resource('articles','ArticlesController');
/*
Route::get('/articles','ArticlesController@index');
Route::get('/articles/create','ArticlesController@create');
Route::get('/articles/{id}','ArticlesController@show');
Route::post('/articles','ArticlesController@store');
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
