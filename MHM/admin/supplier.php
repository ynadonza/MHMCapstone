<?php 
require("../database/sql_connect.php");
// require('session.php');
$query = "SELECT * FROM suppliers 
      JOIN address
      ON suppliers.add_id = address.add_id";
$data = mysqli_query($conn, $query);
    if(!$data){
        echo "Error in query";
    }      
?>
<?php include('header.php');?> 
<style>
input[type='text']{
    width: 40%;
    height: 4px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
}
input[type='number']{
    width: 40%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
}

</style>

<html>

<body>
<div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="supplier.php"><b>Suppliers</b></a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
<div style="float:right">
<button type='button' class='btn btn-primary'><i class="fas fa-plus"></i><a href='addSupplier.php' style="color:white"> Add Supplier</a></button></div> <br>
        </div>
        
  <div class='panel panel-primary' style='width:97%;margin:5% auto;'>
    <div class='panel-heading'>
   <!--  <h3 class='panel-title'><b>SUPPLIERS</b></h3> -->
  </div>
  <div class='panel-body'>
<table id='employeeTable' class='table table-striped'>
<thead>
  <tr class='table-primary'>
                <th><center>#</center></th>
                <th><center>Supplier Name</center></th>
                <th><center>Email</center></th>
                <th><center>Contact</center></th>
                <th><center>Address</center></th>
                <th></th>
                <th><center>Action</center></th>
                <th></th>
               
</tr>
</thead>
<tbody>
  <?php
while($row=mysqli_fetch_array($data))
{
  echo "<tr>";
  echo "<td><center>".$row['supplier_id']."</center></td>";
  echo "<td><center>".$row['company_name']."</center></td>";
  echo "<td><center>".$row['email']."</center></td>";
  echo "<td><center>".$row['contact']."</center></td>";
  echo "<td><center>".$row['street'].',&nbsp;'.$row['brgy'].',&nbsp;'.$row['city'].',&nbsp;'.$row['province'].',&nbsp;'.$row['zip_code']."</center></td>";
  // $supp = "SELECT * FROM suppliers WHERE supplier_id = '{$row['supplier_id']}' ";
  // $getResult = mysqli_query($conn,$supp);
  // $getsupp = mysqli_fetch_assoc($getResult);

  // echo "<td><center>";
  // echo "<td><center><button type='button' class='btn btn-primary' style='color:white' data-toggle='modal' data-target='#edit_supplier".$row['supplier_id']."'><i class='fa fa-edit'></center></td>";
  // include('editSuppliers.php');
  echo "<th></th>";
  echo "<td><center><button type='button' class='btn btn-primary'><a href='editSuppliers.php?supplier_id=".$row['supplier_id']."' style='color:white' onClick=\"return confirm('Are you sure you want to edit supplier?')\"><i class = 'fa fa-edit'></i></a></button></td>";
  echo "<td><center><button type='button' class='btn btn-danger'><a href='deleteSuppliers.php?supplier_id=".$row['supplier_id']."' style='color:white' onClick=\"return confirm('Are you sure you want to delete supplier?')\"><i class = 'fa fa-trash'></i></a></button></td>";
  echo "</tr>";
  }
  ?>
</tbody>
</table>
</div>
</div>
</body>
</html>

<script>
$(document).ready(function(){
  $("#employeeTable").DataTable();
});
</script>