<?php
// require 'http://localhost/code-main/home/home_admin/admin/crud/db.php';
$dsn = 'mysql:host=localhost;dbname=iotbd';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}
session_start();
if (isset ($_POST['cin'])) { 
    $sql = 'SELECT * FROM users WHERE cin=:cin';
    $statement = $connection->prepare($sql);
    $cin = $_POST['cin'];
    $statement->execute([':cin' => $cin ]);
    $person = $statement->fetch(PDO::FETCH_OBJ);
    // print_r($person);
    $idu = $person->id;
    // die($idu."   ".$_SESSION["id"]);
    //   $FN = $_POST['FN'];
    //   $LN = $_POST['LN'];
    
    //   $email = $_POST['email'];
    //   $med_id = $_POST['med_id'];
      // $sql = 'UPDATE users SET FN=:FN, LN=:LN, email=:email, med_id=:med_id WHERE id=:id';
      $sql = 'INSERT INTO view(patid, medid) VALUES(:patid, :medid)';
      $statement = $connection->prepare($sql);
    $idu = $person->id;
    $medId = $_SESSION["id"];
      if ($statement->execute([':patid' => $idu, ':medid' => $medId])) {
        header("Location: http://localhost/code-main/home/home_medicin/login_medicin/cpp.php");
      }
      // if ($statement->execute([':FN' => $FN, ':LN' => $LN,  ':email' => $email, ':id' => $id, ':med_id' => $med_id])) {
      //   header("Location: http://localhost/code-main/home/home_admin/admin/crud/");
      // }
    }

?>