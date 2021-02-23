<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>
<?php
if(isset($_GET['delete_order'])){
    $delete_order=$_GET['delete_order'];
  //  $delete="DELETE FROM customers WHERE customer_id=' $delete_customer'";

  //$delete = "UPDATE customer_order SET status=0 where order_id=' $delete_order'";
  $delete = "UPDATE customer_order SET order_status='delete order' where order_id='$delete_order'";

    $run_delete=mysqli_query($con,$delete);
    if($run_delete){
        $_SESSION['message']= '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Delete</span>
        One  Order Has been Deleted.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>';
    
    echo"<script>window.open('index.php?view_order','_self')</script>";
    }
}



?>

<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  