<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::middleware(['guest'])->group(function () {
    Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
    Route::post('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/doLogin', [UserController::class, 'doLogin'])->name('user.doLogin');
    Route::get('/download_file', [HomeController::class, 'download_file'])->name('download.file');
    });
    
    Route::middleware(['auth:user'])->group(function () {
        Route::get('/user_dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');
        Route::get('/user_logout', [UserController::class, 'user_logout'])->name('user.logout');
        Route::get('/user_profile', [UserController::class, 'user_profile'])->name('user.profile');
        Route::get('/user_password_change', [UserController::class, 'user_password_change'])->name('user.password_change');
        Route::post('/user_password_change_action', [UserController::class, 'user_password_change_action'])->name('user_password_change_action');
        Route::get('/user_finance', [UserController::class, 'user_finance'])->name('user.finance');
        Route::get('/user_statement', [UserController::class, 'user_statement'])->name('user.statement');
        Route::post('/user_deposit', [UserController::class, 'user_deposit'])->name('user.deposit');
        Route::post('/user_withdraw', [UserController::class, 'user_withdraw'])->name('user.withdraw');
        Route::get('/user_task', [UserController::class, 'user_task'])->name('user.task');
        Route::get('/user_task/claim/{id}', [UserController::class, 'claim'])->name('claim');
        Route::get('/user_statement/cancel_deposit/{id}', [UserController::class, 'cancel_deposit'])->name('cancel_deposit');
        Route::get('/user_statement/cancel_withdraw/{id}', [UserController::class, 'cancel_withdraw'])->name('cancel_withdraw');
        Route::get('/user_plan', [UserController::class, 'user_plan'])->name('user.plan');
        Route::get('/user_support', [UserController::class, 'user_support'])->name('user.support');
        Route::get('/user_refer', [UserController::class, 'user_refer'])->name('user.refer');
        Route::get('/user_refer_list', [UserController::class, 'user_refer_list'])->name('user.refer_user');
        // Route::post('/user_payment/{paymentMethod}', [UserController::class, 'user_payment'])->name('user.payment');
    });
    
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/admin_dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
        Route::get('/admin_logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
        Route::get('/admin_statement', [AdminController::class, 'admin_statement'])->name('admin.statement');
        Route::get('/admin_password_change', [AdminController::class, 'admin_password_change'])->name('admin.password_change');
        Route::post('/admin_password_change_action', [AdminController::class, 'admin_password_change_action'])->name('admin_password_change_action');
        Route::get('/admin_profile', [AdminController::class, 'admin_profile'])->name('admin.profile');
        Route::get('/admin_statement/deposit_approve/{id}', [AdminController::class, 'deposit_approve'])->name('deposit_approve');
        Route::get('/admin_statement/deposit_rejected/{id}', [AdminController::class, 'deposit_rejected'])->name('deposit_rejected');
        Route::get('/admin_statement/withdraw_approve/{id}', [AdminController::class, 'withdraw_approve'])->name('withdraw_approve');
        Route::get('/admin_statement/withdraw_rejected/{id}', [AdminController::class, 'withdraw_rejected'])->name('withdraw_rejected');
        Route::get('/admin_user_list', [AdminController::class, 'admin_user_list'])->name('admin.user_list');
        Route::get('/admin_user_list/user_active/{id}', [AdminController::class, 'user_active'])->name('user_active');
        Route::get('/admin_user_list/user_inactive/{id}', [AdminController::class, 'user_inactive'])->name('user_inactive');
        Route::get('/admin_user_list/user_details/{id}', [AdminController::class, 'user_details'])->name('user_details');
        Route::get('/bank_account', [AdminController::class, 'bank_account'])->name('admin.bank_account');
        Route::post('/bankAccount', [AdminController::class, 'bankAccount'])->name('admin.bankAccount');
        Route::get('/bank_account_list', [AdminController::class, 'bank_account_list'])->name('admin.bank_account_list');
        Route::get('/bank_account_list/bank_account_list_delete/{id}', [AdminController::class, 'bank_account_list_delete'])->name('bank_account_list_delete');
    });