<?php

// We need to use sessions, so you should always start sessions using the below code.
session_start();

//print_r($_SESSION['orders']);
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location:login.php');
    exit;
}
?>
<?php include 'dbconnect.php'?>

<?php 
if(isset($_POST['view_id'])){
    $view_id = $_POST['view_id'];
    $sql5=mysqli_query($conn, "SELECT FROM `orders` WHERE oid = '$view_id'");
    
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
                    <h2><?php echo "Order No.". $view_id ;?></h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            
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
                    <h3 class="cart-page-title"></h3>
                    <div class="row">
                        
                        <div class="col-lg-12    col-md-12 col-sm-12 col-12">
                        <form action="" method="post">
                                <div class="table-content table-responsive cart-table-content">
                                <?php
                                if(isset($_POST['view_id'])){
                                    $view_id = $_POST['view_id'];
                                    $sql5=mysqli_query($conn, "SELECT FROM `orders` WHERE oid = '$view_id'");
                                    
                                  
                                $query1 = "SELECT * FROM orders where oid = '$view_id'  ";
                                $result1 = $conn->query($query1);
                              
                                $orders = array();
                                if ($result1->num_rows > 0) {
                                    while ($row = $result1->fetch_assoc()) {
                                        $order = array(
                                            'id' => $row['order_id'],
                                            'name' => $row['productname'],
                                            'price' => $row['unit price'],
                                            'quantity' => $row['quantity'],
                                            'description'=>$row['description'],
                                            'order_date'=>$row['order_date'],
                                            'status'=>$row['status'],
                                           
                                        );
                                        $orders[] = $order; // Add the order to the array
                                    }
                                
                                    $_SESSION['orders'] = $orders; // Store the array of orders in the session
                                } else {
                                    echo "No pending orders found.";
                                }
                            } 
                               
                                
                                // Close the database connection
                                $conn->close();
                                ?>
                                

                          
                                   
                                </div>
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Unit Price</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Description</th>
                                                <th>Order Date</th>
                                                <th>Status</th>

                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                        <?php
                                            $total = 0;
                                            $subtotal=0;//$row['quantity']*$row['price'];
                                            
                                           // $tqty=0;
                                            //$tqty=$tqty+$row['quantity'];
                                            foreach ($_SESSION['orders'] as $row) :
                                               
                                            ?>
                                            <tr>
                                            <td><?php echo 'image'; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['quantity']; ?></td>
                                            <td><?php echo $row['quantity']*$row['price']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['order_date']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            
                                            </tr>
                                           
                                            <?php endforeach; ?>
                                            
                                         
                                           
                                        </tbody>
                                        <tfoot>
                                        
                                        </tfoot>
                                    </table>
                               
                                
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