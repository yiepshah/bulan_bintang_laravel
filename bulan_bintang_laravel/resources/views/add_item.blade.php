<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
<head>
    <style>
    body {
        background-color: #202d45;
       
        margin: 0; /* Add this to remove default body margin */
    }

    .container {
        background-color: #fdfdfd;
        border-radius: 10px;
        border: none;
        margin-top: 20px;
        padding: 20px;
    }

    h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 10px;
        margin-top: 10px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    input[type="file"],
    input[type="text"],
    input[type="number"] {
        padding: 8px;
        border-radius: 8px;
        width: 100%;
        margin-bottom: 10px;
    }

    #addbtn {
        color: #fff;
        border: none;
        background-color: #202d45;
        width: 80px;
        transition: transform 0.3s ease-in-out;
        border-radius: 15px;
    }

    #addbtn:hover {
        background-color: #202d45;
        transform: scale(1.1);
    }

    #bblogo {
        /* Adjust styles to center the logo */
        text-align: center;
        margin-bottom: 20px; /* Add margin-bottom for spacing */
    }

    #bblogo img {
        border-radius: 5px;
        height: auto;
        max-width: 100%; /* Ensure the logo doesn't exceed its container */
    }
    </style>

   
</head>

<body>    



{{-- @auth
@if (auth()->user()->role === 'admin')
    @include('adminsidebar')
@endif
@endauth   --}}

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img id="bblogo" src="https://bulanbintanghq.com/wp-content/uploads/2022/01/bulanbintanglogo-1040x800.png"
												style="width: 80px; height: auto; margin-right: 10px;" alt="">
                <h1>Add New Item</h1>
            </div>       
        </div> 
        
        <div class="row">
            <div class="col-md-6 offset-md-3">
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
                    <input type="text" class="form-control" name="category" id="category" required>
                </div><br>

                <div class="form-group">
                    <label for="subcategory">Subcategory :</label>
                    <input type="text" class="form-control" name="subcategory" id="subcategory" required>
                </div><br>

                <div class="form-group">
                    <button id="addbtn" class="btn" name="submit" type="submit">Add</button>
                </div><br><br>                  
            </form>
            
        </div>
        
            
        
    </div>

    <script>
        @if(Session::has('success'))
            showSuccessAlert("{{ Session::get('success') }}");
        @endif
    
        function showSuccessAlert(message) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: message,
            });
        }
    </script>
  
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   @include('footer')

</body>
</html>
