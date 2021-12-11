<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ComplexityController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\ConfirmPasswordController;

/*
|--------------------------------------------------------------------------
| Admin Auth Related All Routes
|--------------------------------------------------------------------------
|
| Here is where you can register/login/password reset Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "web" middleware group. Enjoy building your Admin AUTH!
|
*/

//Login Route
Route::get('/', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login');

//Logout Route
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

//Rest Password Route
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');

//Confirm Password
Route::get('/password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('admin.password.confirm');
Route::post('/password/confirm', [ConfirmPasswordController::class, 'confirm'])->name('admin.password.confirm');

// Create Super Admin
Route::get('/create/super', [RegisterController::class, 'createSuperAdmin'])->name('admin.create.super');


/*
|--------------------------------------------------------------------------
| Admin After Auth All Routes
|--------------------------------------------------------------------------
|
| Here is where you can do anything from admin dashboard as a Login User for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "web:admin" middleware group. Enjoy building your Admin Related All CRUD!
|
*/


Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('admin.dashboard');

    // Collection Related All Routes
    Route::resource('/collection', CollectionController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);

    // Service Related All Routes
    Route::resource('/service', ServicesController::class);
    Route::get('/service/destroy', [ServicesController::class, 'allDestroy'])->name('admin.service.destroys');
    Route::resource('/complexities', ComplexityController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);


    // Customer Related Routes
    Route::resource('/customers', CustomersController::class);

    // Clients Related Routes
    Route::resource('/clients', ClientsController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);

    // Blog Comments Related Routes
    Route::resource('/comments', CommentsController::class)->only(['index', 'edit', 'destroy']);

    // Blog Post Related Routes
    Route::resource('/blogs', BlogsController::class);
    Route::resource('/blog/category', CategoryController::class);
    Route::resource('/blog/tags', TagsController::class);

    // Page Related Routes
    Route::resource('/pages', PageController::class);

    // Common Page Routes
    Route::get('/pages/common/{slug}/edit', [PageController::class, 'commonEdit'])->name('pages.common.edit');

    // Appearances All Routes List
//    Route::get('/common/pages', []);
});

