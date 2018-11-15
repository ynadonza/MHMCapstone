<?php
require("../database/sql_connect.php");
// require("../admin/session.php");
$query = "SELECT * FROM users 
      JOIN address
      ON users.add_id = address.add_id WHERE user_type= 'customer'";
$data = mysqli_query($conn, $query);
    if(!$data){
        echo "Error in query";
    }
?>
<?php include('header.php');?>
<style>
input[type='text']{
    width: 50%;
    height:5%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
}
input[type='password']{
   width: 50%;
   height: 5%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
}
</style>

<html>
<link rel="stylesheet" type="text/css" href="../datatables/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">
<link rel="stylesheet" type="text/css" href="../datatables/dataTables.bootstrap.css">
<body>
<div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="customers.php"><b>Customers</b></a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>

         
	<div class='panel panel-success' style='width:97%;margin:5% auto;'>
		<div class='panel-heading'>
	</div>
	<div class='panel-body'>
<table id='employeeTable' class='table table-striped'>
<thead>
	<tr>
				        <th><center></center></th>
                <th><center>Customer Name</center></th>
                <th></th>
                <th><center>Username</center></th>
                <th></th>
                <th><center>Email Address</center></th>
                <th></th>
                <th><center>Contact Number</center></th>
                <th></th>
                <th><center>Address</center></th>
                
</tr>
</thead>
<tbody>
	<?php
while($row=mysqli_fetch_array($data))
{
	echo "<tr>";
	echo "<td><center>".$row['user_id']."</center></td>";
	echo "<td><center>".$row['fname'].'&nbsp;'.$row['lname']."</center></td>";
  echo "<td></td>";
	echo "<td><center>".$row['username']."</center></td>";
  echo "<td></td>";
	echo "<td><center>".$row['email']."</center></td>";
  echo "<td></td>";
	echo "<td><center>".$row['contact']."</center></td>";
  echo "<td></td>";
	echo "<td><center>".$row['street'].',&nbsp;'.$row['brgy'].',&nbsp;'.$row['city'].',&nbsp;'.$row['province'].',&nbsp;'.$row['zip_code']."</center></td>";
	
	echo "</tr>";
	}
	?>
</tbody>
</table>
</div>
</div>
</body>
</html>
<script src="../datatables/jquery.min.js"></script>
<script src="../datatables/datatables.min.js"></script>
<script>
$(document).ready(function(){
	$("#employeeTable").DataTable();
});
</script>
<!-- -->