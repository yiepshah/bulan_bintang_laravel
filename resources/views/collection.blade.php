<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Collection</title>



        <style>

@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        #collection {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            color: darkslategray;
            
         
        }

        .items-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 30px;
            
           
            
        }

        .item figure {
            position: relative;
            
        }

        .item {
            width: calc(25% - 50px);
            margin: 10px;
            display: inline-block;
            vertical-align: top;
            /* background-color: #fff; */
            padding: 10px;
            border-radius: 10px;
            transition: box-shadow 0.3s ease;
            
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); */
            
            
            
           
        }

        .item figure img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }

        .item:hover figure::before {
            opacity: 1;
            
        }

        .item figure::before {
            content: 'Click Here';           
            position: absolute;
            /* font-family: 'Roboto', sans-serif; */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 20px;
            font-weight: bold;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.4s ease-in-out;
            
            
          
        }

        .item p {
            margin-top: 5px;
            font-weight: bold;
            font-size: 15px;
            color: #202d45;
            text-decoration: none;
        
        }

        #itemprice {
            font-size: 15px;
            font-weight: bold;
            color: #228D57;

        }

        .add-to-cart a {
            display: block;
            text-decoration: none;
            color: inherit;
        }

        /* .item:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
        } */



        .add-to-cart button {
            background-color: transparent;
            color: black;
            border: none;
            padding: 1px;
            font-family: poppins, sans-serif;
            font-weight: 500;
        }

        .add-to-cart button:hover {
            background-color: transparent;
            color: #0056b3;
        }

        /* Media Queries for Responsive Design */

        @media (max-width: 1200px) {
            .item {
                width: calc(48% - 30px);
            }
        }

        @media (max-width: 768px) {
            .item {
                width: calc(100% - 20px);
            }
        }

        .footer-container{
            padding: 10px;
        }

    
        #cartBtn {
            width: 100%; /* Change width to 100% for better responsiveness */
            max-width: 400px; /* Limit maximum width to 400px */
            background-color: #202d45;
            margin: 0 auto; /* Center the button on smaller screens */
        }  

        #cartIcon {
            background-color: #202d45;
            border: none;
            transition: transform 0.3ms ease;
        }

        #cartIcon:hover {
            transform: scale(1.1); /* Add a subtle scaling effect on hover */
        }

        @media (max-width: 768px) {
            .item {
                width: calc(100% - 20px);
            }

            #cartBtn {
                width: 100%; /* Adjust width for better responsiveness on smaller screens */
                max-width: none; /* Remove the maximum width limit */
            }
        }

        .breadcrumb{
            background-color: #202d45;
        }

        #id,text{
            color: black;
        }

           
           </style>

</head>

<body>
    @include('header')
    <div class="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol id="textLabel" class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li> 

                <li class="breadcrumb-item"><a href="/collection">Collection</a></li>
            </ol>
        </nav>
    </div>




    
    <div class="items-container">
        @php     
            $reversedItems = $items->reverse();     
        @endphp

        @foreach ($reversedItems as $item)
                <div class="item">
                    {{-- <p>Collection</p> --}}
                    {{-- <a href="{{ route('details', ['itemId' => $item->id]) }}">Details</a> --}}

                    <a href="{{ route('details', ['itemId' => $item->item_id]) }}">
                        <figure>
                            <img src="{{ asset('storage/images/' . $item->image_path) }}" alt="{{ $item->item_name }}">
                        </figure>
                        <p>{{ $item->item_name }}</p>
                        <p id="itemprice">RM{{ $item->price }}</p>

                    </a>
                    <div id="cartBtn" class="btn btn-dark" onclick="addToCart({{ $item->item_id }}, '{{ $item->item_name }}', {{ $item->price }})">
                        <button id="cartIcon" class="btn btn-dark">
                            <i id="cartIcon" class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>

            @endforeach

        </div>
        <div class="footer-container">
            @include('footer')
        </div>
       

        

    <script>
        function addToCart(itemId, itemName, price) {
           
            console.log("Adding to cart:", itemId, itemName, price);
        
            window.location.href = '{{ route("cart") }}';
        }
    </script>

    

  
</body>
</html>
