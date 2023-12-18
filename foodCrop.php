
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
                    <h2>View Products</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home > Shop</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
           <!-- HTML -->
            <div class="table-wrapper">
                <div class="container">
                    <div class="row">
                    <?php 
                    $sql13 = "SELECT * FROM `products` ";
                    $result13 = $conn->query($sql13);

                    if ($result13->num_rows > 0) {
                        while ($row = $result13->fetch_assoc()) {
                            $product_id=$row["product_id"];
                            $print = $row["productname"];
                            $Desc = $row["description"];
                            $marketPrice = $row["unit price"];
                            $loc = $row["location"];
                            $image = $row["imgname"];
                            $costPrice = $marketPrice - (0.12 * $marketPrice);
                            $marketPrice=$costPrice;

                          
                            
                    ?>
   
                                
                    <div class="wrapper wrapper-content animated fadeInRight row col-3">
                            <div class="container"> 
                                <div class=" row col-4 ">
                                    <div class="">
                                        <div class="" style="margin-left: 10px">             
                                        
                                                <article class="list-product">
                                                    <div class="img-block">
                                                        <a href="single-product.html" class="thumbnail">
                                                            <img class="first-img" src="admin/img/<?php echo $image?>" alt=""  style="width:200px;height: 200px;"/>
                                                            
                                                        </a>
                                                        <div class="quick-view">
                                                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="ion-ios-search-strong"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <ul class="product-flag">
                                                        <li class="new">New</li>
                                                    </ul>
                                                    <div class="product-decs">                                                 
                                                  
                                                        
                                                        <div class="pricing-meta">
                                                            <ul>
                                                            
                                                            <label for=""><?php echo $print; ?></label><br>

                                                            <label for=""><?php echo 'K'.$marketPrice; ?>
                                                          
                                                    
                                                   
                                                            </ul>
                                                        </div>
                                                        <form action="cart.php" method="post">
                                                    
                                                    <input type="hidden" name="product_image" value="<?php echo $image; ?>">
                                                    <input type="hidden" name="product_name" value="<?php echo $print; ?>">
                                                    <input type="hidden" name="pid" value="<?php echo $product_id; ?>">
                                                    <input type="" name="quantity" value="1" min="1">
                                                    <input type="hidden" name="product_price" value="<?php echo $marketPrice; ?>">
                                                    <input type="submit" name="add_to_cart" value="Add to Cart">
                                                    </form> 
                                                    </div>
                                                    
                                                    
                                                </article>
                                                
                                              </div>
                                        

                                        </div><!--col-md-10 col-lg-10 offset-md-1 end-->
                                    </div> <!--class row end-->
                                </div><!--wrapper wrapper-content animated fadeInRight end-->
                            </div>
                        <?php
                            }
                        } 
                        
                        else {
                            // Handle the case when there are no rows in the result
                            echo "No products found.";
                        }
                        ?>
                    </div>
                    </div>
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