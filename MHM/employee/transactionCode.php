<?php
require("../database/sql_connect.php");
require('employeeTable.php');
$sql="SELECT * FROM transaction_code ORDER BY transactionCode_id DESC";
$data = mysqli_query($conn, $sql);
    if(!$data){
        echo "Error in query";
    }
    //search bar
    if(isset($_GET['submit'])){
                                              
    $sql=$_GET['search'];
    $trimmed = trim($sql);

    $query = "SELECT * FROM transaction_code
            WHERE transactionCode LIKE '%{$trimmed}%' OR dateInputted LIKE '%{$trimmed}%'";
      
    $data = mysqli_query($conn, $query);
  }
    
  
?>
<style>
.has-error .checkbox,.has-error .checkbox-inline,.has-error .control-label,.has-error .help-block,.has-error .radio,.has-error .radio-inline,.has-error.checkbox label,.has-error.checkbox-inline label,.has-error.radio label,.has-error.radio-inline label{color:#a94442}
.has-error .form-control{border-color:#a94442;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075)}
.has-error .form-control:focus{border-color:#843534;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483;box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483}.has-error .input-group-addon{color:#a94442;background-color:#f2dede;border-color:#a94442}.has-error .form-control-feedback{color:#a94442}

.error {
  color: red;
  font-size: 0.8em;
}
.required {
    color: red;
}
</style>
<div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="transactionCode.php"><b>Transaction Codes</b></a>
            </li>
            <li class="breadcrumb-item">
              <a href="pendingOrders.php"><b>Orders</b></a>
          </ol>
        </div>
        
                                   <!-- searchbar ending -->
<!-- TABLE -->
<!-- modal -->
<div style="text-align:center">
<button type='button' class='btn btn-primary' data-toggle="modal" data-target="#addSupplier"><i class="fas fa-plus"></i> Add Transaction Code</button> 
          </div> <br> <br>
          <div class="modal fade" id="addSupplier">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                      <h5>Add Code</h5><br>
                        <button type="button" class="close" data-dismiss="modal"> &times;</button>                       
                    </div>
                <div class="modal-body">
                <center>
                  <form method="POST" action="insertTrans.php">                        
                    <b>Transaction Code:<span class="required">*</span></b><br><input type="text" name="code" placeholder="Transaction Code" size="30" required="required"> <br> <br>
                    <b>Status:<span class="required">*</span></b><br><select name="status">
                      <option value="Pending">Pending</option>
                      <option value="Done">Done</option>
                    </select>
                    <br><br><b>Date received:<span class="required">*</span></b><br><input type="date" name="date" placeholder="Date" size="30" required="required" value="<?php echo date('F d, Y'); ?>"> <br> <br> 
</center>
<center>
   <div class="float-center">
                         <button class ="btn btn-danger" type='reset'> Reset </button> &nbsp;
                        <button class = "btn btn-success" type='submit'> Submit </button>
                            </div>       
                    </form>           
</center>
</div>
</div>
</div>
</div>
<div class="row">
        <!-- searchbar starting -->
                                      <div class='col-sm-9'>
                                    </div>
                                     <div class="col-sm-3">
                                      <div class="input-group custom-search-form">
                                        <form  method="GET" action=""  id="searchform"> 
                                          <input  type="text" name="search" placeholder="Search for Code..">
                                                   
                                                <button class="btn btn-info" type="submit" name="submit">
                                                  <i class="fa fa-search"></i>
                                                </button>
                                        </form> 
                                                </div>
                                        </div>
                                   </div>
<!-- end of modal -->
<center><h1>Code</h1></center>
<div class="table-responsive">
            <table class='table table-striped' style='width:97%;margin:1% auto;'>
            <thead>
              <tr>
                <th>Transaction Code</th>
                <th>Date Received</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
<?php
while($row=mysqli_fetch_array($data))
{
  echo "<tr>";
  echo "<td>{$row['transactionCode']}</td>";
    $date = date("F d, Y",strtotime($row['dateInputted']));
              echo "<td>".$date."</td>";
 
  if($row['status'] == 'Pending'){
                echo "<td><button type='button' class='btn btn-primary btn-sm'><a href='updateTransStatus.php?transactionCode_id=".$row['transactionCode_id']."' style='color:white' onClick=\"return confirm('Are you sure you want to update status?')\">{$row['status']}</a></button></td>";
              }
              else{
                echo"<td><button type='button' class='btn btn-success btn-sm active'>{$row['status']}</button> </td>";
              }
  $code = "SELECT * FROM transaction_code WHERE transactionCode_id = '{$row['transactionCode_id']}' ";
  $codeResult = mysqli_query($conn,$code);
  $getCode = mysqli_fetch_assoc($codeResult);
  // echo "<td><center>";
  echo "<td><center><button type='button' class='btn btn-primary btn-sm' style='color:white' data-toggle='modal' data-target='#edit_code".$row['transactionCode_id']."'><i class='fa fa-edit'></center></td>";
  include('editCode.php');
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
  $("#transactionTable").DataTable();
});
</script>
<?php include('footer.php');?>

