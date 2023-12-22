<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{   
    // public function getItems($categoryId)
    // {
    //     $items = DB::table('posts')
    //         ->select('item_id', 'item_name', 'image_path', 'price')
    //         ->where('category_id', $categoryId)
    //         ->orderByDesc('item_id')
    //         ->get();

    //     return response()->json(['items' => $items]);
    // }

    // public function showCategoryItems($category)
    // {
        
    //     $parentCategory = Category::where('category_name', $category)->first();

    //     if ($parentCategory) {
           
    //         $items = Category::where('parent_id', $parentCategory->category_id)->get();

    //         return view('collection', ['items' => $items]);
    //     } else {
            
    //         abort(404);
    //     }
    // }

    // public function index()
    // {
    //     $mainCategories = Category::with('subcategories')->whereNull('parent_id')->get();
    //     return view('categories.index', compact('mainCategories'));
    // }
    

    // public function create()
    // {
    //     return view('categories.create');
    // }

    // public function edit($id)
    // {
    //     $category = Category::findOrFail($id);
    //     return view('categories.edit', compact('category'));
    // }

    // public function update(Request $request, $id)
    // {
       
    // }

    // public function destroy($id)
    // {
       
    // }
}
