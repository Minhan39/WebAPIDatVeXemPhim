<?php

use App\Http\Controllers\CalendarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\OpenningDayController;
use App\Http\Controllers\ShowTimeController;

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

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::put('/category', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

Route::get('/movie', [MovieController::class, 'index']);
Route::post('/movie', [MovieController::class, 'store']);
Route::get('/movie/{id}', [MovieController::class, 'show']);
Route::put('/movie', [MovieController::class, 'update']);
Route::delete('/movie/{id}', [MovieController::class, 'destroy']);

Route::get('/cinema', [CinemaController::class, 'index']);
Route::post('/cinema', [CinemaController::class, 'store']);
Route::get('/cinema/{id}', [CinemaController::class, 'show']);
Route::put('/cinema', [CinemaController::class, 'update']);
Route::delete('/cinema/{id}', [CinemaController::class, 'destroy']);

Route::get('/openning_day', [OpenningDayController::class, 'index']);
Route::post('/openning_day', [OpenningDayController::class, 'store']);
Route::get('/openning_day/{id}', [OpenningDayController::class, 'show']);
Route::put('/openning_day', [OpenningDayController::class, 'update']);
Route::delete('/openning_day/{id}', [OpenningDayController::class, 'destroy']);

Route::get('/show_time', [ShowTimeController::class, 'index']);
Route::post('/show_time', [ShowTimeController::class, 'store']);
Route::get('/show_time/{id}', [ShowTimeController::class, 'show']);
Route::put('/show_time', [ShowTimeController::class, 'update']);
Route::delete('/show_time/{id}', [ShowTimeController::class, 'destroy']);

Route::get('calendar/{id}', [CalendarController::class, 'index']);