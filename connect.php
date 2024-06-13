<?php
  $server = "127.0.0.1:3307"; 
  $username = "root"; 
  $password = "paria@DB202";
  $db_name = "SneakerSyndicate";
  $conn = mysqli_connect($server , $username , $password , $db_name);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
