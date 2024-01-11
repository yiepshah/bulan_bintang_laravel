<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        
        body{
            background-color: #EEEEEE;
        }

        .cart-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 40px;         
            justify-content: space-between;
            padding: 20px;
                        
        }

        .cart-data {
            flex: 1;
        }


        .cart-container{
            width: auto;
        }

        .cart-label {
            font-weight: bold;
            margin-right: 10px;
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
            width: 150px;
            height:150px;;
            
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

    .footer-container{
        padding: 20px;
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
            <a class="btn btn-dark" href="/collection">Continue Shopping</a>
            <div class="cart-item">
                @if (is_array($item) && array_key_exists('image_path', $item))
                    <img src="{{ asset('storage/images/' . $item['image_path']) }}" alt="{{ $item['item_name'] }}">
                    <div class="cart-item-details">
                        <div class="cart-info">
                            <div class="cart-label">Item Name:</div>
                            <div class="cart-data">{{ $item['item_name'] }}</div>
                        </div>
            
                        <div class="cart-info">
                            <div class="cart-label">Total Price:</div>
                            <div class="cart-data">RM {{ $item['quantity'] * $item['price'] }}</div>
                        </div>
            
                        <div class="cart-info">
                            <div class="cart-label">Quantity:</div>
                            <div class="cart-data">{{ $item['quantity'] }}</div>
                        </div>
            
                        <div class="cart-info">
                            <div class="cart-label">Size:</div>
                            <div class="cart-data">{{ $item['size'] ?? 'N/A' }}</div>
                        </div>
            
                        <div class="cart-info">
                            <div class="cart-label">Stocks:</div>
                            <div class="cart-data">{{ $item['stock_number'] }} in Stocks</div>
                        </div>
            
                        <div  class="cart-info">
                            <div class="cart-label">Date Added:</div>
                            <div class="cart-data">{{ $item['date_added'] ?? 'N/A' }}</div>
                        </div>
            
                        @if (isset($item['item_id']))
                            <form method="post" action="{{ route('cart.remove', $item['item_id']) }}">
                                @csrf
                                <button class="btn btn-danger remove-button" type="button" data-toggle="modal" data-target="#confirmationModal" data-item-id="{{ $item['item_id'] }}">
                                    <i class="fas fa-trash-alt"></i> Remove
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
    </div><br>

    <div class="card mb-4">
        <div class="card-body">
          <p><strong>Expected shipping delivery</strong></p>
          <p class="mb-0">12.10.2020 - 14.10.2020</p>
        </div>
    </div>

    


    <div class="card mb-4 mb-lg-0">
        <div class="card-body">
          <p><strong>We accept</strong></p>
          <img class="me-2" width="45px"
            src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
            alt="Visa" />
          <img class="me-2" width="45px"
            src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
            alt="American Express" />
          <img class="me-2" width="45px"
            src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
            alt="Mastercard" />
          <img class="me-2" width="45px"
            src="https://toppng.com/uploads/preview/paypal-logo-11609371786gw3pnuakfe.png"
            alt="PayPal acceptance mark" />
        </div>
    </div><br><br>

    <div class="row">
        <div class="col-md-8">
           
    
        </div>
        <div class="col-md-4">
          
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="mb-0">Summary</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            Products
                                <span id="totalPriceDisplay">RM 0.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Shipping
                            <span>Free Shipping</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                            <div>
                                <strong>Total amount</strong>
                                <strong>
                                    <p class="mb-0">(including VAT)</p>
                                </strong>
                            </div>
                            <span id="totalPriceDisplay"><strong>Rm 0.00</strong></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</div>



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
</div><br>

<div class="footer-container">
    @include('footer')  
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

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
            data: { _token: '{{ csrf_token() }}' }, 
            success: function (response) {
                console.log('Success:', response);
                updateTotalPrice();
                location.reload();
            },
            error: function (error) {
                console.error('Error:', error.responseText);
                
            }
        });

        $('#confirmationModal').modal('hide');
    });
        

    });
    </script>

    <script>
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
    </script>

    
</body>
</html>

