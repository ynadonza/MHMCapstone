<?php 
require('../database/sql_connect.php');

?>
<?php include('header.php');?>

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
 <?php
          
          $edit=mysqli_query($conn,"SELECT * FROM products WHERE prod_id='{$_GET['prod_id']}'");
          $erow=mysqli_fetch_array($edit);

          $getSupplier_data = "SELECT * FROM suppliers ";
          $resultSupplier_data = mysqli_query($conn,$getSupplier_data);

        ?>
<div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
              <a href="products.php"><b>Products</b></a>
            </li>
            <li class="breadcrumb-item active">Edit Products
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
             <?php if (isset($_SESSION['success'])): ?>
                                        <?php foreach($_SESSION['success'] as $success): ?>
                                            <a style="color: green"><i class="fa fa-check"></i> <?php echo "&nbsp;$success" ?></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>     
            <form method="POST" enctype="multipart/form-data" action="saveUpdatedProducts.php?id=<?php echo $erow['prod_id']; ?>"">
                <center>
                    <div style="height:10px;"></div>
                    <div class="row">
                    <div class="col-lg-2">
                                                <!-- <label style="position:relative; top:7px;">Supplier:</label> -->
                    </div>
                    <div class="col-lg-8">
                    <b>Supplier</b><span class="required">*</span><br> 
                    <select name="addSupplier">
                    <option value=<?php echo $erow['supplier_id']; ?> selected="selected">Supplier</option>
                    <?php 
                            while ($supp_data = mysqli_fetch_assoc($resultSupplier_data)) { 
                        echo "<option value=".$supp_data['supplier_id'].">".$supp_data['company_name']."</option>";    
                            } 
                    ?> 
                                </select>
                                <br><span id="supplier_error" class="text-danger font-weight-bold"></span><br>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                              <!--   <label style="position:relative; top:7px;">Category:</label> -->
                            </div>
                            <div class="col-lg-8">
                                <b>Category</b><span class="required">*</span><br> 
                                <select name="productType">
                                     <?php
                                                $productType = array ("Electronics", "Surgical", "Self Care", "Acute Care", "Long Term Care");

                                                  foreach ($productType as $nproductType){
                                                    if($erow['type'] == $nproductType){
                                                      echo "<option selected>".$nproductType."</option>";
                                                    }else{
                                                      echo "<option>".$nproductType."</option>";
                                                    }
                                                  }
 

                                          ?>
                                  <!--   <option value=<?php echo $erow['type']; ?> selected="selected" disabled>Category</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Surgical">Surgical</option>
                                    <option value="Self Care">Self Care</option>
                                    <option value="Acute Care">Acute Care</option>
                                    <option value="Long Term Care">Long Term Care</option> -->
                                </select>
                                 <br><span id="type_error" class="text-danger font-weight-bold"></span><br>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                             <!--    <label style="position:relative; top:7px;">Sub-Category:</label> -->
                            </div>
                            <div class="col-lg-8">
                                 <b>Sub Category</b><span class="required">*</span><br> 
                                <select name="sub_category">
                                    <?php
                                        if ($erow['sub_category']==NULL) {
                                            echo "<option value='' selected='selected' disabled>Sub Category</option>";
                                        } else {
                                            echo "<option value=".$erow['sub_category']." selected='selected' disabled>Sub Category</option>";
                                        }
                                    ?>
                                    <option disabled></option>
                                    <option disabled>Electronics</option>
                                    <option value="Glucose Monitor">- Glucose Monitor</option>
                                    <option value="Physical Therapy">- Physical Therapy</option>
                                    <option value="Defibrillators">- Defibrillators</option>
                                    <option value="Biomedical Testing">- Biomedical Testing</option>
                                    <option value="Endoscopy">- Endoscopy</option>
                                    <option disabled></option>
                                    <option disabled>Self-care</option>
                                    <option value="Facial Tissue">- Facial Tissue</option>
                                    <option value="Skin Care">- Skin Care</option>
                                    <option value="Urinal Accessories">- Urinal Accessories</option>
                                    <option value="Feminine Hygiene">- Feminine Hygiene</option>
                                    <option value="Paper towels">- Paper towels</option>
                                    <option disabled></option>
                                    <option disabled>Surgical</option>
                                    <option value="Instrument Care">- Instrument Care</option>
                                    <option value="Wound Closure">- Wound Closure</option>
                                    <option value="Surgical Accessories">- Surgical Accessories</option>
                                    <option value="Cutting Accessories">- Cutting Accessories</option>
                                    <option value="Surgical kits">- Surgical kits</option>
                                    <option disabled></option>
                                    <option disabled>Acute Care</option>
                                    <option value="Rehabilitation Care">- Rehabilitation Care</option>
                                    <option disabled></option>
                                    <option disabled>Long-term Care</option>
                                    <option value="Video Monitoring">- Video Monitoring</option>
                                    <option value="Sensor Monitoring">- Sensor Monitoring</option>
                                    <option value="Care Zare">- Care Zare</option>
                                    <option value="Activity Trackers">- Activity Trackers</option>
                                </select>
                                <br><span id="sub_error" class="text-danger font-weight-bold"></span><br>
                            </div>
                        </div>  

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                    
                            </div>
                            <div class="col-lg-8">
                               <b>Product Name </b><span class="required">*</span><input type="text" name="prod_name" id="prod_id" class="form-control" value="<?php echo $erow['prod_name']; ?>">
                                <span id="prod_error" class="text-danger font-weight-bold"></span><br>
                            </div>
                        </div>  

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                          <!--       <label style="position:relative; top:7px;">Market Price:</label> -->
                            </div>
                            <div class="col-lg-8">
                              <b> Market Price </b><span class="required">*</span><input type="text" name="unit_price" id="unit_id" class="form-control" value="<?php echo $erow['unit_price']; ?>">
                               <span id="unit_error" class="text-danger font-weight-bold"></span><br>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                        
                            </div>
                            <div class="col-lg-8">
                             <b>Description</b><span class="required">*</span><input type="text" name="desc" id="desc_id" class="form-control" value="<?php echo $erow['description']; ?>">
                              <span id="desc_error" class="text-danger font-weight-bold"></span><br>
                            </div>
                        </div>
                      
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                             <!--    <label style="position:relative; top:7px;">Photo:</label> -->
                            </div>
                            <div class="col-lg-8">
                            <b> Photo</b><span class="required">*</span><br>
                            <input type="file" name="prodPhoto" multiple="multiple" />
                             <span id="file_error" class="text-danger font-weight-bold"></span><br>
                            </div>
                        </div>  
                        <br>
                         <input type="submit" name="SUBMIT" class="btn btn-success">

        </center>
                         </form>
            </div>
        </div>
    </div>
<script type="text/javascript">
    
    function validateProducts(){

     var supplier = document.getElementById('supplier_id').value;
     var type = document.getElementById('type_id').value;
     var sub_type = document.getElementById('sub_id').value;
     var prod_name = document.getElementById('prod_id').value;
     var unit_price = document.getElementById('unit_id').value;
     var description = document.getElementById('desc_id').value;
     var file = document.getElementById('file_id').value;

    //supplier name validation
        if (supplier == "") {
            document.getElementById('supplier_error').innerHTML = "** Please select supplier";
            document.getElementById('supplier_id').style.borderColor= "red";
            document.getElementById('supplier_id').style.borderStyle= "solid";
            return false;
        }

    //type validation
        if (type == "") {
            document.getElementById('type_error').innerHTML = "** Please select the type of the product";
            document.getElementById('type_id').style.borderColor= "red";
            document.getElementById('type_id').style.borderStyle= "solid";
            return false;
        }
        
    //sub_type validation
        if (sub_type == "") {
            document.getElementById('sub_error').innerHTML = "** Please select a sub-category of the product";
            document.getElementById('sub_id').style.borderColor= "red";
            document.getElementById('sub_id').style.borderStyle= "solid";
            return false;
        }

    //product validation
        if (prod_name == "" || prod_name.trim().length==0) {
            document.getElementById('prod_error').innerHTML = "** Please provide a product name";
            document.getElementById('prod_id').style.borderColor= "red";
            document.getElementById('prod_id').style.borderStyle= "solid";
            return false;
        }

 
    //unit_price validation
        if (unit_price == "" || unit_price.trim().length==0) {
            document.getElementById('unit_error').innerHTML = "** Please provide the market price";
            document.getElementById('unit_id').style.borderColor= "red";
            document.getElementById('unit_id').style.borderStyle= "solid";
            return false;
        }
        if (isNaN(unit_price)) {
            document.getElementById('unit_error').innerHTML = "** Invalid unit price";
            document.getElementById('unit_id').style.borderColor= "red";
            document.getElementById('unit_id').style.borderStyle= "solid";
            return false;
        }

    //description validation
        if (description == "" || description.trim().length==0) {
            document.getElementById('desc_error').innerHTML = "** Please provide description of the product";
            document.getElementById('desc_id').style.borderColor= "red";
            document.getElementById('desc_id').style.borderStyle= "solid";
            return false;
        }
        if (description.length <= 10 || description.length > 255) {
            document.getElementById('desc_error').innerHTML = "** Description must be atleast 10 characters";
            document.getElementById('desc_id').style.borderColor= "red";
            document.getElementById('desc_id').style.borderStyle= "solid";
            return false;
        }

    //file validation
        if (file == "") {
            document.getElementById('file_error').innerHTML = "** Please provide a photo of the product";
            document.getElementById('file_id').style.borderColor= "red";
            document.getElementById('file_id').style.borderStyle= "solid";
            return false;
        }    

  }

</script>