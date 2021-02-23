<?php 
include("../functions/getfunctions.php");
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>

  <script>tinymce.init({selector:'textarea'});</script>
<body>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>INSERT CUSTOMER</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Form</a></li>
                            <li class="active">Insert Customer</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
 <div class="card">
   

    <div class="card-body card-block">
        
    <form action="" method="post" enctype="multipart/form-data">
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
                  
</div>
</div>
<div class="row">
  <div class="col-lg-3">

  </div>
 


</body>

</htm>

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
  move_uploaded_file($c_tmp_image, "../customer/customer_images/$c_image");
 
  $insert_customer="INSERT INTO customers (customer_name,customer_email,customer_pass,
  customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip,customer_status)
   VALUES ('$c_name','$c_email','$c_password','$c_country','$c_city',' $c_number','$c_address','$c_image',' $c_ip','$c_status')";
  
  $run_customer=mysqli_query($con,$insert_customer);
  $sel_cart="SELECT * FROM cart WHERE ip_add='$c_ip'";
  $run_cart=mysqli_query($con,$sel_cart);
  $check_cart=mysqli_num_rows($run_cart);
  if($check_cart>0){
    $_SESSION['customer_email']=$c_email;
    $_SESSION['message']= ' <div class="card-body">
   <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
       <span class="badge badge-pill badge-primary">Add</span>
       You successfully Product Added.
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
   </div>';
   echo"<script>window.open('index.php?view_customer','_self')</script>";
  }
  else{
    $_SESSION['customer_email']=$c_email;
    $_SESSION['message']= ' <div class="card-body">
   <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
       <span class="badge badge-pill badge-primary">Add</span>
       You successfully Customer Added.
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
   </div>';
   echo"<script>window.open('index.php?view_customer','_self')</script>";
  }
}?>
  <?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  