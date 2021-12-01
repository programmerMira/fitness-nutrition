<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function (Request $request) {
   $users= \App\Models\User::all();


    return response()->json($users);
});

Route::get('/users/{id}', function (Request $request, User $user) {
    //$user= \App\Models\User::find($id);


    return response()->json($user);
});


Route::apiResource('problem-zone', App\Http\Controllers\ProblemZoneController::class);

Route::apiResource('life-style', App\Http\Controllers\LifeStyleController::class);

Route::apiResource('training-location', App\Http\Controllers\TrainingLocationController::class);

Route::apiResource('menu-calory', App\Http\Controllers\MenuCaloryController::class);

Route::apiResource('menu-type', App\Http\Controllers\MenuTypeController::class);


Route::apiResource('personal-account', App\Http\Controllers\PersonalAccountController::class);


Route::apiResource('menu', App\Http\Controllers\MenuController::class);

Route::apiResource('user-menu', App\Http\Controllers\UserMenuController::class);

Route::apiResource('food-calendar', App\Http\Controllers\FoodCalendarController::class);

Route::apiResource('training', App\Http\Controllers\TrainingController::class);

Route::apiResource('training-user', App\Http\Controllers\TrainingUserController::class);

Route::apiResource('activity-calendar', App\Http\Controllers\ActivityCalendarController::class);
