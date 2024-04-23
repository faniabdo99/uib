<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubServiceController;

use App\Http\Middleware\isAdmin;

Route::get('/', [ HomeController::class, 'getHome' ])->name('home');
Route::get('about', [ PageController::class, 'getAbout' ])->name('about');
Route::get('contact', [ PageController::class, 'getContact' ])->name('contact');
Route::post('/store/contact-request', [ ContactRequestController::class, 'store' ])->name('contactRequest.store');
Route::get('blog', [ BlogController::class, 'getAll' ])->name('blog');
Route::get('blog/{Blog}/{slug}', [ BlogController::class, 'getSingle' ])->name('blog.single');
Route::get('services', [ ServiceController::class, 'getAll' ])->name('services');
Route::get('services/{Service}/{slug}', [ ServiceController::class, 'getSingle' ])->name('services.single');
Route::get('projects', [ ProjectController::class, 'getAll' ])->name('projects');
Route::get('projects/{Project}/{slug}', [ ProjectController::class, 'getSingle' ])->name('projects.single');
// Login
Route::get('login', [ AuthController::class, 'getLogin' ])->name('login.get');
Route::post('login', [ AuthController::class, 'postLogin' ])->name('login.post');
// Admin Routes
Route::group([ 'prefix' => 'admin', 'middleware' => [ isAdmin::class], 'as' => 'admin.' ], function (): void {
    Route::get('/', [ AdminController::class, 'getHome' ])->name('home');
    Route::get('/logout', [ AuthController::class, 'logout' ])->name('logout');
    Route::prefix('contact-requests')->group(function (): void {
        Route::get('', [ ContactRequestController::class, 'getAdminAll' ])->name('contactRequests.all');
        Route::get('/{ContactRequest}', [ ContactRequestController::class, 'getAdminSingle' ])->name('contactRequests.single');
    });

    Route::prefix('services')->group(function (): void {
        Route::get('all', [ ServiceController::class, 'getAdminAll' ])->name('services.all');
        Route::get('new', [ ServiceController::class, 'getAdminNew' ])->name('services.getNew');
        Route::post('new', [ ServiceController::class, 'postAdminNew' ])->name('services.postNew');
        Route::get('edit/{Service}', [ ServiceController::class, 'getAdminEdit' ])->name('services.getEdit');
        Route::post('edit/{Service}', [ ServiceController::class, 'postAdminEdit' ])->name('services.postEdit');
        Route::get('delete/{Service}', [ ServiceController::class, 'delete' ])->name('services.delete');
    });

    Route::prefix('sub-services')->group(function (): void {
        Route::get('all/{Service}', [ SubServiceController::class, 'getAdminAll' ])->name('subServices.all');
        Route::get('new/{Service}', [ SubServiceController::class, 'getAdminNew' ])->name('subServices.getNew');
        Route::post('new/{Service}', [ SubServiceController::class, 'postAdminNew' ])->name('subServices.postNew');
        Route::get('edit/{SubService}', [ SubServiceController::class, 'getAdminEdit' ])->name('subServices.getEdit');
        Route::post('edit/{SubService}', [ SubServiceController::class, 'postAdminEdit' ])->name('subServices.postEdit');
        Route::get('delete/{SubService}', [ SubServiceController::class, 'delete' ])->name('subServices.delete');
    });

    Route::prefix('categories')->group(function (): void {
        Route::get('all', [ CategoryController::class, 'getAdminAll' ])->name('categories.all');
        Route::get('new', [ CategoryController::class, 'getAdminNew' ])->name('categories.getNew');
        Route::post('new', [ CategoryController::class, 'postAdminNew' ])->name('categories.postNew');
        Route::get('edit/{Category}', [ CategoryController::class, 'getAdminEdit' ])->name('categories.getEdit');
        Route::post('edit/{Category}', [ CategoryController::class, 'postAdminEdit' ])->name('categories.postEdit');
        Route::get('delete/{Category}', [ CategoryController::class, 'delete' ])->name('categories.delete');
    });

    Route::prefix('projects')->group(function (): void {
        Route::get('all', [ ProjectController::class, 'getAdminAll' ])->name('projects.all');
        Route::get('new', [ ProjectController::class, 'getAdminNew' ])->name('projects.getNew');
        Route::post('new', [ ProjectController::class, 'postAdminNew' ])->name('projects.postNew');
        Route::get('edit/{Project}', [ ProjectController::class, 'getAdminEdit' ])->name('projects.getEdit');
        Route::post('edit/{Project}', [ ProjectController::class, 'postAdminEdit' ])->name('projects.postEdit');
        Route::get('delete/{Project}', [ ProjectController::class, 'delete' ])->name('projects.delete');
    });

    Route::prefix('blog')->group(function (): void {
        Route::get('all', [ BlogController::class, 'getAdminAll' ])->name('blogs.all');
        Route::get('new', [ BlogController::class, 'getAdminNew' ])->name('blogs.getNew');
        Route::post('new', [ BlogController::class, 'postAdminNew' ])->name('blogs.postNew');
        Route::get('edit/{Blog}', [ BlogController::class, 'getAdminEdit' ])->name('blogs.getEdit');
        Route::post('edit/{Blog}', [ BlogController::class, 'postAdminEdit' ])->name('blogs.postEdit');
        Route::get('delete/{Blog}', [ BlogController::class, 'delete' ])->name('blogs.delete');
    });
});
Route::post('api/upload/{project}', [ProjectController::class, 'uploadGallery'])->name('admin.projects.uploadGallery');
