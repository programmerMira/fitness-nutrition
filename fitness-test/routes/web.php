<?php

use Illuminate\Support\Facades\Route;

Route::view("/","index");
Route::view("/home","account/home");
Route::view("/diet","account/diet");
Route::view("/workout","account/workout");
Route::view("/plugin","account/plugin");
Route::view("/question","account/question");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
