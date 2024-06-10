<?php 
include("./components/header.php");
session_start();
if(!isset($_SESSION['admin_email']) && !isset($_SESSION['isAdmin']) && !$_SESSION['admin_email']== "admin@admin.com"){
header("location: signin.php");
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
include("./components/topbar.php")

?>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add a new Product</h6>
                            <form>
                                <div class="mb-3">
                                    <label for="pname" class="form-label">Product Name</label>
                                    <input type="text" name="pname" class="form-control" id="pname"
                                        aria-describedby="pname">
                                 
                                </div>
                                
                                <div class="mb-3">
                                    <label for="description" class="form-label">Product description</label>
                                    <input type="text" name="description" class="form-control" id="description"
                                        aria-describedby="description">
                                 
                                </div>
                                
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" id="price"
                                        aria-describedby="price">
                                 
                                </div>
                                
                                <div class="mb-3">
                                    <label for="qty" class="form-label">In Stock quantity</label>
                                    <input type="text" name="qty" class="form-control" id="qty"
                                        aria-describedby="qty">
                                 
                                </div>
                                
                              
                                
                                <div class="mb-3">
                                    <label for="pimage" class="form-label">Product Image</label>
                                    <input type="file" name="pimage" class="form-control" id="pimage"
                                        aria-describedby="pimage">
                                 
                                </div>
                                
                                <div class="mb-3">
                                    <label for="pname" class="form-label">Product Name</label>
                                    
                                    <select name="cat_id" class="form-control" id="">

                                    <option value="1">
Vegetabels
                                    </option>
                                    <option value="1">
Vegetabels
                                    </option>
                                    <option value="1">
Vegetabels
                                    </option>
                                    <option value="1">
Vegetabels
                                    </option>
                                    </select>


                                 
                                </div>
                                
                               
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>
  

            <!-- Footer Start -->
            <?php 
include("./components/footer.php")

?>
            <!-- Footer End -->
          