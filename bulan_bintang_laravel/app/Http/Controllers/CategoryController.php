<?php

namespace App\Http\Controllers;

use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $mainCategories = Categories::with('subcategories')
            ->whereNull('parent_id')
            ->get();
    
        return view('header', ['mainCategories' => $mainCategories]);
    }
}