<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::post('upload/{project}' , [ProjectController::class, 'uploadGallery'])->name('admin.projects.uploadGallery');
