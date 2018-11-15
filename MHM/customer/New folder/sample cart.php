Controller ni siya
<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "db_project";
	private $connect;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$connect = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $connect;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>





Mao ni ang code
<?php	
// include('database/session.php');

	// $query = mysqli_query($connect, "select * from cashier_account where cashier_id = '$id'");
	// $row = mysqli_fetch_array($query);


	// require_once("dbcontroller.php");
	$db_handle = new DBController();
	if(!empty($_GET["action"])) {
		switch($_GET["action"]) {
			case "add":
				if(!empty($_POST["quantity"])) {
					$productByCode = $db_handle->runQuery("SELECT * FROM tb_products WHERE productID='" . $_GET["code"] . "'");
					$itemArray = array($productByCode[0]["productID"]=>array('productID'=>$productByCode[0]["productID"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

					
					
					if(!empty($_SESSION["cart_item"])) {
						if(in_array($productByCode[0]["productID"],array_keys($_SESSION["cart_item"]))) {
							foreach($_SESSION["cart_item"] as $k => $v) {
									if($productByCode[0]["productID"] == $k) {
										if(empty($_SESSION["cart_item"][$k]["quantity"])) {
											$_SESSION["cart_item"][$k]["quantity"] = 0;
										}
										$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
									}
							}
						} else {
							$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
						}
					} else {
						$_SESSION["cart_item"] = $itemArray;
					}

					
					
				}		
			break;
			case "remove":
				if(!empty($_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {	
							if($_GET["code"] == $k)
								unset($_SESSION["cart_item"][$k]);				
							if(empty($_SESSION["cart_item"]))
								unset($_SESSION["cart_item"]);
					}
				}
			break;
			case "empty":
				unset($_SESSION["cart_item"]);
			break;	
		}
	}

?>

<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

<style type="text/css">

body{width:610px;font-family:calibri;}
#shopping-cart table{width:100%;background-color:#F0F0F0;}
#shopping-cart table td{background-color:#FFFFFF;}

.txt-heading{    
	padding: 10px 10px;
    border-radius: 2px;
    color: #FFF;
    background: limegreen;
	margin-bottom:10px;
}
a.btnRemoveAction{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}
a.btnRemoveAction:visited{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}

#btnEmpty {
    color: #ff0000;
    float: right;
    text-decoration: none;
    margin-right: 15px;
}
.btnAddAction{    
	width: 120px;
	background-color: limegreen;
    border: 0;
    padding: 3px 10px;
    color: #ffffff;
    margin-left: 2px;
    border-radius: 2px;
}
.btnAddAction:hover{    
	width: 120px;
	background-color: #eb9e4f;
    border: 0;
    padding: 3px 10px;
    color: #ffffff;
    margin-left: 2px;
    border-radius: 2px;
    text-decoration: none;
}
/*div{
	border: 1px solid black;
}*/
#shopping-cart {margin-bottom:30px;margin-left: 450px;margin-top: 55px; position: fixed;}
.cart-item {border-bottom: #79b946 1px dotted;padding: 10px;}
#product-grid {margin-bottom:30px; position: fixed;}
.product-item {	float:left;	background: #ffffff;margin:15px 10px;	padding:5px;border:#CCC 1px solid;border-radius:4px;}
.product-item div{text-align:center;	margin:10px;}
.product-price {    
	color: #005dbb;
    font-weight: 600;
}
.product-image {height:100px;background-color:#FFF;}
.clear-float{clear:both;}
.demo-input-box{border-radius:2px;border:#CCC 1px solid;padding:2px 1px;}	
.pp {
	position: relative;
	width: 40px;
	height: 40px;
	margin-top: -12px;
	margin-bottom: -12px;
	border-radius: 100%;
}

</style>

</head>
<body>

<div class="container">
	<nav class="navbar navbar-fixed-top" role="navigation">
		<div class="navbar-head">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand"><img src="logo.jpg" class="img"> <b style="margin-left: 25px;">KKB Seafoods & Restaurant</b></a>
		</div>

		<ul class="nav navbar-right top-nav">
			<li>
				<a href="#"><i class="fa fa-comments-o"></i></a>
			</li>
			<li>
				<a href="#"><img src="<?php echo $row['cashier_image']; ?>" class="pp">
					<?php echo $row['cashier_fname']; ?></a>
			</li>
			<li>
				<a href="database/logout.php">Log out</a>
			</li>
		</ul>

		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav side-nav">
				<li id="link" class="active">
					<a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
				</li>
				<li id="link">
					<a href="sample cart.php"><i class="fa fa-money"></i> Payments</a>
				</li>
				<li id="link">
					<a href="transaction.php"><i class="fa fa-list-alt"></i> Transactions</a>
				</li>
				<li id="link">
					<a href="#"><i class="fa fa-dollar"></i> Sales</a>
				</li>
				<li id="link">
					<a href="#"><i class="fa fa-book"></i> Reservations</a>
				</li>
			</ul>
		</div>
	</nav>
</div>
	

<div class="container" id="page-wrapper">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-6"> 
			<div id="product-grid" style="margin-top: 55px;">
					<table class="table table-bordered table-hover">
						<thead style="background-color: rgb(6, 217, 149); color: white">
							<tr>
								<th colspan="4" style="border-bottom: 1px solid rgb(6, 217, 149)"><strong>Foods</strong></th>
							</tr>
							<tr>
								<th style="border-right: 1px solid rgb(6, 217, 149);"><strong>Name</strong></th>
								<th style="border-right: 1px solid rgb(6, 217, 149);"><strong>Price</strong></th>
								<th style="border-right: 1px solid rgb(6, 217, 149);"><strong>Quantity</strong></th>
								<th style="text-align:center;"><strong>Action</strong></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$productID = isset($_POST['productID'])? $_POST['productID']:'';
							$product_array = $db_handle->runQuery("SELECT * FROM tb_products ORDER BY productID DESC");
							if (!empty($product_array)) { 
								foreach($product_array as $key=>$value){
							?>
								<form method="post" action="sample cart.php?action=add&code=<?php echo $product_array[$key]["productID"]; ?>">
									<tr>
										<td style="border-bottom:#F0F0F0 1px solid;"><strong><?php echo $product_array[$key]["productID"]; ?></strong></td>
										<td style="border-bottom:#F0F0F0 1px solid;"><?php echo "Php ".$product_array[$key]["price"]; ?></td>
										<td style="border-bottom:#F0F0F0 1px solid;"><input type="text" name="quantity" value="1" size="2" /></td>
										<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><input type="submit" value="Add to Order" class="btnAddAction" /></td>
									</tr>
								</form>
							<?php
									}
							}
							?>
					</tbody>
				</table>		
			</div>
		</div>
			<div class="col-md-5" id="shopping-cart">
				<?php
				if(isset($_SESSION["cart_item"])){
				    $item_total = 0;
				    $subprice = 0;
				?>	
				<table id="tbl" class="table table-bordered">
					<tbody>
						<thead style="background-color: rgb(6, 217, 149); color: white">
						<tr>
							<th colspan="5" style="border-bottom: 1px solid rgb(6, 217, 149);"><strong>Order Foods</strong> <a id="btnEmpty" class="btn btn-default" href="sample cart.php?action=empty">Empty Order</a></th>
						</tr>
						<tr>
							<th style="border-right: 1px solid rgb(6, 217, 149);"><strong>Name</strong></th>
							<th style="border-right: 1px solid rgb(6, 217, 149);"><strong>Quantity</strong></th>
							<th style="border-right: 1px solid rgb(6, 217, 149);"><strong>Price</strong></th>
							<th style="border-right: 1px solid rgb(6, 217, 149);"><strong>Initial Price</strong></th>
							<th style="text-align:center;"><strong>Action</strong></th>
						</tr>
						</thead>
						<form method="post">					
						<?php		
					    foreach ($_SESSION["cart_item"] as $item){

					    	$subprice = $item["quantity"] * $item["price"];
							?>
								
								<tr>
									<td class="menu_name"><?php echo $item["productID"]; ?></td>
									<td class="quantity"><?php echo $item["quantity"]; ?></td>
									<td class="menu_price"><?php echo $item["price"]." Php"; ?></td>
									<td class="subprice"><?php echo $subprice." Php"; ?></td>
									<td class=""><center><a href="sample cart.php?action=remove&code=<?php echo $item["productID"]; ?>" class="btnAddAction">Remove Order</a></center></td>
								</tr>
									<?php
							        $item_total += ($item["productID"]*$item["quantity"]);
									}
								?>
							<tr>
								<td style="border-right: 1px solid #fff;"><strong>Total:</strong> <?php echo $item_total." Php"; ?></td>
				<?php
					}
					if(isset($_POST["checkout"])) {
						$cash = $_POST["cash"];
						$change = 0;
						$change = $cash - $item_total;

						$insert = "INSERT INTO payment_transaction(totalprice,payment,sukli)
							VALUES('".$item_total."','".$cash."','".$change."')";
						if($query = mysqli_query($connect, $insert)) {
							$transaction_id = mysqli_insert_id($connect);
							foreach ($_SESSION["cart_item"] as $item) {
								
								$qnty = $item["quantity"];
								$food = $item["menu_name"];
								$initial= $item["quantity"] * $item["menu_price"];
								//$initial = $subprice;

								$add = "INSERT INTO costumer_payments(food_name,quantity,subprice,transaction_id)
									VALUES('".$food."','".$qnty."','".$initial."','".$transaction_id."')";
								if($save = mysqli_query($connect, $add)) {
									echo "<script>alert('Change: ".$change." Php');</script>";
									unset($_SESSION["cart_item"]);
									// header("Location: payment.php");
									echo "
										<script type='text/javascript'>
											location.reload();
										</script>";
								} 
								else {
									echo "<script>alert('".print_r($insert)."');</script>";
								}
						
							}
						}
						else {
							echo "<script>alert('".print_r($insert)."');</script>";
						}

					}
				?>
								<td colspan="4" align="right"><div id="atay" style="display: none;">Cash Tendered: <input type="number" name="cash" style="padding: 4px;" autofocus required> <input type="submit" name="checkout" value="Checkout" class="btn btn-warning"></div></td>
							</tr>
					</form>					
					</tbody>
				</table>						
			</div>		
	</div>
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</html>
<script type="text/javascript">
$(document).ready(function() {
	$(document).keyup(function(objEvent) {
		(objEvent) ? keycode = objEvent.keyCode : keycode = event.keyCode;
		// console.log(keycode);
		if(keycode == 192) {
			$("#atay").slideToggle();
		}
	});
});

</script>