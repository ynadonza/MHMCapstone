<?php 
 require("../database/sql_connect.php");

 ?>
<head>
  <!DOCTYPE HTML>
<html>
<head>
<title>Metro Health Management</title>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

<link href="css2/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->

<!-- Custom Theme files -->
<link href="css2/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css2/half-slider.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="modal.css"> -->
  <link rel="stylesheet" type="text/css" href="wrapper.css">
  
<!--//theme-style-->
<meta name="keywords" content="Furnyish Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
<!-- start menu -->
<link href="css2/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<!-- <script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/menu_jquery.js"></script>

<link href="css2/form.css" rel="stylesheet" type="text/css" media="all" /> -->
 <!--  <script src="js/responsiveslides.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 


<style type="text/css">
    .cartqty{
      width: 50px;
      height: 25px;
      padding-left: 5px;
      font-size: 12px;
    }
  </style>

<body>
<!-- header -->
<?php include("userheader.php") ?>

<!--cart-->
<?php include("functions/function.php") ?>

<?php include("usermenu.php") ?>
<!---->
<div class="cart_main">
	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="userindex.php">Home</a></li>
		  <li class="active">Cart</li>
		 </ol>			
		 <div class="cart-items">
			 <h2>My Shopping Bag (<?php echo count(@$_SESSION['prod_cart']); ?>)</h2>
			 <div class="cart-header">
				 <!-- <div class="cart-sec"> -->
				 	<table class="table table-responsive" >
            <form method="post">
				 			<?php
                // if (empty($_SESSION['prod_cart'])) {
                //   // echo "Your Cart is Empty";
                // }
                if(isset($_SESSION['prod_cart'])){

                  $subtotal = 0;
                  $totalAmount = 0;
                foreach($_SESSION['prod_cart'] as $row){
                  $subtotal = $row['qty'] * $row['selling_price'];
                  $totalAmount +=$subtotal;
                                    echo "<tr>";
                                    echo "<td> "
                                    ?>
                                    <img src="../admin/<?php echo $row['photo']; ?>" class="img-responsive" alt="" style="width: 200px;height: 150px;">
                                    <?php
                                    "</td>";
                                    ?>
                                    <td>
                                    <div class='cart-item-info '>
                                    <?php echo $row['prod_name']; ?>
                                    <h3>
                                    <span class='price'>Price: &#8369;<?php echo number_format($row['selling_price'],2); ?></span>
                                    </h3>
                                    <h4>
                                    <span>Amount: &#8369; <?php echo number_format($subtotal,2); ?></span>
                                    </h4>
                                    <p class='qty'>Qty:
                                    <input class='cartqty quantity' type='text' value="<?php echo $row['qty']; ?>" disabled="">
                                    </div>
                                    </td>

                                    <?php
                                    echo "<td> <input type='hidden'> </td>";
                                    echo "<td><input type='hidden'>  </td>";
                                    echo "<td><input type='hidden'>  </td>";
                                    ?>
                                    <td><div><button onclick="remove_cart('<?php echo $row['prod_id']; ?>')" style="border:1px solid #3071a9;padding:2px 10px 2px 10px;font-size:12px;cursor:pointer;text-decoration:none;float:right;background-color:#00677C;color:white;">x</button></div></td>
                                    <?php
                                    echo "</tr>";
                               }
                                        ?>
              </form>
            </tbody>
				 	</table>
				 <!-- </div> -->
			 </div>
       <div class="cart-total">
       <a class="continue" href="userindex.php">Continue to Shopping</a>  
       <h4 class="last-price">TOTAL AMOUNT: </h4>
       <span class="total final">
         &#8369;
        <?php
              echo number_format($totalAmount,2); 
          }                                        
        ?>
       </span>
       <div class="clearfix"></div>
       <?php if (empty($_SESSION['prod_cart'])) {
          echo "<a class='order' style='color:white'><i class='fa fa-warning'></i> Your Cart is Empty </a>";
        
        }else{
           echo "<a class='order' style='color:white' href='userconfirm.php'>Check Out</a>";
        }
      
       ?>
      </div>
   
   
    </div>
  </div>

		  

<script>
  function remove_cart(prod_id){
  //alert(p_id);
  $.ajax({
    type:"post",
    url:"usercart.php",
    data:{action:'delete',prod_id:prod_id},
    success:function(result){
      $('.cart_data').html(result);
    }
  });
}
</script>
<!---->
<br>
</body>
<!---->
<?php include("footer.php") ?>

<!---->

