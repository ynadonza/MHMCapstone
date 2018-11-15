<?php require("../database/sql_connect.php");

echo "<pre>";
print_r($_POST);
echo "</pre>";



if (isset($_POST['submit'])) {
	
	$error = array();

	//Validate firstname
  	if (empty($_POST['fname']) || strlen(trim($_POST['fname'])) == 0) {
    	$error['fname'] = "Firstname is required";
    	echo "<script type='text/javascript'>alert('".$error['fname']."');window.location='addEmployee.php';</script>";
	} else if (!preg_match('/^[a-zA-Z. ]*$/',$_POST["fname"])) {
	    $error['fname'] = "Firstname should not have special characters";
	    echo "<script type='text/javascript'>alert('".$error['fname']."');window.location='addEmployee.php';</script>";
	} 

	//Validate middle name
  	if (empty($_POST['mname']) || strlen(trim($_POST['mname'])) == 0) {
    	$error['mname'] = "Last name is required";
    	echo "<script type='text/javascript'>alert('".$error['mname']."');window.location='addEmployee.php';</script>";
	} else if (!preg_match('/^[a-zA-Z. ]*$/',$_POST["mname"])) {
	    $error['mname'] = "Firstname should not have special characters";
	    echo "<script type='text/javascript'>alert('".$error['mname']."');window.location='addEmployee.php';</script>";
	}

	//Validate last name
	if (empty($_POST['lname']) || strlen(trim($_POST['lname'])) == 0) {
    	$error['lname'] = "Last name is required";
    	echo "<script type='text/javascript'>alert('".$error['lname']."');window.location='addEmployee.php';</script>";
	} else if (!preg_match('/^[a-zA-Z. ]*$/',$_POST["lname"])) {
	    $error['lname'] = "Firstname should not have special characters";
	    echo "<script type='text/javascript'>alert('".$error['lname']."');window.location='addEmployee.php';</script>";
	}
	
	//Validate email
	if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$error['email'] = "Email is required and should be in an email format";
        echo "<script type='text/javascript'>alert('".$error['email']."');window.location='addEmployee.php';</script>";
	} else {
		$checkEmailResult = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$_POST['email']}' AND user_type = 'employee' ");
		if (!$checkEmailResult) {
			echo mysqli_error($conn);
		} else {
			$countEmail = mysqli_num_rows($checkEmailResult);
			if ($countEmail!=0) {
				$error['email'] = "Email is already taken";
        		echo "<script type='text/javascript'>alert('".$error['email']."');window.location='addEmployee.php';</script>";
			}
		}
	}

	//Validate Username
	if (empty($_POST['username']) || strlen(trim($_POST['username'])) == 0) {
		$error['username'] = "Street address is required and should not consist of white spaces only";
	    echo "<script type='text/javascript'>alert('".$error['username']."');window.location='addEmployee.php';</script>";
	} else {
		$checkUsernameResult = mysqli_query($conn,"SELECT * FROM users WHERE username = '{$_POST['username']}' AND user_type = 'employee' ");
		if (!$checkEmailResult) {
			echo mysqli_error($conn);
		} else {
			$countUsername = mysqli_num_rows($checkEmailResult);
			if ($countUsername!=0) {
				$error['username'] = "Username is already taken";
        		echo "<script type='text/javascript'>alert('".$error['username']."');window.location='addEmployee.php';</script>";
			}
		}
	}

	//Validate password
	if (empty($_POST['password'])) { 
    	$error['password'] = "Password is required";
        echo "<script type='text/javascript'>alert('".$error['password']."');window.location='addEmployee.php';</script>";
	} else if (strlen($_POST['password'])<6 || strlen($_POST['password'])>12) {
    	$error['contact'] = "Password should be 6 to 12 characters only";
        echo "<script type='text/javascript'>alert('".$error['contact']."');window.location='addEmployee.php';</script>";
	}


	//check contact number
	$length = strlen($_POST['contact']);
	if (empty($_POST['contact']) || !ctype_digit($_POST['contact']) || strlen(trim($_POST['contact'])) == 0) { 
    	$error['contact'] = "Contact number is required and should contain numbers ONLY";
        echo "<script type='text/javascript'>alert('".$error['contact']."');window.location='addEmployee.php';</script>";
	} else if ($length!=11) {
    	$error['contact'] = "Contact number should be 11 digits ONLY";
        echo "<script type='text/javascript'>alert('".$error['contact']."');window.location='addEmployee.php';</script>";
	}

	//Validate street
	if (empty($_POST['street']) || strlen(trim($_POST['street'])) == 0) {
		$error['street'] = "Street address is required and should not consist of white spaces only";
	    echo "<script type='text/javascript'>alert('".$error['street']."');window.location='addEmployee.php';</script>";
	} else if (!preg_match('/^[ a-zA-Z0-9.-]+$/',$_POST['street'])) {
	    $error['street'] = "Invalid character for an address";
	    echo "<script type='text/javascript'>alert('".$error['street']."');window.location='addEmployee.php';</script>";
	} else if (strlen($_POST['street'])<5) {
		$error['street'] = "Street address should be atleast 5 characters";
	    echo "<script type='text/javascript'>alert('".$error['street']."');window.location='addEmployee.php';</script>";
	}

	//Validate barangay
	if (empty($_POST['brgy']) || strlen(trim($_POST['brgy'])) == 0) {
		$error['brgy'] = "Barangay is required and should not be consist of white spaces only";
	    echo "<script type='text/javascript'>alert('".$error['brgy']."');window.location='addEmployee.php';</script>";
	} else if (!preg_match('/^[ a-zA-Z0-9.-]+$/',$_POST['brgy'])) {
	    $error['brgy'] = "Invalid character for an address";
	    echo "<script type='text/javascript'>alert('".$error['brgy']."');window.location='addEmployee.php';</script>";
	} else if (strlen($_POST['brgy'])<4) {
		$error['brgy'] = "Barangay address should be atleast 4 characters";
	    echo "<script type='text/javascript'>alert('".$error['brgy']."');window.location='addEmployee.php';</script>";
	}

	//Validate city
	if (empty($_POST['city']) || strlen(trim($_POST['city'])) == 0) {
		$error['city'] = "City is required and should not be consist of white spaces only";
	    echo "<script type='text/javascript'>alert('".$error['city']."');window.location='addEmployee.php';</script>";
	} else if (!preg_match('/^[ a-zA-Z,-]+$/',$_POST['city'])) {
	    $error['city'] = "Invalid character for an address";
	    echo "<script type='text/javascript'>alert('".$error['city']."');window.location='addEmployee.php';</script>";
	} else if (strlen($_POST['city'])<4) {
		$error['city'] = "City address should be atleast 4 characters";
	    echo "<script type='text/javascript'>alert('".$error['city']."');window.location='addEmployee.php';</script>";
	}

	//Validate province
	if (empty($_POST['province']) || strlen(trim($_POST['province'])) == 0) {
		$error['province'] = "Province is required and should not be consist of white spaces only";
	    echo "<script type='text/javascript'>alert('".$error['province']."');window.location='addEmployee.php';</script>";
	} else if (!preg_match('/^[ a-zA-Z]+$/',$_POST['province'])) {
	    $error['province'] = "Invalid character for an address";
	    echo "<script type='text/javascript'>alert('".$error['province']."');window.location='addEmployee.php';</script>";
	} else if (strlen($_POST['province'])<4) {
		$error['province'] = "Province address should be atleast 4 characters";
	    echo "<script type='text/javascript'>alert('".$error['province']."');window.location='addEmployee.php';</script>";
	}

	//Validate zip code
	if (empty($_POST['zip']) || strlen(trim($_POST['zip'])) == 0) {
		$error['zip'] = "Zip Code is required and should not be consist of white spaces only";
	    echo "<script type='text/javascript'>alert('".$error['zip']."');window.location='addEmployee.php';</script>";
	} else if (!ctype_digit($_POST['zip']) || strlen($_POST['zip'])!=4) {
		$error['zip'] = "Zip Code must be a number and must be 4 digits only";
	    echo "<script type='text/javascript'>alert('".$error['zip']."');window.location='addEmployee.php';</script>";
	}

	$count = count($error);

	if ($count==0) {

		$address = "INSERT INTO address (street, brgy, city, province, zip_code) 
					VALUES ('{$_POST['street']}', '{$_POST['brgy']}', '{$_POST['city']}', '{$_POST['province']}', '{$_POST['zip']}')";
		$addAddress = mysqli_query ($conn, $address);
	
		if ($addAddress) {
		 
			$add_id = mysqli_insert_id($conn);

			$getPassword = sha1($_POST['password']);
			
			$sql = "INSERT INTO `users`(user_type, fname, mname, lname, username, email, password, contact, add_id) 
						VALUES  ('employee', '{$_POST['fname']}', '{$_POST['mname']}', '{$_POST['lname']}', '{$_POST['username']}', '{$_POST['email']}', '{$getPassword}',
							'{$_POST['contact']}', ".$add_id.")";

			$result = mysqli_query($conn, $sql);

			if($result == true){
				header("location:employee.php");
			}else{
				echo mysqli_error($conn);
				exit();
			}
		}

	}
	
	


}




?>

