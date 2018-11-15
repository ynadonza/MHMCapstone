<?php 
	require("../database/sql_connect.php");
	
 $ratingDetails = "SELECT total_rate FROM ratings";
    $rateResult = mysqli_query($conn, $ratingDetails) or die("database error:". mysqli_error($conn));
    $ratingNumber = 0;
    $count = 0;
    $fiveStarRating = 0;
    $fourStarRating = 0;
    $threeStarRating = 0;
    $twoStarRating = 0;
    $oneStarRating = 0;
    while($rate = mysqli_fetch_assoc($rateResult)) {
        $ratingNumber+= $rate['total_rate'];
        $count += 1;
        if($rate['total_rate'] == 5) {
            $fiveStarRating +=1;
        } else if($rate['total_rate'] == 4) {
            $fourStarRating +=1;
        } else if($rate['total_rate'] == 3) {
            $threeStarRating +=1;
        } else if($rate['total_rate'] == 2) {
            $twoStarRating +=1;
        } else if($rate['total_rate'] == 1) {
            $oneStarRating +=1;
        }
    }
    $average = 0;
    if($ratingNumber && $count) {
        $average = $ratingNumber/$count;
    }   
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

<?php include("header.php") ?>

<style>
.btn-grey{
    background-color:#D8D8D8;
    color:#FFF;
}
.rating-block{
    background-color:#FAFAFA;
    border:1px solid #EFEFEF;
    padding:15px 15px 20px 15px;
    border-radius:3px;
}
.bold{
    font-weight:700;
}
.padding-bottom-7{
    padding-bottom:7px;
}

.review-block{
    background-color:#FAFAFA;
    border:1px solid #EFEFEF;
    padding:15px;
    border-radius:3px;
    margin-bottom:15px;
}
.review-block-name{
    font-size:12px;
    margin:10px 0;
}
.review-block-date{
    font-size:12px;
}
.review-block-rate{
    font-size:13px;
    margin-bottom:15px;
}
.review-block-title{
    font-size:15px;
    font-weight:700;
    margin-bottom:10px;
}
.review-block-description{
    font-size:13px;
}
</style>
<?php include("menu.php") ?>
<body>
<div class="container">
             <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
        
            <li class="active">User Ratings</li>
         </ol>          
        
         <center>
    <br>
    
    <div class="container">
        
          <div class="panel panel-success" style="max-width:700px;margin-left:auto;margin-right:auto;">
            <div class="panel-heading"></div>
            <div class="panel-body">
            <div class="row">           
            <div class="col-sm-6"> 
                         
                <h4>Rating and Reviews</h4>
                <h2 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h2>                
                <?php
                $averageRating = round($average, 0);
                for ($i = 1; $i <= 5; $i++) {
                    $ratingClass = "btn-default btn-grey";
                    if($i <= $averageRating) {
                        $ratingClass = "btn-warning";
                    }
                ?>
                <button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button>   
                <?php } ?>              
            </div>
            <div class="col-sm-3">
                <?php
                $fiveStarRatingPercent = round(($fiveStarRating/5)*100);
                $fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';    
                
                $fourStarRatingPercent = round(($fourStarRating/5)*100);
                $fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
                
                $threeStarRatingPercent = round(($threeStarRating/5)*100);
                $threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
                
                $twoStarRatingPercent = round(($twoStarRating/5)*100);
                $twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
                
                $oneStarRatingPercent = round(($oneStarRating/5)*100);
                $oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
                
                ?>

                <div class="pull-left">
                    <div class="pull-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
                    </div>
                    <div class="pull-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
                            <span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
                          </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
                </div>
                
                <div class="pull-left">
                    <div class="pull-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
                    </div>
                    <div class="pull-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fourStarRatingPercent; ?>">
                            <span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
                          </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating; ?></div>
                </div>
                <div class="pull-left">
                    <div class="pull-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
                    </div>
                    <div class="pull-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
                            <span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
                          </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
                </div>
                <div class="pull-left">
                    <div class="pull-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
                    </div>
                    <div class="pull-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
                            <span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
                          </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
                </div>
                <div class="pull-left">
                    <div class="pull-left" style="width:35px; line-height:1;">
                        <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
                    </div>
                    <div class="pull-left" style="width:180px;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
                            <span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
                          </div>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
                </div>
            </div>      
                 
        </div>
            <!--display comments-->
            <div class="row">
            <div class="col-sm-10"  style="max-width:700px;margin-left:auto;margin-right:auto;">
                <hr/>
                <div class="review-block">      
                <?php
                $ratinguery = "SELECT ratings.rating_id, ratings.user_id, ratings.order_id, ratings.total_rate, ratings.title, ratings.comments, ratings.created, ratings.modified, users.fname, users.lname FROM ratings JOIN users ON ratings.user_id = users.user_id ORDER BY ratings.created DESC LIMIT 5";
                $ratingResult = mysqli_query($conn, $ratinguery) or die("database error:". mysqli_error($conn));
                while($rating = mysqli_fetch_assoc($ratingResult)){
                    $date=date_create($rating['created']);
                    $reviewDate = date_format($date,"M d, Y");          
                ?>             
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="image/user1.png" class="img-rounded" width="50" height="50">
                            <div class="review-block-name">By <?php echo $rating['fname']; ?> <?php echo $rating['lname']; ?></div>
                            <div class="review-block-date"><?php echo $reviewDate; ?></div>
                        </div>
                        <div class="col-sm-9">
                            <div class="review-block-rate">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    $ratingClass = "btn-default btn-grey";
                                    if($i <= $rating['total_rate']) {
                                        $ratingClass = "btn-warning";
                                    }
                                ?>
                                <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>                               
                                <?php } ?>
                            </div>
                            <div class="review-block-title"><?php echo $rating['title']; ?></div>
                            <div class="review-block-description"><?php echo $rating['comments']; ?></div>
                        </div>
                    </div>
                    <hr/>                   
                <?php } ?>
                </div>
            </div>
        </div>  

         <!--panel-->              
                      
        </div>
    </div>
</div>
</center>
</div>
       

</head>

</body>
</html>
<?php include("indexfooter.php") ?>