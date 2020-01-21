<?php
    include('includes/public_header.php'); 

if(!isset($_GET['course_id'])) {
        echo "<script> window.top.location='shop.php' </script>";
}

?>
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="">
                <?php
                    $query  = "SELECT * FROM course INNER JOIN language ON course.language_id = language.language_id WHERE course.course_id = {$_GET['course_id']} ";
                    $result = mysqli_query($conn,$query);
                    
                    $row = mysqli_fetch_assoc($result);
                    echo "<video height='95%' width='95%' controls> <source src='admin/upload/{$row['course_image']}' type='video/mp4'> </video>";

                                                            
            echo " </div>
        </div>

        <!-- Single Product Description -->
        <div class='single_product_desc clearfix'>
            
            <span>{$row['language_name']}</span>
                <a href='cart.php'>
                <h2>{$row['course_name']}</h2>
            </a>
            <p class='product-price'>{$row['course_price']} <span style='color:gold;text-decoration:none'> $</span></p>
            <p class='product-desc'>{$row['course_desc']}</p>

            <!-- Form -->
            <form class='cart-form clearfix' method='post'>
                <!-- Cart & Favourite Box -->
                <div class='cart-fav-box d-flex align-items-center'>
                    <!-- Cart -->
                    <button type='submit' name='DDDaddtocart' class='btn essence-bt'>Add to cart</button>
                    <!-- Favourite -->
                    <div class='product-favourite ml-4'>
                        <a href='#' class='favme fa fa-heart'></a>
                    </div>
                </div>
            </form>";
            ?>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->
<!-- <a href="https://www.youtube.com/playlist?list=PLb4LszRKRuSHBbEHGYi8GJHaBAxwYhSnc">عرض قائمة التشغيل بالكامل</a>

<iframe width="560" height="315" src="https://www.youtube.com/embed/pmef3ndmS7o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

 -->
<?php
include('includes/public_footer.php'); 
?>