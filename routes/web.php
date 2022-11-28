<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationApi;
use Illuminate\Http\Request;
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

Route::get('/register', function () {
    return view('users.register.index');
})->name('user.register');

Route::get('/berita', function () {
    return view('users.berita.perlu');
})->name('user.berita.index');

Route::get('/pengajuan', function () {
    return view('users.pengajuan.index');
});

Route::middleware('web')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('user.home');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('user.login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('user.authenticate');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');
    Route::group(['prefix' => 'uploads'], function () {
        Route::post('/file', [FileController::class, 'upload_temp'])->name('upload.file');
    });
});


// Route::get('indonesia/province/{province?}', [LocationApi::class, 'province']);
Route::get('indonesia/city/{province?}', [LocationApi::class, 'city']);
Route::get('indonesia/district/{city?}', [LocationApi::class, 'district']);
Route::get('indonesia/village/{district?}', [LocationApi::class, 'village']);