    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="" class="rounded-circle" src="img/profile_small.jpg" style="width: 20px;height: 20px;"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"><?php echo $_SESSION['name'] ?></span>
                        
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    CR
                </div>
            </li>
            <li>
                <a href="foodCrop.php"> <i class="fa fa-dashboard"></i><span class="nav-label">shop products</span> </a>
            </li>
            <li>
                <a href="cart.php"> <i class="fa fa-dashboard"></i><span class="nav-label">cart</span> </a>
            </li>
            <li>
                <a href="orders.php"><i class="fa fa-th-large"></i> <span class="nav-label">Your Orders</span> </a>
            </li>
            <li>
                <a href="orders_list.php"><i class="fa fa-reorder"></i> <span class="nav-label">Edit Profile</span> </a>
            </li>
            <li>
                <a href="status.php"><i class="fa fa-th-large"></i> <span class="nav-label">About Us</span> </a>
            </li>          
            <li>
                <a href="status.php"><i class="fa fa-th-large"></i> <span class="nav-label">Contact us</span> </a>
            </li> 
           
        </ul>
    </div>
</nav>