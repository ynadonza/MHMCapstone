
<?php

    // include Database connection file 
    include("../database/sql_connect.php");
if (isset($_POST['username_check'])) {
    $username = $_POST['username'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) > 0) {
      $name_error = "Sorry. username already taken";
    }else{
     $name_error = "Available";
    }
    exit();
  }
?>