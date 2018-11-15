<?php require("../database/sql_connect.php");

if (isset($_POST['submit'])) {
	
	$error = array();
	$message = array();

	//check company name
	if (empty($_POST['supplier']) || strlen(trim($_POST['supplier'])) == 0) {
		$message['supplier'] = "Comapany name is required";
        echo "<script type='text/javascript'>alert('".$message['supplier']."');window.location='supplier.php';</script>";
        exit();
	} else {
		if (!preg_match('/^[a-zA-Z.& ]*$/',$_POST["supplier"])) {
			$message['supplier'] = "Comapany name must contain letters ONLY";
        	echo "<script type='text/javascript'>alert('".$message['supplier']."');window.location='supplier.php';</script>";
        	exit();
		} else {
			$error['supplier'] = $_POST["supplier"];
		}
	}
	
	//check email
	if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$message['email'] = "Email is required and should be in an email format";
        echo "<script type='text/javascript'>alert('".$message['email']."');window.location='supplier.php';</script>";
        exit();
	} else {
		$error['email'] = $_POST['email'];
	}

	//check contact number
	$length = strlen($_POST['contact']);
	if (empty($_POST['contact']) || !ctype_digit($_POST['contact']) || strlen(trim($_POST['contact'])) == 0) { 
    	$message['contact'] = "Contact number is required and should contain numbers ONLY";
        echo "<script type='text/javascript'>alert('".$message['contact']."');window.location='supplier.php';</script>";
        exit();
	} else if ($length!=11) {
    	$message['contact'] = "Contact number should be 11 digits ONLY";
        echo "<script type='text/javascript'>alert('".$message['contact']."');window.location='supplier.php';</script>";
        exit();
	} else {
		$error['contact'] = $_POST['contact'];	
	}

	//check street address
	if (empty($_POST['street']) || strlen(trim($_POST['street'])) == 0) {
		$message['street'] = "Supplier's street address is REQUIRED";
        echo "<script type='text/javascript'>alert('".$message['street']."');window.location='supplier.php';</script>";
        exit();
	} else {
		$error['street'] = $_POST['street'];
	}

	//check brgy address
	if (empty($_POST['brgy']) || strlen(trim($_POST['brgy'])) == 0) {
		$message['brgy'] = "Your barangay address is REQUIRED";
        echo "<script type='text/javascript'>alert('".$message['brgy']."');window.location='supplier.php';</script>";
        exit();
	} else {
		$error['brgy'] = $_POST['brgy'];
	}

	//check city address
	if (empty($_POST['city']) || strlen(trim($_POST['city'])) == 0) {
		$message['city'] = "Your city address is REQUIRED";
        echo "<script type='text/javascript'>alert('".$message['city']."');window.location='supplier.php';</script>";
        exit();
	} else {
		$error['city'] = $_POST['city'];
	}

	//check province address
	if (empty($_POST['province']) || strlen(trim($_POST['province'])) == 0) {
		$message['province'] = "Your city address is REQUIRED";
        echo "<script type='text/javascript'>alert('".$message['province']."');window.location='supplier.php';</script>";
        exit();
	} else {
		$error['province'] = $_POST['province'];
	}

	//check zip code
	$zip_length = strlen($_POST['zip']);
	if (empty($_POST['zip']) || !ctype_digit($_POST['zip'])) {
		$message['zip'] = "Your Zip Code or Postal ID is required and must contain numbers ONLY";
        echo "<script type='text/javascript'>alert('".$message['zip']."');window.location='supplier.php';</script>";
	} else if ($zip_length != 4) {
		$message['zip'] = "Your Zip Code or Postal ID is REQUIRED";
        echo "<script type='text/javascript'>alert('".$message['zip']."');window.location='supplier.php';</script>";
	} else {
		$error['zip'] = $_POST['zip'];
	}
}

$count = count($message);

if ($count == 0) {

$address = "INSERT INTO address (street, brgy, city, province, zip_code)
			VALUES ('{$error['street']}', '{$error['brgy']}', '{$error['city']}','{$error['province']}', '{$error['zip']}')";

$addAddress = mysqli_query ($conn, $address);

if ($addAddress) {
	
	$add_id = mysqli_insert_id($conn);

	$sql = "INSERT INTO suppliers (company_name, email, contact, add_id)
			VALUES ('{$error['supplier']}', '{$error['email']}', '{$error['contact']}', ".$add_id.")";

	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		$message = "New supplier successfully added";
        echo "<script type='text/javascript'>alert('".$message."');window.location='supplier.php';</script>"; 
	} else {
		echo mysqli_error($conn);
		exit();
	}
}
	
} else {

	$failed = "Failed to insert data!";
    echo "<script type='text/javascript'>alert('".$failed."');window.location='supplier.php';</script>";

}



?>

