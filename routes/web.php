<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\showController;
use App\Http\Controllers\storeDataController;
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
    Route::get('/bookdetail/{id}', [showController::class, 'bookDetails'])->name('bookdetail');
    Route::get('user', [showController::class, 'viewUser'])->name('user');
    Route::get('popularbook', [showController::class, 'viewPopularBook'])->name('popularbook');
    Route::get('favoritebook', [showController::class, 'viewFavoriteBook'])->name('favoritebook');
    Route::post('/comment', [storeDataController::class, 'createComment'])->name('comment');
    Route::post('/like', [storeDataController::class, 'likeBook'])->name('like');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});
