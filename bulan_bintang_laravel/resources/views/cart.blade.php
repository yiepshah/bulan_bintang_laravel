<!-- resources/views/cart.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file set up -->

@section('content')

    <div class="content">
        <div class="cart-container">

            @if (session('cart') && count(session('cart')) > 0)
                @foreach (array_reverse(session('cart')) as $index => $item)
                    <div class="cart-item">
                        <img src="{{ asset('images/' . $item['image_path']) }}" alt="Product Image">
                        <div class="cart-item-details">
                            <p>{{ $item['item_name'] }}</p>
                            <p>RM {{ $item['price'] }}</p>
                            <div class="quantity-tools">
                                <label for="quantity{{ $index }}">Quantity</label>
                                <button onclick="decrementQuantity('quantity{{ $index }}')">-</button>
                                <input type="number" id="quantity{{ $index }}" name="quantity{{ $index }}" value="{{ $item['quantity'] }}" min="1" oninput="updateCartItemQuantity({{ $index }})">
                                <button onclick="incrementQuantity('quantity{{ $index }}')">+</button>
                                <span id="quantityDisplay{{ $index }}"> X {{ $item['quantity'] }}</span>
                            </div>
                            <p id="cartSize"> Size: {{ implode(', ', $item['size']) }}</p>
                            <p id="cartDate">Date Added: {{ $item['date_added'] ?? 'N/A' }}</p>
                            <form method="post" action="{{ route('cart.remove', $item['item_id']) }}">
                                @csrf
                                <button class="btn btn" id="removeCartbtn" type="submit" name="remove{{ $item['item_id'] }}">Remove</button><br><br>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

        <div class="cart-totals">
            <div class="cart-total-item">
                <p>Total: RM {{ number_format(calculateTotalPrice(), 2) }}</p>
            </div>
        </div>

        <div class="cart-buttons">
            <!-- Add update button form or action if needed -->
            <button id="checkout-btn" type="submit" name="proceed_to_checkout" class="btn btn-dark">Checkout <i class="fas fa-check-double"></i></button>
        </div>

    </div>

@endsection