<?php
require("../database/sql_connect.php");
require("../session.php");

$query = "SELECT * FROM suppliers JOIN address ON suppliers.add_id = address.add_id WHERE supplier_id = '{$_POST['supplier_id']}'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
$i = 0;
$changes = array();
$message = array();

	// check company name
	if (!empty($_POST["supplier"])) {
		if (!preg_match('/^[a-zA-Z.& ]*$/',$_POST["supplier"]) || strlen(trim($_POST['supplier'])) == 0) {
			$message['supplier'] = "Comapany name is required and it must contain letters ONLY";
        	echo "<script type='text/javascript'>alert('".$message['supplier']."');window.location='editSuppliers.php?supplier_id=".$data['supplier_id']." ';</script>";
		} 
		if (strcmp($_POST['supplier'], $data['company_name'])==0) {
 			$changes['supplier'] = $data['company_name'];
 		} else {
 			$changes['supplier'] = $_POST['supplier'];
 			$i = 1;
 		}	
	} else {
		$changes['supplier'] = $data['company_name'];
	}
 	
	//check email
	if (!empty($_POST['email'])) {
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$message['email'] = "Email is required and should be in an email format";
        	echo "<script type='text/javascript'>alert('".$message['email']."');window.location='editSuppliers.php?supplier_id=".$data['supplier_id']." ';</script>";
		}
		if (strcmp($_POST['email'], $data['email'])==0) {
 			$changes['email'] = $data['email'];
 		} else {
 			$changes['email'] = $_POST['email'];
 			$i = 1;
		}
	} else {
		$changes['email'] = $data['email'];
	} 

	//check contact
	if (!empty($_POST['contact'])) {
		$length = strlen($_POST['contact']);
		if (!ctype_digit($_POST['contact']) || strlen(trim($_POST['contact'])) == 0) { 
    		$message['contact'] = "Contact number is required and should contain numbers ONLY";
        	echo "<script type='text/javascript'>alert('".$message['contact']."');window.location='editSuppliers.php?supplier_id=".$data['supplier_id']." ';</script>";
		}  
		if ($length!=11) {
    		$message['contact'] = "Contact number should be 11 digits ONLY";
        	echo "<script type='text/javascript'>alert('".$message['contact']."');window.location='editSuppliers.php?supplier_id=".$data['supplier_id']." ';</script>";
		} 
		if (strcmp($_POST['contact'], $data['contact']) == 0) {
			$changes['contact'] =  $data['contact'];
		} else {
			$changes['contact'] = $_POST['contact'];
			$i = 1;
		}
	} else {
		$changes['contact'] =  $data['contact'];
	}
	
	// check street
	if (!empty($_POST['street'])) {
		if (strlen(trim($_POST['street'])) == 0) {
			$message['street'] = "Your street address is REQUIRED";
        	echo "<script type='text/javascript'>alert('".$message['street']."');window.location='editSuppliers.php?supplier_id=".$data['supplier_id']." ';</script>";
		}
		if (strcmp($_POST['street'], $data['street']) == 0) {
			$changes['street'] =  $data['street'];
		} else {
			$changes['street'] = $_POST['street'];
			$i = 1;
		}
	} else {
		$changes['street'] =  $data['street'];
	}
	
	// check brgy
	if (!empty($_POST['brgy'])) {
		if (strlen(trim($_POST['brgy'])) == 0) {
			$message['brgy'] = "Your barangay address is REQUIRED";
        	echo "<script type='text/javascript'>alert('".$message['brgy']."');window.location='editSuppliers.php?supplier_id=".$data['supplier_id']." ';</script>";
		}
		if (strcmp($_POST['brgy'], $data['brgy']) == 0) {
			$changes['brgy'] =  $data['brgy'];
		} else {
			$changes['brgy'] = $_POST['brgy'];
			$i = 1;
		}
	} else {
		$changes['brgy'] =  $data['brgy'];
	}
	
	// check city
	if (!empty($_POST['city'])) {
		if (strlen(trim($_POST['city'])) == 0) {
			$message['city'] = "Your city address is REQUIRED";
        	echo "<script type='text/javascript'>alert('".$message['city']."');window.location='editSuppliers.php?supplier_id=".$data['supplier_id']." ';</script>";
		}
		if (strcmp($_POST['city'], $data['city']) == 0) {
			$changes['city'] =  $data['city'];
		} else {
			$changes['city'] = $_POST['city'];
			$i = 1;
		}
	} else {
		$changes['city'] =  $data['city'];
	}

	// check province
	if (!empty($_POST['province'])) {
		if (strlen(trim($_POST['province'])) == 0) {
			$message['province'] = "Your province address is REQUIRED";
        	echo "<script type='text/javascript'>alert('".$message['province']."');window.location='editSuppliers.php?supplier_id=".$data['supplier_id']." ';</script>";
		} 
		if (empty($_POST['province']) || strcmp($_POST['province'], $data['province']) == 0) {
			$changes['province'] =  $data['province'];
		} else {
			$changes['province'] = $_POST['province'];
			$i = 1;
		}
	} else {
		$changes['province'] =  $data['province'];
	}

	// check zip code
	if (!empty($_POST['zip'])) {
		$zip_length = strlen($_POST['zip']);
		if (!ctype_digit($_POST['zip']) || strlen(trim($_POST['zip'])) == 0) {
			$message['zip'] = "Your Zip Code or Postal ID is required and must contain numbers ONLY";
        	echo "<script type='text/javascript'>alert('".$message['zip']."');window.location='editSuppliers.php?supplier_id=".$data['supplier_id']." ';</script>";
		} 
		if ($zip_length!=4) {
			$message['zip'] = "Zip code or Postal ID should be 4 digits ONLY";
        	echo "<script type='text/javascript'>alert('".$message['zip']."');window.location='editSuppliers.php?supplier_id=".$data['supplier_id']." ';</script>";
		}
		if (strcmp($_POST['zip'], $data['zip_code']) == 0) {
			$changes['zip'] =  $data['zip_code'];
		} else {
			$changes['zip'] = $_POST['zip'];
			$i = 1;
		}
	} else {
		$changes['zip'] =  $data['zip_code'];
	}

	$updateSupplierResults = "UPDATE suppliers JOIN address on suppliers.add_id = address.add_id
 			SET company_name = '{$changes['supplier']}',
 				email = '{$changes['email']}',
 				contact = '{$changes['contact']}',
 				street ='{$changes['street']}',
 				brgy ='{$changes['brgy']}',
 				city ='{$changes['city']}',
 				province ='{$changes['province']}',
 				zip_code ='{$changes['zip']}'
 				WHERE supplier_id = '{$_POST['supplier_id']}'";
 			
 	$updateResults = mysqli_query($conn,$updateSupplierResults);

 	if ($updateResults) {
 		
 				header ("location:supplier.php");
 		
 	}

}

?>