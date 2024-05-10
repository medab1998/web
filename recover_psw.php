<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&display=swap" rel="stylesheet">
    <title>Login Medecin</title>
    <link rel="stylesheet" href="login_medicin.css">
</head> 
<body>
    <a class="homee" href="http://localhost/code-main/home/home_medicin/home_medicin.php" > <h1 style="color: indigo;font: size 80px;text-decoration: none">Home Medecin</h1></a>
    <div class="login-box">
        
        <form class="login-boxx" action="login_medicin.php" method="post">
           
            <h1>Login</h1>
            <label style="color: indigo;font-size:30px">Email</label>
            <input type="email" placeholder="username or email " required name="email">
            <label style="color: indigo;font-size:30px">password</label>
            <input size="25" type="password" placeholder="password" required name="password" >
            <a class="text" href="http://localhost/code-main/home/home_medicin/login_medicin/recover_psw.php" > 
                <p         style="color: indigo;font-size:larger">Forgot Your Password?</p></a>
            <input type="submit" id="submit" name="login"  value="Login">
           
        </form>
    </div>
    
</body>
</html>


<?php


$con=mysqli_connect("localhost","root","","iotbd");
if(mysqli_connect_errno()){
	echo 'Cant connect to data base';
}



session_start();


if(isset($_POST['login'])){
	
	$e = $_POST['email'];
	$pass = $_POST['password'];
	
	
	$qu = "select * from medecin where email = '".$e."' && password = '".$pass."'";
	$sqq = mysqli_query($con, $qu);
        $fetch = mysqli_fetch_assoc($sqq);
        
        $_SESSION['id'] = $fetch["id"];
	if(mysqli_num_rows($sqq) > 0){
		
		$_SESSION['email'] = $e;
		
		header("Location: cpp.php");
	} else {
		
		echo '<div class="alert" role="alert ">
		    <p style="color:red;font-size:30px;">Email or password are inncorrect !</p>
	</div>';
	}
	
	
}
?>