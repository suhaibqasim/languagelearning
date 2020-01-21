<?php
    include('includes/public_header.php'); 
?>
<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area bg-img background-overlay" style="background-image: url();">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content">
                   
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ##### Welcome Area End ##### -->
<!-- ##### Top Catagory Area Start ##### -->
<div " class="top_catagory_area section-padding-80 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Single Catagory -->
            <?php
            $query  = " SELECT * FROM language";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            echo "<div   class='col-12 col-sm-6 col-md-4'>
            <img style='height:250px' src='admin/upload/{$row['language_image']}' alt=''>
                    <div   class='single_catagory_area d-flex align-items-center justify-content-center bg-img '>
                     
                        <div class='catagory-content'>
                            <a href='shop.php?language_id={$row['language_id']}'> {$row['language_name']}</a>
                        </div>
                    </div>
                </div>
                ";
               
            }
            ?>
        </div>
    </div>
</div>
<!-- ##### Top Catagory Area End ##### -->

<!-- ##### CTA Area Start ##### -->
<div class="cta-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content bg-img background-overlay" style="background-image: url();">
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### CTA Area End ##### -->

<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Popular courses</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">
                    <?php
                    $query  = "SELECT * FROM course";
                    $result = mysqli_query($conn,$query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='single-product-wrapper'>
                        <!-- Product Image -->
                        <div class='product-img'>
                            <img style='height:250px' src='admin/upload/{$row['course_image']}' alt=''>
                            <!-- Favourite -->
                            <div class='product-favourite'>
                                <a href='#'' class='favme fa fa-heart'></a>
                            </div>
                        </div>
                         <div class='product-description'>
                            <a href='single_course_details.php'>
                                <h6>{$row['course_name']}</h6>
                            </a>
                            <p class='product-price'>{$row['course_price']} <span style='color:gold;text-decoration:none'> $</span> </p>

                            <!-- Hover Content -->
                            <div class='hover-content'>
                                <!-- Add to Cart -->
                                <div class='add-to-cart-btn'>
                                    <a href='single_course_details.php?course_id={$row['course_id']}' class='btn essence-btn'>Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>";
                    }
                    ?>
                       
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### New Arrivals Area End ##### -->

<!-- ##### Brands Area Start ##### -->
<div class="brands-area d-flex align-items-center justify-content-between">
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="" alt="">
    </div>
</div>
<!-- ##### Brands Area End ##### -->
<?php
    include('includes/public_footer.php'); 
?>