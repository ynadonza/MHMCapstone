<?php
require("../database/sql_connect.php");

if (isset($_POST['supplier'])) {
	
	if (!empty($supplier)) {
		
		$query = "SELECT * FROM suppliers WHERE company_name='{$supplier}' ";
		$result = mysqli_query($conn,$query);
		$row = mysqli_num_rows($result);

		if ($row==0) {
			echo "Supplier Name Available";
		} else {
			echo "Supplier Name Not Available";
		}

	}

}

?>