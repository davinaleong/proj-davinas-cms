<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
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
    return redirect(route('login'));
});

Route::prefix('cms')->middleware(['auth'])->group(function () {
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');

    Route::prefix('settings')->controller(SettingController::class)->group(function () {
        Route::get('/', 'index')->name('settings.index');
        Route::get('/edit', 'edit')->name('settings.edit');
        Route::post('/', 'store')->name('settings.store');
    });

    Route::resource('pages', PageController::class);
    Route::resource('posts', PostController::class);

    Route::prefix('search')->controller(SearchController::class)->group(function () {
        Route::post('/', 'post')->name('search.post');
        Route::get('/results', 'results')->name('search.results');
    });
});

require __DIR__ . '/auth.php';
