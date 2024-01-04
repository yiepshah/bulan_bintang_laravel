
    <title>Bulan Bintang</title>
    <style>
          
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 10px;
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
            margin: 7px;
            transition: transform 0.2s ease-in-out;
        }

        .navbar .navbar-nav .nav-item i:hover{
            transform: scale(1.4);
        }


        .logo {
            height: 62px;
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

        #Ctext{
            font-size: 17px;
        }

        .category{
            margin-bottom: 20px;
        }

    </style>
    
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="logo" src="https://th.bing.com/th/id/OIP.IV6E-NjlfboqXML32zgvtAHaFs?w=247&h=190&c=7&r=0&o=5&pid=1.7" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#collapsibleNavbar" title="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Men
                        </a>
<<<<<<< HEAD
                        @auth    
                        <ul class="dropdown-menu">
                                                   
                            <li><a href="{{ route('filtered_collection', ['category' => 'men', 'subcategory' => 'baju-melayu-teluk-belanga']) }}">Teluk Belanga</a></li>
                            <li><a href="{{ route('filtered_collection', ['category' => 'men', 'subcategory' => 'baju-melayu-tailored-fit']) }}">Tailored Fit</a></li>
                            <li><a href="{{ route('filtered_collection', ['category' => 'men', 'subcategory' => 'baju-melayu-slim-fit']) }}">Slim Fit</a></li>
                            <li><a href="{{ route('filtered_collection', ['category' => 'men', 'subcategory' => 'samping']) }}">Samping</a></li>
                            <li><a href="{{ route('filtered_collection', ['category' => 'men', 'subcategory' => 'kurta']) }}">Kurta</a></li>
                            
                        </ul>
                        @endauth
=======
                        <ul class="dropdown-menu" id="subcategoryDropdown">
                            <li><a href="{{ route('filtered_collection', ['category' => 'men', 'subcategory' => 'baju-melayu-teluk-belanga']) }}">Baju Melayu Teluk Belanga</a></li>     
                        </ul>
>>>>>>> 8c0d920b955eb177133f3b50dff8d6200a0254b6
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Women
                        </a>
<<<<<<< HEAD
                        @auth
                        <ul class="dropdown-menu">
                           
                            <li><a href="{{ route('filtered_collection', ['category' => 'Women', 'subcategory' => 'lana']) }}">Lana</a></li>
                            <li><a href="{{ route('filtered_collection', ['category' => 'Women', 'subcategory' => 'adeline']) }}">Adeline</a></li>
                            <li><a href="{{ route('filtered_collection', ['category' => 'Women', 'subcategory' => 'hana']) }}">Hanna</a></li>
                            <li><a href="{{ route('filtered_collection', ['category' => 'Women', 'subcategory' => ' elyana']) }}">Elyana</a></li>
                           
                         
                        </ul>
                        @endauth
=======
                        <ul class="dropdown-menu" id="subcategoryDropdown">
                            <li><a href="{{ route('filtered_collection', ['category' => 'Women', 'subcategory' => 'Dayang']) }}">Dayang</a></li>     
                        </ul>
>>>>>>> 8c0d920b955eb177133f3b50dff8d6200a0254b6
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Kids
                        </a>
<<<<<<< HEAD
                        @auth
                        <ul class="dropdown-menu">
                            
                            <li><a href="{{ route('filtered_collection', ['category' => 'Kids', 'subcategory' => 'baju-melayu-kids']) }}">Baju Melayu Kids</a></li>
                            <li><a href="{{ route('filtered_collection', ['category' => 'Kids', 'subcategory' => 'emelda']) }}">Emelda</a></li>
                            <li><a href="{{ route('filtered_collection', ['category' => 'Kids', 'subcategory' => 'sabrina']) }}">Sabrina</a></li>
                        </ul>
                            @endauth                        
=======
                        <ul class="dropdown-menu" id="subcategoryDropdown">
                            <li><a href="{{ route('filtered_collection', ['category' => 'Kids', 'subcategory' => 'baju-melayu-kids']) }}">Baju Melayu Kids</a></li>     
                        </ul>
>>>>>>> 8c0d920b955eb177133f3b50dff8d6200a0254b6
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
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.dropdown-item').forEach(link => {
        link.addEventListener('click', async (event) => {
            try {
                event.preventDefault();
                const category = link.getAttribute('data-category');
                const subcategory = link.getAttribute('data-subcategory');

<<<<<<< HEAD
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.dropdown-item').forEach(link => {
            link.addEventListener('click', async (event) => {
                try {
                    event.preventDefault();
                    const category = link.getAttribute('data-category');
                    const subcategory = link.getAttribute('data-subcategory');
                    const response = await axios.get(`/subcategory/${subcategory}`);
                    console.log('Response:', response);
                    document.getElementById('items-container').innerHTML = response.data;
                } catch (error) {
                    console.error('Error fetching items:', error);
                }
            });
        });
    });
</script>   
=======
                const response = await axios.get(`/subcategory/${subcategory}`);

                console.log('Response:', response);

                document.getElementById('items-container').innerHTML = response.data;
            } catch (error) {
                console.error('Error fetching items:', error);
            }
        });
    });
});


</script>

>>>>>>> 8c0d920b955eb177133f3b50dff8d6200a0254b6
</body>
</html>
