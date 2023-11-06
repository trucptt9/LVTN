<?php

use App\Http\Controllers\User\CardMemberController;
use App\Http\Controllers\User\DepartmentController;
use App\Http\Controllers\User\AreaController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\BookingController;
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
use App\Http\Controllers\User\PositionController;
use App\Http\Controllers\User\PromotionController;
use App\Http\Controllers\User\UnitController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CategoryProductController;
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
Route::get('reset', [AuthController::class, 'reset'])->name('reset');
Route::post('reset', [AuthController::class, 'reset_post'])->name('reset_post');
Route::get('license', [AuthController::class, 'license'])->name('license');
Route::post('license', [AuthController::class, 'license_active'])->name('license_active');

Route::middleware(['auth','checkStaff'])->group(function () {
    Route::get('logout', [HomeController::class, 'logout'])->name('logout');
    // home
    Route::get('', [HomeController::class, 'index'])->name('index');

    // store
    Route::prefix('stores')->name('store.')->group(function () {
        Route::get('', [StoreController::class, 'index'])->name('index');
        Route::get('table', [StoreController::class, 'table'])->name('table');
        Route::get('report', [StoreController::class, 'report'])->name('report');
        Route::get('detail/{id}', [StoreController::class, 'detail'])->name('detail');
    });
    Route::prefix('staffs')->name('staff.')->group(function () {
        Route::get('', [StaffController::class, 'index'])->name('index');
        Route::get('table', [StaffController::class, 'table'])->name('table');
        Route::get('report', [StaffController::class, 'report'])->name('report');
        Route::get('detail/{id}', [StaffController::class, 'detail'])->name('detail');
    });
    Route::prefix('departments')->name('department.')->group(function () {
        Route::get('', [DepartmentController::class, 'index'])->name('index');
        Route::get('list', [DepartmentController::class, 'list'])->name('list');
        Route::get('detail/{id}', [DepartmentController::class, 'detail'])->name('detail');
        Route::post('insert', [DepartmentController::class, 'insert'])->name('insert');
        Route::post('update', [DepartmentController::class, 'update'])->name('update');
        Route::get('delete', [DepartmentController::class, 'delete'])->name('delete');
    });
    Route::prefix('position')->name('position.')->group(function () {
        Route::get('', [PositionController::class, 'index'])->name('index');
        Route::get('list', [PositionController::class, 'list'])->name('list');
        Route::get('detail/{id}', [PositionController::class, 'detail'])->name('detail');
        Route::post('insert', [PositionController::class, 'insert'])->name('insert');
        Route::post('update', [PositionController::class, 'update'])->name('update');
        Route::get('delete', [PositionController::class, 'delete'])->name('delete');
    });
    Route::prefix('shifts')->name('shift.')->group(function () {
        Route::get('', [ShiftController::class, 'index'])->name('index');
        Route::get('detail/{id}', [ShiftController::class, 'detail'])->name('detail');
        Route::get('list', [ShiftController::class, 'list'])->name('list');
        Route::post('insert', [ShiftController::class, 'insert'])->name('insert');
        Route::post('update', [ShiftController::class, 'update'])->name('update');
        Route::get('delete', [ShiftController::class, 'delete'])->name('delete');
    });
    Route::prefix('areas')->name('area.')->group(function () {
        Route::get('', [AreaController::class, 'index'])->name('index');
        Route::get('list', [AreaController::class, 'list'])->name('list');
        Route::get('detail/{id}', [AreaController::class, 'detail'])->name('detail');
        Route::post('insert', [AreaController::class, 'insert'])->name('insert');
        Route::post('update', [AreaController::class, 'update'])->name('update');
        Route::get('delete', [AreaController::class, 'delete'])->name('delete');
    });
    Route::prefix('tables')->name('table.')->group(function () {
        Route::get('', [TableController::class, 'index'])->name('index');
        Route::get('report', [TableController::class, 'report'])->name('report');
        Route::get('list', [TableController::class, 'list'])->name('list');
        Route::get('detail/{id}', [TableController::class, 'detail'])->name('detail');
        Route::post('insert', [TableController::class, 'insert'])->name('insert');
        Route::post('update', [TableController::class, 'update'])->name('update');
        Route::get('delete', [TableController::class, 'delete'])->name('delete');
    });

    // product
    Route::prefix('product_categories')->name('product_category.')->group(function () {
        Route::get('', [CategoryProductController::class, 'index'])->name('index');
        Route::get('list', [CategoryProductController::class, 'list'])->name('list');
        Route::get('detail/{id}', [CategoryProductController::class, 'detail'])->name('detail');
        Route::post('insert', [CategoryProductController::class, 'insert'])->name('insert');
        Route::post('update', [CategoryProductController::class, 'update'])->name('update');
        Route::get('delete', [CategoryProductController::class, 'delete'])->name('delete');
    });
    Route::prefix('products')->name('product.')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('list', [ProductController::class, 'list'])->name('list');
        Route::get('add', [ProductController::class, 'add'])->name('add');
        Route::get('detail/{id}', [ProductController::class, 'detail'])->name('detail');
        Route::post('insert', [ProductController::class, 'insert'])->name('insert');
        Route::post('update', [ProductController::class, 'update'])->name('update');
        Route::get('delete', [ProductController::class, 'delete'])->name('delete');
    });
    Route::prefix('topping_categories')->name('topping_category.')->group(function () {
        Route::get('', [ToppingCategoryController::class, 'index'])->name('index');
        Route::get('list', [ToppingCategoryController::class, 'list'])->name('list');
        Route::get('detail/{id}', [ToppingCategoryController::class, 'detail'])->name('detail');
        Route::post('insert', [ToppingCategoryController::class, 'insert'])->name('insert');
        Route::post('update', [ToppingCategoryController::class, 'update'])->name('update');
        Route::get('delete', [ToppingCategoryController::class, 'delete'])->name('delete');
    });
    Route::prefix('toppings')->name('topping.')->group(function () {
        Route::get('', [ToppingController::class, 'index'])->name('index');
        Route::get('list', [ToppingController::class, 'list'])->name('list');
        Route::get('detail/{id}', [ToppingController::class, 'detail'])->name('detail');
        Route::post('insert', [ToppingController::class, 'insert'])->name('insert');
        Route::post('update', [ToppingController::class, 'update'])->name('update');
        Route::get('delete', [ToppingController::class, 'delete'])->name('delete');
    });

    // promotion
    Route::prefix('promotions')->name('promotion.')->group(function () {
        Route::get('', [PromotionController::class, 'index'])->name('index');
        Route::get('list', [PromotionController::class, 'list'])->name('list');
        Route::get('detail/{id}', [PromotionController::class, 'detail'])->name('detail');
        Route::post('insert', [PromotionController::class, 'insert'])->name('insert');
        Route::post('update', [PromotionController::class, 'update'])->name('update');
        Route::get('delete', [PromotionController::class, 'delete'])->name('delete');
    });
    Route::prefix('coupons')->name('coupon.')->group(function () {
        Route::get('', [CouponController::class, 'index'])->name('index');
        Route::get('list', [CouponController::class, 'list'])->name('list');
        Route::get('detail/{id}', [CouponController::class, 'detail'])->name('detail');
        Route::post('insert', [CouponController::class, 'insert'])->name('insert');
        Route::post('update', [CouponController::class, 'update'])->name('update');
        Route::get('delete', [CouponController::class, 'delete'])->name('delete');
    });
    Route::prefix('customer_groups')->name('customer_group.')->group(function () {
        Route::get('', [CustomerGroupController::class, 'index'])->name('index');
        Route::get('list', [CustomerGroupController::class, 'list'])->name('list');
        Route::get('detail/{id}', [CustomerGroupController::class, 'detail'])->name('detail');
        Route::post('insert', [CustomerGroupController::class, 'insert'])->name('insert');
        Route::post('update', [CustomerGroupController::class, 'update'])->name('update');
        Route::get('delete', [CustomerGroupController::class, 'delete'])->name('delete');
    });
    Route::prefix('customers')->name('customer.')->group(function () {
        Route::get('', [CustomerController::class, 'index'])->name('index');
        Route::get('list', [CustomerController::class, 'list'])->name('list');
        Route::get('detail/{id}', [CustomerController::class, 'detail'])->name('detail');
        Route::post('insert', [CustomerController::class, 'insert'])->name('insert');
        Route::post('update', [CustomerController::class, 'update'])->name('update');
        Route::get('delete', [CustomerController::class, 'delete'])->name('delete');
    });
    Route::prefix('card_member')->name('card_member.')->group(function () {
        Route::get('', [CardMemberController::class, 'index'])->name('index');
        Route::get('table', [CardMemberController::class, 'table'])->name('table');
        Route::get('report', [CardMemberController::class, 'report'])->name('report');
        Route::get('detail/{id}', [CardMemberController::class, 'detail'])->name('detail');
    });
    Route::prefix('booking')->name('booking.')->group(function () {
        Route::get('', [BookingController::class, 'index'])->name('index');
        Route::get('table', [BookingController::class, 'table'])->name('table');
        Route::get('report', [BookingController::class, 'report'])->name('report');
        Route::get('detail/{id}', [BookingController::class, 'detail'])->name('detail');
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
        Route::get('detail/{id}', [OrderController::class, 'detail'])->name('detail');
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