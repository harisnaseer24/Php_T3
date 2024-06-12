<?php 

include("./config/connection.php");
session_start();
if(!isset($_SESSION['admin_email']) && !isset($_SESSION['isAdmin']) && !$_SESSION['admin_email']== "admin@admin.com"){
header("location: signin.php");
}


if(isset($_GET["pid"]) && isset($_GET["status"])){

    $pid=$_GET["pid"];
    $status=$_GET["status"];

    $updateStatus ="UPDATE `products` SET `status`='$status' WHERE `product_id`= '$pid';";
    $updateStatus_run= mysqli_query($connection, $updateStatus) or die("Can't change status right now..!");

    if($updateStatus_run){
        echo "
        <script>
         alert('Product status successfully updated.');
        window.location.href= 'products.php';
     </script>
        
        ";
    }else{
        echo "
        <script>
         alert('Failed to update status.');
         window.location.href= 'products.php';
        
     </script>
        
        ";
    }
}else{
    echo "
        <script>
         alert('Failed to update status.');
         window.location.href= 'products.php';
        
     </script>
        
        ";
}
?>