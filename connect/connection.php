<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "iotbd";

$connect = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
  echo "Connected successfully";

?>


