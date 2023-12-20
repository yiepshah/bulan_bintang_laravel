
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Bulan Bintang</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');


    .small-image {
        max-width: 100%;
        width: 800px;
        height: auto;
        border-radius: 8px;
        
    }

    .col-md-11{
        font-family: 'Roboto', sans-serif;    
    }



    .text {
        font-size: 24px;
        font-family: 'Roboto', sans-serif;
        font-weight: bolder;
    }

    .size-box-container {
        display: flex;
        gap: 10px; 
        border: none;
        
    }

    .size-box {
        display: flex;
        align-items: center;
        padding: 10px;
        width: 40px;
        border: none;
        
    }

    .size-box input {
       
        display: none;
        border: none;
        
        
    }

    .size-box label {     
        border-color: white;
        border: 1px solid; 
        border-radius: 3px;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .size-box label:hover{
        transform: scale(1.4);
    }

    .h4{
        color: #003366;
        font-family: 'Roboto', sans-serif;
        font-weight: bolder;
    }

    #button {
        background-color: #8EBAFF; 
        color: #fff; 
        border: none; 
        border-radius: 20px 20px;
        font-family: 'Roboto', sans-serif;
        height: 40px;
        transition: transform 0.3s ease-in-out;
        margin-left: 10px;
        
    }

    #button:hover {
        background-color: black; 
        transform: scale(1.3);
        animation-timing-function: ease-in;
    }

    .breadcrumb-item a {
        color:#4C4244 ; 
        text-decoration: none; 
        transition: color 0.3s ease; 
    }

 
    .breadcrumb-item a:hover {
        color: #0056b3; 
    }



    .clear-link {
        margin-left: 70px;         
        text-decoration: none; 
        font-family: 'Roboto', sans-serif;
        color: grey;
    }

    .clear-link:hover {
        text-decoration: underline; 
        cursor: pointer; 
    }


    .detailPrice {
        font-family: 'Roboto', sans-serif;
        font-weight: 600;
    }

    .detailItem{
        font-family: 'Roboto', sans-serif;
    }
    
    </style>
</head>
<body>
    @include('header')

    <div class="details-container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/' . $itemDetails->image_path) }}" alt="{{ $itemDetails->item_name }}" class="img-fluid small-image">
            </div>
    
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent pl-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('category') }}">BAJU MELAYU</a></li>

                        <li class="breadcrumb-item active" aria-current="page">BM TAILORED FIT</li>
                    </ol>
                </nav>
    
                <h4 class="h4" style="font-family: 'Oswald', sans-serif;">{{ $itemDetails->item_name }}</h4>
                <hr>
                
                <div class="detailItem">
                    <p class="detailProduct"> <strong>Product Information:</strong> {{ $itemDetails->product_information }}</p>

                    <p class="detailmaterial"> <strong>Material:</strong>  {{ $itemDetails->material }}</p>
    
                    <p class="detailinsidebox"> <strong>Inside Box:</strong>  {{ $itemDetails->inside_box }}</p>
    
                    <p class="detailPrice"><strong>$</strong> {{ $itemDetails->price }}</p>
                </div>

    
                <div class="form-group">
                    <label for="size"><strong>Size:</strong></label>
                    <select id="sizeSelect" class="form-control">
                        @foreach ($sizeOptions as $size)
                            <option value="{{ $size }}">{{ $size }}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
    
                <form method="post" action="{{ route('cart') }}">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $itemDetails->id }}">
                    <input type="hidden" name="item_name" value="{{ $itemDetails->item_name }}">
                    <input type="hidden" name="image_path" value="{{ $itemDetails->image_path }}">
                    <input type="hidden" name="price" value="{{ $itemDetails->price }}">
                    <input type="hidden" name="size" id="selectedSize" value="">
                    <input type="number" id="quantity" name="quantity" value="1" min="1">
                    
                    <button id="button" class="btn btn-dark" type="submit">Add to Cart</button>
                    <a href="javascript:void(0);" onclick="clearPage()" class="clear-link">Clear</a>
                </form>
            </div>
        </div>
    </div>

<script>
    
    document.addEventListener("DOMContentLoaded", function () {
        var sizeCheckboxes = document.querySelectorAll('.size-checkbox');

        sizeCheckboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    
                    this.nextElementSibling.style.backgroundColor = '#007bff';
                    this.nextElementSibling.style.color = '#fff';
                } else {
                    
                    this.nextElementSibling.style.backgroundColor = 'transparent';
                    this.nextElementSibling.style.color = '#007bff';
                }
            });
        });
    });
</script>

<script>
function clearPage() {
    
    location.reload();
}
</script>

<script>
    function addToCartFromSize(productId, productName, productPrice, selectedSize, itemQuantity ) {
        $.ajax({
            type: 'POST',
            url: 'cart.php',
            data: {
                add_to_cart: 1,
                item_id: productId,
                item_name: productName,
                price: productPrice,
                size: [selectedSize],
                Quantitiy:itemQuantity,

                
            },
            success: function (response) {
                console.log(response);
                
            },
            error: function () {
                alert('Error in the AJAX request.');
            }
        });
    }
</script>

<script>
    function addToCart() {
    var selectedSize = document.querySelector('.size-checkbox:checked');

    if (!selectedSize) {
        alert('Please select a size before adding to cart.');
        return;
    }

   
    document.getElementById('addToCartForm').submit();
}
</script>


<script>
    function updateCartItemQuantity(productId, newQuantity) {
        $.ajax({
            type: 'POST',
            url: 'cart.php',
            data: {
                update_quantity: 1,
                item_id: productId,
                quantity: newQuantity
            },
            success: function (response) {
              
                console.log(response);
                updateCartSummary(); 
            },
            error: function () {
                alert('Error in the AJAX request.');
            }
        });
    }

    function incrementQuantity(inputId, productId) {
        var input = document.getElementById(inputId);
        input.value = parseInt(input.value) + 1;
        updateCartItemQuantity(productId, input.value);
    }

    function decrementQuantity(inputId, productId) {
        var input = document.getElementById(inputId);
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            updateCartItemQuantity(productId, input.value);
        }
    }

    
</script>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script><br><br>
@include('footer')

</body>
</html>
