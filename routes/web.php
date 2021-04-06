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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Items Routes
Route::get('/items', 'ItemController@index')->name('items.index');
Route::post('/items', 'ItemController@store')->name('items.store');
Route::get('/items/{item}', 'ItemController@edit')->name('items.editar');
Route::put('/items/{item}/actualizar', 'ItemController@update')->name('items.update');
Route::delete('/item/{item}','ItemController@destroy')->name('items.destroy');
// Folders Routes
Route::post('/folders', 'FolderController@store')->name('folders.store');
Route::post('/folder', 'FolderController@addtask')->name('folders.addtask');
Route::get('/folders', 'FolderController@index')->name('folders.index');
Route::get('/folders/show/{folder}', 'FolderController@show')->name('folders.show');
Route::post('/folders', 'FolderController@store')->name('folders.store');
Route::put('/folders/{folder}/actualizar', 'FolderController@update')->name('folders.update');
Route::delete('/folder/{folder}','FolderController@destroy')->name('folders.destroy');