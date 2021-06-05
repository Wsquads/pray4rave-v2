<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ReleaseController;
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
Route::middleware(['auth:sanctum', 'verified'])->prefix('comments')->name('comments.')->group( function(){
    Route::post('/create/{id}', [CommentsController::class, 'createComment'])->name('create');
    
});
Route::prefix('artists')->name('artists.')->group( function(){
    Route::get('/', [ArtistController::class, 'index'])->name('artists');
    Route::get('/artist/{id}', [ArtistController::class, 'artistById'])->name('artist');
    
});
Route::prefix('releases')->name('releases.')->group( function(){
    Route::get('/', [ReleaseController::class, 'index'])->name('releases');
    Route::get('/search', [ReleaseController::class, 'search'])->name('search');
    
});
Route::prefix('users')->name('users.')->group( function(){
    // Route::get('/', [UserController::class, 'index'])->name('users');
    // Route::get('/login', [UserController::class, 'login'])->name('login');
    // Route::get('/login', [UserController::class, 'index'])->name('');    
});
Route::middleware(['auth:sanctum', 'verified'])->prefix('posts')->name('posts.')->group( function(){
    Route::get('/managePost',[BlogController::class, 'managePost'])->name('managePost');
    Route::post('/savePost',[BlogController::class, 'savePost'])->name('savePost');
    Route::get('/edit/{id}',[BlogController::class, 'editar'])->name('editar');
    Route::post('/editAndSave/{id}',[BlogController::class, 'editAndSave'])->name('editAndSave');
    Route::post('/delete/{id}',[BlogController::class, 'delete'])->name('delete');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('manageArtists')->name('manageArtists.')->group( function(){
    Route::get('/manageArtists',[ArtistController::class, 'manageArtists'])->name('manageArtists');
    Route::get('/edit/{id}',[ArtistController::class, 'editar'])->name('editar');
    Route::post('/editAndSave/{id}',[ArtistController::class, 'editAndSave'])->name('editAndSave');
    Route::post('/saveArtist',[ArtistController::class, 'saveArtist'])->name('saveArtist');
    Route::post('/delete/{id}',[ArtistController::class, 'delete'])->name('delete');

});
Route::middleware(['auth:sanctum', 'verified'])->prefix('manageReleases')->name('manageReleases.')->group( function(){
    Route::get('/manageReleases',[ReleaseController::class, 'manageReleases'])->name('manageReleases');
    Route::post('/saveAlbum',[ReleaseController::class, 'saveAlbum'])->name('saveAlbum');
    Route::get('/edit/{id}',[ReleaseController::class, 'editar'])->name('editar');

});
Route::middleware(['auth:sanctum', 'verified'])->prefix('manageUsers')->name('manageUsers.')->group( function(){
    Route::get('/manageUsers',[UserController::class, 'manageUsers'])->name('manageUsers');
    Route::post('/delete/{id}',[UserController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}',[UserController::class, 'editar'])->name('editar');
    Route::post('/editAndSave/{id}',[UserController::class, 'editAndSave'])->name('editAndSave');
    Route::post('/saveRelease',[UserController::class, 'saveRelease'])->name('saveRelease');
});