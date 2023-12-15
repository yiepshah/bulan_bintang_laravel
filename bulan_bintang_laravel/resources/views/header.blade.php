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
    </style>
    
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="logo" src="https://th.bing.com/th/id/OIP.IV6E-NjlfboqXML32zgvtAHaFs?w=247&h=190&c=7&r=0&o=5&pid=1.7" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" title="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                {{-- <ul class="navbar-nav">
                    @foreach ($mainCategories as $mainCategory)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{ $mainCategory['category_name'] }}</a>
                            <ul class="dropdown-menu">
                                @foreach ($mainCategory['subcategories'] as $subcategory)
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown" href="{{ url('collection') }}?id={{ $subcategory['category_id'] }}">{{ $subcategory['category_name'] }}</a>
                                        <ul class="dropdown-menu">
                                            @foreach ($subcategory['subcategories'] as $subSubcategory)
                                                <li><a class="dropdown-item" href="{{ url('collection') }}?id={{ $subSubcategory['category_id'] }}">{{ $subSubcategory['category_name'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul> --}}
                        </li>
                    {{-- @endforeach --}}
                </ul>
            </div>
        
        
        <ul class="navbar-nav ml-auto">

            <li class="nav-item" data-toggle="tooltip"   title="Log Out">
                <?php
                if (isset($_SESSION['user_id'])) {
                    
                    echo '<a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>';
                }
                ?>
            </li> 

            <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="admin">
                <?php
                if (isset($_SESSION['user_id']) || (!empty($_SESSION['role']) && $_SESSION['role'] !== 'admin')) {
                    echo '<a class="nav-link" href="adminpage.php"><i class="fas fa-user-tie"></i></a>';
                }
                ?>
            </li>


            <li class="nav-item" data-toggle="tooltip"  data-placement="bottom" title="search">
            <div class="search--box">
                <i id="search-icon" class="fa fa-solid fa-search"></i>
                <input id="search-input" type="text" placeholder="Search" style="display: none;">
            </div>
            </li>


            <li class="nav-item" data-toggle="tooltip"  data-placement="bottom" title="cart">
                <?php
                $cartCount = isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0;
                ?>
                <a href="cart.php" class="nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge badge-pill badge-primary"><?php echo $cartCount; ?></span>
                </a>
            </li>


            <li class="nav-item" data-toggle="tooltip"  data-placement="bottom" title="shop">
                <a class="nav-link" href="collection" id="collection" style="<?php echo isset($_SESSION['user_id']) ? '' : 'display: none;'; ?>">
                <i class="fas fa-store"></i>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" title="login"  >
                <?php
                if (isset($_SESSION['user_id'])) {
                    
                    echo '<a class="nav-link" data-placement="bottom" title="profile" href="profile.php"><i class="fas fa-user"></i></a>';
                } else {
                    
                    echo '<a class="nav-link" data-placement="bottom" title="login" href="login"><i class="fas fa-sign-in-alt"></i></a>';
                }
                ?>
            </li>

        </ul>
                    
    </div>
</nav>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script> <!-- Add your JS file or include it from CDN -->
<script>
    $(document).ready(function () {
        $('.category-link').on('click', function (e) {
            e.preventDefault();
            var categoryId = $(this).data('category-id');
            window.location.href = '{{ url("collection") }}?id=' + categoryId;
        });
    });
</script>
 </body>
</html>    