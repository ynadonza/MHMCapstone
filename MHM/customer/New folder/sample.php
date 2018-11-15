<?php 
	include("../dbcontroller.php");
	include("../functions/cartstored.php");
 ?>
 <table>
 	<tr>
 		<td>ID</td>
 		<td>Name</td>
 		<td>Quantity</td>
 		<td>Price</td>
 		<td>Subtotal</td>
 	</tr>
 	<?php 
		$productID = isset($_POST['productID'])? $_POST['productID']:'';
		$product_array = $db_handle->runQuery("SELECT * FROM tb_products ORDER BY productID DESC");
			if (!empty($product_array)) 
			{ 
				foreach($product_array as $key=>$value)
				{
					?>
						<form method="post" action="sample.php?action=add&code=<?php echo $product_array[$key]["productID"]; ?>">
							<tr>
							<td><?php echo $product_array[$key]['productID']; ?></td>
							<td><?php echo $product_array[$key]['name']; ?></td>
							<td><input type="text" name="quantity" value="1"></td>
							<td><?php echo $product_array[$key]['price']; ?></td>
							<td><input type="submit" name="" value="Add to Cart"></td>
							</tr>
						</form>
					<?php
				}
			}
 	 ?>
 	<tr></tr>
 </table>
 <?php
	if(isset($_SESSION["cart_item"]))
	{
		$item_total = 0;
		$subprice = 0;
		foreach ($_SESSION["cart_item"] as $item)
		{

		$subprice = $item["quantity"] * $item["price"];
		$item_total += ($item["productID"]*$item["quantity"]);
		?>
			<table>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Quantity</td>
					<td>Price</td>
					<td>Subprice</td>
					<td>Action</td>
				</tr>
				<tr>
					<td><?php echo $item['productID']; ?></td>
					<td><?php echo $item['name']; ?></td>
					<td><?php echo $item['quantity']; ?></td>
					<td><?php echo $item['price']; ?></td>
					<td><?php echo $subprice; ?></td>
					<td><a href="sample.php?action=remove&code=<?php echo $item["productID"]; ?>">Remove Order</a></td>
				</tr>
				<tr>
					<td>Total:</td>
					<td><?php echo $item_total; ?></td>
				</tr>
			</table>
		<?php
		}
	}
?>	