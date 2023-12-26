<?php

namespace App\Http\Controllers;


use App\Models\Item;
use App\Models\Category;

class CategoryController extends Controller
{   
    public function showHeader()
    {
        $categories = Category::all();
        
        // Dump the $categories variable for debugging
        dd($categories);
    
        return view('header', compact('categories'));
    }

    
    public function categoryItems($id)
    {
        // $items = item::where('category_id', $id)->get();

        return view('category.items', compact('items'));
    }   
    
}