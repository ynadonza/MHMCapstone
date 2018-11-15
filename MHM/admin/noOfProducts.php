<?php 
require("../database/sql_connect.php");
require("session.php");

$qty = $_POST['qtyOfItems'];

$sql = "SELECT * FROM suppliers";
$result = mysqli_query($conn,$sql);

if (!$result) {
    echo mysqli_error($result);
}

?>

<?php include('header.php'); ?>

<body>
<div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Products</a>
            </li>
            <li class="breadcrumb-item active">Add Products</li>
          </ol>
        <div>
            <center>
                <div class="container-fluid">
                    <br>
                    <h3>New Arrival Products</h3>
                    <form method="POST" action="addProducts.php" enctype="multipart/form-data">
                        <select name="addSupplier">
                            <option value=000 selected="selected">Select Supplier</option>
                            <?php 
                                while ($getSupplier = mysqli_fetch_assoc($result)) { 
                                    echo "<option value=".$getSupplier['supplier_id'].">".$getSupplier['company_name']."</option>";    
                                } 
                            ?>
                        </select>
                        <input type="hidden" name="quantityOfProducts" value=<?php echo $qty; ?> >
                        <br>
                        <br>
                        <?php for ($i=0; $i < $qty; $i++) { ?>
                            <p>
                            <input type="text" name="prod_name[]" required="required" placeholder="Product Name">
                            <select name="productType[]">
                                <option value=000 selected="selected">Product Type</option>
                                <option value="electronics">Electronics</option>
                                <option value="surgical">Surgical</option>
                                <option value="self_care">Self-care</option>
                                <option value="acuteCare">Acute Care</option>
                                <option value="longTermCare">Long-term Care</option>
                            </select>
                            <input type="number" name="quantity[]" required="required" placeholder="Quantity">
                            <input type="number" name="unit_price[]" required="required" placeholder="Unit Price">
                            <input type="text" name="desc[]" required="required" placeholder="Description">
                            </p>
                            <p>
                            <input type="file" name="prodPhoto[]" multiple="multiple" /> 
                            <br>
                            </p>
                        <?php } ?>
                            <br>
                            <input type="submit" name="SUBMIT">
                    </form>
                </div>    
            </center>
        </div>
    </div>
</div>
<!-- <?php include('footer.php');?> -->

