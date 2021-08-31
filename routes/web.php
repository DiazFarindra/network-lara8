<?php

use App\Http\Controllers\ProfileInformationContoller;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
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

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // timeline management
    Route::get('/timeline', TimelineController::class)->name('timeline');
    Route::post('/timeline', [StatusController::class, 'store'])->name('status.store');

    Route::get('profile/{user}', ProfileInformationContoller::class)->name('profile');
});

require __DIR__.'/auth.php';
