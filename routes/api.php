<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BMIController;
use App\Http\Controllers\BMRController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\GulaDarahController;
use App\Http\Controllers\Hba1cController;
use App\Http\Controllers\KolesterolController;
use App\Http\Controllers\KonsumsiMakananController;
use App\Http\Controllers\TekananDarahController;
use App\Http\Controllers\UserRecordDataController;
use App\Models\KonsumsiMakanan;
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
    
    // ACTIVITAS
    Route::get('/aktivitas', [AktivitasController::class, 'index']);
    Route::patch('/tambah-aktivitas/{id}', [AktivitasController::class, 'update']);

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

    // BMI
    Route::post('/hitung-bmi', [BMIController::class, 'store']);
    Route::get('/bmi', [BMIController::class, 'index']);

    // BMT
    Route::post('/hitung-bmr', [BMRController::class, 'store']);
    Route::get('/bmr', [BMIController::class, 'index']);

    // Gula Darah
    Route::post('/hitung-gula-darah', [GulaDarahController::class, 'store']);
    Route::get('/gula-darah', [GulaDarahController::class, 'index']);

    // HBA1C
    Route::post('/hitung-hba1c', [Hba1cController::class, 'store']);
    Route::get('/hba1c', [Hba1cController::class, 'index']);

    // TEKANAN DARAH
    Route::post('/hitung-tekanan-darah', [TekananDarahController::class, 'store']);
    Route::get('/tekanan-darah', [TekananDarahController::class, 'index']);

    // KONSUMSI MAKANAN
    Route::post('/tambah-konsumsi-makanan', [KonsumsiMakananController::class, 'store']);
    Route::get('/konsumsi-makanan', [KonsumsiMakananController::class, 'index']);

     // KOLESTEROL
     Route::post('/hitung-kolsterol', [KolesterolController::class, 'store']);
     Route::get('/kolesterol', [KolesterolController::class, 'index']);
});
