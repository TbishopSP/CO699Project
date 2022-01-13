<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home.index');
});

Route::get('/home', function () {
    return view('home.index');
});

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('home.index');
Route::get('/home', [App\Http\Controllers\IndexController::class, 'index'])->name('home.index');


Route::get('/jobs', [App\Http\Controllers\JobsController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [App\Http\Controllers\JobsController::class, 'show'])->name('jobs.show')->middleware('auth');
Route::post('/jobs/{id}', [App\Http\Controllers\JobsController::class, 'apply'])->name('jobs.apply')->middleware('auth');


Route::get('/profile', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.index')->middleware('auth');
Route::delete('/profile', [App\Http\Controllers\ProfilesController::class, 'destroy'])->name('profile.destroy')->middleware('auth');
Route::post('/profile', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update')->middleware('auth');


Route::get('/contact-form', [App\Http\Controllers\ContactController::class, 'contactForm'])->name('contact-form');
Route::post('/contact-form', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store');

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show')->middleware('auth');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/admin/{id}', [App\Http\Controllers\AdminController::class, 'user'])->name('admin.user')->middleware('auth');
Route::post('/admin/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update')->middleware('auth');


Auth::routes();
