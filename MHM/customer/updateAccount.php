<?php
require("../database/sql_connect.php");	

session_start();

$user_id = $_SESSION['user_id'];
if(isset($_POST['submit'])){
if (empty($_POST["fname"]) || (!preg_match('/^[a-zA-Z ]*$/',$_POST["fname"]))) {
               $fnameErr = "First Name is required or it must contain letters ONLY";
          		

}else if (empty($_POST["mname"]) || (!preg_match('/^[a-zA-Z ]*$/',$_POST["mname"]))) {
               $mnameErr = "Middle Name is required or it must contain letters ONLY";
          		 echo "<script type='text/javascript'>alert('$mnameErr');window.location='editAccount.php?user_id=".$user_id."';</script>";
}else if (empty($_POST["lname"]) || (!preg_match('/^[a-zA-Z ]*$/',$_POST["lname"]))) {
               $lnameErr = "Last Name is required or it must contain letters ONLY";
          		 echo "<script type='text/javascript'>alert('$lnameErr');window.location='editAccount.php?user_id=".$user_id."';</script>";
}else if (empty($_POST["username"])) {
               $usernameErr = "Username is required";
          		 echo "<script type='text/javascript'>alert('$usernameErr');window.location='editAccount.php?user_id=".$user_id."';</script>";
}else if (empty($_POST["contact"]) || (preg_match('/^[a-zA-Z ]*$/',$_POST["contact"]))) {
               $contactErr = "Contact Number is required or must containe numbers ONLY";
          		 echo "<script type='text/javascript'>alert('$contactErr');window.location='editAccount.php?user_id=".$user_id."';</script>";

 }else{
 
	$sql = "UPDATE users
		JOIN address
		ON users.add_id = address.add_id AND users.user_id
		SET 
			fname = '{$_POST['fname']}',
			mname = '{$_POST['mname']}',
			lname = '{$_POST['lname']}',
			username = '{$_POST['username']}',
			email = '{$_POST['email']}',
			contact = '{$_POST['contact']}',
			street = '{$_POST['street']}',
			brgy = '{$_POST['brgy']}',
			city = '{$_POST['city']}',
			province = '{$_POST['province']}',
			zip_code = '{$_POST['zip']}'
			WHERE user_id = '{$_POST['user_id']}'
			";

			$result = mysqli_query($conn, $sql);
			if($result){
				 $_SESSION['success'] = array("Successfully edited");
                header("Location:editAccount.php?user_id=".$user_id."");
			 // $message = "Successfully edited";
		  // 	   echo "<script type='text/javascript'>alert('$message');window.location='editAccount.php?user_id=".$user_id."';</script>";
			}else{
				echo mysqli_error($conn);
			}
		}
	
}


?>