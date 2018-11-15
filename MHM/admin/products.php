<?php 
require("../database/sql_connect.php");

$query = "SELECT * FROM products";

$data = mysqli_query($conn, $query);

if(!$data){
    echo "Error in query";
}
   if(isset($_GET['submit'])){
                                              
    $sql=$_GET['search'];
    $trimmed = trim($sql);

    $query = "SELECT * FROM products
            WHERE prod_name LIKE '%{$trimmed}%' OR type LIKE '%{$trimmed}%' or sub_category LIKE '%{$trimmed}%'";
      
    $data = mysqli_query($conn, $query);
  }
       
?>
<?php include('header.php');?>
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
    width: 40%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 10px;
}
table {
  display: block;
  height: 500px;
  overflow-y: scroll;
}
</style>



<body>
<div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Products</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>  
 <div class='row' style="margin-left:720px">
            <form  method="GET" action="" id="searchform"> 
                  <input  type="text" name="search" placeholder="Search for ..." style="width:300px">
                  <button class="btn btn-info" type="submit" name="submit">
                    <i class="fa fa-search"></i>
                  </button>
            </form> 
</div>  <br>                                              

 <center>
  <button type='button' class='btn btn-primary active'><i class="fas fa-plus"></i><a href='addProduct.php' style="color:white"> Add Products</a></button> 
<!--products table-->
 <div id="page-inner"> 
    <div class="row">
       <div class="col-md-12">
            <div class='panel panel-success' style='width:97%;margin:5% auto;'>
              <div class='panel-heading'></div>
              <div class='panel-body'>
                <table id='productTable' class='table table-sm'>
                  <thead style="text-align: center">
                      <tr>
                        <th>Photo</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Quantity</th>
                        <th>Market Price</th>
                        <th>Selling Price</th>
                        <th>Supplier</th>
                        <th></th>
                        <th><center>Action</center></th>
                        <th></th>          
                      </tr>
                  </thead>
                  <tbody>
                        <?php
                          while ($row = mysqli_fetch_array($data)){
                            echo "<tr>";
                              /*if ($row['photo']==NULL) {
                                  echo "<td><strong><center>N/A</center></strong></td>";
                              }else{
                                  echo "<td><img src='{$row['photo']}'' width='70' height='70' ></td>";
                              }*/
                              echo "<td><img src='{$row['photo']}'' width='70' height='70' ></td>";
                              echo "<td><center>".$row['prod_name']."</center></td>";
                              echo "<td><center>".$row['type']."</center></td>";
                              echo "<td><center>".$row['sub_category']."</center></td>";
                              echo "<td><center>".$row['qty']."</center></td>";
                              $unit_price = number_format($row['unit_price']);
                              echo "<td><center>".$unit_price."</center></td>";

                              $selling_price = number_format($row['selling_price']);
                              echo "<td><center>".$selling_price."</center></td>";

                              $supp = "SELECT * FROM suppliers WHERE supplier_id = '{$row['supplier_id']}' ";
                              $getResult = mysqli_query($conn,$supp);
                              $getsupp = mysqli_fetch_assoc($getResult);

                              echo "<td><center>".$getsupp['company_name']."</center></td>";
                              
                              echo "<td><button type ='button' class='btn btn-primary'><a href='editProductsV2.php?prod_id=".$row['prod_id']."' style='color:white' onClick=\"return confirm('Are you sure you want to edit this item?')\" ><i class = 'fa fa-edit'> </a></td>";
                              echo "<td><button type ='button' class='btn btn-danger'><a href='deleteProducts.php?prod_id=".$row['prod_id']."' style='color:white' onClick=\"return confirm('Are you sure you want to delete this item?')\" ><i class = 'fa fa-trash'> </a></td>";
                            
                                 echo "<td>";

                              echo "<button type='button' class='btn btn-warning' style='color:white' data-toggle='modal' data-target='#restock'><i class='fa fa-refresh'></i>RESTOCK</button>";
                              include("restock.php");
                              echo "</td>";
                              
                        
                            echo "<tr>";    
                          }                             
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
  </div>
</body>

</html>

