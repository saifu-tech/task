<?php

use Illuminate\Support\Facades\Route;

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


Route::get('tasktest','TaskController@tasktest');

//route works start here
Route::get('/login','TaskController@login')->name('login');
Route::post('loginpost','TaskController@loginpost')->name('loginpost');


Route::group(['middleware' => 'auth'], function (){
	Route::get('/error', 'TaskController@errorpage')->name('errorpage');
	Route::get('/', 'TaskController@homepage')->name('homepage');
	Route::get('logout', 'TaskController@logout')->name('logout');
	Route::get('videofun','TaskController@videofun');
	Route::get('videopostfun','TaskController@videopostfun')->name('videopostfun');
	//


    Route::group(['middleware' => 'adminvalidate'],function(){

		Route::get('customer', 'TaskController@customer')->name('managecustomer');
    	Route::get('customer/add', 'TaskController@addcustomer')->name('addcustomer');
	    Route::post('customer/add', 'TaskController@addcustomerpost')->name('addcustomerpost');
	    Route::get('customer/edit/{id}', 'TaskController@editcustomer')->name('editcustomer');
	    Route::post('customer/update', 'TaskController@editcustomerpost')->name('editcustomerpost');
	    Route::post('customer/delete', 'TaskController@deletecustomer')->name('deletecustomer');
	    Route::post('customer/status', 'TaskController@changecustomertatus')->name('changecustomerstatus');

	});

	

});


//route works end here
