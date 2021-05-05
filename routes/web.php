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

Route::middleware('auth')->get('api/mypage/{userId}', 'PostController@index');
Route::middleware('auth')->get('api/search/{searchValue}', 'PostController@searchIndex');
Route::middleware('auth')->get('api/profile/mypage/{userId}', 'ProfileController@fetchProfileByUserId');

Route::get('/mypage/{userId}', function () {
    return view('artist.app');
});

Route::get('/mypage/0', function () {
    return view('artist.app');
});

// ArtistController@myPostIndex");



Route::get('/', function () {
    return view('welcome');
});


Route::post('/snowman/profile/{threadId}', 'ArtistController@post')->middleware('auth');
Route::get('/snowman/profile/{threadId}', 'ArtistController@postIndex')->middleware('auth');
Route::post('/snowman/add', 'ArtistController@addThread')->name('home');
Route::get('/snowman/add', 'ArtistController@makeCheckBox')->name('home');
Route::get('/all', 'ArtistController@index')->middleware('auth');
Route::post('/setting', 'ArtistController@profile')->middleware('auth');
Route::get('/setting', 'ArtistController@setting')->middleware('auth');
Route::get('/snowman', 'ArtistController@snowman')->middleware('auth');
Route::get('/sixtones', 'ArtistController@sixtones')->middleware('auth');
Route::get('/snowman/profile', 'ArtistController@snowmanprofile')->middleware('auth');
Route::get('/snowman/checkit', 'ArtistController@snowmancheckit')->middleware('auth');
Route::get('/snowman/mustgo', 'ArtistController@snowmanmustgo')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
