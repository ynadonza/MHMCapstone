<?php

require("../database/sql_connect.php");

?>

<body>
<style>
  p.round2 {
   
    text-align: justify;
}
 #box {
    border: 2px solid black;
    border-radius: 8px;
    border-width: 2px;
    background-color: lightgrey;
    width: 300px;
    padding: 10px;    
    background-color: lightgrey;
}
* {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 30%;
    padding: 5px;
    padding-left: 70px;
}

/* Clearfix (clear floats) */
.row::after {
    content: "";
    clear: both;
    display: table;
}
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
<?php include("userheader.php"); ?>
<link rel="stylesheet" type="text/css" href="../datatables/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">
<link rel="stylesheet" type="text/css" href="../datatables/dataTables.bootstrap.css">
<?php include("usermenu.php"); ?>

<div class="cart_main">
	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="userindex.php">Home</a></li>
		  <li><a href="orders.php">Orders</a></li>
 
		  <li class="active">Choose payment menthod</li>
		 </ol>	

     <!--instructions -->
     <center>
      <div id = "box">
        <p><i class="fa fa-exclamation-triangle"></i> Please select a service provider</p> 
        
      </div><br><br>
      
     </center>	
   
  <div class="container">
     <div class="row">
      <span>
        <div class="column">
         <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cebuana"><img src="image/cebuana.png" class="img-responsive" alt="" style="width: 280px;height: 150px;"></button> -->
         <button onclick="document.getElementById('cebuana').style.display='block'" class="btn btn-primary"><img src='image/cebuana.png' style="width: 250px;height: 150px;"></button>
          <!--cebuana modal -->
            <div id="cebuana" class="modal">
               <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Cebuana Lhuillier</h5>
                     
                    </div>
                      <div class="modal-body">
                        <center>

                          <?php 
                             $or_id = $_GET['order_id'];
                             $query = "SELECT * FROM orders WHERE order_id = ".$or_id."";
                             $result = mysqli_query($conn,$query);
                             $data = mysqli_fetch_assoc($result);
                          ?>
                           <b><span class="required">Total Amount to be paid: &#8369;<?php echo number_format($data['total_amount'],2)?></span></b> <br>
                      <form method="POST" <?php echo " action='insertPayment.php?order=".$or_id."' "; ?>> 
                         Service Provider: <br><b><input type="text" style="text-align:center;" name="service_provider" value="Cebuana" readonly></b><br><br>
                         Transaction Code:<span class="required">*</span> <br><input type="text" name="transactionCode" required ><br><br>
                         Sender's Name:<span class="required">*</span><br> <input type="text" name="sender" required><br><br>
                         Contact Number:<span class="required">*</span> <br><input type="text" name="contact" required><br><br>
                        Amount Paid:<span class="required">*</span> <br><input type="text" name="amountPaid" required>
                        </center>
                     </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" onclick="document.getElementById('cebuana').style.display='none'" class="button display-bottom">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
           <!--end cebuana modal -->
        </div>
       </span>
       <span>
        <div class="column">
            <button onclick="document.getElementById('mlhuillier').style.display='block'" class="btn btn-primary"><img src='image/mlhuillier.jpg' style="width: 250px;height: 150px;"></button>
          <!--mlhuillier modal -->
            <div id="mlhuillier" class="modal">
               <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">M Lhuillier</h5>
                     
                    </div>
                      <div class="modal-body">
                        <center>
                           <?php 
                             $or_id = $_GET['order_id'];
                             $query = "SELECT * FROM orders WHERE order_id = ".$or_id."";
                             $result = mysqli_query($conn,$query);
                             $data = mysqli_fetch_assoc($result);
                          ?>
                           <b><span class="required">Total Amount to be paid: &#8369;<?php echo number_format($data['total_amount'],2)?></span></b> <br>
                        <form method="POST"<?php echo " action='insertPayment.php?order=".$or_id."' "; ?>>
                         Service Provider: <br><b><input type="text" style="text-align:center;" name="service_provider" value="M Lhuillier" readonly></b><br><br>
                         Transaction Code:<span class="required">*</span> <br><input type="text" name="transactionCode" required><br><br>
                         Sender's Name:<span class="required">*</span><br> <input type="text" name="sender" required><br><br>
                         Contact Number:<span class="required">*</span> <br><input type="text" name="contact" required><br><br>
                         Amount Paid:<span class="required">*</span> <br><input type="text" name="amountPaid" required>
                        </center>
                     </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" onclick="document.getElementById('mlhuillier').style.display='none'" class="button display-bottom">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
           <!--end palawan modal -->
        </div>
      </span>
      <span>
        <div class="column">
           <button onclick="document.getElementById('palawan').style.display='block'" class="btn btn-primary"><img src='image/palawan.jpg' style="width: 250px;height: 150px;"></button>
          <!--palawan modal -->
            <div id="palawan" class="modal">
               <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Palawan Express</h5>
                     
                    </div>
                      <div class="modal-body">
                        <center>
                           <?php 
                             $or_id = $_GET['order_id'];
                             $query = "SELECT * FROM orders WHERE order_id = ".$or_id."";
                             $result = mysqli_query($conn,$query);
                             $data = mysqli_fetch_assoc($result);
                          ?>
                           <b><span class="required">Total Amount to be paid: &#8369;<?php echo number_format($data['total_amount'],2)?></span></b> <br>
                        <form method="POST" <?php echo " action='insertPayment.php?order=".$or_id."' "; ?>>
                         Service Provider: <br><b><input type="text" style="text-align:center;" name="service_provider" value="Palawan Express" readonly></b><br><br>
                         Transaction Code:<span class="required">*</span> <br><input type="text" name="transactionCode" required><br><br>
                         Sender's Name:<span class="required">*</span><br> <input type="text" name="sender" required><br><br>
                         Contact Number:<span class="required">*</span> <br><input type="text" name="contact" required><br><br>
                         Amount Paid:<span class="required">*</span> <br><input type="text" name="amountPaid" required>
                        </center>
                     </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" onclick="document.getElementById('palawan').style.display='none'" class="button display-bottom">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
           <!--end palawan modal -->
        </div>
      </span>
      </div>
    </div>
    
      <br><br><br>
 
  </div>
</div>
 
</body>
<!---->
<div>
<?php include("footer.php") ?>
</div>