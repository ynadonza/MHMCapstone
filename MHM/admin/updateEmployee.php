<?php
require('../database/sql_connect.php');

$checkEmail = "SELECT * FROM users JOIN address ON users.add_id = address.add_id WHERE user_id = '{$_POST['user_id']}' ";

$checkRes = mysqli_query($conn,$checkEmail);
if (!$checkRes) {
	echo mysqli_error($conn);
} else {
	$data = mysqli_fetch_assoc($checkRes);
}

/*echo "<pre>";
print_r($_POST);
print_r($data);
echo "</pre>";*/

if (isset($_POST['submit'])) {
	
	$error = array();

	//Validate firstname
  	if (empty($_POST['fname']) || strlen(trim($_POST['fname'])) == 0) {
    	$error['fname'] = "Firstname is required";
    	echo "<script type='text/javascript'>alert('".$error['fname']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if (!preg_match('/^[a-zA-Z. ]*$/',$_POST["fname"])) {
	    $error['fname'] = "Firstname should not have special characters";
	    echo "<script type='text/javascript'>alert('".$error['fname']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	}

	//Validate middle name
  	if (empty($_POST['mname']) || strlen(trim($_POST['mname'])) == 0) {
    	$error['mname'] = "Last name is required";
    	echo "<script type='text/javascript'>alert('".$error['mname']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if (!preg_match('/^[a-zA-Z. ]*$/',$_POST["mname"])) {
	    $error['mname'] = "Firstname should not have special characters";
	    echo "<script type='text/javascript'>alert('".$error['mname']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	}

	//Validate last name
	if (empty($_POST['lname']) || strlen(trim($_POST['lname'])) == 0) {
    	$error['lname'] = "Last name is required";
    	echo "<script type='text/javascript'>alert('".$error['lname']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if (!preg_match('/^[a-zA-Z. ]*$/',$_POST["lname"])) {
	    $error['lname'] = "Firstname should not have special characters";
	    echo "<script type='text/javascript'>alert('".$error['lname']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	}

	//Validate email
	if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$error['email'] = "Email is required and should be in an email format";
        echo "<script type='text/javascript'>alert('".$error['email']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else {
		if (strcmp($_POST['email'], $data['email'])!=0) {
			$checkEmailResult = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$_POST['email']}' AND user_type = 'employee' ");
			if (!$checkEmailResult) {
				echo mysqli_error($conn);
			} else {
				$countEmail = mysqli_num_rows($checkEmailResult);
				echo $countEmail;
				if ($countEmail==1) {
					$error['email'] = "Email is already taken";
        			echo "<script type='text/javascript'>alert('".$error['email']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
				}
			}
		}	
	}

	//Validate Username
	if (empty($_POST['username']) || strlen(trim($_POST['username'])) == 0) {
		$error['username'] = "Street address is required and should not consist of white spaces only";
	    echo "<script type='text/javascript'>alert('".$error['username']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else {
		if (strcmp($_POST['username'], $data['username'])!=0) {
			$checkUsernameResult = mysqli_query($conn,"SELECT * FROM users WHERE username = '{$_POST['username']}' AND user_type = 'employee' ");
			if (!$checkEmailResult) {
				echo mysqli_error($conn);
			} else {
				$countUsername = mysqli_num_rows($checkEmailResult);
				if ($countUsername==2) {
					$error['username'] = "Username is already taken";
        			echo "<script type='text/javascript'>alert('".$error['username']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
				}
			}
		}
		
	}

	//check contact number
	$length = strlen($_POST['contact']);
	if (empty($_POST['contact']) || !ctype_digit($_POST['contact']) || strlen(trim($_POST['contact'])) == 0) { 
    	$error['contact'] = "Contact number is required and should contain numbers ONLY";
        echo "<script type='text/javascript'>alert('".$error['contact']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if ($length!=11) {
    	$error['contact'] = "Contact number should be 11 digits ONLY";
        echo "<script type='text/javascript'>alert('".$error['contact']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	}

	//Validate street
	if (empty($_POST['street']) || strlen(trim($_POST['street'])) == 0) {
		$error['street'] = "Street address is required and should not consist of white spaces only";
	    echo "<script type='text/javascript'>alert('".$error['street']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if (!preg_match('/^[ a-zA-Z0-9.-]+$/',$_POST['street'])) {
	    $error['street'] = "Invalid character for an address";
	    echo "<script type='text/javascript'>alert('".$error['street']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if (strlen($_POST['street'])<5) {
		$error['street'] = "Street address should be atleast 5 characters";
	    echo "<script type='text/javascript'>alert('".$error['street']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	}

	//Validate barangay
	if (empty($_POST['brgy']) || strlen(trim($_POST['brgy'])) == 0) {
		$error['brgy'] = "Barangay is required and should not be consist of white spaces only";
	    echo "<script type='text/javascript'>alert('".$error['brgy']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if (!preg_match('/^[ a-zA-Z0-9.-]+$/',$_POST['brgy'])) {
	    $error['brgy'] = "Invalid character for an address";
	    echo "<script type='text/javascript'>alert('".$error['brgy']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if (strlen($_POST['brgy'])<4) {
		$error['brgy'] = "Barangay address should be atleast 4 characters";
	    echo "<script type='text/javascript'>alert('".$error['brgy']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	}

	//Validate city
	if (empty($_POST['city']) || strlen(trim($_POST['city'])) == 0) {
		$error['city'] = "City is required and should not be consist of white spaces only";
	    echo "<script type='text/javascript'>alert('".$error['city']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if (!preg_match('/^[ a-zA-Z,-]+$/',$_POST['city'])) {
	    $error['city'] = "Invalid character for an address";
	    echo "<script type='text/javascript'>alert('".$error['city']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if (strlen($_POST['city'])<4) {
		$error['city'] = "City address should be atleast 4 characters";
	    echo "<script type='text/javascript'>alert('".$error['city']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	}

	//Validate province
	if (empty($_POST['province']) || strlen(trim($_POST['province'])) == 0) {
		$error['province'] = "Province is required and should not be consist of white spaces only";
	    echo "<script type='text/javascript'>alert('".$error['province']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if (!preg_match('/^[ a-zA-Z]+$/',$_POST['province'])) {
	    $error['province'] = "Invalid character for an address";
	    echo "<script type='text/javascript'>alert('".$error['province']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if (strlen($_POST['province'])<4) {
		$error['province'] = "Province address should be atleast 4 characters";
	    echo "<script type='text/javascript'>alert('".$error['province']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	}

	//Validate zip code
	if (empty($_POST['zip']) || strlen(trim($_POST['zip'])) == 0) {
		$error['zip'] = "Zip Code is required and should not be consist of white spaces only";
	    echo "<script type='text/javascript'>alert('".$error['zip']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	} else if (!ctype_digit($_POST['zip']) || strlen($_POST['zip'])!=4) {
		$error['zip'] = "Zip Code must be a number and must be 4 digits only";
	    echo "<script type='text/javascript'>alert('".$error['zip']."');window.location='editEmployeeAdd.php?user_id=".$_POST['user_id']."';</script>";
	}


	$count = count($error);

	if ($count==0) {
		
		$query = "UPDATE `address` SET `street`='{$_POST['street']}', `brgy`='{$_POST['brgy']}',`city`='{$_POST['city']}',
					`province`='{$_POST['province']}',`zip_code`='{$_POST['zip']}' WHERE add_id = '{$data['add_id']}' ";

		$result = mysqli_query($conn,$query);

		if ($result) {
			$updatePersonalInfo = "UPDATE users
								  SET 
								  fname='{$_POST['fname']}', 
								  mname='{$_POST['mname']}', 
								  lname='{$_POST['lname']}', 
								  username = '{$_POST['username']}',
								  email='{$_POST['email']}',
								  contact='{$_POST['contact']}'
								 WHERE user_id = '{$_POST['user_id']}' ";
			$updateResult = mysqli_query($conn,$updatePersonalInfo);
			if ($updateResult) {
				header('location:employee.php');
			} else {
				echo mysqli_error($conn);
			}
		} else {
			echo mysqli_error($conn);
		}
	}
}

?>