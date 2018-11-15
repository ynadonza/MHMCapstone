<?php
require("../database/sql_connect.php");
session_start();
	
	
	session_destroy();
	
	header("location:index.php");


?>