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

// HOME
Route::get('/', [App\Http\Controllers\shared\HomeController::class, 'index']);
Route::get('/activity', [App\Http\Controllers\shared\HomeController::class, 'activityIndex']);
Route::get('/activity/{slug}/detail', [App\Http\Controllers\shared\HomeController::class, 'activityDetail']);
Route::get('/user', [App\Http\Controllers\shared\HomeController::class, 'userIndex']);
Route::get('/advertise', [App\Http\Controllers\shared\HomeController::class, 'advertiseIndex']);
Route::get('/gallery', [App\Http\Controllers\shared\HomeController::class, 'galleryIndex']);
Route::get('/contact', [App\Http\Controllers\shared\HomeController::class, 'contactIndex']);
Route::get('/about', [App\Http\Controllers\shared\HomeController::class, 'aboutIndex']);
Route::get('/documentation', [App\Http\Controllers\shared\HomeController::class, 'documentationIndex']);

// LOGIN LOGOUT
Route::get('/login', [App\Http\Controllers\shared\AuthController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\shared\AuthController::class, 'authenticate']);
Route::post('/logout', [App\Http\Controllers\shared\AuthController::class, 'logout']);

// DASHBOARD
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/settings', [App\Http\Controllers\ProfileController::class, 'edit']);
    Route::patch('/settings', [App\Http\Controllers\ProfileController::class, 'update']);
    Route::patch('/change-password', [App\Http\Controllers\ProfileController::class, 'changePassword']);

    // Admin Access
    Route::group(['middleware' => ['cek_level:admin']], function () {
        // Dashboard User
        Route::get('/dashboard/user', [App\Http\Controllers\admin\UserController::class, 'index']);
        Route::post('/dashboard/user', [App\Http\Controllers\admin\UserController::class, 'store']);
        Route::patch('/dashboard/user/{id}', [App\Http\Controllers\admin\UserController::class, 'update']);
        Route::get('/dashboard/user/{id}/delete', [App\Http\Controllers\admin\UserController::class, 'destroy']);
        Route::get('/dashboard/user/{id}/edit', [App\Http\Controllers\admin\UserController::class, 'edit']);
        Route::get('/dashboard/user/{id}/detail', [App\Http\Controllers\admin\UserController::class, 'detail']);
        Route::get('/dashboard/user/{id}/change-status', [App\Http\Controllers\admin\UserController::class, 'changeStatus']);
        Route::get('/dashboard/user/{id}/change-role/{role}', [App\Http\Controllers\admin\UserController::class, 'changeRole']);
    });

    // Dashboard Activity
    Route::get('/dashboard/activity', [App\Http\Controllers\admin\ActivityController::class, 'index']);
    Route::get('/dashboard/activity/add', [App\Http\Controllers\admin\ActivityController::class, 'create']);
    Route::post('/dashboard/activity/add', [App\Http\Controllers\admin\ActivityController::class, 'store']);
    Route::get('/dashboard/activity/{slug}/delete', [App\Http\Controllers\admin\ActivityController::class, 'destroy']);

        // personal access
        Route::get('/dashboard/activity/{slug}/edit', [App\Http\Controllers\admin\ActivityController::class, 'edit'])->name('edit-activity');
        Route::patch('/dashboard/activity/{slug}', [App\Http\Controllers\admin\ActivityController::class, 'update'])->name('update-activity');

    Route::get('/dashboard/activity/{slug}/detail', [App\Http\Controllers\admin\ActivityController::class, 'detail']);

    // Dashboard Advertise
    Route::get('/dashboard/advertise', [App\Http\Controllers\admin\AdvertiseController::class, 'index']);
    Route::post('/dashboard/advertise', [App\Http\Controllers\admin\AdvertiseController::class, 'store']);
    Route::patch('/dashboard/advertise/{id}', [App\Http\Controllers\admin\AdvertiseController::class, 'update']);
    Route::get('/dashboard/advertise/{slug}/detail', [App\Http\Controllers\admin\AdvertiseController::class, 'detail']);
    Route::get('/dashboard/advertise/{slug}/change-status', [App\Http\Controllers\admin\AdvertiseController::class, 'changeStatus']);
    Route::get('/dashboard/advertise/{slug}/delete', [App\Http\Controllers\admin\AdvertiseController::class, 'destroy']);
    Route::get('/dashboard/advertise/{slug}/edit', [App\Http\Controllers\admin\AdvertiseController::class, 'edit']);


    // Dashboard Gallery
    Route::get('/dashboard/gallery', [App\Http\Controllers\admin\GalleryController::class, 'index']);
    Route::post('/dashboard/gallery', [App\Http\Controllers\admin\GalleryController::class, 'store']);
    Route::patch('/dashboard/gallery/{id}', [App\Http\Controllers\admin\GalleryController::class, 'update']);
    Route::get('/dashboard/gallery/{slug}/detail', [App\Http\Controllers\admin\GalleryController::class, 'detail']);
    Route::get('/dashboard/gallery/{slug}/change-status', [App\Http\Controllers\admin\GalleryController::class, 'changeStatus']);
    Route::get('/dashboard/gallery/{slug}/delete', [App\Http\Controllers\admin\GalleryController::class, 'destroy']);
    Route::get('/dashboard/gallery/{slug}/edit', [App\Http\Controllers\admin\GalleryController::class, 'edit']);
});







