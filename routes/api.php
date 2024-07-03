<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarController;

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

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('/login', AuthController::class . '@login')->name('login');
});


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/car/search', CarController::class . '@search')
        ->name('car.search');
    Route::post('/car/{car}/book', CarController::class . '@book')
        ->name('car.book');
});
