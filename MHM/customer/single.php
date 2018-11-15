<?php

require("../database/sql_connect.php");
?>
<head>
	<head>
	<!DOCTYPE HTML>
<html>
<head>
<title>Metro Health Management</title>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- 
<link href="css2/bootstrap.css" rel='stylesheet' type='text/css' /> -->
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
	
<!--//theme-style-->
<meta name="keywords" content="Furnyish Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
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
<link href="css2/form.css" rel="stylesheet" type="text/css" media="all" />
 <!--  <script src="js/responsiveslides.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css2/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
  


<!--etalage-->

<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- header -->
<?php include("header.php") ?>
<!--cart-->
	 
<!------>
<?php include("menu.php") ?>

<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>


<!-- //etalage-->
  <style type="text/css">
  	#usersubmit{
  		background-color: #D5331D;
  		border:none;
  		color: white;
  		font-size: 15px;
  		width: 120px;
  		height: 35px;
  		margin-top: 10px;
  	}
  </style>
</head>

<!---->
<div class="single-sec">
	 <div class="container">
		 <ol class="breadcrumb">
			 <li><a href="index.php">Home</a></li>
			 <li class="active">Products</li>
		 </ol>
		 <!-- start content -->	
			<div class="col-md-12 det">
			<form method="post" >
			<?php 
			$prod_id = $_GET['prod_id'];
				$select = mysqli_query($conn,"SELECT * FROM products WHERE prod_id= ('$prod_id')");
				while ($row = mysqli_fetch_array($select)) {
                                $id = $row['prod_id'];
								$qty = $row['qty'];
								
							
									// $total_qty = $qty - $row1['qty'];	

			 ?>
			 <input type="hidden" name="product_id" value="<?php echo $id; ?>">
			<input type="hidden" name="price" value="<?php echo $row['unit_price']; ?>">
				  <div class="single_left">
					 <div class="grid images_3_of_2">
						 <ul id="etalage">
							<li>
								<a href="optionallink.html">
									 <img class="etalage_thumb_image" src="../admin/<?php echo $row['photo'] ?>" class="img-responsive" alt="">
									<img class="etalage_source_image" src="../admin/<?php echo $row['photo'] ?>" class="img-responsive" alt="">
								</a>
							</li>
												
						 </ul>
						 <div class="clearfix"></div>		
				      </div>
				  </div>
				  <div class="single-right">
					 <h3><?php echo $row['prod_name']; ?></h3>
					 <div class="id"><h4>ID: 000<?php echo $row["prod_id"]; ?></h4></div>
					  <div class="cost">
						 <div class="prdt-cost">
							 <ul>
								 <!-- <li>MRP: <del>Rs 55000</del></li>								  -->
								 <li>Product Type: <strong><i><?php echo $row["type"]; ?></i></strong></li>
								 <li>Selling Price:</li>
								 <li class="active">&#8369; <?php echo number_format($row['unit_price'],2); ?></li>
								 <li><input type="hidden" class="form-control" max="<?php echo $qty; ?>" name="qty" value="1"></li>
								 <?php if($row['qty'] > 0){ ?>
								  <button id="usersubmit" type="submit"  onclick="myFunction()"> <i class="fa fa-shopping-cart"></i> Add to Cart</button>
								 <?php }else{
								 	echo "<input id='usersubmit' type='button' value='Out of Stock' disabled>";
								 	} ?>
								 <?php 
								 	if (isset($_POST['usersubmit'])) {
								 		echo "<script> alert('Please Login to buy this product');</script>";
								 	}
								  ?>
							 </ul>
						 </div>
						 <!-- <div class="check">
							 <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Enter pin code for delivery & availability</p>
							 <form class="navbar-form navbar-left" role="search">
								  <div class="form-group">
									
								  </div>
								  <button type="submit" class="btn btn-default">Verify</button>
							 </form>
						 </div> -->
						 <div class="clearfix"></div>
					  </div>
					  
					  <div class="single-bottom1">
						<h6>Description</h6>
						<p class="prod-desc"><?php echo $row['description']; ?></p>
					 </div>					 
				  </div>
				  <div class="clearfix"></div>
				  <?php } ?>
				  </form>				  					
		    </div>
			<div class="rsidebar span_1_of_left">
				
				 
				   <!---->
				
					  									 			 
			   </div>
		</div>	     				
		     <div class="clearfix"></div>
	  </div>	 
</div>
<br>
<!---->
<?php include("indexfooter.php") ?>
<!---->
<script>
function myFunction() {
  
   alert("Please login first before ordering. Thank you!");
   
       
    
}
</script>
</body>
</html>
