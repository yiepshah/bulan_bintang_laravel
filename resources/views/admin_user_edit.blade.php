<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Edit Item</title>
    <style>
        body {
            background-color: #EEEEEE;
           
        }

        .edit-user-container {
            max-width: 400px;
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

        #editUserBtn {
            background-color:#202d45;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            height: 40px;
            cursor: pointer;
            margin-left: 100px; 
        }

        #editUserBtn:hover {
            background-color: #004109;
        }

        #backBtn {
            width: 100px;
            height: 40px;
            background-color: #202d45;
            border: none;
        }

        .footer-container{
            padding: 30px;
        }
    </style>
</head>
<body>
    @include('header')

    <div class="edit-user-container">
        <h2 class="main--title">Edit User</h2>
        <form action="{{ url('update-user') }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $users->id }}">

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $users->name }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value="{{ $users->email }}" required>
            </div>
            
            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" class="form-control" name="role" value="{{ $users->role }}" required>
            </div>

            <div class="form-group">               
                <a href="{{ url('adminpage') }}" id="backBtn" class="btn btn-primary">Back</a>
                <button type="submit" id="editUserBtn" class="btn btn-primary">Update User</button>
            </div>
        </form>
      
    </div><br><br>
@include('footer_user')
</body>


</html>
