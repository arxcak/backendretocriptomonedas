<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CriptomonedaController;
use App\Http\Controllers\MonedaController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('jwt.auth')->group(function () {
    Route::apiResource('moneda', MonedaController::class);

    Route::controller(CriptomonedaController::class)->prefix('/criptomoneda')->group(function () {
        Route::get('', 'index');
    });

    Route::controller(CriptomonedaController::class)->prefix('/criptomonedas')->group(function () {
        Route::post('', 'store');
        Route::put('/{id}', 'update');
    });
});