<?php
require ("../database/sql_connect.php");

$user_id = $_GET['user_id'];
$query = "SELECT * FROM users WHERE user_id = ('$user_id')";

$result = mysqli_query ($conn, $query);
if (!$result){
	echo "Error in query";
	exit();
}

$data = mysqli_fetch_array ($result);

$sql = "SELECT * FROM address
        JOIN users ON address.add_id = users.add_id WHERE user_id = ('$user_id')";
$res = mysqli_query($conn, $sql);
if(!$res){
    echo "Error in query";
    exit();
}        

$add = mysqli_fetch_array($res);


?>

<?php include("userheader.php") ?>

<style>
.has-error .checkbox,.has-error .checkbox-inline,.has-error .control-label,.has-error .help-block,.has-error .radio,.has-error .radio-inline,.has-error.checkbox label,.has-error.checkbox-inline label,.has-error.radio label,.has-error.radio-inline label{color:#a94442}
.has-error .form-control{border-color:#a94442;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075)}
.has-error .form-control:focus{border-color:#843534;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483;box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483}.has-error .input-group-addon{color:#a94442;background-color:#f2dede;border-color:#a94442}.has-error .form-control-feedback{color:#a94442}

.error {
  color: red;
  font-size: 0.8em;
}
.required {
	color: red;
}

</style>
<?php include("usermenu.php") ?>
 
	<div class="login_sec">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="userindex.php">Home</a></li> 
		  <li class="active"> My Account</li>
		 </ol>
		 <h2>Edit Account</h2>  <hr>
		 		 <?php if (isset($_SESSION['success'])): ?>
                                        <?php foreach($_SESSION['success'] as $success): ?>
                                            <a style="color: green"><i class="fa fa-check"></i> <?php echo "&nbsp;$success" ?></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
					
				<form method="POST" onsubmit="return validate()" action="updateAccount.php">
					
					<div class="container-fluid">
						<div class="row">
						<div class="col-md-6">
					  	<input name ='user_id' type="hidden" value = "<?php echo $data['user_id']?>">   
					  	<div class="form-group">
					  		
						    <label for="fname"><b>First Name</b><span class="required">*</span></label> <br> 
						    <input type="text" placeholder="Enter First Name" id="fname_id" name="fname" size="50" class="form-control" value="<?php echo $data[2]?>"> 
						  	<span id="fname_error" class="text-danger font-weight-bold"></span>
                   		 </div>
	                   	<div class="form-group">
						    <label for="mname"><b>Middle Name</b><span class="required">*</span></label> <br>
						    <input type="text" placeholder="Enter Middle Name" id="mname_id" name="mname" size="50" class="form-control"  value="<?php echo $data[3]?>"> 
						    	<span id="mname_error" class="text-danger font-weight-bold"></span>
						 </div>
					    <div class="form-group">
						    <label for="lname"><b>Last Name</b><span class="required">*</span></label> <br>
						    <input type="text" placeholder="Enter Last Name" id="lname_id" name="lname" size="50" class="form-control" value="<?php echo $data[4]?>"> 
						    	<span id="lname_error" class="text-danger font-weight-bold"></span>
						</div>
					    <div class="form-group">
						    <label for="email"><b>Email</b><span class="required">*</span></label> <br>
						    <input type="text" placeholder="Enter Email" id="email" name="email" size="50" class="form-control" value="<?php echo $data[6]?>" readonly> 
						</div>
					    <div class="form-group">
						    <label for="username"><b>Username</b><span class="required">*</span></label> <br>
						    <input type="text" placeholder="Enter Username" id="username_id" name="username" size="50" class="form-control" value="<?php echo $data[5]?>"> 
						    	 
						</div>
					    <div class="form-group">
						    <label for="password"><b>Password:</b></label> 
                             <?php
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT * FROM users WHERE user_id = ('$user_id')";

                            $result = mysqli_query ($conn, $query);
                            if (!$result){
                                echo "Error in query";
                                exit();
                            }

                            while($row = mysqli_fetch_array ($result)){
                        ?>
                     <?php echo "<a href='changePassword.php?user_id=".$row['user_id']."'><i class='fa fa-key'></i>Change Password</a>"; ?>
                     <?php } ?>
						    
						</div>
					  
					    </div>
					     <div class="col-md-6">
					     <div class="form-group">	
						     <label for="contact"><b>Contact Number</b><span class="required">*</span></label> <br>
						    <input type="text" id="contact_id" name="contact" placeholder="Contact number" size="50" class="form-control" value ="<?php echo $data[8]?>">
						    	<span id="contact_error" class="text-danger font-weight-bold"></span>
						  </div>
					    <div class="form-group">
						    <label for="street"><b>Street</b><span class="required">*</span></label> <br>
						    <input type="text" id="street_id" name="street" placeholder="1234 Main St" size="50" class="form-control" value ="<?php echo $add[1]?>"> 
						    <span id="street_error" class="text-danger font-weight-bold"></span>
						</div>
						  
					 	<div class="form-group">
						    <label for="brgy"><b>Barangay</b><span class="required">*</span></label> <br>
						    <input type="text" id="brgy_id" name="brgy" placeholder="Apartment, studio, or floor" size="50" class="form-control" value ="<?php echo $add[2]?>"> 
						    <span id="brgy_error" class="text-danger font-weight-bold"></span>
						</div>
					  
					   <div class="form-group">
						      <label for="city"><b>City</b><span class="required">*</span></label> <br>
						      <input type="text" id="city_id" size="50" name="city" placeholder="City" class="form-control" value ="<?php echo $add[3]?>"> 
						      <span id="city_error" class="text-danger font-weight-bold"></span>
						 </div>
					      <div class="form-group">
						      <label for="province"><b>Province</b><span class="required">*</span></label> <br>
						      <input type="text" id="province_id" size="50" placeholder="Province" name="province" class="form-control" value ="<?php echo $add[4]?>">
						      <span id="province_error" class="text-danger font-weight-bold"></span> 
						  </div>
					    <div class="form-group">
					    
					      <label for="zip"><b>Zip</b><span class="required">*</span></label> <br>
					      <input type="text" id="zip_id" name="zip"  pattern=".{4,}" placeholder="Zip Code" class="form-control" value ="<?php echo $add[5]?>"> 
					       <span id="zip_error" class="text-danger font-weight-bold"></span>
					    </div>
					    	
					      	 <button type="submit" value="submit" name="submit" class="btn btn-success">Edit Account</button> 

						</div>

					  </div>
					  	
					   
				</form>			 
		 </div>
		 
		 <div class="clearfix"></div>
	 </div>

	</div>

<!---->
<?php include("footer.php") ?>
<script type="text/javascript">
    
    function validate() {
        
        var fname = document.getElementById('fname_id').value;
        var mname = document.getElementById('mname_id').value;
        var lname = document.getElementById('lname_id').value;
        var username = document.getElementById('username_id').value;
         var password = document.getElementById('password_id').value;
        var contact = document.getElementById('contact_id').value;
        var street = document.getElementById('street_id').value;
        var brgy = document.getElementById('brgy_id').value;
        var city = document.getElementById('city_id').value;
        var province = document.getElementById('province_id').value;
        var zip = document.getElementById('zip_id').value;

        //fname name validation
        if (fname == "") {
            document.getElementById('fname_error').innerHTML = "* First name is required";
            document.getElementById('fname_id').style.borderColor= "red";
            document.getElementById('fname_id').style.borderStyle= "solid";
            return false;
        }

        if (/^[a-zA-Z.& ]*$/.test(fname) == false) {
            document.getElementById('fname_error').innerHTML = "* First name must not contain numeric characters";
            document.getElementById('fname_id').style.borderColor= "red";
            document.getElementById('fname_id').style.borderStyle= "solid";
            return false;
        }
        if (fname.trim().length==0) {
            document.getElementById('fname_error').innerHTML = "* First name should not consist of spaces only";
            document.getElementById('fname_id').style.borderColor= "red";
            document.getElementById('fname_id').style.borderStyle= "solid";
            return false;
        }
        if (fname.length < 3) {
            document.getElementById('fname_error').innerHTML = "* First name must be at least 3 characters";
            document.getElementById('fname_id').style.borderColor= "red";
            document.getElementById('fname_id').style.borderStyle= "solid";
            return false;
        }

         //mname name validation
        if (mname == "") {
            document.getElementById('mname_error').innerHTML = "* Middle name is required";
            document.getElementById('mname_id').style.borderColor= "red";
            document.getElementById('mname_id').style.borderStyle= "solid";
            return false;
        }

        if (/^[a-zA-Z.& ]*$/.test(mname) == false) {
            document.getElementById('mname_error').innerHTML = "* Middle name must not contain numeric characters";
            document.getElementById('mname_id').style.borderColor= "red";
            document.getElementById('mname_id').style.borderStyle= "solid";
            return false;
        }
        if (mname.trim().length==0) {
            document.getElementById('mname_error').innerHTML = "* Middle name should not consist of spaces only";
            document.getElementById('mname_id').style.borderColor= "red";
            document.getElementById('mname_id').style.borderStyle= "solid";
            return false;
        }
        if (mname.length < 3) {
            document.getElementById('mname_error').innerHTML = "* Middle name must be at least 3 characters";
            document.getElementById('mname_id').style.borderColor= "red";
            document.getElementById('mname_id').style.borderStyle= "solid";
            return false;
        }

         //lname name validation
        if (lname == "") {
            document.getElementById('lname_error').innerHTML = "* Last name is required";
            document.getElementById('lname_id').style.borderColor= "red";
            document.getElementById('lname_id').style.borderStyle= "solid";
            return false;
        }

        if (/^[a-zA-Z.& ]*$/.test(lname) == false) {
            document.getElementById('lname_error').innerHTML = "* Last name must not contain numeric characters";
            document.getElementById('lname_id').style.borderColor= "red";
            document.getElementById('lname_id').style.borderStyle= "solid";
            return false;
        }
        if (lname.trim().length==0) {
            document.getElementById('lname_error').innerHTML = "* Last name should not consist of spaces only";
            document.getElementById('lname_id').style.borderColor= "red";
            document.getElementById('lname_id').style.borderStyle= "solid";
            return false;
        }
        if (lname.length < 3) {
            document.getElementById('lname_error').innerHTML = "* Last name must be at least 3 characters";
            document.getElementById('lname_id').style.borderColor= "red";
            document.getElementById('lname_id').style.borderStyle= "solid";
            return false;
        }

        //username validation
        if (username == "") {
            document.getElementById('username_error').innerHTML = "* Username is required";
            document.getElementById('username_id').style.borderColor= "red";
            document.getElementById('username_id').style.borderStyle= "solid";
            return false;
        }
       
        //password validation
        if (password == "") {
            document.getElementById('password_error').innerHTML = "* Password is required";
            document.getElementById('password_id').style.borderColor= "red";
            document.getElementById('password_id').style.borderStyle= "solid";
            return false;
        }

        if (password.length < 6) {
            document.getElementById('password_error').innerHTML = "* Password must contain 6-12 characters";
            document.getElementById('password_id').style.borderColor= "red";
            document.getElementById('password_id').style.borderStyle= "solid";
            return false;
        }


        //contact validation
        if (isNaN(contact)) {
            document.getElementById('contact_error').innerHTML = "* Invalid contact number";
            document.getElementById('contact_id').style.borderColor= "red";
            document.getElementById('contact_id').style.borderStyle= "solid";
            return false;
        }
        if (!contact.match(/^\d{11}$/)) {
            document.getElementById('contact_error').innerHTML = "* Contact number must be 11 digits";
            document.getElementById('contact_id').style.borderColor= "red";
            document.getElementById('contact_id').style.borderStyle= "solid";
            return false;
        }

        //street validation
        if (street == "" || street.trim().length==0) {
            document.getElementById('street_error').innerHTML = "* Street address is required";
            document.getElementById('street_id').style.borderColor= "red";
            document.getElementById('street_id').style.borderStyle= "solid";
            return false;
        }

        //barangay validation
        if (brgy == "" || brgy.trim().length==0) {
            document.getElementById('brgy_error').innerHTML = "* Barangay address is required";
            document.getElementById('brgy_id').style.borderColor= "red";
            document.getElementById('brgy_id').style.borderStyle= "solid";
            return false;
        }

        //city validation
        if (city == "" || city.trim().length==0) {
            document.getElementById('city_error').innerHTML = "* City address is required";
            document.getElementById('city_id').style.borderColor= "red";
            document.getElementById('city_id').style.borderStyle= "solid";
            return false;
        }

        //province validation
        if (province == "" || province.trim().length==0) {
            document.getElementById('province_error').innerHTML = "* Province address is required";
            document.getElementById('province_id').style.borderColor= "red";
            document.getElementById('province_id').style.borderStyle= "solid";
            return false;
        }

        //zip code validation
        if (isNaN(zip)) {
            document.getElementById('zip_error').innerHTML = "* Invalid zip code number";
            document.getElementById('zip_id').style.borderColor= "red";
            document.getElementById('zip_id').style.borderStyle= "solid";
            return false;
        }
        if (!zip.match(/^\d{4}$/)) {
            document.getElementById('zip_error').innerHTML = "* Zip code must be 4 digits";
            document.getElementById('zip_id').style.borderColor= "red";
            document.getElementById('zip_id').style.borderStyle= "solid";
            return false;
        }


    }


</script>