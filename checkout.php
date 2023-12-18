

<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location:login.php');
    exit;
}
?>
<?php
if (isset($_POST['submit'])) {
    $product_id = $_POST['pid'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['product_qty'];
}


 ?>

<?php include 'dbconnect.php'?>

<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.3/form_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Mar 2020 18:34:36 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Oryx</title>
    <!-- favicon -->

    <link rel='icon' href='img/lwb_profile.jpg' />

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Font Awesomee -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--produCt DIV CSS Start-->
    <link rel="stylesheet" href="style.vendor.mini.css">
    <link rel="stylesheet" href="style.min.css">
    <!--Product CSS end-->

</head>


<body>

    <div id="wrapper">
  
        <?php include 'navbar.php';
       
        ?>
      

        
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.9.3/search_results.html">
                            <div class="form-group">
                                
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Oryx | Shop</span>
                        </li>


                        <li>
                            <a href="logout.php">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Checkout</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home > Checkout</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
           <!-- HTML -->
<div class="table-wrapper">
    <!-- checkout area start -->
 <div class="checkout-area mt-60px mb-40px"style="align-items:justify">
                <div class="container">
                    <div class="row">
                  
                        <div class="col-lg-12">
                            <div class="your-order-area">
                                <h3>Your order</h3>
                              
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-product-info">
                                        <div class="your-order-top">
                                       
                                            <ul>
                                                <li>Product</li>
                                                <li>Total</li>
                                            </ul>
                                        </div>
                                        <div class="your-order-middle">
                                        <?php $total = 0;
                                            $tqty=0;
                                            foreach ($_SESSION['cart'] as $product) :
                                                $subtotal = $product['price'] * $product['quantity'];
                                                $total += $subtotal;
                                                $tqty=$tqty+$product['quantity'];
                                            ?>
                                            <ul>
                                                <li><span class="order-middle-left"><?php echo $product['name']; ?> X <?php echo $product['quantity']; ?></span> <span class="order-price">K<?php echo $subtotal?> </span></li>
                                                
                                            </ul>
                                            <?php endforeach; ?> 
                                        </div>
                                        
                                        <div class="your-order-bottom">
                                            <ul>
                                                <li class="your-order-shipping">Shipping</li>
                                                <li>Free shipping</li>
                                            </ul>
                                        </div>
                                        
                                        <div class="your-order-total">
                                            <ul>
                                                <li class="order-total">Total</li>
                                                <li><?php echo $total?></li>
                                            </ul>
                                        </div>
                                    </div>
                              
                                    <div class="payment-method">
                                        <div class="payment-accordion element-mrg">
                                            <div class="panel-group" id="accordion">
                                                <div class="panel payment-accordion">
                                                    <div class="panel-heading" id="method-one">
                                                        <h4 class="panel-title">
                                                            <a data-bs-toggle="collapse" data-parent="#accordion" href="#method1">
                                                                Direct bank transfer
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="method1" class="panel-collapse collapse show">
                                                        <div class="panel-body">
                                                            <p>transact to the following National Bank of Malawi account number</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel payment-accordion">
                                                    <div class="panel-heading" id="method-two">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-bs-toggle="collapse" data-parent="#accordion" href="#method2">
                                                                Check payments
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="method2" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <p>Submit your check</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel payment-accordion">
                                                    <div class="panel-heading" id="method-three">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-bs-toggle="collapse" data-parent="#accordion" href="#method3">
                                                                Cash on delivery
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="method3" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <p>cash</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="checkout2.php" method="post">
                                <div class="Place-order mt-25">
                                <input type="hidden" name="pid" value="<?php echo $product['id']; ?>">
                                            <input type="hidden" name="oid" value="<?php echo rand(1,100); ?>">
                                            <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                                            <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                                            <input type="hidden" name="product_qty" value="<?php echo $product['quantity']; ?>">
                                            <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
                                            <input type="hidden" name="total" value="<?php echo $total; ?>">
                                      
                                            <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Place Order</button>
                                            
                                </div>
                              
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- checkout area end -->
   
</div>

            



            <div class="footer">
                <div class="float-right">
                    
                </div>
                <div style="text-align: center  ">
                    <strong>Copyright</strong>&nbsp;Oryx &copy; 2023
                </div>
            </div>

        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.3/form_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Mar 2020 18:34:38 GMT -->

</html>
        <!-- Scripts to be loaded  -->
        <!-- JS
============================================ -->

        <!--====== Vendors js ======-->
        <!-- <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
        <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>-->

        <!--====== Plugins js ======-->
         
        <!-- <script src="assets/js/plugins/owl-carousel.js"></script>
        <script src="assets/js/plugins/jquery.nice-select.js"></script>
        <script src="assets/js/plugins/venobox.js"></script>
        <script src="assets/js/plugins/countdown.js"></script>
        <script src="assets/js/plugins/elevateZoom.js"></script>
        <script src="assets/js/plugins/jquery-ui.min.js"></script>
        <script src="assets/js/plugins/slick.js"></script>
        <script src="assets/js/plugins/scrollup.js"></script>
        <script src="assets/js/plugins/aos.js"></script>
        <script src="assets/js/plugins/range-script.js"></script> -->

        <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->

        <script src="assets/js/vendor/vendor.min.js"></script>
        <script src="assets/js/plugins/plugins.min.js"></script>

        <!-- Main Activation JS -->
        <script src="assets/js/main.js"></script>
    </body>
</html>
 