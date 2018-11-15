<?php 
  require("../database/sql_connect.php");
  ?>

 <?php
 $transaction_id = $_GET['transactionCode_id'];
$query = "UPDATE transaction_code
			SET 
			status = 'Done'
			WHERE transactionCode_id = ('$transaction_id')";
			echo $query;
$data = mysqli_query($conn, $query);
if($data == true){
	header("location:transactionCode.php");
}else{
	echo mysqli_error($conn);
}


 ?>