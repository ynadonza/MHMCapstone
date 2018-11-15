<?php
require("../database/sql_connect.php");

$order = $_GET['order'];
$query = "SELECT * FROM orders WHERE order_id = ".$order."";

$result = mysqli_query($conn,$query);

$data = mysqli_fetch_assoc($result);
if ($_POST) {

	$count = 0;

	if (empty($_POST["transactionCode"])) {
   		$transcodeError = "Transaction Code is required";
   		echo "<script type='text/javascript'>alert('$transcodeError');window.location='userpayment.php';</script>";
	} else {
		$transcodeError = $_POST["transactionCode"];
		$count++;
	}

	if (empty($_POST["sender"]) || (!preg_match('/^[a-zA-Z ]*$/',$_POST["sender"]))) {
		$senderError = "Senders Name is required and must contain letters ONLY";
    	echo "<script type='text/javascript'>alert('$senderError');window.location='userpayment.php';</script>";
	} else {
		$senderError = $_POST["sender"];
		$count++;
	}

	if (empty($_POST["contact"]) || !is_numeric($_POST["contact"])) {
		$contactError = "Contact number is required and must contain numbers ONLY";
		echo "<script type='text/javascript'>alert('$contactError');window.location='userpayment.php';</script>";
	} else {
		$contactError = $_POST["contact"];
		$count++;
	}

	if (empty($_POST["amountPaid"]) || !is_numeric($_POST["amountPaid"])) {
		$amountError = "Amount must be number is required and must contain numbers ONLY";
		echo "<script type='text/javascript'>alert('$amountError');window.location='userpayment.php';</script>";
	} else {
		$amountError = $_POST["amountPaid"];
		$count++;
	}
	
	if($amountError < $data['total_amount']){
		$message = "Insufficient amount. Please pay the exact amount";
   		echo "<script type='text/javascript'>alert('$message');window.location='userpayment.php?order_id=".$order."';</script>";
		}else if ($count==4) {
		

		$insertPayment = "INSERT INTO payments (service_provider, transactionCode, sender, contact, amountPaid)
			  				VALUES ('{$_POST['service_provider']}', '".$transcodeError."', '".$senderError."', '".$contactError."', '".$amountError."')";

		$resultPayment = mysqli_query($conn,$insertPayment);

		if ($resultPayment) {
			$payment_id = mysqli_insert_id($conn);
			$order_id =  $_GET['order'];

			$orderUpdate = "UPDATE `orders` SET paymentStatus = 'paid', payment_id= '.$payment_id.' WHERE order_id= ".$order_id." ";

			$resultUpdate = mysqli_query($conn,$orderUpdate);

			if (!$resultUpdate) {
				echo mysqli_error($conn);
			} else {
				$message = "Your order is now being process. Please wait for your order to be delivered.";
   		echo "<script type='text/javascript'>alert('$message');window.location='orders.php';</script>";
			}
		} else {
			

			echo "error";
		}
	}
}
	



?>

