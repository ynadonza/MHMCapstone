<?php
require("../database/sql_connect.php");
// require("session.php");
$query = "SELECT * FROM users 
      JOIN address
      ON users.add_id = address.add_id WHERE user_type= 'employee'";
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
              <a href="employee.php"><b>Employees</b></a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
<div style="float:right">
<button type='button' class='btn btn-primary' data-toggle="modal" data-target="#addSupplier"><i class="fas fa-plus"></i> Add Employee</button> 
          </div> <br>
          <div class="modal fade" id="addSupplier">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                      <h5>Add Employee</h5><br>
                        <button type="button" class="close" data-dismiss="modal"> &times;</button>                       
                    </div>
                <div class="modal-body">
                <center>
                  <form method="POST" action="insertEmployee.php">                        
                    <b>Firstname</b><br><input type="text" name="fname" placeholder="Firstname" size="30" required> <br> <br>
                    <b>Middlename</b><br><input type="text" name="mname" placeholder="Middlename" size="30" required> <br> <br>
                    <b>Lastname</b><br><input type="text" name="lname" placeholder="Lastname"  size="30" required> <br> <br>
                    <b>Username</b><br><input type="text" name="username" placeholder="Username" size="30" required> <br> <br>
                    <b>Email Address</b><br><input type="text" name="email" placeholder="Email" size="30" required> <br> <br>
                    <b>Password</b><br><input type="password" name="password" placeholder="Required (6-12 Characters)" size="30" required> <br><br>
                    <b>Contact Number:</b><br><input type="text" name="contact" placeholder="Contact" size="30" required> <br> <br>
                    <b>Street:</b><br> <input type='text' name='street' placeholder='Street' size="30" required> <br> <br>
                    <b>Barangay:</b><br> <input type='text' name='brgy' placeholder='Barangay' size="30" required> <br> <br>
                    <b>City:</b><br> <input type='text' name='city' placeholder="City" size="30" required> <br> <br>
                    <b>Province:</b><br> <input type='text' name='province' placeholder="Province" size="30" required> <br> <br>
                    <b>Zip code:</b><br> <input type='text' name='zip' placeholder="Zip Code" size="30" required> <br> <br>
                     <br>
                 </center>
                            <div class="float-right">
                                <button class ="btn btn-danger" type='reset'> Reset </button> &nbsp;
                        <button class = "btn btn-success" type='submit'> Submit </button>
                            </div>                  
                  </form>               
              </div>
            </div>
          </div>
        </div>
	<div class='panel panel-success' style='width:97%;margin:5% auto;'>
		<div class='panel-heading'>
	</div>
	<div class='panel-body'>
<table id='employeeTable' class='table table-striped'>
<thead>
	<tr>
				        <th><center>#</center></th>
                <th><center>Employee Name</center></th>
                <th><center>Username</center></th>
                <th><center>Contact</center></th>
                <th><center>Address</center></th>
                <th><center>Change Password</center></th>
                <th><center>Employee's Information</center></th>
                <th><center>Action</center></th>
</tr>
</thead>
<tbody>
	<?php
while($row=mysqli_fetch_array($data))
{
	echo "<tr>";
	echo "<td><center>".$row['user_id']."</center></td>";
	echo "<td><center>".$row['fname'].'&nbsp;'.$row['lname']."</center></td>";
  echo "<td><center>".$row['username']."</center></td>";
  echo "<td><center>".$row['contact']."</center></td>";
   echo "<td><center>".$row['street'].',&nbsp;'.$row['brgy'].',&nbsp;'.$row['city'].',&nbsp;'.$row['province'].',&nbsp;'.$row['zip_code']."</center></td>";
  echo "<td><center><button type='button' class='btn btn-primary'><a href='changeEmpPassword.php?user_id=".$row['user_id']."' style='color:white'>Change Password</a></button></center></td>";
  echo "<td><center><button type='button' class='btn btn-primary'><a href='editEmployee.php?user_id=".$row['user_id']."' style='color:white' onClick=\"return confirm('Are you sure you want to edit?')\">Edit Details</i></a></button></center></td>";
	echo "<td><center><button type='button' class='btn btn-danger'><a href='deleteEmployee.php?user_id=".$row['user_id']."' style='color:white' onClick=\"return confirm('Are you sure you want to delete?')\"><i class = 'fa fa-trash'></i></a></button></center></td>";
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