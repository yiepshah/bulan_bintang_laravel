<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{


    /**
     * Add item to the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $request->validate([          
            'item_id' => 'required|string', // Adjust accordingly
            'item_name' => 'required|string',
            'image_path' => 'required|string',
            'price' => 'required|numeric',
            'size' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'product_information' => 'required|string',
            'material' => 'required|string',
            'inside_box' => 'required|string',
            'stock_number' => 'required|numeric',
        ]);
        
    
        $item_id = $request->input('item_id');
        $item_name = $request->input('item_name');
        $image_path = $request->input('image_path');
        $price = $request->input('price');
        $size = $request->input('size');
        $quantity = $request->input('quantity');
        $product_information = $request->input('product_information');
        $material = $request->input('material');
        $inside_box = $request->input('inside_box');
        $stock_number = $request->input('stock_number');


        $cartItem = [
            'item_id' => $item_id,
            'item_name' => $item_name,
            'image_path' => $image_path,
            'price' => $price,
            'size' => $size,
            'quantity' => $quantity,
            'product_information' => $product_information,
            'material' => $material,
            'inside_box' => $inside_box,
            'stock_number' => $stock_number,
            'date_added' => now()->toDateTimeString(),
        ];

        $user = auth()->user();

        $cartItem['user_id'] = $user->id;
    
        $cart = session('cart', []);

       
        $existingIndex = array_search($item_id, array_column($cart, 'item_id'));
        
        if ($existingIndex !== false) {
            if (isset($cart[$existingIndex]['quantity'])) {
                $cart[$existingIndex]['quantity'] += $quantity;
            } else {
                $cart[$existingIndex]['quantity'] = $quantity;
            }
            $cart[$existingIndex]['date_added'] = now()->toDateTimeString(); // Update date_added
        } else {
            $cart[] = $cartItem; 
        }
        
        session(['cart' => $cart]);
        
        return redirect()->route('cart')->with('success', 'Item added to the cart successfully.');
        
    }


    public function showCart()
    {   if (auth()->user()->role != 'admin') {
        $cartItems = session('cart', []);
        return view('cart', ['cartItems' => $cartItems]);
    }
       else{
        return redirect()->route('adminpage');
       }
    
        
    }

    public function remove($item_id)
    {
        $cart = session('cart', []);
    
        $index = array_search($item_id, array_column($cart, 'item_id'));
    
        if ($index !== false) {
            unset($cart[$index]);
            session(['cart' => array_values($cart)]);
    
            return response()->json(['message' => 'Item removed from the cart successfully.']);
        }
    
        return response()->json(['error' => 'Failed to remove item from the cart.']);
    }


}

