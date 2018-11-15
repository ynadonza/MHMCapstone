<?php 
require("../database/sql_connect.php");
 
$order_id = $_GET['order_id'];

$getquantity = "SELECT * FROM orderdetails WHERE order_id = ".$order_id." ";
$getquantityRes = mysqli_query($conn,$getquantity);
if (!$getquantityRes) {
	echo mysqli_error($conn);
} else {
	while ($data=mysqli_fetch_assoc($getquantityRes)) {
		$oldquantity = "SELECT * FROM products WHERE prod_id = '{$data['prod_id']}' ";
		$oldResult = mysqli_query($conn,$oldquantity);
		if ($oldResult) {
			$row_qty = mysqli_fetch_assoc($oldResult);
			$update_qty = $row_qty['qty']-$data['orderQty'];
			
			$insertUpdatedQty = "UPDATE products SET qty = '{$update_qty}' WHERE prod_id = '{$data['prod_id']}' ";
			$updateResult = mysqli_query($conn,$insertUpdatedQty);
			if ($updateResult) {
				echo "Okey";  	
			} else {
				echo mysqli_error($conn);
			}
		}
	}

	$query = "UPDATE orders SET orderStatus = 'For Delivery' WHERE order_id = ".$order_id." ";
	$result = mysqli_query($conn, $query);
	if ($result) {
		header("location:forDelivery.php");
	} else {
		echo mysqli_error($conn);
	}
	
}

?>