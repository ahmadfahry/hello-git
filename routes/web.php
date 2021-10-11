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
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'loginaja']);
//prodi
Route::get('/prodi', [App\Http\Controllers\ProdiController::class, 'index']);
Route::get('/prodi/delete/{id}', [App\Http\Controllers\ProdiController::class, 'delete']);
Route::get('/prodi/edit/{id}', [App\Http\Controllers\ProdiController::class, 'edit']);
Route::post('/prodi/create', [App\Http\Controllers\ProdiController::class, 'create']);
Route::post('/prodi/update/{id}', [App\Http\Controllers\ProdiController::class, 'update']);

//jurusan
Route::get('/jurusan', [App\Http\Controllers\JurusanController::class, 'index']);
Route::get('/jurusan/delete/{id}', [App\Http\Controllers\JurusanController::class, 'delete']);
Route::get('/jurusan/edit/{id}', [App\Http\Controllers\JurusanController::class, 'edit']);
Route::post('/jurusan/create', [App\Http\Controllers\JurusanController::class, 'create']);
Route::post('/jurusan/update/{id}', [App\Http\Controllers\JurusanController::class, 'update']);

//guru
Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index']);
Route::get('/guru/delete/{id}', [App\Http\Controllers\GuruController::class, 'delete']);
Route::get('/guru/edit/{id}', [App\Http\Controllers\GuruController::class, 'edit']);
Route::post('/guru/create', [App\Http\Controllers\GuruController::class, 'create']);
Route::post('/guru/update/{id}', [App\Http\Controllers\GuruController::class, 'update']);

//kelas
Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'index']);
Route::get('/kelas/delete/{id}', [App\Http\Controllers\KelasController::class, 'delete']);
Route::get('/kelas/edit/{id}', [App\Http\Controllers\KelasController::class, 'edit']);
Route::post('/kelas/create', [App\Http\Controllers\KelasController::class, 'create']);
Route::post('/kelas/update/{id}', [App\Http\Controllers\KelasController::class, 'update']);

//matapelajaran
Route::get('/matapelajaran', [App\Http\Controllers\MataPelajaranController::class, 'index']);
Route::get('/matapelajaran/edit/{id}', [App\Http\Controllers\MataPelajaranController::class, 'edit']);
Route::get('/matapelajaran/list/krs', [App\Http\Controllers\MataPelajaranController::class, 'indexMhs']);
Route::get('/matapelajaran/list/krs/cetak/{id}', [App\Http\Controllers\MataPelajaranController::class, 'cetakPfd']);
Route::get('/matapelajaran/delete/{id}', [App\Http\Controllers\MataPelajaranController::class, 'delete']);
Route::post('/matapelajaran/create', [App\Http\Controllers\MataPelajaranController::class, 'create']);
Route::post('/matapelajaran/update/{id}', [App\Http\Controllers\MataPelajaranController::class, 'update']);
Route::post('/matapelajaran/update/biodata/{id}', [App\Http\Controllers\MataPelajaranController::class,
 'updateSelf']);
Route::post('/matapelajaran/rapor/', [App\Http\Controllers\MataKuliahController::class, 'updateMatapelajaranPilih']);

//siswa
Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index']);
Route::get('/siswa/edit/{id}', [App\Http\Controllers\SiswaController::class, 'edit']);
Route::get('/siswa/delete/{id}', [App\Http\Controllers\SiswaController::class, 'delete']);
Route::get('siswa/biodata/', [App\Http\Controllers\SiswaController::class, 'detail']);
Route::post('/siswa/create', [App\Http\Controllers\SiswaController::class, 'create']);
Route::post('/siswa/update/{id}', [App\Http\Controllers\SiswaController::class, 'update']);
Route::post('/siswa/update/biodata/{id}', [App\Http\Controllers\SiswaController::class, 'updateSelf']);

//pembayaran
Route::get('/pembayaran/admin', [App\Http\Controllers\PembayaranController::class, 'index']);
Route::get('/pembayaran/admin/filter/{id}', [App\Http\Controllers\PembayaranController::class, 'filterJurusan']);
Route::get('/pembayaran/siswa',
 [App\Http\Controllers\PembayaranController::class, 'indexPemabayaranSis']);
Route::get('/pembayaran/siswa/log',
 [App\Http\Controllers\PembayaranController::class, 'indexPemabayaranSisRiwayat']);
 Route::post('/pembayaran/generate',
 [App\Http\Controllers\PembayaranController::class, 'generatePembayaran']);
 Route::post('/pembayaran/upbukti/{id}',
 [App\Http\Controllers\PembayaranController::class, 'upBukti']);
  Route::get('/pembayaran/sudah/{id}',
 [App\Http\Controllers\PembayaranController::class, 'sudahBayar']);