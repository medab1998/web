<?php session_start(); ?>
<?php
    include('connect/connection.php');

    if(isset($_POST["register"])){
         $FN = $_POST["FN"];
         $LN = $_POST["LN"];
        // $CIN = $_POST["CIN"];

        $email = $_POST["email"];
        $password = $_POST["password"];

        $check_query = mysqli_query($connect, "SELECT * FROM users where email ='$email'");
        $rowCount = mysqli_num_rows($check_query);

        if(!empty($email) && !empty($password)  ){
            if($rowCount > 0){
                ?>
                <script>
                    alert("User with email already exist!");
                </script>
                <?php
            }else{

                $result = mysqli_query($connect, "INSERT INTO users (FN, LN, email, password, status) VALUES ('$FN', '$LN', '$email', '$password', 0)");
    
                if($result){
                    $otp = rand(100000,999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email;
                    require "Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;
    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
    
                    $mail->Username='pfehealth@gmail.com';
                    $mail->Password='gnoabbgtebydmxml';
    
                    $mail->setFrom('pfehealth@gmail.com', 'Mail Verfication');
                    $mail->addAddress($_POST["email"]);
    
                    $mail->isHTML(true);
                    $mail->Subject="Your verify code";
                    $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                    <br><br>
                    <p>With regrads,</p>
                    <b>Created with love by mohamed abdelkebir </b>
                    http://localhost/code-main/";
    
                            if(!$mail->send()){
                                ?>
                                    <script>
                                        alert("<?php echo "Register Failed, Invalid Email "?>");
                                    </script>
                                <?php
                            }else{
                                ?>
                                <script>
                                    alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                                    window.location.replace('verification.php');
                                </script>
                                <?php
                            }
                }
            }
        }
    }

?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>IoT-Medical</title>
</head>
<body style="background-image: url(https://eufordigital.eu/wp-content/uploads/2020/06/Rectangle-3.jpg);  background-repeat: no-repeat;   background-size: 100% 100%;">

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="http://localhost/code-main/home/home_patient/home_patient.php" style="color: white;">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color: white;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php" style="font-weight:bold; color:white; text-decoration:underline">SignUp</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<main class="login-form">
    <div class="cotainer " style="background: transparent;">
        <div class="row justify-content-center">
            <div class="col-md-8"style="background: transparent;">
                <div class="card"style="background: transparent;">
                    <div class="card-header" style="color: white;">Register</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="register">
                             <div class="form-group row" style="color: white;">
                                <label for="FN" class="col-md-4 col-form-label text-md-right">first name</label>
                                <div class="col-md-6"style="color: white;">
                                    <input type="text" id="FN" class="form-control" name="FN" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row"style="color: white;">
                                <label for="LN" class="col-md-4 col-form-label text-md-right">last name</label>
                                <div class="col-md-6"style="color: white;">
                                    <input type="text" id="LN" class="form-control" name="LN" required autofocus>
                                </div>
                            </div>
                            <!-- <div class="form-group row"style="color: white;">
                                <label for="CIN" class="col-md-4 col-form-label text-md-right">CIN</label>
                                <div class="col-md-6"style="color: white;">
                                    <input type="text" id="CIN" class="form-control" name="CIN" minlength="8"
       maxlength="8" size="8" required autofocus>
                                </div> -->
                            </div> 
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right"style="color: white;">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email_address" class="form-control" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$"  required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"style="color: white;">Password</label>
                                <div class="col-md-6">
                                    <input type="password"  id="password" class="form-control" name="password"  title="Password must be 8 characters including 1 uppercase letter, 1 lowercase letter and numeric characters"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                    <i class="bi bi-eye-slash" style="color: white;" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Register" name="register">
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