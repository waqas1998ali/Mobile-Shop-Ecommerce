<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Insert  Categorie</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Form</a></li>
                            <li class="active">Insert  Categorie</li>
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
                         <input type="text" name="cat_title" class="form-control">
                     </div>
        
                     <div class="col col-md-12">
                         <label class="col-md-11 control-label">Product Description</label>
                        <textarea name="cat_desc" class="form-control" rows="6" cols="19"></textarea>
                     </div>

                     <div class="content mt-3">
             <div class="row">
<div class="col-md-12">
   <button name="submit" class="btn btn-info" role="button" value="Add Categories">Add Categories</button>
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
if(isset($_POST['submit'])){
    $cat_title=$_POST['cat_title'];
    $cat_desc=$_POST['cat_desc'];
    $insert_cat="INSERT INTO categories (cat_title,cat_desc) VALUE ('$cat_title','$cat_desc')";
   // $run_p_cat=mysqli_query($con,$insert_p_cat);
    if(mysqli_query($con,$insert_cat)){
        $_SESSION['message']= ' <div class="card-body">
        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Add</span>
            You successfully category Added.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>';
    
    echo"<script>window.open('index.php?view_Categorie','_self')</script>";
    }
}

?>















<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  