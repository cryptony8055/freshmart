<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\AuthManager;

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
    return view('user');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/product/index',[ProductController::class , 'index'])->name('product.index');
Route::get('/product/addProduct',[ProductController::class , 'create'])->name('product.create');
Route::get('/product/show',[ProductController::class , 'show'])->name('product.show');
Route::post('/product/addProduct',[ProductController::class , 'store'])->name('product.store');

Route::get('/category/categoryindex',[CategoryController::class , 'index'])->name('category.index');
Route::get('/category/addcategory',[CategoryController::class , 'create'])->name('category.create');
Route::post('/category/addcategory',[CategoryController::class , 'store'])->name('category.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/profile', [ProfileController::class, 'update'])->name('profile.update');
require __DIR__.'/auth.php';
