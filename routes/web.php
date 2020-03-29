<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/{s}/{t?}', 'QuranController@soorah')->where(['s'=>'[0-9]+', 't'=>'t[1,2,3]']);
Route::get('/{s}/{a}/{t?}', 'QuranController@ayah')->where(['s'=>'[0-9]+', 'a'=>'[0-9]+', 't'=>'t[1,2,3]']);
Route::get('/show/{q}/{t?}', 'QuranController@show')->where('t', 't[1,2,3]'); //a-ZıəçşüğöIƏÇŞÜĞÖ\,\.\s

Route::post('search', 'QuranController@search');

Route::get('/{s}/t:{t}', 'QuranController@soorah')->where(['s'=>'[0-9]+', 't'=>'t[1,2,3]']);
Route::get('/{s}/{a}/t:{t}', 'QuranController@ayah')->where(['s'=>'[0-9]+', 'a'=>'[0-9]+', 't'=>'t[1,2,3]']);
Route::get('/{s}/tran:{t}', 'QuranController@show')->where('t', 't[1,2,3]'); //a-ZıəçşüğöIƏÇŞÜĞÖ\,\.\s
Route::get('/{s}/{a}/tran:{t}', 'QuranController@show')->where('t', 't[1,2,3]'); //a-ZıəçşüğöIƏÇŞÜĞÖ\,\.\s
Route::get('/{s}/{a}/{t}', 'QuranController@ayah')->where(['s'=>'[0-9]+', 'a'=>'[0-9]+', 't'=>'[1,2,3]']);

//Route::get('index', 'QuranController@index');
