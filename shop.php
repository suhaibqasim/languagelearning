<?php
if (!isset($_GET['language_id'])) {
    echo "<script> window.top.location='index.php'; </script>";
}
include('includes/public_header.php'); 
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>
                        <?php   
                            $query  ="SELECT * FROM language WHERE language_id = {$_GET['language_id']}";
                            $result = mysqli_query($conn, $query);
                            $row    = mysqli_fetch_assoc($result);
                            echo strtoupper("{$row['language_name']}");
                        ?>                        
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <!-- ##### Single Widget ##### -->
                    <div class="widget catagory mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Catagories</h6>

                        <!--  Catagories  -->
                        <div class="catagories-menu">
                            <ul id="menu-content2" class="menu-content collapse show">
                                <!-- Single Item -->

                                <?php 
                                $query  = "SELECT * FROM language";
                                $result = mysqli_query($conn,$query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                 echo "<li data-toggle='collapse' data-target='#{$row['language_name']}'>
                                 <a href='#'>{$row['language_name']}</a>
                                 <ul class='sub-menu collapse show' id='{$row['language_name']}'>";
                                 $query1  = " SELECT * FROM course WHERE language_id =  {$row['language_id']}";
                                 $result2 = mysqli_query($conn, $query1);
                                 while ($row2 = mysqli_fetch_assoc($result2)) {
                                     echo "<li><a href='course_videos.php?course_id={$row2['course_id']}'>{$row2['course_name']}</a></li>";  
                                 }
                                 echo "</ul>
                                 </li>";
                             }
                             ?>
                         </ul>
                     </div>
                 </div>

                <!-- ##### Single Widget ##### -->
                <div class="widget brands mb-50">
                    <!-- Widget Title 2 -->
                    <p class="widget-title2 mb-30">Brands</p>
                    <div class="widget-desc">
                        <ul>
                            <li><a href="#">Asos</a></li>
                            <li><a href="#">Mango</a></li>
                            <li><a href="#">River Island</a></li>
                            <li><a href="#">Topshop</a></li>
                            <li><a href="#">Zara</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8 col-lg-9">
            <div class="shop_grid_product_area">
                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-flex align-items-center justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <?php
                                if (isset($_GET['language_id'])){
                                    $query = "SELECT * FROM course WHERE language_id = {$_GET['language_id']}";
                                    $result = mysqli_query($conn,$query);
                                    $i=0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                      $i++;  
                                  }
                                  echo "<p><span>$i</span> products found</p>";
                              }else{
                                $query = "SELECT * FROM course ";
                                $result = mysqli_query($conn,$query);
                                $i=0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                  $i++;  
                              }
                              echo "<p><span>$i</span> courses found</p>";
                          }
                          ?>

                      </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($_GET['language_id'])) {
                $query  = " SELECT * FROM course INNER JOIN language ON course.language_id = language.language_id WHERE language.language_id = {$_GET['language_id']}";
                $result = mysqli_query($conn,$query);

                while ($row = mysqli_fetch_assoc($result)) {



                    echo "<div class='col-12 col-sm-6 col-lg-4'>
                    <div class='single-product-wrapper'>
                    <!-- Product Image -->


                    <div class='product-img'>
                    <img style='height:250px; width:450px;' src='admin/upload/{$row['course_image']}' alt=' '>

                    <!-- Product Badge -->
                    <div class='product-badge offer-badge'>
                    <span>-30%</span>
                    </div>
                    <!-- Favourite -->
                    <div class='product-favourite'>
                    <a href='#' class='favme fa fa-heart'></a>
                    </div>
                    </div>

                    <!-- Product Description -->
                    <div class='product-description'>
                    <span>{$row{'language_name'}}</span>
                    <a href='course_videos.php?course_id={$row['course_id']}'>
                    <h6>{$row{'course_name'}}</h6>
                    </a>
                    <p class='product-price'>{$row['course_price']} <span style='color:gold;text-decoration:none'> $</span> </p>

                    <!-- Hover Content -->
                    <div class='hover-content'>
                    <!-- Add to Cart -->
                        <form method='post'>
<input type='hidden' name='course_id' value='{$row['course_id']}'>

                        <div class='add-to-cart-btn'>
                            <button type='submit' name='addtocart' class='btn essence-btn'>Add to Cart</button>
                        </div><form>
                    </div>
                    </div>

                    </div>
                    </div>";
                }
            }else{


                $query  = " SELECT * FROM course INNER JOIN language ON course.language_id = language.language_id";
                $result = mysqli_query($conn,$query);

                while ($row = mysqli_fetch_assoc($result)) {



                    echo "<div class='col-12 col-sm-6 col-lg-4'>
                    <div class='single-product-wrapper'>
                    <!-- Product Image -->


                    <div class='product-img'>
                    <img style='height:250px; width:450px;' src='admin/upload/{$row['course_image']}' alt=' '>

                    <!-- Product Badge -->
                    <div class='product-badge offer-badge'>
                    <span>-30%</span>
                    </div>
                    <!-- Favourite -->
                    <div class='product-favourite'>
                    <a href='#' class='favme fa fa-heart'></a>
                    </div>
                    </div>

                    <!-- Product Description -->
                    <div class='product-description'>
                    <span>{$row{'language_name'}}</span>
                    <a href='course_videos.php?course_id={$row['course_id']}'>
                    <h6>{$row{'course_name'}}</h6>
                    </a>
                    <p class='product-price'><span class='old-price'>{$row['course_price']} <span style='color:gold;text-decoration:none'> $</span></p>

                    <!-- Hover Content -->
                    <div class='hover-content'>
                    <!-- Add to Cart -->
                    <div class='add-to-cart-btn'>
                    <a href='#' class='btn essence-btn'>Add to Cart</a>
                    </div>
                    </div>
                    </div>

                    </div>
                    </div>";
                }
            }
            ?>
        </div>
    </div>
    <!-- Pagination -->
    <nav aria-label="navigation">
        <ul class="pagination mt-50 mb-70">
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">21</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
    </nav>
</div>
</div>
</div>
</section>
<!-- ##### Shop Grid Area End ##### -->
<?php
include('includes/public_footer.php'); 
?>