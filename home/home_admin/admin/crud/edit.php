<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM users WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if  ( isset($_POST['email'])) {
 
  $email = $_POST['email'];
  $sql = 'UPDATE users SET email=:email WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':email' => $email, ':id' => $id])) {
    header("Location: index.php");
  }



}
if (isset ($_POST['cin'])) { 
$sql = 'SELECT * FROM users WHERE cin=:cin';
$statement = $connection->prepare($sql);
$cin = $_POST['cin'];
$statement->execute([':cin' => $cin ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
// print_r($person);
// $idu = $person[];
die($idu."   ".$_SESSION["id"]);
  $FN = $_POST['FN'];
  $LN = $_POST['LN'];

  $email = $_POST['email'];
  $med_id = $_POST['med_id'];
  // $sql = 'UPDATE users SET FN=:FN, LN=:LN, email=:email, med_id=:med_id WHERE id=:id';
  $sql = 'INSERT INTO view(patid, medid) VALUES(:patid, :medid)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':patid' => $id, ':medid' => $med_id])) {
    header("Location: http://localhost/code-main/home/home_admin/admin/crud/");
  }
  // if ($statement->execute([':FN' => $FN, ':LN' => $LN,  ':email' => $email, ':id' => $id, ':med_id' => $med_id])) {
  //   header("Location: http://localhost/code-main/home/home_admin/admin/crud/");
  // }
}
if (isset ($_POST['FN'])&& (isset ($_POST['LN']) && isset($_POST['email']) )) {
  $FN = $_POST['FN'];
  $LN = $_POST['LN'];

  $email = $_POST['email'];
  $med_id = $_POST['med_id'];
  // $sql = 'UPDATE users SET FN=:FN, LN=:LN, email=:email, med_id=:med_id WHERE id=:id';
  $sql = 'INSERT INTO view(patid, medid) VALUES(:patid, :medid)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':patid' => $id, ':medid' => $med_id])) {
    header("Location: http://localhost/code-main/home/home_admin/admin/crud/");
  }
  // if ($statement->execute([':FN' => $FN, ':LN' => $LN,  ':email' => $email, ':id' => $id, ':med_id' => $med_id])) {
  //   header("Location: http://localhost/code-main/home/home_admin/admin/crud/");
  // }
}

 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update Patient</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post" >
       
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">add Medecin ID </label>
          <input type="text" value="<?= $person->med_id; ?>" name="med_id" id="med_id" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update Patient</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
