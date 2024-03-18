<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('admin')->group(function () {
    Route::get('/product', [AdminController::class, 'index'])->name('product');
    Route::get('/category', [AdminController::class, 'getCategories'])->name('categories');
    Route::get('/category/create', [AdminController::class, 'getFormCreateCategory'])->name('createCategory');
    Route::get('/category/update/{id}', [AdminController::class, 'getUpdateCategory'])->name('updateCategory');
    Route::get('/user', [AdminController::class, 'getAllUsers'])->name('users');
    Route::get('/order', [AdminController::class, 'getAllOrders'])->name('orders');
    Route::get('/product/create', [AdminController::class, 'getFormCreateProduct'])->name('createProduct');
    Route::get('/product/{id}', [AdminController::class, 'getDetailProduct'])->name('detailProduct');
    Route::get('/product/update/{id}', [AdminController::class, 'getUpdateProduct'])->name('updateProduct');
    Route::get('/product/delete/{id}', [AdminController::class, 'getDeleteProduct'])->name('deleteProduct');
    Route::get('/user/{id}', [AdminController::class, 'getDetailUser'])->name('detailUser');
    Route::get('/user/update/{id}', [AdminController::class, 'getUpdateUser'])->name('updateUser');
    Route::get('/contact', [AdminController::class, 'getContact'])->name('contact');
    Route::get('/banner', [AdminController::class, 'getBanner'])->name('banner');
    Route::get('/wishlist', [AdminController::class, 'getWishList'])->name('wishList');
});
