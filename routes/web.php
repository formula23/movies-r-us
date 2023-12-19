<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieReviewController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware([
    'web'
])->group(function () {

    Route::get('/', HomeController::class)->name('home');

    Route::get('movies/{movie}/reviews', [MovieReviewController::class, 'index'])->name('movies.reviews.index');

    Route::post('movies/{movie}/reviews', [MovieReviewController::class, 'store'])->name('movies.reviews.store');

    Route::get('movies/{movie}/reviews/{review}', [MovieReviewController::class, 'show'])->name('movies.reviews.show')->scopeBindings();

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::resource('movies', MovieController::class);

});
