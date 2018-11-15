<?php
require('../database/sql_connect.php');
$order_id = $_GET['order_id'];
$query = "SELECT * FROM orders where paymentStatus = 'unpaid'";
$result=mysqli_query($conn, $query);
if(!$result){
	echo mysqli_error($conn);
}
?>
<!--  <div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="pendingOrders.php"><b>Payment Status</b></a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
        </div>

<div class="table-responsive">
            <table class='table table-striped' style='width:97%;margin:1% auto;'>
            <thead>
              <tr>
                <th><center>Order Date</center></th>
                <th><center>Total Amount</center></th>
                <th><center></center></th>
                <th><center>Payment Status</center></th>
                <th><center>Order Details</center></th>
                <th><center>Payment Details</center></th>
                <th><center>Status</center></th>
              </tr>
            </thead>
            <tbody> -->