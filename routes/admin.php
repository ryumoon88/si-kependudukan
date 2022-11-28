<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ResidentBirthController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::group(['prefix' => 'dashboard', 'as' => 'admin.dashboard.'], function () {
    Route::resource('/resident-births', ResidentBirthController::class, [
        'names' => [
            'index' => 'resident.birth',
            'show' => 'resident.birth.show',
            'create' => 'resident.birth.create',
            'store' => 'resident.birth.store'
        ],
        'only' => ['index', 'show', 'create', 'store'],
    ])->scoped(['resident_birth' => 'ulid']);

    Route::post('/resident-births/create-preview', [ResidentBirthController::class, 'create_preview'])->name('resident.birth.create-preview');

    Route::resource('/resident-identity-cards', ResidentController::class, [
        'names' => [
            'store' => 'resident.identity.store',
            'index' => 'resident.identity',
            'show' => 'resident.identity.show',
            'create' => 'resident.identity.create',
        ],
        'only' => ['index', 'show', 'create', 'store'],
    ])
        ->parameter('resident-identity-cards', 'resident')
        ->scoped(['resident' => 'ulid']);

    Route::post('/resident-identity-cards/create-preview', [ResidentController::class, 'create_preview'])->name('resident.identity.create-preview');

    Route::get('/profile', [AdminUserController::class, 'index'])
        ->name('profile');

    Route::group(['prefix' => 'profile'], function () {
        Route::put('/update/{user:id_number}', [AdminUserController::class, 'update'])
            ->name('profile.update');

        Route::post('/change-password', [AdminUserController::class, 'change_password'])
            ->name('profile.change-password');
    });
});