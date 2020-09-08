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

Route::resource('user', 'UserController')->except(['create', 'store', 'show'])->middleware('can:manage-users');

Route::get('user/search', 'UserController@search')->name('user.search');

Route::get('change-password', 'Auth\ChangePasswordController@index')->name('user.password');
Route::post('change-password', 'Auth\ChangePasswordController@store')->name('password.change');

Route::get('riwayat-pasien', function () {
    return view('riwayat_pasien');
});

Route::get('tambah-rekam-medis', function () {
    return view('tambah_rekam_medis');
});

Route::resource('jadwal', 'JadwalController')->except(['show']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
