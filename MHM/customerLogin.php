<?php
require("database/sql_connect.php");

// if(isset($_POST['username']) && isset($_POST['password'])){

// $query = "SELECT * FROM users 
//           WHERE username = '{$_POST['username']}' AND password = '{$_POST['password']}' AND user_type='customer'";
// $result = mysqli_query($conn, $query);

// if(mysqli_num_rows($result) == 0){
//       $message = "Username and/or Password incorrect.\\nTry again.";
//      echo "<script type='text/javascript'>alert('$message');window.location='customer/index.php';</script>";
     
//   } 

// else{
//   $data = mysqli_fetch_array($result);
//   $_SESSION['user_id'] = $data['user_id'];
//   $_SESSION['fname'] = $data['fname'];
//   $_SESSION['lname'] = $data['lname'];
//   $_SESSION['login'] = "123654";

//         header("location:customer/userindex.php");
//       }
// }
 session_start();
   if(isset($_SESSION['user_id']))
    {
        header("location:customer/userindex.php");
    }
else
{
    unset($_SESSION['user_id']);
}
 if (isset($_POST['submit'])) {
    function clean($str) {
    $str = @trim($str);
       if (get_magic_quotes_gpc()) {
        $str = stripslashes($str);
        }
                                        // return mysqli_real_escape_string($str)
    }
                    
  $username = clean($_POST['username']);
  $password = md5(clean($_POST['password']));
  $username = $_POST['username'];
  $password = ($_POST['password']);



  $query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password' AND user_type = 'customer' ") or die(mysql_error());
   $count = mysqli_num_rows($query);
   $row = mysqli_fetch_array($query);
   if ($count > 0) {
                                                                   
                                  
   $_SESSION['user_id'] = $row['user_id'];
  
  ?>
  <script>
  window.location = 'customer/userindex.php';        
  </script>

                          
  <?php
  session_write_close();
    } else {
  session_write_close();
  echo "<script>alert('Invalid Username and Password');</script>";
     ?>
    <?php }
  }  
?>