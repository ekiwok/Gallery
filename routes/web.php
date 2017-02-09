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

Route::get('/', 'GalleryController@showAlbums');
Route::get('/album/{uuid}', 'AlbumController@showAlbumImages');
Route::post('/api/albums', 'ApiController@postAlbum');
Route::delete('/api/albums/{uuid}', 'ApiController@removeAlbum');
Route::post('/api/albums/{uuid}', 'ApiController@addImage');
