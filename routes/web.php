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

Route::get('/{any}', function () {
    return view('welcome');
})->where('any','.*');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/all', 'ArtistController@index');
Route::get('/snowman', 'ArtistController@snowman');
Route::get('/sixtones', 'ArtistController@sixtones');
Route::get('/snowman/profile', 'ArtistController@snowmanprofile');
Route::get('/snowman/profile', 'ArtistController@iwamotoCommentIndex');
Route::post('/snowman/profile', 'ArtistController@iwamotoCommentPost');
Route::get('/snowman/checkit', 'ArtistController@snowmancheckit');
Route::get('/snowman/mustgo', 'ArtistController@snowmanmustgo');


Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
