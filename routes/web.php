<?php

use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\User\UsersController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\ProductVariationController;
use App\Http\Controllers\User\DeliveryController;
use App\Http\Controllers\User\UserController;
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



//User Routes
Route::get('/dashboard',[UserController::class, 'index'])->name('user_dashboard');
Route::get('/profile',[ProfileController::class, 'userProfile'])->name('user_pofile');
Route::get('/products',[UserController::class, 'products'])->name('user_products');
Route::get('/get-product-details/{id}',[UserController::class, 'productDetails'])->name('user_product_details');
Route::get('/get-product-by-category/{id}',[UserController::class, 'productCategory'])->name('category_products');

Route::get('/cart',[CartController::class, 'viewCart'])->name('user_cart');
Route::post('/add-to-cart',[CartController::class, 'addToCart'])->name('add_to_cart');
Route::post('/update-cart',[CartController::class, 'updateCart'])->name('update_cart');
Route::post('/cart-checkout-view',[CartController::class, 'checkoutCart'])->name('checkout_cart');
Route::get('/delete-cart/{id}',[CartController::class, 'removeCart'])->name('delete_cart');

Route::get('/add-delivery-address',[UserController::class, 'addDeliveryForm'])->name('delivery_form');
Route::post('/create-new-address',[DeliveryController::class, 'addAddress'])->name('create_address');

Route::get('/orders',[OrderController::class, 'getOrders'])->name('user_orders');
Route::get('/add-order',[OrderController::class, 'addOrder'])->name('add_orders');
Route::get('/orders-details',[OrderController::class, 'getOrderDetails'])->name('get_order_details');
Route::post('/edit-order',[OrderController::class, 'editOrder'])->name('edit_order');
Route::post('/checkout',[OrderController::class, 'checkOutOrder'])->name('checkout_order');
Route::post('/checkout-view',[OrderController::class, 'viewOrder'])->name('view_order');
Route::get('/cancel-order/{id}',[OrderController::class, 'cancelOrder'])->name('cancel_order');
Route::get('/paywithkhalti', function(){return view('User.PayWithKhalti');})->name("paywithkhalti");


//Seller Routes
Route::prefix('seller')->group(function () {
Route::get('/',[SellerController::class, 'dashboard'])->name('seller_dashboard');
Route::get('/products',[SellerController::class, 'products'])->name('seller_products');
Route::get('/orders',[OrderController::class, 'getOrders'])->name('users_orders');
Route::get('/profile',[ProfileController::class, 'userProfile'])->name('seller_profile');
Route::get('/add-product',[SellerController::class, 'addProduct'])->name('add_products');
});

//product Routes
Route::prefix('product')->group(function () {
Route::post('/add-product',[ProductController::class, 'addProduct'])->name('add_product_details');
Route::get('/edit-product/{id}',[SellerController::class, 'editProduct'])->name('edit_products');
Route::post('/update-product',[ProductController::class, 'editProduct'])->name('add_update_details');
Route::get('/get-product-details/{id}',[ProductController::class, 'getProductDetails'])->name('view_products');
Route::post('/add-product-variation',[ProductVariationController::class, 'addProductVariation'])->name('add_products_variations');
Route::get('/edit-product-variation/{id}',[ProductVariationController::class, 'editProductVariation'])->name('edit_products_variations');
Route::post('/update-product-variation/{id}',[ProductVariationController::class, 'updateProductVariation'])->name('update_products_variations');
Route::post('/get-product-variation',[ProductVariationController::class, 'getProductVariation'])->name('get_products_variations');
Route::get('/delete-product/{id}',[ProductController::class, 'deleteProduct'])->name('delete_products');
Route::get('/delete-product-variation/{id}',[ProductVariationController::class, 'deleteProductVariation'])->name('delete_product_variation');
});

//Admin Routes
Route::post('/add-category', [ProductCategoryController::class, 'addCategory'])->name('add_category');
Route::get('/categories', function(){return view('Seller.category');});