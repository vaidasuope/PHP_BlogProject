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
//cia pradinis puslapis

Route::get('/', 'BlogController@index');
Route::get('/add-post','BlogController@addPost');
Route::post('/store', 'BlogController@store');
Route::get('/post/{post}', 'BlogController@showAllPost');
Route::get('/edit/{post}', 'BlogController@editPost');
Route::patch('/storeupdate/{post}', 'BlogController@storeUpdate');
Route::get('/delete/{post}', 'BlogController@delete');
Route::get('/add-category', 'CategoryController@addCategory');
Route::post('/saveCategory', 'CategoryController@saveCategory');
Route::get('/categories','CategoryController@showCategories');
Route::get('/del/{category}','CategoryController@delete');
Route::get('/oneCategory/{category}','CategoryController@selectOne');

//visas straipsnis is vienos kategorijos page pasirinkto
//Route::get('/oneCategory/post/{post}', 'BlogController@showAllPost');

Route::get('/edit/post/{post}', 'BlogController@editPost');

Route::get('/user/{user}','CategoryController@selectUser');



//Route::get('/categories/{category}','CategoryController@selectOne');
//Route::get('/selected-category','CategoryController@selectOne');
//blade view faila reikia susikurti

//cia apsirasom route'a i users puslapi
//Route::get('/users', 'UserController@users');

Auth::routes();

Route::get('/logout', "\App\Http\Controllers\Auth\LoginController@logout");

