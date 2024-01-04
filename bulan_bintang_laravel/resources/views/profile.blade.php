
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
       body {
           
           background-color:#0F0E0E;
       }   
       .card{
           border-radius: 10px ;
           color: #ffff;
           background-color: #2C3333;
           width: auto;
           text-align: left;   
           margin-top: 60px;   
           font-family: 'Roboto', sans-serif; 
                   
       }

       #profileImg {
           width: 250px;
           height: auto;
           border-radius: 30px 30px;
           display: block; /* Ensure that the image is treated as a block element */
           margin-left: auto;
           margin-right: auto;
       }

       #userprofile{
           font-family: 'Roboto', sans-serif;
       }

       #profileBtn{
           border-radius: 20px;
           font-family: 'Roboto', sans-serif;
           transition: transform 0.3s ease-in-out;
       }

       #profileBtn:hover{
           transform: scale(1.2);
           background-color: #2C3333;
       }

       #h3Profile{
           color: grey;
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
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 id="userprofile">User Profile</h2>
                    </div>
                    <img id="profileImg" src="https://cdn-icons-png.flaticon.com/512/6998/6998058.png" alt="dv">
                    <div class="card-body">
                        <div class="profile-info">
                            @if ($user !== null)
                            
                                <div>
                                    <p><strong>Name:</strong> {{ $user->name }}</p>
                                    <p><strong>Email:</strong> {{ $user->email }}</p>
                                </div>

                            @else
                                <p>No user data found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('footer')
</body>
</html>





