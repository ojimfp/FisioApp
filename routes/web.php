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

Route::get('pasien', function () {
    return view('pasien');
});

Route::get('tambah_pasien', function () {
    return view('tambah_pasien');
});

Route::get('jadwal', function () {
    return view('jadwal');
});

Route::get('tambah_jadwal', function () {
    return view('tambah_jadwal');
});
