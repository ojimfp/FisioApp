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
    return redirect()->route('pasien.index');
});

Route::get('print/test', 'PrintController@test')->name('print.test');

Route::resource('pasien', 'PasienController')->except(['show']);
Route::get('pasien/search', 'PasienController@search')->name('pasien.search');

Route::resource('rekam-medis', 'RekamMedisController')->except(['index', 'show', 'create']);
Route::get('rekam-medis/{id}', 'RekamMedisController@index')->name('rekam-medis.index');
Route::get('rekam-medis/{id}/create', 'RekamMedisController@create')->name('rekam-medis.create');
Route::post('rekam-medis/get-tindakan', 'RekamMedisController@getTindakan')->name('rekam-medis.getTindakan');

Route::resource('dokter', 'DokterController')->except(['show']);
Route::get('dokter/search', 'DokterController@search')->name('dokter.search');

Route::resource('tindakan', 'TindakanController')->except(['show']);
Route::get('tindakan/search', 'TindakanController@search')->name('tindakan.search');

Route::resource('pembayaran', 'PembayaranController')->except(['show', 'create', 'edit', 'update', 'destroy']);
Route::get('pembayaran/{id}/create', 'PembayaranController@create')->name('pembayaran.create');
Route::get('pembayaran/{id}/edit-p', 'PembayaranController@editFromPembayaran')->name('pembayaran.edit.p');
Route::get('pembayaran/{id}/edit-rm', 'PembayaranController@editFromRekamMedis')->name('pembayaran.edit.rm');
Route::put('pembayaran/update-p/{id}', 'PembayaranController@updateFromPembayaran')->name('pembayaran.update.p');
Route::put('pembayaran/update-rm/{id}', 'PembayaranController@updateFromRekamMedis')->name('pembayaran.update.rm');
Route::delete('pembayaran/delete-p/{id}', 'PembayaranController@destroyFromPembayaran')->name('pembayaran.destroy.p');
Route::delete('pembayaran/delete-rm/{id}', 'PembayaranController@destroyFromRekamMedis')->name('pembayaran.destroy.rm');
Route::get('pembayaran/search', 'PembayaranController@search')->name('pembayaran.search');
Route::get('pembayaran/download', 'PembayaranController@download')->name('pembayaran.download');
Route::get('pembayaran/print', 'PembayaranController@print')->name('pembayaran.print');
Route::get('invoice/{id}', 'PembayaranController@invoice')->name('invoice');
Route::get('invoice/{id}/print', 'PembayaranController@printInvoice')->name('invoice.print');
Route::get('invoice/{id}/download', 'PembayaranController@downloadInvoice')->name('invoice.download');

Route::resource('user', 'UserController')->except(['create', 'store', 'show'])->middleware('can:manage-users');
Route::get('user/search', 'UserController@search')->name('user.search');
Route::get('karyawan/search', 'UserController@searchKaryawan')->name('karyawan.search');
Route::get('user/list', 'UserController@indexKaryawan')->name('karyawan.index');

Route::get('change-password', 'Auth\ChangePasswordController@index')->name('user.password');
Route::post('change-password', 'Auth\ChangePasswordController@store')->name('password.change');

Route::resource('jadwal', 'JadwalController')->except(['show']);
Route::get('jadwal/search', 'JadwalController@search')->name('jadwal.search');
Route::get('get-datapasien', 'JadwalController@getDataPasien')->name('jadwal.datapasien');

Route::resource('gaji', 'GajiController')->except(['show']);
Route::get('gaji/search', 'GajiController@search')->name('gaji.search');
Route::get('slip-gaji/{id}', 'GajiController@slipGaji')->name('slip.gaji');
Route::get('get/data/{id}', 'GajiController@getData')->name('getData');
Route::get('slip-gaji/print/{id}', 'GajiController@printGaji')->name('slip.print');
Route::get('slip-gaji/download/{id}', 'GajiController@downloadGaji')->name('slip.download');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
