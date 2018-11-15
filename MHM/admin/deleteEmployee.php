<?php
session_start();
require ("../database/sql_connect.php");
$user_id = $_GET['user_id'];
$query = "DELETE FROM users WHERE user_id = $user_id";
$result = mysqli_query($conn,$query);

if($result){
	header("location:employee.php");
}else{
	echo $query;	
}

?>