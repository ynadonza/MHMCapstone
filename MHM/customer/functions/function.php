<?php 

@$action = $_REQUEST['action'];
@$prod_id   = trim($_REQUEST['prod_id']);
//$_SESSION['product_cart'] = array();
if($action == 'add'){
	 @$quantity = $_REQUEST['qty'];
	 if(!empty($prod_id)){
		 $query = "SELECT * FROM products WHERE prod_id = '".$prod_id."'";
		 $rs = mysqli_query($conn,$query) or die("failed".mysqli_error());
		 $product_data = mysqli_fetch_assoc($rs);
		 
		 $product = array("prod_id"=>$product_data['prod_id'],"prod_name"=>$product_data['prod_name'],"selling_price"=>$product_data['selling_price'],"photo"=>$product_data['photo'],"qty"=>$quantity);
		 
		if(isset($_SESSION['prod_cart']) && !empty($_SESSION['prod_cart']))
		{
			if(!array_key_exists($product_data['prod_id'],$_SESSION['prod_cart']))
			{
		   
				$_SESSION['prod_cart'][$product_data['prod_id']] = $product;
		   
			}
			else{
				
				$_SESSION['prod_cart'][$product_data['prod_id']]['selling_price'] = $_SESSION['prod_cart'][$product_data['prod_id']]['selling_price'];
				$_SESSION['prod_cart'][$product_data['prod_id']]['qty'] = $_SESSION['prod_cart'][$product_data['prod_id']]['qty']+$quantity;
			}		
		}
		else{
		  $_SESSION['prod_cart'][$product_data['prod_id']] = $product;
		}
	}	
}
if($action == "delete"){
	unset($_SESSION['prod_cart'][$prod_id]);
}

// if($action == "empty"){
// 	unset($_SESSION['product_cart']);
// }
 ?>