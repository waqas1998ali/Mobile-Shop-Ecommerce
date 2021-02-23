<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>

<?php
if(isset($_GET['edit_product'])){
    $edit_id=$_GET['edit_product'];
    $get_product="SELECT * FROM products WHERE product_id='$edit_id'";
    $edit=mysqli_query($con,$get_product);
    $row_edit=mysqli_fetch_array($edit);

    $p_id=$row_edit['product_id'];
    $p_cat_id=$row_edit['p_cat_id'];
    $cat_id=$row_edit['cat_id'];
    $p_title=$row_edit['product_title'];
    $p_img1=$row_edit['product_img1'];
    $p_img2=$row_edit['product_img2'];
    $p_img3=$row_edit['product_img3'];
    $p_price=$row_edit['product_price'];
    $p_desc=$row_edit['product_desc'];
    $p_keyword=$row_edit['product_keyword'];
}
$get_p_cat="SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";
$get_p_cat_run=mysqli_query($con,$get_p_cat);
$row_p_cat=mysqli_fetch_array($get_p_cat_run);
$p_cat_title=$row_p_cat['p_cat_title'];

$get_cat="SELECT * FROM categories WHERE cat_id='$cat_id'";
$run_cat=mysqli_query($con,$get_cat);
$row_cat=mysqli_fetch_array($run_cat);
$cat_title=$row_cat['cat_title'];

?>
 <script>tinymce.init({selector:'textarea'});</script>
<body>
<?
include 'update_products.php'
?>
<div class="card">
    <div class="card-header">
        <strong>Edit Products</strong> 
    </div>
    <div class="card-body card-block">
    
    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Title </label>
                         <input type="text" name="product_title" class="form-control" value="<?php echo  $p_title ?>">
                     </div>

                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Price</label>
                         <input type="text" name="product_price" class="form-control" value="<?php echo  $p_price ?>">
                     </div>
                      
                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Category </label>
                            <select name="product_category" class="form-control">
                           <option value="<?php echo  $p_cat_id; ?>"> <?php echo $p_cat_title; ?></option>
                              <?php
                                  $get_p_cats="select * from product_categories";
                                  $run_p_cats=mysqli_query($con,$get_p_cats);
                                  while($row=mysqli_fetch_array($run_p_cats)){
                                      $id=$row['p_cat_id'];
                                      $p_cat_title=$row['p_cat_title'];
                                      echo "<option value='$id' > $p_cat_title</option>";
 
                                  }
                              ?>
                            </select>
                     </div>

                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">categoriese </label>
                         <select name="cat" class="form-control">
                         <option value="<?php echo  $cat_id; ?>"> <?php echo $cat_title; ?></option>
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
                         <input type="text" name="product_keywords" class="form-control"value="<?php echo $p_keyword; ?>">
                     </div>
                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Image 1</label>
                         <input type="file" name="product_img1" class="form-control"><br>
                         <img src="product_images/upload/<?php echo $p_img1 ?>" height="80px" width="80">
                     </div>
                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Image 2</label>
                         <input type="file" name="product_img2" class="form-control"><br>
                         <img src="product_images/upload/<?php echo $p_img2 ?>" height="80px" width="80">
                     </div>

                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Image 3</label>
                         <input type="file" name="product_img3" class="form-control"><br>
                         <img src="product_images/upload/<?php echo $p_img3 ?>" height="80px" width="80">
                     </div>
                     <div class="col col-md-12">
                         <label class="col-md-11 control-label">Product Description</label>
                        <textarea name="product_desc" class="form-control" rows="6" cols="19" ><?php echo $p_desc ?></textarea>
                     </div>

                     <div class="content mt-3">
             <div class="row">
<div class="col-md-12">
   <button name="update"class="btn btn-info" role="button" value="update">UPDATE PRODUCT</button>
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
if(isset($_POST['update'])) {
    
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_category'];
    $cat=$_POST['cat'];
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


          

    $update_product = "UPDATE  products SET p_cat_id='$product_cat',cat_id='$cat',date=NOW(),product_title='$product_title',product_img1='$product_img1',
    product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',
    product_desc='$product_desc',product_keyword='$product_keywords'WHERE product_id='$p_id'";
     if(mysqli_query($con, $update_product)){

        $_SESSION['message']= '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
       Your  Product Updated Successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>';
      
   // echo "<script>alert('Product update Successfully')</script>";
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
  