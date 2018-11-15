<?php 
 require("../database/sql_connect.php");

 $query= "SELECT * FROM products WHERE sub_category = 'Rehabilitation Care'";

$data = mysqli_query($conn, $query);
    if(!$data){
        echo "Error in query";
    }

$record_per_page = 9;
$page = '';
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
else{
	$page = 1;
}
$start_from = ($page-1)*$record_per_page;
$result = mysqli_fetch_array($data);
		 $display = "";
		 $search_value=isset($_POST['search'])? $_POST["search"]:'';
		if($result['sub_category'] == "Rehabilitation Care"){
			$sqlSelProd = mysqli_query($conn,"SELECT * FROM products WHERE prod_name like '%$search_value%' AND sub_category='Rehabilitation Care' ORDER BY prod_id DESC limit $start_from, $record_per_page") or die(mysqli_error());

		}
?>

<body>
<?php include("userheader.php") ?>
  <style type="text/css">
  	 	.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    /*float: left;*/
    padding: 8px 16px;
    text-decoration: none;
    border: 1px solid #ddd;
}
img:hover{
	border-bottom: 1px solid #eee;
}
  </style>
<?php include("usermenu.php") ?>

<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="userindex.php">Home</a></li>
		  <li><a href="#">Products</a></li>
		   <li><a href="useracutecare.php">Acute Care</a></li>
		  <li class="active">Rehabilitation Care</li>
		 </ol>
			<h2>OUR PRODUCTS</h2>			
		 <div class="col-md-9 product-model-sec">
		 <?php 
		 if (mysqli_num_rows($sqlSelProd) >= 1) {
          while ($row = mysqli_fetch_array($sqlSelProd)) {
          	
         
	?>
			
			<a href="usersingle.php?prod_id=<?php echo $row['prod_id']; ?>"><div class="product-grid love-grid">
						<div class="more-product"><span> </span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="../admin/<?php echo $row['photo'] ?>" style="height:150px;" class="img-responsive" alt=""/>
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
							<button class="btns"><span class="fa fa-eye" aria-hidden="true"></span> Quick View</button>
							</h4>
							</div>
						</div></a>	
						<form method="post">					
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name">
								<h4><?php echo $row['prod_name']; ?></h4>
								<br>
								<span class="item_price">&#8369; <?php echo number_format($row['selling_price'],2); ?></span>
								<input type="number" min="1" max="<?php echo $row['qty']; ?>" class="item_quantity quantity<?php echo $row['prod_id']; ?>" value="1" />
								<button type="submit" class="item_add items" onclick="add_cart('<?php echo $row['prod_id']; ?>')"><i class="fa fa-shopping-cart"></i> ADD TO CART</button>		
							</div>													
							<div class="clearfix"> </div>
						</div>
						</div>
						</form>
						<?php 
			}
		}
		?>
			</div>
			<div class="rsidebar span_1_of_left">
				 <section  class="sky-form">						   
					<?php include("useracutecareSubCategory.php"); ?>		 
				 </section>		
			 </div>				 
	      </div>
		</div>
</div>
<center>
			<div class="pagination">
						<?php 
							if($sub_category = "Rehabilitation Care")
							$sqlSelProd = mysqli_query($conn,"SELECT * FROM products WHERE sub_category = 'Rehabilitation Care'") or die(mysqli_error());
							
							$total_records = mysqli_num_rows($sqlSelProd);
							$total_pages = ceil($total_records/$record_per_page);

							if ($type='') {
								echo "<ul class='pagination'>";
								if($page == 1) {
								$disable_prev = 'disabled';
								$prev_url = "javascript:void(0);";
								} else {
								    $disable_prev = '';
								    $prev_url = "userrehab.php?page=".($page-1);
								}
								echo '<li class="page-item '.$disable_prev.'"><a class="page-link" href="'.$prev_url.'" class="button">
							        <span aria-hidden="true">&laquo;</span>
							        <span class="sr-only">Previous</span>
							      </a></li>';
								for ($i=1; $i <=$total_pages ; $i++) { 
									echo '<li><a href="userrehab.php?page='.$i.'">'.$i.'</a></li>';
								}
								if($page+1 == $total_pages) {
								    $disable_next = '';
								    $next_url = "userrehab.php?page=".($page+1);
								} else {
								    $disable_next = 'disabled';
								    $next_url = "javascript:void(0);";
								}

								echo "<li class='page-item ".$disable_next."'><a class='page-link' href='".$next_url."' class='button'>
								        <span aria-hidden='true'>&raquo;</span>
								        <span class='sr-only'>Next</span>
								      </a></li>";
								echo "</ul>"; 
								}
								else{
								echo "<ul class='pagination'>";
								if($page == 1) {
								$disable_prev = 'disabled';
								$prev_url = "javascript:void(0);";
								} else {
								    $disable_prev = '';
								    $prev_url = "userrehab.php?sub_category=".$_GET['sub_category']."&page=".($page-1);
								}
								echo '<li class="page-item '.$disable_prev.'"><a class="page-link" href="'.$prev_url.'" class="button">
							        <span aria-hidden="true">&laquo;</span>
							        <span class="sr-only">Previous</span>
							      </a></li>';
								for ($i=1; $i <=$total_pages ; $i++) { 
									echo '<li><a href="userrehab.php?sub_category='.$sub_category.'&page='.$i.'">'.$i.'</a></li>';
								}
								if($page+1 == $total_pages) {
								    $disable_next = '';
								    $next_url = "userrehab.php?sub_category=".$_GET['sub_category']."&page=".($page+1);
								} else {
								    $disable_next = 'disabled';
								    $next_url = "javascript:void(0);";
								}

								echo "<li class='page-item ".$disable_next."'><a class='page-link' href='".$next_url."' class='button'>
								        <span aria-hidden='true'>&raquo;</span>
								        <span class='sr-only'>Next</span>
								      </a></li>";
								echo "</ul>"; 
							}

						 ?>
			</div>
			</center>
<script>

function add_cart(prod_id=""){
	var quantity = $(".quantity"+prod_id).val();
	$.ajax({
		type:"post",
		url:"usercart.php",
		data:{action:'add',prod_id:prod_id,qty:quantity},
		success:function(result){
			$('.cart_data').html(result);

		}
	});
}


add_cart();


</script>


<?php include("footer.php") ?>
<!---->
</body>
</html>