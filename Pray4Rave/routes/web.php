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
    Route::get('/posts', [BlogController::class, 'posts'])->name('posts');
    Route::get('/post/{id}', [BlogController::class, 'postById'])->name('post');
    Route::get('/search', [BlogController::class, 'search'])->name('search');
    Route::get('/filter/{category}', [BlogController::class, 'filter'])->name('filtered');
    
});
Route::prefix('artists')->name('artists.')->group( function(){
    Route::get('/', [ArtistController::class, 'index'])->name('artists');
    
});
Route::prefix('releases')->name('releases.')->group( function(){
    Route::get('/', [ReleasesController::class, 'index'])->name('releases');
    
});
Route::prefix('users')->name('users.')->group( function(){
    // Route::get('/', [UserController::class, 'index'])->name('users');
    // Route::get('/login', [UserController::class, 'login'])->name('login');
    // Route::get('/login', [UserController::class, 'index'])->name('');    
});
Route::middleware(['auth:sanctum', 'verified'])->prefix('posts')->name('posts.')->group( function(){
    Route::get('/createPost',[BlogController::class, 'createPost'])->name('createPost');
    Route::post('/savePost',[BlogController::class, 'savePost'])->name('savePost');
});
