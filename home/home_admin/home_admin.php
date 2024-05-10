<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="home_admin.css">
</head>
<body>
    <div class="login-box">
        
        <form class="login-boxx" action="home_admin.php" method="post">
            <h1>Connexion</h1>
            <label>Email</label>
            <input type="email" placeholder="nom d'utilisateur ou email" required name="email">
            <label>Mot de passe</label>
            <input type="password" placeholder="mot de passe" required name="password">
            
            <input type="submit" id="submit" name="login"  value="Connexion">
           
        </form>

    </div>
    
</body>
</html>


<?php


$con=mysqli_connect("localhost","root","","iotbd");
if(mysqli_connect_errno()){
	echo 'Échec de la connexion à la base de données';
}



session_start();


if(isset($_POST['login'])){
	
	$e = $_POST['email'];
	$pass = $_POST['password'];
	
	
	$qu = "select * from admin where email = '".$e."' && password = '".$pass."'";
	
	if(mysqli_num_rows(mysqli_query($con, $qu)) > 0){
		
		$_SESSION['email'] = $e;
		
		header("Location: http://localhost/code-main/home/home_admin/admin/crud/");
        
	} else {
		
		echo '<div class="alert" role="alert ">
		Nom utilisateur ou mot de passe erroné
	</div>';
	}
	
	
}
?>