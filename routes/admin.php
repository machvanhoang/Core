<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Settings\EmailController;
use App\Http\Controllers\Admin\Settings\PaymentMethodController;
use App\Http\Controllers\Admin\Settings\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\Product\AttributeController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\UserController;

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

Route::prefix('admin')->as('admin.')->group(function () {
    Route::middleware('admin.logged')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::post('logout', 'logout')->name('logout');
        });
        Route::controller(AdminController::class)->group(function () {
            Route::get('', 'index')->name('index');
        });
        Route::prefix('customer')->as('customer.')->controller(CustomerController::class)->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('{customer}', 'edit')->name('edit');
            Route::put('{customer}', 'update')->name('update');
            Route::delete('{customer}', 'delete')->name('delete');
        });
        Route::prefix('product')->as('product.')->group(function () {
            Route::controller(ProductController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('{product}', 'edit')->name('edit');
                Route::put('{product}', 'update')->name('update');
                Route::delete('{product}', 'delete')->name('delete');
            });
            Route::prefix('attribute')->as('attribute.')->controller(AttributeController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('{product}', 'product')->name('product');
                Route::post('{product}/store', 'storeProduct')->name('store_product');
            });
        });
        Route::prefix('settings')->as('settings.')->group(function () {
            Route::get('', [SettingsController::class, 'index'])->name('index');
            Route::prefix('email')->as('email.')->controller(EmailController::class)->group(function () {
                Route::get('', 'index')->name('index');
            });
            Route::prefix('payment_method')->as('payment_method.')->controller(PaymentMethodController::class)->group(function () {
                Route::get('', 'index')->name('index');
            });
        });
        Route::prefix('user')->as('user.')->controller(UserController::class)->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('{user}', 'edit')->name('edit');
            Route::put('{user}', 'update')->name('update');
            Route::delete('{user}', 'delete')->name('delete');
        });
    });
    Route::middleware('admin.login')->controller(AuthController::class)->group(function () {
        Route::get('login', 'loginGet')->name('login.get');
        Route::post('login', 'loginPost')->name('login.post');
        Route::get('forgot-password', 'forgotPassword')->name('forgot.password');
        Route::get('register', 'registerGet')->name('register.get');
    });
});
