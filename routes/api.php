<?php

use App\Http\Controllers\Api\V1\AccessTokenController;
use App\Http\Controllers\Api\V1\BookClubController;
use App\Http\Controllers\Api\V1\UserController;
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

Route::prefix('v1')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('/current-user', [UserController::class, 'getCurrentUserData']);
            Route::get('/check-token-validity', [UserController::class, 'checkTokenValidity']);
            Route::apiResource('/bookClub', BookClubController::class);
        });
    });
});
