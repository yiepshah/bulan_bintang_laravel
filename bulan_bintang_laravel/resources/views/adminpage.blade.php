
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

        #deleteItembtn{
            background-color: #BB2525;
            border: none;
            transform: scale('1.3');
        }

        #profileimg {
            margin-left: 6px;
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
                    {{-- <i class="fa-solid fa-search"></i> --}}
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

            <!-- Add this canvas element where you want the chart to appear -->
            <canvas id="myLineChart" width="3" height="15"></canvas>



            <div class="stock-table-container">
                <h2 class="main--title">User Information</h2>
                <div class="table-responsive">
                    <table class="stock-table table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="myUsertable">
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td contenteditable='true' onBlur='updateUser(this, {{ $user->id }}, "name")' onClick='editUser(this)'>{{ $user->name }}</td>
                                    <td contenteditable='true' onBlur='updateUser(this, {{ $user->id }}, "email")' onClick='editUser(this)'>{{ $user->email }}</td>
                                    <td>
                                        <button class='btn btn-dark' onclick='deleteUser({{ $user->id }})'>Delete</button><br><br>
                                        <button class='btn btn-dark' onclick='submitUser({{ $user->id }})'>Submit</button>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan='4'>No users found</td></tr>
                            @endforelse
                        </tbody>
                     </table>
                </div>

                <div class="stock-table-container">
                    <h2 class="main--title">Stock Information</h2>
                    <div class="table-responsive">
                        <table class="stock-table table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Product Info</th>
                                    <th>Material</th>
                                    <th>Inside Box</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="myUsertable">
                                {{-- @forelse ($items as $key => $data) --}}
                                    <tr>
                                        {{-- <th>{{$data->item_id}}</th>
                                        <th>{{$data->item_name}}</th>
                                        <th>{{$data->price}}</th>
                                        <th>{{$data->product_information}}</th>
                                        <th>{{$data->material}}</th>--}}

                                    </tr>
                                    
                                {{-- @empty --}}
                                    <tr><td colspan='4'>No items found</td></tr>
                                {{-- @endforelse --}}
                            </tbody>
                         </table>
                    </div>
            </div>

    
    

            <script>
                $(document).ready(function () {
                    $("#myInput").on("keyup", function () {
                        var value = $(this).val().toLowerCase();
                        $("#myItemtable tr").filter(function () {
                            $(this).toggle($(this).text().toLowerCase().indexOf(
                                value) > -1)
                        });
                    });
                });
            </script>
        
        <script>
            function editUser(element) {
                element.style.backgroundColor = "#ffffcc";
            }
        
            function updateUser(element, userId, field) {
                element.style.backgroundColor = "";
        
                var updatedValue = element.innerText.trim();
        
                $.ajax({
                    type: "POST",
                    url: "{{ route('update.user') }}",
                    data: {
                        userId: userId,
                        field: field,
                        value: updatedValue,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        if (response.status === "success") {
                            Swal.fire("Success!", "User data updated.", "success");
                        } else {
                            Swal.fire("Error!", "Failed to update user data.", "error");
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire("Error!", "Failed to update user data. " + error, "error");
                    }
                });
            }
        
            function deleteUser(userId) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('delete.user') }}",
                            data: {
                                userId: userId,
                                _token: "{{ csrf_token() }}",
                            },
                            success: function (response) {
                                if (response.status === "success") {
                                    Swal.fire("Deleted!", "User has been deleted.", "success");
                                    location.reload();
                                } else {
                                    Swal.fire("Error!", "Failed to delete user. " + response.message, "error");
                                }
                            },
                            error: function (xhr, status, error) {
                                Swal.fire("Error!", "Failed to delete user. " + error, "error");
                            }
                        });
                    }
                });
            }
        </script>

{{-- <script>
    // Dummy data (replace this with your actual data)
    var chartData = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [{
            label: "Sales Data",
            data: [30, 45, 60, 20, 80], // Replace with your actual data
            borderColor: "#3498db",
            backgroundColor: "rgba(52, 152, 219, 0.2)",
            fill: true,
        }]
    };

    // Get the canvas element
    var ctx = document.getElementById('myLineChart').getContext('2d');

    // Create the line chart
    var myLineChart = new Chart(ctx, {
    type: 'line',
    data: chartData,
    options: {
        responsive: true,
        maintainAspectRatio: false, // Set to false to disable aspect ratio preservation
        scales: {
            // ... (other options)
        },
        plugins: {
            // ... (other options)
        }
    }
});

</script> --}}
        @include('footer')
        </body>