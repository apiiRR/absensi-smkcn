<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/wali', function () {
//     return view('layouts.wali');
// });

Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('absen', 'User\AbsenController');
Route::resource('profil', 'User\ProfilController');
Route::resource('riwayat', 'User\RiwayatController');

Route::resource('administrator', 'Admin\HomeController');
Route::resource('jurusan', 'Admin\JurusanController');
Route::resource('akun', 'Admin\AkunController');
Route::resource('profile', 'Admin\ProfileController');
Route::resource('data', 'Admin\DataController');

Route::resource('/wali-siswa', 'OrtuController');

Route::get('file-import-export', [UserController::class, 'fileImportExport']);
Route::post('file-import', [App\Http\Controllers\UserController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');