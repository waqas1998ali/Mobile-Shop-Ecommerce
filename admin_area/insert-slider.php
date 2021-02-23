<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Slider</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Form</a></li>
                            <li class="active">Insert  Insert</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="card">
    
    <div class="card-body card-block">
    <div class="page-title ">
                    <?php if(isset($_SESSION['message']))
                           {
                             echo $_SESSION['message'];
                             unset($_SESSION['message']);
                           }
         ?>
                       
              <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" >
                     <div class="col col-md-6">
                         <label class="col-md-8 control-label">Slider Title </label>
                         <input type="text" name="slider_name" class="form-control">
                     </div>
        
                     <div class="col col-md-12">
                         <label class="col-md-11 control-label">Slider Image</label>
                         <input type="file" name="slider_image" class="form-control">


                     </div>
<br><br>
                     <div class="content mt-3">
             <div class="row">
<div  id="txt" class="col-md-12">
   <button name="submit" class="btn btn-info" role="button" value="Add Slider">Add Slider</button>
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
   $slider_name=$_POST['slider_name'];

   $slider_images=$_FILES['slider_image']['name'];
   $temp_name=$_FILES['slider_image']['tmp_name'];
   $view_slider="SELECT * FROM slider";
   $view_run_slider=mysqli_query($con,$view_slider);
   $count=mysqli_num_rows($view_run_slider);
   if($count<4){
       move_uploaded_file($temp_name, "slider_images/$slider_images");

       
       $insert_slider="INSERT INTO slider (slider_name,slider_image) 
       VALUES ('$slider_name','$slider_images')";
       $run_slider=mysqli_query($con,$insert_slider);

      // echo "<script>alert('Slider  Added ')</script>";
       $_SESSION['message']= ' <div  class="card-body">
        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Add</span>
            You successfully Slider  Added.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>';
    
    echo"<script>window.open('index.php?view_slider','_self')</script>";

   }else{
    echo "<script>alert('Error ')</script>";
    echo"<script>window.open('index.php?insert_slider','_self')</script>";
    $_SESSION['message']= ' <div class="alert alert-danger" role="alert">
   You Have Already Inserted 4 Slider LIMIT 4!
</div>';
   }
}

?>



                  

        </div>





<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  