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

// Route::get('/{any}', function () {
//     return view('welcome');
// })->where('any','.*');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/all', 'ArtistController@index')->middleware('auth');
Route::get('/snowman', 'ArtistController@snowman')->middleware('auth');
Route::get('/sixtones', 'ArtistController@sixtones')->middleware('auth');
Route::get('/snowman/profile', 'ArtistController@snowmanprofile')->middleware('auth');
Route::post('/snowman/profile', 'ArtistController@iwamotoCommentPost')->middleware('auth');
Route::get('/snowman/checkit', 'ArtistController@snowmancheckit')->middleware('auth');
Route::get('/snowman/mustgo', 'ArtistController@snowmanmustgo')->middleware('auth');
Route::get('/snowman/profile/iwamototalk', 'ArtistController@iwamotoCommentIndex')->middleware('auth');
Route::get('/mypage', 'ArtistController@commentIndex')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();
