<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller\Product;
use App\Models\Seller\productVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productValidator(array $productData){
        return Validator::make($productData,[
            'name' => 'required|string|min:5|max:25',
            'category_id' => 'required|integer',
            'description'=>'required|string|min:20|max:5000',
            'brand'=>'nullable|string|min:3|max:50',
            'model'=>'nullable|string|min:5|max:50',
            'origin'=>'required|string|min:3|max:50',
        ]);
    }

    public function addProduct(Request $request){
        $productData = $request->all();
        $validator = $this->productValidator($productData);
        $imageArray = [];
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:25',
            'category_id' => 'required|integer',
            'description'=>'required|string|min:20|max:5000',
            'brand'=>'nullable|string|min:3|max:50',
            'model'=>'nullable|string|min:5|max:50',
            'origin'=>'required|string|min:3|max:50',
            'price'=>'required|numeric|min:0.1',
            'color'=>'nullable|string|min:3|max:50',
            'size'=> 'nullable|string|min:1|max:16',
            'stock'=>'required|integer|min:1',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
    
        DB::beginTransaction();  
                              
        try {
            if (isset($productData['image']) && $productData['image']) {
                $image = $productData['image'];
                $image_new_name = time() . $image->getClientOriginalName();
                $image->move('Images/Products/', $image_new_name);
                $imagePath = 'Images/Products/' . $image_new_name;
                $imageArray[] =  $imagePath;    
            } else {
                $imageArray[] = 'Images/Products/default-product-image.png';
            }

            $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'description' => $request->description,
            'brand' => $request->brand,
            'model' => $request->model,
            'origin' => $request->origin,
            'status' => "Active",
       ] );
            productVariation::create([
                "product_id" => $product->id,
                'price' => $request->price,
                'color' => $request->color,
                'stock' => $request->stock,
                "size" => $request->size,
                'image' => json_encode($imageArray),
            ]);
    
            DB::commit();
    
            return redirect('product/get-product-details/' . $product->id)->with('success', 'Product Added Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error adding product: ' . $e->getMessage());
        }
    }
    
    public function getProductDetails($id){
        $product = Product::where('id', $id)->first();
        $productVariations = $product->productVariation;
        return view('Seller.viewProduct', compact('product', 'productVariations'));
    }

    public function editProduct(Request $request){
        $productData = $request->all();
        $validator = $this->productValidator($productData);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $product = Product::where('id', $request->id)->first();
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'user_id' => auth()->user()->id,
                'description'=>$request->description,
                'brand'=>$request->brand,
                'model'=>$request->model,
                'origin'=>$request->origin,
            ]);
            return redirect('product/get-product-details/' . $product->id)->with('success', 'Product Added Successfully');
        }
    }

    public function deleteProduct($id){
        $product = Product::where('id', $id)->first();
        // $product->delete();
        return back()->with('success', 'Product Deleted successfully');
    }

    public function changeProductStatus($id){
        $product = Product::findOrFail($id);
        if($product->status === "Active"){
            $product->update(['status' => 'Inactive']);
            return response()->json("Inactive");
        }else{
            $product->update(['status' => 'Active']);
            return response()->json("Active");
        }
    }
}
