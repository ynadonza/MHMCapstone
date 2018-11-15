<?php 
  require("../database/sql_connect.php");
  ?>
 <?php
 $order_id = $_GET['order_id'];
$query = "UPDATE orders
      SET 
      orderStatus = 'For Delivery'
      WHERE order_id = ('$order_id')";
$data = mysqli_query($conn, $query);
if($data == true){

  $getquantity = "SELECT * FROM orderdetails WHERE order_id = ".$order_id." ";

  $result = mysqli_query($conn,$getquantity);

  if (!$result) {
    echo mysqli_error($conn);
  } else {

    $order_prodId = array();
    $order_qty = array();
    $tempQty = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
      $order_prodId[] = $row['prod_id'];
      $order_qty[] = $row['orderQty'];
    }

    $count = count($order_prodId);
    
    for ($i=0; $i < $count; $i++) { 

      $getquantity = "SELECT qty FROM products WHERE prod_id = ".$order_prodId[$i]." ";

      $resultGetquantity = mysqli_query($conn,$getquantity);

      if (!$resultGetquantity) {
        echo mysqli_error($conn);
      } else {
        $dataQuantity = mysqli_fetch_assoc($resultGetquantity);
        $tempQty[$i] = $dataQuantity['qty'] - $order_qty[$i];
        $updateQty = "UPDATE `products` SET `qty`= '{$tempQty[$i]}' WHERE prod_id = ".$order_prodId[$i]." ";
        $resultUpdateQty = mysqli_query($conn,$updateQty);

        if (!$resultUpdateQty) {
          echo mysqli_error($conn);
        }

      }
    }

    header("location:forDelivery.php");

  }

  
}else{
  echo mysqli_error($conn);
}

  


 ?>