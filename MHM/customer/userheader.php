<?php 
require ("../database/sql_connect.php");


require("session.php"); 


@$action = $_REQUEST['action'];
	if($action == "empty"){
	unset($_SESSION['prod_cart']);
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

<link href="css2/bootstrap.css" rel='stylesheet' type='text/css' />
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
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
<!-- start menu -->
<link href="css2/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/menu_jquery.js"></script>
<script src="js/simpleCart.min.js"> </script>
 <!--  <script src="js/responsiveslides.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>

  

<style>
.dropbtn {
    background-color: #0f266b;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: 2px;
    cursor: pointer;
    border-color: #000000;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: #007bff;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    border:3px;
    border-color: #000000;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    border: 2px;
    border-color: #000000;
}

.dropdown-content a:hover {background-color: #0f266b;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #0f266b;}
</style>
  
</head>
					
<!-- header -->
<link rel="icon" type="image/png" href="images/iconimage.png">
<style type="text/css">
	@media screen and (max-width: 600px){
		.logo{
			height: 50px;
			width: 120px;
		}
	}
</style>

<div class="top_bg">
	<div class="container">
		<div class="header_top-sec">
			<div class="top_right">
				<ul>
					<!-- <li><a href="#">help</a></li>| -->
					<li><a href="usercontact.php">Contact</a></li>|
					<li><a href="useraboutus.php">About Us</a></li>|
					<li><a href="orders.php">Track Order</a></li>|
					<li><a href="userRatings.php">Ratings</a>
					</li>
				</ul>
			</div>
			<div class="top_left">
			<ul>
				<li>
				<div class="dropdown" style="float:right;">
					<?php
                $user_query = mysqli_query($conn,"SELECT * FROM users WHERE user_id='$user_id'") or die(mysql_error());
                $row = mysqli_fetch_array($user_query);
                echo " <h5 style='color:white;''>Welcome  ".$row['fname']."!";
                ?>
				
				   <i class="fa fa-caret-down"></i> </h5>
				  <div class="dropdown-content">
				    <?php
				    $user_id = $_SESSION['user_id'];
				    $query = "SELECT * FROM users WHERE user_id = ('$user_id')";

							$result = mysqli_query ($conn, $query);
							if (!$result){
								echo "Error in query";
								exit();
							}

							while($row = mysqli_fetch_array ($result)){
						?>
				     <?php echo "<a href='editAccount.php?user_id=".$row['user_id']."'> Manage Account</a>"; ?>
				     <?php } ?>


				    <a href="orders.php">Orders</a>
				    <?php
				    $user_id = $_SESSION['user_id'];
				    $query = "SELECT * FROM users WHERE user_id = ('$user_id')";

							$result = mysqli_query ($conn, $query);
							if (!$result){
								echo "Error in query";
								exit();
							}

							while($row = mysqli_fetch_array ($result)){
						?>
				   <?php echo "<a href='logout.php?user_id=".$row['user_id']."'> Logout</a>"; ?>
				     <?php } ?>
				  </div>
				</div>

					</li>
				</ul>

				
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="header_top">
	 <div class="container">
	 <form method="post">
		 <div class="logo">
		 	<a href="userindex.php"><img src="image/2.png" alt="" class="logo" /></a>			 
		 </div>
		 <div class="header_right">	
			 
			 <div class="cart box_1">
				<a href="usercart.php">
				<h3>
				<span>&nbsp;&nbsp;</span>
				 (<span>
                  <?php echo count(@$_SESSION['prod_cart']); ?> </span> items) <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></h3>
				</a>	
				<p> <a href="" onclick="empty_cart();">Empty Cart</a></p>
				<div class="clearfix"> </div>
			 </div>	
		 
		 </div>
		  <div class="clearfix"></div>	
		 </form>
	 </div>
</div>
<script>
function empty_cart(){
  $.ajax({
    type:"post",
    url:"",
    data:{action:'empty'},
    success:function(result){
      $('.cart_data').html(result);
    }
  });
}
</script>