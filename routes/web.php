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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// PagesController
Route::get('/', 'PagesController@index')->name('profile');
Route::get('/editprofile', 'PagesController@editprofile')->name('editprofile');
Route::get('/home', 'HomeController@index')->name('home');

//Menu Controller
Route::resource('menu', 'MenuController');
Route::resource('submenu', 'SubmenuController');
Route::resource('users', 'UserController');
