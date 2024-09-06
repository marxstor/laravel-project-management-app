<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestQueryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MyTaskController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// routes for authentication
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('auth.login');
    Route::post('/', 'loginUser')->name('auth.loginUser');
    Route::get('/signup', 'signup')->name('auth.signup');
    Route::post('/signup', 'signupUser')->name('auth.signupUser');
    Route::get('/logout', 'logout')->name('auth.logout');
});

// grouping many resource controllers
Route::middleware('auth')->group(function () {
    Route::resources([
        'project' => ProjectController::class,
        'tasks' => TaskController::class,
        'users' => UserController::class,
        'my_task' => MyTaskController::class,
    ]);
});