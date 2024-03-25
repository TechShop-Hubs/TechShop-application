<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
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
