<?php
require("../database/sql_connect.php");
session_start();

// if(isset($_SESSION['user_id']))

//     {
//         $sql = "SELECT * FROM users 
//           WHERE user_id = '{$_SESSION['user_id']}' )";
//             $result1 = mysqli_query($conn, $sql);
//              $data1 = mysqli_fetch_array($result1);
//         if($data1['user_type'] = 'admin'){
//              header("location:location:../admin/dashboard.php");
//         }else if($data1['user_type'] = 'employee'){
//              header("location:../employee/employeeDashboard.php");
//        }
// }else{
//     unset($_SESSION['user_id']);
// }

if(isset($_POST['username']) && isset($_POST['password'])){

$query = "SELECT * FROM users 
          WHERE username = '{$_POST['username']}' AND (user_type = 'admin' || user_type = 'employee')";
$result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 0){
          $error = "Username/Password is incorrect. Try again.";
        
         
    } else {

        $data = mysqli_fetch_array($result);
        
        if (sha1($_POST['password']) == $data['password']) {
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['fname'] = $data['fname'];
            $_SESSION['lname'] = $data['lname'];
            $_SESSION['login'] = "123654";
            if($data['user_type'] == 'admin'){
                header("location:../admin/dashboard.php");
            }else if($data['user_type'] == 'employee'){
                header("location:../employee/employeeDashboard.php");
            }
         
        }else{
             $error = "Username/Password is incorrect. Try again.";
        }
      
    }
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Metro Health Management</title>
   
   <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
   <!-- <link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" /> -->
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <link rel="shortcut icon" href="images/2.png" />
    <!-- Google Fonts--> 
    <style type="text/css">

       /*
 * Specific styles of signin component
 */
/*
 * General styles
 */
/*body, html {
    height: 100%;
    background-repeat: no-repeat;
    background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
}*/
body {
  background: url(images/med.png) no-repeat;
  background-size: 100%;
}
.card-container.card {
    max-width: 300px;
    padding: 40px 40px;
}

.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #fff;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 35px;
    font-size: 15px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 20%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    background-color: pink;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: rgb(12, 97, 33);
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 8px;
    border: 0.9px solid;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: rgb(12, 97, 33);
}

.forgot-password {
    color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: rgb(12, 97, 33);
}
@media screen and (max-width: 600px){
      #profile-img{
         height: 50px;
         width: 170px;
      }
   }
    </style>
</head>
<br>
<br>
<center>
<body>
<div class="container">
    <br>
        <br>
            <br>
           <center><img id="profile-img" src="images/2.png" style="width: 10%;height: 10%;" /></center> 
            <p id="profile-name" class="profile-name-card"></p>
            <form action="" class="form-signin" method="post">
               
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"><br>
                 <?php
                          if(isset($error)){
                            echo "<p style ='color:red;'><b>$error</b></p>";
                          }
                        ?>
                <button class="btn btn-md btn-primary btn-signin" type="submit" style="color:white">Sign in</button>
            </form>
            <!-- /form -->
           <!--  <a href="#" class="forgot-password">
                Forgot the password?
            </a> -->
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</center> 
</html>
