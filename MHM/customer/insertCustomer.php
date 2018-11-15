<?php

require("../database/sql_connect.php");
$recipient = $_POST['email'];
$recipientName = $_POST['username'];
//email initialization 
use PHPMailer\PHPMailer\PHPMailer;
require ("../phpmailer/vendor/autoload.php");
// $hash = md5( rand(0,1000) );
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPDebug = 2;
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "mhmcapstone2018@gmail.com";
$mail->Password = "password!!!123";
$mail->setFrom('mhmcapstone2018@gmail.com', 'MHM');
$mail->addReplyTo('mhmcapstone2018@gmail.com', 'MHM');
$mail->addAddress($recipient, $recipientName);
$mail->Subject = 'Welcome to MHM, '.$recipientName.'';
// $mail->msgHTML(file_get_contents('../vol_confirmation.php'), __DIR__);
$mail->isHTML(true);
	$mail->Body = '<img src="http://localhost/MHM/customer/image/2.png"> Welcome to Metro Health Management. You can now order in the system. <br> Enjoy Shopping!
				';
 if (empty($_POST["fname"]) || (!preg_match('/^[a-zA-Z ]*$/',$_POST["fname"]))) {
               $fnameErr = "First Name is required or it must contain letters ONLY";
          		 echo "<script type='text/javascript'>alert('$fnameErr');window.location='index.php';</script>";
}else if (empty($_POST["mname"]) || (!preg_match('/^[a-zA-Z ]*$/',$_POST["mname"]))) {
               $mnameErr = "Middle Name is required or it must contain letters ONLY";
          		 echo "<script type='text/javascript'>alert('$mnameErr');window.location='index.php';</script>";
}else if (empty($_POST["lname"]) || (!preg_match('/^[a-zA-Z ]*$/',$_POST["lname"]))) {
               $lnameErr = "Last Name is required or it must contain letters ONLY";
          		 echo "<script type='text/javascript'>alert('$lnameErr');window.location='index.php';</script>";
}else if (empty($_POST["username"])) {
               $usernameErr = "Username is required";
          		 echo "<script type='text/javascript'>alert('$usernameErr');window.location='index.php';</script>";
 
 }else{

 	$sql_u = "SELECT username FROM users WHERE username = '{$_POST["username"]}'";
 	$sql_e = "SELECT email FROM users WHERE email='{$_POST["email"]}'";
 	$res_u = mysqli_query($conn, $sql_u);
 	$res_e = mysqli_query($conn, $sql_e);
 	 	if (mysqli_num_rows($res_u) > 0) {
  	  $usernameErr = "Sorry... username already taken"; 	
  	  echo "<script type='text/javascript'>alert('$usernameErr');window.location='index.php';</script>";
	}else if(mysqli_num_rows($res_e) > 0){
  	  $emailErr = "Sorry... email already taken"; 	
  	   echo "<script type='text/javascript'>alert('$emailErr');window.location='index.php';</script>";
	}else{

		$query = "INSERT INTO address (street, brgy, city, province, zip_code)
			VALUES ('','','','','')";

	$insertAddress= mysqli_query($conn,$query);

	if ($insertAddress)
			 {
			 	$add_id = mysqli_insert_id($conn);
			 	$getPassword = sha1($_POST['pass']);
				$sql = "INSERT INTO `users`(user_type, fname, mname, lname, username, email, password, add_id) 
						VALUES 
						('customer', '{$_POST['fname']}', '{$_POST['mname']}', '{$_POST['lname']}', '{$_POST['username']}', '{$_POST['email']}', '{$getPassword}', ".$add_id.")";

				$result = mysqli_query($conn, $sql);
				
				if($result == true){
					
					$message = "You have successfully registered. Kindly login to access your account.";
			  	   echo "<script type='text/javascript'>alert('$message');window.location='index.php';</script>";
			  	   if (!$mail->send()) {
							echo "Mailer Error: " . $mail->ErrorInfo;
						} else {
							$message = "You have successfully registered. Kindly login to access your account.";
			  	   echo "<script type='text/javascript'>alert('$message');window.location='index.php';</script>";

									
						}
				}else{
					echo mysqli_error($conn);
					exit();
				}
			}
	
}
}

?>