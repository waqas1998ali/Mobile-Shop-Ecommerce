<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>
<?php
if(isset($_GET['delete_slider'])){
    $delete_slider=$_GET['delete_slider'];
    $get_delete_slider="DELETE FROM slider WHERE id='$delete_slider'";
    $run_delete=mysqli_query($con,$get_delete_slider);
    if($run_delete){
        $_SESSION['message']= '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Delete</span>
        One  Slider  Has been Deleted.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>';
    
    echo"<script>window.open('index.php?view_slider','_self')</script>";
    }
}



?>

<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  