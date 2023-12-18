
<head>
    <style>
        body {
            justify-content: center;
            height: 100%;
            background-image: url('https://i.pinimg.com/564x/6e/94/f4/6e94f414f98de6b1323056902ff91ffb.jpg');              
            background-size:auto                    
        }

        .container {
            border: 2px solid rgba(255, 255, 255, 2);
            box-shadow: 0 0 20px rgba(0, 0, 0, .2);
            background: transparent;
            color:#ffff;      
            border-radius: 10px 10px;
            border: none;
            margin-top: 30px;
        }



        h1 {
            text-align: center;
            font-size: 29px;
            margin-bottom: 10px;
            margin-top: 10px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        label {
            font-weight: bold;
        }

        input[type="file"],
        input[type="text"],
        input[type="number"] {
            border: none;
            padding: 10px;
            border-radius: 10px;
            width: 100%;
            margin-bottom: 15px;
        }

        #addbtn {
            color: #ffff;
            border: none;     
            background-color: #363062;     
            width: 100px;    
            transition: transform 0.3s ease-in-out; 
            border-radius: 20px 20px;            
        }

        #addbtn:hover {
            background-color: black;
            transform: scale(1.2);           
        }

        #bblogo {
            border-radius: 5px 5px;
            display: flex;
            justify-content: center ;
            align-items: center ;
            margin-right: 10px;
        }

    </style>


</head>

<body>    
    
@include('adminsidebar')
@include('header')

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Add New Item</h1>
                <form action="{{ route('addPost') }}" method="post" enctype="multipart/form-data" class="justify-content-center">
                    @csrf
                <img id="bblogo" src="https://bulanbintanghq.com/wp-content/uploads/2022/01/bulanbintanglogo-1040x800.png"
												style="width: 80px; height: auto; margin-right: 10px;" alt="">
                    <div class="form-group">
                        <label for="image_path">Image:</label>
                        <input class="form-control" type="file" name="image_path" id="image_path"  required accept="image/*">
                    </div><br>

                    <div class="form-group">
                        <label for="item_name">Name:</label>
                        <input type="text" class="form-control" name="item_name" id="item_name" required>
                    </div><br>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" name="price" id="price" required>
                    </div><br>

                    <div class="form-group">
                        <label for="product_information">Product Information:</label>
                        <input type="text" class="form-control" name="product_information" id="product_information">
                    </div><br>

                    <div class="form-group">
                        <label for="material">Material:</label>
                        <input type="text" class="form-control" name="material" id="material" required>
                    </div><br>

                    <div class="form-group">
                        <label for="inside_box">Inside Box:</label>
                        <input type="text" class="form-control" name="inside_box" id="inside_box" required>
                    </div><br>

                    <div class="form-group">
                        <button id="addbtn" class="btn" name="submit" type="submit">Add</button>
                    </div><br><br>                  
                </form>
            </div>
        </div>
    </div>
    @include('footer')
    
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
</body>
</html>
