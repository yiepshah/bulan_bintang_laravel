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
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        
        body {           
            background-color: #f8f9fa;
            margin: 10px; 
            font-family: 'Roboto', sans-serif;
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
            gap: 20px;
            
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
<div class="content">
    <div class="cart-container">
        @if (session('cart') && count(session('cart')) > 0)
            {{-- Use a unique key to identify the items, e.g., item_id + size --}}
            @foreach (session('cart') as $uniqueItemId => $item)
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
                                    <button class="btn btn-danger remove-button" type="button" data-toggle="modal" data-target="#confirmationModal" data-item-id="{{ $item['item_id'] }}">Remove</button>
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
                Are you sure you want to remove this item from the cart?
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
                console.log(response);
                location.reload();
            },
            error: function (error) {
                console.error(error);
            }
        });

        $('#confirmationModal').modal('hide');
    });
});

</script>
</body>
</html>

