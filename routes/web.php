<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientsController;
use GuzzleHttp\Client;

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


Route::get('/', [ClientsController::class, 'index'])->name('home');

Route::get('/clients/products', [ClientsController::class, 'products']);

Route::get('/clients/iphone', [ClientsController::class, 'iphone']);

Route::get('/clients/laptop', [ClientsController::class, 'laptop']);

Route::post('/clients/laptop', [ClientsController::class, 'filters']);

Route::get('/clients/samsung', [ClientsController::class, 'samsung']);

Route::get('/detail_product/{id}', [ClientsController::class, 'getProduct'])->name('detail_product');
Route::get('/information/{id}', [ClientsController::class, 'getInformation'])->name('get_information');
Route::get('/cart/{id}', [ClientsController::class, 'cart'])->name('cart');
Route::get('/wishlish/{id}', [ClientsController::class, 'wishlish'])->name('wishlish');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/contact',[ClientsController::class,'getContact'] )->name('client.contact');

Route::post('/contact', [AdminController::class,'createContact']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/register', [UserController::class, 'register']);

Route::get('/logout', [ClientsController::class, 'logout']);

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);

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
    Route::get('/order/{id}', [AdminController::class, 'getDetailOrder'])->name('detailOrder');
    Route::get('/order/update/{id}', [AdminController::class, 'getUpdateProduct'])->name('updateOrder');
    Route::get('/order/delete/{id}', [AdminController::class, 'getDeleteOrder'])->name('deleteOrder');
    Route::post('/order/update/{id}', [AdminController::class, 'postUpdateOrder']);
    Route::post('/order/delete/{id}', [AdminController::class,'postDeleteOrder']);

    Route::get('/product', [AdminController::class, 'index'])->name('product');
    Route::get('/product/create', [AdminController::class, 'getFormCreateProduct'])->name('createProduct');
    Route::get('/product/{id}', [AdminController::class, 'getDetailProduct'])->name('detailProduct');
    Route::get('/product/update/{id}', [AdminController::class, 'getUpdateProduct'])->name('updateProduct');
    Route::get('/product/delete/{id}', [AdminController::class, 'getDeleteProduct'])->name('deleteProduct');
    Route::post('/product/update/{id}', [AdminController::class, 'postUpdateProduct']);
    Route::post('/product/delete/{id}', [AdminController::class,'postDeleteProduct']);
    Route::post('/product/create', [AdminController::class, 'createProduct']);

    Route::get('/contact', [AdminController::class, 'getContact'])->name('contact');
    Route::get('/contact/update/{id}', [AdminController::class, 'getUpdateContact'])->name('updateContact');
    Route::post('/contact/update/{id}', [AdminController::class, 'updateContact']);
    Route::get('/banner', [AdminController::class, 'getBanner'])->name('banner');
    Route::get('/wishlist', [AdminController::class, 'getWishList'])->name('wishList');

});
