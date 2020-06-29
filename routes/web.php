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

Route::get('/pasien', 'PasienController@index');

Route::get('/tambah-pasien', 'PasienController@tambahPasien');
Route::post('/simpan-pasien', 'PasienController@simpanPasien');
Route::get('/edit-pasien/{id}', 'PasienController@editPasien');
Route::post('/update-pasien', 'PasienController@updatePasien');
Route::get('/hapus-pasien/{id}', 'PasienController@hapusPasien');
Route::get('/cari-pasien', 'PasienController@cariPasien');

// Route::resource('pasien', 'PasienController');

Route::get('jadwal', function () {
    return view('jadwal');
});

Route::get('tambah_jadwal', function () {
    return view('tambah_jadwal');
});
