<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Settings\EmailController;
use App\Http\Controllers\Admin\Settings\PaymentMethodController;
use App\Http\Controllers\Admin\Settings\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
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
            Route::get('{user}', 'edit')->name('edit');
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
