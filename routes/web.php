<?php

if (config('app.env') === 'production') {
    // asset()やurl()がhttpsで生成される
    URL::forceScheme('http');
}

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
    Route::get('mypage/{targetUserId}/{loginId}', 'PostController@index');
    Route::get('search/{searchValue}', 'PostController@searchIndex');
    Route::get('profile/mypage/{userId}', 'ProfileController@fetchProfileByUserId');
    Route::get('favorite', 'LikeController@store');
    Route::post('favorite', 'LikeController@store');
    Route::get('favorite/{postId}/{userId}', 'LikeController@favorite');
    Route::delete('favorite', 'LikeController@delete');
    Route::get('user', 'UserController@user');
    Route::get('check/favorite/{postID}/{userID}', 'LikeController@favorite');
});

//Snow Manページのrouting
Route::group(['prefix' => 'snowman', 'middleware' => 'auth'], function () {
    Route::get('talk/{threadId}', 'ArtistController@postIndex');
    Route::post('talk', 'ArtistController@post');
    Route::get('addthread', 'ArtistController@makeCheckBox');
    Route::post('addthread', 'ArtistController@addThread');
    Route::get('Edit', 'ArtistController@postEdit');
    Route::post('Edit', 'ArtistController@postUpdate');
    Route::get('delete', 'ArtistController@postDelete');
    Route::view('/', 'artist.snowman');
    Route::view('talk', 'artist.snowmantalk');
    Route::view('checkit', 'artist.snowmancheckit');
    Route::view('mustgo', 'artist.snowmanmustgo');
    Route::get('member', 'ArtistController@groupMemberIndex');
});

//その他
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'ArtistController@profile');
    Route::post('/profile', 'ArtistController@profileEdit');
    Route::get('/artistlist', 'ArtistController@artistIndex');
    Route::view('/sixtones', 'artist.sixtones');
    Route::view('/mypage/{userId}', 'artist.app');
    Route::view('/mypage', 'auth.login');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::view('/', 'artist.snowman');
});

//ゲストユーザーログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

Auth::routes();
