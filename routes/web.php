<?php

use App\Http\Controllers\CourrierEntrantController;
use App\Http\Controllers\CourrierSortantController;
use Illuminate\Support\Facades\Route;

Route::get('/',[CourrierEntrantController::class,'dashboard'] );

Route::resource('courrier-entrants', CourrierEntrantController::class);
Route::resource('courrier-sortants', CourrierSortantController::class);

