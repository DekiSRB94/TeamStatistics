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

Route::get('/', 'TeamController@index');


Route::get('/index', 'TeamController@index');
Route::get('/blog/create', 'TeamController@create_blog');
Route::post('/blog', 'TeamController@store_blog');
Route::get('/show/blog/{blog_id}', 'TeamController@show_blog');
Route::get('/team/{blog_id}/edit_blog', 'TeamController@edit_blog');
Route::patch('/update_blog/{blog_id}', 'TeamController@update_blog');
Route::delete('/blog/{blog_id}', 'TeamController@destroy_blog');
Route::post('/comment/{blog_id}', 'TeamController@store_comment');
Route::delete('/comment/{comment_id}/{blog_id}', 'TeamController@delete_comment');
Route::get('/reply/create/{comment_id}/{blog_id}', 'TeamController@create_reply');
Route::post('/reply/{comment_id}/{blog_id}', 'TeamController@store_reply');
Route::delete('/reply/{reply_id}/{blog_id}', 'TeamController@destroy_reply');

Route::resource('/players', 'PlayerController');
Route::get('/player/{player_id}/edit_informations', 'PlayerController@edit_informations');
Route::patch('/informations/{player_id}', 'PlayerController@update_informations');
Route::post('/show/statistics/{player_id}', 'PlayerController@show_statistics');
Route::get('/player/{player_id}/create_statistics', 'PlayerController@create_statistics');
Route::post('/statistics/{player_id}', 'PlayerController@store_statistics');
Route::get('/player/{player_id}/{competition_name}/{year}/edit_statistics', 'PlayerController@edit_statistics'); //da se uradi
Route::patch('/statistics/{player_id}/{competition_name}/{year}', 'PlayerController@update_statistics'); //da se uradi


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');
