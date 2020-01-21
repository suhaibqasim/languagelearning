<?php
    include('includes/public_header.php'); 
    if (!isset($_SESSION['customer_id'])) {
        echo "<script> window.top.location='checkout.php'; </script>";
        exit();
    }
    if (isset($_POST['addressess'])) {
        $customer_address   = $_POST['address'];
        $customer_city      = $_POST['city'];
        $customer_country   = $_POST['country'];
        
        $query = "UPDATE customer SET  address='$customer_address' ,country='$customer_country' ,city='$customer_city'
         WHERE customer_id={$_SESSION['customer_id']}" ;
        
        $result = mysqli_query($conn,$query);
    }
    

?>
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Your order</h2>
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

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="country">Country <span>*</span></label>
                                    <select class="w-100" id="country" name="country">
                                        <option value="usa">United States</option>
                                        <option value="uk">United Kingdom</option>
                                        <option value="ger">Germany</option>
                                        <option value="fra">France</option>
                                        <option value="ind">India</option>
                                        <option value="aus">Australia</option>
                                        <option value="bra">Brazil</option>
                                        <option value="cana">Canada</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input type="text" class="form-control mb-3" name="address" id="street_address" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Town/City <span>*</span></label>
                                    <input type="text" name="city" class="form-control" id="city" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <button class="btn essence-btn" name="addressess" required> Update location </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-4">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>course</span> <span>Total</span></li>
                            <?php
                                if (isset($_SESSION['course_id'])) {
                                
                                $query  = "SELECT * FROM course ";
                                $result = mysqli_query($conn,$query);
                                 while ( $row = mysqli_fetch_assoc($result) ) {

                                    foreach($_SESSION["course_id"] as $key => $value) {
                                        if ($row['course_id'] == $value) {
                                            echo "<li><span>{$row['course_name']}</span>
                                                    <span>{$row['course_price']} $</span></li>";
                                        }
                                    }
                                } 
                                } 
                                
                            ?>
                        
                            <li><span>Subtotal</span> 
                                <span>
                                    <?php 
                              if (isset($price)) {
                                    echo $price . "$";
                               }else{
                                     echo 0;
                                    }
                                ?>     
                                </span></li>
                            <li><span>Shipping</span> <span>Free</span></li>
                            <li><span>Total</span> <span>
                                <?php 
                              if (isset($price)) {
                                    echo $price . "$";
                               }else{
                                     echo 0;
                                    }
                                ?>     
                            </span></li>
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>cash on delievery</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quis in veritatis officia inventore, tempore provident dignissimos.</p>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        
                        <a class="btn essence-btn text-white" href="thank.php" > Place Order </a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <!-- ##### Checkout Area End ##### -->
<?php
    include('includes/public_footer.php'); 
?>



<div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                
        </div>
    </div>
