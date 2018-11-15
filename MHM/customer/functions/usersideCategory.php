<?php 

 $query= "SELECT * FROM products WHERE type='electronics'";

$data = mysqli_query($conn, $query);
    if(!$data){
        echo "Error in query";
    }
// $type = isset($_POST['type'])? $_POST['type']:'';
// 	$type = isset($_GET['type'])? $_GET['type']:'';
// 	$sub_category = isset($_POST['sub_category'])? $_POST['sub_category']:'';
// 	$sub_category = isset($_GET['sub_category'])? $_GET['sub_category']:'';

?>

<?php if($type="electronics" || $sub_category="Glucose Monitors"){ ?>
	<div class="product_right">
		<h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
		<div class="nav">
		<ul class="nav navbar place">								
				<li><a href="userelectronics.php?sub_category=Glucose Monitors">Glucose Monitors</a></li>
				<li><a href="userelectronics.php?sub_category=Physical Therapy Devices">Physical Therapy Devices</a></li>
				<li><a href="userelectronics.php?sub_category=Defibrillators">Defibrillators</a></li>
				<li><a href="userelectronics.php?sub_category=Biomedical Testing Devices">Biomedical Testing Devices</a></li>
				<li><a href="userelectronics.php?sub_category=Endoscopy Equipment">Endoscopy Equipment</a></li>
			<div class="clearfix"> </div>
		</ul>
		
		</div>
	</div>
<?php }else if($type = "electronics" || $sub_category = "Physical Therapy Devices"){ ?>
	<div class="product_right">
		<h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
		<div class="nav">
		<ul class="nav navbar place">		
				<li><a href="userelectronics.php?sub_category=Glucose Monitors">Glucose Monitors</a></li>
				<li><a href="userelectronics.php?sub_category=Physical Therapy Devices">Physical Therapy Devices</a></li>
				<li><a href="userelectronics.php?sub_category=Defibrillators">Defibrillators</a></li>
				<li><a href="userelectronics.php?sub_category=Biomedical Testing Devices">Biomedical Testing Devices</a></li>
				<li><a href="userelectronics.php?sub_category=Endoscopy Equipment">Endoscopy Equipment</a></li>
			<div class="clearfix"> </div>
		</ul>
		</div>
	</div>
<?php }else if($type == "electronics" || $sub_category == "Defibrillators"){ ?>
	<div class="product_right">
		<h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
		<div class="nav">
		<ul class="nav navbar place">		
					<li><a href="userelectronics.php?sub_category=Glucose Monitors">Glucose Monitors</a></li>
				<li><a href="userelectronics.php?sub_category=Physical Therapy Devices">Physical Therapy Devices</a></li>
				<li><a href="userelectronics.php?sub_category=Defibrillators">Defibrillators</a></li>
				<li><a href="userelectronics.php?sub_category=Biomedical Testing Devices">Biomedical Testing Devices</a></li>
				<li><a href="userelectronics.php?sub_category=Endoscopy Equipment">Endoscopy Equipment</a></li>
			<div class="clearfix"> </div>
		</ul>
		</div>
	</div>
<?php }else if($type == "electronics" || $sub_category == "Biomedical Testing Devices"){ ?>
	<div class="product_right">
		<h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
		<div class="nav">
		<ul class="nav navbar place">		
					<li><a href="userelectronics.php?sub_category=Glucose Monitors">Glucose Monitors</a></li>
				<li><a href="userelectronics.php?sub_category=Physical Therapy Devices">Physical Therapy Devices</a></li>
				<li><a href="userelectronics.php?sub_category=Defibrillators">Defibrillators</a></li>
				<li><a href="userelectronics.php?sub_category=Biomedical Testing Devices">Biomedical Testing Devices</a></li>
				<li><a href="userelectronics.php?sub_category=Endoscopy Equipment">Endoscopy Equipment</a></li>
			<div class="clearfix"> </div>
		</ul>
		</div>
	</div>
<?php }else if($type == "electronics" || $sub_category == "Endoscopy Equipment"){ ?>
	<div class="product_right">
		<h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
		<div class="nav">
		<ul class="nav navbar place">		
					<li><a href="userelectronics.php?sub_category=Glucose Monitors">Glucose Monitors</a></li>
				<li><a href="userelectronics.php?sub_category=Physical Therapy Devices">Physical Therapy Devices</a></li>
				<li><a href="userelectronics.php?sub_category=Defibrillators">Defibrillators</a></li>
				<li><a href="userelectronics.php?sub_category=Biomedical Testing Devices">Biomedical Testing Devices</a></li>
				<li><a href="userelectronics.php?sub_category=Endoscopy Equipment">Endoscopy Equipment</a></li>
			<div class="clearfix"> </div>
		</ul>
		</div>
	</div>


<?php } ?>