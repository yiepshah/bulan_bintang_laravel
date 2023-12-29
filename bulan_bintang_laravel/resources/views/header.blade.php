{{-- <!DOCTYPE html>
<html lang="en">
<head> --}}

    <style>
          
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 10px;
        }

        .logo {
            height: 62px;
        }

        .navbar .navbar-nav .nav-item a {
            color: #000033;
            font-weight: 500;
            margin: 10px;
            text-decoration: none;
        }

        .navbar .navbar-nav .nav-item a:hover {
            color: #000033;
        }

        .navbar .navbar-nav .nav-item i {
            margin-right: 10px;
            transition: transform 0.2s ease-in-out;
        }

        .navbar .navbar-nav .nav-item i:hover{
            transform: scale(1.4);
        }

        #loginbutton {
            margin-right: 40px;
            background-color: #033366;
        }

        #logoutbtn {
            margin-right: 10px;
        }

        @media (max-width: 991px) {
            .navbar .navbar-nav {
                flex-direction: row;
            }

            .navbar .navbar-nav .nav-item {
                margin-right: 10px;
            }

            .navbar .navbar-nav .nav-item:last-child {
                margin-right: 0;
            }

            .navbar .navbar-nav .nav-item i {
                margin-right: 5px;
            }
        }

        .search--box{
            margin-top: 18px;
        }

        #carticon{
            padding-top: 22px;

        }

    </style>
    
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="logo" src="https://th.bing.com/th/id/OIP.IV6E-NjlfboqXML32zgvtAHaFs?w=247&h=190&c=7&r=0&o=5&pid=1.7" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" title="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    
                        <li class="nav-item">
                            <a class="nav-link" href=>
                                Men
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=>
                                Women
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=>
                                Kids
                            </a>
                        </li>
                
                </ul>
            </div>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item" data-toggle="tooltip" title="Log Out">
                @auth
                    <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i></a>
                @endauth
            </li>

                @auth
                    @if (auth()->user()->role === 'admin')
                    <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="admin">
                        <a class="nav-link" href="{{ route('adminpage') }}"><i class="fas fa-user-tie"></i></a>
                    </li>
                    @endif
                @endauth

            <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="search">
                @auth  
                    <div class="search--box">
                        <i id="search-icon" class="fas fa-search"></i>
                        <input id="search-input" type="text" placeholder="Search" style="display: none;">
                    </div>
                @endauth
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="collection">
                @auth
                    <a class="nav-link" href="{{ route('collection') }}" id="collection">
                        <i class="fas fa-store"></i>
                    </a>
                @endauth
            </li>

            <li  class="nav-item" data-toggle="tooltip" data-placement="bottom" title="cart">
                @auth
                    @php
                        $cartCount = session('cart') ? count(session('cart')) : 0;
                    @endphp
                    <a id="CartIcon" href="{{ route('cart') }}">
                        <i id="carticon" class="fas fa-shopping-cart"></i>
                        <span class="badge badge-pill badge-primary">{{ $cartCount }}</span>
                    </a>
                @endauth
            </li>

            <li class="nav-item" data-toggle="tooltip" title="login">
                @auth
                <a class="nav-link" data-placement="bottom" title="profile" href="{{ route('profile') }}"><i class="fas fa-user"></i></a>

                @else
                    <a class="nav-link" data-placement="bottom" title="login" href="{{ route('login') }}">Login <i class="fas fa-sign-in-alt"></i></a>
                @endauth
            </li>
        </ul>
    </div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>
</html>
