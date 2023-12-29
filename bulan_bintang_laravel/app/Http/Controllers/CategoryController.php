<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;

class CategoryController extends Controller
{   
    public function showHeader()
    {
        $categories = Category::all();
        return view('header', compact('categories'));
    }

    public function categoryItems($id)
    {
        $items = Post::where('category_id', $id)->get();
        return view('category.items', compact('items'));
    }   
}
