<?php 
  require("../database/sql_connect.php");
        $query = "SELECT * FROM orders
                  JOIN users
                  ON orders.user_id = users.user_id
                  JOIN address
                  ON address.add_id = users.add_id 
                  WHERE orderStatus = 'pending' ORDER BY order_id DESC";
                  $data = mysqli_query($conn, $query);
                  if(!$data){
                   echo "Error in query";
            }
 ?>
<?php include('employeeTable.php');?>
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
              <a href="pendingOrders.php"><b>Orders</b></a>
            </li>
            <li class="breadcrumb-item">
              <a href="transactionCode.php"><b>Transaction Codes</b></a>
          </ol>
        </div>
<!-- TABLE -->
<center><h1>Pending Orders</h1></center>
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
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Customer Address</th>
                <th>Payment Status</th>
                <th>Payment Details</th>
                <th>Order Details</th>
                <th>Status</th>
              </tr>
</thead>
<tbody>
<?php


           while($row=mysqli_fetch_array($data))
                {
                   
                    $dateOrder = $row['order_date'];
                    // echo "Date ordered: $dateOrder<br>";
                    $dueDate = date('Y-m-d', strtotime($dateOrder."+3 days"));
                    // echo "Due date: $dueDate<br>";
                    $dateToday = date('Y-m-d');
                    // echo "Date today: $dateToday<br>";
                  

                    
                    


              echo "<tr>";
              echo "<td>{$row['order_id']}</td>";
              echo "<td>{$row['fname']} {$row['lname']}</td>";
              echo "<td>".$row['street'].',&nbsp;'.$row['brgy'].',&nbsp;'.$row['city'].',&nbsp;'.$row['province'].',&nbsp;'.$row['zip_code']."</td>";
              if($row['paymentStatus'] == 'paid'){
                echo "<td><button class='btn btn-success btn-sm'><i class='fa fa-check'> {$row['paymentStatus']}</td>";
              }else{
                echo "<td><button class='btn btn-danger btn-sm'><i class='fa fa'>{$row['paymentStatus']}</td>";
              }
              echo "<td><button type='button' class='btn btn-primary btn-sm'><a href='paymentdetails.php?order_id=".$row['order_id']."' style='color:white'><i class='fa fa-eye'></i> View Payment Details</a></button></td>";
              echo "<td><button type='button' class='btn btn-primary btn-sm'><a href='orderdetails.php?order_id=".$row['order_id']."' style='color:white'><i class='fa fa-eye'></i> View Order Details</a></button></td>";

              if($row['paymentStatus'] == 'paid'){
                echo "<td><button class='btn btn-warning btn-sm active'><i class='fa fa'><a href='updateStatuspending.php?order_id=".$row['order_id']."' style='color:white' onClick=\"return confirm('Proceed to for delivery?')\">{$row['orderStatus']}</a></button></td>";
              }else{
                if ($dateToday >= $dueDate) {
                      echo "<td><button class='btn btn-danger btn-sm active'><i class='fa fa'><a href='updateStatuscancelled.php?order_id=".$row['order_id']."' style='color:white' onClick=\"return confirm('Proceed to Cancelled order?')\">Cancel</a></button></td>";
                    } else {
                      echo "<td><button class='btn btn-warning btn-sm active' style='color:white' ><i class='fa fa'>{$row['orderStatus']}</button></td>";
                    }
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
