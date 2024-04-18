<?php

use App\Http\Controllers\Api\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Api\Auth\RegisteredUserController;
use App\Http\Controllers\Api\GenderController;
use App\Http\Controllers\Api\MaritalStatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::middleware('auth:api')->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);

    Route::apiResource('genders', GenderController::class);
    Route::apiResource('marital-statuses', MaritalStatusController::class);

});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
