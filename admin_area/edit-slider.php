<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?><?php
if(isset($_GET['edit_slider'])){
    $edit_slider_id=$_GET['edit_slider'];
    $get_edit_slider="SELECT * FROM  slider WHERE id='$edit_slider_id'";
    $edit=mysqli_query($con,$get_edit_slider);
    $row_edit=mysqli_fetch_array($edit);

    $id=$row_edit['id'];
    $slider_name=$row_edit['slider_name'];
    $slider_image=$row_edit['slider_image'];
    
}?>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Slider</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Form</a></li>
                            <li class="active">Update  Slider</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="card">
    
    <div class="card-body card-block">
                       
    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" >
                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Slider Title </label>
                         <input type="text" value="<?php echo $slider_name?>" name="slider_name" class="form-control">
                     </div>
        
                     <div class="col col-md-12">
                         <label class="col-md-11 control-label">Slider Image</label>
                         <input type="file" name="slider_image" class="form-control"><br>
                         <img src="slider_images/<?php echo $slider_image ?>" height="150px" width="200">



                     </div>
                     

                     <div class="content mt-3">
             <div class="row">
<div class="col-md-12">
                       <div class=" col-md-4 alert alert-dark" role="alert">
                                       Must be Image Size 1440 × 715!
                                    </div><br><br><br>
   <button name="update" class="btn btn-info" role="button" value="Add slider">Update Slider</button>
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
    $slider_name=$_POST['slider_name'];
    $slider_images=$_FILES['slider_image']['name'];
    $temp_name=$_FILES['slider_image']['tmp_name'];

    move_uploaded_file($temp_name, "slider_images/$slider_images");



    $update_slider = "UPDATE  slider SET slider_name='$slider_name',slider_image='$slider_images'
    WHERE id='$edit_slider_id'";
     if(mysqli_query($con,$update_slider)){

        $_SESSION['message']= '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
       Your  Slider Updated Successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>';
      
   // echo "<script>alert('Product update Successfully')</script>";
       echo "<script>window.open('index.php?view_slider','_self')</script>";
} else{
    echo "ERROR: Could not able to execute . " . mysqli_error($con);
}

}
?>












<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  