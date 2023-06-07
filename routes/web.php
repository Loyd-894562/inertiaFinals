<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return inertia('welcome');
});


Route::get('/login', [SiteController::class, 'loginForm'])->name('login');
Route::post('/login',[SiteController::class, 'login']);

Route::get('/register', [SiteController::class, 'registerForm'])->name('register');
Route::post('/register',[SiteController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {

    Route::post('/logout', [SiteController::class, 'logout']);

    Route::get('/tasks', [TaskController::class,'index']);
    Route::get('/tasks/create', [TaskController::class,'create']);
    Route::post('/tasks',[TaskController::class, 'store']);
    Route::get('/tasks/edit/{task}', [TaskController::class, 'edit']);
    Route::put('/tasks/{task}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
});