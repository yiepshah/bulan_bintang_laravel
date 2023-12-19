<!DOCTYPE html>
<html lang="en">
<head>

    <title>Document</title>

    <style>
 

        .w3-sidebar a {
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            padding: 30px;
            text-align: center;
        }

        .w3-sidebar:hover {
            width: 200px;
        }

        .w3-sidebar {
            height: 100%;
            width: 90px;
            background-color: #111;
            position: fixed;
            overflow-x: hidden;
             transition: width 0.3s;
            z-index: 1;
        }

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
        <a href="{{ url('adminpage') }}" class="w3-bar-item w3-button" title="Home"><i class="fa fa-home"></i></a>
        
        <a href="{{ url('collection') }}" class="w3-bar-item w3-button" title="Store"><i class="fas fa-store"></i></a>
       
        @auth
            <a class="nav-link" title="Add Item" href="{{ url('add_item') }}"><i class="fas fa-plus"></i></a>
            <a class="nav-link" title="Log out" href="{{ url('logout') }}"><i class="fas fa-sign-out-alt"></i></a>
        @endauth
    </div>
</body>
</html>
