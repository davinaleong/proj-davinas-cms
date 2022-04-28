<?php

use App\Http\Controllers\Api\BlogController;
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

Route::prefix('blog')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('api.blog.index');
    Route::get('/about', 'about')->name('api.blog.about');
    Route::get('/archive', 'archiveFolder')->name('api.blog.archive');
    Route::get('/archive/{year}', 'archiveList')->name('api.blog.archive.show');
    Route::get(
        '/posts/{slug}',
        'posts'
    )->name('api.blog.posts.show');
    Route::get('/contact', 'contact')->name('api.blog.contact');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
