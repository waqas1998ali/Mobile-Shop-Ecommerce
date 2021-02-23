<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>
<?php
if(isset($_GET['delete_categorie'])){
    $delete_categories=$_GET['delete_categorie'];
    $categories="DELETE FROM categories WHERE cat_id='$delete_categories'";
    $run_delete=mysqli_query($con,$categories);
    if($run_delete){
        $_SESSION['message']= '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Delete</span>
        One  Categorie Has been Deleted.
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
  