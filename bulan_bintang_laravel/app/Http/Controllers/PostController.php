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
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'item_name' => 'required',
            'price' => 'required',
            'product_information' => 'required',
            'material' => 'required',
            'inside_box' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category' => 'required',
            'subcategory' => 'required',
        ]);

    
        if (Auth::check()) {
            $imagePath = $request->file('image_path')->store('images', 'public');
            $imageName = pathinfo($imagePath, PATHINFO_BASENAME);
    
            $itemPost = array_map(function ($value) {
                return strip_tags($value);
            }, $itemPost);
    
            $itemPost['image_path'] = $imageName; 
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

        public function filtered_collection($category, $subcategory){
            $category = ucfirst($category);
            $subcategory = str_replace('-', ' ', $subcategory);
            $subcategory = ucfirst($subcategory);
            $items = Post::where('category',$category)
            ->where('subcategory', $subcategory)->get();

            return view('collection', compact('items'));
        }

        public function editItem($item_id){
            $items = Post::where('item_id', '=',$item_id)->first();
            return view('admin_edit' , compact('items'));
        }

        public function updateItem(Request $request){
            // dd($request->all());
                $request->validate([
                'item_id'=>'required',
                'item_name' => 'required',
                'price' => 'required',
                'product_information' => 'required',
                'material' => 'required',
                'inside_box' => 'required',
                'category' => 'required',
                'subcategory' => 'required',

            ]);

            $items = $request->item_id;
            $item_name = $request->item_name;
            $price = $request->price;
            $product_information = $request->product_information;
            $material = $request->material;
            $inside_box = $request->inside_box;
            $category = $request->category;
            $subcategory = $request->subcategory;

            Post:: where ('item_id', '=',$items)->update([
                'item_name'=>$item_name,
                'price'=>$price,
                'product_information'=>$product_information,
                'material'=>$material,
                'inside_box'=>$inside_box,
                'category'=>$category,
                'subcategory'=>$subcategory,
            ]);
            return redirect('adminpage')->with('success', 'Items Updated Successfully');
        } 

        public function deleteItem($items){
            Post:: where ('item_id', '=',$items)->delete();
            return redirect()->back()->with('success', 'Items Deleted Successfully');
        }






        

        public function showDetails($itemId)
        {
            $itemDetails = Post::select('item_id', 'item_name', 'image_path', 'price', 'product_information', 'material', 'inside_box')
                ->where('item_id', $itemId)
                ->first();
             
            if ($itemDetails) {
                $sizeOptions = ['S', 'M', 'L', 'XL', 'XXL'];
        
                $breadcrumb = '<a href="' . route('index') . '">Home</a> / ';
        
                $breadcrumb .= '<span>' . $itemDetails->item_name . '</span>';
        
                return view('details', compact('itemDetails', 'breadcrumb', 'sizeOptions'));
            } else {
                return view('details', ['itemNotFound' => true]);
            }
        }


}
