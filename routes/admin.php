<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

//profile routes
Route::get('/profile',[ProfileController::class,'profile'])->name('profile');
Route::post('/profile/update',[ProfileController::class,'profileUpdate'])->name('profile.update');
