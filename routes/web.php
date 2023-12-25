<?php

use App\Admin\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\User\UsersController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProductDetailController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    return view('welcome');
});

$router->resource('demo/users', UserController::class);

//User Routes
Route::get('/dashboard',[UsersController::class, 'index'])->name('userDashboard');

//products
Route::get('/products',[ProductController::class, 'index'])->name('Products')->name('User Products');
Route::get('/get-product-details',[ProductController::class, 'index'])->name('User Product Details');

//orders
Route::get('/orders',[OrderController::class, 'index'])->name('Orders')->name('USer Orders');
Route::get('/cart',[CartController::class, 'index'])->name('Cart')->name('User Cart');
Route::get('/profile',[ProfileController::class, 'index'])->name('Profile')->name('User Profile');

//Seller Routes
Route::get('/seller-dashboard',[SellerController::class, 'dashboard'])->name('Seller Dashboard');
Route::get('/seller-products',[SellerController::class, 'products'])->name('Seller Products');
Route::get('/user-orders',[SellerController::class, 'orders'])->name('Users Orders');
Route::get('/seller-profile',[SellerController::class, 'profile'])->name('seller Profile');
Route::get('/seller-add-product',[SellerController::class, 'addProduct'])->name('Add Products');
Route::get('/seller-get-product',[SellerController::class, 'getProduct'])->name('View Products');
Route::get('/seller-edit-product',[SellerController::class, 'editProduct'])->name('Edit Products');
Route::get('/seller-delete-product',[SellerController::class, 'deleteProduct'])->name('Delete Products');

//Admin Routes
