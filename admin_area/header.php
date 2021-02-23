
<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))

{

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">


    
   


    <link rel="stylesheet" href="assets/css/style.css">
    
    

    

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=""> <?php echo $admin_name ?></a>
                <a class="navbar-brand hidden" href="./"><?php $res = $admin_name; echo  $res[0]; ?></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php?dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">ADMIN</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-user-circle"></i><a href="index.php?admin_profile">View Profile</a></li>
                    
                       <li> <a href="index.php?edit_profile"> <i class=" fa fa-user"></i>Edit Profile  </a></li>

                        </ul>
                    </li>
 <h3 class="menu-title">Customers</h3>

<li class="menu-item-has-children dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>View Customer</a>
<ul class="sub-menu children dropdown-menu">
<li><i class="menu-icon fa fa-product-hunt"></i><a href="index.php?view_customer">Customers</a></li>
<li><i class="menu-icon fa fa-cart-plus"></i><a href="index.php?insert_customer">Insert </a></li>

</ul>
</li>


                    <h3 class="menu-title">Products</h3><!-- /.menu-title -->

        <li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Products</a>
    <ul class="sub-menu children dropdown-menu">
        <li><i class="menu-icon fa fa-product-hunt"></i><a href="index.php?view_products">View Products</a></li>
        <li><i class="menu-icon fa fa-cart-plus"></i><a href="index.php?insert_products">Insert Products</a></li>

        <!-- <li><i class="menu-icon fa fa-table"></i><a href="index.php?product_categories">Product Categories</a></li> -->
    </ul>
      </li>

     


      <h3 class="menu-title">PRODUCT CATEGORIES</h3><!-- /.menu-title -->

<li class="menu-item-has-children dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Product Categories</a>
<ul class="sub-menu children dropdown-menu">
<li><i class="menu-icon fa fa-product-hunt"></i><a href="index.php?view_products_Categorie">View </a></li>
<li><i class="menu-icon fa fa-cart-plus"></i><a href="index.php?insert_products_Categorie">Insert </a></li>

</ul>
</li>

<h3 class="menu-title"> CATEGORIES</h3><!-- /.menu-title -->

<li class="menu-item-has-children dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i> Categories</a>
<ul class="sub-menu children dropdown-menu">
<li><i class="menu-icon fa fa-product-hunt"></i><a href="index.php?view_Categorie">View  </a></li>
<li><i class="menu-icon fa fa-cart-plus"></i><a href="index.php?insert_Categorie">Insert </a></li>

</ul>
</li>

<h3 class="menu-title">ORDERS</h3><!-- /.menu-title -->

<li class="menu-item-has-children dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Orders</a>
<ul class="sub-menu children dropdown-menu">
<li><i class="menu-icon fa fa-product-hunt"></i><a href="index.php?view_order">View Order</a></li>
<li><i class="menu-icon fa fa-cart-plus"></i><a href="index.php?pending_order">Pending Order</a></li>

</ul>
</li>
<h3 class="menu-title">PAYMENT</h3><!-- /.menu-title -->

<li class="menu-item-has-children dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Payments</a>
<ul class="sub-menu children dropdown-menu">
<li><i class="menu-icon fa fa-product-hunt"></i><a href="index.php?view_payment">View Payment</a></li>
<li><i class="menu-icon fa fa-cart-plus"></i><a href="index.php?pending_payment">Pending </a></li>

</ul>
</li>

<h3 class="menu-title">SLIDER</h3><!-- /.menu-title -->

<li class="menu-item-has-children dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>SLIDER</a>
<ul class="sub-menu children dropdown-menu">
<li><i class="menu-icon fa fa-product-hunt"></i><a href="index.php?view_slider">View Slider</a></li>
<li><i class="menu-icon fa fa-cart-plus"></i><a href="index.php?insert_slider">Insert Slider</a></li>

</ul>
</li>



                    

                    
<h3 class="menu-title">LOGOUT</h3><!-- /.menu-title -->
                

                    <li class="active"> 
                
                        <a href="logout.php"> <i class="menu-icon fa fa-power-off"></i>Logout	 </a>
                    </li>





                  









            </div><!-- /.navbar-collapse -->

            
        </nav>
        
    </aside><!-- /#left-pa
    nel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
      

<header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="index.php?admin_profile"><i class="fa fa-user"></i> My Profile</a>
                              


                            <a class="nav-link" href="index.php?updatepassword"><i class="fa fa-cog"></i> update password</a>

                            <a class="nav-link" href="logout.php" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>


                   

                </div>
            </div>

        </header>
        <?php
include('footer.php');}
else{ header("location:login.php");}
?>    