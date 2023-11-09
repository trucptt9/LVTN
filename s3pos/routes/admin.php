<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminHistoryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BusinessTypeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LicenseController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StoreController;
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

Route::prefix('system')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'login_post'])->name('login.post');
    Route::get('forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');
    Route::post('forgot_password', [AuthController::class, 'forgot_password_post'])->name('forgot_password.post');
    Route::get('reset', [AuthController::class, 'reset'])->name('reset');
    Route::post('reset', [AuthController::class, 'reset_post'])->name('reset.post');

    Route::middleware(['checkAdmin'])->group(function () {
        Route::get('logout', [HomeController::class, 'logout'])->name('logout');
        Route::get('guide', [HomeController::class, 'guide'])->name('guide');
        // home
        Route::get('', [HomeController::class, 'index'])->name('index');
        Route::prefix('stores')->name('store.')->group(function () {
            Route::post('total', [HomeController::class, 'total'])->name('total');
            Route::post('revenue', [HomeController::class, 'revenue'])->name('revenue');
        });

        // store
        Route::prefix('stores')->name('store.')->group(function () {
            Route::get('', [StoreController::class, 'index'])->name('index');
            Route::get('table', [StoreController::class, 'table'])->name('list');
            Route::get('report', [StoreController::class, 'report'])->name('report');
            Route::get('detail/{id}', [StoreController::class, 'detail'])->name('detail');
            Route::post('insert', [StoreController::class, 'insert'])->name('insert');
            Route::post('update', [StoreController::class, 'update'])->name('update');
            Route::post('delete', [StoreController::class, 'delete'])->name('delete');
            Route::post('reset_password_manager', [StoreController::class, 'reset_password_manager'])->name('reset_password_manager');
            Route::prefix('report')->name('report.')->group(function () {
                Route::post('revenue_by_month', [StoreController::class, 'report_revenue_by_month'])->name('revenue_by_month');
                Route::post('revenue_by_product', [StoreController::class, 'report_revenue_by_product'])->name('revenue_by_product');
            });
        });
        Route::prefix('business_type')->name('business_type.')->group(function () {
            Route::get('', [BusinessTypeController::class, 'index'])->name('index');
            Route::get('table', [BusinessTypeController::class, 'table'])->name('list');
            Route::get('detail/{id}', [BusinessTypeController::class, 'detail'])->name('detail');
            Route::post('insert', [BusinessTypeController::class, 'insert'])->name('insert');
            Route::post('update', [BusinessTypeController::class, 'update'])->name('update');
            Route::post('delete', [BusinessTypeController::class, 'delete'])->name('delete');
        });
        Route::prefix('package')->name('package.')->group(function () {
            Route::get('', [PackageController::class, 'index'])->name('index');
            Route::get('table', [PackageController::class, 'table'])->name('list');
            Route::get('detail/{id}', [PackageController::class, 'detail'])->name('detail');
            Route::post('insert', [PackageController::class, 'insert'])->name('insert');
            Route::post('update', [PackageController::class, 'update'])->name('update');
            Route::post('delete', [PackageController::class, 'delete'])->name('delete');
        });
        Route::prefix('module')->name('module.')->group(function () {
            Route::get('', [ModuleController::class, 'index'])->name('index');
            Route::get('table', [ModuleController::class, 'table'])->name('list');
            Route::get('detail/{id}', [ModuleController::class, 'detail'])->name('detail');
            Route::post('update', [ModuleController::class, 'update'])->name('update');
        });
        Route::prefix('license')->name('license.')->group(function () {
            Route::get('', [LicenseController::class, 'index'])->name('index');
            Route::get('table', [LicenseController::class, 'table'])->name('list');
            Route::get('detail/{id}', [LicenseController::class, 'detail'])->name('detail');
            Route::get('invoice/{id}', [LicenseController::class, 'invoice'])->name('invoice');
            Route::get('report', [LicenseController::class, 'report'])->name('report');
            Route::post('insert', [LicenseController::class, 'insert'])->name('insert');
            Route::post('update', [LicenseController::class, 'update'])->name('update');
            Route::post('delete', [LicenseController::class, 'delete'])->name('delete');
        });
        Route::prefix('admin_history')->name('admin_history.')->group(function () {
            Route::get('', [AdminHistoryController::class, 'index'])->name('index');
            Route::get('table', [AdminHistoryController::class, 'table'])->name('list');
            Route::get('detail/{id}', [AdminHistoryController::class, 'detail'])->name('detail');
        });
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('', [AdminController::class, 'index'])->name('index');
            Route::get('table', [AdminController::class, 'table'])->name('list');
            Route::get('detail/{id}', [AdminController::class, 'detail'])->name('detail');
            Route::get('permission/{id}', [AdminController::class, 'permission'])->name('permission');
            Route::get('report', [AdminController::class, 'report'])->name('report');
            Route::post('insert', [AdminController::class, 'insert'])->name('insert');
            Route::post('update', [AdminController::class, 'update'])->name('update');
            Route::post('delete', [AdminController::class, 'delete'])->name('delete');
        });
        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('', [SettingController::class, 'index'])->name('index');
            Route::post('update', [SettingController::class, 'update'])->name('update');
        });
    });
});
