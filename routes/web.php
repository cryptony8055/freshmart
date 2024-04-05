<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\AuthManager;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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


Route::get('/',[userController::class , 'index'])->name('user.index');
Route::get('/logout',[AuthenticatedSessionController::class, 'destroy'])->name('user.logout');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth','verified'])->group(function(){
    Route::get('/product/index',[ProductController::class , 'index'])->name('product.index');
    Route::get('/product/addProduct',[ProductController::class , 'create'])->name('product.create');
    Route::post('/product/addProduct',[ProductController::class , 'store'])->name('product.store');
    Route::get('/edit-product/{id}',[ProductController::class , 'edit'])->name('product.edit');
    Route::post('/update-product',[ProductController::class , 'update'])->name('product.update');
    Route::get('/delete-product/{id}',[ProductController::class , 'destroy'])->name('product.destroy');
    Route::post('/toggle-status/{id}',[ProductController::class , 'toggleStatus'])->name('product.toggleStatus');
    Route::get('/delete-image/{id}',[ProductController::class , 'imageDelete'])->name('product.imageDelete');
});

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/category/categoryindex',[CategoryController::class , 'index'])->name('category.index');
    Route::get('/category/addcategory',[CategoryController::class , 'create'])->name('category.create');
    Route::post('/category/addcategory',[CategoryController::class , 'store'])->name('category.store');
    Route::get('/edit-category/{id}',[CategoryController::class , 'edit'])->name('category.edit');
    Route::put('/update-category/{id}',[CategoryController::class , 'update'])->name('category.update');
    Route::get('/delete-category/{id}',[CategoryController::class , 'destroy'])->name('category.destroy');
    Route::post('/toggle-status-cat/{id}',[CategoryController::class , 'toggleStatusCat'])->name('category.toggleStatus');
});

Route::middleware(['auth','verified'])->group(function(){
    //this is admin data
    Route::get('/product-list',[userController::class , 'catProducts'])->name('customers.categoryProducts');
    //this is customer data
    Route::post('/product-cart',[userController::class , 'addToCart'])->name('customers.addToCart');
    Route::get('/cart',[userController::class , 'cartProductIndex'])->name('customers.cart');
    Route::get('/product_remove',[userController::class , 'deleteCartProduct'])->name('customers.productRemove');
    Route::get('/cart-update',[userController::class , 'increaseQuantity'])->name('customers.updateCart');
    Route::post('/check-cart',[userController::class , 'checkCart'])->name('customers.checkCart');
    Route::get('users-index',[userController::class,'userslisting'])->name('users.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/profile', [ProfileController::class, 'update'])->name('profile.update');
require __DIR__.'/auth.php';
