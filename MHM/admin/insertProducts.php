<?php
require("../database/sql_connect.php");
?>

<?php
	$flag = array();
	$data = array();

	if (isset($_POST['SUBMIT'])) {
		// check supplier
		if (empty($_POST['addSupplier'])) {
			$message = "Require supplier.";
     		echo "<script type='text/javascript'>alert('$message');window.location='products.php';</script>";
		} else {
			$data['supplier'] = $_POST['addSupplier'];
			$flag['check1'] = 1;
		}

		//check product type
		if (empty($_POST['productType'])) {
			$message = "Require product type.";
     		echo "<script type='text/javascript'>alert('$message');window.location='products.php';</script>";
		} else {
			$data['type'] = $_POST['productType'];
			$flag['check2'] = 1;
		}

		//check sub-category
		if (empty($_POST['sub_category'])) {
			$message = "Require Sub-type.";
     		echo "<script type='text/javascript'>alert('$message');window.location='products.php';</script>";
		} else {
			$data['sub_type'] = $_POST['sub_category'];
			$flag['check3'] = 1;
		}

		//check product name
		if (empty($_POST['prod_name'])) {
			$message = "Require product name and it should contain only letters and whitespace";
     		echo "<script type='text/javascript'>alert('$message');window.location='products.php';</script>";
		} else {
			$data['product'] = $_POST['prod_name'];
			$flag['check4'] = 1;
		}

		//check quantity
		if (empty($_POST['qty']) || !ctype_digit($_POST['qty'])) {
			$message = "Require quantity and number is only allowed.";
     		echo "<script type='text/javascript'>alert('$message');window.location='products.php';</script>";
		} else {
			$data['qty'] = $_POST['qty'];
			$flag['check5'] = 1;
		}

		//check unit price
		if (empty($_POST['unit_price']) || !ctype_digit($_POST['unit_price'])) {
			$message = "Require quantity and number is only allowed.";
     		echo "<script type='text/javascript'>alert('$message');window.location='products.php';</script>";
		} else {
			$data['unit_price'] = $_POST['unit_price'];
			$flag['check6'] = 1;
		}

		//check description
		if (empty($_POST['desc'])) {
			$errorDesc = "Require description.";
     		echo "<script type='text/javascript'>alert('$errorDesc');window.location='products.php';</script>";
		} else {
			$data['desc'] = $_POST['desc'];
			$flag['check7'] = 1;
		}
	} 

	$count = count($flag);

	if ($count==7) {
		
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

				$percentage = $data['unit_price'] * .30;
				$selling_price = $percentage + $data['unit_price']; 

				$insertProduct = "INSERT INTO `products`(prod_name,type,sub_category,description,selling_price,unit_price,qty,status,photo,trans_id,supplier_id,date_added) 
										VALUES ('{$data['product']}','{$data['type']}', '{$data['sub_type']}', '{$data['desc']}', ".$selling_price.", '{$data['unit_price']}', '{$data['qty']}', 'available', 
										'".$filename."', ".$transac_id.", '{$data['supplier']}', NOW() )";

				$productResult = mysqli_query($conn,$insertProduct);

				if ($productResult) {
					
					$message = "Product Successfully Added.";
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