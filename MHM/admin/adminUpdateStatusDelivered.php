<?php 
  require("../database/sql_connect.php");
  ?>

 <?php
  $order_id = $_GET['order_id'];
$query = "UPDATE orders
			SET 
			orderStatus = 'Delivered'
			WHERE order_id = ('$order_id')";
$data = mysqli_query($conn, $query);
if($data == true){
	header("location:delivered.php");
}else{
	echo mysqli_error($conn);
}


 ?>