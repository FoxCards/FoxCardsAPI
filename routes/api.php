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

Route::middleware('api')->get('/cards', 'CardListController@index');
Route::middleware('api')->get('/cards/{cardset}', 'CardListController@cardset');


Route::middleware('api')->post('/cards', 'CardListController@addCardset');
Route::middleware('api')->post('/cards/{cardset}', 'CardListController@addWord');