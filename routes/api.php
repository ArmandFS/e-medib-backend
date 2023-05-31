<?php

use App\Http\Controllers\AuthController;
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

    // USER RECORD DATA
    Route::post('/user-record-data', [UserRecordDataController::class, 'store']);
    Route::get('/user-record-data', [UserRecordDataController::class, 'index']);
    Route::get('/user-record-data/{id}', [UserRecordDataController::class, 'show'])->middleware('ensure-data-owner');
    Route::patch('/user-record-data/{id}', [UserRecordDataController::class, 'update'])->middleware('ensure-data-owner');
    Route::delete('/user-record-data/{id}', [UserRecordDataController::class, 'destroy'])->middleware('ensure-data-owner');
});
