<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\DeleteController;

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

Route::post('/regis', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'check']);
Route::post('/log', App\Http\Controllers\LogoutController::class)->name('logout');
Route::get('/show', [ShowController::class, 'show']);
Route::delete('delete/{id}', [DeleteController::class, 'deleteUser']);
Route::get('update/{id}', [DeleteController::class, 'updateUser']);