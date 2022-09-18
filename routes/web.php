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

    if (isset(Auth::user()->level)) {
        return redirect('/home');
    }

    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::prefix('cuti')->group(function () {
    Route::get('/', [App\Http\Controllers\CutiController::class, 'index'])->name('cuti');
    Route::get('delete/{id}', [\App\Http\Controllers\CutiController::class, 'delete'])->name('cuti.delete');
    // Route::get('create', [\App\Http\Controllers\KaryawanTokoController::class, 'create'])->name('karyawan_toko.create');
    Route::post('store', [\App\Http\Controllers\CutiController::class, 'store'])->name('cuti.store');
    Route::get('update/{id}/{status}', [\App\Http\Controllers\CutiController::class, 'update'])->name('cuti.update');
    // Route::get('edit/{id}', [\App\Http\Controllers\KaryawanTokoController::class, 'edit'])->name('karyawan_toko.edit');
    // Route::post('update', [\App\Http\Controllers\KaryawanTokoController::class, 'update'])->name('karyawan_toko.update');
});

Route::prefix('karyawan')->group(function () {
    Route::get('/', [App\Http\Controllers\KaryawanController::class, 'index'])->name('karyawan');
    Route::get('delete/{id}', [\App\Http\Controllers\KaryawanController::class, 'destroy'])->name('karyawan.delete');
    // Route::get('create', [\App\Http\Controllers\KaryawanTokoController::class, 'create'])->name('karyawan_toko.create');
    // Route::post('store', [\App\Http\Controllers\CutiController::class, 'store'])->name('cuti.store');
    // Route::get('update/{id}/{status}', [\App\Http\Controllers\CutiController::class, 'update'])->name('cuti.update');
    Route::get('edit/{id}', [\App\Http\Controllers\KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::post('update', [\App\Http\Controllers\KaryawanController::class, 'update'])->name('karyawan.update');
});

Route::prefix('bagian')->group(function () {
    Route::get('/', [App\Http\Controllers\BagianController::class, 'index'])->name('bagian');
    Route::get('delete/{id}', [\App\Http\Controllers\BagianController::class, 'destroy'])->name('bagian.delete');
    // Route::get('create', [\App\Http\Controllers\KaryawanTokoController::class, 'create'])->name('karyawan_toko.create');
    Route::post('store', [\App\Http\Controllers\BagianController::class, 'store'])->name('bagian.store');
    // Route::get('update/{id}/{status}', [\App\Http\Controllers\CutiController::class, 'update'])->name('cuti.update');
    // Route::get('edit/{id}', [\App\Http\Controllers\KaryawanTokoController::class, 'edit'])->name('karyawan_toko.edit');
    Route::post('update', [\App\Http\Controllers\BagianController::class, 'update'])->name('bagian.update');
});

Route::prefix('jabatan')->group(function () {
    Route::get('/', [App\Http\Controllers\JabatanController::class, 'index'])->name('jabatan');
    Route::get('delete/{id}', [\App\Http\Controllers\JabatanController::class, 'destroy'])->name('jabatan.delete');
    // Route::get('create', [\App\Http\Controllers\KaryawanTokoController::class, 'create'])->name('karyawan_toko.create');
    Route::post('store', [\App\Http\Controllers\JabatanController::class, 'store'])->name('jabatan.store');
    // Route::get('update/{id}/{status}', [\App\Http\Controllers\CutiController::class, 'update'])->name('cuti.update');
    // Route::get('edit/{id}', [\App\Http\Controllers\KaryawanTokoController::class, 'edit'])->name('karyawan_toko.edit');
    Route::post('update', [\App\Http\Controllers\JabatanController::class, 'update'])->name('jabatan.update');
});

Route::prefix('user')->group(function () {

    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('delete/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');
    // Route::get('create', [\App\Http\Controllers\KaryawanTokoController::class, 'create'])->name('karyawan_toko.create');
    Route::post('store', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    // Route::get('update/{id}/{status}', [\App\Http\Controllers\CutiController::class, 'update'])->name('cuti.update');
    Route::get('edit/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('update', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
});