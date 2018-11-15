<?php
require("../database/sql_connect.php");
require("../session.php");

$prod_id = $_SESSION['prod_id'];

$restock = "SELECT * FROM products WHERE prod_id = ".$prod_id." ";

$result = mysqli_query($conn,$restock);

if ($result) {
	
	$data = mysqli_fetch_assoc($result);

	//get old and new unit price
	$totalUnitPrice = $data['unit_price'] + $_POST['unit_price'];
	//divide 2 to get average
	$averagePrice = $totalUnitPrice/2;
	//multiply by .30 to get 30% of combined price
	$thirtyPercent = $averagePrice * .30;
	//the sum of $averagePrice and $thirtyPercent will be the new selling price
	$finalPrice = $thirtyPercent + $averagePrice;
	//get total quantity
	$totalQuantity = $data['qty'] + $_POST['quantity'];
	

	$update = "UPDATE products SET selling_price = '{$finalPrice}', qty = '{$totalQuantity}', unit_price = '{$_POST['unit_price']}' WHERE prod_id = '{$data['prod_id']}' ";

	$updateRes = mysqli_query($conn,$update);

	if ($updateRes) {

		$insertRestock = "INSERT INTO `restocks`( `quantity`, `unit_price`, old_price, `dateProcess`, `prod_id`) VALUES ('{$_POST['quantity']}', '{$_POST['unit_price']}', 
							'{$data['unit_price']}', NOW(), '{$data['prod_id']}')";

		$insertResult = mysqli_query($conn,$insertRestock);

		if ($insertResult) {
			$message = "Item ".$data['prod_name']." with an product id ".$data['prod_id']." has been SUCCESSFULLY RESTOCK";
     		echo "<script type='text/javascript'>alert('$message');window.location='products.php';</script>";
		} else {
			echo mysqli_error($conn);
		}
		
	} else {
		echo mysqli_error($conn);
	}

} else {
	echo mysqli_error($conn);
} 


?>