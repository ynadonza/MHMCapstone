<?php
require("../database/sql_connect.php");

$query = "SELECT * FROM products JOIN suppliers ON products.supplier_id = suppliers.supplier_id WHERE prod_id = '{$_GET['prod_id']}' ";

$result = mysqli_query($conn,$query);

if ($result) {
	$erow = mysqli_fetch_assoc($result);
} else {
	echo mysqli_error($conn);
}


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
    border: 2px solid black;
    border-radius: 8px;
    border-width: 2px;
    background-color: #e9ecef;
    width: 40%;
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
<div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
              <a href="products.php"><b>Products</b></a>
            </li>
            <li class="breadcrumb-item active">Add Product
            </li>
          </ol>
        </div>
<!-- TABLE -->
<div id="page-inner"> 
    <div class="row">
       <div class="col-md-12">
       <center>
         
        <br>
       
          <div id ="box2">
                <?php 
                    $query = "SELECT * FROM suppliers";
                    $result = mysqli_query($conn,$query);

                        if (!$result) {
                            echo mysqli_error($conn);
                        }
                ?>             
                    <p style="color:red">* Required Fields </p>
                        <form method="POST" action="saveUpdatedProducts.php?id=<?php echo $erow['prod_id']; ?> " onsubmit="return validateProducts()" enctype="multipart/form-data"> 
                            
                            <div>      
                           		<b>Supplier</b><span class="required">*</span><br>      
                                <select name="addSupplier" id="supplier_id">
                                    <option value="<?php echo $erow['company_name']; ?>" selected="selected" disabled><?php echo $erow['company_name']; ?></option>
                                    <option disabled></option>
                                    <?php 
                                        while ($getSupplier = mysqli_fetch_assoc($result)) {
                                            echo "<option value=".$getSupplier['supplier_id'].">".$getSupplier['company_name']."</option>";
                                        }
                                    ?> 
                                </select>
                                <br><br>
                            </div>

                            <div>
                                <b>Category</b><span class="required">*</span><br> 
                                <select name="productType" id="type_id">
                                    <option value="<?php echo $erow['type']; ?>" selected="selected" disabled><?php echo $erow['type']; ?></option>
                                    <option disabled></option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Surgical">Surgical</option>
                                    <option value="Self care">Self-care</option>
                                    <option value="Acute Care">Acute Care</option>
                                    <option value="long Term Care">Long-term Care</option>
                                </select>
                                <br><br>
                            </div>

                            <div>
                                <b>Sub Category</b><span class="required">*</span><br> 
                                <select name="sub_category" id="sub_id">
                                    <option value="<?php echo $erow['sub_category']; ?>" selected="selected" disabled><?php echo $erow['sub_category']; ?></option>
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
                                    <option value="Laboratory Equipment">- Laboratory Equipments</option>
                                    <option disabled></option>
                                    <option disabled>Long-term Care</option>
                                    <option value="Video Monitoring">- Video Monitoring</option>
                                    <option value="Wearable Health">- Wearable Health</option>
                                </select>
                                <br><br>
                            </div>

                            <div>
                                 <b>Product Name</b><span class="required">*</span><br>
                                <input type="text" name="prod_name" value="<?php echo $erow['prod_name']; ?>" id="prod_id" autocomplete="off"><br>
                                <span id="prod_error" class="text-danger font-weight-bold"></span><br>
                            </div>  

                            <div>
                                 <b>Description</b><span class="required">*</span><br>
                                <input type="text" name="desc" value="<?php echo $erow['description']; ?>" id="desc_id" autocomplete="off"><br>
                                <span id="desc_error" class="text-danger font-weight-bold"></span><br>
                            </div>

                           <!--  <div>
                                <b>Description</b><span class="required">*</span>
                                <textarea id="desc_id" class="form-control" style="width:70%;" name="desc" class="validate"></textarea>
                                <span id="desc_error" class="text-danger font-weight-bold"></span><br>
                            </div>   -->

                            <div>
                                 <b>Photo</b><span class="required">*</span> <br>
                                <input type="file" name="prodPhoto" multiple="multiple" id="file_id"/> <br>
                                <span id="file_error" class="text-danger font-weight-bold"></span> <br>
                            </div>

                            <div>
                                <!-- <b>Quantity</b><span class="required">*</span><br> -->
                                <input type="text" name="qty" placeholder="Quantity" id="qty_id" autocomplete="off" hidden><br>
                                <span id="qty_error" class="text-danger font-weight-bold"></span><br>
                            </div>

                            <div>
                                <!-- <b>Market Price</b><span class="required">*</span><br> -->
                                <input type="text" name="unit_price" placeholder="Market Price Per Unit" id="unit_id" autocomplete="off" hidden><br>
                                <span id="unit_error" class="text-danger font-weight-bold"></span><br>
                            </div>            
                          
                            <div>
                               <input type="submit" class='btn btn-success' name="SUBMIT"> 
                            </div>
                                               
                        </form>
                </center>
            </div>
        </div>
    </div>
</div>
</div>      
            

<script type="text/javascript">
    
    function validateProducts(){

     var supplier = document.getElementById('supplier_id').value;
     var type = document.getElementById('type_id').value;
     var sub_type = document.getElementById('sub_id').value;
     var product = document.getElementById('prod_id').value;
     var qty = document.getElementById('qty_id').value;
     var unit_price = document.getElementById('unit_id').value;
     var description = document.getElementById('desc_id').value;
     var file = document.getElementById('file_id').value;

    //supplier name validation
        if (supplier == "") {
            document.getElementById('supplier_error').innerHTML = "** Please select supplier";
            document.getElementById('supplier_id').style.borderColor= "red";
            document.getElementById('supplier_id').style.borderStyle= "solid";
            var i = false;
        }

    //type validation
        if (type == "") {
            document.getElementById('type_error').innerHTML = "** Please select the type of the product";
            document.getElementById('type_id').style.borderColor= "red";
            document.getElementById('type_id').style.borderStyle= "solid";
            var i = false;
        }
        
    //sub_type validation
        if (sub_type == "") {
            document.getElementById('sub_error').innerHTML = "** Please select a sub-category of the product";
            document.getElementById('sub_id').style.borderColor= "red";
            document.getElementById('sub_id').style.borderStyle= "solid";
            var i = false;
        }

    //product validation
        if (product == "" || product.trim().length==0) {
            document.getElementById('prod_error').innerHTML = "** Please provide a product name";
            document.getElementById('prod_id').style.borderColor= "red";
            document.getElementById('prod_id').style.borderStyle= "solid";
            var i = false;
        }

    /*//qty validation
        if (qty == "" || qty.trim().length==0) {
            document.getElementById('qty_error').innerHTML = "** Please provide quantity of products";
            document.getElementById('qty_id').style.borderColor= "red";
            document.getElementById('qty_id').style.borderStyle= "solid";
            var i = false;
        }
        if (isNaN(qty)) {
            document.getElementById('qty_error').innerHTML = "** Invalid quantity";
            document.getElementById('qty_id').style.borderColor= "red";
            document.getElementById('qty_id').style.borderStyle= "solid";
            var i = false;
        }

    //unit_price validation
        if (unit_price == "" || unit_price.trim().length==0) {
            document.getElementById('unit_error').innerHTML = "** Please provide the market price";
            document.getElementById('unit_id').style.borderColor= "red";
            document.getElementById('unit_id').style.borderStyle= "solid";
            var i = false;
        }
        if (isNaN(unit_price)) {
            document.getElementById('unit_error').innerHTML = "** Invalid unit price";
            document.getElementById('unit_id').style.borderColor= "red";
            document.getElementById('unit_id').style.borderStyle= "solid";
            var i = false;
        }*/

    //description validation
        if (description == "" || description.trim().length==0) {
            document.getElementById('desc_error').innerHTML = "** Please provide description of the product";
            document.getElementById('desc_id').style.borderColor= "red";
            document.getElementById('desc_id').style.borderStyle= "solid";
            var i = false;
        }
        // if (description.length <= 10 || description.length > 255) {
        //     document.getElementById('desc_error').innerHTML = "** Description must be atleast 10 characters";
        //     document.getElementById('supplier_id').style.borderColor= "red";
        //     document.getElementById('supplier_id').style.borderStyle= "solid";
        //     var i = false;
        // }

    /*//file validation
        if (file == "") {
            document.getElementById('file_error').innerHTML = "** Please provide a photo of the product";
            document.getElementById('file_id').style.borderColor= "red";
            document.getElementById('file_id').style.borderStyle= "solid";
            var i = false;
        }  */  

        if (i == false) {
            return false;
        }
  }

</script>