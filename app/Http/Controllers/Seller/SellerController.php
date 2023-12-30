<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Seller\Product;
use App\Models\Seller\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function dashboard(){
        return view("Seller.sellerDashboard");
    }
    public function products(){
        $products = Product::where('seller_id', auth()->user()->id)->get();
        return view("Seller.products", compact('products'));
    }

    public function orders(){
        return view("Seller.sellerOrders");
    }

    public function profile(){
        return view("Seller.sellerProfile");
    }
    public function addProduct(){
        $categories = Category::latest()->get();
        return view("Seller.addProduct", compact('categories'));
    }

    public function editProduct($id){
        $categories = Category::latest()->get();
        $products = Product::where('id', $id)->first();
        return view("Seller.editProduct", compact('categories', 'products'));
    }
}
