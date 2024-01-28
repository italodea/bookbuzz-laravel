<?php

use App\Http\Controllers\Api\V1\BookClub\BookClubController;
use App\Http\Controllers\Api\V1\BookClub\JoinBookClubController;
use App\Http\Controllers\Api\V1\BookClub\LeaveBookClubController;
use App\Http\Controllers\Api\V1\BookPoll\BookPollController;
use App\Http\Controllers\Api\V1\UserController;
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
        Route::get('/current-user', [UserController::class, 'getCurrentUserData']);
        Route::get('/check-token-validity', [UserController::class, 'checkTokenValidity']);
        Route::apiResource('/bookClub', BookClubController::class);
        Route::patch('/bookClub/{bookClub}/join', JoinBookClubController::class);
        Route::patch('/bookClub/{bookClub}/leave', LeaveBookClubController::class);
        Route::apiResource('/bookClub/{bookClub}/poll', BookPollController::class);
    });
});
