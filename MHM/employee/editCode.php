
    <div class="modal fade" id="edit_code<?php echo $row['transactionCode_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><b>Edit Transaction Code</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <?php
require ("../database/sql_connect.php");

$query = "SELECT * FROM transaction_code WHERE transactionCode_id =".$row['transactionCode_id']." ";

$result = mysqli_query($conn, $query);

if (!$result){
	echo "Error in query";
	exit();
}

$row = mysqli_fetch_array($result);

                   
                ?>
                <center>
                <form method="POST" action="updateCode.php?id=<?php echo $row['transactionCode_id']; ?>" onsubmit="return confirm('Are you sure you want to save edited code?');">
 
                        	 <input type='hidden' name='transactionCode_id' value="<?php echo $row[0]?>">
							<b>Transaction Code:</b><br> <input type='text' name='code' value = "<?php echo $row[1]?>" required> <br><br> 

                    <br>
                    <button type="submit" name='SUBMIT' value='Submit' class="btn btn-primary"><span class="glyphicon glyphicon-check"></span>Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

            </center>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->