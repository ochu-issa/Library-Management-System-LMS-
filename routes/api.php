<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Book\GetAllBooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//authenticate user - public API's
Route::post('/register', [AuthenticationController::class, 'registerUser']);
Route::post('/login', [AuthenticationController::class, 'loginUser']);


//Route::get('/getallbook', [BookController::class, 'getALLBooks']);


//protected API's
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthenticationController::class, 'logoutUser']);
    Route::get('/getallbook', [GetAllBooksController::class, 'getAllBook']);
    Route::get('/getpopularbook', [GetAllBooksController::class, 'booksWithMostLikes']);

});
