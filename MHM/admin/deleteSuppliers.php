<?php
session_start();
require ("../database/sql_connect.php");
$supplier_id = $_GET['supplier_id'];
$query = "DELETE FROM suppliers WHERE supplier_id = $supplier_id";
$result = mysqli_query($conn,$query);

if($result){
	header("location:supplier.php");
}else{
	echo $query;	
}

?>