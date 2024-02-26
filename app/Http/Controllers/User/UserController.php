<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Seller\Product;
use App\Models\User\User;
use App\Models\viewCounter;
use Carbon\Carbon;
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
        $currentDate = Carbon::now()->toDateString();
        $product = Product::where('id', $id)->first();
        $viewCounter = viewCounter::where("user_id", Auth()->user()->id)->whereDate('created_at',$currentDate)->first();
        if ($viewCounter != null) {
            $viewCounter->update([
                "count" => $viewCounter->count+1,
            ]);
        } else {
            viewCounter::create([
                'user_id' => Auth()->user()->id,
                'product_id' => $id,
                'seller_id' =>$product->user_id,
                'count' => 1,
            ]);
        }
        return view('User.productDetails', compact('product',));
    }

    public function addDeliveryForm()
    {
        return view('User.addDeliveryDetails');
    }
}
