
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

      
 
     $sql = "SELECT * FROM products";
     $result = $conn->query($sql);
 
     if(isset($_POST['update_update_btn'])){
        $update_id=$_POST['update_id'];
        $name = $_POST['update_name'];
        $pcode = $_POST['update_pcode'];
        $desc = $_POST['update_desc'];
        $price = $_POST['update_Price'];
      
        $update_query = mysqli_query($conn, "UPDATE `products` SET productname = '$name' , pcode='$pcode' , description='$desc' ,`unit price`='$price'  WHERE product_id = '$update_id'");
        
        if ($conn->query($update_query) === TRUE) 
        {   
        $result="<h2>*******Data Updated successfully*******</h2>";
        echo $result;
    
        
        }
        else
        {  
            $result="<h2>*******Data update unsuccessful*******</h2>";
            echo $result;
    
        die($conn -> error);    
        }
       
      };
      
       if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM `products` WHERE product_id = '$remove_id'");
        header('location:all_products.php');
      };


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
    <link rel="stylesheet" href="../style.vendor.mini.css">
    <link rel="stylesheet" href="../style.min.css">
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
                    <h2>View All Produts</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home > Admin > All products</a>
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
                    <h3 class="cart-page-title">List of All Products</h3>
                    <div class="row">
                        <div class="col-lg-12    col-md-12 col-sm-12 col-12">
                        
                                        
                            
                    </div>
                </div>
            </div>
            <!-- cart area end -->
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Code</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <tbody>
  <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
    <tr>
      <td><img src="../im/corn.jpg" style="width:50px;"></td>
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="update_id"  value="<?php echo  $row['product_id']; ?>" >
        <td><input type="text" name="update_name"  value="<?php echo $row['productname']; ?>" ></td>
        <td><input type="number" name="update_pcode"  value="<?php echo $row['pcode']; ?>" ></td>
        <td><input type="text" name="update_desc"  value="<?php echo $row['description']; ?>" ></td>
        <td> <input type="number" name="update_Price" value="<?php echo $row['unit price']; ?>" ></td>
        <td> <input type="submit" value="update" name="update_update_btn">
      </form></td>
      <td><a href="all_products.php?remove=<?php echo $row['product_id']; ?>">remove</a></td>
    </tr>
    <?php 
    }
        } 
        else 
            echo "0 results";
        ?>
  
  </tbody>
</table>

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