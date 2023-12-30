<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        $category = new Category;
        $category->create([
            'name' => $request->input('name'),
        ]);
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
    }   
    public function deleteCategory($id)
    {
        $category  = Category::where('id', $id);
        $category->delete();
    }   
    
}
