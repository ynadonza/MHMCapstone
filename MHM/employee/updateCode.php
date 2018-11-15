<?php
session_start();
require ("../database/sql_connect.php");


$query = "UPDATE transaction_code

			 SET transactionCode = '{$_POST['code']}'

			  WHERE transactionCode_id = '{$_POST['transactionCode_id']}'";
$result = mysqli_query($conn,$query);



if($result){
	header("location:transactionCode.php");

}else{
	echo $query;	
}

?>