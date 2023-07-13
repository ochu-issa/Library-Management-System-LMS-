<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\showController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth_check', 'prevent_back_history']], function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::get('/registerpage', [AuthController::class, 'registerPage'])->name('registerpage');
    Route::post('/registeruser', [AuthController::class, 'userRegistration'])->name('registeruser');
    Route::post('/authentication', [AuthController::class, 'authentication'])->name('authentication');
});


Route::group(['middleware' => ['auth', 'prevent_back_history']], function () {
    Route::get('/', [showController::class, 'viewDashboard'])->name('dashboard');
    Route::get('/book', [showController::class, 'viewBooks'])->name('book');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});
