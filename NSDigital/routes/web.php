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

Route::get('/', function () {
    return view('welcome');
});

//Primary Routes
Route::get('/login', 'Auth\LoginController@index');
Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');
Route::get('/artists', 'Dashboard\ArtistController@index')->name('artists');
Route::get('/albuns', 'Dashboard\AlbumController@index')->name('albuns');
Route::get('/album', 'Dashboard\AlbumController@viewAlbum')->name('album');
