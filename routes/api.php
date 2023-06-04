<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserRecordDataController;
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

// Register User
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/account', [AuthController::class, 'accountData']);

    // USER RECORD DATA
    Route::get('/user-record-data', [UserRecordDataController::class, 'index']);
    Route::post('/user-record-data', [UserRecordDataController::class, 'store']);
    Route::get('/user-record-data/{id}', [UserRecordDataController::class, 'show']);
    Route::patch('/user-record-data/{id}', [UserRecordDataController::class, 'update']);
    Route::delete('/user-record-data/{id}', [UserRecordDataController::class, 'destroy']);

    // ACTIVITY DATA
    Route::get('/activities', [ActivityController::class, 'index']);
    Route::post('/activities', [ActivityController::class, 'store']);
    Route::get('/activities/{id}', [ActivityController::class, 'show']);
    Route::patch('/activities/{id}', [ActivityController::class, 'update']);
    Route::delete('/activities/{id}', [ActivityController::class, 'destroy']);

    // DIARY DATA
    Route::get('/diaries', [DiaryController::class, 'index']);
    Route::post('/diaries', [DiaryController::class, 'store']);
    Route::get('/diaries/{id}', [DiaryController::class, 'show']);
    Route::patch('/diaries/{id}', [DiaryController::class, 'update']);
    Route::delete('/diaries/{id}', [DiaryController::class, 'destroy']);

    // FOOD DATA
    Route::get('/foods', [FoodController::class, 'index']);
    Route::post('/foods', [FoodController::class, 'store']);
    Route::get('/foods/{id}', [FoodController::class, 'show']);
    Route::patch('/foods/{id}', [FoodController::class, 'update']);
    Route::delete('/foods/{id}', [FoodController::class, 'destroy']);
});
