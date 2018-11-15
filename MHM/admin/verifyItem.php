<?php
require("../database/sql_connect.php");

$query = "SELECT * FROM suppliers";

$result = mysqli_query($conn,$query);

if ($result) {
    echo mysqli_error($conn);
} 

?>
<style>
input[type='text']{
    width: 40%;
    height: 4px;
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
select{
    width: 36%;
    height: 47px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
    background:skyblue;
}
</style>
<div class="modal fade" id="verify" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!--  <h5> Terms and Privacy Policy </h5> -->
                    <button type="button" class="close" data-dismiss="modal"> &times;</button>
                                
            </div>
            
            <div class="modal-body">
                            
                <center>

                    <p>
                        <h6 style="color:red">
                            Please be guided that <b>ONLY</b> new products <b>SHOULD ONLY</b> be added to the database. 
                            Thus press <b>RESTOCK</b> button in Products table if you would like to add existing product.
                        </h6>                 
                    </p>
                   
                    <form method="POST" action="insertProducts.php" enctype="multipart/form-data">
                        
                        <p>
                            <select name="addSupplier">
                                <option value=000 selected="selected" disabled>Select Supplier</option>
                                <?php 
                                    while ($getSupplier = mysqli_fetch_assoc($result)) { 
                                        echo "<option value=".$getSupplier['supplier_id'].">".$getSupplier['company_name']."</option>";    
                                    } 
                                ?> 
                            </select>

                            <select name="productType">
                                <option value="" selected="selected" disabled>Product Type</option>
                                <option value="electronics">Electronics</option>
                                <option value="surgical">Surgical</option>
                                <option value="self_care">Self-care</option>
                                <option value="acuteCare">Acute Care</option>
                                <option value="longTermCare">Long-term Care</option>
                            </select>

                            <select name="sub_category">
                                <option value="" selected="selected" disabled>Sub Category</option>
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
                        </p>

                        <p>
                            <input type="text" name="prod_name" placeholder="Product Name">
                        </p>
                
                        <p>
                            <input type="number" name="quantity" placeholder="Quantity">
                        </p>
    
                        <p>
                            <input type="number" name="unit_price" placeholder="Unit Price">
                        </p>
    
                        <p>
                             <label for="message-text">Description</label>
                            <textarea class="form-control" id="message-text" name="desc" class="validate"></textarea>
                          
                        </p>

                        <p>
                            <input type="file" name="prodPhoto" multiple="multiple" /> 
                        </p>
                     
                        <p>
                            <input type="submit" class='btn btn-primary' name="SUBMIT">
                        </p>
                    </form>

                        <!-- <button type='button' class='btn btn-primary' data-toggle="modal" data-target="#addProducts"><i class="fas fa-plus"></i> Add New Product</button> --> 
                        <?php // include("addProducts.php"); ?>
                        
                </center>
            </div>
        </div>
    </div>
</div>

