<?php

use App\Admin\Controllers\CategoryController;
use App\Admin\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\User\UsersController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\ProductVariationController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    return view('welcome');
});

$router->resource('demo/users', UserController::class);
$router->resource('/categories', CategoryController::class);



//User Routes
Route::get('/dashboard',[UsersController::class, 'index'])->name('user_dashboard');
Route::get('/profile',[ProfileController::class, 'userProfile'])->name('user_pofile');
Route::get('/products',[UsersController::class, 'products'])->name('user_products');
Route::get('/get-product-details/{id}',[UsersController::class, 'productDetails'])->name('user_product_details');

Route::get('/cart',[CartController::class, 'viewCart'])->name('user_cart');
Route::get('/add-to-cart/{id}',[CartController::class, 'addToCart'])->name('add_to_cart');
Route::post('/update-cart',[CartController::class, 'updateCart'])->name('update_cart');
Route::get('/delete-cart',[CartController::class, 'deleteCart'])->name('delete_cart');


Route::get('/orders',[OrderController::class, 'index'])->name('Orders')->name('user_orders');

//Seller Routes
Route::prefix('seller')->group(function () {
Route::get('/',[SellerController::class, 'dashboard'])->name('seller_dashboard');
Route::get('/products',[SellerController::class, 'products'])->name('seller_products');
Route::get('/orders',[SellerController::class, 'orders'])->name('users_orders');
Route::get('/profile',[ProfileController::class, 'userProfile'])->name('seller_profile');
Route::get('/add-product',[SellerController::class, 'addProduct'])->name('Add Products');
});

//product Routes
Route::prefix('product')->group(function () {
Route::post('/add-product',[ProductController::class, 'addProduct'])->name('add_product_details');
Route::get('/edit-product/{id}',[SellerController::class, 'editProduct'])->name('edit_products');
Route::post('/update-product',[ProductController::class, 'editProduct'])->name('Add Update Details');
Route::get('/get-product-details/{id}',[ProductController::class, 'getProductDetails'])->name('view_products');
Route::post('/add-product-variation',[ProductVariationController::class, 'addProductVariation'])->name('add_products_variations');
Route::post('/edit-product-variation',[ProductVariationController::class, 'editProductVariation'])->name('edit_products_variations');
Route::get('/delete-product',[ProductController::class, 'deleteProduct'])->name('delete_products');
});

//Admin Routes
