<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('clients.home');
});

Route::get('/product', function () {
    return view('clients.products');
});

Route::get('/product/oppo', function () {
    return view('clients.oppo');
});

Route::get('/product/realme', function () {
    return view('clients.realme');
});
Route::get('/product/samsung', function () {
    return view('clients.samsung');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');
