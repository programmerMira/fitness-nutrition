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
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MainPageController;
#endregion

Route::get("/", [MainPageController::class,'index'])->name('main');
Route::view("/diet","diet")->middleware('auth');
Route::view("/workout","workout")->middleware('auth');
Route::view("/plugin","plugin")->middleware('auth');
Route::view("/question","question")->middleware('auth')->name('question');
Route::view("/article","article")->middleware('auth');
Route::get("/article/{id}", [ArticleController::class,'index']);

Route::prefix('/admin')->group(function () {
    Route::get('/', function(){ return view('admin.dashboard.homepage'); });
    Route::prefix('/users')->group(function () {  // word: "icons" - not working as part of adress
        Route::get('/', function(){         return view('admin.dashboard.admin.usersList'); });
        Route::get('/show', function(){         return view('admin.dashboard.admin.userShow'); });
        Route::get('/edit', function(){         return view('admin.dashboard.admin.userEditForm'); });
    });
    Route::prefix('/menu')->group(function () {  // word: "icons" - not working as part of adress
        Route::get('/', function(){         return view('admin.dashboard.menu.menuList'); });
        Route::get('/show', function(){         return view('admin.dashboard.menu.menuShow'); });
        Route::get('/edit', function(){         return view('admin.dashboard.menu.menuEditForm'); });
        Route::get('/one-edit', function(){         return view('admin.dashboard.menu.menuOneEditForm'); });
    });
    Route::prefix('/workout')->group(function () {  // word: "icons" - not working as part of adress
        Route::get('/', function(){         return view('admin.dashboard.workout.workoutList'); });
        Route::get('/show', function(){         return view('admin.dashboard.workout.workoutShow'); });
        Route::get('/edit', function(){         return view('admin.dashboard.workout.workoutEditForm'); });
        Route::get('/one-edit', function(){         return view('admin.dashboard.workout.workoutOneEditForm'); });
    });
    Route::prefix('/question')->group(function () {  // word: "icons" - not working as part of adress
        Route::get('/', [ArticleController::class,'adminArticles'])->name('adminQuestion');
        Route::get('/show/{id}', [ArticleController::class,'adminArticle']);
        Route::get('/edit/{id}', [ArticleController::class,'adminShowArticle']);
        Route::post('/editArticle/{id}', [ArticleController::class,'adminEditArticle'])->name('editArticle');
        Route::get('/add', [ArticleController::class,'adminAddView']);
        Route::post('/addArticle', [ArticleController::class,'adminAddArticle'])->name('addArticle');
        Route::post('/deleteArticle/{id}', [ArticleController::class,'adminDeleteArticle'])->name('deleteArticle');
    });
    Route::prefix('/program')->group(function () {  // word: "icons" - not working as part of adress
        Route::get('/', function(){         return view('admin.dashboard.program.programList'); });
        Route::get('/edit', function(){         return view('admin.dashboard.program.programEditForm'); });
    });
    Route::prefix('/main')->group(function () {  // word: "icons" - not working as part of adress
        Route::get('/', [ArticleController::class,'adminMagePage'])->name('adminMagePage');
        Route::post('/edit/{id}', [ArticleController::class,'adminEditContent']);
    });
	Route::prefix('/notification')->group(function () {  // word: "icons" - not working as part of adress
		Route::get('/', [NotificationController::class,'list']);
		Route::get('/create', [NotificationController::class,'create'])->name('notification.create');
		Route::put('/update/{id}', [NotificationController::class,'edit'])->name('notification.edit');
		Route::delete('/delete/{id}', [NotificationController::class,'destroy'])->name('notification.destroy');
	});
});

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
Route::prefix('api/physics-parameter')->group(function () {
    Route::get('/list', [PhysicsParametersController::class,'index']);
    Route::get('/show/{id}', [PhysicsParametersController::class,'show']);
    Route::post('/create', [PhysicsParametersController::class,'store']);
    Route::put('/update/{id}', [PhysicsParametersController::class,'update']);
    Route::delete('/delete/{id}', [PhysicsParametersController::class,'destroy']);
});
