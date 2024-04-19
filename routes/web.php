<?php

use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\isAdmin;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome'])->name('home');
Route::get('about', [PageController::class, 'getAbout'])->name('about');
Route::get('contact', [PageController::class, 'getContact'])->name('contact');
Route::post('/store/contact-request', [ContactRequestController::class, 'store'])->name('contactRequest.store');
Route::get('projects', [ProjectController::class, 'getAll'])->name('projects');
Route::get('projects/{Project}/{slug}', [ProjectController::class, 'getSingle'])->name('projects.single');
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
        Route::get('new', [ServiceController::class, 'getAdminNew'])->name('services.getNew');
        Route::post('new', [ServiceController::class, 'postAdminNew'])->name('services.postNew');
        Route::get('edit/{Service}', [ServiceController::class, 'getAdminEdit'])->name('services.getEdit');
        Route::post('edit/{Service}', [ServiceController::class, 'postAdminEdit'])->name('services.postEdit');
        Route::get('delete/{Service}', [ServiceController::class, 'delete'])->name('services.delete');
    });

    Route::prefix('categories')->group(function(){
        Route::get('all', [CategoryController::class, 'getAdminAll'])->name('categories.all');
        Route::get('new', [CategoryController::class, 'getAdminNew'])->name('categories.getNew');
        Route::post('new', [CategoryController::class, 'postAdminNew'])->name('categories.postNew');
        Route::get('edit/{Category}', [CategoryController::class, 'getAdminEdit'])->name('categories.getEdit');
        Route::post('edit/{Category}', [CategoryController::class, 'postAdminEdit'])->name('categories.postEdit');
        Route::get('delete/{Category}', [CategoryController::class, 'delete'])->name('categories.delete');
    });

    Route::prefix('projects')->group(function(){
        Route::get('all', [ProjectController::class, 'getAdminAll'])->name('projects.all');
        Route::get('new', [ProjectController::class, 'getAdminNew'])->name('projects.getNew');
        Route::post('new', [ProjectController::class, 'postAdminNew'])->name('projects.postNew');
        Route::get('edit/{Project}', [ProjectController::class, 'getAdminEdit'])->name('projects.getEdit');
        Route::post('edit/{Project}', [ProjectController::class, 'postAdminEdit'])->name('projects.postEdit');
        Route::get('delete/{Project}', [ProjectController::class, 'delete'])->name('projects.delete');
    });

});