
<?php

// Always start this first

session_start();



if ( ! empty( $_POST ) ) {

    if ( isset( $_POST['Email'] ) && isset( $_POST['Password'] ) ) {

       

    	     header("Location: dashboard.php");

    	}

    }



?>

<!DOCTYPE html>

<html>





<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.3/logout.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Mar 2020 18:33:23 GMT -->

<head>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>iMoSyS | Covid19 Response</title>

    <!-- favicon -->

    

    <link rel='icon' href='img/lwb_profile.jpg' />



    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">



    <link href="css/animate.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">



</head>



<body class="gray-bg">



    <div class="middle-box text-center loginscreen animated fadeInDown">

        <div>

            <div>

                <br><br><br><br>

                <img src="img/imosys_logo.png" alt="" style="width:210px;">



            </div>

            <form class="m-t" role="form" action="authenticate.php" method="post">

                <h2 style="font-weight: 900; color: #101780"></h2>

                <div class="form-group">

                    <input type="email" name="email" class="form-control" placeholder="" required="">

                </div>

                <div class="form-group">

                    <input type="password" name="password" class="form-control" placeholder="" required="">

                </div>

                <div>

                <?php //$error = $_GET['error'];?>

                    <p style="color:red"><b><?php //echo $error;?></b></p>

                </div>

                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
            <a href="create_user.php"><button type="submit" name="submit" class="btn btn-primary block full-width m-b">Dont have an account ? Sign up here</button>

            </a>    


        </div>
        

    </div>



    <!-- Mainly scripts -->

    <script src="js/jquery-3.1.1.min.js"></script>

    <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.js"></script>



</body>





<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.3/logout.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Mar 2020 18:33:23 GMT -->

</html>

