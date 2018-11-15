<?php

$query = "SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}' ";

$res = mysqli_query($conn, $query);

$data = mysqli_fetch_assoc($res);

if ($data['contact']==0) {
	$message = "Please manage account first to order.";
    echo "<script type='text/javascript'>alert('$message');window.location='editAccount.php?user_id=".$data['user_id']."';</script>";
}

?>