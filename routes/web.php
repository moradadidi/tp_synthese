<?php

use App\Http\Controllers\AviController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FormationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('etudiants', EtudiantController::class);
Route::resource('formations', FormationController::class);
Route::resource('classes', ClasseController::class);
Route::resource('avis', AviController::class);
