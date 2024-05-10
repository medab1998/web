<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/code-main/home/home_admin/admin/crud/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Create a person</a>
     </li>
      <li class="nav-item">
        <form method="post">

  <button style="margin-left:80vw;" class="nav-link" type="submit" name="logout">logout</button>
</form>  
      </li>
    </ul>
  </div>
</nav>
<?php

session_start();

if(!isset($_SESSION['email'])){
	
	header("Location: home\home_admin\admin\crud\index.php");
	exit();
}
if(isset($_POST['logout']))
{
  unset($_SESSION['email']);
	header("Location: http://localhost/code-main/home/home_admin/home_admin.php");
	exit();
}


?>
