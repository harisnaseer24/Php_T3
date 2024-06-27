<?php 
require_once("./config/connection.php");
// if($_SERVER["req"])
$pid=$_POST["pid"];
$userid=2;
$price=$_POST["price"];
$qty=$_POST["qty"];
$total= $qty*$price;

$addtocart="INSERT INTO `mycart`( `pid`, `userid`, `price`, `qty`, `total`) VALUES ($pid,$userid,$price,$qty,$total)";

$addtocart_run=mysqli_query($connection,$addtocart) or die("failed to add to cart");
if($addtocart_run){
    echo"
    <script>
    alert('Product added to cart successfully.');
    window.location.href='product.php';
</script>
    ";
}else{
    echo"
    <script>
    alert('Can`t add the product in cart right now..!');
    window.location.href='product.php';
</script>
    ";
}
?>
  