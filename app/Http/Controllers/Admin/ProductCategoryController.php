<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        $existing_category = Category::where('name', $request->name)->first();
        if(!$existing_category)
        {
            $category = new Category;
            $category->create([
                'name' => $request->name,
            ]);
            return back()->with(['success'=>'Category Added Successfully', 'category'=>$category]);
        }
        else{
            return back()->with(['error'=>'Category Already Exist', 'category'=>$existing_category]);
        }
    }   
    public function getCategory()
    {
        $category = Category::get()->latest();
        return(compact('category'));
    }   
    public function updateCategory(Request $request)
    {
        $category  = Category::where('id', $request->id);
        $category->update([
            'name'=>$request->name,
        ]);
        return back()->with(['success'=>'Category Updated Successfully', 'category'=>$category]);
    }   
    public function deleteCategory($id)
    {
        $category  = Category::where('id', $id);
        $category->delete();
        return back()->with(['success'=>'Category Deleted Successfully', 'category'=>$category]);
    }   
    
}
