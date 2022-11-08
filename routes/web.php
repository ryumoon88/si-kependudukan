<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
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

// Route::get('/berita', function () {
//     return view('users.berita.index');
// })->name('user.berita.index');

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

    Route::group(['middleware' => ['admin'], 'prefix' => 'a'], function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/citizens', [AdminDashboardController::class, 'citizens'])->name('admin.dashboard.citizen');
            Route::group(['prefix' => 'citizens'], function () {
                Route::get('/new', [AdminDashboardController::class, 'citizens_create'])->name('admin.dashboard.citizen.create');
                Route::get('/{citizen:id_number}', [AdminDashboardController::class, 'citizens_show'])->name('admin.dashboard.citizen.show');
            });

            Route::get('/profile', [AdminUserController::class, 'index'])->name('admin.dashboard.profile');

            Route::group(['prefix' => 'profile'], function () {
                Route::put('/update/{user:id_number}', [AdminUserController::class, 'update'])->name('admin.dashboard.profile.update');
                Route::post('/change-password', [AdminUserController::class, 'change_password'])->name('admin.dashboard.profile.change-password');
            });

            Route::group(['prefix' => 'submissions'], function () {
                Route::get('/kartu-tanda-penduduk', [AdminDashboardController::class, 'submissions'])->name('admin.dashboard.submission');
            });
        });
    });
});