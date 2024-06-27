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
  


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Cart</h1>
            
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Cart Items</h1>
                        
                    </div>
                </div>
             
            </div>
                <!-- Table Start -->
                <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Basic Table</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                        $getProducts="SELECT c.*,p.pname,p.pimage FROM `mycart` as c inner join products as p on c.pid= p.product_id where userid=2;";
                        $getProducts_run= mysqli_query($connection,$getProducts) or die("fail to fetch products");
                        $subtotal=0;
                        if(mysqli_num_rows($getProducts_run) > 0){
                            $i=1;
                            while($products= mysqli_fetch_assoc($getProducts_run)){
$subtotal += $products["total"];
                                ?>
                                
                                   <!-- dynamic product start -->
                                   <tr>
                                        <th scope="row"><?=$i?></th>
                                        <td><?=$products["pname"]?></td>
                                        <td><img class="rounded-3 " height="80" src="../admin/uploads/products/<?=$products["pimage"]?>"></td>
                                        <td><?=$products["price"]?></td>
                                        <td><?=$products["qty"]?></td>
                                        <td><?=$products["total"]?></td>
                                        <td><a class="btn btn-danger" href="removeitem.php?cart_id=<?=$products["cart_id"]?>" >X</a></td>
                                    </tr>
                        <!-- dynamic product end -->
                                
                                <?php
                                $i++;
                            }
                        }else{
                            ?>
                             <div class="col-12 text-center">
                            <p class="btn btn-primary rounded-pill py-3 px-5" >No products available right now.!</p>
                        </div>
                            <?php
                        }
                        ?>
                                  
                                  
                                </tbody>
                            </table>

                           <h1>Sub Total: Rs. <?=$subtotal?></h1>
                        </div>
                    </div>
           
                   
                     
                     
                       
             
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Product End -->



   


  <?php
  
  include("./components/footer.php");
  ?>