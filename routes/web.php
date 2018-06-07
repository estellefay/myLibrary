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

Route::get('/books', 'BookController@display');
Route::post('/book/delete', 'BookController@deleteAction');
Route::get('/books/delete', 'BookController@deleteActionMultiple');

Route::get('/book/new', 'BookController@insert'); // Display form 
Route::post('/book/new', 'BookController@insertAction'); // ajoute les éléments


Route::get('/book/update', 'BookController@update'); // Display form of update 
Route::post('/book/update/new', 'BookController@updateAction'); // update action 






