<?php
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


// // Menampilkan daftar menu
// Route::get('/menu', [MenuController::class, 'index']);

// // Menampilkan form tambah menu
// Route::get('/tambahmenu', [MenuController::class, 'create']);

// // Menyimpan menu baru
// Route::post('/tambahmenu', [MenuController::class, 'store']);

// // Menampilkan form edit menu
// Route::get('/editmenu/{id}', [MenuController::class, 'edit']);

// // Update data menu
// Route::post('/editmenu/{id}', [MenuController::class, 'update']);

// // Hapus data menu
// Route::get('/hapusmenu/{id}', [MenuController::class, 'destroy']);

Route::middleware('auth')->group(function () {

    // Menampilkan daftar menu
    Route::get('/menu', [MenuController::class, 'index']);

    // Menampilkan form tambah menu
    Route::get('/tambahmenu', [MenuController::class, 'create']);

    // Menyimpan menu baru
    Route::post('/tambahmenu', [MenuController::class, 'store']);

    // Menampilkan form edit menu
    Route::get('/editmenu/{id}', [MenuController::class, 'edit']);

    // Update data menu
    Route::post('/editmenu/{id}', [MenuController::class, 'update']);

    // Hapus data menu
    Route::get('/hapusmenu/{id}', [MenuController::class, 'destroy']);
});

