<?php 
require("../database/sql_connect.php");


$query = "SELECT DISTINCT dateProcess FROM restocks";

$data = mysqli_query($conn, $query);

if (!$data) {
   echo mysqli_error($conn);
}     
?>
<?php include("header.php");?>
<html>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-3.3.1.js">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js">
<body>
<div id="content-wrapper">
	<div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        	<li class="breadcrumb-item">
        		<a href="#">Restocks</a>
        	</li>
        	<li class="breadcrumb-item active">Tables</li>
        </ol>
         
    	<div id="page-inner"> 
    		<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
 							<div class='panel panel-success' style='width:97%;margin:5% auto;'>
    <!-- <div class='panel-heading'> </div> -->
  								<div class='panel-body'>
									<table id='transactionTable' class='table table-striped'>
                        				<div class="card-content"> 
                              				<thead>
                                				<tr>
                                  					<th>Date of Restock</th>
                                 					<th><center>Details</center></th>
                               					</tr>
                              				</thead>
                           		 			<tbody>
                              					<?php
 													while ($row = mysqli_fetch_array($data)){
  														echo "<tr>";
                              $date = new DateTime($row['dateProcess']);
                              $formatDate = $date->format('F j, Y');
  														echo "<td>".$formatDate."</td>";
   														echo "<td><button type ='button' class='btn btn-primary'><a href='restockReport.php?dateAdded=".$row['dateProcess']."' style='color:white'> <i class ='fa fa-pencil'> View Details </a></td>";  
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