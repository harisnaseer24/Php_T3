<?php 
require_once("./config/connection.php");
include("./components/header.php");
?>
  
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->
<?php 
include("./components/nav.php");
?>
  
<?php 

if(isset($_GET["pid"])){

    $pid=$_GET["pid"];
    $getProduct="SELECT * FROM `products` as p inner join categories as c on p.cat_id=c.category_id where p.product_id=$pid;
    ;";
    $getProduct_run= mysqli_query($connection,$getProduct) or die("cant get product");
    if(mysqli_num_rows($getProduct_run) == 1){
        $product= mysqli_fetch_assoc($getProduct_run);
        ?>
         <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="../admin/uploads/products/<?=$product["pimage"]?>">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4"><?=ucwords($product["pname"])?></h1>
                    <p class="mb-4"><?=ucwords($product["description"])?></p>
                  
                    <p><i class="fa fa-check text-primary me-3"></i>Price: Rs. <?=$product["price"]-10?></p>
                    <p><i class="fa fa-check text-primary me-3"></i><?=ucwords($product["cat_name"])?></p>
                    <form action="addtocart.php" method="post">
                        <input class="form-control" name="pid" type="hidden" value="<?=$pid?>">
                        <input class="form-control" name="price" type="hidden" value="<?=$product["price"]-10?>">
                        <input class="form-control" name="qty" type="number" placeholder="enter qty in kgs" value="1" require min="1" max="10">
                      
                    
                    <button class="btn btn-primary rounded-pill py-3 px-5 mt-3" type="submit"><i class="fa fa-shopping-bag text-primary me-2"></i> Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->
        
        
        <?php

    }else{
        echo"
    <script>
    alert('Invalid product id');
    window.location.href='product.php';
</script>
    ";
    }

}else{
    echo"
    <script>
    window.location.href='product.php';
</script>
    ";
   
}
?>
   


   


    <!-- Footer Start -->
    <?php 
include("./components/footer.php");
?>
  
    <!-- Footer End -->

