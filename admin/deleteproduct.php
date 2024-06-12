<?php 

include("./config/connection.php");
session_start();
if(!isset($_SESSION['admin_email']) && !isset($_SESSION['isAdmin']) && !$_SESSION['admin_email']== "admin@admin.com"){
header("location: signin.php");
}


if(isset($_GET["pid"])){

    $pid=$_GET["pid"];
  

    $deleteProduct ="Delete from `products` WHERE `product_id`='$pid';";
    $deleteProduct_run= mysqli_query($connection, $deleteProduct) or die("Can't change status right now..!");

    if($updateStatus_run){
        echo "
        <script>
         alert('Product deleted successfully.');
        window.location.href= 'products.php';
     </script>
        
        ";
    }else{
        echo "
        <script>
         alert('Failed to delete product.');
         window.location.href= 'products.php';
        
     </script>
        
        ";
    }
}else{
    echo "
        <script>
         alert('Can't delete this product right now.');
         window.location.href= 'products.php';
        
     </script>
        
        ";
}
?>