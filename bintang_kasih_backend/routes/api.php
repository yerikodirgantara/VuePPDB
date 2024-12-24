<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TeachersController;

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
    // return $request->user();
    // return response()->json(['user' => auth()->user()]);
    return response()->json(['user' => $request->user()]);
});

// Rute untuk autentikasi
Route::middleware('api')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Logout harus dilakukan dengan autentikasi
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});

// Rute yang memerlukan autentikasi
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user', [FormulirController::class, 'index']); // Untuk get user login
    Route::post('/students', [FormulirController::class, 'store']); // Untuk submit form
    Route::get('/user/student', [FormulirController::class, 'show']); // Untuk menampilkan data siswa yang login

    Route::get('/dashboard/{id}', [DashboardUserController::class, 'index']); // Untuk data dashboard

    Route::get('/get_student', [PaymentController::class, 'index']);
    Route::post('/payments', [PaymentController::class, 'store']);
});

Route::get('/teachers', [TeachersController::class, 'index']);


// Route::middleware('api')->group(function () {
//     Route::post('/register', [AuthController::class, 'register']);
//     Route::post('/login', [AuthController::class, 'login']);
//     Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

//     Route::post('/user', [FormulirController::class, 'index']); // Untuk get user login
//     Route::post('/students', [FormulirController::class, 'store']); // Untuk submit form
//     Route::get('/user/student', [FormulirController::class, 'show']); // Untuk menampilkan data siswa yang login

//     Route::get('/dashboard', [DashboardController::class, 'index']); 
// });
