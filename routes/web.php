<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\VisaInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'fetch'], function () {
    Route::get('/district', [GeneralController::class, 'districtFetch'])->name('general.fetch.district');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'marital-statuses' => MaritalStatusController::class,
        'religions' => ReligionController::class,
        'agents' => AgentController::class,
        'visas' => VisaInfoController::class,
        'applications' => ApplicationController::class,
    ]);
});

require __DIR__ . '/auth.php';
