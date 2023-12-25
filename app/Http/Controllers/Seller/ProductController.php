<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productValidator(){
        return request()->validate([
            'product_name' => 'required|string|min:5|max:10',
            'category_id' => 'required|integer',
            'product_description'=>'required|string|min:20|max:1500',
            'product_price'=>'required|float|max:15',
            'product_color'=>'nullable|string|min:3|max:50',
            'product_brand'=>'nullable|string|min:3|max:50',
            'product_model'=>'nullable|string|min:5|max:50',
            'stock'=>'required|integer|max:15',
            'origin_country'=>'nullable|string|min:3|max:50',
            'product_image'=>'required|string',

        ]);
    }

    public function addProducts(Request $request){
        $products = New Product;
    }
    public function getProducts($id){

    }

    public function editProduct(){

    }


    public function deleteProduct($id){

    }

}
