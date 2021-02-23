<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?><?php
if(isset($_GET['edit_categorie'])){
    $edit_categorie_id=$_GET['edit_categorie'];
    $get_categorie="SELECT * FROM  categories WHERE cat_id='$edit_categorie_id'";
    $edit=mysqli_query($con,$get_categorie);
    $row_edit=mysqli_fetch_array($edit);

    $cat_id=$row_edit['cat_id'];
    $cat_title=$row_edit['cat_title'];
    $cat_desc=$row_edit['cat_desc'];
    
}?>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Categorie</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Form</a></li>
                            <li class="active">Update  Categorie</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="card">
    
    <div class="card-body card-block">
                       
              <form class="form-horizontal" method="post" action="" >
                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Product Title </label>
                         <input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title?>">
                     </div>
        
                     <div class="col col-md-12">
                         <label class="col-md-11 control-label">Product Description</label>
                        <textarea name="cat_desc" class="form-control" rows="6" cols="19"><?php echo $cat_desc?></textarea>
                     </div>

                     <div class="content mt-3">
             <div class="row">
<div class="col-md-12">
   <button name="update" class="btn btn-info" role="button" value="Add Categories">Update Product Categories</button>
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
if(isset($_POST['update'])){
    $cat_title=$_POST['cat_title'];
    $cat_desc=$_POST['cat_desc'];

    $update_Categorie = "UPDATE  categories SET cat_title='$cat_title',cat_desc='$cat_desc'
    WHERE cat_id='$cat_id'";
     if(mysqli_query($con,$update_Categorie)){

        $_SESSION['message']= '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
       Your  Category Updated Successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>';
      
   // echo "<script>alert('Product update Successfully')</script>";
       echo "<script>window.open('index.php?view_Categorie','_self')</script>";
} else{
    echo "ERROR: Could not able to execute . " . mysqli_error($con);
}

}
?>












<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  