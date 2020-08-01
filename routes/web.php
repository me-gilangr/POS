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

Route::get('/', 'BaseController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
	Route::resource('jenis', 'JenisController');	
	Route::put('/jenis/{id}/restore', 'JenisController@restore')->name('jenis.restore');
	Route::delete('/jenis/{id}/permanent', 'JenisController@permanent')->name('jenis.permanent');
	
	Route::resource('satuan', 'SatuanController');	
});