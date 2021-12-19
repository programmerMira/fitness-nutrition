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
Route::view("/article","article");

Route::get('/admin', function () {           return view('admin.dashboard.homepage'); });

//admin ['role:user'] !!!!!!!!!!!!!!

Route::get('/colors', function () {     return view('admin.dashboard.colors'); });
Route::get('/typography', function () { return view('admin.dashboard.typography'); });
Route::get('/charts', function () {     return view('admin.dashboard.charts'); });
Route::get('/widgets', function () {    return view('admin.dashboard.widgets'); });
Route::get('/404', function () {        return view('admin.dashboard.404'); });
Route::get('/500', function () {        return view('admin.dashboard.500'); });
Route::prefix('base')->group(function () {
    Route::get('/breadcrumb', function(){   return view('admin.dashboard.base.breadcrumb'); });
    Route::get('/cards', function(){        return view('admin.dashboard.base.cards'); });
    Route::get('/carousel', function(){     return view('admin.dashboard.base.carousel'); });
    Route::get('/collapse', function(){     return view('admin.dashboard.base.collapse'); });

    Route::get('/forms', function(){        return view('admin.dashboard.base.forms'); });
    Route::get('/jumbotron', function(){    return view('admin.dashboard.base.jumbotron'); });
    Route::get('/list-group', function(){   return view('admin.dashboard.base.list-group'); });
    Route::get('/navs', function(){         return view('admin.dashboard.base.navs'); });

    Route::get('/pagination', function(){   return view('admin.dashboard.base.pagination'); });
    Route::get('/popovers', function(){     return view('admin.dashboard.base.popovers'); });
    Route::get('/progress', function(){     return view('admin.dashboard.base.progress'); });
    Route::get('/scrollspy', function(){    return view('admin.dashboard.base.scrollspy'); });

    Route::get('/switches', function(){     return view('admin.dashboard.base.switches'); });
    Route::get('/tables', function () {     return view('admin.dashboard.base.tables'); });
    Route::get('/tabs', function () {       return view('admin.dashboard.base.tabs'); });
    Route::get('/tooltips', function () {   return view('admin.dashboard.base.tooltips'); });
});
Route::prefix('buttons')->group(function () {
    Route::get('/buttons', function(){          return view('admin.dashboard.buttons.buttons'); });
    Route::get('/button-group', function(){     return view('admin.dashboard.buttons.button-group'); });
    Route::get('/dropdowns', function(){        return view('admin.dashboard.buttons.dropdowns'); });
    Route::get('/brand-buttons', function(){    return view('admin.dashboard.buttons.brand-buttons'); });
});
Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
    Route::get('/coreui-icons', function(){         return view('admin.dashboard.icons.coreui-icons'); });
    Route::get('/flags', function(){                return view('admin.dashboard.icons.flags'); });
    Route::get('/brands', function(){               return view('admin.dashboard.icons.brands'); });
});
Route::prefix('notifications')->group(function () {
    Route::get('/alerts', function(){   return view('admin.dashboard.notifications.alerts'); });
    Route::get('/badge', function(){    return view('admin.dashboard.notifications.badge'); });
    Route::get('/modals', function(){   return view('admin.dashboard.notifications.modals'); });
});

//admin ['role:admin'] !!!!!!!!!!!!!!

Route::resource('bread',  'BreadController');   //create BREAD (resource)
Route::resource('users',        'UsersController')->except( ['create', 'store'] );
Route::resource('roles',        'RolesController');
Route::resource('mail',        'MailController');
Route::get('prepareSend/{id}',        'MailController@prepareSend')->name('prepareSend');
Route::post('mailSend/{id}',        'MailController@send')->name('mailSend');
Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');
Route::prefix('menu/element')->group(function () {
    Route::get('/',             'MenuElementController@index')->name('menu.index');
    Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
    Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
    Route::get('/create',       'MenuElementController@create')->name('menu.create');
    Route::post('/store',       'MenuElementController@store')->name('menu.store');
    Route::get('/get-parents',  'MenuElementController@getParents');
    Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
    Route::post('/update',      'MenuElementController@update')->name('menu.update');
    Route::get('/show',         'MenuElementController@show')->name('menu.show');
    Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
});
Route::prefix('menu/menu')->group(function () {
    Route::get('/',         'MenuController@index')->name('menu.menu.index');
    Route::get('/create',   'MenuController@create')->name('menu.menu.create');
    Route::post('/store',   'MenuController@store')->name('menu.menu.store');
    Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
    Route::post('/update',  'MenuController@update')->name('menu.menu.update');
    Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
});
Route::prefix('media')->group(function () {
    Route::get('/',                 'MediaController@index')->name('media.folder.index');
    Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
    Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
    Route::get('/folder',           'MediaController@folder')->name('media.folder');
    Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
    Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

    Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
    Route::get('/file',             'MediaController@file');
    Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
    Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
    Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
    Route::post('/file/cropp',      'MediaController@cropp');
    Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');
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
