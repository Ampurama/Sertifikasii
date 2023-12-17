<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('/form-mahasiswa', [MahasiswaController::class, 'create']);
Route::post('/simpan-mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/get-kabupaten/{provinsiId}', [MahasiswaController::class, 'getKabupaten']);
Route::get('/form-mahasiswa', [MahasiswaController::class, 'create'])->name('form-mahasiswa');


Route::get('data-mahasiswa', [MahasiswaController::class, 'index'])
    ->name('data-mahasiswa')->middleware('admin');
Route::get('edit-mahasiswa/{id}', [MahasiswaController::class, 'edit'])
    ->name('edit-mahasiswa')->middleware('admin');
Route::patch('update-mahasiswa/{id}', [MahasiswaController::class, 'update'])
    ->name('update-mahasiswa')->middleware('admin');
Route::delete('delete-mahasiswa/{id}', [MahasiswaController::class, 'destroy'])
    ->name('delete-mahasiswa')->middleware('admin');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/users', [AdminController::class, 'index'])
        ->name('admin.users.index');

    Route::get('admin/users/{id}/edit', [AdminController::class, 'edit'])
        ->name('admin.users.edit');

    Route::put('admin/users/{id}', [AdminController::class, 'update'])
        ->name('admin.users.update');

    Route::delete('admin/users/{id}', [AdminController::class, 'destroy'])
        ->name('admin.users.destroy');
});
