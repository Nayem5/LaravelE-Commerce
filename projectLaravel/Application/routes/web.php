<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StripeController;
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
})-> name('home');

Route::post('/session', [StripeController::class, 'session'])-> name('session');
Route::get('/success', [StripeController::class, 'success'])-> name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])-> name('cancel');
 
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])-> name('logout');

Route::get('/product', [ProductsController::class, 'product'])->name('product');

Route::get('/cart', [ProductsController::class, 'cart'])->name('cart');

Route::get('/add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
Route::patch('/update-cart', [ProductsController::class, 'update'])->name('update_cart');
Route::delete('/remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');

Route::get('/product/create', [ProductsController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductsController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductsController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductsController::class, 'updateProduct'])->name('product.update');

