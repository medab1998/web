<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="login_medicin.css">
</head>
<body>
    <div class="login-box">
        
        <form class="login-boxx" action="login_medicin.php" method="post">
            <h1>Connexion</h1>
            <label>Email</label>
            <input type="email" placeholder="nom d'utilisateur ou email" required name="email">
            <label>Mot de passe</label>
            <input type="password" placeholder="mot de passe" required name="password">
            <!-- <a class="text" href="http://localhost/code-main/recover_psw.php" > Mot de passe oublié ?</a> -->
            <input type="submit" id="submit" name="login"  value="Connexion">
           
        </form>

    </div>
    
</body>
</html>


<?php


$connect=mysqli_connect("localhost","root","","iotbd");
if(mysqli_connect_errno()){
	echo 'Échec de la connexion à la base de données';
}



session_start();



    if(isset($_POST["login"])){
            

        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = $_POST['password'];
        
        $sql = mysqli_query($connect, "select * from medecin where email = '".$email."' && password = '".$password."'");

        // $id = $sql -> fetch_row()[0];
        $count = mysqli_num_rows($sql);
	
	
    if($count > 0){
        $fetch = mysqli_fetch_assoc($sql);
         $pw = $fetch["password"];
        $id = $fetch["id"];
            if($fetch["status"] == 1){
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
               header("Location: cpp.php");
                
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
