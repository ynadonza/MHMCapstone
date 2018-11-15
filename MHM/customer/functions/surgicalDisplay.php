<?php 

 $query= "SELECT * FROM products WHERE type = 'Surgical'";

$data = mysqli_query($conn, $query);
    if(!$data){
        echo "Error in query";
    }

$result = mysqli_fetch_array($data);
		 $display = "";
		 $search_value=isset($_POST['search'])? $_POST["search"]:'';
	 if($result['type'] == "Surgical"){
			$sqlSelProd = mysqli_query($conn,"SELECT * FROM products WHERE prod_name like '%$search_value%' AND type='Surgical' ORDER BY prod_id DESC limit $start_from, $record_per_page") or die(mysqli_error());
		
		}else{
			$sqlSelProd = mysqli_query($conn,"SELECT * FROM products WHERE prod_name like '%$search_value%' ORDER BY prod_id DESC limit $start_from, $record_per_page") or die(mysql_error());
		}

?>
