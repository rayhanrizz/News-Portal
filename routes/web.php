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

// Route::get('/detail', function () {
//     return view('detail');
// });

Route::get('/','PageController@index');
Route::get('/{id}/detail', 'PageController@show');

Auth::routes();
// Route::get('signout', ['as' => 'auth.signout', 'uses' => 'Auth\loginController@signout']);
Route::group(['middleware' => 'auth'], function(){
	Route::resource('news','NewsController');
	Route::get('export_news', 'NewsController@export');
	Route::resource('user','UserController');
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});