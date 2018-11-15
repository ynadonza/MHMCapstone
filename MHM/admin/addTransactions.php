

<?php 
require("../database/sql_connect.php");
require("session.php");

$query = "SELECT * FROM suppliers";
$result1 = mysqli_query ($conn, $query);


?>
<head>
<?php include("header.php") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function(e){
        //variables
        var html = '<p /><div>Product Name: <input type="text" name="prod_name id="prod_name" /> Quantity: <input type="number" name="qty" id="qty" /><a href="#" id="remove"> x</a></div>';                                                                                                                                                                              
        //add rows to the form
        $("#add").click(function(e){
            $("#container").append(html);
        });
        //remove rows from the form
        $("#container").on('click','#remove',function(e){
            $(this).parent('div').remove();

        });
        //populate values form
    });


</script>
</head>
<div id="content-wrapper">

    <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="transactions.php">Transactions</a>
            </li>
            <li class="breadcrumb-item active">Add Transactions</li>
           
          </ol>
        <div>
          <center>
                <form method="POST" action="insertTransactions.php">
                    <div id="container">
                        <p>
                            Company Name: <select name="supplierName" required='required'> 
                                             <option selected="selected">Add Supplier Name</option>
                                           <?php while($row1 = mysqli_fetch_array($result1)):;?>
                                            <option><?php echo $row1[1];?></option>
                                        <?php endwhile;?>
                                        </select> <br><br>

                            Product Name: <input type="text" name="prod_name" id="prod_name">
                            Quantity: <input type="number" name="qty" id="qty">
                            <a href="#" id="add">Add products</a>
                                
                                          
                        </p>
                    </div>
                        <button class ="btn btn-danger" type='reset'> Reset </button> &nbsp;
                        <button class = "btn btn-success" type='submit'> Submit </button>
                    </form>
            </center>
        </div>
    </div>
</div>