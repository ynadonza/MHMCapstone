<?php
require('../database/sql_connect.php');

$payment_id = $_GET['payment_id'];

$query = "SELECT * FROM payments WHERE payment_id = ".$payment_id." ";

$result=mysqli_query($conn, $query);

$data = mysqli_fetch_assoc($result);

if(!$result){
	echo mysqli_error($conn);
}
?>
<?php include('header.php');?>
 <div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="pendingOrders.php"><b>Payment Details</b></a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
        </div>
   <div class="table-responsive">
            <table class='table table-sm' style='width:97%;margin:1% auto;'>
              <tr>
                <th><center>Payment ID</center></th>
                <th><center>Service Provider</center></th>
                <th><center>Transaction Code</center></th>
                <th><center>Sender's Name</center></th>
                <th><center>Contact</center></th>
                <th><center>Amount Paid</center></th>
              </tr>

 <?php
				echo "<tr>";
			  	echo "<td><center>".$data['payment_id']."</center></td>";
				echo "<td><center>".$data['service_provider']."</center></td>";
				echo "<td><center>".$data['transactionCode']."</center></td>";
				echo "<td><center>".$data['sender']."</center></td>";
				echo "<td><center>".$data['contact']."</center></td>";
				echo "<td><center>".$data['amountPaid']."</center></td>";
				echo "</tr>";
			
 ?>
</tbody>
</table>
 