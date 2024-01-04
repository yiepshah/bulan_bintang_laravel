
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

 


    <title>Admin Dashboard</title>
    <style>
        /* body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            background-color: #f8f9fa;
            color: #343a40;
        } */

        .w3-sidebar {
            height: 100%;
            width: 70px;
            
            position: fixed;
            overflow-x: hidden;
            padding-top: 20px;
            transition: width 0.3s;
            z-index: 1;
        }

        .w3-sidebar:hover {
            width: 200px;
        }

        .w3-sidebar a {
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            padding: 30px;
            text-align: center;
        }

        .w3-sidebar a:hover {
            color: #f1f1f1;
        }

        .main--content {
            position: relative;
            background: #fff;
            width: calc(100% - 70px);
            padding: 1rem;
            left: 70px;
            transition: margin-left 0.3s;
            color: #333;
            padding: 20px;
            
        }

        .w3-sidebar:hover+.main--content {
            margin-left: 90px;
        }

        @media (max-width: 576px) {
        .w3-sidebar {
            width: 90px;
        }

        .w3-sidebar:hover {
           
        }

        .main--content {
            width: 90%;
            margin-left: 0;
        }
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
            background: #fff;
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

        .user-table th,
        .user-table td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
            background-color: #ffffff;           
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

        #search-icon{
            color: #202d45;
            width: 20px;
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

        #deleteBtn {
            background: linear-gradient(to right, #e74c3c, #e66767);
            color: #fff;
        }

        .display{}




    </style>

</head>
<html>
<body>
  

    @auth
        @if(auth()->user()->role === 'admin')
            @include('adminsidebar')
        @endif
    @endauth 



    <div class="container">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Admin</span>
                <h2>dashboard</h2>
            </div> 
        </div>

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
            <hr>

            <div class="user-table-container">
                <h2 class="main--title">User Information</h2>
                       
                <div class="search--box">  
                    {{-- <input id="userSearchInput" type="text" placeholder="Search User"> --}}
                    <a href="" onclick="searchItem()"><i id="search-icon" class="fas fa-search"></i></a>
                </div>       
  
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
                                    <a id="userEdit" href="{{url('edit-user/'.$user->id)}}"
                                        class="btn btn-primary">Edit</a> <br><br>
                                        <a href="{{ url('delete-user/'.$user->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">Delete</a>
                                    </td>
                            </tr>
                            @empty
                                <tr><td colspan='6'>No user found</td></tr>
                            @endforelse                        
                        </tbody>
                     </table>
                </div>



                <div class="stock-table-container">
                    <h2 class="main--title">Stock Information</h2>

                    <div class="search--box">
                        {{-- <input id="itemSearchInput" type="text" placeholder="Search Item"> --}}
                        <a href="" onclick="searchItem()"><i id="search-icon" class="fas fa-search"></i></a>

                    </div>
                    
                    <div class="table-responsive">
                        <table id="myItemtable" class="display">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Item Id</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Product Info</th>
                                    <th>Material</th>
                                    <th>Inside Box</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
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
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->product_information }}</td>
                                        <td>{{ $item->material }}</td>
                                        <td>{{ $item->inside_box }}</td>
                                        <td>{{ $item->category}}</td>
                                        <td>{{ $item->subcategory}}</td>
                                        <td>
                                            <a id="userBtninfo" href="{{url('edit-item/'.$item->item_id)}}"
                                             class="btn btn-primary">Edit</a> <br><br>
                                              <a href="{{url('delete-item/'.$item->item_id)}}" class="btn btn-danger">Delete</a>
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
                                $(document).ready(function () {
                    $('#myUsertable').DataTable();
                });

                $(document).ready(function () {
                    $('#myItemtable').DataTable();
                });

            </script>




<script>

    function searchItem() {
        var input, filter, table, tr, tdId, tdName, i, txtValueId, txtValueName;
        input = document.getElementById("itemSearchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myItemtable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            tdId = tr[i].getElementsByTagName("td")[0]; // Assuming item ID is in the first column
            tdName = tr[i].getElementsByTagName("td")[1]; // Assuming item name is in the second column
            if (tdId && tdName) {
                txtValueId = tdId.textContent || tdId.innerText;
                txtValueName = tdName.textContent || tdName.innerText;
                if (txtValueId.toUpperCase().indexOf(filter) > -1 || txtValueName.toUpperCase().indexOf(filter) > -1) {
                    tr[i].classList.remove("fade-out");
                    tr[i].classList.add("fade-in");
                    tr[i].style.display = "";
                } else {
                    tr[i].classList.remove("fade-in");
                    tr[i].classList.add("fade-out");
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Automatically trigger the search function on input
    document.getElementById("itemSearchInput").addEventListener("input", searchItem);


    function searchUser() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("userSearchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myUsertable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Assuming user name is in the second column
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].classList.remove("fade-out");
                    tr[i].classList.add("fade-in");
                    tr[i].style.display = "";
                } else {
                    tr[i].classList.remove("fade-in");
                    tr[i].classList.add("fade-out");
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Automatically trigger search functions on input
    document.getElementById("itemSearchInput").addEventListener("input", searchItem);
    document.getElementById("userSearchInput").addEventListener("input", searchUser);
</script>

<script>
  
    $(document).ready(function () {
       $('#myUsertable').DataTable();
    });
 
    // For Item Table
    $(document).ready(function () {
       $('#myItemtable').DataTable();
    });
 </script>
</html>
</body>