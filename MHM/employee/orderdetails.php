<?php 
  require("../database/sql_connect.php");
  

 $order_id = $_GET['order_id'];
 $query = "SELECT  * FROM orderdetails 
 			JOIN products
 			ON orderdetails.prod_id = products.prod_id
 			WHERE order_id = ('$order_id')"; 

 			$data = mysqli_query($conn, $query);
                  if(!$data){
                   echo "Error in query";
                   }
$sql = "SELECT * FROM orders WHERE order_id = ('$order_id')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
          echo "Error in query";
        }
?>

<style>
 
 #box {
    border: 2px solid black;
    border-radius: 8px;
    border-width: 2px;
    background-color: lightgrey;
    width: 300px;
    padding: 5px;    
    background-color: lightgrey;
}
</style>
<?php include('employeeTable.php');?>
<body>
 <div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="pendingOrders.php"><b>Orders</b></a>
            </li>
            <li class="breadcrumb-item">
              <a href=""><b>Order Details</b></a>
          </ol>
        </div>
<!-- TABLE -->
<center><h1>Order Details</h1></center>
<div class='table-responsive'>
<!-- <table class='table table-striped table-hover'>
		<tr>
			<th>Order Details ID</th>
			<th>Product Name</th>
			<th>Order Quantity</th>
			<th>Subtotal</th>
		</tr>
	</table>
	</thead>
<tbody> -->
	<div class="table-responsive">
            <table class='table table-striped' style='width:97%;margin:1% auto;'>
            <thead>
             
              <tr>
                <th><center>Order Details ID</center></th>
                <th><center><P></P></center></th>
                <th><center>Product Name<center></th>
                <th><center>Order Quantity</center></th>
                <th><center>Subtotal</center></th>
                <th><center>Order Date</center></th>
              </tr>
            
</thead>
<tbody>
<?php
while($row1=mysqli_fetch_array($result)){
while($row=mysqli_fetch_array($data)){
    echo "<tr>";
    echo "<td><center>{$row['orderDetails_id']}</center></td>";
    echo "<td><center><img src='../admin/{$row['photo']}' class='img-responsive' alt='' style='width: 50px;height: 50px;'></center></td>";
    echo "<td><center>{$row['prod_name']}</center></td>";
    echo "<td><center>{$row['orderQty']}</center></td>";
    $subTotal = number_format($row['subTotal'], 2);
    echo "<td><center>$subTotal</center></td>";
    $date = date("F d, Y",strtotime($row1['order_date']));
              echo "<td><center>".$date."</center></td>";
    echo "</tr>";
	
}
}

?>
</div>
</tbody>
</table>

<!--  <div style="float:center"> -->
	  <div id = "box" style="float:right">
           <center>  
             <span class="total final">
                <h5> TOTAL AMOUNT: &#8369;
                <?php
                		$order_id = $_GET['order_id'];
						 $query = "SELECT  * FROM orders 
						 			WHERE order_id = ('$order_id')";

						 			$data = mysqli_query($conn, $query);
						                  if(!$data){
						                   echo "Error in query";
						                   }
						while($row=mysqli_fetch_array($data)){
                         echo "{$row['total_amount']}"; 
                                }                         
                ?>
            </h5> 
               </span>
            </div>

</body>