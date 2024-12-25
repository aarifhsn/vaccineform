<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserVaccinationController;
use App\Http\Controllers\WebhookFormController;
use Illuminate\Support\Facades\Route;
use App\Models\VaccineCenter;

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
Route::post('/registration', [RegistrationController::class, 'store']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/vaccination/confim/{user}', [UserVaccinationController::class, 'confirm'])->name('vaccination.confirm');
Route::get('/vaccine-centers', function () {
    return VaccineCenter::all(['name']);
});

Route::post('/webhook/registration', [WebhookFormController::class, 'handleWebhook'])->name('webhook.registration');