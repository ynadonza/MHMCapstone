<?php


$conn = mysqli_connect("localhost", "root", "", "mhm");

if(!$conn){
	echo "Failed to connect to mysql/db!";
	exit();
}

?>