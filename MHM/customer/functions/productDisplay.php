<?php 
		 $display = "";
		 $search_value=isset($_POST['search'])? $_POST["search"]:'';
		 if(isset($_POST['category']) == "Doors")
		$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and category='$_GET[category]' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_POST['category']) == "Doors")
		$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and category = '$_GET[category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['category']) == "Hand")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and category = '$_GET[category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['category']) == "Floor")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and category = '$_GET[category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['category']) == "Lumber")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and category = '$_GET[category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['category']) == "Masonry")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and category = '$_GET[category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['category']) == "Concrete")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and category = '$_GET[category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		// Desc category
		else if(isset($_GET['desc_category']) == "Door Luck and Handles")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['desc_category']) == "Doors and Doors Hardware Kits")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['desc_category']) == "Vinyl and Wood Flooring")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['desc_category']) == "Floor Wall Protection Film")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		// End of Floor Desc Category

		// Start of Lumber Desc Category
		else if(isset($_GET['desc_category']) == "Boards and Lumber")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['desc_category']) == "Plywoord")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['desc_category']) == "Wood Stakes")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		// End of Lumber Desc Category

		// Start of Masonry Desc Category
		else if(isset($_GET['desc_category']) == "Cement Trowels and Accessories")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['desc_category']) == "Chalk and Mason Line")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['desc_category']) == "Floats")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['desc_category']) == "Tile and Grout Tools")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		// End of Masonry Desc Category

		// Start of Concrete Desc Category
		else if(isset($_GET['desc_category']) == "Cement")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['desc_category']) == "Nails")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else if(isset($_GET['desc_category']) == "Concrete Mix")
			$sqlSelProd = mysqli_query($con,"select * from tb_products where name like '%$search_value%' and Status='Active' and desc_category = '$_GET[desc_category]' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysqli_error());
		else
		$sqlSelProd = mysqli_query($con,"select * from tb_products  where name like '%$search_value%' and Status='Active' ORDER BY productID DESC limit $start_from, $record_per_page") or die(mysql_error());
		

		if (mysqli_num_rows($sqlSelProd) >= 1) {
          while ($row = mysqli_fetch_array($sqlSelProd)) {
          	$productID = $row['productID'];
          	$location = $row['location'];
          	$name = $row['name'];
          	$price = $row['price'];
         
	

			$display .= '<a href="single.php?productID='.$productID.'"><div class="product-grid love-grid">
						<div class="more-product"><span> </span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="admin/'.$location.'" style="height:150px;" class="img-responsive" alt=""/>
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
							<button class="btns"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</button>
							</h4>
							</div>
						</div></a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name">
								<h4>'.$name.'</h4>
								<br>
								<span class="item_price">&#8369; '.$price.'</span>
								<br>								
							</div>													
							<div class="clearfix"> </div>
						</div>
						</div>';

			}
		}
?>
