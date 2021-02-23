
<?php
include("includes/db.php");
include("functions/getfunctions.php");


session_start();

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

Total price PKR <?php totalPrice();?>,Total Items <?php item(); ?></a>
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
    <a href="checkout.php">My Account</a>
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
           <li class="active" >
               <a href="index.php">Home</a>
             </li>
             <li>
               <a href="shop.php">shop</a>
             </li>
             
             <li >
               <a href="checkout.php">My Account</a>
             </li>
             <li >
               <a href="cart.php">Shopping Card</a>
             </li>
             <li >
               <a href="about.php">About</a>
             </li>
             <li>
               <a href="services.php">Services</a>
             </li>
             <li >
               <a href="contact.php">Contact us</a>
             </li>
       </ul>
   </div><!--end padding nav -->
   <a href="cart.php" class="btn btn-primary navbar-btn right">
       <i class ="fa fa-shopping-card">
           <span><?php item(); ?> item in card</span>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="customer_registration.php">Register</a></li>
        </ul>
    </div><!-- start col-md-12 -->

    <div class="col-md-3"><!-- start col-md-3 -->
    <?php
include("includes/sidebar.php");
    ?>
    </div><!-- end col-md-3 -->

    <div class="col-md-9"><!-- start col-md-9 -->
         <div class="box"><!-- start box -->
           <div class="box-header"><!--start box-header -->
              <center>
                <h2>Customer Registration</h2>
              </center>
           </div><!--start box-header -->
          
                  <form action="customer_registration.php" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                       <label> Customer Name</label>
                       <input type="text" name="c_name" class="form-control">
                     </div>

                     <div class="form-group">
                       <label> Customer  e-mail</label>
                       <input type="text" name="c_email" class="form-control">
                     </div>
                    
                     <div class="form-group">
                       <label> Customer  Password</label>
                       <input type="password" name="c_password" class="form-control">
                     </div>
                    

                     <div class="form-group">
                       <label> Country</label>
                       <input type="text" name="c_country" class="form-control">
                     </div>
                    

                     <div class="form-group">
                       <label> City</label>
                       <input type="text" name="c_city" class="form-control">
                     </div>

                     <div class="form-group">
                       <label> Address</label>
                       <input type="text" name="c_address" class="form-control">
                     </div>

                     <div class="form-group">
                       <label> Contact</label>
                       <input type="text" name="c_number" class="form-control">
                     </div>

                      <div class="form-group">
                       <label> Image</label>
                       <input type="file" name="c_image" class="form-control">
                     </div>

                     <div class="text-center">
                     <button type="submit" name="submit" class="btn btn-primary">
                     <i class="fa fa-user-md"></i>  Registration
                     </button>
                     </div>
                    

                  </form>

          
         </div><!-- start box -->
    </div><!-- start col-md-9 -->

 

    </div><!-- end container -->


</div><!-- end content -->

<?php
include("includes/footer.php");
?>

<?php
if(isset($_POST['submit'])){
  
  $c_name=$_POST['c_name'];
  $c_email=$_POST['c_email'];
  $c_password=$_POST['c_password'];
  $c_country=$_POST['c_country'];
  $c_city=$_POST['c_city'];
  $c_address=$_POST['c_address'];
  $c_number=$_POST['c_number'];
  $c_status='1';

  $c_image=$_FILES['c_image']['name'];
  $c_tmp_image=$_FILES['c_image']['tmp_name'];
  $c_ip=getUserIP();
  move_uploaded_file($c_tmp_image, "customer/customer_images/$c_image");
 
  $insert_customer="INSERT INTO customers (customer_name,customer_email,customer_pass,
  customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip,customer_status)
   VALUES ('$c_name','$c_email','$c_password','$c_country','$c_city',' $c_number','$c_address','$c_image',' $c_ip','$c_status')";
  
  $run_customer=mysqli_query($con,$insert_customer);
  $sel_cart="SELECT * FROM cart WHERE ip_add='$c_ip'";
  $run_cart=mysqli_query($con,$sel_cart);
  $check_cart=mysqli_num_rows($run_cart);
  if($check_cart>0){
    $_SESSION['customer_email']=$c_email;
    echo "<script>alert('You have been Registered Successfully GOtO Shopping card')</script>";
   echo"<script>window.open('checkout.php','_self')</script>";
  }
  else{
    $_SESSION['customer_email']=$c_email;
    echo "<script>alert('Your Registered Successfully')</script>";
   echo"<script>window.open('index.php','_self')</script>";

  }
}

?>

























