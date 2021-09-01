<?php

use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileInformationContoller;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UpdateProfileInformationController;
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
    Route::prefix('profile')->group(function () {
        // profile
        Route::get('/{user}/{follows}', FollowingController::class)->name('profile.followers');
        Route::post('/{user}', [FollowingController::class, 'store'])->name('follows.store');

        // update profile
        Route::get('edit', [UpdateProfileInformationController::class, 'edit'])->name('profile.edit');
        Route::patch('update', [UpdateProfileInformationController::class, 'update'])->name('profile.update');

        // update password
        Route::get('/u/password/edit', [UpdatePasswordController::class, 'edit'])->name('edit.password');
        Route::patch('/u/password/update', [UpdatePasswordController::class, 'update'])->name('update.password');

        // without auth
        Route::get('/{user}', ProfileInformationContoller::class)->name('profile')->withoutMiddleware('auth');
    });
});

require __DIR__.'/auth.php';
