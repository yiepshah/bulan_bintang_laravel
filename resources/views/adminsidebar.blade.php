<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<head>

    <title>Document</title>

    <style>
        .w3-sidebar {
            height: 100%;
            width: 200px;
            background-color: #0F0F0F;;
            position: fixed;
            overflow-x: hidden;
            padding-top: 80px;
            transition: width 0.4s;
            z-index: 1;
            
        }

        .w3-sidebar a {
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            padding: 30px;
            text-align: center;
        }

        /* .w3-sidebar:hover {
            width: 200px;
        }

        .w3-sidebar a:hover {
            color: #f1f1f1;
        } */

        /* .w3-sidebar:hover+.main--content {
            margin-left: 200px;
        } */
/* 
        .main--content {
            transition: margin-left 0.4s;
            padding: 20px;
        } */

        @media (max-width: 768px) {
            .w3-sidebar {
                width: 10px;
            }

            .w3-sidebar:hover {
                width: 200px;
            }

            .main--content {
                width: calc(100% - 200px);
                margin-left: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="w3-sidebar">
        {{-- <a href="{{ url('adminpage') }}" class="w3-bar-item w3-button" title="Home"><i class="fa fa-home">
              Home</i></a> --}}
        
       
        <a href="{{ url('add_item') }}" class="w3-bar-item w3-button" title="Add item"><i class="fas fa-plus">
               Add</i></a>

        <a href="{{ url('logout') }}" class="w3-bar-item w3-button" title="Logout"><i class="fas fa-sign-out-alt">
               Logout</i></a>

        
            {{-- <a class="nav-link" title="Add Item" href="{{ url('add_item') }}"><i class="fas fa-plus"></i></a>
            <a class="nav-link" title="Log out" href="{{ url('logout') }}"><i class="fas fa-sign-out-alt"></i></a> --}}
        
    </div>
</body>
</html>
