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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group([
], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'AuthController@signup');
    Route::post('/users', 'UserController@store');
    Route::post('/avatar', 'UserController@storeAvatar');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('users', 'UserController@index');
        Route::get('/users/{id}', 'UserController@get');
        Route::get('/music/{id}', 'MusicController@index');
        Route::post('/getusers', 'UserController@getManyUsers');
        Route::post('/chats', 'ChatController@index');
        Route::post('/match', 'MatchController@create');
        Route::get('/chat/{id}', 'ChatController@get');
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        Route::put('users', 'UserController@update');
    });
});