<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RealesesController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('blog')->name('blog.')->group( function(){
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    
});
Route::prefix('artists')->name('artists.')->group( function(){
    Route::get('/', [ArtistController::class, 'index'])->name('artists');
    
});
Route::prefix('releases')->name('releases.')->group( function(){
    Route::get('/', [ReleasesController::class, 'index'])->name('releases');
    
});
Route::prefix('users')->name('users.')->group( function(){
    // Route::get('/', [UserController::class, 'index'])->name('users');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    // Route::get('/login', [UserController::class, 'index'])->name('');

    
});