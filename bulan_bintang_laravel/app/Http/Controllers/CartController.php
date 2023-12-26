<?php

namespace App\Http\Controllers;

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
             //solve the problem because of this 
            'item_name' => 'required|string',
            'image_path' => 'required|string',
            'price' => 'required|numeric',
            'size' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'product_information' => 'required|string',
            'material' => 'required|string',
            'inside_box' => 'required|string',
        ]);
        // dd($request->all());
        $item_id = $request->input('item_id'); // this one too
        $item_name = $request->input('item_name');
        $image_path = $request->input('image_path');
        $price = $request->input('price');
        $size = $request->input('size');
        $quantity = $request->input('quantity');
        $product_information = $request->input('product_information');
        $material = $request->input('material');
        $inside_box = $request->input('inside_box');

       
        $cartItem = [
            'item_id' => $item_id, // this one also
            'item_name' => $item_name,
            'image_path' => $image_path,
            'price' => $price,
            'size' => $size,
            'quantity' => $quantity,
            'product_information' => $product_information,
            'material' => $material,
            'inside_box' => $inside_box,
            'date_added' => now(),
        ];

        $cart = session('cart', []);
        $cart[] = $cartItem;
        session(['cart' => $cart]);

        
        return redirect()->route('cart')->with('success', 'Item added to the cart successfully.');
    
    }

    public function showCart()
    {
        
        $cartItems = session('cart', []);

        return view('cart', ['cartItems' => $cartItems]);
    }

    public function remove($item_id)
    {
        $cart = session('cart', []);
    
        // Find the item in the cart by item_id or any unique identifier
        $index = array_search($item_id, array_column($cart, 'item_id'));
    
        // If the item is found, remove it from the cart
        if ($index !== false) {
            unset($cart[$index]);
            session(['cart' => $cart]);
        }
    
        return redirect()->route('cart')->with('success', 'Item removed from the cart.');
    }
    


    

}

