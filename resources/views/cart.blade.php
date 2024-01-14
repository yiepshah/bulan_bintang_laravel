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

    .payment-info {
        background-color: #202d45;
  padding: 10px;
  border-radius: 6px;
  color: #fff;
  font-weight: bold;
}

.product-details {
  padding: 10px;
}

.p-about {
  font-size: 12px;
}

.table-shadow {
  -webkit-box-shadow: 5px 5px 15px -2px rgba(0,0,0,0.42);
  box-shadow: 5px 5px 15px -2px rgba(0,0,0,0.42);
}

.type {
  font-weight: 400;
  font-size: 10px;
}

label.radio {
  cursor: pointer;
}

label.radio input {
  position: absolute;
  top: 0;
  left: 0;
  visibility: hidden;
  pointer-events: none;
}

label.radio span {
  padding: 1px 12px;
  border: 2px solid #ada9a9;
  display: inline-block;
  color: #241d86;
  border-radius: 3px;
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 300;
}

label.radio input:checked + span {
  border-color: #fff;
  background-color: blue;
  color: #fff;
}

.credit-inputs {
  background: rgb(250, 250, 250);
  border-color: rgb(0, 0, 0);
}

.credit-inputs::placeholder {
  color: #fff;
  font-size: 13px;
}

.credit-card-label {
  font-size: 9px;
  font-weight: 300;
}

.form-control.credit-inputs:focus {
  background: rgb(0, 0, 0);
  border: rgb(0, 0, 0);
}

.line {
  border-bottom: 1px solid rgb(102,102,221);
}

.information span {
  font-size: 12px;
  font-weight: 500;
}

.information {
  margin-bottom: 5px;
}

.items {
  -webkit-box-shadow: 5px 5px 4px -1px rgba(0,0,0,0.25);
  box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.08);
}

.spec {
  font-size: 11px;

}

.cartLogo{
    width: 80px;
}

.pageName {
            background-color: #202d45;
            color: aliceblue;
            text-align: center;
        }

        .pageName h3 {
            margin: 0; /* Remove default margin to center properly */
            padding: 10px; /* Add padding for better appearance */
        }



    </style>
</head>
<body>

@include('header')

<div class="pageName">
    <h3>CART</h3>
</div>

<div class="container">
    <div class="cart-container">
        
        <a href="/collection" class="fas fa-arrow-left" style="color: black;"> Continue Shopping</a>
        @if (session('cart') && count(session('cart')) > 0)
        @php
            $cartItems = session('cart') ? array_reverse(session('cart'), true) : [];
        @endphp
            @foreach ($cartItems as $uniqueItemId => $item)
           
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
            
                        {{-- <div class="cart-info">
                            <div class="cart-label">Stocks:</div>
                            <div class="cart-data">{{ $item['stock_number'] }} in Stocks</div>
                        </div> --}}
            
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
          <p class="mb-0">21.1.2024 - 24.1.2024</p>
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

        <div class="col-md-4">
          
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="mb-0">Summary</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            <p>Product (include tax)</p>
                                <span id="summaryTotalAmount">RM 0.00</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            <p>Tax</p>
                                <span>RM 10.00</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Discount
                            <span> - </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Shipping
                            <span>Free Shipping</span>
                        </li>
                        {{-- <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                            <div>
                                <strong>Total amount</strong>
                                <strong>
                                    <p class="mb-0">(including VAT)</p>
                                </strong>
                            </div>
                            <span id=""><strong>Rm 0.00</strong></span>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card mb-4">
                
                    <div class="payment-info">
                        <div class="d-flex justify-content-between align-items-center"><span>Card details</span><img class="rounded" src="" width="30"></div><span class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio" name="card" value="payment" checked> <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png"/></span> </label>
        
                        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png"/></span> </label>
        
                        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png"/></span> </label>
        
        
                        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png"/></span> </label>
                        <div><label class="credit-card-label">Name on card</label><input type="text" class="form-control credit-inputs" placeholder="Name"></div>
                        <div><label class="credit-card-label">Card number</label><input type="text" class="form-control credit-inputs" placeholder="0000 0000 0000 0000"></div>
                        <div class="row">
                            <div class="col-md-6"><label class="credit-card-label">Date</label><input type="text" class="form-control credit-inputs" placeholder="12/24"></div>
                            <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text" class="form-control credit-inputs" placeholder="342"></div>
                        </div>
                        <hr class="line">
                        <div class="d-flex justify-content-between information">
                            <span>Total Amount</span>
                            <span id="cardTotalAmount">RM 0.00</span>
                        </div>
                        <div class="d-flex justify-content-between information"><span>Shipping</span><span>RM 0.00</span></div>
                        <div id="pendingOrdersBtn" class="d-flex justify-content-between information"></div><button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="button"><span id="allTotalAmount">Rm 0.00</span><span>Checkout<i class="fa fa-long-arrow-right ml-1"></i></span></button></div>
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
                
                // date_added: '2024-01-02 03:15:10',
               
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
    var totalAmount = 0;
    var feePerItem = 10; 
    var cartItems = {!! json_encode(session('cart')) !!};
    

    function updateCardTotalAmount() {
        document.getElementById('cardTotalAmount').innerText = 'RM ' + totalAmount.toFixed(2);
    }


    function updateSummaryTotalAmount() {
        document.getElementById('summaryTotalAmount').innerText = 'RM ' + totalAmount.toFixed(2);
    }

    function updateAllTotalAmount() {
        var checkoutAmountSpan = document.getElementById('checkoutTotalAmount'); 

        document.getElementById('allTotalAmount').innerText = 'RM ' + totalAmount.toFixed(2);


        if (checkoutAmountSpan) {
            checkoutAmountSpan.innerText = 'RM ' + totalAmount.toFixed(2);
        }
    }

    var removeButtons = document.querySelectorAll('.remove-button');
    var confirmRemoveBtn = document.getElementById('confirmRemoveBtn');
    var itemIdToRemove;


    Object.values(cartItems).forEach(function (item) {
        totalAmount += (item.quantity * item.price) + (item.quantity * feePerItem);
    });


    updateCardTotalAmount();
    updateSummaryTotalAmount();
    updateAllTotalAmount(); 

    confirmRemoveBtn.addEventListener('click', function () {
        console.log('Item removed with ID:', itemIdToRemove);

        $.ajax({
            url: '/cart/remove/' + itemIdToRemove,
            type: 'POST',
            data: { _token: '{{ csrf_token() }}' },
            success: function (response) {
                console.log('Success:', response);
                totalAmount -= (cartItems[itemIdToRemove].quantity * cartItems[itemIdToRemove].price) + (cartItems[itemIdToRemove].quantity * feePerItem);

          
                totalAmountIncludingTaxes = response.totalIncludingTaxes;

                updateCardTotalAmount();
                updateSummaryTotalAmount();
                updateAllTotalAmount();
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

    document.getElementById('pendingOrdersBtn').addEventListener('click', function() {
        // Define the URL for the pending orders page
        var pendingOrdersUrl = "{{ url('adminpage') }}"; // Update the URL according to your Laravel routes

        // Navigate to the pending orders page
        window.location.href = pendingOrdersUrl;
    });

</script>



    



    
</body>
</html>

