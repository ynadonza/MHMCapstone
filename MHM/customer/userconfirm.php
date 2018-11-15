<?php

require("../database/sql_connect.php");

?>

<body>
<style>
  p.round2 {
   
    text-align: justify;
}
 #box {
    border: 2px solid blue;
    border-radius: 8px;
    border-width: 2px;
    background-color: #e9ecef;
    width: width:100%;
    padding: 20px;    
   
}
.cartqty{
      width: 50px;
      height: 25px;
      padding-left: 5px;
      font-size: 12px;
    }
 #box1 {
 
    border-radius: 8px;
    border-width: 1px;
    background-color: #e9ecef;
    width: 90%;
    padding: 5px;    
   
 }

  .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
<?php include("userheader.php"); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="../datatables/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">
<link rel="stylesheet" type="text/css" href="../datatables/dataTables.bootstrap.css">

<?php include("usermenu.php"); ?>
<?php include("checkUserAcc.php"); ?>

<div class="cart_main">
	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="userindex.php">Home</a></li>
		  <li><a href="usercart.php">Cart</a></li>
		  <li class="active">Confirm Order</li>
		 </ol>	

     <!--instructions -->
     <center>

      <div id = "box">
        <p><i class="fa fa-exclamation-triangle"></i> In order to proceed with your order, kindly finish and fully understand the 
            following instructions below:</p>

        <p class="round2">
              A. How to pay for your order? 
	              <div id = "box1">
	          		
	          		<p class="round2">1. Payment should only be done with these following service provider: <br>
	               	 <b> 
	               	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Cebuana Lhuillier <br>
	              	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Palawan Express Padala  <br>
	              	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - M Lhuillier Financial Services <br>
	              	</b>
	              	2. Locate the nearest service provider mentioned above in your area. <br>
	              	3.  The payment should be sent under the following: (Please copy the details) <br>
	              			<b>
	              			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name: Metro Health Management <br>
	              			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Address: Cebu City <br>
	              			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contact Number: 09221378201 <br>
	              		   </b>
	              	4. After paying, access again the MHM website and go to <b>"Track Order"</b> located at the upper left of the site. And click &nbsp;&nbsp;&nbsp;&nbsp;<b>"View Order Details"</b> <br>
	              	5. After, click <b>"Proceed To Payment".</b> Select the service provider that you have transact with and fill up the following &nbsp;&nbsp;&nbsp;&nbsp;details in the form. 
	              </p>
	             </div>
           	<p class="round2">	
              B. If you are satisfied with the items you selected proceed to the next step 
                 by clicking the button <b>"Confirm Order"</b>. <br><br>
              C. <b>Take note that after clicking the "Confirm Order" button, you can no longer cancel your order.</b> 
          </p>
               <div>
               	<form action="insertOrder.php" method="POST">
				   <input type="checkbox" name="terms" required> By checking, you have read the instructions stated above.<br>
				                 	
				</div>
      </div>


     </center>	
     <br>
     <br>	
     	   <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-success">
    			<div class="panel-heading">
    				<h3 class="panel-title"> <center><h5>My Shopping Bag (<?php echo count(@$_SESSION['prod_cart']); ?>)</h5></center></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
                                	<td class="text-center"><strong>Image</strong></td>
        							<td class="text-center"><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-center"><strong>Subtotal</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							
				 			<?php
              
				                if(isset($_SESSION['prod_cart'])){
				                  $subTotal = 0;
				                  $totalAmount = 0;

				                foreach($_SESSION['prod_cart'] as $row){
				                  $subTotal = $row['qty'] * $row['selling_price'];
				                  $totalAmount +=$subTotal;
				                                    echo "<tr>";
				                                
				                                    ?>
				                                     <?php  echo "<td class='text-center'><img src='../admin/{$row['photo']}' style='width: 100px;height: 100px;'</td>"; ?>
				                                    <?php
				                                    "</td>";
				                                    ?>

				                                    <?php  echo "<td class='text-center'>{$row['prod_name']}</td>"; ?>
				                                    <?php $selling_price = number_format($row['selling_price'],2); ?>
				                                    <?php  echo "<td class='text-center'>".$selling_price."</td>"; ?>
				                                    <?php  echo "<td class='text-center'>{$row['qty']}</td>"; ?>
				                                    <?php $subTotal = number_format($subTotal,2); ?>
				                                    <?php  echo "<td class='text-center'>$subTotal</td>"; ?>
				                                    
				                                    <?php
				                                    echo "</tr>";
				                               }
				                           
                                        ?>
                               
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Amount:</strong></td>
    								<td class="thick-line text-right">&#8369;<?php echo number_format($totalAmount,2); ?></td>
    							</tr>
    							<?php 
    								if ($totalAmount<1000) {
    									$total = $totalAmount + 150;
    							 ?>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping:</strong></td>
    								<td class="no-line text-right">&#8369;150.00</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total Amount:</strong></td>
    								<td class="no-line text-right">&#8369;<?php echo number_format($total,2); ?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-right" style="color:red">Note: Order will be delivered 4-5 days.</td>
    								
    							</tr>
    							<?php }else if($totalAmount >=1000){
    									$total = $totalAmount + 0; ?>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping:</strong></td>
    								<td class="no-line text-right">Free</td>
    							</tr>

    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total Amount:</strong></td>
    								<td class="no-line text-right">&#8369;<?php echo number_format($total,2); ?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-right" style="color:red">Note: Order will be delivered 2-3 days.</td>
    								
    							</tr>
    							
    							
    							<?php } ?>
    							<?php } ?>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    				
    	</div>
    </div>
       
        
        <button type="submit" class="btn btn-primary" style="float:right" ><i class="fa fa-check"></i> Confirm Order/s</button> <br><br><br>
      </form>   
  </div>
</div>
</body>
<!---->
<div>
<?php include("footer.php") ?>
</div>
