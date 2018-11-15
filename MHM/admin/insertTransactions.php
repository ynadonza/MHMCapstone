<?php require("../database/sql_connect.php");

// if(isset($_POST['submit'])){
// 	$
// }

			$sql = "INSERT INTO transactions
					(supplier_name, product_name, qty, date_of_transaction)
				VALUES
					('{$_POST['supplierName']}', '{$_POST['prod_name']}', '{$_POST['qty']}', NOW())";

			$result = mysqli_query($conn, $sql);

			if($result == true){
				header("location:addTransactions.php");
			}else{
				echo mysqli_error($conn);
				exit();
			}
		

?>

