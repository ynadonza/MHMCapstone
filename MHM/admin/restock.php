<!-- <?php

$_SESSION['prod_id'] = $row['prod_id'];

echo $_SESSION['prod_id'];

?> -->

<div class="modal fade" id="restock" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <b> RESTOCK PRODUCT </b>
                    <button type="button" class="close" data-dismiss="modal"> &times;</button>
                                
            </div>
            
            <div class="modal-body">
                            
                <center>

                    <p>
                        <h6>
                          
                        
                        </h6>                 
                    </p>
                   
                    <form method="POST" action="insertRestock.php">
                
                        <div>
                            <input type="text" name="quantity" placeholder="Quantity" id="qty_id" required>
                            <span id="qty_error" class="text-danger font-weight-bold"></span>
                        </div>
    
                        <div>
                            <input type="text" name="unit_price" placeholder="Unit Price" id="unit_id" required>
                            <span id="unit_error" class="text-danger font-weight-bold"></span>
                        </div>

                        <!-- <P>
                       		<input type="hidden" name="prod_id" value=<?php echo $prod_id; ?>>
                        </P> -->
                     
                        <p>
                            <input type="submit" class="btn btn-success" name="SUBMIT">
                        </p>

                    </form>
                        
                    <!-- <script type="text/javascript">

                        function validateRestock(){
        
                        var quantity = document.getElementById('qty_id').value;
                        var unit_price = document.getElementById('unit_id').value;

                            if (quantity == "") {
                                document.getElementById('qty_error') = "** Please enter number of products";
                                document.getElementById('qty_id').style.borderColor= "red";
                                document.getElementById('qty_id').style.borderStyle= "solid";
                                return false;
                            }


                        }

                    </script> -->
                </center>
            </div>
        </div>
    </div>
</div>
