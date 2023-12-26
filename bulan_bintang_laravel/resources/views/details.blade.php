
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        font-size: 20px;
    }


    #sizeSelect{
        width: 300px;
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
        margin-left: 20px;
        
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

    /* .detailProduct {
        font-style: oblique;
    } */

    .detailItem{
        font-family: 'Roboto', sans-serif;
        margin-right: 10px;
        margin-left: 10px;
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

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
            
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent pl-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>

                        {{-- <li class="breadcrumb-item"><a href="{{ route('category') }}">BAJU MELAYU</a></li> --}}

                        <li class="breadcrumb-item active" aria-current="page">BM TAILORED FIT</li>
                    </ol>
                </nav>
    

                
                <div class="detailItem">
                    <h4 class="h4" style="font-family: 'Oswald', sans-serif;">{{ $itemDetails->item_name }}</h4>
                    <hr>
                    <div class="text">
                        <p class="detailProduct"> <strong>Product Information:</strong> {{ $itemDetails->product_information }}</p>

                        <p class="detailProduct"> <strong>Material:</strong>  {{ $itemDetails->material }}</p>
        
                        <p class="detailProduct"> <strong>Inside Box:</strong>  {{ $itemDetails->inside_box }}</p>
        
                        <p class="detailProduct"><strong>Price: $ </strong>{{ $itemDetails->price }}</p>
    
                    </div>

                    {{-- <div class="form-group">
                        <label for="size"><strong>Size:</strong></label>
                        <select id="sizeSelect" class="form-control">
                            @foreach ($sizeOptions as $size)
                                <option value="{{ $size }}">{{ $size }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <form method="post" action="{{ route('cart') }}"  id="addToCartForm" enctype="multipart/form-data">>
                        @csrf
                        <input type="hidden" name="item_id"  value="{{ $itemDetails->item_id }}">
                        <input type="hidden" name="item_name" value="{{ $itemDetails->item_name }}">
                        <input type="hidden" name="image_path" value="{{ $itemDetails->image_path }}">
                        <input type="hidden" name="price" value="{{ $itemDetails->price }}">
                        <input type="hidden" name="product_information" value="{{ $itemDetails->product_information }}">
                        <input type="hidden" name="material" value="{{ $itemDetails->material }}">
                        <input type="hidden" name="inside_box" value="{{ $itemDetails->inside_box }}">
                        <div class="form-group">
                            <label for="size"><strong>Size:</strong></label>
                            <select id="sizeSelect" class="form-control" name="size">
                                @foreach ($sizeOptions as $size)
                                    <option value="{{ $size }}">{{ $size }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="number" id="quantity" name="quantity" value="1" min="1">                    
                        <button id="button" class="btn btn-dark" type="submit">Add to Cart</button>
                    </form>
                    <a href="javascript:void(0);" onclick="clearPage()" class="clear-link">Clear</a> 
                </div>
                <hr>
            </div>
        </div>
    </div>

<script>
    
    document.addEventListener("DOMContentLoaded", function () {
    var sizeSelect = document.getElementById('sizeSelect');
    var quantityInput = document.getElementById('quantity');
    var selectedSizeInput = document.getElementById('selectedSize');

    sizeSelect.addEventListener('change', function () {
        var selectedSize = sizeSelect.value;
        selectedSizeInput.value = selectedSize;
    });

    quantityInput.addEventListener('input', function () {
        var quantity = quantityInput.value;
        if (quantity < 1) {
            quantityInput.value = 1;
        }
    });

    var addButton = document.getElementById('button');
    addButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Add additional validation if needed

        // Now you can submit the form using JavaScript
        var form = document.getElementById('addToCartForm');
        form.submit();
    });
});
</script>

<script>

function clearPage() {
    
    location.reload();
}

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

@include('footer')

</body>
</html>
