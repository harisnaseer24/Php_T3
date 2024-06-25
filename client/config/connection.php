<?php 

$server= "localhost";
$username= "root";
$dbpass= "";
$dbname= "phpt3";

$connection = mysqli_connect($server , $username , $dbpass, $dbname);
if(!$connection){
die("Can't connect right now");
}


?>