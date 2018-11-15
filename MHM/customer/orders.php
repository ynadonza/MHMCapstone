<?php 
	require("../database/sql_connect.php");

 ?>
  <style type="text/css">
  </style>
</head>
<body>
<!-- header -->

<?php include("userheader.php") ?>

<?php include("usermenu.php") ?>
<div class="login_sec">
	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="userindex.php">Home</a></li>
		  <li class="active">Orders</li>
		 </ol>			
		
		 <div class="col-md-3">
		 <div class="tab">
		 <div class="panel panel-default">
		 	  <?php if (isset($_SESSION['success'])): ?>
                                        <?php foreach($_SESSION['success'] as $success): ?>
                                            <a style="color: green"><i class="fa fa-check"></i><?php echo "&nbsp; $success" ?></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
    		<div class="panel-heading" style="background-color: #0f266b;color: white;">
    		<h3 class="panel-title"><strong>All Categories</strong></h3>
    		</div>
    		<div class="panel-body">
		 		<ul class="nav">
		 			<li style="border-bottom: 2px solid #eee;" ><a href="#" class="tablinks" onclick="openCity(event, 'orders')" id="defaultOpen">My Orders</a></li>
		 			
		 			<li style="border-bottom: 2px solid #eee;"><a href="#" class="tablinks" onclick="openCity(event, 'pastTransaction')" id="defaultOpen">Past Transactions</a></li>
		 			
		 		</ul>
		 	</div>
		 </div>
		 </div>
		 <div class="contact-head"></div>
		 </div>
		 <div class="col-md-9">
		 	<div id="orders" class="tabcontent">
		 	<span><strong>Note: </strong>This Note inform's you when you can receive your order.</span>
			 <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Items above 100: Delivery Time is 2-3days | 1000 below: Delivery Time is 4-5 days</p>
			 <div class="contact-head"></div>
			 <?php 
			 	
			 	 $id = $_SESSION['user_id'];
			 	
			 	$select1 =mysqli_query($conn,"SELECT * FROM  orders
						     
						      JOIN users
						      ON orders.user_id = users.user_id
						   
						      WHERE (users.user_id =  $id AND orderStatus='pending') OR (users.user_id =  $id AND orderStatus='For Delivery')") or die(mysqli_error());
			 	$count = mysqli_num_rows($select1);
			 ?>
			 <p> Processing Orders <strong>(<?php echo $count; ?>)</strong></p>
		 	<div class="panel panel-default">
    		<div class="panel-heading">
    		<h3 class="panel-title"><strong>List of my Orders</strong></h3>
    		</div>
    		<div class="panel-body">
		 		<div class="table-responsive">

			 	 <table class="table table-striped table-hover" style="text-align:center">
			 	 	<thead>
				 	 	<tr>
				 	 		<td>Invoice</td>
				 	 		<td>Name</td>
				 	 		<td>Date Orders</td>
				 	 		<td>Contact Number</td>
				 	 		<td>Total Payable</td>
				 	 		<td>Order Status</td>
				 	 		<td>Payment Status</td>
				 	 		<td>Action</td>
				 	 	</tr>
				 	 </thead>
			 	 	<tbody>
			 	 	<?php 
			 	 	
			 	 	$id = $_SESSION['user_id'];	
			 	 	$select = mysqli_query($conn,"SELECT * FROM  orders
						     
						      JOIN users
						      ON orders.user_id = users.user_id
						   
						      WHERE (users.user_id =  $id AND orderStatus='pending') OR (users.user_id =  $id AND orderStatus='For Delivery')") or die(mysqli_error());
			 	 	
			 	 	while ($cart_row = mysqli_fetch_array($select)) {
			 	 			echo "<tr>";
	                        echo "<td>".date("Y").$cart_row['order_id']."</td>";
			 	 			echo "<td>".$cart_row['fname'].'&nbsp;'.$cart_row['lname']."</td>";
			 	 			$date = date("F d, Y",strtotime($cart_row['order_date']));
			 	 			echo "<td>".$date."</td>";
			 	 			echo "<td>".$cart_row['contact']."</td>";
			 	 			$total_amount = number_format($cart_row['total_amount'],2);
			 	 			echo "<td>".$total_amount."</td>";
			 	 			echo "<td>".$cart_row['orderStatus']."</td>";
			 	 			echo "<td>".$cart_row['paymentStatus']."</td>";
			 	 			echo '<td><a href="ordersDetails.php?user_id='.$cart_row['user_id'].'&order_id='.$cart_row['order_id'].'&order_id='.$cart_row['order_id'].'"><button class="btn btn-info btn-sm">View Order Details</button></a></td>';
			 	 			echo "</tr>";
			 	 		}
			 	 	 ?>
			 	 	</tbody>
			 	 </table>
			 	 </div>
		 	 </div>
		 	 </div>
		 	 </div>
		 	
			 <!-- End of profile -->

			 <!-- Start of past Transaction -->
			<div id="pastTransaction" class="tabcontent">
		 	<div class="panel panel-default">
	    		<div class="panel-heading">
	    		<h3 class="panel-title"><strong>Past Transaction</strong></h3>
	    		</div>
    		<div class="panel-body">
		 		<div class="table-responsive">
			 	 <table class="table table-striped table-hover" style="text-align: center">
			 	 	<thead>
				 	 	<tr>
				 	 		<td>Invoice</td>
				 	 		<td>Name</td>
				 	 		<td>Date</td>
				 	 		<td>Mobile No.</td>
				 	 		<td>Total Payable</td>
				 	 		<td>Status</td>
				 	 		<td>Action</td>
				 	 	</tr>
				 	 </thead>
			 	 	<tbody>
			 	 	<?php 
			 	 	$id = $_SESSION['user_id'];
			 	 	$select =  mysqli_query($conn,"SELECT * FROM  orders
						     
						      JOIN users
						      ON orders.user_id = users.user_id
						   	
						      WHERE users.user_id =  $id AND orderStatus = 'Delivered'") or die(mysqli_error());
			 	 
			 	 	
			 	 	while ($cart_row = mysqli_fetch_array($select)) {
			 	 			echo "<tr>";
	                        echo "<td>".date('Y').$cart_row['order_id']."</td>";
			 	 			echo "<td>".$cart_row['fname']."</td>";
			 	 				$date = date("F d, Y",strtotime($cart_row['order_date']));
			 	 			echo "<td>".$date."</td>";
			 	 			echo "<td>".$cart_row['contact']."</td>";
			 	 			$total_amount = number_format($cart_row['total_amount'],2);
			 	 			echo "<td>".$total_amount."</td>";
			 	 			echo "<td class='text-center'><span class='glyphicon glyphicon-ok btn-success' style='padding:10px;border-radius:100%;'></span></td>";
			 	 			echo '<td><a href="viewOrderDetails.php?user_id='.$cart_row['user_id'].'&order_id='.$cart_row['order_id'].'&order_id='.$cart_row['order_id'].'"><button class="btn btn-info btn-sm">View Details</button></a>';

			 	 			
			 	 				echo '<a href="ratings.php?user_id='.$cart_row['user_id'].'&order_id='.$cart_row['order_id'].'&order_id='.$cart_row['order_id'].'"><button class="btn btn-warning btn-sm"> <i class="fa fa-star"></i> Rate</button></a></td>';
			 	 				
			 	 			
			 	 			echo "</tr>";
			 	 		
			 	 		}
			 	 	 ?>
			 	 	</tbody>
			 	 </table>
			 	 </div>
		 	 </div>
		 	 </div>
		 	 </div>
		 	 <!-- End of past Transaction -->

		 	 <!-- Start of Notification -->
		 	 <div id="Notification" class="tabcontent">
		 	 	fdsfsfas
		 	 </div>
		 	 <!-- End of Notification -->
			 </div>	
	 </div>
</div>
<script src="datatables/js/bootstrap.min.js"></script>
 <script src="datatables/js/jquery.dataTables.min.js"></script>
 <script src="datatables/js/dataTables.bootstrap.min.js"></script>
 <!-- <script>
  $(document).ready(function(){
    $('table').DataTable();
  });
 </script> -->
 <script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<!---->
<!---->
<?php include("footer.php"); ?>
</body>
</html>
