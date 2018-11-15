<?php 
session_start();
include("functions/function.php");

require("../database/sql_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
</head>
<body>
	
	<?php

		$totalAmount = 0;

    echo "<pre>";
    print_r($_SESSION['prod_cart']);
    echo "</pre>";

		foreach($_SESSION['prod_cart'] as $row){
                  $subTotal = $row['qty'] * $row['selling_price'];
                  $totalAmount +=$subTotal; 
                  if($totalAmount < 1000){
                     $total = $totalAmount + 150;

                  }else if($totalAmount >= 1000){
                    $total = $totalAmount + 0;
                  }                                       
        }

        $insertOrder = "INSERT INTO orders( user_id, order_date, total_amount, orderStatus, paymentStatus) VALUES (".$_SESSION['user_id'].", NOW(),".$total.",'pending', 'unpaid')";

        $resultOrder = mysqli_query($conn,$insertOrder);

        if (!$resultOrder) {
        	echo mysqli_error($conn);
        }else{
        	
        	$order_id = mysqli_insert_id($conn);
        	foreach ($_SESSION['prod_cart'] as $row) {
        		$total = $row['qty'] * $row['selling_price'];
        		$insertDetails = "INSERT INTO orderdetails( order_id, prod_id, orderQty, subTotal) 
        						VALUES (".$order_id.", ".$row['prod_id'].", ".$row['qty'].", ".$total." )";
        		$resultDetails = mysqli_query($conn,$insertDetails);
            if (!$resultDetails) {
              echo mysqli_error($conn);
              echo "<br>";
              $i = false;
            } else {
              $i = true;
            }
        	}

          if ($i==true){
              mysqli_close($conn);
              $_SESSION['success'] = array("Your order is already reserved.");
              $_SESSION['prod_cart'] = NULL;
              header("location:orders.php");
          }


        }
	?>
</body>
</html>