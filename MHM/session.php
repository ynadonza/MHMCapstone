<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] != "123654"){
	header("location:../login/login.php");
}else{
	$timeout = 60 * 30; // In seconds, i.e. 30 minutes.
$fingerprint = hash_hmac('sha256', $_SERVER['HTTP_USER_AGENT'], hash('sha256', $_SERVER['REMOTE_ADDR'], true));

if (    (isset($_SESSION['last_active']) && $_SESSION['last_active']<(time()-$timeout))
     || (isset($_SESSION['fingerprint']) && $_SESSION['fingerprint']!=$fingerprint)
     || isset($_GET['logout'])
    )
{
    setcookie(session_name(), '', time()-3600, '/');
    session_destroy();
}
session_regenerate_id(); 
$_SESSION['last_active'] = time();
$_SESSION['fingerprint'] = $fingerprint;
}
?>