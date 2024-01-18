
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Bulan Bintang</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    .details-container{
        padding: 30px;
        overflow: hidden;

    }

    .image {
        max-width: 100%;
        width: 800px;
        height: auto;     
        margin-left: 0px;
        margin-top: 10px;
        padding: 30px;
    }

    .col-md-11{
        font-family: 'Roboto', sans-serif;    
    }

    .text {
        font-size: 20px;
        color:  #202d45;
    }


    #sizeSelect{
        width: 300px;
        border-radius: 20px 20px;
    }

    .h4{
        color: #202d45;
        font-family: 'Roboto', sans-serif;
        font-weight: bolder;
    }

    #button {
        background-color: #202d45; 
        color: #fff; 
        border: none; 
        border-radius: 20px 20px;
        width: 150px;
        height: 40px;
        transition: transform 0.3s ease-in-out;
        margin-left: 20px;
        margin-top: 9px;
        
        
    }

    #button:hover {
        background-color: #202d45; 
        transform: scale(1.2);
        animation-timing-function: ease-in;
    }

    /* .breadcrumb-item a {
        color:#4C4244 ; 
        text-decoration: none; 
        transition: color 0.3s ease; 
    } */

 

    .clear-link {           
       text-decoration: none; 
        font-family: 'Roboto', sans-serif;
        color: grey;
    }

    .clear-link:hover {
        text-decoration: underline; 
        cursor: pointer; 
    }


    .detailItem{
        font-family: 'Roboto', sans-serif;

    }

    .quantity-input-group {
        display: flex;
        align-items: center;
        max-width: 120px;
        margin-top: 10px;
    }

    #quantity {
        width: 40px;
        text-align: center;
        border: 1px solid #ced4da;
        border-radius: 5px;
        margin: 0 5px;
        padding: 5px;
        font-size: 16px;
    }

    .quantity-btn {
        background-color:  #202d45;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .quantity-btn:hover {
        background-color:  #202d45;
        transform: scale(1.2);
    }

    .footer-container{
       padding: 20px;
       overflow: hidden;
       
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

        #detailPrice{
           
            font-weight: bold;
            color: #228D57;
        }


    
    </style>
</head>
<body>
    @include('header')

    <div class="pageName">
        <h3>DETAILS</h3>
    </div>

    <div class="details-container">
        <div class="row">
            <div class="col-md-6">
                <img class="image" src="{{ asset('storage/images/' . $itemDetails->image_path) }}" alt="{{ $itemDetails->item_name }}">   
            </div>

            
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent pl-0">
                        {{-- <li class="breadcrumb-item"><a href="/">Home</a></li> 

                        <li class="breadcrumb-item"><a href="/collection">Collection</a></li> 

                        <li class="breadcrumb-item active" aria-current="page">{{$itemDetails->item_name}}</li> --}}
                    </ol>
                </nav>

                <div class="detailItem">
                    <h4 class="h4"style="font-family: 'Oswald', sans-serif;">{{ $itemDetails->item_name }}</h4>
                    <hr>
                    <div class="text">

                        <p id="detailPrice" class="detailProduct"> Rm {{ $itemDetails->price }}</p> 
                        <div class="form-group">     

                            <div class="form-size">
                                <label for="size"><strong>Size:</strong></label>
                                <select id="sizeSelect" class="form-control" name="size">
                                    @foreach ($sizeOptions as $size)
                                        <option value="{{ $size }}">{{ $size }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group quantity-input-group">
                                <div class="d-flex">
                                    <button type="button" class="quantity-btn" onclick="decreaseQuantity()">-</button>
                                    <input type="text" id="quantity" name="quantity" value="1" min="1">
                                    <button type="button" class="quantity-btn" onclick="increaseQuantity()">+</button>

                                </div>
                                <div class="form-group">
                                    <button id="button" class="btn btn-dark" type="button">Add to Cart</button>                               
                                </div>
                            </div>
                        </div>  <hr>

                        <p class="detailProduct"> <strong>Product Information:</strong> {{ $itemDetails->product_information }}</p>

                        <p class="detailProduct"> <strong>Material:</strong>  {{ $itemDetails->material }}</p>
        
                        <p class="detailProduct"> <strong>Inside Box:</strong>  {{ $itemDetails->inside_box }}</p>
    
                        <p class="detailProduct"><strong>Stock : </strong>{{ $itemDetails->stock_number }}</p>
    
                    </div>

                    <form class="itemData"  method="post" action="{{ route('cart') }}"  id="addToCartForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="item_id"  value="{{ $itemDetails->item_id }}">
                        <input type="hidden" name="item_name" value="{{ $itemDetails->item_name }}">                      
                        <input type="hidden" name="price" value="{{ $itemDetails->price }}">
                        <input type="hidden" name="quantity" value="{{ $itemDetails->quantity }}">
                        <input type="hidden" name="size" value="{{ $itemDetails->size }}">
                        <input type="hidden" name="image_path" value="{{ $itemDetails->image_path }}">
                        <input type="hidden" name="product_information" value="{{ $itemDetails->product_information }}">
                        <input type="hidden" name="material" value="{{ $itemDetails->material }}">
                        <input type="hidden" name="inside_box" value="{{ $itemDetails->inside_box }}">
                        <input type="hidden" name="stock_number" value="{{ $itemDetails->stock_number }}">
                    </form>

                    {{-- <a href="javascript:void(0);" onclick="clearPage()" class="clear-link">Clear</a>  --}}
                </div><hr>
               
            </div>
        </div>
    </div>

    
 
    <div class="modal fade" id="cartAlertModal" tabindex="-1" aria-labelledby="cartAlertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartAlertModalLabel">Item Added to Cart!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your item has been added to the cart.
                </div>
                <form action="">
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="goToCart()">Go to Cart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer-container">
        @include('footer')
    </div>

    <script>
        function decreaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);

            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
            }
        }

        function increaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);

            quantityInput.value = currentQuantity + 1;
        }
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var sizeSelect = document.getElementById('sizeSelect');
            var quantityInput = document.getElementById('quantity');
            var addButton = document.getElementById('button');
            var addToCartForm = document.getElementById('addToCartForm');
    
            sizeSelect.addEventListener('change', function () {
   
            });
    
            quantityInput.addEventListener('input', function () {
    
            });
    
            addButton.addEventListener('click', function (event) {
                event.preventDefault();
                console.log('Button clicked!');
    

                addToCartForm.elements['size'].value = sizeSelect.value;
                addToCartForm.elements['quantity'].value = quantityInput.value;
    

                addToCartForm.submit();
    
 
                fetchCartCount().then(function (currentCartCount) {

                    var cartIcon = document.getElementById('cartIcon');
                    if (cartIcon) {
                        cartIcon.innerText = currentCartCount;
                    }
    

                    window.location.href = "{{ route('cart') }}";
                });
            });
    
            function fetchCartCount() {


                return new Promise(function (resolve) {

                    setTimeout(function () {

                        resolve(5);
                    }, 1000); 
                });
            }
        });
    </script>

<script>
    function goToCart() {

        window.location.href = "{{ route('cart') }}";
    }
</script>




<script>

function clearPage() {
    
    location.reload();
}

</script>

<script>
    if (typeof jQuery === 'undefined') {
        console.error('jQuery is not loaded');
    } else {
        console.log('jQuery is loaded');
    }
</script>
</body>
</html>

