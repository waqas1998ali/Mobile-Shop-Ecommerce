<?php

include("includes/db.php");

$customer_email=$_SESSION['customer_email'];
$get_customer="SELECT * FROM customers WHERE customer_email='$customer_email'";
$run_cust=mysqli_query($con,$get_customer);
$row_cust=mysqli_fetch_array($run_cust);
$customer_id=$row_cust['customer_id'];
$customer_name=$row_cust['customer_name'];
$customer_country=$row_cust['customer_country'];
$customer_city=$row_cust['customer_city'];
$customer_contact=$row_cust['customer_contact'];
$customer_address=$row_cust['customer_address'];
$customer_image=$row_cust['customer_image'];
$customer_email=$row_cust['customer_email'];


?>
<div class="box"><!--start  box-->
  <center>
     <h1>Edit Your Account</h1>
  </center>
  <form action="#" method="post" enctype="multipart/form-data">

  <div class="form-group">
          <label> Customer Name</label>
          <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name ?>">
        </div>

        <div class="form-group">
          <label> Customer  e-mail</label>
          <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email ?>">
        </div>
    
        <div class="form-group">
          <label> Country</label>
          <input type="text" name="c_country" class="form-control" value="<?php echo $customer_country ?>">
        </div>
        

        <div class="form-group">
          <label> City</label>
          <input type="text" name="c_city" class="form-control" value="<?php echo $customer_city?>">
        </div>

        <div class="form-group">
          <label> Address</label>
          <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address ?>">
        </div>

        <div class="form-group">
          <label> Contact</label>
          <input type="text" name="c_number" class="form-control" value="<?php echo $customer_contact ?>">
        </div>

          <div class="form-group">
          <label> Image</label>
          <input type="file" name="c_image" class="form-control">
          <img src="customer_images/<?php echo $customer_image ?>" class="img-responsive" height="100" width="100" value="">
        </div>


        <div class="text-center">
        <button type="submit" name="update" class="btn btn-primary">
        <i class="fa fa-user-md"></i>  Update Now
        </button>
        </div>
        
</div></form>

</div><!--end box-->
<?php
if(isset($_POST['update'])){
  
  $c_name=$_POST['c_name'];
  $c_email=$_POST['c_email'];
  $c_country=$_POST['c_country'];
  $c_city=$_POST['c_city'];
  $c_address=$_POST['c_address'];
  $c_number=$_POST['c_number'];

  //$c_image=$_FILES['c_image']['name'];
  //$c_tmp_image=$_FILES['c_image']['tmp_name'];
  //move_uploaded_file($c_tmp_image,"customer/customer_images/$c_image");
 
  $update_customer="UPDATE customers SET customer_name='$c_name',customer_email='$c_email',
  customer_country='$c_country',customer_city='$c_city',customer_contact='$c_number',customer_address='$c_address' 
  WHERE customer_id='$customer_id'";
   
  $run_customer=mysqli_query($con,$update_customer);

  if($run_customer){
    echo "<script>alert('done')</script>";
    echo "<script>window.open('#',)</script>";
  }

}
  ?>