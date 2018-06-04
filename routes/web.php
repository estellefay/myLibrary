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
// Base route, require a views named like URI
Route::get('/{all?}', 'NavigationController@showPage');


// Custom route
Route::get('/test', 'NavigationController@testPage');

