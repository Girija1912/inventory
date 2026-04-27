<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('admin')->group(function () {
    Route::get('/addcategory', [AdminController::class, 'addCategory'])->name('admin.addcategory');
    Route::post('/postaddcategory', [AdminController::class, 'postaddcategory'])->name('admin.postaddcategory');
    Route::get('/viewcategory', [AdminController::class, 'viewcategory'])->name('admin.viewcategory');
    Route::get('/deletecategory/{id}', [AdminController::class, 'deletecategory'])->name('admin.deletecategory');
    Route::get('/updatecategory/{id}', [AdminController::class, 'updatecategory'])->name('admin.updatecategory');
    Route::post('/postupdatecategory/{id}', [AdminController::class, 'postupdatecategory'])->name('admin.postupdatecategory');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
