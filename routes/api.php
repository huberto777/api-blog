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

// Route::group(['middleware' => 'auth:api'], function () { });
Route::group(['middleware' => 'auth.api',], function () {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
Route::post('login', 'AuthController@login');
Route::resources([
    'articles' => 'ArticlesController',
    'articles.comments' => 'CommentsController'
]);
Route::post('/articles/{article}/likes', 'LikesController@like');
Route::post('/articles/{article}/unlikes', 'LikesController@unlike');
