<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>
<?php
if(isset($_GET['delete_payment'])){
    $delete_payment=$_GET['delete_payment'];
  //  $delete="DELETE FROM customers WHERE customer_id=' $delete_customer'";

  //$delete = "UPDATE customer_order SET status=0 where order_id=' $delete_order'";
  $delete = "UPDATE payments SET status='Delete Payment' where payment_id='$delete_payment'";

  $run_delete=mysqli_query($con,$delete);

    $pending = "UPDATE customer_order SET payment_status='Delete Payment' where order_id='$delete_payment'";
    $run=mysqli_query($con,$pending);
 
    
    if($run_delete){
        $_SESSION['message']= '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Delete</span>
        One  Payment Has been Deleted.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>';
    echo"<script>window.open('index.php?view_payment','_self')</script>";

    //echo"<script>window.open('index.php?view_payment,'_self')</script>";
    }
}



?>

<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  