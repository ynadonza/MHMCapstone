<?php require("../database/sql_connect.php") ?>

<form method="POST" action="insertProducts.php"  enctype="multipart/form-data">
		<p>
			Product Name: <input type='text' name='productName' required='required'> <br><br>
			Brand Name: <select name='brand'>
						<option> Ricoa </option>
						<option> Cafe Puro </option>
						<option> Fibisco </option>
					</select> <br> <br>
			Quantity: <input type='text' name='qty'> <br> <br>
			Price: <input type='text' name='price'> <br> <br>
			Photo: <input type='file' name='empPhoto' value ="<?php echo $row[7]?>">
			
		</p>
		<button class ="btn btn-danger" type='reset'> Reset </button> &nbsp;
		<button class = "btn btn-success" type='submit'> Submit
	</form>