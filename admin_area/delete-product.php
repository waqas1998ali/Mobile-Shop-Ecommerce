<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>
<?php
if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];
    $delete_product="DELETE FROM products WHERE product_id='$delete_id'";
    $run_delete=mysqli_query($con,$delete_product);
    if($run_delete){
       // echo"<script>alert('One Product Has been deleted')</script>";
        
        $_SESSION['message']= '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Delete</span>
        One Product Has been Deleted.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>';
    echo"<script>window.open('index.php?view_products','_self')</script>";
    }
}



?>

<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  