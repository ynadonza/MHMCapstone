<?php 
require("../database/sql_connect.php");
// require("session.php");

/*$query = "SELECT DISTINCT suppliers.supplier_id, transactions.trans_id, date_of_transaction, company_name FROM suppliers 
          JOIN products ON products.supplier_id = suppliers.supplier_id
          JOIN transactions ON transactions.trans_id = products.trans_id ORDER BY date_of_transaction DESC";*/

$query = "SELECT DISTINCT date_of_transaction FROM transactions";

$data = mysqli_query($conn, $query);
    if(!$data){
        echo "Error in query";
        echo mysqli_error($conn);
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
              <a href="transactions.php"><b>Transactions</b></a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
         <!--   <div style="float:right">
            <button type="button" class="btn btn-primary"><a href="addTransactions.php" style="color:white"><i class="fas fa-plus"></i> Add Transactions</a></button> 
          </div> -->
      <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
  <div class='panel panel-success' style='width:97%;margin:5% auto;'>
    <div class='panel-heading'>
  </div>
  <div class='panel-body'>
<table id='transactionTable' class='table table-striped'>
                        <div class="card-content"> 
                              <thead>
                                <tr>
                                  <th>Date of Transaction</th>
                                  <th><center>Details</center></th>
                                </tr>
                              </thead>
                            <tbody>
                              <?php
 while ($row = mysqli_fetch_array($data)){
  echo "<tr>";
  $date = new DateTime($row['date_of_transaction']);
  $formatDate = $date->format('F j, Y');
  echo "<td>".$formatDate."</td>";
   echo "<td><button type ='button' class='btn btn-primary'><a href='transactionReport.php?dateAdded=".$row['date_of_transaction']."' style='color:white'> <i class ='fa fa-pencil'> View Details </a></td>";  
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