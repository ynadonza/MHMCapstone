<?php 
require('../database/sql_connect.php');
//require('header.php');


$query = "SELECT * FROM users WHERE user_id = '{$_POST['user_id']}'";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);

/*echo "<pre>";
print_r($_POST);
print_r($row);
echo "</pre>";*/

if (isset($_POST['submit'])) {

  $error = array();
  $i = 0;



  //Validate password
  if (empty($_POST['password']) || strlen(trim($_POST['password'])) == 0) {
    $error['password'] = "Password is required";
    echo "<script type='text/javascript'>alert('".$error['password']."');window.location='editEmployeeAccount.php?user_id= ".$_POST['user_id']."';</script>";
  } else {
    if (strlen($_POST['password'])<6 || strlen($_POST['password'])>12) {
      $error['password'] = "Password should reach atleast 6 to 12 characters";
      echo "<script type='text/javascript'>alert('".$error['password']."');window.location='editEmployeeAccount.php?user_id= ".$_POST['user_id']."';</script>";
    }
  }

  //Validate confirm password
  if (strcmp($_POST['confirm'], $_POST['password'])!=0) {
    $error['confirm'] = "Password is required";
    echo "<script type='text/javascript'>alert('".$error['confirm']."');window.location='editEmployeeAccount.php?user_id= ".$_POST['user_id']."';</script>";
  }


$countingErrors = count($error);

  if ($countingErrors==0) {

      $hash_password = sha1($_POST['password']);
    
      $insertUpdatedEmp = "UPDATE `users` SET `password`='{$hash_password}' WHERE user_id = '{$_POST['user_id']}'";
      
      $resultUpdatedEmp = mysqli_query($conn,$insertUpdatedEmp);

      if ($resultUpdatedEmp) {
        header("location:employee.php");
      } else {
        echo mysqli_error($conn);
      }

  }


}

?>

