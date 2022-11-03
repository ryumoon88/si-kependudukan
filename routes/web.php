<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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

Route::get('/Register', function () {
    return view('Register.index');
});
Route::get('/Berita', function () {
    return view('Berita.index');
});
Route::get('/test', function () {
    return view('Berita.test');
});
Route::get('/pengajuan', function () {
    return view('Pengajuan.index');
});
Route::middleware('web')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('users.index');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('users.login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('users.authenticate');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('users.logout');
});

// Route::prefix('admin')->group(function () {
//     Route::middleware('auth', 'role:Super-Admin|Admin')->group(function () {
//         Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admins.dashboard');
//         Route::get('/citizens', [AdminDashboardController::class, 'citizens'])->name('admins.citizens');
//     });
// });

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admins.dashboard');

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/citizens', [AdminDashboardController::class, 'citizens'])->name('admins.citizens');
    });
});


// Route::get('/admin/dashboard', function () {
//     return view('admins.index');
// })->name('admins.dashboard');

// Route::get('/admin/dashboard/citizens', function () {
//     return view('admins.citizens.index');
// })->name('admins.citizens');