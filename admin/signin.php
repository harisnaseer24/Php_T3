<?php 
include("./components/header.php");
require_once("./config/connection.php");
session_start();
if(isset($_SESSION['admin_email']) && isset($_SESSION['isAdmin']) && $_SESSION['admin_email']== "admin@admin.com"){
    header("location: index.php");
    }

if(isset($_POST["signin"])){
// echo "<script>
//     alert('hi')
// </script>";
// \<\?php jskdfkjd\?\> prevent sql injection
$email= mysqli_real_escape_string($connection, $_POST["email"]);      ;
$pass= mysqli_real_escape_string($connection, $_POST["password"]);

$checkAdmin="SELECT * FROM admin where email= '$email' and password='$pass';";

$run_checkAdmin= mysqli_query($connection,$checkAdmin) or die("cant get the user");

if(mysqli_num_rows($run_checkAdmin) == 1 ){
    $adminRow= mysqli_fetch_assoc($run_checkAdmin);

    $_SESSION["admin_email"]= $email;
    $_SESSION["isAdmin"]= true;
    $_SESSION["username"]= $adminRow["username"];
    echo "
    <script>
     alert('Login Success');
     window.location.href= 'index.php';
 </script>
    
    ";

}else{
    echo "
    <script>
     alert('Invalid Crednetials');
    
 </script>
    
    ";
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


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Foody</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

                       
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control"  name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        
                        <input type="submit" name="signin" class="btn btn-primary py-3 w-100 mb-4" value="Sign In">
                        </form>
                        <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>