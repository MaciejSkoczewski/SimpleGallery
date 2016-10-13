<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::get('albums/{id}-{slug}', [
    'as' => 'albums.show', 'uses' => 'AlbumsController@show'
    ])->where(['id' => '[0-9]+', 'slug' => '[0-9A-Za-z\-]+']);

Route::resource('albums', 'AlbumsController', ['except' => ['show']]);

Route::get('albums/{id_album}-{slug}/photos/{id_photo}', [
    'as' => 'albums.photos.show', 'uses' => 'AlbumsPhotosController@show'
    ])->where(['id_album' => '[0-9]+', 'slug' => '[0-9A-Za-z\-]+', 'id_photo' => '[0-9]+']);

Route::resource('albums.photos', 'AlbumsPhotosController', ['except' => ['show', 'edit', 'update', 'create', 'index']]);
