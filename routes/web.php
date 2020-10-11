<?php

use Illuminate\Support\Facades\Auth;
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

Route::resource('pasien', 'PasienController')->except(['show']);
Route::get('pasien/search', 'PasienController@search')->name('pasien.search');

Route::resource('rekam-medis', 'RekamMedisController')->except(['index', 'show', 'create']);
Route::get('rekam-medis/{id}', 'RekamMedisController@index')->name('rekam-medis.index');
Route::get('rekam-medis/{id}/create', 'RekamMedisController@create')->name('rekam-medis.create');

Route::resource('dokter', 'DokterController')->except(['show']);
Route::get('dokter/search', 'DokterController@search')->name('dokter.search');

Route::resource('tindakan', 'TindakanController')->except(['show']);
Route::get('tindakan/search', 'TindakanController@search')->name('tindakan.search');

Route::resource('pembayaran', 'PembayaranController')->except(['show', 'create', 'destroy']);
Route::get('pembayaran/{id}/create', 'PembayaranController@create')->name('pembayaran.create');
Route::delete('pembayaran/p/{id}', 'PembayaranController@destroyFromPembayaran')->name('pembayaran.destroy.p');
Route::delete('pembayaran/rm/{id}', 'PembayaranController@destroyFromRekamMedis')->name('pembayaran.destroy.rm');

Route::resource('user', 'UserController')->except(['create', 'store', 'show'])->middleware('can:manage-users');
Route::get('user/search', 'UserController@search')->name('user.search');

Route::get('change-password', 'Auth\ChangePasswordController@index')->name('user.password');
Route::post('change-password', 'Auth\ChangePasswordController@store')->name('password.change');

Route::resource('jadwal', 'JadwalController')->except(['show']);
Route::get('get-datapasien', 'JadwalController@getDataPasien')->name('jadwal.datapasien');

Route::resource('gaji', 'GajiController')->except(['index', 'show', 'create']);
Route::get('gaji/{id}', 'GajiController@index')->name('gaji.index');
// Route::get('gaji/{id}/create', 'RekamMedisController@create')->name('rekam-medis.create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
