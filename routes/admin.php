<?php

use App\Controller\Admin;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\AppearanceController;
use App\Http\Controllers\Admin\Auth\UserController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubscriberController;
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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
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

    // Orders related routes
    Route::resource('/orders', OrdersController::class)->only(['index', 'edit', 'destroy']);
    Route::get('/orders/cancelled', [OrdersController::class, 'cancelled_request'])->name('orders.cancelled.index');
    Route::get('/orders/accept/{id}', [OrdersController::class, 'update'])->name('orders.accept');


    // Customer Related Routes
    Route::resource('/customers', CustomersController::class);

    // Invoice Related Routes
    Route::resource('/invoices', InvoiceController::class);

    // Clients Related Routes
    Route::resource('/clients', ClientsController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);

    // Reviews Related Routes
    Route::resource('/reviews', ReviewsController::class);

    // Blog Comments Related Routes
    Route::resource('/comments', CommentsController::class)->only(['index', 'edit', 'update', 'destroy']);

    // Blog Post Related Routes
    Route::resource('/blogs', BlogsController::class);
    Route::resource('/blog/category', CategoryController::class);
    Route::resource('/blog/tags', TagsController::class);

    // Project Related Routes
    Route::resource('/projects', ProjectController::class);

    // Page Related Routes
    Route::resource('/pages', PageController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

    // Home Page Routes
    Route::get('/pages/static/home', [HomePageController::class, 'index'])->name('page.home.index');
    Route::post('/pages/static/home/slider', [HomePageController::class, 'store_slider'])->name('page.home.slider.store');
    Route::put('/pages/static/home/slider', [HomePageController::class, 'update_slider'])->name('page.home.slider.update');
    Route::put('/pages/static/home/about', [HomePageController::class, 'update_about'])->name('page.home.about');
    Route::put('/pages/static/home/service', [HomePageController::class, 'update_service'])->name('page.home.service');
    Route::put('/pages/static/home/choose-us', [HomePageController::class, 'update_choose_us'])->name('page.home.choose.us');
    Route::put('/pages/static/home/achievement', [HomePageController::class, 'update_achievement'])->name('page.home.achievement');
    Route::put('/pages/static/home/others', [HomePageController::class, 'update_others'])->name('page.home.others');
    Route::put('/pages/static/home/seo', [HomePageController::class, 'update_seo'])->name('page.home.seo');

    // About Page Routes
    Route::get('/pages/static/about', [AboutPageController::class, 'index'])->name('page.about.index');
    Route::put('/pages/static/about/about-us', [AboutPageController::class, 'update_about'])->name('page.about.about-us');
    Route::put('/pages/static/about/seo', [AboutPageController::class, 'update_seo'])->name('page.about.seo');

    // Contact Page Routes
    Route::get('/pages/static/contact', [ContactPageController::class, 'index'])->name('page.contact.index');
    Route::put('/pages/static/contact/info', [ContactPageController::class, 'update_contact'])->name('page.contact.info');
    Route::put('/pages/static/contact/seo', [ContactPageController::class, 'update_seo'])->name('page.contact.seo');

    // Menu Related Routes
    Route::resource('/menus', MenuController::class)->only(['index', 'edit', 'update']);

    // Appearances All Routes List
    Route::get('/appearance', [AppearanceController::class, 'index'])->name('appearance.index');
    Route::put('/appearance/{option}', [AppearanceController::class, 'update'])->name('appearance.update');

    // Subscribers Related Routes
    Route::delete('/subscriber/all', [SubscriberController::class, 'allDestroy'])->name('subscribers.all.destroy');
    Route::resource('/subscribers', SubscriberController::class)->only(['index', 'edit', 'destroy']);

    // User Related Routes
    Route::resource('/users', UserController::class);
    Route::get('/account', [UserController::class, 'account'])->name('users.account');

    /**
     * Settings Related Routes Listing
     */

    // General Settings Routes
    Route::get('/settings/general', [SettingsController::class, 'general'])->name('settings.general');
    Route::put('/settings/general', [SettingsController::class, 'general'])->name('settings.general.update');
    // Email Settings Routes
    Route::get('/settings/email', [SettingsController::class, 'email'])->name('settings.email');
    Route::put('/settings/email', [SettingsController::class, 'email'])->name('settings.email.update');
    // SEO Meta Settings Routes
    Route::get('/settings/seo', [SettingsController::class, 'seo'])->name('settings.seo');
    Route::put('/settings/seo', [SettingsController::class, 'seo'])->name('settings.seo.update');
    // Payment Gateway Settings Routes
    Route::get('/settings/payment', [SettingsController::class, 'payment'])->name('settings.payment');
    Route::put('/settings/payment', [SettingsController::class, 'payment'])->name('settings.payment.update');
    // Analytics Settings Routes
    Route::get('/settings/analytics', [SettingsController::class, 'analytics'])->name('settings.analytics');
    Route::put('/settings/analytics', [SettingsController::class, 'analytics'])->name('settings.analytics.update');

});

