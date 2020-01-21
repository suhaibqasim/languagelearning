<?php
    include('includes/public_header.php');

    if (isset($_SESSION['customer_id'])) {
        echo "<script> window.top.location='order.php'; </script>";
        exit();
    }
    
    if (isset($_POST['register'])) {
    // fetch data
    $name           = $_POST['fullname'];
    $password       = $_POST['passwordsignup'];
    $emailsignup    = $_POST['email_address'];
    $mobile         = $_POST['phone_number'];
    $portal         = $_POST['gender'];
    // Esiablish connection

    if ($portal=='student')  {
        # code...
    
    $query = "INSERT INTO customer (name, email, password, mobile) VALUES ('$name','$emailsignup','$password', $mobile)";
}else{
    $query = "INSERT INTO instructor (instructor_name, instructor_email, instructor_password) VALUES ('$name','$emailsignup','$password')";
    
}
    if(mysqli_query($conn,$query)){
        echo "<script> window.top.location='checkout.php'; </script>";
    }


}


if(isset($_POST['login'])){

    $username = strtolower($_POST['email']);
    $password = $_POST['passwordlogin'];
    $portal   = $_POST['gender'];
    
    if (!empty($username) && !empty($password)) {
        if($portal=='student'){
        $query    = "SELECT * FROM customer
        Where email    = '$username' 
        AND 
              password = '$password'";}
           else{
            $query    = "SELECT * FROM instructor
        Where constructor_email    = '$username' 
        AND 
              constructor_password = '$password'";

           }   

        $result    = mysqli_query($conn,$query);
        $row       = mysqli_fetch_assoc($result);
        
        if ( $row['email'] ){
         $_SESSION['customer_id'] = $row['customer_id'];
            echo "<script> window.top.location='order.php'; </script>";

     }else{
        $error = "Your password or username is incorrect";
    }   

}   

}



?>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-6 col-md-6 ">
                    <div class="checkout_details_area mt-50 mr-2 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Login</h5>
                            <hr>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">Email<span>*</span></label>
                                    <input type="text" name="email" class="form-control" id="first_name" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">Password<span>*</span></label>
                                    <input type="text" name="passwordlogin" class="form-control" id="first_name" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                <input type="radio" name="gender" value="student" checked> student<br>
                                 <input type="radio" name="gender" value="instructor"> instructor<br>
                                 
                                </div>
                                <div class="col-md-8 mb-3">
                                    <button class="btn btn-info" type="submit" name="login"> Login </button>
                                </div>
                                <?php
                                    if (isset($error)) {
                                        echo "<div class='alert alert-danger'>$error</div>";
                                    }
                                ?>
                           </div>
                        </form>
                    </div>
                </div>

                <div class="col-6 col-md-6 ">

                    <div class="checkout_details_area mt-50 ml-2 clearfix ">

                        <div class="cart-page-heading mb-30">
                            <h5>Registration</h5>
                            <hr>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">Full Name <span>*</span></label>
                                    <input type="text" name="fullname" class="form-control" id="first_name" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="number" name="phone_number" class="form-control" id="phone_number" min="0" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" name="email_address"class="form-control" id="email_address" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="Password">Password<span>*</span></label>
                                    <input type="Password" name="passwordsignup" class="form-control" id="Password" >
                                </div>
                                <div class="col-12 mb-4">
                                <input type="radio" name="gender" value="student" checked> student<br>
                                 <input type="radio" name="gender" value="instructor"> instructor<br>
                                 
                                </div>
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                                    </div>
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <button class="btn btn-info" type="submit" name="register"> Signup </button>
                                </div>

                           </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
<?php
    include('includes/public_footer.php'); 
?>