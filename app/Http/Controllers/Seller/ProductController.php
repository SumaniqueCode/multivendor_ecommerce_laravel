<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function productValidator(array $productData){
        return Validator::make($productData,[
            'product_name' => 'required|string|min:5|max:25',
            'category_id' => 'required|integer',
            'product_description'=>'required|string|min:20|max:5000',
            'product_price'=>'required|numeric|min:0.1',
            'product_color'=>'required|string|min:3|max:50',
            'product_brand'=>'nullable|string|min:3|max:50',
            'product_model'=>'nullable|string|min:5|max:50',
            'stock'=>'required|integer|min:1',
            'origin_country'=>'required|string|min:3|max:50',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    public function addProduct(Request $request){
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
            $product= Product::create([
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'seller_id' => auth()->user()->id,
                'product_description'=>$request->product_description,
                'product_price'=>$request->product_price,
                'product_color'=>$request->product_color,
                'product_brand'=>$request->product_brand,
                'product_model'=>$request->product_model,
                'stock'=>$request->stock,
                'origin_country'=>$request->origin_country,
                'product_image' =>$imagePath,
            ]);
            return redirect('product/get-product-details/' . $product->id)->with('success', 'Product Added Successfully');
            }
    }
    public function getProductDetails($id){
        $product = Product::where('id', $id)->first();
        $productVariations = $product->productVariation()->get();
        return view('Seller.viewProduct', compact('product','productVariations'));
    }

    public function editProduct(Request $request){
        $productData = $request->all();
        $validator =$this->productValidator($productData);
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
            $product = Product::where('id', $request->id)->first();
            $product->update([
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'product_description'=>$request->product_description,
                'product_price'=>$request->product_price,
                'product_color'=>$request->product_color,
                'product_brand'=>$request->product_brand,
                'product_model'=>$request->product_model,
                'stock'=>$request->stock,
                'origin_country'=>$request->origin_country,
                'product_image' =>$imagePath,
            ]);
            $productVariations = $product->productVariation()->get();
        return view('Seller.viewProduct', compact('product', 'productVariations'))->with('success','Product updated successfully');
    }
}


    public function deleteProduct($id){
        $product = Product::where('id', $id)->first();
        $productVariation = $product->productVariation;
        $product->delete();
        $productVariation->delete();

        return redirect()->with('success', 'Product Deleted successfully');
    }

}
