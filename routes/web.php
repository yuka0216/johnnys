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
//api routing
Route::group(['prefix' => 'api', 'middleware' => 'auth'], function () {
    Route::get('mypage/{userId}', 'PostController@index');
    Route::get('search/{searchValue}', 'PostController@searchIndex');
    Route::get('profile/mypage/{userId}', 'ProfileController@fetchProfileByUserId');
});

//Snow Manページのrouting
Route::group(['prefix' => 'snowman', 'middleware' => 'auth'], function () {
    Route::get('profile/{threadId}', 'ArtistController@postIndex');
    Route::post('profile/{threadId}', 'ArtistController@post');

    Route::get('add', 'ArtistController@makeCheckBox');
    Route::post('add', 'ArtistController@addThread');
    Route::get('Edit', 'ArtistController@postEdit');
    Route::post('Edit', 'ArtistController@postUpdate');
    Route::get('delete', 'ArtistController@postDelete');

    Route::view('/', 'artist.snowman');
    Route::view('profile', 'artist.snowmanprofile');
    Route::view('checkit', 'artist.snowmancheckit');
    Route::view('mustgo', 'artist.snowmanmustgo');
});

//その他
Route::group(['middleware' => 'auth'], function () {
    Route::get('/setting', 'ArtistController@setting');
    Route::post('/setting', 'ArtistController@profileEdit');
    Route::get('/all', 'ArtistController@index');
    Route::view('/sixtones', 'artist.sixtones');
    Route::view('/mypage/{userId}', 'artist.app');
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
