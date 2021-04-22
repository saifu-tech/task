<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




Route::group(['middleware'=>['cors']], function () {

	Route::post('login', 'ApiController@login');

	 Route::group(['middleware'=>['verifyjwt']], function(){
	 	Route::get('getalluser','ApiController@getalluser');
	 	Route::post('/logout', 'ApiController@logout');
	 });
});
