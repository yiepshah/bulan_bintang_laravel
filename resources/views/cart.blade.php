<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        


 

        .container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 40px;
         
           
           
            justify-content: space-between;
               
           
                    
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
            gap: 20px;
            color: #202d45;
            
        }

        .cart-item img {
            width: 300px;
            
            border-radius: 8px;
            
        }

        .cart-item-details {
            flex: 1;
            font-size: 17px;
        }


        .cart-totals {
            width: 100%;
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
            text-align: right; /* Align text to the right */
        }

        .cart-totals h4 {
            display: inline-block; /* Keep the h4 element inline for proper alignment */
            margin-right: 20px; /* Adjust margin as needed */
        }

        #totalPriceDisplay {
            display: inline-block; /* Keep the total price inline with h4 element */
            font-size: 18px; /* Adjust font size as needed */
            font-weight: bold;
            color: #202d45;
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
            flex: 0 0 90%; 
        }

        .quantity-tools {
            flex-direction: column; 
            align-items: flex-start; 
        }       
    }

    .cartLogo{
        width: 80px;
    }

    </style>
</head>
<body>
@include('header')
<div class="container">
    <div class="cart-container">
        
        @if (session('cart') && count(session('cart')) > 0)
        @php
            $cartItems = session('cart') ? array_reverse(session('cart'), true) : [];
        @endphp
            @foreach ($cartItems as $uniqueItemId => $item)
                <div class="cart-item">
                    @if (is_array($item) && array_key_exists('image_path', $item))
                        <img src="{{ asset('storage/images/' . $item['image_path']) }}" alt="{{ $item['item_name'] }}">
                        <div class="cart-item-details">
                            <p>{{ $item['item_name'] }}</p>
                            <p id="totalPrice{{ $uniqueItemId }}">RM {{ $item['quantity'] * $item['price'] }}</p>
                            <div class="quantity-tools">
                                <label for="quantity{{ $uniqueItemId }}">Quantity: {{ $item['quantity'] }} </label>
                            </div>
                            <p id="cartSize">Size: {{ $item['size'] ?? 'N/A' }}</p>
                            <p id="cartDate">Date Added: {{ $item['date_added'] ?? 'N/A' }}</p>
                            @if (isset($item['item_id']))
                                <form method="post" action="{{ route('cart.remove', $item['item_id']) }}">
                                    @csrf
                                    <button class="btn btn-danger remove-button" type="button" data-toggle="modal" data-target="#confirmationModal" data-item-id="{{ $item['item_id'] }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            @endif                           
                        </div>
                    @else
                        <p>Invalid item data.</p>
                    @endif
                </div>
            @endforeach
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
    <div class="cart-totals">
        <h4>Total Price:</h4>
        <p id="totalPriceDisplay">RM 0.00</p>
    </div>
</div>


@include('footer')  

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img class="cartLogo" src="https://th.bing.com/th/id/OIP.IV6E-NjlfboqXML32zgvtAHaFs?w=247&h=190&c=7&r=0&o=5&pid=1.7" alt="">
                <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove this item from the cart?</p>
                <div id="itemDetails"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               
                <button type="button" class="btn btn-danger" id="confirmRemoveBtn">Remove</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var removeButtons = document.querySelectorAll('.remove-button');
    var confirmRemoveBtn = document.getElementById('confirmRemoveBtn');
    var itemIdToRemove;

    removeButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            itemIdToRemove = button.getAttribute('data-item-id');

            var itemDetails = {
                
                date_added: '2024-01-02 03:15:10',
               
            };

            var formattedDetails = Object.entries(itemDetails).map(([key, value]) => {
                return `<p>${key}: ${value}</p>`;
            }).join('');

            document.getElementById('itemDetails').innerHTML = formattedDetails;

            $('#confirmationModal').modal('show');
        });
    });

    confirmRemoveBtn.addEventListener('click', function () {
    console.log('Item removed with ID:', itemIdToRemove);

    $.ajax({
        url: '/cart/remove/' + itemIdToRemove,
        type: 'POST',
        data: { _token: '{{ csrf_token() }}' },
        success: function (response) {
            console.log('Success:', response);
            location.reload();
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });

    $('#confirmationModal').modal('hide');
});
});
</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var removeButtons = document.querySelectorAll('.remove-button');
        var confirmRemoveBtn = document.getElementById('confirmRemoveBtn');
        var itemIdToRemove;
    

    
        confirmRemoveBtn.addEventListener('click', function () {
    console.log('Item removed with ID:', itemIdToRemove);

    $.ajax({
        url: '/cart/remove/' + itemIdToRemove,
        type: 'POST',
        data: { _token: '{{ csrf_token() }}' }, // Use Blade directive to get the correct CSRF token
        success: function (response) {
            console.log('Success:', response);
            updateTotalPrice();
            location.reload();
        },
        error: function (error) {
            console.error('Error:', error.responseText);
            // Handle error, show an alert, or log it for further inspection
        }
    });

    $('#confirmationModal').modal('hide');
});
     
        function updateTotalPrice() {
            var total = 0;
            var cartItems = {!! json_encode(session('cart')) !!};
            
            if (cartItems) {
                Object.values(cartItems).forEach(function (item) {
                    total += item.quantity * item.price;
                });
            }
    
            document.getElementById('totalPriceDisplay').innerText = 'RM ' + total.toFixed(2);
        }
    
    
        updateTotalPrice();
    });
    </script>
</body>
</html>

