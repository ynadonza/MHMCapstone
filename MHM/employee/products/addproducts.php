<?php
session_start();
include('../sql_connect.php');
$sql='SELECT * FROM products';
$result=mysqli_query($conn, $sql);

if(!$result){
	echo mysqli_error($conn);
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD PRODUCTS</title>
</head>
<body>
	<form method='POST' enctype="multipart/form-data" action='insertProducts.php'>
Type:<input type='text' name='prodType' placeholder="Type" required>
Description:<textarea name='prodDesc' placeholder="Description" required></textarea>
Unit Price:<input type='number' name='unitPrice' placeholder="Unit Price" required>
Market Price:<input type='number' name='marketPrice' placeholder="Market Price" required>
Quantity:<input type='number' name='qty' placeholder="Quantity" required>
Photo:<input type='file' name='prodPhoto'>
<input type='submit' value='Submit'>

</body>
</html>