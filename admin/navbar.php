    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="tests\im\profile_small.jpg" style="" />
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
                <a href="dashboard.php"> <i class="fa fa-dashboard"></i><span class="nav-label">Dashboard</span> </a>
            </li>
            
            <li>
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Orders Status</span> </a>
            </li>
            
            <li>
                <a href=""> <i class="fa fa-reorder"></i><span class="nav-label">Products</span> </a>
                <ul class="nav nav-third-level">
                    <li>
                        <a href="add_product.php">Add product</a>
                    </li>
                    <li>
                        <a href="all_products.php">List of all products</a>
                    </li>
                    <li>
                        <a href="../foodCrop.php">Displayed Produtcts</a>
                    </li>
                </ul>
            </li>
    
                      
            <li>
                <a href=""> <i class="fa fa-dashboard"></i><span class="nav-label">Farmers</span> </a>
                <ul class="nav nav-third-level">
                    <li>
                        <a href="farmer.php">Add farmer</a>
                    </li>
                    <li>
                        <a href="all_farmers.php">List of farmers</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Transporters</span> </a>
                <ul class="nav nav-third-level">
                    <li>
                        <a href="transporter.php">Add Transporter</a>
                    </li>
                    <li>
                        <a href="all_transporters.php">List of transporters</a>
                    </li>
                </ul>
            </li>
          
            <li>
                <a href=""><i class="fa fa-gears"></i> <span class="nav-label">Reports</span> </a>
            </li>
        </ul>
    </div>
</nav>