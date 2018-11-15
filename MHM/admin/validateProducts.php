<?php
require("../database/sql_connect.php");
?>

<head>
	<?php include("header.php") ?>
</head>

<?php
	$flag = array();
	if (isset($_POST['addSupplier']) && isset($_POST['productType']) && isset($_POST['prod_name']) && isset($_POST['quantity']) && isset($_POST['unit_price']) && isset($_POST['desc'])) {
		// check supplier
		if ($_POST['addSupplier']==000) {
			$errorSupplier = "Require supplier.";
     		echo "<script type='text/javascript'>alert('$errorSupplier');window.location='products.php';</script>";
		} else {
			$errorSupplier = $_POST['addSupplier'];
			$flag['check1'] = 1;
		}

		//check product type
		if (empty($_POST['productType'])) {
			$errorType = "Require product type.";
     		echo "<script type='text/javascript'>alert('$errorType');window.location='products.php';</script>";
		} else {
			$errorType = $_POST['productType'];
			$flag['check2'] = 1;
		}

		//check product name
		if (empty($_POST['prod_name'])) {
			$errorProd = "Require product name and it should contain only letters and whitespace";
     		echo "<script type='text/javascript'>alert('$errorProd');window.location='products.php';</script>";
		} else {
			$errorProd = $_POST['prod_name'];
			$flag['check3'] = 1;
		}

		//check quantity
		if (empty($_POST['quantity']) || !is_numeric($_POST['quantity'])) {
			$errorQuantity = "Require quantity and number is only allowed.";
     		echo "<script type='text/javascript'>alert('$errorQuantity');window.location='products.php';</script>";
		} else {
			$errorQuantity = $_POST['quantity'];
			$flag['check4'] = 1;
		}

		//check unit price
		if (empty($_POST['unit_price']) || !is_numeric($_POST['unit_price'])) {
			$errorPrice = "Require quantity and number is only allowed.";
     		echo "<script type='text/javascript'>alert('$errorQuantity');window.location='products.php';</script>";
		} else {
			$errorPrice = $_POST['unit_price'];
			$flag['check5'] = 1;
		}

		//check description
		if (empty($_POST['desc'])) {
			$errorDesc = "Require description.";
     		echo "<script type='text/javascript'>alert('$errorDesc');window.location='products.php';</script>";
		} else {
			$errorDesc = $_POST['desc'];
			$flag['check6'] = 1;
		}

		

	} 
	$count = count($flag);

	if ($count==6) {
		
		$insertTransaction = "INSERT INTO `transactions`(`date_of_transaction`) VALUES (NOW())";

		$transactionResult = mysqli_query($conn,$insertTransaction);

		if (!$transactionResult) {
			echo mysqli_error($conn);
		} else {
		
			$transac_id = mysqli_insert_id($conn);

			if (isset($_FILES['prodPhoto']) && count($_FILES['prodPhoto']) > 4 ) {
				if ($_FILES['prodPhoto']['type'] == "image/png" || $_FILES['prodPhoto']['type'] == "image/jpeg") {
					if ($_FILES['prodPhoto']['size'] <= 10000000) {
						$filename = "prod_images/".$_FILES['prodPhoto']['name'];
						move_uploaded_file($_FILES['prodPhoto']['tmp_name'], $filename);
					}
				}

				$insertProduct = "INSERT INTO `products`(prod_name, `type`, `description`, `unit_price`, `qty`, `status`, `photo`, `trans_id`, `supplier_id`, date_added) 
										VALUES ('{$errorProd}','{$errorType}', '{$errorDesc}', '{$errorPrice}', '{$errorQuantity}', 'available', '".$filename."', 
											".$transac_id.", '{$errorSupplier}', NOW() )";

				$productResult = mysqli_query($conn,$insertProduct);

				if ($productResult) {
					$message = "ITEMS SUCCESSFULLY INSERTED INTO THE DATABASE.";
     				echo "<script type='text/javascript'>alert('$message');window.location='products.php';</script>";
				} else {
					echo mysqli_error($conn);
					echo "failed";
					echo "<br>";
				}

			}	

		}

	}
	

?>