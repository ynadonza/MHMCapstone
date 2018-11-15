<?php
require("../database/sql_connect.php");

//  session_start();
//    if(isset($_SESSION['user_id']))
//     {
//         header("location:userindex.php");
//     }
// else
// {
//     unset($_SESSION['user_id']);
// }
//  if (isset($_POST['login'])) {
//     function clean($str) {
//     $str = @trim($str);
//        if (get_magic_quotes_gpc()) {
//         $str = stripslashes($str);
//         }
//                                         // return mysqli_real_escape_string($str)
//     }
                  
//   $username = clean($_POST['username']);
//   $password = clean($_POST['password']);
//   $username = $_POST['username'];
//   $password = $_POST['password'];

//   $query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password' AND user_type = 'customer' ") or die(mysql_error());
//    $count = mysqli_num_rows($query);
//    $row = mysqli_fetch_array($query);
//    if ($count > 0) {
                                                                   
                                  
//    $_SESSION['user_id'] = $row['user_id'];
  

//   }  

session_start();
 if(isset($_SESSION['user_id']))
    {
        header("location:userindex.php");
    }
else
{
    unset($_SESSION['user_id']);
}
if(isset($_POST['username']) && isset($_POST['password'])){

$query = "SELECT * FROM users 
          WHERE username = '{$_POST['username']}' AND (user_type = 'customer')";
$result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 0){
          $error = "Username/Password is incorrect. Try again.";
        	  echo "<script type='text/javascript'>alert('$error');window.location='index.php';</script>";
         
    } else {

        $data = mysqli_fetch_array($result);
        
        if (sha1($_POST['password']) == $data['password']) {
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['fname'] = $data['fname'];
            $_SESSION['lname'] = $data['lname'];
            $_SESSION['login'] = "123654";
           
           	if($data == true){
				header("location:userindex.php");
			}else{
				echo mysqli_error($conn);
				exit();
			}
                
           
         
        }
      
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Metro Health Management</title>

 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


<!-- jQuery (necessary JavaScript plugins) -->

<!-- Custom Theme files -->
<link href="css2/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css2/half-slider.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="modal.css"> -->
	<link rel="stylesheet" type="text/css" href="wrapper.css">
	<link rel="shortcut icon" href="image/2.png" />
	
<!--//theme-style-->
<!-- <meta name="keywords" content="Furnyish Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" /> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
<!-- start menu -->
<link href="css2/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<!-- <script>$(document).ready(function(){$(".megamenu").megamenu();});</script> -->
<script src="js/menu_jquery.js"></script>
<script src="js/simpleCart.min.js"> </script>
  <script src="js/responsiveslides.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.1/js/formValidation.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.1/js/framework/bootstrap.min.js"></script>
 --><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



</head>
<!-- header -->
<style>
.has-error .checkbox,.has-error .checkbox-inline,.has-error .control-label,.has-error .help-block,.has-error .radio,.has-error .radio-inline,.has-error.checkbox label,.has-error.checkbox-inline label,.has-error.radio label,.has-error.radio-inline label{color:#a94442}
.has-error .form-control{border-color:#a94442;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075)}
.has-error .form-control:focus{border-color:#843534;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483;box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483}.has-error .input-group-addon{color:#a94442;background-color:#f2dede;border-color:#a94442}.has-error .form-control-feedback{color:#a94442}

.error {
  color: red;
  font-size: 0.8em;
}
.required {
	color: red;
}
</style>
<link rel="icon" type="image/png" href="image/iconimage.png">
<div class="top_bg">
	<div class="container">
		<div class="header_top-sec">
			<div class="top_right">
				<ul>
					
					<li><a href="contact.php">Contact</a></li>|
					<li><a href="aboutus.php">About Us</a></li>|
					<li><a data-toggle="modal" data-target="#myModal">Track Order</a></li>|
					<li><a href="indexRatings.php">Ratings</a></li>
				</ul>
			</div>
		
	
			<div class="container">
				<div class="top_left">
						
					<!-- Button trigger modal -->
					<!-- Button to Open the Modal -->
					<!-- LOGIN -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					  <font color="white"><b><i class="fa fa-sign-in"></i> LOGIN</b></a> </font> </button>

					<!-- The Modal -->
					<div class="modal fade" id="myModal">
					  <div class="modal-dialog">
					  	<div class="modal-content">
					  		<div class="modal-header">
			             	<h4>Login to Your Account</h4><br>
			                <button type="button" class="close" data-dismiss="modal"> &times;</button>
			                
			            	</div>
			            <div class="modal-body">
			             <form action="" method="post" class="form-inline">
							<div class="form-group">
			                       <input type="text" class="form-control input-sm" placeholder="Username" id="username" name="username">
			                    &nbsp;
			              	</div>
			              	 <div class="form-group">
			                         <input type="password" class="form-control input-sm" placeholder="Password" id="password" name="password">
			                    </div>
			                    
			                    <br>
			                    <br>
			                    <br>
			                    <div>
			                      &nbsp;<input type="submit" name="login" value="Login" class="btn btn-success btn-sm">
			                     
			                    </div>
			                    <br>
			                  </form>
							  <div>
								Doesn't have an account?<a href="#" data-toggle="modal" data-target="#register"> Register</a> <br> <a href="forgotPassword.php">Forgot Password?</a>
							  </div>
							</div>
						</div>
						</div>
						</div>
				
					
					<!-- REGISTER -->
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#register">
					  <font color="white"><b><i class="fa fa-plus-square"></i> Register</b></a> </font> </button>

					<div class="modal fade" id="register">
					  <div class="modal-dialog">
					  	<div class="modal-content">

						  	 <div class="modal-header">
				             	<h5><img src="image/add-user.png" width="30px" height="30px">Register</h5><br>
				                <button type="button" class="close" data-dismiss="modal"> &times;</button>
				                
				            </div>
						  	<div class="modal-body">
							
									<center><img src="image/2.png" width="100px" height="100px"></center> <br><br>
									<p style="color:red">* Required Fields </p>
								  <form action="insertCustomer.php" method="POST" id="newRegister">
								  	<div class="form-group">
										<b>First Name</b><span class="required">*</span><br><input type="text" id="fname" name="fname" placeholder="First Name" class="form-control" size="50"> 
									</div>
									<div class="form-group">
										<b>Middle Name</b><span class="required">*</span><br><input type="text" id="mname" name="mname" placeholder="Middle Name" size="50" class="form-control"> 
									</div>
									<div class="form-group">
										<b>Last Name</b><span class="required">*</span><br><input type="text" id="lname" name="lname" placeholder="Last Name"  size="50" class="form-control">
									</div>
									<div class="form-group">
										<b>Username</b><span class="required">*</span><br><input type="text" id="username" name="username" placeholder="Username" size="50" class="form-control"> 
										
									</div>
									<div class="form-group">
										<b>Email Address</b><span class="required">*</span><br><input type="email" id="email" name="email" placeholder="e.g. mhm@gmail.com" size="50" class="form-control">
									</div>
									<div class="form-group">
										<b>Password</b><span class="required">*</span><br><input type="password" id="pass" name="pass" pattern=".{6,}" placeholder="Password (6-12 Characters)" size="50" class="form-control"> 
									</div>
									<div class="form-group">
										<b>Re-type Password</b><span class="required">*</span><br><input type="password" id="pass2" name="pass2" placeholder="Re-type Password" size="50" class="form-control"> 
									</div>
									
									
				                   <div class="form-group">  
				                    <div class="checkbox">
				                    	<input type="checkbox" name="agree"> By creating an account you agree to our <a href="#" data-toggle="modal" data-target="#terms">Terms & Privacy</a>.<br>
				                    	<?php include("terms.php") ?>
				                    </div>
				                   </div>
				                    <div class="float-right">
				                       <input type="submit" name="submit" value="REGISTER" class="btn btn-success btn-sm">
				                      
				                    </div>
									
								  </form>
								  
								
							</div>
						</div>

					</div>
				</div>
			

				</div>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>

<div class="header_top">
	 <div class="container">
	
		 <div class="logo">
		 	<a href="index.php"><img src="image/2.png" alt=""></a>		

		 </div>
		 <div class="header_right">	
			 <div class="cart box_1">
				
				<h3>
				
				(<span>0</span> items)<img src="image/bag.png" alt=""></h3>
				</a>	
				<p></p>
				<div class="clearfix"> </div>
			 </div>	
		 </div>
	</div>
		  <div class="clearfix"></div>	
</div>	

<script>
	
//fname, mname, lname validation
jQuery.validator.addMethod("lettersonly", function(value, element) {
return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "No numbers allowed");

//password validation
jQuery.validator.addMethod("passwordMatch", function(value, element) {
    
    // The two password inputs
    var pass = $("#pass").val();
    var pass2 = $("#pass2").val();

    // Check for equality with the password inputs
    if (pass == pass2) {
        return true;
    } else {
        return false;
    }

}, "Your Passwords Must Match");

$("#register form").validate({
	rules: {
		fname: {
			
			required: true,
			lettersonly: true
		},
		mname: {
			required: true,
			lettersonly: true
		},
		lname: {
			required: true,
			lettersonly: true
		},
		username: {
			required: true,

		},
		email: {
			required: true,
			email: true
		},
		pass: {
			required: true,
			maxlength: 12,
			minlength: 6,
		},
		pass2: {
			required: true,
			maxlength: 12,
			minlength: 6,
			passwordMatch: true
			
		},
		agree: {
			required: true,
			
		},
		
	},
// Custom message for error
	messages: {
		fname: {
			required: "You must enter your first name",
			lettersonly: "No special characters"
		}

	},
	messages: {
		mname: {
			required: "You must enter your middle name",
			lettersonly: "No special characters"
		}
	},
	messages: {
		lname: {
			required: "You must enter your last name",
			lettersonly: "No special characters"
		}
	},
	messages: {
		username: {
			required: "You must enter your username",
			
		}
	},
	messages: {
		email: {
			required: "You must enter your email address",
		}
	},
	messages: {
		pass: {
			required: "You must enter your password. It must contain 6-12 characters",
		}
	},
	messages: {
		pass2: {
			required: "You must re-type your password",
			passwordMatch: "Your passwords must match"
		}
	},
	messages: {
		agree: {
			required: "Please check the box"
		}
	},
	
	highlight: function(element, errorClass) {
		$(element).closest(".form-group").addClass("has-error");
	},
	unhighlight: function(element, errorClass) {
		$(element).closest(".form-group").removeClass("has-error");
	},
	errorPlacement: function (error, element) {
		error.appendTo(element.parent().next());
	},
	errorPlacement: function (error, element) {
		if(element.attr("type") == "checkbox") {
			element.closest(".form-group").children(0).prepend(error);
		}
		else
			error.insertAfter(element);
	}
});
</script>