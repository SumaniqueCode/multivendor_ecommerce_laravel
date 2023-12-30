<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Seller\Product;
use App\Models\User\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('User.dashboard', compact('categories'));
    }

    public function products()
    {
        $products = Product::latest()->get();
        return view('User.products', compact('products'));
    }

    public function productDetails($id)
    {
        $product = Product::where('id', $id)->first();
        return view('User.productDetails', compact('product'));
    }
}
