<?php 
require('header.php'); 
?>
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
    width: 60%;
    height: 47px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
}

input[type='password']{
    width: 60%;
    height: 47px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
}
input[placeholder]{
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
<body>
<div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
              <a href="employee.php"><b>Employees</b></a>
            </li>
            <li class="breadcrumb-item active">Add New Employee
            </li>
          </ol>
        </div>
<!-- TABLE -->
<div id="page-inner"> 
    <div class="row">
       <div class="col-md-12">
            
       <center>
         <div id = "box">            
                <p style="color:red">* Required Fields </p>
                  <form method="POST" onsubmit="return validate()" action="insertEmployee.php">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-md-6">  
                        <div class="form-group">

                            
                            <label for="fname"><b>First Name</b><span class="required">*</span></label> <br> 
                            <input type="text" placeholder="Enter First Name" id="fname_id" name="fname" size="50" class="form-control"> 
                            <span id="fname_error" class="text-danger font-weight-bold"></span>
                         </div>
                        <div class="form-group">
                            <label for="mname"><b>Middle Name</b><span class="required">*</span></label> <br>
                            <input type="text" placeholder="Enter Middle Name" id="mname_id" name="mname" size="50" class="form-control"> 
                            <span id="mname_error" class="text-danger font-weight-bold"></span>
                         </div>
                        <div class="form-group">
                            <label for="lname"><b>Last Name</b><span class="required">*</span></label> <br>
                            <input type="text" placeholder="Enter Last Name" id="lname_id" name="lname" size="50" class="form-control"> 
                            <span id="lname_error" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="email"><b>Email</b><span class="required">*</span></label> <br>
                            <input type="text" placeholder="Enter Email" id="email_id" name="email" size="50" class="form-control"> 
                            <span id="email_error" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <label for="username"><b>Username</b><span class="required">*</span></label> <br>
                            <input type="text" placeholder="Enter Username" id="username_id" name="username" size="50" class="form-control"> 
                            <div id="username_error" class="text-danger font-weight-bold"></div>
                                 
                        </div>
                        <div class="form-group">
                            <label for="password"><b>Password</b><span class="required">*</span></label> <br>
                            <input type="password" placeholder="Enter Password" id="password_id" name="password" size="50" class="form-control">
                            <span id="password_error" class="text-danger font-weight-bold"></span><br>
                        </div>
                      
                        </div>
                         <div class="col-md-6">
                         <div class="form-group">   
                            <label for="contact"><b>Contact Number</b><span class="required">*</span></label> <br>
                            <input type="text" id="contact_id" name="contact" placeholder="Contact" size="50" class="form-control">
                            <span id="contact_error" class="text-danger font-weight-bold"></span>
                          </div>
                        <div class="form-group">
                            <label for="street"><b>Street</b><span class="required">*</span></label> <br>
                            <input type="text" id="street_id" name="street" placeholder="Street" size="50" class="form-control"> 
                            <span id="street_error" class="text-danger font-weight-bold"></span>
                        </div>
                          
                        <div class="form-group">
                            <label for="brgy"><b>Barangay</b><span class="required">*</span></label> <br>
                            <input type="text" id="brgy_id" name="brgy" placeholder="Barangay" size="50" class="form-control"> 
                            <span id="brgy_error" class="text-danger font-weight-bold"></span>
                        </div>
                      
                       <div class="form-group">
                              <label for="city"><b>City</b><span class="required">*</span></label> <br>
                              <input type="text" id="city_id" size="50" name="city" placeholder="City" class="form-control"> 
                              <span id="city_error" class="text-danger font-weight-bold"></span>
                         </div>
                          <div class="form-group">
                              <label for="province"><b>Province</b><span class="required">*</span></label> <br>
                              <input type="text" id="province_id" size="50" name="province" placeholder="Province" class="form-control">
                              <span id="province_error" class="text-danger font-weight-bold"></span> 
                          </div>
                        <div class="form-group">
                        
                          <label for="zip"><b>Zip</b><span class="required">*</span></label> <br>
                          <input type="text" id="zip_id" name="zip" placeholder="Zip Code"  pattern=".{4,}" class="form-control"> 
                           <span id="zip_error" class="text-danger font-weight-bold"></span>
                        </div>
                        </div>

                                      
                      </div>
                         <button type="submit" value="submit" name="submit" class="btn btn-success">Add Employee</button> 
                       
                      
                  </form>         
                </div>
            </center>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">

function validate() {
        
        var fname = document.getElementById('fname_id').value;
        var mname = document.getElementById('mname_id').value;
        var lname = document.getElementById('lname_id').value;
        var email = document.getElementById('email_id').value;
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
            var i = false;
        } else {
          if (/^[a-zA-Z. ]*$/.test(fname) == false) {
            document.getElementById('fname_error').innerHTML = "* First name must not contain numeric characters";
            document.getElementById('fname_id').style.borderColor= "red";
            document.getElementById('fname_id').style.borderStyle= "solid";
            var i = false;
          }
          if (fname.trim().length==0) {
              document.getElementById('fname_error').innerHTML = "* First name should not consist of spaces only";
              document.getElementById('fname_id').style.borderColor= "red";
              document.getElementById('fname_id').style.borderStyle= "solid";
              var i = false;
          }
          if (fname.length < 3) {
              document.getElementById('fname_error').innerHTML = "* First name must be at least 3 characters";
              document.getElementById('fname_id').style.borderColor= "red";
              document.getElementById('fname_id').style.borderStyle= "solid";
              var i = false;
          }
        }
        

        //mname name validation
        if (mname == "") {
          document.getElementById('mname_error').innerHTML = "* Middle name is required";
          document.getElementById('mname_id').style.borderColor= "red";
          document.getElementById('mname_id').style.borderStyle= "solid";
          var i = false;
        } else {
          if (/^[a-zA-Z ]*$/.test(mname) == false) {
            document.getElementById('mname_error').innerHTML = "* Middle name must not contain numeric characters";
            document.getElementById('mname_id').style.borderColor= "red";
            document.getElementById('mname_id').style.borderStyle= "solid";
            var i = false;
          }
          if (mname.trim().length==0) {
            document.getElementById('mname_error').innerHTML = "* Middle name should not consist of spaces only";
            document.getElementById('mname_id').style.borderColor= "red";
            document.getElementById('mname_id').style.borderStyle= "solid";
            var i = false;
          }
          if (mname.length < 3) {
            document.getElementById('mname_error').innerHTML = "* Middle name must be at least 3 characters";
            document.getElementById('mname_id').style.borderColor= "red";
            document.getElementById('mname_id').style.borderStyle= "solid";
            var i = false;
          }
        }

        //lname name validation
        if (lname == "") {
            document.getElementById('lname_error').innerHTML = "* Last name is required";
            document.getElementById('lname_id').style.borderColor= "red";
            document.getElementById('lname_id').style.borderStyle= "solid";
            var i = false;
        } else {
          if (/^[a-zA-Z. ]*$/.test(lname) == false) {
            document.getElementById('lname_error').innerHTML = "* Last name must not contain numeric characters";
            document.getElementById('lname_id').style.borderColor= "red";
            document.getElementById('lname_id').style.borderStyle= "solid";
            var i = false;
          }
          if (lname.trim().length==0) {
            document.getElementById('lname_error').innerHTML = "* Last name should not consist of spaces only";
            document.getElementById('lname_id').style.borderColor= "red";
            document.getElementById('lname_id').style.borderStyle= "solid";
            var i = false;
          }
          if (lname.length < 3) {
            document.getElementById('lname_error').innerHTML = "* Last name must be at least 3 characters";
            document.getElementById('lname_id').style.borderColor= "red";
            document.getElementById('lname_id').style.borderStyle= "solid";
            var i = false;
          }
        }

        //email validation
        if (email == "") {
            document.getElementById('email_error').innerHTML = "** Email is requiered";
            document.getElementById('email_id').style.borderColor= "red";
            document.getElementById('email_id').style.borderStyle= "solid";
            var i = false;
            
        } else {
          if (email.indexOf('@')<=0) {
            document.getElementById('email_error').innerHTML = "** Invalid email format";
            document.getElementById('email_id').style.borderColor= "red";
            document.getElementById('email_id').style.borderStyle= "solid";
            var i = false;
          }
          if (email.charAt(email.length-4)!='.') {
            document.getElementById('email_error').innerHTML = "** Invalid email format";
            document.getElementById('email_id').style.borderColor= "red";
            document.getElementById('email_id').style.borderStyle= "solid";
            var i = false;
          }
        }
        
        //username validation
        if (username == "") {
            document.getElementById('username_error').innerHTML = "* Username is required";
            document.getElementById('username_id').style.borderColor= "red";
            document.getElementById('username_id').style.borderStyle= "solid";
            var i = false;
        } else {
          if (username.trim().length==0) {
            document.getElementById('username_error').innerHTML = "** Username should not consist of spaces only";
            document.getElementById('username_id').style.borderColor= "red";
            document.getElementById('username_id').style.borderStyle= "solid";
            var i = false;
          }
          if (username.length < 5 || username.length > 25) {
            document.getElementById('username_error').innerHTML = "** Username should be atleast 5 to 25 characters";
            document.getElementById('username_id').style.borderColor= "red";
            document.getElementById('username_id').style.borderStyle= "solid";
            var i = false;
          }
        }
       
        //password validation
        if (password == "") {
            document.getElementById('password_error').innerHTML = "* Password is required";
            document.getElementById('password_id').style.borderColor= "red";
            document.getElementById('password_id').style.borderStyle= "solid";
            var i = false;
        } else {
          if (password.trim().length==0) {
            document.getElementById('password_error').innerHTML = "** Password should not consist of spaces only";
            document.getElementById('password_id').style.borderColor= "red";
            document.getElementById('password_id').style.borderStyle= "solid";
            var i = false;
          }
          if (password.length < 6 || password.length > 12) {
            document.getElementById('password_error').innerHTML = "* Password must contain 6-12 characters";
            document.getElementById('password_id').style.borderColor= "red";
            document.getElementById('password_id').style.borderStyle= "solid";
            var i = false;
          }
        }

        //contact validation
        if (contact == "") {
            document.getElementById('contact_error').innerHTML = "** Contact number is requiered";
            document.getElementById('contact_id').style.borderColor= "red";
            document.getElementById('contact_id').style.borderStyle= "solid";
            var i = false;
        } else {
          if (isNaN(contact)) {
            document.getElementById('contact_error').innerHTML = "* Invalid contact number";
            document.getElementById('contact_id').style.borderColor= "red";
            document.getElementById('contact_id').style.borderStyle= "solid";
            var i = false;
          }
          if (!contact.match(/^\d{11}$/)) {
            document.getElementById('contact_error').innerHTML = "* Contact number must be 11 digits";
            document.getElementById('contact_id').style.borderColor= "red";
            document.getElementById('contact_id').style.borderStyle= "solid";
            var i = false;
          }
        }
        
        //street validation
        if (street == "" || street.trim().length==0) {
            document.getElementById('street_error').innerHTML = "** Street address is requiered";
            document.getElementById('street_id').style.borderColor= "red";
            document.getElementById('street_id').style.borderStyle= "solid";
            var i = false;
        } else {
            if (street.length<4) {
              document.getElementById('street_error').innerHTML = "** Street address should be atleast 4 characters";
              document.getElementById('street_id').style.borderColor= "red";
              document.getElementById('street_id').style.borderStyle= "solid";
              var i = false;
            }
            if (/^[ a-zA-Z0-9.-]+$/.test(street) == false) {
              document.getElementById('street_error').innerHTML = "** Invalid character for an address";
              document.getElementById('street_id').style.borderColor= "red";
              document.getElementById('street_id').style.borderStyle= "solid";
              var i = false;
            } 
        }
       
        //barangay validation
        if (brgy == "" || brgy.trim().length==0) {
            document.getElementById('brgy_error').innerHTML = "* Barangay address is required";
            document.getElementById('brgy_id').style.borderColor= "red";
            document.getElementById('brgy_id').style.borderStyle= "solid";
            var i = false;
        } else {
          if (/^[ a-zA-Z0-9.-]+$/.test(brgy) == false) {
            document.getElementById('brgy_error').innerHTML = "** Invalid character for an address";
            document.getElementById('brgy_id').style.borderColor= "red";
            document.getElementById('brgy_id').style.borderStyle= "solid";
            var i = false;
          }
          if (brgy.length<4) {
            document.getElementById('brgy_error').innerHTML = "** Barangay address should be atleast 4 characters";
            document.getElementById('brgy_id').style.borderColor= "red";
            document.getElementById('brgy_id').style.borderStyle= "solid";
            var i = false;
          }
        }
        
        //city validation
        if (city == "" || city.trim().length==0) {
            document.getElementById('city_error').innerHTML = "* City address is required";
            document.getElementById('city_id').style.borderColor= "red";
            document.getElementById('city_id').style.borderStyle= "solid";
            var i = false;
        } else {
            if (/^[ a-zA-Z,-]+$/.test(city) == false) {
              document.getElementById('city_error').innerHTML = "** Invalid character for an address";
              document.getElementById('city_id').style.borderColor= "red";
              document.getElementById('city_id').style.borderStyle= "solid";
              var i = false;
            }
            if (city.length<4) {
              document.getElementById('city_error').innerHTML = "** City address should be atleast 4 characters";
              document.getElementById('city_id').style.borderColor= "red";
              document.getElementById('city_id').style.borderStyle= "solid";
              var i = false;
            }
        }
        

        //province validation
        if (province == "" || province.trim().length==0) {
            document.getElementById('province_error').innerHTML = "* Province address is required";
            document.getElementById('province_id').style.borderColor= "red";
            document.getElementById('province_id').style.borderStyle= "solid";
            var i = false;
        } else {
           if (/^[ a-zA-Z]+$/.test(province) == false) {
            document.getElementById('province_error').innerHTML = "** Invalid character for an address";
            document.getElementById('province_id').style.borderColor= "red";
            document.getElementById('province_id').style.borderStyle= "solid";
            var i = false;
          }
          if (province.length<4) {
            document.getElementById('province_error').innerHTML = "** Province address should be atleast 4 characters";
            document.getElementById('province_id').style.borderColor= "red";
            document.getElementById('province_id').style.borderStyle= "solid";
            var i = false;
          }
        }
       

        //zip code validation
        if (zip == "") {
            document.getElementById('zip_error').innerHTML = "** Zip Code is required";
            document.getElementById('zip_id').style.borderColor = "red";
            document.getElementById('zip_id').style.borderStyle = "solid";
            var i = false;
        } else {
          if (isNaN(zip)) {
            document.getElementById('zip_error').innerHTML = "* Invalid zip code number";
            document.getElementById('zip_id').style.borderColor= "red";
            document.getElementById('zip_id').style.borderStyle= "solid";
            var i = false;
          }
          if (!zip.match(/^\d{4}$/)) {
            document.getElementById('zip_error').innerHTML = "* Contact number must be 4 digits";
            document.getElementById('zip_id').style.borderColor= "red";
            document.getElementById('zip_id').style.borderStyle= "solid";
            var i = false;
          }
        }
        

        if (i == false) {
            return false;
        }

}  


</script>