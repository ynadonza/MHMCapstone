<?php require("../database/sql_connect.php"); 


if(isset($_POST['submit'])){

$query = "SELECT * FROM users 
          WHERE username = '{$_POST['username']}' AND email = '{$_POST['email']}' AND user_type = 'customer'";
$result = mysqli_query($conn, $query);
$count  = mysqli_num_rows($result);

if(mysqli_num_rows($result) == 0){
        $error = "Account not found";
     
  }else{
    $getPassword = sha1($_POST['newPassword']);
  $query = "UPDATE users 
            SET password = '{$getPassword}'
            WHERE username = '{$_POST['username']}' AND email = '{$_POST['email']}' AND user_type = 'customer'";
$result = mysqli_query($conn, $query);
            if($result){
                 $success = "Password reset successful";
            }else{
                echo mysqli_error($conn);
            }

}
}


?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include("header.php"); ?>
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
<?php include("menu.php"); ?>

 <div class="contact">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li> 
		  <li class="active">Forgot Password</li>
		 </ol>
            <div class = "row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                <div class="panel panel-success">
                            <div class="panel-heading loginpage-fonts">Reset Password</div>
                            <div class="panel-body">
                                <br>
                                <form action=""  onsubmit="return validate()" method="POST">
                              		<center>
                              	<div class="form-group">
                                	 <input type="text" name="username" size="20" id="username_id" class="form-control" placeholder="Username"> 
                                      <span id="username_error" class="text-danger font-weight-bold"></span>
                                 </div>
                                 <div class="form-group">
                                     <input type="text" name="email" size="20" id="email_id" class="form-control" placeholder="Email">
                                      <span id="email_error" class="text-danger font-weight-bold"></span>
                                 </div>
                                 <div class="form-group">
                                     <input type="password" name="newPassword" size="20" id="newPassword_id" class="form-control" placeholder="New Password"> 
                                      <span id="newPassword_error" class="text-danger font-weight-bold"></span>
                                 </div>
                                <div class="form-group">
                                     <input type="password" name="pass2" size="20" id="pass2_id" class="form-control" placeholder="Re-type Password"> 
                                   	 <span id="pass2_error" class="text-danger font-weight-bold"></span>
                                   	 <span id="verifyPassword" class="text-danger font-weight-bold"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" id="submit" value="Reset" class="btn btn-success">

                                   <?php
			                          if(isset($error)){
			                            echo "<p style ='color:red;'>$error</p>";
			                          }
			                        ?>
			                        <?php
			                          if(isset($success)){
			                            echo "<p style ='color:green;'>$success</p>";
			                          }
			                        ?>
                                   </center>
                                </div>
                                </form>
                            </div>
                        </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            
        </div>
</div>

   
<?php include("indexFooter.php"); ?>
<script type="text/javascript">
    
    function validate() {
        var username = document.getElementById('username_id').value;
        var email = document.getElementById('email_id').value;
        var newPassword = document.getElementById('newPassword_id').value;
        var pass2 = document.getElementById('pass2_id').value;

         //validate if password matches
       			 if (newPassword != pass2) {
				    document.getElementById('verifyPassword').innerHTML = "* Please make sure passwords match";
			        document.getElementById('verifyPassword').style.borderColor= "red";
			        return false;
				  };

        //username validation
        if (username == "") {
            document.getElementById('username_error').innerHTML = "* Username is required";
            document.getElementById('username_id').style.borderColor= "red";
            document.getElementById('username_id').style.borderStyle= "solid";
            return false;
        }
       	
       	 //email validation
        if (email == "") {
            document.getElementById('email_error').innerHTML = "** Supplier email is required";
            document.getElementById('email_id').style.borderColor= "red";
            document.getElementById('email_id').style.borderStyle= "solid";
            return false;
        }
        if (email.indexOf('@')<=0) {
            document.getElementById('email_error').innerHTML = "** Invalid email format";
            document.getElementById('email_id').style.borderColor= "red";
            document.getElementById('email_id').style.borderStyle= "solid";
            return false;
        }

        //newPassword validation
        if (newPassword == "") {
            document.getElementById('newPassword_error').innerHTML = "* Password is required";
            document.getElementById('newPassword_id').style.borderColor= "red";
            document.getElementById('newPassword_id').style.borderStyle= "solid";
            return false;
        }

        if (newPassword.length < 6) {
            document.getElementById('newPassword_error').innerHTML = "* Password must contain 6-12 characters";
            document.getElementById('newPassword_id').style.borderColor= "red";
            document.getElementById('newPassword_id').style.borderStyle= "solid";
            return false;
        }

        //pass2 validation
        if (pass2 == "") {
            document.getElementById('pass2_error').innerHTML = "* Password is required";
            document.getElementById('pass2_id').style.borderColor= "red";
            document.getElementById('pass2_id').style.borderStyle= "solid";
            return false;
        }

        if (pass2.length < 6) {
            document.getElementById('pass2_error').innerHTML = "* Password must contain 6-12 characters";
            document.getElementById('pass2_id').style.borderColor= "red";
            document.getElementById('pass2_id').style.borderStyle= "solid";
            return false;
        }
    }


</script>