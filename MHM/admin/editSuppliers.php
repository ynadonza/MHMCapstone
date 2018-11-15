<?php 
require('../database/sql_connect.php');
/*$supplier_id = $_GET['supplier_id'];*/
$query = "SELECT * FROM suppliers JOIN address ON suppliers.add_id = address.add_id WHERE supplier_id = '{$_GET['supplier_id']}' ";
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
    width: 60%;
    height: 47px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
}

input[type='number']{
    width: 30%;
    height: 5px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
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

  
</style>
<body>

<div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
              <a href="suppliers.php"><b>Suppliers</b></a>
            </li>
            <li class="breadcrumb-item active">Edit Supplier
            </li>
          </ol>
        </div>
<!-- TABLE -->
<div id="page-inner"> 
    <div class="row">
       <div class="col-md-12">
            
       <center>
         <div id = "box">  
          <form method="POST" action="updatedSuppliers.php" onsubmit="return validate()">
              <p style="color:red">* Required Fields </p>
              <input type='hidden' name='supplier_id' value="<?php echo $data['supplier_id']?>">
              <div>      
                <strong>Supplier Name</strong><span class="required">*</span> <br>
                <input type='text' name='supplier' value="<?php echo $data['company_name']?>" id="supplier_id"><br>
                <span id="supplier_error" class="text-danger font-weight-bold"></span><br>
              </div>
              <div>
                <strong>Email</strong><span class="required">*</span> <br>
                <input type='text' name='email' value="<?php echo $data['email']?>" id="email_id"><br>
                <span id="email_error" class="text-danger font-weight-bold"></span><br>
              </div>
              <div>
                <strong>Contact</strong><span class="required">*</span> <br>
                <input type='text' name='contact' value="<?php echo $data['contact']?>" id="contact_id"><br>
                <span id="contact_error" class="text-danger font-weight-bold"></span><br>
              </div>
              <div>
                <strong>Street</strong><span class="required">*</span> <br>
                <input type='text' name='street' value="<?php echo $data['street']?>" id="street_id"><br>
                <span id="street_error" class="text-danger font-weight-bold"></span><br>
              </div>
              <div>
                <strong>Barangay</strong><span class="required">*</span> <br>
                <input type='text' name='brgy' value="<?php echo $data['brgy']?>" id="brgy_id"><br>
                <span id="brgy_error" class="text-danger font-weight-bold"></span><br>
              </div>
              <div>
                <strong>City</strong><span class="required">*</span> <br>
                <input type='text' name='city' value="<?php echo $data['city']?>" id="city_id"><br>
                <span id="city_error" class="text-danger font-weight-bold"></span><br>
              </div>
              <div>
                <strong>Province</strong><span class="required">*</span> <br>
                <input type='text' name='province' value="<?php echo $data['province']?>" id="province_id"><br>
                <span id="province_error" class="text-danger font-weight-bold"></span><br>
              </div>
              <div>
                <strong>Zip Code</strong><span class="required">*</span> <br>
                <input type='text' name='zip' value="<?php echo $data['zip_code']?>" id="zip_id"><br>
                <span id="zip_error" class="text-danger font-weight-bold"></span><br>
              </div>
              <input type='submit' value='Edit Supplier' name='submit' class='btn btn-success'>
            </center>
          </form>
        </div>
      </center>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  
  function validate(){

     var supplier = document.getElementById('supplier_id').value;
     var email = document.getElementById('email_id').value;
     var contact = document.getElementById('contact_id').value;
     var street = document.getElementById('street_id').value;
     var brgy = document.getElementById('brgy_id').value;
     var city = document.getElementById('city_id').value;
     var province = document.getElementById('province_id').value;
     var zip = document.getElementById('zip_id').value;

     //supplier name validation
        if (supplier == "") {
             document.getElementById('supplier_error').innerHTML = "** Supplier name is required";
            document.getElementById('supplier_id').style.borderColor= "red";
            document.getElementById('supplier_id').style.borderStyle= "solid";
            return false;
        } else {
          
          if (supplier.trim().length==0) {
            document.getElementById('supplier_error').innerHTML = "** Supplier name should not consist of spaces only";
            document.getElementById('supplier_id').style.borderColor= "red";
            document.getElementById('supplier_id').style.borderStyle= "solid";
            return false;
          }
          if (/^[a-zA-Z.& ]*$/.test(supplier) == false) {
            document.getElementById('supplier_error').innerHTML = "** Supplier name must not contain numeric characters";
            document.getElementById('supplier_id').style.borderColor= "red";
            document.getElementById('supplier_id').style.borderStyle= "solid";
            return false;
          }
        
          if (supplier.length < 3) {
            document.getElementById('supplier_error').innerHTML = "** Supplier name must be at least 3 characters";
            document.getElementById('supplier_id').style.borderColor= "red";
            document.getElementById('supplier_id').style.borderStyle= "solid";
            return false;
          }

        }

      //email validation
        if (email == "") {
            document.getElementById('email_error').innerHTML = "** Supplier email is required";
            document.getElementById('email_id').style.borderColor= "red";
            document.getElementById('email_id').style.borderStyle= "solid";
            return false;
        } else {

          if (email.indexOf('@')<=0) {
            document.getElementById('email_error').innerHTML = "** Invalid email format due to @";
            document.getElementById('email_id').style.borderColor= "red";
            document.getElementById('email_id').style.borderStyle= "solid";
            return false;
          }
          if (email.charAt(email.length-4)!='.') {
            document.getElementById('email_error').innerHTML = "** Invalid email format due to . ";
            document.getElementById('email_id').style.borderColor= "red";
            document.getElementById('email_id').style.borderStyle= "solid";
          }

        }
        
      //contact validation'
        if (contact == "") {
           document.getElementById('contact_error').innerHTML = "** Contact Number is required";
            document.getElementById('contact_id').style.borderColor= "red";
            document.getElementById('contact_id').style.borderStyle= "solid";
            return false;
        } else {

          if (isNaN(contact)) {
            document.getElementById('contact_error').innerHTML = "** Invalid contact number";
            document.getElementById('contact_id').style.borderColor= "red";
            document.getElementById('contact_id').style.borderStyle= "solid";
            return false;
          }
          if (!contact.match(/^\d{11}$/)) {
            document.getElementById('contact_error').innerHTML = "** Contact number must be 11 digits";
            document.getElementById('contact_id').style.borderColor= "red";
            document.getElementById('contact_id').style.borderStyle= "solid";
            return false;
          }

        }
        
      //street validation
        if (street == "") {
           document.getElementById('street_error').innerHTML = "** Street address is required";
            document.getElementById('street_id').style.borderColor= "red";
            document.getElementById('street_id').style.borderStyle= "solid";
            return false;
        } else {
          if (street.trim().length==0) {
            document.getElementById('street_error').innerHTML = "** Street address is required";
            document.getElementById('street_id').style.borderColor= "red";
            document.getElementById('street_id').style.borderStyle= "solid";
            return false;
          }
        }
        
      //barangay validation
        if (brgy == "") {
           document.getElementById('brgy_error').innerHTML = "** Barangay address is required";
            document.getElementById('brgy_id').style.borderColor= "red";
            document.getElementById('brgy_id').style.borderStyle= "solid";
            return false;
        } else {
          if (brgy.trim().length==0) {
            document.getElementById('brgy_error').innerHTML = "** Barangay address is required";
            document.getElementById('brgy_id').style.borderColor= "red";
            document.getElementById('brgy_id').style.borderStyle= "solid";
            return false;
          }
        }
        
      //city validation
        if (city == "") {
           document.getElementById('city_error').innerHTML = "** City address is required";
            document.getElementById('city_id').style.borderColor= "red";
            document.getElementById('city_id').style.borderStyle= "solid";
            return false;
        } else {
          if (city == "" || city.trim().length==0) {
            document.getElementById('city_error').innerHTML = "** City address is required";
            document.getElementById('city_id').style.borderColor= "red";
            document.getElementById('city_id').style.borderStyle= "solid";
            return false;
          }
        }
        
      //province validation
        if (province == "") {
           document.getElementById('province_error').innerHTML = "** Province address is required";
              document.getElementById('province_id').style.borderColor= "red";
              document.getElementById('province_id').style.borderStyle= "solid";
              return false;
        } else {
          if (province.trim().length==0) {
              document.getElementById('province_error').innerHTML = "** Province address is required";
              document.getElementById('province_id').style.borderColor= "red";
              document.getElementById('province_id').style.borderStyle= "solid";
              return false;
          }
        }

        //zip code validation
        if (zip == "") {
           document.getElementById('zip_error').innerHTML = "** Zip code is required";
              document.getElementById('zip_id').style.borderColor= "red";
              document.getElementById('zip_id').style.borderStyle= "solid";
              return false;
        } else {
          if (isNaN(zip)) {
            document.getElementById('zip_error').innerHTML = "** Invalid zip code number";
            document.getElementById('zip_id').style.borderColor= "red";
            document.getElementById('zip_id').style.borderStyle= "solid";
            return false;
          }
          if (!zip.match(/^\d{4}$/)) {
            document.getElementById('zip_error').innerHTML = "** Contact number must be 4 digits";
            document.getElementById('zip_id').style.borderColor= "red";
            document.getElementById('zip_id').style.borderStyle= "solid";
            return false;
          }
        }
        

  }

</script>

</body>
</html>
