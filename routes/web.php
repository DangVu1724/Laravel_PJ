<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route cho user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/category/men', [DashboardController::class,'men']) -> name('men');
    Route::get('/category/women', [DashboardController::class,'women']) -> name('women');
    Route::get('/category/accessories', [DashboardController::class,'accessory']) -> name('accessories');
    Route::get('/category/productDetails/{id}',[DashboardController::class,'details'])->name('productDetails');

});

// Route cho admin (được bảo vệ bởi middleware)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::resource('admin/product', ProductController::class);
    Route::resource('admin/user', UserController::class);
});

// Profile routes (chung cho tất cả authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__ . '/auth.php';
