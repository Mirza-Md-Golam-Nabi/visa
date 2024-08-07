<?php

use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Api\Auth\RegisteredUserController;
use App\Http\Controllers\Api\MedicalController;
use App\Http\Controllers\Api\PassengerController;
use App\Http\Controllers\Api\PassengerVisaController;
use App\Http\Controllers\Api\VisaInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::middleware('auth:api')->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);

    Route::apiResources([
        'agents' => AgentController::class,
        'visas' => VisaInfoController::class,
        'passengers' => PassengerController::class,
        'medicals' => MedicalController::class,
        'applications' => ApplicationController::class,
        'passenger-visas' => PassengerVisaController::class,
    ]);

});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
