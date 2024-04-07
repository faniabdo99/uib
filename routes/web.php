<?php

use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome'])->name('home');

Route::post('/store/contact-request', [ContactRequestController::class, 'store'])->name('contactRequest.store');
