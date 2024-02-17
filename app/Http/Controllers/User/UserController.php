<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Seller\Product;
use App\Models\User\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('User.dashboard', compact('categories'));
    }

    public function products()
    {
        $products = Product::latest()->get();
        return view('User.products', compact('products'));
    }

    public function productCategory($id)
    {
        $products = Product::where('category_id', $id)->get();
        return view('User.products', compact('products'));
    }
    
    public function productDetails($id)
    {
        $product = Product::where('id', $id)->first();
        return view('User.productDetails', compact('product',));
    }

    public function addDeliveryForm(){
        return view('User.addDeliveryDetails');
    }
}
