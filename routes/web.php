<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
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

//HOME PAGE-------------------------------------------------------------------------------------------
Route::get('/', [ClientsController::class, 'index'])->name('home');

//CLIENT PAGE-------------------------------------------------------------------------------------------
Route::get('/clients/products', [ClientsController::class, 'products']);
Route::get('/clients/iphone', [ClientsController::class, 'iphone']);
Route::get('/clients/laptop', [ClientsController::class, 'laptop']);
Route::post('/clupdateCartients/laptop', [ClientsController::class, 'filters']);
Route::get('/clients/samsung', [ClientsController::class, 'samsung']);
Route::get('/detail_product/{id}', [ClientsController::class, 'getProduct'])->name('detail_product');

//LOGIN-------------------------------------------------------------------------------------------
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [UserController::class, 'login']);

//REGISTER-------------------------------------------------------------------------------------------
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [UserController::class, 'register']);

//LOGOUT-------------------------------------------------------------------------------------------
Route::get('/logout', [ClientsController::class, 'logout']);

//CONTACT-------------------------------------------------------------------------------------------
Route::get('/contact',[ClientsController::class,'getContact'] )->name('client.contact');
Route::post('/contact', [AdminController::class,'createContact']);

//CHECKOUT-------------------------------------------------------------------------------------------
//checkout from cart
Route::post('/checkout', [ClientsController::class, 'checkouts'])->name('checkouts');
Route::post('/checkout_order', [ClientsController::class, 'order'])->name('order');
Route::post('/momo', [PaymentController::class, 'momoPayment'])->name('momoPayment');
Route::get('/momo/callback', [ClientsController::class, 'handleCallback']);

//CART-------------------------------------------------------------------------------------------
Route::post('/cart/{id}', [CartController::class, 'postCart'])->name('postCart');
Route::get('/cart', [ClientsController::class, 'getCart'])->name('cart');
Route::post('/cart-reduce', [CartController::class, 'reduceQuantity'])->name('reduceQuantity');
Route::post('/cart-increase', [CartController::class, 'increaseQuantity'])->name('increaseQuantity');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('updateCart');
Route::post('/delete-cart/{id}', [CartController::class, 'deleteCart'])->name('deleteCart');

//HISTORY_ORDER---------------------------------------------------------------------------------------------
Route::get('/history_order', [ClientsController::class, 'historyOrder'])->name('historyOrder');
Route::get('/change_password', [ClientsController::class, 'changePassword'])->name('changePassword');
Route::post('/change_password', [ClientsController::class, 'postChangePassword']);
Route::get('/update_information', [ClientsController::class, 'updateInformation'])->name('updateInformation');
Route::post('/update_information', [ClientsController::class, 'postUpdateInfo']);
Route::get('/action_history/{id}', [ClientsController::class, 'getDetailOrders']);
Route::get('/cancel_order/{id}', [ClientsController::class, 'cancelOrder']);

//WISHLIST-------------------------------------------------------------------------------------------
Route::post('/wishlish/{id}', [ClientsController::class, 'postWishList'])->name('postWishList');
Route::get('/wishlist',[ClientsController::class, 'getWishList'])->name('getWishList');
Route::post('/wishlist',[ClientsController::class, 'destroyWishlist'])->name('destroyWishlist');

//ADMIN-------------------------------------------------------------------------------------------
Route::prefix('admin')->middleware('admin')->group(function () {
    //DEFAULT PAGE-------------------------------------------------------------------------------------------
    Route::get('/', [AdminController::class, 'index'])->name('admin_home');

    //CATEGORY-------------------------------------------------------------------------------------------
    Route::get('/category', [AdminController::class, 'getCategories'])->name('categories');
    Route::get('/category/create', [AdminController::class, 'getFormCreateCategory'])->name('createCategory');
    Route::post('/category/create', [AdminController::class, 'postCreateCategory'])->name('postCreateCategory');
    Route::get('/category/update/{id}', [AdminController::class, 'getUpdateCategory'])->name('updateCategory');
    Route::post('/category/update/{id}', [AdminController::class, 'postUpdateCategory']);
    Route::get('/category/delete/{id}', [AdminController::class, 'getDeleteCategory'])->name('deleteCategory');
    Route::post('/category/delete/{id}', [AdminController::class, 'postDeleteCategory']);

    //USER-------------------------------------------------------------------------------------------
    Route::get('/user', [UserController::class, 'getAllUsers'])->name('users');
    Route::get('/user/delete/{id}', [UserController::class,'getDeleteUser'])->name('deleteUser');
    Route::post('/user/delete/{id}', [UserController::class,'postDeleteUser']);
    Route::get('/user/{id}', [UserController::class, 'getDetailUser'])->name('detailUser');
    Route::get('/user/update/{id}', [UserController::class, 'getUpdateUser'])->name('updateUser');
    Route::post('/user/update/{id}', [UserController::class, 'postUpdateUser']);

    //ORDER-------------------------------------------------------------------------------------------
    Route::get('/order', [AdminController::class, 'getAllOrders'])->name('orders');
    Route::get('/order/{id}', [AdminController::class, 'getDetailOrder'])->name('detailOrder');
    Route::get('/order/update/{id}', [AdminController::class, 'getUpdateOrder'])->name('updateOrder');
    Route::get('/order/delete/{id}', [AdminController::class, 'getDeleteOrder'])->name('deleteOrder');
    Route::post('/order/update/{id}', [AdminController::class, 'postUpdateOrder']);
    Route::post('/order/delete/{id}', [AdminController::class,'postDeleteOrder']);

    //PRODUCT-------------------------------------------------------------------------------------------
    Route::get('/product', [AdminController::class, 'index'])->name('product');
    Route::get('/product/create', [AdminController::class, 'getFormCreateProduct'])->name('createProduct');
    Route::get('/product/{id}', [AdminController::class, 'getDetailProduct'])->name('detailProduct');
    Route::get('/product/update/{id}', [AdminController::class, 'getUpdateProduct'])->name('updateProduct');
    Route::get('/product/delete/{id}', [AdminController::class, 'getDeleteProduct'])->name('deleteProduct');
    Route::post('/product/update/{id}', [AdminController::class, 'postUpdateProduct']);
    Route::post('/product/delete/{id}', [AdminController::class,'postDeleteProduct']);
    Route::post('/product/create', [AdminController::class, 'createProduct']);

    //CONTACT-------------------------------------------------------------------------------------------
    Route::get('/contact', [AdminController::class, 'getContact'])->name('contact');
    Route::get('/contact/update/{id}', [AdminController::class, 'getUpdateContact'])->name('updateContact');
    Route::post('/contact/update/{id}', [AdminController::class, 'updateContact']);

    //WHISLISH-------------------------------------------------------------------------------------------
    Route::get('/wishlist', [AdminController::class, 'getWishLish'])->name('wishList');

    //BANNER-------------------------------------------------------------------------------------------
    Route::get('/banner', [AdminController::class, 'getBanner'])->name('banner');
    Route::get('banner/create', [AdminController::class, 'getCreateBanner'])->name('getCreateBanner');
    Route::post('banner/create', [AdminController::class, 'postCreateBanner'])->name('postCreateBanner');
    Route::get('banner/delete/{id}', [AdminController::class, 'getDeleteBanner'])->name('getDeleteBanner');
    Route::post('banner/delete/{id}', [AdminController::class, 'postDeleteBanner'])->name('postDeleteBanner');
    Route::get('banner/update/{id}', [AdminController::class, 'getUpdateBanner'])->name('getUpdateBanner');
    Route::post('banner/update/{id}', [AdminController::class, 'postUpdateBanner'])->name('postUpdateBanner');

});
