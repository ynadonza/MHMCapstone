<?php require("../database/sql_connect.php");
$date = "{$_POST['date']}";
$query = "INSERT INTO transaction_code
				(transactionCode_id,transactionCode, dateInputted, status)
			VALUES
				('','{$_POST['code']}', '$date', '{$_POST['status']}')";
$result = mysqli_query($conn, $query);
if($result == true){
				header("location:transactionCode.php");
			}else{
				echo mysqli_error($conn);
				exit();
			}
?>

