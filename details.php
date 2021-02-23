
<?php
session_start();
include("includes/db.php");
include("functions/getfunctions.php");
?>
<?php
if(isset($_GET['pro_id'])){
    $pro_id=$_GET['pro_id'];
    $get_product="SELECT * FROM products WHERE product_id='$pro_id'";
    $run_product=mysqli_query($con,$get_product);
    $row_product=mysqli_fetch_array($run_product);
   $p_cat_id=$row_product['p_cat_id'];
   $p_title=$row_product['product_title'];
   $p_price=$row_product['product_price'];
   $p_desc=$row_product['product_desc'];
   $p_img1=$row_product['product_img1'];
   $p_img2=$row_product['product_img2'];
   $p_img3=$row_product['product_img3'];

   $get_p_cat="SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";
   $run_p_cat=mysqli_query($con,$get_p_cat);
   $row_p_cat=mysqli_fetch_array($run_p_cat);
   $p_cat_id=$row_p_cat['p_cat_id'];
   $p_cat_title=$row_p_cat['p_cat_title'];



}
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
           <li >
               <a href="index.php">Home</a>
             </li>
             <li class="active">
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
           <span>  <?php item();?> item in card</span>
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

     <div id="content"><!-- content -->
    <div class="container"><!-- start container -->
    <div class="col-md-12"><!-- start col-md-12 -->
        <ul class="breadcrumb">
            <li><a href="home.php">Home</a></li>
            <li>Shop</li>
            <li><a href="shop.php?p_cat=<?php echo $p_cat_id;?>">
            <?php echo $p_cat_title ?></li></a>
            <li><?php echo $p_title ?>
            
            </li>

        </ul>
    </div><!-- start col-md-12 -->
    <div class="col-md-3"><!-- start col-md-3 -->
    <?php
include("includes/sidebar.php");
    ?>
    </div><!-- end col-md-3 -->
<div class="col-md-9"><!-- col-md-9 -->
    <div class="row" id="productname">
       <div class="col-sm-6"><!-- col-sm-6 slider -->
           <div id="mainimage">
               <div id="mycarousel" class="carousel slide" data-ride="carousel">
                   <ol class="carousel-indicators">
                       <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                       <li data-target="#mycarousel" data-slide-to="1" ></li>
                       <li data-target="#mycarousel" data-slide-to="2"></li>
                   </ol>
                   <div class="carousel-inner"><!--carousel-inner-->
                       <div class="item active">
                           <center>
                       <img src="admin_area/product_images/upload/<?php echo $p_img1 ?>" class="img-responsive">
                         </center>
                       </div>
                       <div class="item">
                       <center>
                       <img src="admin_area/product_images/upload/<?php echo $p_img2 ?>" class="img-responsive">
                         </center>
                       </div>
                       <div class="item">
                       <center>
                       <img src="admin_area/product_images/upload/<?php echo $p_img3 ?>" class="img-responsive">
                         </center>
                       </div>

                   </div><!-- sendcarousel-inner-->
                   </div><!--send carousel-inner-->
        <a href="#myCarousel" class="left carousel-control" data-slide="prev">
            <span class=" glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
</a>

        <a href="#myCarousel" class="right carousel-control" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
</a>
               </div>
           </div>
           <div class="col-sm-6">
      
       <div class="box"><!-- start box-->
       <h1 class="text-center"><?php echo $p_title ?></h1>
       <?php 
           addCart();
       ?>
       <form action="details.php?add_cart=<?php echo $pro_id?>" method="post" class="form-horizontal"><!-- start form-->
       <div class="form-group"><!-- start group from-->
       <label class="col-md-5 control-label">Product Quantitty</label>
        <div class="col-md-7"><!--  START col-md-7 END-->
        <select name="product_qty" class="form-control">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        
    </select>
        </div><!-- col-md-7 END-->
       </div><!-- start group from-->
       <div class="form-group">
       <label class="col-md-5 control-label">product size</label>
       <div class="col-md-7">
       <select name="product_size" class="form-control">
       <option>select memory</option>
       <option>18</option>
       <option>32</option>
       <option>64</option>
       <option>128</option>
       </select>

       </div>
       </div>
        <p class="price">RS <?php echo $p_price?></p>
        <p class="text-center button">
        <button class="btn btn-primary" type="submit">
        <i class="fa fa-shopping-cart"></i>Add to cart</button>
         </p>
                 </form><!-- end form-->
       </div><!-- end box-->
       <div class="col-xs-4">
       <a href="#" class="thumb">
           <img src="admin_area/product_images/upload/<?php echo $p_img1 ?> " class="img-responsive">
       </a> </div>
       <div class="col-xs-4">
       <a href="#" class="thumb">
           <img src="admin_area/product_images/upload/<?php echo $p_img2 ?>" class="img-responsive">
       </a> </div>
       <div class="col-xs-4">
       <a href="#" class="thumb">
           <img src="admin_area/product_images/upload/<?php echo $p_img3 ?> " class="img-responsive">
       </a> </div>

       </div>
       </div>
       <div class="box" id="details">
       <h4>Product Detials</h4>
           <p><?php echo $p_desc ?>
             </p>
             <h4>size</h4>
              <ul>
              <li> 18 </li>
              <li> 32 </li>
              <li> 64 </li>
              <li> 128 </li>
              
              </ul>
             </div>
 <div id="row same-height-row"><!-- row same-height-row-->
 <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6-->
          <div class="box same-height headline"><!-- box same-height headline-->
          <h3 class="text-center">You also like thses products</h3>
          </div><!--  end box same-height headline-->
</div><!-- col-md-3 col-sm-6--> 

<?php 

latest_product();

?>



       </div><!-- end row same-height-row -->


     </div>

</div>

       </div><!-- col-sm-6 slider -->


















      
    </div><!-- end container -->


</div><!-- end content -->

<?php
include("includes/footer.php");
?>