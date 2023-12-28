<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Edit Item</title>
    <style>
        body {
            background-image: url('https://www.shoutmeloud.com/wp-content/uploads/2015/09/Screenshot-Tools-700px-Wide.gif');
           background-position: center;
        }

        .edit-item-container {
            max-width: 500px;
            margin: auto;
            margin-top: 100px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px 10px;
        }

        .main--title {
            text-align: center;
            color: #000000;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        #editBtn {
            background-color: #000000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 100px;
        }

        #editBtn:hover {
            background-color: #004109;
        }

        #backBtn{
            
            width: 100px;
            height: 40px;
        }
    </style>
</head>
<body>
    @include('header')
    @include('adminsidebar')
    <div class="edit-item-container">
        <h2 class="main--title">Edit Item</h2>
        <form action="{{ url('update-item') }}" method="POST">
            @csrf

            <input type="hidden" name="item_id" value="{{ $items->item_id }}">

            <div class="form-group">
                <label for="item_name">Item Name:</label>
                <input type="text" class="form-control" name="item_name" value="{{ $items->item_name }}" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price" value="{{ $items->price }}" required>
            </div>
            
            <div class="form-group">
                <label for="product_information">Product Information:</label>
                <input type="text" class="form-control" name="product_information" value="{{ $items->product_information }}" required>
            </div>

            <div class="form-group">
                <label for="material">Material:</label>
                <input type="text" class="form-control" name="material" value="{{ $items->material }}" required>
            </div>

            <div class="form-group">
                <label for="inside_box">Inside Box:</label>
                <input type="text" class="form-control" name="inside_box" value="{{ $items->inside_box }}" required>
            </div>       
            <a href="{{ url('adminpage') }}" id="backBtn" class="btn btn-primary">Back</a>
            <button type="submit" id="editBtn" class="btn btn-primary">Update Item</button>
        </form>
    </div>
    @include('footer')
</body>
</html>
