
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .w3-sidebar {
            height: 100%;
            width: 70px;
            background-color: #111;
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
            margin-left: 70px;
            transition: margin-left 0.3s;
            color: #333;
        }

        .w3-sidebar:hover+.main--content {
            margin-left: 200px;
        }

        @media (max-width: 576px) {
        .w3-sidebar {
            width: 100px;
        }

        .w3-sidebar:hover {
            width: 100%;
        }

        .main--content {
            width: 100%;
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
            background: #343a40;
            border-radius: 10px;
            padding: 10px 2rem;
            margin-bottom: 1rem;
            margin-left: 20px;
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
            gap: 10px;
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
            width: calc(100% - 2rem);
            margin-top: 1rem;
            padding: 1rem;
            border-radius: 10px;
            color: #343a40;
            margin-left: 20px;
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
            display: flex;
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
            background: linear-gradient(to right, #45a049, #8cc84b);
        }

        .online-payment {
            background: linear-gradient(to right, #36b9cc, #66b3a6);
        }

        .expenses {
            background: linear-gradient(to right, #e74c3c, #e66767);
        }

        .new-customers {
            background: linear-gradient(to right, #f39c12, #f5d76e);
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
            background-color: #3498db;
            color: #fff;
        }

        .stock-table th {
            position: sticky;
            top: 0;
            z-index: 2;
            background-color: #3498db;
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
            background-color: #3498db;
            color: #fff;
        }

        .user-table th {
            position: sticky;
            top: 0;
            z-index: 2;
            background-color: #3498db;
        }

        .user-table td {
            background-color: #fff;
            color: #343a40;
            transition: background-color 0.3s ease-in-out;
        }

        .user-table tbody tr:hover td {
            background-color: #f2f2f2;
        }


        #editItembtn {
            color: #000;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 10px 10px;
            margin-right: 5px;
            transition: transform 0.3s ease-in-out;
            margin-bottom: 10px;
        }

        #deleteItembtn {
            border: none;
            color: #000;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 10px 10px;
            margin-right: 5px;
            transition: transform 0.3s ease-in-out;

        }

        #editItembtn:hover {
            background-color: #352F44;
            border: none;
            transform: scale('1.2');
        }


        #profileimg {
            margin-left: 6px;
        }

        #clearBtn{
            background: linear-gradient(to right, #45a049, #8cc84b);
            border: none;
        }

        #deleteBtn{
            background: linear-gradient(to right, #e74c3c, #e66767);
            border: none;
        }
    </style>

</head>

<body>
    @include('header')

    @auth
        @if (auth()->user()->role === 'admin')
            @include('adminsidebar')
        @endif
    @endauth 

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>dashboard</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <img id="profileimg" src="https://gntme.com/wp-content/plugins/phastpress/phast.php/c2VydmljZT1pbWFnZXMmc3JjPWh0dHBzJTNBJTJGJTJGZ250bWUuY29tJTJGd3AtY29udGVudCUyRnVwbG9hZHMlMkYyMDIwJTJGMDclMkY0MDAtNC5qcGcmY2FjaGVNYXJrZXI9MTY3MTAxOTcxNi03MTM2MiZ0b2tlbj1iNTAxNjcxNmY3YjkwZmM0.q.jpg" alt="Profile Image">
                   
                    <input id="myInput" type="text" placeholder="Search">
                </div>
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
                <div class="table-responsive">
                    <table class="user-table table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>                       
                        @if(isset($users))
                        <tbody id="myUsertable">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                                                       
                                <td>
                                    <button class='btn btn-primary' onclick='editUser({{ $user->id }})'>Edit</button><br><br>
                                    <button id="deleteBtn" class='btn btn-danger' onclick='deleteUser({{ $user->id }})'>Delete</button><br><br>
                                    <button id="clearBtn" href="javascript:void(0);" onclick="clearPage()"  class='btn btn-success' type="submit">Enter</button>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <p>No users found</p>
                        @endif                           
                        </tbody>
                     </table>
                </div>



                <div class="stock-table-container">
                    <h2 class="main--title">Stock Information</h2>
                    <div class="table-responsive">
                        <table class="stock-table table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Item Id</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Product Info</th>
                                    <th>Material</th>
                                    <th>Inside Box</th>
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

                                        <td>
                                            <button class='btn btn-primary' onclick='editItem({{ $item->item_id }})'>Edit</button><br><br>
                                            <button id="deleteBtn" class='btn btn-danger' onclick='deleteItem({{ $item->item_id }})'>Delete</button><br><br>
                                            <button id="clearBtn" href="javascript:void(0);" onclick="clearPage()"  class='btn btn-success' type="submit">Enter</button>                                         
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan='6'>No items found</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>


                <script>
                    function editUser(id) {
                        
                        $('#myUsertable').find('tr').each(function() {
                            
                            if ($(this).find('td:first').text() == id) {
                               $(this).find('td:not(:last-child)').attr('contenteditable', true);
                            }
                        });
                    }
                
                    function deleteUser(id) {

                        $('#myUsertable').find('tr').each(function() {
                           
                            if ($(this).find('td:first').text() == id) {
                               
                                $(this).remove();
                            }
                        });          
                    }
                </script>

                <script>
                    function editItem(itemId) {
                        
                        $('#myItemtable').find('tr').each(function() {
                            
                            if ($(this).find('td:first').text() == itemId) {
                            $(this).find('td:not(:last-child)').attr('contenteditable', true);
                            }
                        });
                    }

                    function deleteItem(itemId) {

                        $('#myItemtable').find('tr').each(function() {
                        
                            if ($(this).find('td:first').text() == itemId) {
                            
                                $(this).remove();
                            }
                        });
                    }
                </script>
                
                <script>
                    function clearPage() {
    
                        location.reload();
                    }

                </script>
        @include('footer')
        </body>