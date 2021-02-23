<?php
session_start();
include("includes/db.php");
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

Total price PKR <?php totalPrice();?>,   <?php item(); ?> Total Items  </a>
</div><!--end-col-md-6 offer -->
<div class="col-md-6">
<ul class="menu">
   <li>
   <?php
  if(!isset($_SESSION['customer_email'])){
    echo " <a href='../customer_registration.php'>Register</a>";

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
             <li class="active">
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
           <span> <?php item();?>  item in card</span>
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
            <li><a href="cart.php">Shopping Card</a></li>
        </ul>
    </div><!-- start col-md-12 -->
    
<div class="col-md-9" id="cart"><!--  start col-md-9 -->
<div class="box">
  <form action="cart.php" method="post" enctype="multipart-form-data">
  <h1>Shopping Cart</h1>
  <?php 
    $ip_add=getUserIP();
  $select_cart="SELECT * FROM cart WHERE ip_add='$ip_add'";
  $run_cart=mysqli_query($con,$select_cart);
  $count=mysqli_num_rows($run_cart);
  
  ?>
  <p class="text-muted">Currently you have <?php  echo $count; ?> item(s in your cart)</p>

   <div class="table-responsive"><!-- stable-responsive -->
   <table class="table">
   <thead>
   <tr>
      <th colspan="2">Product</th>
      <th>Quantity</th>
      <th>unit price</th>
      <th>memory</th>
      <th colspan="1">Delete</th>
      <th colspan="1">sub Total</th>
   </tr>
   </thead>


   <tboby>

   <?php
   $total=0;
       while($row=mysqli_fetch_array($run_cart)){
         $pro_id=$row['p_id'];
         $pro_size=$row['size'];
         $pro_qty=$row['qty'];
         $get_product="SELECT * FROM products Where product_id='$pro_id'";
         $run_pro=mysqli_query($con,$get_product);
         while($row=mysqli_fetch_array($run_pro)){
           $p_title=$row['product_title'];
           $p_img1=$row['product_img1'];
           $p_price=$row['product_price'];
           $sub_total=$row['product_price']* $pro_qty;
           $total +=$sub_total;

   ?>

      <tr>
   <td><img src="admin_area/product_images/upload/<?php echo  $p_img1; ?>"></td>
   <td><?php echo  $p_title; ?></td>
   <td><?php echo  $pro_qty; ?></td>
   <td><?php echo  $p_price; ?> pkr</td>
   <td><?php echo  $pro_size; ?></td>
   <td><input type="checkbox" name="remove[]" value="<?php echo  $pro_id; ?>"></td>
   <td><?php echo  $sub_total; ?></td>
      </tr>

      <?php
       }}
      ?>
                       </tbody>

           
                    </table>
                 </div><!--  end stable-responsive -->

                 <div class="box-footer">
                 <div class="pull-left"><!--  start pull-left -->
                 <h2>Total Price</h2>
                 </div><!--  end pull-left -->
                 <div class="pull-right">
                 <h3>PKR <?php echo  $total; ?></3>
                 </div>
                 </div>




                 <div class="box-footer">
                 <div class="pull-left"><!--  start pull-left -->
                 <a href="index.php" class="btn btn-default">
                 <i class="fa fa-chevron-left"></i> Continue Shopping 
                 </a>
                 </div><!--  end pull-left -->
                 <div class="pull-right">
                 <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                 <i class="fa fa-refresh"> Update Cart</i>
                 </button>
                 <a href="checkout.php" class="btn btn-primary">

                 Proceed to checkout <i class="fa fa-chevron-right"></i>
                 </a>

                 </div>
                 </div>
           </form>
        </div>
  <div id="row same-height-row"><!-- row same-height-row-->
          <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6-->
              <div class="box same-height headline"><!-- box same-height headline-->
          <h3 class="text-center">You also like thses products</h3>
          </div><!--  end box same-height headline-->
                    </div><!-- col-md-3 col-sm-6--> 
         <?php  
          echo @$up_cart=update_cart();
          latest_product();
         ?>

       </div><!-- end row same-height-row -->
  </div><!-- col-md-9 -->

  <div class="col-md-3"><!-- start col-md-3 -->
         <div class="box"  id="order-summary">
           <div  classs="box-header">
           <h3>Order summary</h3>
            </div>
            <p class="text-muted">
            shipping and additional costs are calculated based on the values you have entered
            </p>
            <div class="table-responsive"><!-- table-responsive -->
                <table class="table">
                     <tbody>
                         <tr>
                            <td>Subtotal</td>
                                 <th><h5>RS <?php echo  $total; ?></h5></th>
                           </tr>
                                 <td>Shipping & andling</td>
                                      <td>0</td>

                               </tr>
                              <tr>
                              <td>Tax</td>
                              <td>0</td>
                                </tr>

                            <tr class="total">
                                <td>Total</td>
                                  <th><h4>RS <?php echo  $total; ?></h4></th>
          
                                </tr>


                      </tbody>
           
                 </table>
           </div><!-- table-responsive -->
      
      </div><!-- end col-md-3 -->

</div><!---container end-->
</div><!---content end-->




    <?php
include("includes/footer.php");
?>