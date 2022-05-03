<?php
session_start();
ob_start();
$_SESSION['email']=NULL;
header("Location:../index.php");

?>