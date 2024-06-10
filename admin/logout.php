<?php 
session_start();
if(!isset($_SESSION['admin_email']) && !isset($_SESSION['isAdmin']) && !$_SESSION['admin_email']== "admin@admin.com"){
    header("location: signin.php");
    }

session_unset();
session_destroy();
header("location: signin.php");


?>