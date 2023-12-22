<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function addPost(Request $request)
    {
        $itemPost = $request->validate([
            'item_name' => 'required',
            'price' => 'required',
            'product_information' => 'required',
            'material' => 'required',
            'inside_box' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
    
        if (auth()->check()) {
                   
            $image_path = $request->file('image_path')->store('images', 'public');
            $itemPost['item_name'] = strip_tags($itemPost['item_name']);
            $itemPost['product_information'] = strip_tags($itemPost['product_information']);
            $itemPost['material'] = strip_tags($itemPost['material']);
            $itemPost['inside_box'] = strip_tags($itemPost['inside_box']);

            $itemPost['image_path'] = $image_path;

            $itemPost['user_id'] = auth()->id();
            
            Post::create($itemPost);
    
            return redirect('/collection');
        }
    
  
        return redirect('/login')->with('error', 'Please log in to add a post.');
    }
    public function collection()
    {
        $items = Post::all(); 
        return view('collection', compact('items'));
    }

    public function showDetails($itemId)
    {
        $itemDetails = Post::select('item_id', 'item_name', 'image_path', 'price', 'product_information', 'material', 'inside_box')
            ->where('item_id', $itemId)
            ->first();
    
        if ($itemDetails) {
            $sizeOptions = ['S', 'M', 'L', 'XL', 'XXL'];
    
            $breadcrumb = '<a href="' . route('index') . '">Home</a> / ';
            // $breadcrumb .= '<a href="' . route('category') . '">Baju Melayu Slim Fit</a> / ';
            $breadcrumb .= '<span>' . $itemDetails->item_name . '</span>';
    
            return view('details', compact('itemDetails', 'breadcrumb', 'sizeOptions'));
        } else {
            return view('details', ['itemNotFound' => true]);
        }
    }

    public function adminPage()
    {
        $items = Post::all();

        
        return view('adminpage', ['items' => $items]);
    }
}
