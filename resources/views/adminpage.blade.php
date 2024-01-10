
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

 


    <title>Admin Dashboard</title>
 
    <style>
        body{
            background-color: #f7f7f7
        }

 

        .container {
    position: relative;
    width: 100%; /* Adjust the width as needed */
    max-width: 1200px; /* Add a max-width to limit the container size */
    padding: 1rem;
    margin: 0 auto;
    padding: 10px;
}


        .header--wrapper img {
            width: 50px;
            height: 50px;
            cursor: pointer;
            border-radius: 50%;
        }

        .header--wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            background-color: #202d45;
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
            /* background: #fff; */
            /* width: calc(100% - 2rem); */
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
            flex: 1;
            border-radius: 10px;
            padding: 1.2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.6s ease-in-out;
        }

        .data--card:hover {
            transform: scale(1.10);
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

        .sales {
            background-color: #202d45;
        }

        .online-payment {
            background-color: #202d45;
        }

        .expenses {
            background-color: #202d45;
        }

        .new-customers {
            background-color: #202d45;
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

        #admin{
            color: #fff;
            margin-right: 20px;
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
            background-color: #202d45;
        }

        #userBtninfo{
            background-color: #202d45;
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
            background-color: #202d45;
            color: #fff;
            border: none;
        }

        #myItemtable td:last-child {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
}


#deleteBtn {
    display: inline-block;
    width: auto;
    margin: 0;
}

#itemEdit {
    color: #202d45;
    
    border: none;
    
}


#detailBtn{
    color: #202d45;
    font-size: 20px;

    
}


.new-header{
    background-color: #202d45;
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
        background-color: #202d45;
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

    .detailImg{
        width: 900px;

    }

    .footer-container{
        padding: 10px;
    }

    #itemEdit{
        background-color: #ffff;
        font-size: 30px;
    }
</style>

</head>
<html>
<body>
  
    @auth
        @if(auth()->user()->role === 'admin')
        <div class="w3-sidebar">
            
            <a href="{{ url('collection') }}" class="w3-bar-item w3-button" title="Store"><i class="fas fa-store">
                  Shop</i></a>
           
            <a href="{{ url('add_item') }}" class="w3-bar-item w3-button" title="Add item"><i class="fas fa-plus">
                   Add</i></a>
    
            <a href="{{ url('logout') }}" class="w3-bar-item w3-button" title="Logout"><i class="fas fa-sign-out-alt">
                   Logout</i></a>
        
        </div>
        @endif
    @endauth 

@include('adminHeader');
    {{-- <div class="container">
        <div class="header--wrapper">            
            <div class="header--title">
                <span>Admin</span>
                <h2>dashboard</h2>
            </div> 
        </div><br><br> --}}

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
    </div> <br><br>  <br>     
            

        <div class="container">
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
                                                    <i class="fas fa-edit"></i> <!-- Edit icon -->
                                                </a>
                                                <a href="{{ url('delete-user/'.$user->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">
                                                    <i class="fas fa-trash-alt"></i> <!-- Delete icon -->
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
  
               
    </div>
        
            
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
                            <th>Item Name</th>
                           
                            {{-- <th>Price</th> --}}
                            {{-- <th>Product Info</th> --}}
                            {{-- <th>Material</th> --}}
                            {{-- <th>Inside Box</th> --}}
                            <th>Category</th>
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
                                <td>{{ $item->item_name }}</td>
                                {{-- <td>{{ $item->price }}</td> --}}
                                {{-- <td>{{ $item->product_information }}</td> --}}
                                {{-- <td>{{ $item->material }}</td> --}}
                                {{-- <td>{{ $item->inside_box }}</td> --}}
                                <td>{{ $item->category}}</td>
                                <td>{{ $item->subcategory}}</td>
                                <td>{{ $item->stock_number}}</td>
                                <td>

                                    <a href="#" data-toggle="modal" data-target="#itemDetailsModal" onclick="loadItemDetails('{{ $item->item_id }}')">
                                        <i id="detailBtn" class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    
                                    <a href="{{url('delete-item/'.$item->item_id)}}"  data-toggle="modal" data-target="#deleteItemModal{{ $item->item_id }}">
                                        <i id="deleteItembtn" class="fas fa-trash-alt"></i>
                                    </a>
                                   
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan='6'>No items found</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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
                            </div>
                            <div class="col-md-5">
                        
                                <p><strong>Item Name:</strong> {{ $item->item_name }}</p>
                                <p><strong>Price:</strong> Rm {{ $item->price }}</p>
                                <p><strong>Product Information:</strong> {{ $item->product_information }}</p>
                                <p><strong>Inside Box:</strong> {{ $item->inside_box }}</p>
                                <p><strong>Material:</strong> {{ $item->material }}</p>
                                <p><strong>Category:</strong> {{ $item->category}}</p>
                                <p><strong>Subcategory:</strong> {{ $item->subcategory}}</p>
                                <p><strong>Stock Number:</strong> {{ $item->stock_number}}</p>
                                <a id="itemEdit" href="{{url('edit-item/'.$item->item_id)}}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> <!-- Edit icon -->
                                </a>
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
    @include('footer')
</div>

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
                    icon: 'error',
                    title: 'Error!',
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

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>




            <script>
                function loadItemDetails(item_id) {
                    // Assume getItemDetailsById is a function that fetches item details based on the item ID
                    var itemDetails = getItemDetailsById(item_id);
            
                    // Update the modal content with the fetched details
                    document.getElementById('itemDetailsName').innerText = itemDetails.item_name;
                    document.getElementById('itemDetailsPrice').innerText = itemDetails.price;
                    document.getElementById('itemDetailsProductInfo').innerText = itemDetails.product_information;
                    document.getElementById('itemDetailsInsideBox').innerText = itemDetails.inside_box;
                    document.getElementById('itemDetailsMaterial').innerText = itemDetails.material;
                    document.getElementById('itemDetailsCategory').innerText = itemDetails.category;
                    document.getElementById('itemDetailsSubcategory').innerText = itemDetails.subcategory;
            
                    // Add more fields as needed
            
                    // Show the modal
                    $('#itemDetailsModal').modal('show');
                }
            </script>
            

<script>
  
    $(document).ready(function () {
       $('#myUsertable').DataTable();
    });
 

    $(document).ready(function () {
       $('#myItemtable').DataTable();
    });
 </script>
 </body>
</html>
