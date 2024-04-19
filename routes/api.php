<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::post('upload/{project}', [ProjectController::class, 'uploadGallery'])->name('admin.projects.uploadGallery');
