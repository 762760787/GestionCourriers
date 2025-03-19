<?php

use App\Http\Controllers\CourrierEntrantController;
use App\Http\Controllers\CourrierSortantController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/accueil',[CourrierEntrantController::class,'dashboard'] )->name('dashboard');

    Route::resource('courrier-entrants', CourrierEntrantController::class);
    Route::resource('courrier-sortants', CourrierSortantController::class);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});


Route::resource('login', AuthController::class);
// Routes d'authentification
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register.submit'); // Nouvelle route POST pour l'inscription
