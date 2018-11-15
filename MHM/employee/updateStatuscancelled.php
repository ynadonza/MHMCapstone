<?php 
  require("../database/sql_connect.php");
  ?>

 <?php
 $order_id = $_GET['order_id'];
$query = "UPDATE orders
			SET 
			orderStatus = 'Cancelled'
			WHERE order_id = ('$order_id')";
$data = mysqli_query($conn, $query);
if($data == true){
	header("location:cancelled.php");
}else{
	echo mysqli_error($conn);
}


 ?>