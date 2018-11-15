<?php
require("../database/sql_connect.php");

$query = "SELECT photo,prod_name,quantity,restocks.unit_price FROM restocks
          JOIN products 
          ON restocks.prod_id = products.prod_id   
          WHERE dateProcess = '".$_GET['dateAdded']."' ";

$data = mysqli_query($conn, $query);

if (!$data) {
    echo "Error in query";
}


?>
<?php include("header.php");?>
<html>
<link rel="stylesheet" type="text/css" href="../datatables/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">
<link rel="stylesheet" type="text/css" href="../datatables/dataTables.bootstrap.css">
<body>
    
    <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="viewRestock.php">Restocks</a>
              </li>
              <li class="breadcrumb-item active">Tables</li>
            </ol>

            <div id="page-inner"> 
              <div class="row">
                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                      <div class='panel panel-success' style='width:97%;margin:5% auto;'>
                      
                      <div class='panel-heading'> </div>

                      <div class='panel-body'>
      
      <table id='transactionTable' class='table table-striped'>
                        
          <div class="card-content"> 
                              
              <thead>
                <tr>
                  <th>Photo</th>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                </tr>
              </thead>
              
              <tbody>
        
      <?php
          
          while ($row = mysqli_fetch_array($data)){
              echo "<tr>";
              echo "<td><img src='{$row['photo']}'' width='70' height='70' ></td>";
              echo "<td>".$row['prod_name']."</td>";
              echo "<td>".$row['quantity']."</td>";
              echo "<td>".$row['unit_price']."</td>";
              echo "</tr>";
          }                            
      ?>
      
      </tbody>
        
      </table>
                      </div>
                      </div>
      <!-- /.content-wrapper -->

                    </div>
    <!-- /#wrapper -->
            </div>
            </div>
        
        </div>

    </div>

  </body>
<?php include("footer.php") ?>
</html>
<script src="../datatables/jquery.min.js"></script>
<script src="../datatables/datatables.min.js"></script>
<script>
$(document).ready(function(){
  $("#transactionTable").DataTable();
});
</script>