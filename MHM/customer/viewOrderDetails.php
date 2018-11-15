<?php 
require("../database/sql_connect.php");
$order_id = $_GET['order_id'];	
 ?>

  <style type="text/css">
  .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
  </style>
</head>
<?php include('userheader.php');?>
<html>
<link rel="stylesheet" type="text/css" href="../datatables/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">
<link rel="stylesheet" type="text/css" href="../datatables/dataTables.bootstrap.css">

<?php include('usermenu.php');?>
<body>
<!-- header -->
<div class="login_sec">
	<div class="container">
			 <ol class="breadcrumb">
		  <li><a href="userindex.php">Home</a></li>
           <li><a href="orders.php">Orders</a></li>
		  <li class="active">View Order Details</li>
		 </ol>			
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<div class="contact-head">
    			<?php
                // $order_id = $_GET['order_id'];
    			 $id = $_SESSION['user_id'];
    			 $select = mysqli_query($conn,"SELECT * FROM orderdetails 
                              JOIN orders
                              ON orderdetails.order_id = orders.order_id
                              JOIN users
                              ON orders.user_id = users.user_id
                           
                              WHERE users.user_id =  $id") or die(mysqli_error());
                    while ($rows = mysqli_fetch_array($select)) { ?>
    			<h2>Order Details (<?php echo $rows['orderStatus']; ?>)</h2><h3 class="pull-right">Order #: <?php echo "<span>".date("Y").$rows['order_id']."</span>"; ?></h3>
    			</div>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed From:</strong><br>
    					Name: Metro Health Management <br>
    					Address: Cebu City <br>
    					Contact Number: 09221378201
    					
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">

    				<address>
    					<strong>Order Date:</strong><br>
    					<?php echo $rows['order_date']; ?><br><br>
    				</address>
    		
    				<address>
        			<strong>Shipped To:</strong><br>
    					<?php echo $rows['fname']; ?>&nbsp;<?php echo $rows['mname']; ?>&nbsp;<?php echo $rows['lname']; ?><br>
    					<?php  $id = $_SESSION['user_id'];
		    			 $select = mysqli_query($conn,"SELECT * FROM users 
								      JOIN address
								      ON users.add_id = address.add_id
								      WHERE users.user_id =  $id") or die(mysqli_error());
                    while ($rows = mysqli_fetch_array($select)) { ?>
                        <?php echo $rows['street']; ?>,&nbsp;<?php echo $rows['brgy']; ?>,&nbsp;<?php  echo $rows['city']; ?>,&nbsp;<?php echo $rows['province']; ?>,&nbsp;<?php echo $rows['zip_code']; ?>
                        <?php } ?>
                        <?php echo $rows['contact']; ?>
    				</address>
    			</div>
    		</div>
    		<!-- <div class="row">
    			<div class="col-xs-6">
    				<!-- <address>
    					<strong>Payment Method:</strong><br>
    					<?php echo $rows['deliverytype']; ?>
    				</address> -->
    			<!-- </div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					<?php echo $rows['order_date'];} ?><br><br>
    				</address>
    			</div>
    		</div> --> 
    	</div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Image</strong></td>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Amount</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <?php 
                                    $order_id = $_GET['order_id'];
                                  $id = $_SESSION['user_id'];
                                 $select = mysqli_query($conn,"SELECT * FROM orderdetails 
                                              JOIN orders
                                              ON orderdetails.order_id = orders.order_id
                                              JOIN users
                                              ON orders.user_id = users.user_id
                                               JOIN products
                                              ON orderdetails.prod_id = products.prod_id
                                              WHERE users.user_id =  $id AND orders.order_id = '$order_id'") or die(mysql_error());
                                    while ($rows = mysqli_fetch_array($select)) {
                                // $row = mysqli_fetch_array($select1); 
                                $photo = $rows['photo'];
                                    echo "<tr>";
                                    echo '<td><img src="../admin/'.$photo.'" class="img-responsive" alt="" style="width: 50px;height: 50px;">
                                    </td>';
                                    echo "<td>".$rows['prod_name']."</td>";
                                    $unit_price = number_format($rows['unit_price'],2);
                                    echo "<td class='text-center'>".$unit_price."</td>";
                                    echo "<td class='text-center'>".$rows['orderQty']."</td>";
                                    $subTotal = number_format($rows['subTotal'],2);
                                    echo "<td class='text-right'>".$subTotal."</td>";
                                    echo "</tr>";   
                                    }
                                 ?>
                                 <?php
                                  $order_id = $_GET['order_id'];
                                 $id = $_SESSION['user_id'];
                                 $select1 = mysqli_query($conn,"SELECT * FROM orderdetails 
                                              JOIN orders
                                              ON orderdetails.order_id = orders.order_id
                                              JOIN users
                                              ON orders.user_id = users.user_id
                                               JOIN products
                                              ON orderdetails.prod_id = products.prod_id
                                              WHERE users.user_id =  $id AND orders.order_id = '$order_id'") or die(mysql_error());
                                 $rows1 = mysqli_fetch_array($select1);
                                 $total_amount = $rows1['total_amount'];
                                 ?>
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">&#8369; <?php echo number_format($total_amount,2); ?></td>
                                </tr>
                                <?php 
                                    if ($rows1['total_amount']<=5000) {
                                 ?>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Shipping</strong></td>
                                    <td class="no-line text-right">&#8369; 150.00</td>
                                </tr>
                                <?php }else{ ?>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Shipping</strong></td>
                                    <td class="no-line text-right">Free</td>
                                </tr>
                                <?php }if ($rows1['total_amount']<=1000){
                                    $total_amount = $rows1['total_amount'] + 150;
                                ?>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">&#8369;<?php echo $total_amount; ?></td>
                                </tr>
                                <?php }else{ ?>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">&#8369; <?php echo number_format($total_amount,2); ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    					<div style="float:right">
                                        <?php
                                $order_id = $_GET['order_id'];
                                $query = "SELECT * FROM orders WHERE order_id = ('$order_id')";

                                        $result = mysqli_query ($conn, $query);
                                        if (!$result){
                                            echo "Error in query";
                                            exit();
                                        }

                                        while($row = mysqli_fetch_array ($result)){
                                    ?>
                                <!--  -->
                                 <?php } ?>
    						<!-- <a href="userpayment.php?order_id=".$row['order_id']."'><button class="btn btn-primary"><i class="fa fa-credit-card"></i> Proceed to Payment</button></a> -->
    					</div>
    	</div>
    </div>
</div>
</div>

<?php include("footer.php"); ?>
</body>
</html>
 