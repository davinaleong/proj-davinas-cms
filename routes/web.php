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
    return redirect(route('login'));
});

Route::prefix('cms')->middleware(['auth'])->group(function () {
    Route::get('/activity', function () {
        return view('static.index');
    })->name('activity');
});

require __DIR__ . '/auth.php';
