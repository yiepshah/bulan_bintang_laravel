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
        // dd(auth()->user()->role == 'admin');
        if (auth()->user()->role == 'admin') {
    
            $itemPost = $request->validate([
                'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'item_name' => 'required',
                'price' => 'required',
                'product_information' => 'required',
                'material' => 'required',
                'inside_box' => 'required',
                'category' => 'required',
                'subcategory' => 'required',
                'stock_number' => 'required|numeric',
            ]);
    
       
    
            $imagePath = $request->file('image_path')->store('images', 'public');
            $imageName = pathinfo($imagePath, PATHINFO_BASENAME);
    
            $itemPost = array_map(function ($value) {
                return strip_tags($value);
            }, $itemPost);
    
            $itemPost['image_path'] = $imageName;
            $itemPost['user_id'] = Auth::id();
    
            $item = Post::create($itemPost);
    
            $item->stock_number = $request->input('stock_number');
            $item->save();
    
            return redirect()->route('adminpage')->with('success', 'Item added successfully');
        }else {
            return redirect()->route('collection');
        }
    } 

        public function add_Item(){
        
            if (auth()->user()->role == 'admin') {
                return view('add_item');
            } else {
                return redirect()->route('collection')->with('error', 'You do not have permission to access this page.');
            }
        }

    

        public function adminPage()
        {
            
            if (auth()->user()->role == 'admin') {
                $items = Post::all();
                $users = User::all();
                return view('adminpage', ['items' => $items] , ['users'=> $users]);
            } else {
                return redirect()->route('collection');
            }
        }

        public function collection()
        {  
            if (Auth::check() && Auth::user()->role != 'admin') {
                $items = Post::all();
                return view('collection', compact('items'));
            } else {
                return redirect()->route('adminpage');
            }
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
            if (auth()->user()->role == 'admin') {
                $items = Post::where('item_id', '=',$item_id)->first();
                return view('admin_edit' , compact('items'));
            } else {
                return redirect()->route('collection');
            }

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
                'stock_number' =>'required',

            ]);

            $items = $request->item_id;
            $item_name = $request->item_name;
            $price = $request->price;
            $product_information = $request->product_information;
            $material = $request->material;
            $inside_box = $request->inside_box;
            $category = $request->category;
            $subcategory = $request->subcategory;
            $stock_number = $request->stock_number;

            Post:: where ('item_id', '=',$items)->update([
                'item_name'=>$item_name,
                'price'=>$price,
                'product_information'=>$product_information,
                'material'=>$material,
                'inside_box'=>$inside_box,
                'category'=>$category,
                'subcategory'=>$subcategory,
                'stock_number'=>$stock_number,
            ]);
            return redirect('adminpage')->with('success', 'Items Updated Successfully');
        } 

        public function deleteItem($items){
            Post:: where ('item_id', '=',$items)->delete();
            return redirect()->back()->with('success', 'Items Deleted Successfully');
        }
        
        public function showDetails($encodedId) 
        {
            $itemId = decrypt($encodedId); 

             if (auth()->user()->role != 'admin') {

                $itemDetails = Post::select('item_id', 'item_name', 'image_path', 'price', 'product_information', 'material', 'inside_box','category','subcategory','stock_number')
                    ->where('item_id', $itemId)
                    ->first();
            } else {
                return redirect()->route('adminpage');
            }
    
            if ($itemDetails) {
                $sizeOptions = ['S', 'M', 'L', 'XL', 'XXL'];
    
                return view('details', compact('itemDetails','sizeOptions',));
            } else {
                return view('details', ['itemNotFound' => true]);
            }
        }
}
 