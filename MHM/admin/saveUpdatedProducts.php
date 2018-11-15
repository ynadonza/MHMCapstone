<?php
require("../database/sql_connect.php");
require("../session.php");

/*$query = "SELECT company_name,suppliers.supplier_id,type,sub_category,prod_name,qty,unit_price,selling_price,description,photo 
			FROM products 
			JOIN suppliers
			ON products.supplier_id = suppliers.supplier_id 
			WHERE prod_id = '{$_POST['prod_ID']}' ";*/



$query = "SELECT * FROM products WHERE prod_id = '{$_GET['id']}' ";

$result = mysqli_query($conn,$query);

$data = mysqli_fetch_assoc($result);


if (isset($_POST['SUBMIT'])) {
	$i = 0;
	$changes = array();

	// check supplier
	if (isset($_POST['addSupplier'])) {
		$changes['addSupplier'] = $_POST['addSupplier'];
	} else {
		$changes['addSupplier'] = $data['supplier_id'];
	}

	//check product type
	if (isset($_POST['productType'])) {
		$changes['productType'] = $_POST['productType'];
	} else {
		$changes['productType'] = $data['type'];
	}

	//check sub-category
	if (isset($_POST['productType'])) {
		$changes['sub_category'] = $_POST['sub_category'];
	} else {
		$changes['sub_category'] = $data['sub_category'];
	}

	//check product name
	if (empty($_POST['prod_name']) || strlen(trim($_POST['prod_name']))==0) {
		$changes['prod_name'] =  $data['prod_name'];
	} else {
		$changes['prod_name'] = $_POST['prod_name'];
	}
	
	//check description
	if (empty($_POST['desc']) || strlen(trim($_POST['desc']))==0) {
		$changes['desc'] =  $data['description'];
	} else {
		$changes['desc'] = $_POST['desc'];
	}

	echo "<pre>";
	print_r($changes);
	echo "</pre>";

	$changes['photo'] = NULL;
	if (isset($_FILES['prodPhoto']) && count($_FILES['prodPhoto']) > 4) {
		if ($_FILES['prodPhoto']['type'] == "image/png" || $_FILES['prodPhoto']['type'] == "image/jpeg" || $_FILES['prodPhoto']['type'] == "image/jpg" ) {
			if ($_FILES['prodPhoto']['size'] <= 10000000) {
				$changes['photo'] = "prod_images/".$_FILES['prodPhoto']['name'];
				move_uploaded_file($_FILES['prodPhoto']['tmp_name'], $changes['photo']);
			} 
		}
	}

	/*echo "<pre>";
	print_r($changes);
	echo "</pre>";*/

	$updateProducts = "UPDATE products
 			SET prod_name = '{$changes['prod_name']}',
 				type = '{$changes['productType']}',
 				sub_category = '{$changes['sub_category']}', 
 				description = '{$changes['desc']}'";
		
			if($changes['photo']!=NULL) {
 				$updateProducts .=" ,photo='{$changes['photo']}'";
 				$i = 1;	
			}
 	
 	$updateProducts .= " ,supplier_id = '{$changes['addSupplier']}'  WHERE prod_id={$_GET['id']}";

 	$updateResults = mysqli_query($conn,$updateProducts);
	
	if ($updateResults) {
		header("location:products.php");
	} else {
		echo mysqli_error($conn);
	}
 	
}



?>