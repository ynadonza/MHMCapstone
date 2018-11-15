<?php 
  require("../database/sql_connect.php");

        $query = "SELECT * FROM orders
                  JOIN users
                  ON orders.user_id = users.user_id
                  JOIN address
                  ON address.add_id = users.add_id 
                  WHERE orderStatus = 'For Delivery' ";
                  $data = mysqli_query($conn, $query);
                  if(!$data){
                   echo "Error in query";
            }
 ?>
<?php include('header.php');?>
<style>
table {
  display:block;
  height: 500px;
  overflow-y: scroll;
  
}
</style>

   <div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
              <a href="forDelivery.php"><b>For Delivery</b></a>
            </li>
            <li class="breadcrumb-item active">
             Tables
            </li>
          </ol>
        </div>
<!-- TABLE -->
<div id="page-inner"> 
    <div class="row">
       <div class="col-md-12">
            <div class='panel panel-success' style='width:1000px;margin:5% auto;'>
              <div class='panel-heading'></div>
              <div class='panel-body'>
                  <div class="table-responsive">
            <table class='table table-striped' style='width:97%;margin:1% auto;'>
            <thead>
              <tr>
                <th><center>Order ID</center></th>
                <th><center>Customer Name</center></th>
                <th><center>Customer Address</center></th>
                <th><center>Order Details</center></th>
                <th><center>Payment Details</center></th>
                <th><center>Status</center></th>
              </tr>
</thead>
<tbody>
<?php
           while($row=mysqli_fetch_array($data))
                {
              echo "<tr>";
              echo "<td><center>{$row['order_id']}</center></td>";
              echo "<td><center>{$row['fname']} {$row['lname']}</center></td>";
              echo "<td><center>".$row['street'].',&nbsp;'.$row['brgy'].',&nbsp;'.$row['city'].',&nbsp;'.$row['province'].',&nbsp;'.$row['zip_code']."</center></td>";
              echo "<td><center><button type='button' class='btn btn-primary btn-sm'><a href='orderdetails.php?order_id=".$row['order_id']."' style='color:white'><i class='fa fa-eye'></i> View Order Details</a></button></center></td>";
              echo "<td><center><button type='button' class='btn btn-primary btn-sm'><a href='adminPaymentdetails.php?payment_id=".$row['payment_id']."' style='color:white'><i class='fa fa-eye'></i> View Payment Details</a></button></center></td>";
             if($row['orderStatus'] == 'For Delivery'){
                echo "<td><center><button type='button' class='btn btn-primary btn-sm active'><i class='fa fa-car'></i> For Delivery</button></center></td>";
              }
              echo "</tr>";
             }
            



?>            
</tbody>
</table>         
   </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
