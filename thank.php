<?php
    include('includes/public_header.php'); 
    if (!isset($_SESSION['customer_id'])) {
        echo "<script> window.top.location='checkout.php'; </script>";
        exit();
    }   
        if ($_SESSION['thankyou']) {
            
        $x = count($_SESSION['course_id']);
        foreach ($_SESSION['course_id'] as $course_id) {
        $query = "INSERT INTO orders (customer_id,course_id) VALUES ({$_SESSION['customer_id']},$course_id)";
        $result = mysqli_query($conn,$query);
        $x--;

        if($x==0) 
            {$_SESSION['thankyou']=0;

        }
    }
    }
        


        
    

?>
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Thank you For order</h2>
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
                    <?php
                        $query  =" SELECT * FROM orders ";
                        $result = mysqli_query($conn,$query);
                        $row    = mysqli_fetch_assoc($result);
                        echo "<h2>Order ID = ". "{$row['order_id']} </h2>";
                        echo "<h2>Date of orders= ". "{$row['order_date']} </h2>";

                    ?>

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
