<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use Inertia\Inertia;
use Laravel\Fortify\Fortify;

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

//Route::get('/', function () {
//    return Inertia::render('Home', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

// FrontEnd Public Route List
Route::get('/', [PageController::class, 'home'])->name('store.home');
Route::get('/about', [PageController::class, 'about'])->name('store.about');
Route::get('/contact', [PageController::class, 'contact'])->name('store.contact');

Route::get('/blogs', [PageController::class, 'blogs'])->name('store.blogs');
Route::get('/blogs/{slug}', [PageController::class, 'blogShow'])->name('store.blog.show');

Route::get('/projects', [PageController::class, 'projects'])->name('store.projects');
Route::get('/projects/{slug}', [PageController::class, 'projectShow'])->name('store.project.show');

Route::get('/services', [PageController::class, 'services'])->name('store.services');
Route::get('/services/{slug}', [PageController::class, 'serviceShow'])->name('store.service.show');


// Customer Routes List Start
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
