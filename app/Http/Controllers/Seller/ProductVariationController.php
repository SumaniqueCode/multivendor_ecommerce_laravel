<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller\productVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductVariationController extends Controller
{
    public function productValidator(array $productData){
        return Validator::make($productData,[
            'product_price'=>'required|numeric|min:0.1',
            'product_color'=>'required|string|min:3|max:50',
            'stock'=>'required|integer|min:1',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }


    public function addProductVariation(Request $request){
        $productData = $request->all();
        $validator = $this->productValidator($productData);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            if (isset($productData['product_image'])) {
                $image = $productData['product_image'];
                $image_new_name = time() . $image->getClientOriginalName();
                $image->move('Images/Products/', $image_new_name);
                $imagePath = 'Images/Products/' . $image_new_name;
            } else {
                $imagePath = 'Images/Products/default.jpg';
            }
            $product= productVariation::create([
                'product_id' => $request->product_id,
                'product_price'=>$request->product_price,
                'product_color'=>$request->product_color,
                'stock'=>$request->stock,
                'product_image' =>$imagePath,
            ]);
            return redirect('product/get-product-details/' . $product->product_id)->with('success', 'Product Variations Added Successfully');
            }
    }

    public function getProductVariation($id)
    {
        $productVariation = ProductVariation::where('id', $id)->first();
        return back($productVariation);
    }

    public function editProductVariation(Request $request, $id){
        $productData = $request->all();
        $validator = $this->productValidator($productData);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            if (isset($productData['product_image'])) {
                $image = $productData['product_image'];
                $image_new_name = time() . $image->getClientOriginalName();
                $image->move('Images/Products/', $image_new_name);
                $imagePath = 'Images/Products/' . $image_new_name;
            } else {
                $imagePath = 'Images/Products/default.jpg';
            }
            $product= ProductVariation::where('id', $id)->first();
            $product::update([
                'product_id' => $request->product_id,
                'product_price'=>$request->product_price,
                'product_color'=>$request->product_color,
                'stock'=>$request->stock,
                'product_image' =>$imagePath,
            ]);
            return redirect('product/get-product-details/' . $product->product_id)->with('success', 'Product Variation Updated Successfully');
            }
    }

    public function deleteProductVariation($id){
        $productVariation = ProductVariation::where('id', $id)->first();
        $productVariation->delete();

        return redirect()->with('success', 'Product Variation Deleted successfully');
    }

}
