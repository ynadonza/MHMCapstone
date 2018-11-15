<?php
session_start();
include('../sql_connect.php');

$filename=NULL;
if(isset($_FILES['prodPhoto']) && count($_FILES['prodPhoto']) > 4){
	if($_FILES['prodPhoto']['type'] == "image/png" || $_FILES['prodPhoto']['type'] == "image/jpeg/jpg/png"){
		if($_FILES['prodPhoto']['size'] <= 10000000){
			$filename="../admin/img/".$_FILES['prodPhoto']['name'];
			move_uploaded_file($_FILES['prodPhoto']['tmp_name'], $filename);
			echo $filename;
		}
	}
}

$sql="INSERT INTO products (prod_id, type, description, unit_price, market_price, qty, status, photo, trans_id) VALUES ('{$_POST['prodType']}', '{$_POST['prodDesc']}', '{$_POST['unitPrice']}', '{$_POST['marketPrice']}', '{$_POST['qty']}', 'null', '{$filename}', 'null')";
$result=mysqli_query($conn, $sql);
if($result == true){
	header("location:products.php");
}else{
	echo mysqli_error($conn);
	exit();
}
?>
