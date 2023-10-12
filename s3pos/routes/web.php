<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/', [UserController::class, 'dashboard'])->name('user.dashboard');

Route::get('/stores', [AreaController::class, 'show'])->name('user.stores');

Route::get('/admin-index', [HomeController::class, 'index']);