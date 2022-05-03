<?php 
session_start();
ob_start();
$_SESSION['username'] = NULL;
header("Location:login.php");

?>