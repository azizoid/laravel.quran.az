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

Route::get('/{s}/{t?}', 'QuranController@index')->where(['s'=>'[0-9]+', 't'=>'t[1,2,3]']);
Route::get('/{s}/{a}/{t?}', 'QuranController@index')->where(['s'=>'[0-9]+', 'a'=>'[0-9]+', 't'=>'t[1,2,3]']);
Route::get('/show/{q}/{t?}', 'QuranController@index')->where('t', 't[1,2,3]'); //a-ZıəçşüğöIƏÇŞÜĞÖ\,\.\s

Route::post('search', 'QuranController@search');
