<?php 

 $query= "SELECT * FROM products";

$data = mysqli_query($conn, $query);
    if(!$data){
        echo "Error in query";
    }

$result = mysqli_fetch_array($data);
	
?>
<?php if($result['type'] =="" && $result['sub_category']==""){ ?>
	<div class="product_right">
		<h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
		<div class="nav">
		<ul class="nav navbar place">								
				
			<div class="clearfix"> </div>
		</ul>
		</div>
	</div>
<?php } ?>
<?php if($result['type'] == "electronics" || $result['sub_category'] =="Glucose Monitors"){ ?>
	<div class="product_right">
		<h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
		<div class="nav">
		<ul class="nav navbar place">								
				<li><?php echo "<a href='electronics.php?sub_category=".$result['sub_category']."'>Glucose Monitors</a></li>" ?>
				<li><?php echo "<a href='electronics.php?sub_category=".$result['sub_category']."'>Physical Therapy Devices</a></li>" ?>
			<div class="clearfix"> </div>
		</ul>
		</div>
	</div>
<?php }else if($result['type'] == "electronics" || $result['sub_category'] == "Physical Therapy Devices"){ ?>
	<div class="product_right">
		<h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
		<div class="nav">
		<ul class="nav navbar place">		
				<li><?php echo "<a href='electronics.php?sub_category=".$result['sub_category']."'>Glucose Monitors</a></li>" ?>						
				<li><?php echo "<a href='electronics.php?sub_category=".$result['sub_category']."'>Physical Therapy Devices</a></li>" ?>
			<div class="clearfix"> </div>
		</ul>
		</div>
	</div>


<?php } ?>