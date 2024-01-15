<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Document</title>

    <style>
        body {
            background-color: #EEEEEE;
            /* background-color: #EBE3D5; */
            margin: 0;
        }

        .container {
            background-color: #fdfdfd;
            padding: 20px;
            margin-top: 20px;
            border-radius: 15px;
        }

        .form-container {
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        input[type="file"],
        input[type="text"],
        input[type="number"],
        select {
            padding: 8px;
            margin-bottom: 10px;
        }

        #addbtn {
            color: #fff;
            border: none;
            background-color: #202d45;
            width: 80px;
            padding: 8px;
            transition: transform 0.3s ease-in-out;
            border-radius: 10px;
        }

        #addbtn:hover {
            background-color: #202d45;
            transform: scale(1.1);
        }

        #bblogo {
            text-align: center;
            margin-bottom: 20px;
        }

        #bblogo img {
            border-radius: 5px;
            height: auto;
            max-width: 100%;
        }
    </style>

   
</head>

<body>    
@include('header')
 

    <div class="container mt-4">
        
        <div class="row">
            <div class="col-md-12 text-center">
                <img id="bblogo" src="https://bulanbintanghq.com/wp-content/uploads/2022/01/bulanbintanglogo-1040x800.png"
												style="width: 80px; height: auto; margin-right: 10px;" alt="">
                <h1>Add New Item</h1>
            </div>       
        </div> 

             @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif 
        
        <div class="form-container">
            <div class="form-group">
                <form action="/add_item" method="post" enctype="multipart/form-data" class="justify-content-center">
                        @csrf
                    <div class="form-group">
                    
                        <label for="image_path">Image :</label>
                        <input class="form-control" type="file" name="image_path" id="image_path"  required accept="image/*">
                    </div><br>

                    <div class="form-group">
                        <label for="item_name">Name :</label>
                        <input type="text" class="form-control" name="item_name" id="item_name" required>
                    </div><br>

                    <div class="form-group">
                        <label for="price">Price :</label>
                        <input type="number" class="form-control" name="price" id="price" required>
                    </div><br>

                    <div class="form-group">
                        <label for="product_information">Product Information :</label>
                        <input type="text" class="form-control" name="product_information" id="product_information">
                    </div><br>

                    <div class="form-group">
                        <label for="material">Material :</label>
                        <input type="text" class="form-control" name="material" id="material" required>
                    </div><br>

                    <div class="form-group">
                        <label for="inside_box">Inside Box :</label>
                        <input type="text" class="form-control" name="inside_box" id="inside_box" required>
                    </div><br>

                    <div class="form-group">
                        <label for="category">Category :</label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="Men">Men</option>
                            <option value="Women">Women</option>
                            <option value="Kids">Kids</option>
                            
                        </select>
                    </div><br>

                    <div class="form-group">
                        <label for="subcategory">Subcategory :</label>
                        <select class="form-control" name="subcategory" id="subcategory" required>
                            <option value="Teluk Belanga">Teluk Belanga</option>
                            <option value="Tailored Fit">Tailored Fit</option>
                            <option value="Slim Fit">Slim Fit</option>
                            <option value="Samping">Samping</option>
                            <option value="Kurta">Kurta</option>

                            <option value="Lana">Lana</option>
                            <option value="Adeline">Adeline</option>
                            <option value="Hanna">Hanna</option>
                            <option value="Elyana<">Elyana</option>

                            <option value="Baju Melayu Kids">Baju Melayu Kids</option>
                            <option value="Emelda">Emelda</option>
                            <option value="Sabrina">Sabrina</option>
                            
                        </select>
                    </div><br>
                    
                    <div class="form-group">
                        <label for="stock_number">Stock Number :</label>
                        <input type="number" class="form-control" name="stock_number" id="stock_number" required>
                    </div><br>

                    <div class="form-group">
                        <button id="addbtn" class="btn" name="submit" type="submit">Add</button>
                    </div><br><br>                  
                </form>
                
            </div>
        </div>
    </div><br><br>        


    <div>
        @include('footer_user')
    </div>

    <script>
        function showSuccessAlert(message) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: message,
            });
        }
    
        function showWarningAlert(message) {
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: message,
            });
        }
    </script>
    
    @if(Session::has('success'))
        <script>
            showSuccessAlert("{{ Session::get('success') }}");
        </script>
    @endif
    
    @if(Session::has('warning'))
        <script>
            showWarningAlert("{{ Session::get('warning') }}");
        </script>
    @endif
    
  
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   

</body>
</html>
