<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

 


    <title>Admin Dashboard</title>
 
    <style>
        body{
            background-color: #f7f7f7;
            /* background-color: #EBE3D5; */
        }

        .container-fluid{
            padding: 30px;
        }

        .header--wrapper {
            
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;        
            border-radius: 10px;
            padding: 10px 2rem;
            margin-bottom: 1rem;
     
        }

        .header--title {
            color: #fff;
        }

        .user--info {
            display: flex;
            align-items: center;
            gap: 1;
        }

        .search--box {
            background: #dee2e6;
            border-radius: 15px;
            color: #495057;
            display: flex;
            align-items: center;
            
            padding: 4px 12px;
        }

        .search--box input {
            background: transparent;
            padding: 10px;
            border: none;
        }

        .search--box i {
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.5s ease-out;
        }

        .search--box i:hover {
            transform: scale(1.2);
        }

        .card-container {
    
            margin-top: 1rem;
            padding: 1rem;
            border-radius: 10px;
            color: #202d45;          
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .main--title {
            color: #343a40;
            padding-bottom: 10px;
        }

        .card--wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .data--card {
            flex: 2;
            border-radius: 10px;
            padding: 1.2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           
        }

        .data--card:hover {
       
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .card--header {           
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .amount {
            display: flex;
            flex-direction: column;
        }

        .title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .amount-value {
            font-size: 1.5rem;
            margin-top: 0.5rem;
        }

        .icon {
            font-size: 3rem;
        }

        .card-detail {
            font-size: 0.8rem;
        }


        .icon {
            font-size: 3rem;
        }

        .stock-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            overflow: hidden;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            border-radius: 5px 5px;
        }

        .stock-table th,
        .stock-table td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
            background-color: #202d45;
            color: #fff;
        }

        .stock-table th {
            position: sticky;
            top: 0;
            z-index: 2;
            background-color: #202d45;
        }

        .stock-table td {
            background-color: #fff;
            color: #343a40;
            transition: background-color 0.3s ease-in-out;
        }

        .stock-table tbody tr:hover td {
            background-color: #f2f2f2;
        }

        .stock-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            overflow: hidden;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            border-radius: 5px 5px;
        }

        .user-table th
         {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
            color: #ffff;
            
                      
        }

        .user-table tbody tr:hover td {
            background-color: #cecece;
       
            
        }

           
    .fade-in {
        animation: fadeIn ease-in 0.5s;
    }

    .fade-out {
        animation: fadeOut ease-out 0.5s;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }

        #deleteBtn{
            background: linear-gradient(to right, #e74c3c, #e66767);
            border: none;
        }


        #userSearchInput,
        #itemSearchInput {
            width: 350px; 
            height: 50px;
            padding: 8px; 
            margin-right: 10px; 
            background-color: #eeeeee;
            border-radius: 10px;
        }

        .search--box {
            display: flex;
            align-items: center;
            justify-content: flex-end;             
            background-color: #fff;
        }



        .thead-dark{
            background-color: #0F0F0F;;
        }

        #userBtninfo{
            background-color: #0F0F0F;;
            border: none;
        }

        .user-table td:last-child {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
        }

        #userEdit, #deleteBtn {
            display: inline-block;
            width: auto;
            margin: 0;
        }

        #userEdit {
            background-color: #0F0F0F;;
            color: #fff;
            border: none;
        }

        #myItemtable td:last-child {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
}


.delete-btn {
    color: rgb(189, 0, 0);
    margin-left: 20px;
    font-size: 20px;
}

#itemEdit {
    background-color: #0F0F0F;;
    width: 200px;
    border: none;
    
}


#detailBtn{
    color: #0F0F0F;;
    font-size: 20px;

    
}


.new-header{
    background-color: #000000;
    width: 100%;
    height: 79px;
    color: #fff;
    padding-left: 200px;
}

#deleteItembtn{
    color: rgb(189, 0, 0);
    margin-left: 20px;
    font-size: 20px;
}

.footer-container{
    margin: 0px;
}


    .burger-btn {
        position: fixed;
        top: 20px;
        left: 20px;
        font-size: 30px;
        color: #fff;
        cursor: pointer;
        z-index: 2;
    }

    .w3-sidebar {
        height: 100%;
        width: 0;
        background-color: #000000;
        position: fixed;
        overflow-x: hidden;
        padding-top: 80px;
        transition: 0.5s;
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

    .w3-sidebar a:hover {
        background-color: #111;
        color: #f1f1f1;
    }

    .w3-sidebar .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        color: #fff;
        cursor: pointer;
    }


    .modern-profile-form {
    max-width: 400px;
    margin: 0 auto;
}

.modern-profile-form .form-group {
    margin-bottom: 20px;
}

.modern-profile-form label {
    font-size: 16px;
    color: #0F0F0F;;
}

.modern-profile-form input,
.modern-profile-form select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-top: 5px;
    box-sizing: border-box;
}

.modern-profile-form button {
    background-color: #0F0F0F;;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.modern-profile-form button:hover {
    background-color: #1a2233;
}


.admin-data-card {
    color: #fff;
    padding: 30px;
    height: 300px;
    
}

@media only screen and (max-width: 768px) {
    .card-container {
        flex-direction: column;
    }

    .admin-data-card,
    {
        width: 100%;
        margin-right: 0;
    }

}
.admin-data-card {
    background-color: #0F0F0F;
    color: #fff; 
    
}

#adminporfilebtn{
    background-color: #000000;
    border: none;
}



.iconAllert {
    flex-shrink: 0; 
    margin-top: 20px;
}

.profile-info {
    flex-grow: 1;
}

.data--card, icon-letter{
    background-color: #ffffff;
    color: #0F0F0F;
}

.admin-container{
    color: #ffffff;

}

.profile-image {
    border: #000000; 
    
}.modal-title{
    color: #000;
}

.image-container {
    width: 240px; 
    height: 240px;
    overflow: hidden;
    border-radius: 50%; 
    background-color: #000; 
    display: flex;
    justify-content: center;
    align-items: center;
}

#profileImg {
    width: 100%;
    height: auto;
}

.footer-container{
   
    color: #000000;
    
}
</style>

</head>
<body>
    @auth
        @if(auth()->user()->role === 'admin')
        <div class="w3-sidebar">
            
            {{-- <a href="{{ url('collection') }}" class="w3-bar-item w3-button" title="Store"><i class="fas fa-store">
                  Shop</i></a>
            --}}
            <a href="{{ url('add_item') }}" class="w3-bar-item w3-button" title="Add item"><i class="fas fa-plus">
                   Add</i></a>
    
            <a href="{{ url('logout') }}" class="w3-bar-item w3-button" title="Logout"><i class="fas fa-sign-out-alt">
                   Logout</i></a>
        
        </div>
        @endif
    @endauth 

@include('adminHeader')
  

<div class="container">
    <div class="card-container">    
        <div class="card--header admin-data-card">
            <div class="admin-container">
                <h2 style="color: #ffff;" class="main--title">Admin Profile Data</h2><hr>
            <div class="profile-image">
                <div class="image-container">
                    <img id="profileImg" src="{{ asset('storage/images/' . auth()->user()->image_path) }}" alt="Profile Image" class="rounded-circle" style="width: 240px; height:240px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editAdminProfileModal" tabindex="-1" role="dialog" aria-labelledby="editAdminProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="editAdminProfileModalLabel">Edit Admin Profile</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <form method="post" action="{{ route('update-adminprofile') }}" class="modern-profile-form" enctype="multipart/form-data">
                        @csrf
                        
                        <div id="formAdmin" class="form-group">
                            <label for="image_path">Change Profile Image:</label>
                            <input type="file" name="image_path" class="form-control" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Enter new password" class="form-control">
                        </div>

                        {{-- <div class="form-group">
                            <label for="role">Role:</label>
                            <select name="role" class="form-control">
                                <option value="admin" {{ auth()->user()->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ auth()->user()->role === 'user' ? 'selected' : '' }}>User</option>
                            </select>
                        </div> --}}

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br><br>


    <div class="card-container-fluid">
        <div id="iconAllert" class="card--wrapper iconAllert">
            <div class="data--card icon-letter">
                <div class="card--header">
            <div class="form-group">
                <label for="name">Name:</label><h5>{{ auth()->user()->name }}</h5>
            </div>
            <div class="form-group">
                <label for="email">Email:</label><h5>{{ auth()->user()->email }}</h5>
                
            </div>
            <button id="adminporfilebtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editAdminProfileModal">Edit Profile</button>
            </div>
           
        </div>
    </div><br><hr><br>
    



    <div class="card-container">
        <h2 class="main--title">Today's data</h2>
        <div class="card--wrapper">
            <div class="data--card sales">
                <div class="card--header">
                    <div class="amount">
                        <span class="title">Sales</span><span class="amount-value">$40 000.00</span>
                    </div> <i class="fas-dollar-sign icon"></i>
                    <span class="card-detail">Last 24 hours</span>
                </div>
            </div>
            <div class="data--card online-payment">
                <div class="card--header">
                    <div class="amount">
                        <span class="title">Online Payment</span><span class="amount-value">$2900.00</span>
                    </div> <i class="fas-dollar-sign icon"></i>
                    <span class="card-detail">Last 24 hours</span>
                </div>
            </div>
            <div class="data--card expenses">
                <div class="card--header">
                    <div class="amount">
                        <span class="title">Expenses</span><span class="amount-value">$5000.00</span>
                    </div> <i class="fas-dollar-sign icon"></i>
                    <span class="card-detail">Last 24 hours</span>
                </div>
            </div>
            <div class="data--card new-customers">
                <div class="card--header">
                    <div class="amount">
                        <span class="title">New Customers</span><span class="amount-value">90</span>
                    </div> <i class="fas-dollar-sign icon"></i>
                    <span class="card-detail">Last 24 hours</span>
                </div>
            </div>
        </div>
    </div> <hr> <br>

        
   
    <div class="card-container">
        <div class="user-table">
            <h2 class="main--title">
                <i class="fas fa-users"></i>
                User Information</h2>        
            <div class="table-responsive">
                <table id="myUsertable" class="display">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>                       
                    
                    <tbody id="myUsertable">
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>                                                                       
                            <td>
                                <a id="userEdit" href="{{url('edit-user/'.$user->id)}}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> 
                                </a>
                                <a href="#" onclick="confirmUserDeletion('{{ $user->id }}')">
                                    <i class="fas fa-trash-alt delete-btn"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                            <tr><td colspan='6'>No user found</td></tr>
                        @endforelse                        
                    </tbody>
                    </table>
            </div>
        </div>
    </div> <hr> <br>         

        
            
    <br><br>
    <div class="card-container">
        <div class="user-table">
            <h2 class="main--title">
                <i class="fas fa-box"></i>
                Stock Information</h2>
            <div class="table-responsive">
                <table id="myItemtable" class="display">
                    <thead class="thead-dark">
                        <tr>
                            <th>Item Id</th>
                            <th>Image</th>
                            <th>Item Name</th>
                           
                            {{-- <th>Price</th> --}}
                            {{-- <th>Product Info</th> --}}
                            {{-- <th>Material</th> --}}
                            {{-- <th>Inside Box</th> --}}
                            {{-- <th>Category</th> --}}
                            <th>Subcategory</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myItemtable">
                        @php
                        
                            $reversedItems = $items->reverse();
                        @endphp
        
                        @forelse ($reversedItems as $item)
                            <tr>
                                
                                <td>{{ $item->item_id }}</td>
                                <td>
                                    <img src="{{ asset('storage/images/' . $item->image_path) }}" alt="{{ $item->item_name }}" style="max-width: 50px; max-height: 50px;">
                                </td>
                                <td>{{ $item->item_name }}</td>
                                {{-- <td>{{ $item->price }}</td> --}}
                                {{-- <td>{{ $item->product_information }}</td> --}}
                                {{-- <td>{{ $item->material }}</td> --}}
                                {{-- <td>{{ $item->inside_box }}</td> --}}
                                {{-- <td>{{ $item->category}}</td> --}}
                                <td>{{ $item->subcategory}}</td>
                                <td>{{ $item->stock_number}}</td>
                                <td>

                                   
                                    <a href="#" data-toggle="modal" data-target="#itemDetailsModal" onclick="loadItemDetails('{{ $item->item_id }}','{{ $item->image_path }}', '{{ $item->item_name }}', '{{ $item->price }}', '{{ $item->product_information }}', '{{ $item->material }}', '{{ $item->inside_box }}', '{{ $item->category }}', '{{ $item->subcategory }}', '{{ $item->stock_number }}')">
                                        <i id="detailBtn" class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                        
                                        <a href="#" onclick="confirmItemDeletion('{{ $item->item_id }}')">
                                            <i class="fas fa-trash-alt delete-btn"></i>
                                        </a>
                                   
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan='6'>No items found</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div><br>

        </div> 


        <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteUserModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this user?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="{{ url('delete-user/'.$user->id) }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        


        <div class="modal fade" id="itemDetailsModal" tabindex="-1" role="dialog" aria-labelledby="itemDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="itemDetailsModalLabel">Item Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="detailImg" src="{{ asset('storage/images/' . $item->image_path) }}" alt="{{ $item->item_name }}" id="itemDetailsImage" alt="Item Image" style="max-width: 100%; height: auto;">
                            </div><br><br>
                            <div style="color: #000000;" class="col-md-5"><br><br>
                                <a id="itemEdit" href="#" class="btn btn-primary">
                                    <i class="far fa-edit"> Edit</i>
                                </a><br><br>
                                <p><strong>Item Name:</strong><span id="item_name"></span></p><hr>
                                <p><strong>Price:</strong> Rm <span id="price"></span></p><hr>
                                <p><strong>Product Information:</strong> <span id="product_information"></span></p><hr>
                                <p><strong>Inside Box:</strong> <span id="inside_box"></span></p><hr>
                                <p><strong>Material:</strong> <span id="material"></span></p><hr>
                                <p><strong>Category:</strong> <span id="category"></span></p><hr>
                                <p><strong>Subcategory:</strong> <span id="subcategory"></span></p><hr>
                                <p><strong>Stock Number:</strong> <span id="stock_number"></span></p><hr>
                              
                            </div>
                           
                        </div>   <br><br>
                        <div class="footer-container">
                            @include('footer_user')
                        </div>
                       
                    </div><br>

                      
                    </div>

                    <div class="modal fade" id="deleteItemModal{{ $item->item_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteItemModalLabel">Confirm Item Deletion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this item?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <a href="{{url('delete-item/'.$item->item_id)}}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer-container">
        @include('footer_user')
    </div>
</div>
</div>




<script>
function getItemDetailsById(itemId) {
    return $.ajax({
        url: '/correct/endpoint/' + itemId, 
        method: 'GET',
        dataType: 'json',
    });
}

function loadItemDetails(id, image_path,item_name,price,product_information,material,inside_box,category,subcategory,stock_number) {
    console.log(id,image_path,item_name,price,product_information,material,inside_box,category,subcategory,stock_number)
    $('#itemDetailsImage').attr('src', "{{ asset('storage/images/') }}" + '/' + image_path);
    $('#item_name').text(item_name)
    $('#price').text(price)
    $('#product_information').text(product_information)
    $('#material').text(material)
    $('#inside_box').text(inside_box)
    $('#category').text(category)
    $('#subcategory').text(subcategory)
    $('#stock_number').text(stock_number)
    let url = "{{ url('edit-item/' . 123) }}".replace('123', id)
    $('#itemEdit').attr('href', url)
    
    
}
</script>


    <script>
        function toggleSidebar() {
            var sidebar = document.querySelector('.w3-sidebar');
            sidebar.style.width = sidebar.style.width === '200px' ? '0' : '200px';
        }
    </script>

        <script>
    
            function showSuccessAlert(message) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: message,
                });
            }
    
        
            function showErrorAlert(message) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
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
                showErrorAlert("{{ Session::get('warning') }}");
            </script>
            @endif


            <script>
                function confirmUserDeletion(id) {
                    Swal.fire({
                    title: 'Confirm Deletion',
                    text: 'Are you sure you want to delete this user?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                    
                        window.location.href = "{{ url('delete-user') }}/" + id;
                    }
                });
                }
            </script>


    <script>
        function confirmItemDeletion(itemId) {
            Swal.fire({
                title: 'Confirm Deletion',
                text: 'Are you sure you want to delete this item?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                
                    window.location.href = "{{ url('delete-item') }}/" + itemId;
                }
            });
        }
    </script>
                

<script>
    $(document).ready(function () {
        $('#myUsertable').DataTable();
        $('#myItemtable').DataTable();
    });
</script>
 </body>
</html>