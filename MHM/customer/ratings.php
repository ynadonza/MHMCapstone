<?php 
	require("../database/sql_connect.php");
	$user_id = $_GET['user_id'];
	$order_id = $_GET['order_id'];



 ?>
  
<body>
<!-- header -->
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="rating.js"></script>
<?php include("userheader.php") ?>

<style>
.star{
    color: #ccc;
    cursor: pointer;
    transition: all 0.2s linear;
}
.star-checked{
    color: gold;
}
#result{
    display: none;
}
b.r{
    color: red;
}
b.g{
    color: green;
}
</style>
<?php include("usermenu.php") ?>

	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="userindex.php">Home</a></li>
		  <li><a href="orders.php">Orders</a></li>
		  	<li class="active">Ratings and Feedbacks</li>
		 </ol>			
		
		 <center>
	<br>
    
  <div id="ratingSection">
  	 <div class="panel panel-success" style="width: 400px">
            <div class="panel-heading"></div>
            <div class="panel-body">
		<div class="row">
			<div class="col-sm-12">
				<form id="ratingForm" method="POST">					
					<div class="form-group">
						<h4>Rate our service</h4>
						<button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<input type="hidden" class="form-control" id="rating" name="rating" value="1">
						<input type="hidden" class="form-control" id="order_id" name="order_id" value="<?php echo $_GET['order_id']; ?>">
						<input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $_GET['user_id']; ?>">
					</div>		
					<div class="form-group">
						<label for="usr">Title <i>(Optional)</i></label>
						<input type="text" class="form-control" id="title" name="title">
					</div>
					<div class="form-group">
						<label for="comment">Comment <i>(Optional)</i></label>
						<textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info active" id="saveReview">Save Review</button> 
					</div>			
				</form>
			</div>
		</div>
	</div>	
</div>
</div>



</center>
</div>
<script>
	$('#ratingForm').on('submit', function(event){
event.preventDefault();
var formData = $(this).serialize();
 var user_id = $('#user_id').val();
  var order_id = $('#order_id').val(); 
$.ajax({
type : 'POST',
url : 'store_rating.php',
data : formData,user_id:+<?php echo $_GET['user_id']; ?>,order_id:+<?php echo $_GET['order_id']; ?>,
success:function(response){
alert("Thank you for rating!");window.location.href = "orders.php";
}
});
});
</script>
</html>
<?php include("footer.php") ?>