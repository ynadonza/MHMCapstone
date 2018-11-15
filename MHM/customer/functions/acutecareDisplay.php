<?php 

 $query= "SELECT * FROM products WHERE type = 'Acute Care'";

$data = mysqli_query($conn, $query);
    if(!$data){
        echo "Error in query";
    }

$result = mysqli_fetch_array($data);
		 $display = "";
		 $search_value=isset($_POST['search'])? $_POST["search"]:'';
	 if(isset($result['type']) == "Acute Care"){
			$sqlSelProd = mysqli_query($conn,"SELECT * FROM products WHERE prod_name like '%$search_value%' AND type='Acute Care' ORDER BY prod_id DESC limit $start_from, $record_per_page") or die(mysqli_error());
		
		}
?>
