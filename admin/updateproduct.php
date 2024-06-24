<?php 
include("./components/header.php");
include("./config/connection.php");


session_start();
if(!isset($_SESSION['admin_email']) && !isset($_SESSION['isAdmin']) && !$_SESSION['admin_email']== "admin@admin.com"){
header("location: signin.php");
}

if(isset($_POST["editproduct"])){

    $pid= mysqli_real_escape_string($connection, $_POST["pid"]);
    $pname= mysqli_real_escape_string($connection, $_POST["pname"]);
    $description= mysqli_real_escape_string($connection, $_POST["description"]);
    $price= mysqli_real_escape_string($connection, $_POST["price"]);
    $qty= mysqli_real_escape_string($connection, $_POST["qty"]);
    $cat_id= mysqli_real_escape_string($connection, $_POST["cat_id"]);
    $validExtensions= ["png", "jpg", "jpeg"];
 
    if($_FILES["pimage"]["error"] == 4){
        echo "
        <script>
         alert('File not found');
        
     </script>
        
        ";
    }
    

    else{

        $imagename= $_FILES["pimage"]["name"];
        $tmpname= $_FILES["pimage"]["tmp_name"];
        $size= $_FILES["pimage"]["size"];
         
    //product-1.tomato.jpg
    $extension=  explode(".",$imagename); //["product-1", "jpg"]
    $extension= strtolower(end($extension));


        if($size > 100000){
            echo "
            <script>
             alert('File too large');
            
         </script>
            
            ";
        }
        elseif(!in_array($extension, $validExtensions)){

            echo "
            <script>
             alert('File type not supported');
            
         </script>
            
            ";
        }
        else{

            $UpdateProduct= "UPDATE `products` SET `pname`='$pname',`description`='$description',`price`='$price',`cat_id`='$cat_id',`pimage`='$imagename',`qty`='$qty' WHERE `product_id`=$pid";
            $UpdateProduct_run= mysqli_query($connection, $UpdateProduct) or die("can't insert a new product");
            if( $UpdateProduct_run ){
                
                move_uploaded_file($tmpname, "uploads/products/".$imagename);
                echo "
                <script>
                 alert('Product updated successfully.');
                
             </script>
                
                ";
                


            }else{
                echo "
            <script>
             alert('can't update product right now. please try again later.');
            
         </script>
            
            ";
            }
        }

       
    }
}
?>


<body>

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
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
include("./components/topbar.php");



if(isset($_GET["pid"])){

$pid=$_GET["pid"];
$getProduct= "SELECT * FROM `products` WHERE product_id=$pid;";
$getProduct_run= mysqli_query($connection, $getProduct) or die("cant get data");
if(mysqli_num_rows($getProduct_run) == 1){
$product=mysqli_fetch_assoc($getProduct_run);
   

   ?>
    
   <!-- Sale & Revenue Start -->
   <div class="container-fluid pt-4 px-4">
         <div class="container-fluid pt-4 px-4">
             <div class="row g-4">
                 <div class="col-sm-12 col-xl-12">
                     <div class="bg-light rounded h-100 p-4">
                         <h6 class="mb-4">Edit Product</h6>
                         <form method="post" enctype="multipart/form-data">
                           
                                 <input type="hidden" name="pid" class="form-control" id="pname"
                                     aria-describedby="pname" required value="<?=$product["product_id"]?>">
                              
                            
                             <div class="mb-3">
                                 <label for="pname" class="form-label">Product Name</label>
                                 <input type="text" name="pname" class="form-control" id="pname"
                                     aria-describedby="pname" required value="<?=$product["pname"]?>">
                              
                             </div>
                             
                             <div class="mb-3">
                                 <label for="description" class="form-label">Product description</label>
                                 <input type="text" name="description" class="form-control" id="description"
                                     aria-describedby="description" required value="<?=$product["description"]?>">
                              
                             </div>
                             
                             <div class="mb-3">
                                 <label for="price" class="form-label">Price</label>
                                 <input type="text" name="price" class="form-control" id="price"
                                     aria-describedby="price" required value="<?=$product["price"]?>"> 
                              
                             </div>
                             
                             <div class="mb-3">
                                 <label for="qty" class="form-label">In Stock quantity</label>
                                 <input type="text" name="qty" class="form-control" id="qty"
                                     aria-describedby="qty" required value="<?=$product["qty"]?>">
                              
                             </div>
                             
                           
                             
                             <div class="mb-3">
                                 <label for="pimage" class="form-label">Product Image</label>
                                 <input type="file" name="pimage" class="form-control" id="pimage"
                                     aria-describedby="pimage"  accept=".png, .jpg,.jpeg">
                              
                             </div>
                             
                             <div class="mb-3">
                                 <label for="pname" class="form-label">Product Name</label>
                                 
                                 <select name="cat_id" class="form-control" id="" required>

                                 <option value="" selected disabled >Choose a category</option>
                                
                                <?php 
                                $getCat = "Select * from Categories;";
                                $getCat_run= mysqli_query($connection, $getCat) or die("can't get categories");

                                if(mysqli_num_rows($getCat_run) > 0){
                                 while($category= mysqli_fetch_assoc( $getCat_run) ){
                                    $selected="";
                                    if($product["cat_id"] ==  $category['category_id']){
                                        $selected="selected";
                                    }
?>

<option value="<?=$category['category_id']?>" <?=$selected?> > <?=$category['cat_name']?></option>
<?php
                                 }



                                }else{
                                 echo" <h3>no categories found</h3>";
                                }
                                
                                ?>
                                 </select>


                             
                             </div>
                             
                            
                             <button type="submit" name="editproduct" class="btn btn-primary">Save changes</button>
                         </form>
                     </div>
                 </div>


 
 
 
 
 <?php




}else{
    echo "
    <script>
     alert('Invalid product Id');
    
 </script>
    
    ";
}

}
?>
           


          
            <!-- Footer Start -->
            <?php 
include("./components/footer.php")

?>
            <!-- Footer End -->
          
     