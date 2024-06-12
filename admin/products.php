<?php 
include("./components/header.php");
include("./config/connection.php");
session_start();
if(!isset($_SESSION['admin_email']) && !isset($_SESSION['isAdmin']) && !$_SESSION['admin_email']== "admin@admin.com"){
header("location: signin.php");
}
?>


<body>

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


      <!-- sidebar start -->

      <?php 
include("./components/sidebar.php")

?>
      <!-- sidebar end -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php 
include("./components/topbar.php")

?>
            <!-- Navbar End -->


         
            <div class="container-fluid pt-4 px-4">
            
<!-- products table -->
<div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Registered Products</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Change Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $getProducts= "SELECT * FROM `products` as p inner join `categories` c on p.cat_id = c.category_id;";
                                        $getProducts_run = mysqli_query($connection, $getProducts) or die("Can't get products");

                                        if(mysqli_num_rows(  $getProducts_run ) > 0){
                                           
                                            $i=1;
                                            while($product= mysqli_fetch_assoc($getProducts_run)){

                                                    $status="active";
                                                    if($product["status"]==1){
                                                        $status="active";
                                                    }else{
                                                        $status="deactive";
                                                    }

                                                ?>
                                                <tr>
                                                                                            <th scope="row"><?=$i?></th>
                                                                                            <td><?=$product["pname"]?></td>
                                                                                            <td>

                                                                                        <img src="./uploads/products/<?=$product['pimage']?>" class="img-fluid rounded-circle" width="70" alt="">


                                                                                            </td>
                                                                                            <td><?=$product["description"]?></td>
                                                                                            <td><?=$product["price"]?></td>
                                                                                            <td><?=$product["qty"]?></td>
                                                                                            <td><?=$product["cat_name"]?></td>
                                                                                            <td><?=$status?></td>
                                                                                            <td>
                                                                                            <a href="changestatus.php?pid=<?=$product['product_id']?>&status=1" class="btn btn-success">Active</a>
                                                                                            <a href="changestatus.php?pid=<?=$product['product_id']?>&status=0" class="btn btn-danger">Deactive</a>
                                                                                            </td>
                                                                                            <td>
                                                                                                
                                                                                            <a href="updateproduct.php?pid=<?=$product['product_id']?>" class="btn btn-primary">Edit</a>
                                                                                            <a href="deleteproduct.php?pid=<?=$product['product_id']?>" class="btn btn-danger">Delete</a>
                                                                                            
                                                                                            </td>
                                                                                           
                                                                                        </tr>
                                                                                            <?php
                                                                                            $i++;
                                            }


                                        }else{
                                            echo "<tr>
                                            <th scope='row'>Nothing to show</th>
                                            
                                        </tr>";
                                        }

                                        ?>
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!-- products table -->

            <!-- Footer Start -->
            <?php 
include("./components/footer.php")

?>
 <!-- Footer Start -->
