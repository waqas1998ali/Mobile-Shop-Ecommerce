<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>
<?php
if(isset($_GET['delete_customer'])){
    $delete_customer=$_GET['delete_customer'];
  //  $delete="DELETE FROM customers WHERE customer_id=' $delete_customer'";

  $delete = "UPDATE customers SET customer_status=0 where customer_id=' $delete_customer'";
    $run_delete=mysqli_query($con,$delete);
    if($run_delete){
        $_SESSION['message']= '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Delete</span>
        One  Customer Has been Deleted.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>';
    
    echo"<script>window.open('index.php?view_customer','_self')</script>";
    }
}



?>

<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  