<?php 
require('../database/sql_connect.php');

$query = "SELECT * FROM users WHERE user_id = '{$_GET['user_id']}' ";
$result=mysqli_query($conn, $query);
if(!$result){
    echo "ERROR IN QUERY!";
}
$data = mysqli_fetch_array($result);

?>
<?php require('header.php'); ?>
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

input[type='text']{
    width: 30%;
    height: 47px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
}

input[type='password']{
    width: 30%;
    height: 47px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
}
input[placeholder]{
    text-align:center;
}
input[value]{
    text-align:center;
}
select{
    width: 60%;
    height: 48px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
    background:skyblue;
}
p.round2 {
   
    text-align: justify;
}
 #box {
   border: 2px  blue;
    border-radius: 8px;
    border-width: 2px;
    background-color: #e9ecef;
    width: 80%;
    padding: 10px;    
   
   
}
#box2 {
    border: 2px  blue;
    border-radius: 8px;
    border-width: 2px;
    background-color: #e9ecef;
    width: 80%;
    padding: 10px;    
   
}
  
</style>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <body>
<div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
              <a href="employee.php"><b>Employees</b></a>
            </li>
            <li class="breadcrumb-item active">Edit Employee Account
            </li>
          </ol>
        </div>
<!-- TABLE -->
<div id="page-inner"> 
    <div class="row">
       <div class="col-md-12">
            
       <center>
         <div id = "box">            
                  <div class='container'>

                    <form method="POST" action="updateEmpPassword.php" onsubmit="return validate()">
                       <p style="color:red">* Required Fields </p>
                      <center>
                      <input type='hidden' name='user_id' value="<?php echo $data['user_id']?>">
                     <!--  <div>      
                        <strong>Username:</strong><span class="required">*</span><br>
                        <input type='text' name='username' value="<?php echo $data['username']?>" id="username_id" autocomplete="off"><br>
                        <span id="uname_error" class="text-danger font-weight-bold"></span><br>
                      </div> -->
                      <div>      
                        <strong>Password:</strong><span class="required">*</span><br>
                        <input type='password' name='password' id="password_id" placeholder="password"><br>
                        <span id="password_error" class="text-danger font-weight-bold"></span><br>
                      </div>
                      <div>      
                        <strong>Confirm Password:</strong><span class="required">*</span><br>
                        <input type='password' name='confirm' id="confirm_id" placeholder="confirm password"><br>
                        <span id="confirm_error" class="text-danger font-weight-bold"></span><br><br>
                      </div>
                      <div>
                          <input type='submit' value='Submit' name="submit" class='btn btn-primary'>
                      </div>
                      </center>
                    </form>
                 </div>
                </div>
            </center>
        </div>
    </div>
</div>
</div>
	

<script type="text/javascript">
	
	function validate() {
		
	
		password = document.getElementById('password_id').value;
		confirm = document.getElementById('confirm_id').value;
		var i = true;
 
		

		//Password Validation
		if (password == "") {
			document.getElementById('password_error').innerHTML = "** Password is required";
          	document.getElementById('password_id').style.borderColor= "red";
          	document.getElementById('password_id').style.borderStyle= "solid";
          	var i = false;
		} else {
			if (password.length < 6 || password.length > 12) {
            	document.getElementById('password_error').innerHTML = "** Password should be atleast 6 to 12 characters";
            	document.getElementById('password_id').style.borderColor= "red";
            	document.getElementById('password_id').style.borderStyle= "solid";
            	var i = false;
          	}
		}

		//Confirm Password Validation
		if (confirm == "") {
			document.getElementById('confirm_error').innerHTML = "** Please confirm password ";
          	document.getElementById('confirm_id').style.borderColor= "red";
          	document.getElementById('confirm_id').style.borderStyle= "solid";
          	var i = false;
		} else {
			if (confirm != password) {
				document.getElementById('confirm_error').innerHTML = "** Password did not match";
            	document.getElementById('confirm_id').style.borderColor= "red";
            	document.getElementById('confirm_id').style.borderStyle= "solid";
            	var i = false;
			}
		}

		return i;

	}
</script>

</body>
</html>
