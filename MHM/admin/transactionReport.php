<?php 
require("../database/sql_connect.php");
// require("session.php");


$query = "SELECT company_name,photo,prod_name,type,description,qty,unit_price FROM products 
          JOIN suppliers 
          ON products.supplier_id = suppliers.supplier_id   
          WHERE date_added = '".$_GET['dateAdded']."' ";

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
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="transactions.php"><b>Transactions</b></a>
              </li>
              <li class="breadcrumb-item active">Tables</li>
            </ol>
<!--             <div style="float:right">
<button type="button" class="btn btn-primary"><a href="addTransactions.php" style="color:white"><i class="fas fa-plus"></i> Add Transactions</a></button>       </div> -->
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
                  <th>Category</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Supplier</th>
                </tr>
              </thead>
              
              <tbody>
        
      <?php
          
          while ($row = mysqli_fetch_array($data)){
              echo "<tr>";
              echo "<td><img src='{$row['photo']}'' width='70' height='70' ></td>";
              echo "<td>".$row['prod_name']."</td>";
              echo "<td>".$row['type']."</td>";
              echo "<td>".$row['description']."</td>";
              echo "<td>".$row['qty']."</td>";
              echo "<td>".$row['unit_price']."</td>";
              echo "<td>".$row['company_name']."</td>";
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