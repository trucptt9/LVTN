<?php

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
Route::get('/login',[UserController::class,'login'])->name('user.login');
Route::get('/',[UserController::class,'dashboard'])->name('user.dashboard');

Route::prefix('brand')->group(function () {
   
    Route::get('detail',[UserController::class,'detail'])->name('brand.detail');
    
});
Route::prefix('stores')->group(function () {
    Route::get('/',[StoreController::class,'show'])->name('store.all');
    Route::get('/table',[StoreController::class,'table'])->name('store.table');
    
});