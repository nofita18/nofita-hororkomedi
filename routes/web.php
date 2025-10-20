<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('welcome');
});
Route :: get ('/pcr', function() {
    $a = 7 + 7;
    return 'Selamat datang di website kampus pcr!';
}) ;

// Route::get('/mahasiswa', function () {
//     return 'Halo Mahasiswa';
// })->name('mahasiswa.show');

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

Route::get('mahasiswa/{param1?}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/home',[HomeController::class,'index']);

Route::get('/profile', [PegawaiController::class,'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class);
