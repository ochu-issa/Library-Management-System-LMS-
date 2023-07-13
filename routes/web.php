<?php

use App\Http\Controllers\showController;
use Illuminate\Support\Facades\Route;



Route::get('/', [showController::class, 'viewDashboard'])->name('dashboard');
