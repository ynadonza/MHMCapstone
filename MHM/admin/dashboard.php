<?php
require("../database/sql_connect.php");
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
           
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-shopping-cart"></i>
                  </div>
                  <?php $select = mysqli_query($conn,"SELECT SUM(amountPaid) as amountPaid FROM payments JOIN orders ON payments.payment_id = orders.payment_id WHERE YEAR(order_date)=2018");
                    $result1 = mysqli_fetch_array($select);
                    ?>
                  <div class="mr-5"><?php echo number_format($result1['amountPaid'],2); ?> Total Sales</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-money"></i>
                  </div>
                   <?php 
                      $select = mysqli_query($conn,"SELECT * FROM  products
                                                    ");
                      while($rs1 = mysqli_fetch_array($select)){
                     
                      $UnitPrice = $rs1['unit_price'] * $rs1['qty'];
                     
                      // $profit = $SalesPrice-$UnitPrice;
                      // @$totalSalesPrice +=$SalesPrice * $totalQty;
                      @$totalCapital +=$UnitPrice;
                      // @$totalprofit = $totalSalesPrice-$totalUnitPrice;
                    }
                      // $profit = $rs1['totalSalesPrice']- $rs1['totalUnitPrice'];
                     ?>
                  <div class="mr-5"><?php echo number_format($totalCapital,2); ?> Total Capital</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            
             <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-money"></i>
                  </div>
                   <?php 
                      $select = mysqli_query($conn,"SELECT * FROM products
                                                    ");
                      while($rs1 = mysqli_fetch_array($select)){
                      $SalesPrice = $rs1['qty'] * $rs1['selling_price'];
                      // $UnitPrice = $rs1['qty'] * $rs1['unit_price'];
                      // @$totalQty += $rs1['qty'];
                      // $profit = $SalesPrice-$UnitPrice;
                      @$totalSalesPrice +=$SalesPrice;
                      // @$totalUnitPrice +=$UnitPrice;
                      // @$totalprofit = $totalSalesPrice-$totalUnitPrice;
                    }
                      // $profit = $rs1['totalSalesPrice']- $rs1['totalUnitPrice'];
                     ?>
                  <div class="mr-5"><?php echo number_format($totalSalesPrice,2); ?> Total Income</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
             <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-money"></i>
                  </div>
                   <?php 
                     // $select = mysqli_query($conn,"SELECT * FROM  products
                     //                                ");
                     //  while($rs1 = mysqli_fetch_array($select)){
                     //  	 $UnitPrice = $rs1['unit_price'] * $rs1['qty'];
                     
                     
                      @$totalprofit = @$totalSalesPrice - @$totalCapital;
                      
                      // $profit = $rs1['totalSalesPrice']- $rs1['totalUnitPrice'];
                     ?>
                  <div class="mr-5"><?php echo number_format($totalprofit,2); ?> Total Profit</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
             <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-cube"></i>
                  </div>
                 <?php $select = mysqli_query($conn,"SELECT * FROM products");
                            $result = mysqli_num_rows($select);
                         ?>
                  <div class="mr-5"><?php echo $result; ?> Products</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="products.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <?php $select = mysqli_query($conn,"SELECT * FROM users WHERE user_type = 'employee'");
                            $result2 = mysqli_num_rows($select);
                         ?>
                  <div class="mr-5"><?php echo $result2; ?> Employees</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="employee.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-user"></i>
                  </div>
                  <?php $select = mysqli_query($conn,"SELECT * FROM suppliers");
                            $result3 = mysqli_num_rows($select);
                         ?>
                  <div class="mr-5"><?php echo $result3; ?> Suppliers</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="suppliers.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
             <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <?php $select = mysqli_query($conn,"SELECT * FROM users WHERE user_type = 'customer'");
                            $result2 = mysqli_num_rows($select);
                         ?>
                  <div class="mr-5"><?php echo $result2; ?> Customers</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
           
          
 

<?php include('footer.php');?>
</body>
</html>