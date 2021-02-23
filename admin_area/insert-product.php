<?php 
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
                        <h1>Insert Products</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Form</a></li>
                            <li class="active">Insert Products</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
 <div class="card">
   

    <div class="card-body card-block">
        
    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Title </label>
                         <input type="text" name="product_title" class="form-control">
                     </div>

                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Price</label>
                         <input type="text" name="product_price" class="form-control">
                     </div>
                      
                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Category </label>
                            <select name="product_category" class="form-control">
                           <option>Select a product category</option>
                              <?php
                                  $get_p_cats="select * from product_categories";
                                  $run_p_cats=mysqli_query($con,$get_p_cats);
                                  while($row=mysqli_fetch_array($run_p_cats)){
                                      $id=$row['p_cat_id'];
                                      $cat_title=$row['p_cat_title'];
                                      echo "<option value='$id' > $cat_title</option>";
 
                                  }
                              ?>
                            </select>
                     </div>

                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">categoriese </label>
                         <select name="cat" class="form-control">
                           <option>Select a category</option>
                              <?php
                                  $get_cats="select * from categories";
                                  $run_cats=mysqli_query($con,$get_cats);
                                  while($row=mysqli_fetch_array($run_cats)){
                                      $id=$row['cat_id'];
                                      $cat_title=$row['cat_title'];
                                      echo "<option value='$id' > $cat_title</option>";
 
                                  }
                              ?>
                            </select>
                                </div>
                                <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product keyword</label>
                         <input type="text" name="product_keywords" class="form-control">
                     </div>
                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Image 1</label>
                         <input type="file" name="product_img1" class="form-control">
                     </div>
                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Image 2</label>
                         <input type="file" name="product_img2" class="form-control">
                     </div>

                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Image 3</label>
                         <input type="file" name="product_img3" class="form-control">
                     </div>
                     <div class="col col-md-12">
                         <label class="col-md-11 control-label">Product Description</label>
                        <textarea name="product_desc" class="form-control" rows="6" cols="19"></textarea>
                     </div>

                     <div class="content mt-3">
             <div class="row">
<div class="col-md-12">
   <button name="submit"class="btn btn-info" role="button" value="insert product">insert product</button>
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
if(isset($_POST['submit'])) {
    
    $product_title=$_POST['product_title'];
    $product_category=$_POST['product_category'];
    $product_cat=$_POST['cat'];
    $product_price=$_POST['product_price'];
    $product_keywords=$_POST['product_keywords'];
    $product_desc=$_POST['product_desc'];

    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];

    $temp_name1=$_FILES['product_img1']['tmp_name'];
    $temp_name2=$_FILES['product_img2']['tmp_name'];
    $temp_name3=$_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1, "product_images/upload/$product_img1");
    move_uploaded_file($temp_name2, "product_images/upload/$product_img2");
    move_uploaded_file($temp_name3, "product_images/upload/$product_img3");


          

    $insert_product = "INSERT INTO products (p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keyword)
    values('$product_category',' $product_cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_keywords')";

  if(mysqli_query($con, $insert_product)){
    
   // echo "<script>alert('Product Inserted Successfully')</script>";
       
   $_SESSION['message']= ' <div class="card-body">
   <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
       <span class="badge badge-pill badge-primary">Add</span>
       You successfully Product Added.
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
   </div>';
   echo "<script>window.open('index.php?view_products','_self')</script>";

} else{
    echo "ERROR: Could not able to execute . " . mysqli_error($con);
}
}

?>
  
  <?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  