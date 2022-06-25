<?php

use App\Http\Controllers\Api\Blog\BlogController;
use App\Http\Controllers\Api\Blog\FixController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('blog')->controller(BlogController::class)->name('api.blog')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/csrf', 'csrf')->name('csrf');
    Route::get('/about', 'about')->name('about');
    Route::get('/archive-folder', 'archiveFolder')->name('archive');
    Route::get('/archive-list/{year}', 'archiveList')->name('archive.show');
    Route::get('/posts/{slug}', 'posts')->name('posts.show');
    Route::get('/contact', 'contact')->name('contact');

    Route::prefix('fix')->controller(FixController::class)->name('fix')->group(function() {
        Route::post('/posts-featured', 'postsFeatured')->name('posts.featured');
        Route::post('/posts-year', 'postsYear')->name('posts.year');
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
