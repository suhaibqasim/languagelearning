<?php

    include('includes/connection.php');
    session_start();    
       if (isset($_POST['addtocart'])) {
        $i=0;
        foreach ($_SESSION['course_id'] as $course_id =>$value) {
            if ($value == $_POST['course_id']) {
                $i++;
            }
        }
            if ($i==0) {
                $_SESSION['course_id'][] = $_POST['course_id'];
                $_SESSION['thankyou'] = 1;
            }
            
              echo "<script> window.top.location='shop.php?course_id={$_POST['course_id']}&language_id={$_GET['language_id']}' </script>";
exit();

       
    }   


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>language courses</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.php"><img src="" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="index.php">home</a>
                                
                            </li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="shop.php">Shop</a></li>
                                    <li><a href="single_course_details.php">Product Details</a></li>
                                    
                                    <!-- <li><a href="blog.html">Blog</a></li> -->
                                    <!-- <li><a href="single-blog.html">Single Blog</a></li> -->
                                    <!-- <li><a href="regular-page.html">Regular Page</a></li> -->
                                    <!-- <li><a href="contact.html">Contact</a></li> -->
                                </ul>
                            </li>
                            <!-- <li><a href="blog.html">Blog</a></li> -->
                            <!-- <li><a href="contact.html">Contact</a></li> -->
                            <li><a href="checkout.php">login/signup</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
               <!--  <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div -->
                <!-- Favourite Area -->
               <!--  <div class="favourite-area">
                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
                </div> -->
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="#"><img src="img/core-img/user.svg" alt=""></a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span>
                        <?php
                            if (isset($_SESSION['course_id'])) {
                                echo count($_SESSION['course_id']);
                            }else{
                                echo 0;
                            }
                        ?>
                    </span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> 
                <span>
                    <?php
                        if (isset($_SESSION['course_id'])) {
                            echo count($_SESSION['course_id']);
                        }else{
                            echo 0;
                        }
                    ?>
                </span>
            </a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                <?php 
                    $price = 0;
                    if (isset($_SESSION['course_id']) && count($_SESSION['course_id']) > 0) {
                        
                        foreach ($_SESSION['course_id'] as $pro_id => $value) {

                            $query  = " SELECT * FROM course WHERE course_id = $value ";
                            $result = mysqli_query($conn,$query);
                          

                            while($row = mysqli_fetch_assoc($result)) {
                                echo "string";
                            echo "<div class='single-cart-item'>
                                    <a href='remove_item.php?course_id={$row['course_id']}' class='product-image'>";
                            echo "<img src='admin/upload/{$row['course_image']}' class='cart-thumb' alt=''>"; 
                            echo "<div class='cart-item-desc'>
                                    <span class='product-remove'>
                                    <i class='fa fa-close' href='index.php'></i>
                                    </span>";  
                            echo "<h6>{$row['course_name']}</h6>
                                    <p class='price'> {$row['course_price']}$</p>"; 
                            echo "</div>
                                    </a>
                                  </div>";
                            $price+=$row['course_price'];                             
                            }

                        }
                    }

                ?>
                
                        
                        <!-- Cart Item Desc -->
                        
                    
  </div>

  <!-- Cart Summary -->
  <div class="cart-amount-summary">

    <h2>Summary</h2>
    <ul class="summary-table">
        <li><span>total:</span> <span>
            <?php 
                if (isset($price)) {
                    echo $price . "$";
                }else{
                    echo 0;
                }
            ?> 
         </span></li>
    </ul>
    <div class="checkout-btn mt-100">
        <a href="checkout.php" class="btn essence-btn">check out</a>
    </div>
</div>
</div>
</div>
<!-- ##### Right Side Cart End ##### -->
