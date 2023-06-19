<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtImageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VideoController;



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

Route::middleware(['auth'])->group(function () {
    // Routes accessible only to authenticated users
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('arts', ArtController::class);
    Route::post('art/{art}/images', [ArtImageController::class, 'create'])->name('art.images.create');
    Route::delete('art/images/{artImage}', [ArtImageController::class, 'delete'])->name('art.images.delete');
    Route::put('art/images/{artImage}', [ArtImageController::class, 'update'])->name('art.images.update');

    
    Route::resource('artists', ArtistController::class);
    Route::resource('tags', TagController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('videos', VideoController::class);
});

// Routes accessible to all users (including guests)
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');
