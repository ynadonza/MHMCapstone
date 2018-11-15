<?php
include_once("../database/sql_connect.php");
if(!empty($_POST['rating']) && !empty($_POST['order_id'])){
$user_id = $_POST['user_id'];
$order_id = $_POST['order_id'];
$insertRating = "INSERT INTO ratings (user_id, order_id, total_rate, title, comments, created, modified) VALUES ('".$user_id."','".$order_id."', '".$_POST['rating']."', '".$_POST['title']."', '".$_POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
  $result = mysqli_query($conn, $insertRating);
        if($result == true){

            $message = "Thanks! You rated your orders and our service '".$_POST['rating']."' Stars.";
             echo "<script type='text/javascript'>alert('$message');window.location='orders.php';</script>";
            // echo "<b class='g'>Thanks! You rated this product {$star} Stars.</b>";
         }

       
            // Display the result
           
        
   
 }
?>