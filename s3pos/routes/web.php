<?php

use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\DepartmentController;
use App\Http\Controllers\User\AreaController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\CouponController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\StoreController;
use App\Http\Controllers\User\TableController;
use App\Http\Controllers\User\StaffController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\User\CustomerGroupController;
use App\Http\Controllers\User\ExportController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ImportController;
use App\Http\Controllers\User\MaterialController;
use App\Http\Controllers\User\PromotionController;
use App\Http\Controllers\User\UnitController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ReportController;
use App\Http\Controllers\User\SettingController;
use App\Http\Controllers\User\ShiftController;
use App\Http\Controllers\User\StaffHistoryController;
use App\Http\Controllers\User\SupplierController;
use App\Http\Controllers\User\ToppingCategoryController;
use App\Http\Controllers\User\ToppingController;
use App\Http\Controllers\User\WarehouseController;
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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_post'])->name('login_post');
Route::get('forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');
Route::post('forgot_password', [AuthController::class, 'forgot_password_post'])->name('forgot_password_post');

Route::middleware(['auth', 'checkStaff'])->group(function () {
    Route::get('logout', [HomeController::class, 'logout'])->name('logout');
    // home
    Route::get('', [HomeController::class, 'index'])->name('index');

    // profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('', [ProfileController::class, 'index'])->name('index');
    });

    // store
    Route::prefix('roles')->name('role.')->group(function () {
        Route::get('', [RoleController::class, 'index'])->name('index');
        Route::get('table', [RoleController::class, 'table'])->name('table');
        Route::get('detail', [RoleController::class, 'detail'])->name('detail');
    });
    Route::prefix('stores')->name('store.')->group(function () {
        Route::get('', [StoreController::class, 'index'])->name('index');
        Route::get('table', [StoreController::class, 'table'])->name('table');
        Route::get('report', [StoreController::class, 'report'])->name('report');
        Route::get('detail', [StoreController::class, 'detail'])->name('detail');
    });
    Route::prefix('staffs')->name('staff.')->group(function () {
        Route::get('', [StaffController::class, 'index'])->name('index');
        Route::get('table', [StaffController::class, 'table'])->name('table');
        Route::get('report', [StaffController::class, 'report'])->name('report');
        Route::get('detail', [StaffController::class, 'detail'])->name('detail');
    });
    Route::prefix('departments')->name('department.')->group(function () {
        Route::get('', [DepartmentController::class, 'index'])->name('index');
        Route::get('table', [DepartmentController::class, 'table'])->name('table');
        Route::get('detail', [DepartmentController::class, 'detail'])->name('detail');
    });
    Route::prefix('shifts')->name('shift.')->group(function () {
        Route::get('', [ShiftController::class, 'index'])->name('index');
        Route::get('table', [ShiftController::class, 'table'])->name('table');
        Route::get('detail', [ShiftController::class, 'detail'])->name('detail');
    });
    Route::prefix('areas')->name('area.')->group(function () {
        Route::get('', [AreaController::class, 'index'])->name('index');
        Route::get('table', [AreaController::class, 'table'])->name('table');
        Route::get('detail', [AreaController::class, 'detail'])->name('detail');
    });
    Route::prefix('tables')->name('table.')->group(function () {
        Route::get('', [TableController::class, 'index'])->name('index');
        Route::get('table', [TableController::class, 'table'])->name('table');
        Route::get('report', [TableController::class, 'report'])->name('report');
        Route::get('detail', [TableController::class, 'detail'])->name('detail');
    });

    // product
    Route::prefix('product_categories')->name('product_category.')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('table', [ProductController::class, 'table'])->name('table');
    });
    Route::prefix('products')->name('product.')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('add', [ProductController::class, 'add'])->name('add');
        Route::get('table', [ProductController::class, 'table'])->name('table');
    });
    Route::prefix('topping_categories')->name('topping_category.')->group(function () {
        Route::get('', [ToppingCategoryController::class, 'index'])->name('index');
        Route::get('table', [ToppingCategoryController::class, 'table'])->name('table');
    });
    Route::prefix('toppings')->name('topping.')->group(function () {
        Route::get('', [ToppingController::class, 'index'])->name('index');
        Route::get('add', [ToppingController::class, 'add'])->name('add');
        Route::get('table', [ToppingController::class, 'table'])->name('table');
    });

    // promotion
    Route::prefix('promotions')->name('promotion.')->group(function () {
        Route::get('', [PromotionController::class, 'index'])->name('index');
        Route::get('table', [PromotionController::class, 'table'])->name('table');
        Route::get('report', [PromotionController::class, 'report'])->name('report');
        Route::get('detail', [PromotionController::class, 'detail'])->name('detail');
    });
    Route::prefix('coupons')->name('coupon.')->group(function () {
        Route::get('', [CouponController::class, 'index'])->name('index');
        Route::get('table', [CouponController::class, 'table'])->name('table');
        Route::get('report', [CouponController::class, 'report'])->name('report');
        Route::get('detail', [CouponController::class, 'detail'])->name('detail');
    });
    Route::prefix('customer_groups')->name('customer_group.')->group(function () {
        Route::get('', [CustomerGroupController::class, 'index'])->name('index');
        Route::get('table', [CustomerGroupController::class, 'table'])->name('table');
    });
    Route::prefix('customers')->name('customer.')->group(function () {
        Route::get('', [CustomerController::class, 'index'])->name('index');
        Route::get('table', [CustomerController::class, 'table'])->name('table');
        Route::get('report', [CustomerController::class, 'report'])->name('report');
        Route::get('detail', [CustomerController::class, 'detail'])->name('detail');
    });

    // warehouse
    Route::prefix('warehouses')->name('warehouse.')->group(function () {
        Route::get('', [WarehouseController::class, 'index'])->name('index');
        Route::get('table', [WarehouseController::class, 'table'])->name('table');
    });
    Route::prefix('imports')->name('import.')->group(function () {
        Route::get('', [ImportController::class, 'index'])->name('index');
        Route::get('table', [ImportController::class, 'table'])->name('table');
    });
    Route::prefix('exports')->name('export.')->group(function () {
        Route::get('', [ExportController::class, 'index'])->name('index');
        Route::get('table', [ExportController::class, 'table'])->name('table');
    });
    Route::prefix('materials')->name('material.')->group(function () {
        Route::get('', [MaterialController::class, 'index'])->name('index');
        Route::get('table', [MaterialController::class, 'table'])->name('table');
    });
    Route::prefix('suppliers')->name('supplier.')->group(function () {
        Route::get('', [SupplierController::class, 'index'])->name('index');
        Route::get('table', [SupplierController::class, 'table'])->name('table');
    });
    Route::prefix('units')->name('unit.')->group(function () {
        Route::get('', [UnitController::class, 'index'])->name('index');
        Route::get('table', [UnitController::class, 'table'])->name('table');
    });

    // report
    Route::prefix('orders')->name('order.')->group(function () {
        Route::get('', [OrderController::class, 'index'])->name('index');
        Route::get('table', [OrderController::class, 'table'])->name('table');
        Route::get('report', [OrderController::class, 'report'])->name('report');
        Route::get('detail', [OrderController::class, 'detail'])->name('detail');
    });
    Route::prefix('reports')->name('report.')->group(function () {
        Route::get('', [ReportController::class, 'index'])->name('index');
    });

    // other
    Route::prefix('settings')->name('setting.')->group(function () {
        Route::get('', [SettingController::class, 'index'])->name('index');
    });
    Route::prefix('staff_history')->name('staff_history.')->group(function () {
        Route::get('', [StaffHistoryController::class, 'index'])->name('index');
    });
});
