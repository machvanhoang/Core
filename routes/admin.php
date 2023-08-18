<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\Product\AttributeController;
use App\Http\Controllers\Admin\Product\AttributeValueController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\ProductTagController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\UserController;
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

Route::prefix('admin')->as('admin.')->group(function () {
    Route::middleware('admin.logged')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::post('logout', 'logout')->name('logout');
        });
        Route::controller(AdminController::class)->group(function () {
            Route::get('', 'index')->name('index');
        });
        Route::prefix('customer')->as('customer.')->controller(CustomerController::class)->group(function () {
            // datatables.
            Route::get('datatables', 'datatables')->name('datatables');
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
                Route::prefix('{product}')->group(function () {
                    Route::get('{attribute?}', 'indexAttribute')->name('index');
                    Route::post('store', 'storeAttribute')->name('store');
                    Route::put('{attribute}', 'updateAttribute')->name('update_attribute');
                    Route::get('all', 'allAttribute')->name('all');
                    Route::post('save-variant', 'saveVariant')->name('save_variant');
                    Route::post('update-variant', 'updateVariant')->name('update_variant');
                });
            });
            Route::prefix('attribute_value')->as('attribute_value.')->controller(AttributeValueController::class)->group(function () {
                Route::prefix('{product}')->group(function () {
                    Route::prefix('{attribute}')->group(function () {
                        Route::post('store', 'store')->name('store');
                        Route::put('{attributeValue}', 'update')->name('update');
                    });
                });
            });
        });
        Route::prefix('tag')->as('tags.')->controller(TagsController::class)->group(function () {
            Route::post('{product}/store', 'store')->name('store');
        });
        Route::prefix('product_tag')->as('product_tag.')->controller(ProductTagController::class)->group(function () {
            Route::delete('{productTag}', 'delete')->name('delete');
        });
        Route::prefix('import')->name('import.')->controller(TestController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('file-upload', 'upload')->name('upload');
            Route::get('datatables', 'datatables')->name('datatables');
        });
        Route::prefix('config')->as('config.')->controller(ConfigController::class)->group(function () {
            Route::get('', 'index')->name('index');
            Route::put('{config}', 'update')->name('update');
        });
        Route::prefix('email')->as('email.')->controller(EmailController::class)->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('{email}', 'edit')->name('edit');
            Route::put('{email}', 'update')->name('update');
        });
        Route::prefix('payment_method')->as('payment_method.')->controller(PaymentMethodController::class)->group(function () {
            Route::get('{paymentMethod?}', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::put('{paymentMethod}', 'update')->name('update');
            Route::delete('{paymentMethod}', 'delete')->name('delete');
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
