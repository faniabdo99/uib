<?php

use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\isAdmin;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome'])->name('home');

Route::post('/store/contact-request', [ContactRequestController::class, 'store'])->name('contactRequest.store');

// Login
Route::get('login', [AuthController::class, 'getLogin'])->name('login.get');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => [isAdmin::class], 'as' => 'admin.'], function(){
    Route::get('/', [AdminController::class, 'getHome'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('contact-requests')->group(function(){
        Route::get('', [ContactRequestController::class, 'getAdminAll'])->name('contactRequests.all');
        Route::get('/{ContactRequest}', [ContactRequestController::class, 'getAdminSingle'])->name('contactRequests.single');
    });

    Route::prefix('services')->group(function(){
        Route::get('all', [ServiceController::class, 'getAdminAll'])->name('services.all');
        Route::get('new', [ServiceController::class, 'getAdminNew'])->name('service.getNew');
        Route::post('new', [ServiceController::class, 'postAdminNew'])->name('service.postNew');
        Route::get('edit/{Service}', [ServiceController::class, 'getAdminEdit'])->name('service.getEdit');
        Route::post('edit/{Service}', [ServiceController::class, 'postAdminEdit'])->name('service.postEdit');
        Route::get('delete/{Service}', [ServiceController::class, 'delete'])->name('service.delete');
    });
});