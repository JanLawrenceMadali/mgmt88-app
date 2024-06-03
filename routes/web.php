<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::middleware(['admin'])->group(function () {
        Route::get('/patients', [PatientController::class, 'index']);
        Route::get('/patients/create', [PatientController::class, 'create']);
        Route::post('/patients/create', [PatientController::class, 'store']);
        Route::get('/patients/{id}/edit', [PatientController::class, 'edit']);
        Route::put('/patients/{id}/edit', [PatientController::class, 'update']);
        Route::get('/patients/{id}/delete', [PatientController::class, 'destroy']);
    });
});
