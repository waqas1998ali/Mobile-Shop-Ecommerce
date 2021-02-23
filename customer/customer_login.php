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

<div class="col-md-9"><!-- start col-md-9 -->
         <div class="box"><!-- start box -->
           <div class="box-header"><!--start box-header -->
              <center>
                <h2>Login Account</h2>
                <p>Already Our Customers</p>
              </center>
           </div><!--start box-header -->
          
                  <form action="checkout.php" method="post" enctype="multipart/form-data">
                    
                     <div class="form-group">
                       <label> Customer  e-mail</label>
                       <input type="text" name="c_email" class="form-control">
                     </div>
                    
                     <div class="form-group">
                       <label> Customer  Password</label>
                       <input type="password" name="c_password" class="form-control">
                     </div>
                    
                     <div class="text-center">
                     <button type="login" name="login" value="login" class="btn btn-primary">
                     <i class="fa fa-sign-in"></i>  Login
                     </button>
                     </div>
                    

                  </form>
                  <center>
                  <a href="customer_registration.php">
                <h2>New ? Registration Now</h2></a>
              </center>
          
         </div><!-- start box -->
    </div><!-- start col-md-9 -->
</html>
<?php
if(isset($_POST['login'])){
    $customer_email=$_POST['c_email'];
    $customer_pass=$_POST['c_password'];
    $select_customers="SELECT * FROM customers WHERE customer_email='$customer_email' AND customer_pass='$customer_pass'";
    $run_cust=mysqli_query($con,$select_customers);
    $get_ip=getUserIP();
    $check_customer=mysqli_num_rows($run_cust);
    $select_cart="SELECT * FROM cart WHERE ip_add='$get_ip'";
    $run_cart=mysqli_query($con,$select_cart);
    $check_cart=mysqli_num_rows($run_cart);
    if($check_customer==0){
        echo "<script>alert('Password/Email Wrong')</script>";
        exit();
    }
    if($check_customer==1 AND $check_cart==0){
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('Your are Logged in')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
    }
     else{
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('Your are Logged in')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
     }
}

?>