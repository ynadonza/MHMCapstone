<?php
require("../database/sql_connect.php");

$query = "DELETE FROM products WHERE prod_id = '{$_GET['prod_id']}' ";

$result = mysqli_query($conn,$query);

if ($result) {
	header("location:products.php");
} else {
	echo mysqli_error($conn);
}



?>