<?php

use Illuminate\Support\Facades\Route;

#region controllers usage
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivityCalendarController;
use App\Http\Controllers\TrainingUserController;
use App\Http\Controllers\FoodCalendarController;
use App\Http\Controllers\UserMenuController;
use App\Http\Controllers\PersonalAccountController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PhysicsParametersController;
#endregion

Route::view("/","index")->name('main');
Route::view("/diet","diet");
Route::view("/workout","workout");
Route::view("/plugin","plugin");
Route::view("/question","question");

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('api/personal-account')->group(function () {
    Route::get('/list', [PersonalAccountController::class,'index']);
    Route::get('/show/{id}', [PersonalAccountController::class,'show']);
    Route::post('/create', [PersonalAccountController::class,'store']);
    Route::put('/update/{id}', [PersonalAccountController::class,'update']);
    Route::delete('/delete/{id}', [PersonalAccountController::class,'destroy']);
});
Route::prefix('api/user-menu')->group(function () {
    Route::get('/list', [UserMenuController::class,'index']);
    Route::get('/show/{id}', [UserMenuController::class,'show']);
    Route::post('/create', [UserMenuController::class,'store']);
    Route::put('/update/{id}', [UserMenuController::class,'update']);
    Route::delete('/delete/{id}', [UserMenuController::class,'destroy']);
});
Route::prefix('api/food-calendar')->group(function () {
    Route::get('/list', [FoodCalendarController::class,'index']);
    Route::get('/show/{id}', [FoodCalendarController::class,'show']);
    Route::post('/create', [FoodCalendarController::class,'store']);
    Route::put('/update/{id}', [FoodCalendarController::class,'update']);
    Route::delete('/delete/{id}', [FoodCalendarController::class,'destroy']);
});
Route::prefix('api/training-user')->group(function () {
    Route::get('/list', [TrainingUserController::class,'index']);
    Route::get('/show/{id}', [TrainingUserController::class,'show']);
    Route::post('/create', [TrainingUserController::class,'store']);
    Route::put('/update/{id}', [TrainingUserController::class,'update']);
    Route::delete('/delete/{id}', [TrainingUserController::class,'destroy']);
});
Route::prefix('api/activity-calendar')->group(function () {
    Route::get('/list', [ActivityCalendarController::class,'index']);
    Route::get('/show/{id}', [ActivityCalendarController::class,'show']);
    Route::post('/create', [ActivityCalendarController::class,'store']);
    Route::put('/update/{id}', [ActivityCalendarController::class,'update']);
    Route::delete('/delete/{id}', [ActivityCalendarController::class,'destroy']);
});
Route::prefix('api/notification')->group(function () {
    Route::get('/list', [NotificationController::class,'index']);
    Route::get('/show/{id}', [NotificationController::class,'show']);
    Route::post('/create', [NotificationController::class,'store']);
    Route::put('/update/{id}', [NotificationController::class,'update']);
    Route::delete('/delete/{id}', [NotificationController::class,'destroy']);
});
Route::prefix('api/physics-parameters')->group(function () {
    Route::get('/list', [PhysicsParametersController::class,'index']);
    Route::get('/show/{id}', [PhysicsParametersController::class,'show']);
    Route::post('/create', [PhysicsParametersController::class,'store']);
    Route::put('/update/{id}', [PhysicsParametersController::class,'update']);
    Route::delete('/delete/{id}', [PhysicsParametersController::class,'destroy']);
});