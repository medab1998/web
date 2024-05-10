<?php
    include('connect/connection.php');

    session_start();
    if(isset($_POST["login"])){
            

        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = $_POST['password'];
        
        $sql = mysqli_query($connect, "SELECT * FROM users where email = '$email'");
        // $id = $sql -> fetch_row()[0];
        $count = mysqli_num_rows($sql);
        

            if($count > 0){
                $fetch = mysqli_fetch_assoc($sql);
                 $pw = $fetch["password"];
                $id = $fetch["id"];
                    if($fetch["status"] == 0){
                        ?>
                        <script>
                            alert("Please verify email account before login.");
                        </script>
                        <?php
                    }else if($password==$pw){
                        
                        ?>
                        
                        <script>d
                            alert("login  successfully "  );
                            
                            // window.location.replace("/code-main/patient.php");
                        </script>
                        <?php
                        // die("h");
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        $_SESSION['id'] = $id;
                       header("Location: profil_patient.php");
                        
                    }else{
                        ?>
                        <script>
                            alert("email or password invalid, please try again.");
                        </script>
                        <?php
                    }
            }
                
    }

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Login Form</title>
</head>
<body style="background-image: url(https://eufordigital.eu/wp-content/uploads/2020/06/Rectangle-3.jpg);  background-repeat: no-repeat;   background-size: 100% 100%;   

">

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container" style="color: white;">
        <a class="navbar-brand" style="color: white;" href="http://localhost/code-main/home/home_patient/home_patient.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="font-weight:bold; color:white   ; text-decoration:underline">Login</a>
                </li>
                <li class="nav-item" style="color: white;">
                    <a class="nav-link" style="color: white;" href="register.php">SignUp</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8 " style="background: transparent;">
                <div class="card" style="background: transparent;">
                    <div class="card-header" style="color: white;">Login</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right" style="color: white;">E-mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right" style="color: white;">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    <i class="bi bi-eye-slash" style="color: white;" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox" style="color: white;">
                                        <label>
                                            <input type="checkbox" name="remember" > Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4" style="color: white;">
                                <input type="submit"  value="Login" name="login">
                                <a href="recover_psw.php" class="btn btn-link">
                                    Forgot Your Password?
                                </a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>