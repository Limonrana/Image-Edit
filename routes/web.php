<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;

/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// FrontEnd Public Route List
Route::get('/', [PageController::class, 'home'])->name('store.home');
Route::get('/about', [PageController::class, 'about'])->name('store.about');
Route::get('/contact', [PageController::class, 'contact'])->name('store.contact');

Route::get('/blogs', [PageController::class, 'blogs'])->name('store.blogs');
Route::get('/blogs/{slug}', [PageController::class, 'blogShow'])->name('store.blog.show');
Route::post('/blogs/{id}/comment', [PageController::class, 'storeBlogComment'])->name('store.blog.comment');

Route::get('/projects', [PageController::class, 'projects'])->name('store.projects');
Route::get('/projects/{slug}', [PageController::class, 'projectShow'])->name('store.project.show');

Route::get('/services', [PageController::class, 'services'])->name('store.services');
Route::get('/services/{slug}', [PageController::class, 'serviceShow'])->name('store.service.show');

Route::post('/subscribe', [PageController::class, 'subscribe'])->name('store.subscribe');

Route::get('/{page_slug}', [PageController::class, 'page'])->name('store.page');
