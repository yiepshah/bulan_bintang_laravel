<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);
        
        body {
            
            background-color: #f8f9fa;
            margin: 10px; 
        }

        .content {
            padding: 20px;           
        }

        .content {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 10px;     
            font-family: "Trirong", serif; 
            margin-top: 10px;
            
        }

        .cart-container{
            width: auto;
        }

        .cart-item {
            flex: 0 0 calc(50% - 50px); 
            border-bottom: 4px solid #ddd;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            gap: 40px;
            
        }

        .cart-item img {
            max-width: 260px; 
            height: 230px;
            border-radius: 8px;
            
        }

        .cart-item-details {
            flex: 1;
            font-size: 17px;
        }

        .quantity-tools {
            display: flex;
            
            
        }

        .quantity-tools label {  
            font-size: 17px;
        }

        .quantity-tools input {
            width: 60px;
            text-align: center;
            font-size: 12px;
            margin-left: 20px;
            
        }

        .quantity-tools button {
            background-color: #202d45;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 12px;
            margin-left: 20px;
        }

        .quantity-tools button:hover {
            background-color: #54E346;
        }

        .cart-totals {
            width: 100%;
            margin-top: 20px;
            border-top: 1px solid #ddd; 
            padding-top: 20px; 
        }

        .cart-total-item {
            display: flex;
            justify-content: space-between;
           
        }

        .cart-total-item p {       
            margin-bottom: 5px;
        }

        .cart-buttons {
            width: 100%;
            
            justify-content: space-between;
            margin-top: 20px;          
        }

        #checkout-btn{
            transition: transform 0.3s ease-in-out;
            background-color: #202d45;
            
        }

        #checkout-btn:hover{
            background-color: #54E346;
            border: none;
            color: black;
            transform: scale(1.2);       
        } 

        #cartDate{
            font-family: poppins , sans-serif;
            font-style: oblique;
            font-size: small;
            margin-top: 20px;
            color: grey;
        }

        /* #cartSize{
            font-family: poppins , sans-serif;
            font-style: oblique;
            font-size: small;
            margin-top: 20px;
            color: grey;
        } */

        #removeCartbtn{
            margin-top: 20px;
            border-radius: 20px 20px;
            transition: transform 0.3s ease-in-out;
            border: none;
            background-color: #202d45;
            color: #ffff;
        }

        #removeCartbtn:hover{
            transform: scale(1.3);
        }

        @media (max-width: 768px) {
       
        .cart-item {
            flex: 0 0 100%; 
        }

        .quantity-tools {
            flex-direction: column; 
            align-items: flex-start; 
        }

        
    }

    </style>
</head>
<body>
@include('header')
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
                                <label for="quantity{{ $index }}">Quantity: {{ $item['quantity'] }}</label>
                            </div>
                            <p id="cartSize"> Size: {{ $item['size'] ?? 'N/A' }}</p>
                            <p id="cartDate">Date Added: {{ $item['date_added'] ?? 'N/A' }}</p>
                            @if (isset($item['item_id']))
                                <form method="post" action="{{ route('cart.remove', $item['item_id']) }}">
                                    @csrf
                                    <button class="btn btn-danger" type="submit" name="remove{{ $item['item_id'] }}">Remove</button>
                                </form>
                             @elseif ($item['date_added'] ?? null !== 'N/A')
                                <button class="btn btn-danger" id="removeCartbtn{{ $index }}" type="button" disabled>Remove</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <p>Your cart is empty.</p>
            @endif
        </div>
        
        <div class="cart-buttons">            
            <button id="checkout-btn" type="submit" name="proceed_to_checkout" class="btn btn-dark">Checkout <i class="fas fa-check-double"></i></button>
        </div>
        
    </div>


@include('footer')  

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var removeButtons = document.querySelectorAll('.btn');
        removeButtons.forEach(function (button) {
            button.addEventListener('click', function () {
              
                button.closest('form').submit();
            });
        });
    });
</script>


</body>
</html>

