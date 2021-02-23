<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
include("functions/getfunctions.php");
?>
<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" 
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"></head>
<body> 
<div id="top"><!--top bar -->
<div class="container"><!--start contanier -->
<div class ="col-md-6 offer"><!--col-md-6 offer -->
<a href="#" class ="btn btn-success btn-sm">
<?php
  if(!isset($_SESSION['customer_email'])){
    echo "Welcome Guest";

  }else{
    echo "Welcome: ".$_SESSION['customer_email'];
    
  }

?>

</a>
<a href="#" >

Total price PKR <?php totalPrice();?>,Total Items <?php item();?> </a>
</div><!--end-col-md-6 offer -->
<div class="col-md-6">
<ul class="menu">
<li>
<?php
  if(!isset($_SESSION['customer_email'])){
    echo " <a href='customer_registration.php'>Register</a>";

  }else{
    echo " <a> Active Now  </a>";
  }


?>
</li>
<li>
  <?php
    if(!isset($_SESSION['customer_email'])){
      echo "<a href='checkout.php'>My Account</a>";
    }else{
      echo "<a href='customer/my_account.php?my_order'>My Account</a>";
     
    }
  ?>
</li>
<li>
<a href="cart.php">Goto Card</a>
</li>
<li>
<?php
  if(!isset($_SESSION['customer_email'])){
    echo " <a href='checkout.php'>login</a>";

  }else{
    echo " <a href='logout.php'>logout</a>";
  }


?>
</li>
</ul>
</div>
</div><!--end contanier -->
</div><!-- end top bar -->

<div class="navbar navbar-default" id="navbar"><!--start navbar -->
<div class="contanier">
<div class="navbar-header"><!--start head  navbar -->
<a class="navbar-brand home" href="index.php">
<image src="images/logo.png"  alt="store" class="hidden-xs">
<image src="images/small.png" alt="store" class="visible-xs">
</a>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
<span class="sr-only">Toggle Navigation</span>
<i class="fa fa-align-justify"></i>
</button>
<button type="button" class="navbar-toggle" data-toggle="navbar-toggle" data-target="#search">
<span class="sr-only"></span>
<i class="fa fa-search"></i>
</button>
</div><!--end head  navbar -->
<div class="navbar-collapse collapse" id="navigation"><!--start  navbar-collapse collapse -->
<div class="padding-nav"><!--start  padding nav -->
<ul class="nav navbar-nav navbar-left">
<li class="active">
<a href="index.php">Home</a>
</li>
<li>
<a href="shop.php">shop</a>
</li>

<li >
<?php
    if(!isset($_SESSION['customer_email'])){
      echo "<a href='checkout.php'>My Account</a>";
    }else{
      echo "<a href='customer/my_account.php?my_order'>My Account</a>";
     
    }
  ?>
</li>
<li>
<a href="cart.php">Shopping Card</a>
</li>
<li >
<a href="#">About</a>
</li>
<li>
<a href="#">Services</a>
</li>
<li>
<a href="contact.php">Contact us</a>
</li>
</ul>
</div><!--end padding nav -->
<a href="cart.php" class="btn btn-primary navbar-btn right">
<i class ="fa fa-shopping-card">
<span>  <?php item(); ?> item in card</span>
</i>
</a>
<div class="navbar-collapse collapse right"><!-- start navbar-collapse collapse-right -->
<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
<span class="sr-only">Toggle search</span>
<i class="fa fa-search"></i>
</button>
</div><!-- End navbar-collapse collapse-right -->
<div class="collapse clearfix" id="search">
<form class="narbar-form" method="get" action="result.php">
<div class="input-group">
<input type="text" name="user_query" placeholder="search" class="form-control">
<span class="input-group-btn">
<button type="submit" value="search" name="search" class="btn btn-primary">
<i class="fa fa-search"></i>
</button>
</span>
</div>
</form>
</div>
</div><!--end  navbar-collapse collapse -->
</div>
</div><!--end  default navbar -->
<div class="container" id="slider"><!--start ontnr -->
<div class="col-md-12"><!--col-md-12 -->
<div class="carousel slide" id="myCarousel" data-ride="carousel"><!--start carousel-slider -->
    <ol class="carousel-indicators">
        <li data-target="myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="myCarousel" data-slide-to="1" ></li>
        <li data-target="myCarousel" data-slide-to="2"></li>
        <li data-target="myCarousel" data-slide-to="3" ></li>
        </ol>
        <div class="carousel-inner"><!--start carousel-inner-->
         <?php

         $get_slider= "select * from slider LIMIT 0,1";
         $run_slider= mysqli_query($con,$get_slider);   
         while($row=mysqli_fetch_array($run_slider)){
             $slider_name=$row['slider_name'];
             $slider_image=$row['slider_image'];
             echo"<div class='item active'>
             <img src='admin_area/slider_images/$slider_image'>
              </div>";
         }      
         ?>
<?php
$get_slider= "select * from slider LIMIT 1,3";
$run_slider= mysqli_query($con,$get_slider);   
while($row=mysqli_fetch_array($run_slider)) {
    $slider_name=$row['slider_name'];
    $slider_image=$row['slider_image'];
    echo "
    <div class='item'>
    <img src='admin_area/slider_images/$slider_image'>
    </div>"
    ;
}      
?>
        </div><!--send carousel-inner-->
        <a href="#myCarousel" class="left carousel-control" data-slide="prev">
            <span class=" glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
</a>

        <a href="#myCarousel" class="right carousel-control" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
</a>
</div><!--send carousel-slider -->
</div><!-- end col-md-12 -->
</div><!--end contnr -->
<div id="advantage"><!--start advantage -->
<div class="container"><!--start container -->
<div class="same-height-row"><!--start same-height-row -->
<div class="col-sm-4"><!--start col-sm-4 -->
<div class="box same-height"><!--startbox same-height -->
<div class="icon">
<i class="fa fa-heart"></i>
</div>
<h3><a href="#"> BEST PRICES</h3>
<p>You Can Check on all others sites about the prices and than compare with us.</p>
</div><!--End same-height-row -->
</div><!--End col-sm-4 -->

<div class="col-sm-4"><!--start col-sm-4 -->
<div class="box same-height"><!--startbox same-height -->
<div class="icon">
<i class="fa fa-heart"></i>
</div>
<h3><a href="#"> 100% SATISFACTION GUARANTEED FROM US</h3>
<p>Free return on everything for 3 months..</p>
</div><!--End same-height-row -->
</div><!--End col-sm-4 -->
<div class="col-sm-4"><!--start col-sm-4 -->
<div class="box same-height"><!--startbox same-height -->
<div class="icon">
<i class="fa fa-heart"></i>
</div>
<h3><a href="#"> WE LOVE OUR CUSTOMERS</h3>
<p>We are known to provide best possible service ever.</p>
</div><!--End same-height-row -->
</div><!--End col-sm-4 -->
    </div><!--End box same-height -->
</div>  <!--End container -->
</div><!--End advantage -->
<div id="hotbox"><!--start hotbox -->
<div class="box">
<div class="container">
<div class="col-md-12">
<h2>Latest This Week</h2>
</div>
</div>
</div>
</div><!--end hotbox -->
<div id="content" class="container">
<div class="row">

       <?php
        getpPro();
        ?>

    </div> 

</div>


<!--footer start  -->
<?php
include("includes/footer.php");
?>
<!--footer end  -->





<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</htm>