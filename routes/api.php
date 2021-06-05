<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ColumnController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/users/{user}/boards', [UserController::class, 'boards']);

    Route::apiResource('boards', BoardController::class)->except('index');
    Route::get('/boards/{board}/columns', [BoardController::class, 'columns']);
    Route::post('/boards/{board}/columns', [BoardController::class, 'storeColumn']);

    Route::apiResource('columns', ColumnController::class)->except(['index', 'store']);
    Route::get('/columns/{column}/cards', [ColumnController::class, 'cards']);
    Route::post('/columns/{column}/cards', [ColumnController::class, 'storeCard']);

    Route::apiResource('cards', CardController::class)->except(['index', 'store']);
});
