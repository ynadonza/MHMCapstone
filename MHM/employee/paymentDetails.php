<?php
 require("../database/sql_connect.php");

$order_id = $_GET['order_id'];
$sql = "SELECT * FROM payments
		JOIN orders
		ON orders.payment_id = payments.payment_id
		WHERE order_id = ('$order_id')";
$data = mysqli_query($conn, $sql);

if(!$data){
	echo "Error is query";

}

?>
<?php include('employeeTable.php');?>
<div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="transactionCode.php"><b>Transaction Code</b></a>
            </li>
            <li class="breadcrumb-item">
              <a href="pendingOrders.php"><b>Orders</b></a>
          </ol>
        </div>
<!-- TABLE -->
<center><h1>Payment Details</h1></center>
<div class='table-responsive'>
	<table class='table table-striped table-hover' style="width:96%; margin: auto">
	<tr>
		<th>Order ID</th>
		<th>Service Provider</th>
		<th>Transaction Code</th>
		<th>Sender's Name</th>
		<th>Contact No.</th>
		<th>Amount Paid</th>
	</tr>
	
<?php

while($row=mysqli_fetch_array($data))
{
	 echo "<tr>";
	 echo "<td>".$row['order_id']."</td>";
     echo "<td>".$row['service_provider']."</td>";
     echo "<td>".$row['transactionCode']."</td>";
     echo "<td>".$row['sender']."</td>";
     echo "<td>".$row['contact']."</td>";
     echo "<td>".$row['amountPaid']."</td>";
     echo "</tr>";
}

?>
</div>
</table>