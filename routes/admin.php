<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
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
    });
    Route::middleware('admin.login')->controller(AuthController::class)->group(function () {
        Route::get('login', 'loginGet')->name('login.get');
        Route::post('login', 'loginPost')->name('login.post');
        Route::get('forgot-password', 'forgotPassword')->name('forgot.password');
    });
});
