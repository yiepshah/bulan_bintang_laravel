<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{   
    public function getItems($categoryId)
    {
        $items = DB::table('posts')
            ->select('item_id', 'item_name', 'image_path', 'price')
            ->where('category_id', $categoryId)
            ->orderByDesc('item_id')
            ->get();

        return response()->json(['items' => $items]);
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Validation and store logic
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validation and update logic
    }

    public function destroy($id)
    {
        // Delete logic
    }
}
