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
            'price'=>'required|numeric|min:0.1',
            'color'=>'nullable|string|min:3|max:50',
            'stock'=>'required|integer|min:1',
            'size'=> 'nullable|string|min:1|max:16',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    public function addProductVariation(Request $request){
        $productData = $request->all();
        $validator = $this->productValidator($productData);
        $imageArray = [];
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            if (isset($productData['image'])) {
                $image = $productData['image'];
                $image_new_name = time() . $image->getClientOriginalName();
                $image->move('Images/Products/', $image_new_name);
                $imagePath = 'Images/Products/' . $image_new_name;
                $imageArray[] =  $imagePath;    
            } else {
                $imageArray[] = 'Images/Products/default-product-image.png';
            }
            $product= productVariation::create([
                'product_id' => $request->product_id,
                'price'=>$request->price,
                'color'=>$request->color,
                'stock'=>$request->stock,
                'size'=>$request->size,
                'image' => json_encode($imageArray),
            ]);
            return back()->with(['success','Product Variations Added Successfully','product', $product]);
            }
    }
    public function getProductVariation(Request $request)
    {
        $productVariationData = ProductVariation::where('id', $request->id)->first();
        $productVariation=[
        'product_id' => $productVariationData->product_id,
                'price'=>$productVariationData->price,
                'color'=>$productVariationData->color,
                'stock'=>$productVariationData->stock,
                'size'=>$productVariationData->size,
                'image' => json_decode($productVariationData->image),
        ];
        return response()->json(['product'=>$productVariation]);
    }
    public function editProductVariation ($id){
        $productVariation = ProductVariation::where('id', $id)->first();
        return view('Seller.editProductVariation', compact('productVariation'));
    }

    public function updateProductVariation(Request $request, $id){
        $productData = $request->all();
        $validator = $this->productValidator($productData);
        $product= productVariation::where('id', $id)->first();
        $imageArray = [];
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            if (isset($productData['image'])) {
                    $image = $productData['image'];
                    $image_new_name = time() . $image->getClientOriginalName();
                    $image->move('Images/Products/', $image_new_name);
                    $imagePath = 'Images/Products/' . $image_new_name;
                    $imageArray[] =  $imagePath;    
            } else {
                $imageArray = json_decode($product->image);
            }
            $product->update([
                'price'=>$request->price,
                'color'=>$request->color,
                'stock'=>$request->stock,
                'size'=>$request->size,
                'image' => json_encode($imageArray),
            ]);
            return redirect('product/get-product-details/'.$product->product->id)->with(['success','Product Variations Added Successfully']);
            }
    }
    public function deleteProductVariation($id){
        $productVariation = ProductVariation::where('id', $id)->first();
        $productVariation->delete();
        return back()->with(['product'=>$productVariation,'success'=>'Product Variation Deleted successfully']);
    }

}
