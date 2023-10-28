<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\User\DepartmentController;
use App\Http\Controllers\User\AreaController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\StoreController;
use App\Http\Controllers\User\TableController;
use App\Http\Controllers\User\StaffController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\User\PromotionController;
use App\Http\Controllers\User\UnitController;
use App\Http\Controllers\User\ProductController;
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

Route::get('/', [UserController::class, 'login']);

Route::get('/login', [UserController::class, 'login']);
Route::get('/admin-index', [HomeController::class, 'index']);

Route::get('/user-index', [UserController::class, 'index']);

Route::get('/order_page ', [StoreController::class, 'order_page'])->name('other_page');

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
Route::prefix('units')->group(function () {
    Route::get('/', [UnitController::class, 'index'])->name('unit.index');
    Route::get('/table', [UnitController::class, 'table'])->name('unit.table');
   
});
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/add', [ProductController::class, 'add'])->name('product.add');
    Route::get('/table', [ProductController::class, 'table'])->name('product.table');
   
});
Route::prefix('toppings')->group(function () {
    Route::get('/', [ProductController::class, 'topping'])->name('topping.index');
    Route::get('/table', [ProductController::class, 'topping_table'])->name('topping.table');
    Route::get('/add', [ProductController::class, 'topping_add'])->name('topping.add');
   
});
Route::prefix('categorys_topping')->group(function () {
    Route::get('/', [ProductController::class, 'category_topping'])->name('category_topping.index');
    Route::get('/table', [ProductController::class, 'category_topping_table'])->name('category_topping.table');
   
});
Route::prefix('categorys')->group(function () {
    Route::get('/', [ProductController::class, 'category'])->name('category.index');
    Route::get('/table', [ProductController::class, 'category_table'])->name('category.table');
   
});
Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/table', [CustomerController::class, 'table'])->name('customer.table');
    Route::get('/report', [CustomerController::class, 'report'])->name('customer.report');
    Route::get('/detail', [CustomerController::class, 'detail'])->name('customer.detail');
   
});
Route::prefix('promotions')->group(function () {
    Route::get('/', [PromotionController::class, 'index'])->name('promotion.index');
    Route::get('/table', [PromotionController::class, 'table'])->name('promotion.table');
    Route::get('/report', [PromotionController::class, 'report'])->name('promotion.report');
    Route::get('/detail', [PromotionController::class, 'detail'])->name('promotion.detail');
    Route::get('/table_log', [PromotionController::class, 'table_log'])->name('promotion.table_log');
   
});
Route::prefix('customer_group')->group(function () {
    Route::get('/', [CustomerController::class, 'index_group'])->name('customer_group.index');
    Route::get('/table', [CustomerController::class, 'table_group'])->name('customer_group.table');
    
});
Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/table', [OrderController::class, 'table'])->name('order.table');
    Route::get('/table_detail', [OrderController::class, 'table_detail'])->name('order.table_detail');
    Route::get('/report', [OrderController::class, 'report'])->name('order.report');
    Route::get('/detail', [OrderController::class, 'detail'])->name('order.detail');
    
    
});
Route::prefix('staffs')->group(function () {
    Route::get('/', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/table', [StaffController::class, 'table'])->name('staff.table');
    Route::get('detail', [StaffController::class, 'detail'])->name('staff.detail');
    Route::get('/report', [StaffController::class, 'report'])->name('staff.report');
    Route::get('/table_permision', [StaffController::class, 'table_permision'])->name('staff.table_permision');
    Route::get('/table_shift', [StaffController::class, 'table_shift'])->name('staff.shift_table');
    
});



Route::prefix('departments')->group(function () {
    Route::get('/', [DepartmentController::class, 'departments'])->name('departments.index');
    Route::get('/table', [DepartmentController::class, 'table'])->name('departments.table');
    Route::get('/detail', [DepartmentController::class, 'detail'])->name('departments.detail');
    Route::get('/table_permision', [DepartmentController::class, 'table_permision'])->name('departmentt.table_permision');

});