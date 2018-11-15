<?php
require("../database/sql_connect.php");
session_start();

if (!isset($_SESSION['user_id'])){
header('location:index.php');
}

$user_id = $_SESSION['user_id'];




?>