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
    <title>Signup</title>

    <style>
        body {
            background-color: #EEEEEE;
            margin: 0;
        }
    
        .container {
            background-color: #fdfdfd;
            padding: 20px;
            margin-top: 20px;
            border-radius: 15px;
        }
    
        .form-container {
            padding: 20px;
        }
    
        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 5px;
            margin-top: 5px;
        }
    
        input[type="file"],
        input[type="text"],
        input[type="number"],
        select {
            padding: 8px;
            margin-bottom: 8px;
        }
    
        #addbtn {
            color: #fff;
            border: none;
            background-color: #202d45;
            width: 80px;
            padding: 8px;
            transition: transform 0.3s ease-in-out;
            border-radius: 10px;
        }
    
        #addbtn:hover {
            background-color: #202d45;
            transform: scale(1.1);
        }
    
        #bblogo {
            text-align: center;
            margin-bottom: 20px;
        }
    
        #bblogo img {
            border-radius: 5px;
            height: auto;
            max-width: 100%;
            width: 40px;
        }
    
        /* Additional Mobile Styles */
        @media only screen and (max-width: 600px) {
            h1 {
                font-size: 18px;
            }
    
            input[type="file"],
            input[type="text"],
            input[type="number"],
            select {
                padding: 6px;
                margin-bottom: 6px;
            }
    
            #addbtn {
                width: 60px;
                padding: 6px;
            }
        }
    </style>
  
</head>

<body>
    @include('header')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="d-flex">
                   
                </div>
                <img id="logo" src="https://bulanbintanghq.com/wp-content/uploads/2022/01/bulanbintanglogo-1040x800.png" alt="Logo"><br><br>
                <span id="signup-heading">Sign Up</span>
                <form action="{{ url('/signup') }}" method="post">
                    @csrf

                    <div id="errorAlert" class="alert alert-danger" style="display: none;">
                        <strong>Error!</strong> There was an issue with your input. Please check and try again.
                    </div>

                    <div id="inputErrorAlert">
                        <strong>Error!</strong> Please fill in all the form fields.
                    </div>

                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" required>
                        <div class="alert alert-primary" role="alert" style="display: none;" id="password-strength-status"></div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <div id="password-match-alert" class="alert alert-success" style="display: none;">
                         Passwords match.
                    </div>
                    <p>Already Have An Account? <a id="loginlink" href="login">Login
                            Now! </a></p>
                    <button type="submit" id="Sbtn" class="btn btn-dark">Submit</button><br><br>
                    <a style="color: black;" href="">Terms of use. Privacy policy</a>
                </form>
            </div>
        </div><br>

   
    </div><br><br>
    <div>
        @include('footer_user')
    </div>
    


    <script>

        

        $(document).ready(function () {

            $(document).on('change keyup', 'input[name="password"]', function () {
                checkPasswordStrength($(this).val().trim())
            })

            $(document).on('change keyup', '#confirmPassword', function () {

                checkPasswordMatch();
            });

            function checkPasswordMatch(){

                var password = $('input[name="password"]').val();
                var confirmPassword = $('#confirmPassword').val();

                if (password !== confirmPassword) {

                    $('#password-match-alert').hide();
                    $('#Sbtn').prop('disabled', true);

                } else {
                    
                    $('#password-match-alert').show();
                    $('#Sbtn').prop('disabled', false);
                }
            }

        });

        function checkPasswordStrength(password) {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            $('#password-strength-status').show()

            if (password.length < 6) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').removeAttr('class');
                $('#password-strength-status').addClass('alert alert-danger');
                $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
                $('#Sbtn').prop('disabled', true)
            } else {
                if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').removeAttr('class');
                    $('#password-strength-status').addClass('alert alert-success');
                    $('#password-strength-status').html( "Strong");
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').removeAttr('class');
                    $('#password-strength-status').addClass('alert alert-warning');
                    $('#password-strength-status').html(
                       "Medium (should include alphabets, numbers and special characters.)");
                }
                $('#Sbtn').prop('disabled', false)
            }
        }
    </script>

</body>

</html>
