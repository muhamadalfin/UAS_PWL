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
//Route::get('/','AdminController@index');
Route::get('/', function(){
    return view('welcome');
});

Route::get('/administrator','AdminController@index');
Route::get('/administrator/cari','AdminController@cari');
//Route::get('/administrator/tambah','AdminController@tambah');
Route::post('/administrator/simpan','AdminController@simpan');
Route::get('/administrator/detail/{id}','AdminController@detail');
Route::get('/administrator/edit/{id}','AdminController@edit');
Route::post('/administrator/update','AdminController@update');
Route::get('/administrator/hapus/{id}','AdminController@hapus');

Route::get('/pengunjung','PengunjungController@index');
Route::get('/pengunjung/cari','PengunjungController@cari');
Route::get('/pengunjung/detail/{id}','PengunjungController@detail');
Route::get('/pengunjung/edit/{id}','PengunjungController@edit');
Route::post('/pengunjung/update','PengunjungController@update');
Route::get('/pengunjung/hapus/{id}','PengunjungController@hapus');

Route::get('/kamar','KamarController@index');
Route::get('/kamar/cari','KamarController@cari');
Route::get('/kamar/detail/{id}','KamarController@detail');
Route::get('/kamar/edit/{id}','KamarController@edit');
Route::post('/kamar/update','KamarController@update');
Route::get('/kamar/hapus/{id}','KamarController@hapus');
Route::post('/kamar/simpan','KamarController@simpan');
Route::get('/kamar/tambah','KamarController@tambah');

Route::get('/reservasi','ReservasiController@index');
Route::get('/reservasi/cari','ReservasiController@cari');
Route::get('/reservasi/hapus/{id}','ReservasiController@hapus');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/admin/users', 'Admin\UsersController',['except' => ['show','create','store']]);
