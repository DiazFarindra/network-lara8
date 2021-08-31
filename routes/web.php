<?php

use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\FollowingController;
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

    // users explore
    Route::get('explore', ExploreUserController::class)->name('users.index');

    // profile management
    Route::get('profile/{user}/{follows}', FollowingController::class)->name('profile.followers');
    Route::post('profile/{user}', [FollowingController::class, 'store'])->name('follows.store');
    Route::get('profile/{user}', ProfileInformationContoller::class)->name('profile')->withoutMiddleware('auth');
});

require __DIR__.'/auth.php';
