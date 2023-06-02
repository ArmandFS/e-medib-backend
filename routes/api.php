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
    Route::get('/account', [AuthController::class, 'logout']);

    // USER RECORD DATA
    Route::get('/user-record-data', [UserRecordDataController::class, 'index']);
    Route::post('/user-record-data', [UserRecordDataController::class, 'store']);
    Route::get('/user-record-data/{id}', [UserRecordDataController::class, 'show'])->middleware('ensure-data-owner');
    Route::patch('/user-record-data/{id}', [UserRecordDataController::class, 'update'])->middleware('ensure-data-owner');
    Route::delete('/user-record-data/{id}', [UserRecordDataController::class, 'destroy'])->middleware('ensure-data-owner');

    // ACTIVITY DATA
    Route::get('/activity', [ActivityController::class, 'index']);
    Route::post('/activity', [ActivityController::class, 'store']);
    Route::get('/activity/{id}', [ActivityController::class, 'show']);
    Route::patch('/activity/{id}', [ActivityController::class, 'update']);
    Route::delete('/activity/{id}', [ActivityController::class, 'destroy']);

    // DIARY DATA
    Route::get('/diary', [DiaryController::class, 'index']);
    Route::post('/diary', [DiaryController::class, 'store']);
    Route::get('/diary/{id}', [DiaryController::class, 'show']);
    Route::patch('/diary/{id}', [DiaryController::class, 'update']);
    Route::delete('/diary/{id}', [DiaryController::class, 'destroy']);

    // FOOD DATA
    Route::get('/food', [FoodController::class, 'index']);
    Route::post('/food', [FoodController::class, 'store']);
    Route::get('/food/{id}', [FoodController::class, 'show']);
    Route::patch('/food/{id}', [FoodController::class, 'update']);
    Route::delete('/food/{id}', [FoodController::class, 'destroy']);
});
