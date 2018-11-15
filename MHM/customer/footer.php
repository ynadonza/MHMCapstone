<div class="footer-content">
	 <div class="container">
	 	<div class="row">
		<!--  <div class="ftr-grids"> -->
			 <div class="col-md-3 ftr-grid">
				 <h4>About Us</h4>
				 <ul>
					 <li><a href="aboutus.php">Who We Are</a></li>
					 <li><a href="aboutus.php">Our Sites</a></li>
					 
							 
				 </ul>
			 </div>
			
			 <div class="col-md-3 ftr-grid">
				 <h4>Customer Care</h4>
				 <ul>
					 <li><a href="contact.php">Contact Us</a></li>
					 <li><a href="orders.php">Orders</a></li>
					 				  
				 </ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				 <h4>Your account</h4>
				 <ul> <?php
				    $user_id = $_SESSION['user_id'];
				    $query = "SELECT * FROM users WHERE user_id = ('$user_id')";

							$result = mysqli_query ($conn, $query);
							if (!$result){
								echo "Error in query";
								exit();
							}

							while($row = mysqli_fetch_array ($result)){
						?>
				     <?php echo "<li><a href='editAccount.php?user_id=".$row['user_id']."'> Your Account</a></li>"; ?>
				     <?php } ?>
					  <li><a href="#">Personal Information</a></li>
					 <li><a href="#">Addresses</a></li>		
								 					 
				 </ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				 <h4>Categories</h4>
				 <ul>
					 <li><a href="userelectronics.php">> Electronics</a></li>
					 <li><a href="userselfcare.php">> Self-care</a></li>
					 <li><a href="usersurgical.php">> Surgical</a></li>
					 <li><a href="useracutecare.php">> Acute Care</a></li>
					 <li><a href="userlongtermcare.php">> Long-term Care</a></li>
								 
				 </ul>
				 
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<div class="footer">
	 <div class="container">
		 <div class="store">
			 <ul>
				 <li class="active">OUR STORE LOCATOR:</li>
				 <li><a href="#">A. Tumulak Street Lapu-Lapu City Cebu</a></li>
				 <li><a href="#">|</a></li>
				 <li><a href="#">Gun-ob Street</a></li>	
			 </ul>
		 </div>		 
		 <div class="copywrite">
			 <p>Copyright © 2018 Metro Health Management All rights reserved | Design by JACK</p>
		 </div>			 
		 </div>
	 </div>
</div>