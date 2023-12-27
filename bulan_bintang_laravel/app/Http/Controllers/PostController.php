<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

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

        if (Auth::check()) {
            $image_path = $request->file('image_path')->store('images', 'public');

            $itemPost = array_map(function ($value) {
                return strip_tags($value);
            }, $itemPost);

            $itemPost['image_path'] = $image_path;
            $itemPost['user_id'] = Auth::id();

            Post::create($itemPost);

            return redirect('/collection');
        }

            return redirect('/login')->with('error', 'Please log in to add a post.');
        }

        public function adminPage()
        {
            $items = Post::all();
            $users = User::all();
            return view('adminpage', ['items' => $items] , ['users'=> $users]);
        }

        public function collection()
        {
            $items = Post::all(); 
            return view('collection', compact('items'));
        }

        public function updateItem(Request $request, $itemId)
        {
        
            $item = Post::find($itemId);
            $item->item_name = $request->input('item_name');
            $item->price = $request->input('price');
            $item->product_information = $request->input('product_information');
            $item->material = $request->input('material');
            $item->inside_box = $request->input('inside_box');
        
            $item->save();

        
            return response()->json(['success' => true]);
        }

        public function deleteItem($itemId)
        {            
            $item = Post::find($itemId);
            $item->delete();    
            return response()->json(['success' => true]);
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


}
