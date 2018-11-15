<?php
 
require("../database/sql_connect.php");
include('employeeTable.php');
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
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-info-circle"></i>
                  </div>
                   <?php $select = mysqli_query($conn,"SELECT * FROM orders where orderStatus = 'Cancelled'");
                            $result = mysqli_num_rows($select);
                         ?>
                  <div class="mr-5"><?php echo $result; ?> Cancelled!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="cancelled.php">
                 <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <?php $select1 = mysqli_query($conn,"SELECT * FROM orders where orderStatus = 'for delivery'");
                            $result1 = mysqli_num_rows($select1);
                         ?>
                  <div class="mr-5"><?php echo $result1; ?> For Delivery!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="forDelivery.php">
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
                    <i class="fas fa-user-circle"></i>
                  </div>
                  <?php $select2 = mysqli_query($conn,"SELECT * FROM orders where orderStatus = 'delivered'");
                            $result2 = mysqli_num_rows($select2);
                         ?>
                  <div class="mr-5"><?php echo $result2; ?> Delivered!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="delivered.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-info-circle"></i>
                  </div>
                  <?php $select3 = mysqli_query($conn,"SELECT * FROM orders where orderStatus = 'pending'");
                            $result3 = mysqli_num_rows($select3);
                         ?>
                  <div class="mr-5"><?php echo $result3; ?> Pending!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="pendingOrders.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
           <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Pie Chart</div>
            <div class="card-body">
              <canvas id="pie-chart" width="100%" height="30"></canvas>
<script>
	new Chart(document.getElementById("pie-chart"),{
		type: 'pie',
		data: {
			labels: ["Cancelled", "For Delivery", "Delivered", "Pending"],
			datasets: [{
				labels: "Employee Chart",
				backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9"],
				data: [<?php echo $result; ?>, <?php echo $result1; ?>, <?php echo $result2; ?>, <?php echo $result3; ?>]
			}]
		},
		options: {
			title: {
				display: true,
				text: "Employee Table"
			}
	}

});
</script>
            </div>
            <div class="card-footer small text-muted"><b><center>Metro Health Management</center></b></div>
          </div>
<?php include('footer.php');?>
</body>
</html>