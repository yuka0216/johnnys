<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('mypage', 'PostController@index');
Route::get('myImage', 'PostController@image');

// group(['middleware' => 'api'], function () {
//     Route::get('', 'PostController@getPosts');
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
