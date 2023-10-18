<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\User\DepartmentController;
use App\Http\Controllers\User\AreaController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\StoreController;
use App\Http\Controllers\User\TableController;
use App\Http\Controllers\User\StaffController;
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



Route::get('/login', [UserController::class, 'login']);
Route::get('/admin-index', [HomeController::class, 'index']);

Route::get('/user-index', [UserController::class, 'index']);



Route::prefix('areas')->group(function () {
    Route::get('/', [AreaController::class, 'index'])->name('area.index');
    Route::get('/table', [AreaController::class, 'table'])->name('area.table');
    Route::get('/report', [AreaController::class, 'report'])->name('area.report');
    Route::get('/detail', [AreaController::class, 'detail'])->name('area.detail');
    
});
Route::prefix('tables')->group(function () {
    Route::get('/', [TableController::class, 'index'])->name('table.index');
    Route::get('/table', [TableController::class, 'table'])->name('table.table');
    Route::get('/report', [TableController::class, 'report'])->name('table.report');
    Route::get('/detail', [TableController::class, 'detail'])->name('table.detail');
    
});
Route::prefix('stores')->group(function () {
    Route::get('/', [StoreController::class, 'index'])->name('store.index');
    Route::get('/table', [StoreController::class, 'table'])->name('store.table');
    Route::get('/report', [StoreController::class, 'report'])->name('store.report');
    Route::get('/detail', [StoreController::class, 'detail'])->name('store.detail');
    
    
});
Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/table', [OrderController::class, 'table'])->name('order.table');
    Route::get('/report', [OrderController::class, 'report'])->name('order.report');
    Route::get('/detail', [OrderController::class, 'detail'])->name('order.detail');
    
    
});
Route::prefix('staffs')->group(function () {
    Route::get('/', [StaffController::class, 'index'])->name('staffs');
    Route::get('/list', [StaffController::class, 'list'])->name('staffs.list');
    Route::get('/staff_table', [StaffController::class, 'staff_table'])->name('staffs.table');
    Route::get('staff_detail', [StaffController::class, 'staff_detail'])->name('staffs.detail');
    Route::get('/list_schedule', [StaffController::class, 'schedule'])->name('staffs.schedule');

   
});

Route::prefix('departments')->group(function () {
    Route::get('/', [DepartmentController::class, 'departments'])->name('departments.index');
    Route::get('/table', [DepartmentController::class, 'table'])->name('departments.table');
    Route::get('/detail', [DepartmentController::class, 'detail'])->name('departments.detail');

});