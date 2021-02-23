<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?><?php
if(isset($_GET['details_customer'])){
    $details_customer_id=$_GET['details_customer'];
    $get_details_customer="SELECT * FROM customers WHERE customer_id='$details_customer_id'";
    $details_customer=mysqli_query($con,$get_details_customer);
    $row_customer=mysqli_fetch_array($details_customer);

    $customer_id=$row_customer['customer_id'];
    $customer_name=$row_customer['customer_name'];
    $customer_pass=$row_customer['customer_pass'];
    $customer_image=$row_customer['customer_image'];
    $customer_country=$row_customer['customer_country'];
    $customer_city=$row_customer['customer_city'];
    $customer_contact=$row_customer['customer_contact'];
    $customer_address=$row_customer['customer_address'];
    $customer_ip=$row_customer['customer_ip'];
    $customer_email=$row_customer['customer_email'];
}?>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Customers Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Form</a></li>
                            <li class="active">Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="card">
    
    <div class="card-body card-block">
                       
              <form class="form-horizontal" method="post" action="" >
                     <div class="col col-md-2">
                         <label class="col-md-8 control-label">ID</label>
                         <input readonly type="text" name="p_cat_title" class="form-control" value="<?php echo $customer_id?>">
                     </div>
                     <div class="col col-md-4">
                         <label class="col-md-8 control-label">Name</label>
                         <input  readonly type="text" name="p_cat_title" class="form-control" value="<?php echo $customer_name?>">
                     </div>
        
                     <div class="col col-md-4">
                         <label class="col-md-8 control-label">Email</label>
                         <input readonly type="text" name="p_cat_title" class="form-control" value="<?php echo $customer_email?>">
                     </div>
        

        <div class="col col-md-3">
                         <label class="col-md-8 control-label">Password</label>
                         <input readonly type="text" name="p_cat_title" class="form-control" value="<?php echo $customer_pass?>">
                     </div>
                     <div class="col col-md-4">
                         <label class="col-md-8 control-label">Constact Us</label>
                         <input  readonly type="text" name="p_cat_title" class="form-control" value="<?php echo $customer_contact?>">
                     </div>
        
                     <div class="col col-md-4">
                         <label class="col-md-8 control-label">customer IP</label>
                         <input   readonly type="text" name="p_cat_title" class="form-control" value="<?php echo $customer_ip?>">
                     </div>
        
                     <div class="col col-md-4">
                         <label class="col-md-8 control-label">Country</label>
                         <input readonly type="text" name="p_cat_title" class="form-control" value="<?php echo $customer_country?>">
                     </div>
                     
                     <div class="col col-md-4">
                         <label class="col-md-8 control-label">City</label>
                         <input readonly type="text" name="p_cat_title" class="form-control" value="<?php echo $customer_city?>">
                     </div>
                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Image </label>
                         <input  readonly name="product_img2" class="form-control"><br>
                         <img  src="../customer/customer_images/<?php echo $customer_image ?>" height="150px" width="150">
                     </div>

                     <div class="col col-md-6">
                         <label class="col-md-11 control-label">Address</label>
                        <textarea readonly name="p_cat_desc" class="form-control" rows="6" cols="19"><?php echo $customer_address?></textarea>
                     </div>


                     <div class="content mt-3">
             <div class="row">
<div class="col-md-12">
<a href="index.php?view_customer" name="update" class="btn btn-info" role="button" value="Back View Customer">Back View Customer</a>
   </div>
                        


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
include('footer.php');}
else{ header("location:login.php");}
?>       
  