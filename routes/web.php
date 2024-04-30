<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReligionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'genders' => GenderController::class,
        'marital-statuses' => MaritalStatusController::class,
        'religions' => ReligionController::class,
        'applications' => ApplicationController::class,
    ]);
});

require __DIR__ . '/auth.php';
