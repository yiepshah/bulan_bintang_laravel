<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function addPost(Request $request){
        $itemPost = $request->validate([
            'item_name' => 'required',
            'price'=> 'required',
            'product_information'=> 'required',
            'material'=> 'required',
            'inside_box'=> 'required',
            'category_id'=> 'required',
            'image_path'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image_path')->store('images', 'public');
        $itemPost['item_name'] = strip_tags( $itemPost['item_name']);
        $itemPost['product_information'] = strip_tags($itemPost['product_information']);
        $itemPost['material'] = strip_tags($itemPost['material']);
        $itemPost['inside_box'] = strip_tags($itemPost['inside_box']);
        $itemPost['category_id'] = strip_tags($itemPost['category_id']);
        $itemPost['item_id'] = auth()->id();
        Post::create($itemPost);
        return redirect('adminpage'); 

    }

    public function collection()
    {
        $items = Post::all(); 
        return view('collection', compact('items'));
    }

    public function showDetails($itemId)
    {
        $itemDetails = DB::table('posts')
            ->select('item_name', 'image_path', 'price', 'product_information', 'material', 'inside_box')
            ->where('item_id', $itemId)
            ->first();

        if ($itemDetails) {
            $breadcrumb = '<a href="' . route('index') . '">Home</a> / ';
            // $breadcrumb .= '<a href="' . route('category') . '">Baju Melayu Slim Fit</a> / ';
            $breadcrumb .= '<span>' . $itemDetails->item_name . '</span>';

            return view('details', compact('itemDetails', 'breadcrumb'));
        } else {
            return view('details', ['itemNotFound' => true]);
        }
    }

    public function addToCart(Request $request, $itemId)
    {
        $itemDetails = DB::table('posts')->find($itemId);

        if ($itemDetails) {


            return view('cart_confirmation', compact('itemDetails'));
        } else {
            return view('cart_confirmation', ['itemNotFound' => true]);
        }
    }
}
