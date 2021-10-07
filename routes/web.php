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

Route::get('/print', function () {
    return view('print');
});

Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('absen', 'User\AbsenController');
Route::resource('profil', 'User\ProfilController');
Route::resource('riwayat', 'User\RiwayatController');

Route::resource('administrator', 'Admin\HomeController');
Route::resource('jurusan', 'Admin\JurusanController');
Route::resource('akun', 'Admin\AkunController');
Route::get('/edit/{id}', 'Admin\AkunController@edit');
Route::post('/updat', 'Admin\AkunController@updat');
Route::resource('profile', 'Admin\ProfileController');
Route::resource('data', 'Admin\DataController');

Route::resource('/wali-siswa', 'OrtuController');

Route::get('/pdf/{from}/{to}/{project}', 'PDFController@cetak');

Route::get('file-import-export', [UserController::class, 'fileImportExport']);
Route::post('file-import', [App\Http\Controllers\UserController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');