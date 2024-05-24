<?php

use App\Http\Middleware\checklogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\settings\settingscontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.layouts.layout');
});
Route::get('/dashboard', function () {
    return view('dashboard.index');
});
route::prefix("dashboard")->middleware(["auth","checklogin"])->group(function(){
    Route::get('/', function () {
        return view('dashboard.layouts.layout');
    })->name("dashboard.settings.layout");
    Route::get('/settings', function () {
        return view('dashboard.settings');
    })->name("dashboard.settings");
    Route::POST('/settings/update',[settingscontroller::class,"update"])->name("dashboard.settings.update");
    Route::POST('/settings/store',[settingscontroller::class,"store"])->name("dashboard.settings.store");
    Route::get('/users/all',[UserController::class,"usersall"])->name("users.all");
    Route::POST('/users/{id}/delete',[UserController::class,"delete"])->name("users.delete");
    Route::get('/users/showUser',[UserController::class,"showUser"])->name("users.showUser");
    // Route::resource([
    //     "users"=>UserController::class
    // ]);
    Route::resource('users', UserController::class);


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
