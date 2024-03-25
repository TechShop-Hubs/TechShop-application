<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
    return view('clients.home');
});

Route::get('/clients/home', [ClientsController::class, 'index']);

Route::get('/clients/products', [ClientsController::class, 'products']);

Route::get('/clients/iphone', [ClientsController::class, 'iphone']);

Route::get('/clients/oppo', [ClientsController::class, 'oppo']);

Route::post('/clients/oppo', [ClientsController::class, 'filters']);

Route::get('/clients/samsung', [ClientsController::class, 'samsung']);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/login', [UserController::class, 'login']);

Route::post('/register', [UserController::class, 'register']);


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/product', [AdminController::class, 'index'])->name('product');

    Route::get('/category', [AdminController::class, 'getCategories'])->name('categories');
    Route::get('/category/create', [AdminController::class, 'getFormCreateCategory'])->name('createCategory');
    Route::post('/category/create', [AdminController::class, 'postCreateCategory'])->name('postCreateCategory');
    Route::get('/category/update/{id}', [AdminController::class, 'getUpdateCategory'])->name('updateCategory');
    Route::post('/category/update/{id}', [AdminController::class, 'postUpdateCategory']);
    Route::get('/category/delete/{id}', [AdminController::class, 'getDeleteCategory'])->name('deleteCategory');
    Route::post('/category/delete/{id}', [AdminController::class, 'postDeleteCategory']);

    Route::get('/user', [UserController::class, 'getAllUsers'])->name('users');
    Route::get('/user/create', [UserController::class, 'getFormCreateUser'])->name('createUser');
    Route::post('/user/create', [UserController::class, 'createUser']);
    Route::get('/user/delete/{id}', [UserController::class,'getDeleteUser'])->name('deleteUser');
    Route::post('/user/delete/{id}', [UserController::class,'postDeleteUser']);
    Route::get('/user/{id}', [UserController::class, 'getDetailUser'])->name('detailUser');
    Route::get('/user/update/{id}', [UserController::class, 'getUpdateUser'])->name('updateUser');
    Route::post('/user/update/{id}', [UserController::class, 'postUpdateUser']);

    Route::get('/order', [AdminController::class, 'getAllOrders'])->name('orders');

    Route::get('/product/create', [AdminController::class, 'getFormCreateProduct'])->name('createProduct');
    Route::get('/product/{id}', [AdminController::class, 'getDetailProduct'])->name('detailProduct');
    Route::get('/product/update/{id}', [AdminController::class, 'getUpdateProduct'])->name('updateProduct');
    Route::get('/product/delete/{id}', [AdminController::class, 'getDeleteProduct'])->name('deleteProduct');
    Route::post('/product/update/{id}', [AdminController::class, 'postUpdateProduct']);
    Route::post('/product/delete/{id}', [AdminController::class,'postDeleteProduct']);

    Route::get('/contact', [AdminController::class, 'getContact'])->name('contact');
    Route::get('/banner', [AdminController::class, 'getBanner'])->name('banner');
    Route::get('/wishlist', [AdminController::class, 'getWishList'])->name('wishList');

});
