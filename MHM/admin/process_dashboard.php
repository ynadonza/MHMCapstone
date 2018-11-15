<?php include('../database/sql_connect.php');
$date = $_GET['order_date'];
$output = "";
	$query = mysqli_query($conn, "SELECT  prod_name,sum(order_details.subTotal) as subTotal,sum(orderQty) as order_details.orderQty, orders.order_date FROM order_details JOIN orders ON order_details.order_id = orders.order_id WHERE month(order_date)= '$date' GROUP BY prod_name,orderQty,subTotal, month(order_date) order by orderQty desc limit 5");
	$query1 = mysqli_query($conn, "SELECT sum(subTotal) as total FROM order_details WHERE month(order_date)= '$date'");
	$row1 = mysqli_fetch_array($query1);
	while ($row = mysqli_fetch_array($query)) {

		 $output .='<tr>'.
                '<td>'.$row['prod_name'].'<td>'.
                '<td>'.$row['orderQty'].'<td>'.
                '<td>'.$row['subTotal'].'<td>'.
                '<tr>';
	}
	$output .='<tr>'.
				'<td><td>'.
				'<td>'.'<strong>MONTHLY INCOME : <strong>'.'<td>'.
                '<td>'.'<strong>'.$row1['total'].'<strong>'.'<td>'.
                '<tr>';
	echo json_encode($output);
?>