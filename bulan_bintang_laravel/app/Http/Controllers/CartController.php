<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        
        return view('cart'); 
    }

    /**
     * Add item to the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        // Validate the request data
        $request->validate([
            'item_id' => 'required|numeric',
            'quantity' => 'required|numeric|min:1',
            // Add other validation rules as needed
        ]);

        // Retrieve data from the request
        $item_id = $request->input('item_id');
        $quantity = $request->input('quantity');

        // Your logic to add the item to the cart goes here
        // For example, you might store it in the session or a database table

        // After adding to the cart, you can redirect to the cart page or show a confirmation message
        return redirect()->route('cart')->with('success', 'Item added to the cart successfully.');
    }

}

