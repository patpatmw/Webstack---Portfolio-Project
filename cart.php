
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location:login.php');
    exit;
}
?>

<?php include 'dbconnect.php'?>
<?php

 // Function to get product details from the database by product ID
 function getProductDetails($conn, $product_id)
 {
     $sql = "SELECT * FROM products WHERE product_id = $product_id";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         return $result->fetch_assoc();
     } else {
         return null;
     }
 }


// Add products to the cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['pid'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
   
    $item = array(
        'image'=>'image',
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => $quantity
       
    );

   

    // Check if the cart session variable exists
    if (isset($_SESSION['cart'])) {
        // Check if the product already exists in the cart
        if (array_key_exists($product_id, $_SESSION['cart'])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = $item;
        }
    } else {
        $_SESSION['cart'][$product_id] = $item;
    }
}


// Remove product from the cart
if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Clear the cart
if (isset($_GET['clear'])) {
    unset($_SESSION['cart']);
}



?>



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
  
        <?php include 'navbar.php';?>
       
        
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
                    <h2>View Cart</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home > Cart</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
           <!-- HTML -->
<div class="table-wrapper">
    <!-- cart area start -->
<div class="cart-main-area mtb-60px">
                <div class="container">
                    <h3 class="cart-page-title">Your cart items</h3>
                    <div class="row">
                        <div class="col-lg-12    col-md-12 col-sm-12 col-12">
                        <form action="checkout.php" method="post">
                                <div class="table-content table-responsive cart-table-content">
                                <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Until Price</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php
                                            $total = 0;
                                            $tqty=0;
                                            foreach ($_SESSION['cart'] as $product) :
                                                $subtotal = $product['price'] * $product['quantity'];
                                                $total += $subtotal;
                                                $tqty=$tqty+$product['quantity'];
                                            ?>
                                            <tr>
                                            <td><?php echo $product['image']; ?></td>
                                            <td><?php echo $product['name']; ?></td>
                                            <td><?php echo $product['price']; ?></td>
                                            <td><?php echo $product['quantity']; ?></td>
                                            <td><?php echo $subtotal; ?></td>
                                            <td><a href="cart.php?remove=<?php echo $product['id']; ?>">Remove</a></td>
                                            </tr>
                                           
                                            <?php endforeach; ?>
                                            <input type="hidden" name="pid"             value="<?php echo $product['id']; ?>">
                                            <input type="hidden" name="product_name"    value="<?php echo $product['name']; ?>">
                                            <input type="hidden" name="product_price"   value="<?php echo $product['price']; ?>">
                                            <input type="hidden" name="product_qty"     value="<?php echo $product['quantity']; ?>">
                                            <input type="hidden" name="subtotal"        value="<?php echo $subtotal; ?>">
                                            <input type="hidden" name="total"           value="<?php echo $total; ?>">
                                            <tr>
                                            <td></td>   
                                            <td></td> 
                                            <td></td> 
                                            <td><strong>Grand Total</strong></td> 
                                            <td>K<?php echo $total; ?></td> 
                                            </tr>
                                           
                                        </tbody>
                                        <tfoot>
                                        
                                        </tfoot>
                                    </table>
                                </div>
                                <?php else : ?>
                                <p>Your cart is empty.</p>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update">
                                                <a href="foodCrop.php">Continue Shopping</a>
                                            </div>
                                            <div class="cart-clear">
                                                <a href="cart.php?clear">Clear Shopping Cart</a>
                                            </div>
                                            <div class="cart-clear">
                                            <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Proceed to checkout</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form> 
                                        
                            
                    </div>
                </div>
            </div>
            <!-- cart area end -->
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