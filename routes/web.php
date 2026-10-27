<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ScheduleController;


Route::resource('pasien', PatientController::class);
Route::resource('poli', PoliController::class);
Route::resource('dokter', DoctorController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


Route::get('/dokter', [DoctorController::class, 'index'])->name('dokter.index');


Route::get('/pendaftaran', [RegistrationController::class, 'index'])
    ->name('registrations.index');

Route::get('/jadwal', [ScheduleController::class, 'index']);
Route::get('/jadwal/{hari}', [ScheduleController::class, 'show']);
