
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
           background-color: #EEEEEE;
         
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

       .footer-container{
        padding: 20px;
        
       }

       #editProfile{
        color: black;
       }

       .updateEdit{
        background-color: #202d45;
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
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card">
                    <div class="card-header">

                        <h2 id="userprofile">User Profile</h2>
                    </div>
                    {{-- <img id="profileImg" src="{{ asset('storage/images/' . $user->image_path) }}" alt="{{ $user->name }}"> --}}
                    <img id="profileImg" src="https://cdn-icons-png.flaticon.com/512/6998/6998058.png">
                    {{-- <img id="profileImg" src="{{ asset($user->image_path ?? 'default_image_path') }}" alt="Profile Image"> --}}

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
                    <button id="editProfileBtn" class="btn btn-success" data-toggle="modal" data-target="#editProfileModal">Edit Profile</button>
                    </div>
                    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 id="editProfile">Edit Profile</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="editProfile" class="modal-body">
                                    
                                    <form action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data">
                                        @csrf       
                                        
                                        <input type="hidden" name="id" value="{{ $user->id }}"> <!-- Add this line -->                                
                                        <div class="form-group">
                                            
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="image_path">Profile Image</label>
                                            <input type="file" name="image_path" class="form-control" accept="image/*">
                                        </div>                                     
                                        <button type="submit" class="btn btn-dark" id="updateEdit">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <div class="footer-container">
        @include('footer')
    </div>
</body>
</html>






