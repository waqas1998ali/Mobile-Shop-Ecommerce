
<?php session_start();
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>
<?php

$admin_Session=$_SESSION['admin_email'];
$get_admin="SELECT * FROM admins WHERE admin_email='$admin_Session'";
$run_admin=mysqli_query($con,$get_admin);
$row_admin=mysqli_fetch_array($run_admin);
$admin_id=$row_admin['admin_id'];
$admin_name=$row_admin['admin_name'];
$admin_email=$row_admin['admin_email'];
$admin_image=$row_admin['admin_image'];
$admin_country=$row_admin['admin_country'];
$admin_contact=$row_admin['admin_contact'];
$admin_job=$row_admin['admin_job'];
$admin_about=$row_admin['admin_about'];

$get_products="SELECT * FROM products";
$run_products=mysqli_query($con,$get_products);
$count_products=mysqli_num_rows($run_products);

$get_customers="SELECT * FROM customers";
$run_customers=mysqli_query($con,$get_customers);
$count_customers=mysqli_num_rows($run_customers);

//$get_customers="SELECT * FROM customers";
$get_new_client="SELECT * FROM  customers ORDER BY 1 DESC LIMIT 0,5";
$new_customers=mysqli_query($con,$get_new_client);
$count_new_clients=mysqli_num_rows($new_customers);

$run_customers=mysqli_query($con,$get_customers);
$count_customers=mysqli_num_rows($run_customers);


$get_product_categories="SELECT * FROM product_categories";
$run_product_categories=mysqli_query($con,$get_product_categories);
$count_product_categories=mysqli_num_rows($run_product_categories);

$customer_order="SELECT * FROM customer_order";
$run_customer_order=mysqli_query($con,$customer_order);
$count_customer_order=mysqli_num_rows($run_customer_order);


include('header.php');

?>

      
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>
        <!-- Header-->
  <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> 

        <?php
            if(isset($_GET['dashboard'])){
                include 'includes/dashboard.php';
            }
            if(isset($_GET['insert_products'])){
                include 'insert-product.php';
            }
            if(isset($_GET['view_products'])){
                include 'view-products.php';
            }
            if(isset($_GET['delete_product'])){
                include 'delete-product.php';
            }
            if(isset($_GET['edit_product'])){
                include 'edit-product.php';
            }
            if(isset($_GET['insert_products_Categorie'])){
                include 'insert-products-Categorie.php';
            }
            if(isset($_GET['view_products_Categorie'])){
                include 'view-products-Categorie.php';
            }
            if(isset($_GET['delete_product_categorie'])){
                include 'delete-products-Categorie.php';
            }
            if(isset($_GET['edit_product_categorie'])){
                include 'edit-products-Categorie.php';
            }
            if(isset($_GET['view_Categorie'])){
                include 'view-Categorie.php';
            }
            if(isset($_GET['insert_Categorie'])){
                include 'insert-Categorie.php';
            }
            if(isset($_GET['delete_categorie'])){
                include 'delete-Categorie.php';
            }
            if(isset($_GET['edit_categorie'])){
                include 'edit-Categorie.php';
            }
            if(isset($_GET['view_slider'])){
                include 'view-slider.php';

            }if(isset($_GET['insert_slider'])){
                include 'insert-slider.php';
            }
            if(isset($_GET['delete_slider'])){
            include 'delete-slider.php';
            }
            if(isset($_GET['edit_slider'])){
                include 'edit-slider.php';
            }
            if(isset($_GET['view_customer'])){
                include 'view-customer.php';
            }
            if(isset($_GET['details_customer'])){
                include 'details-customer.php';
            }
            if(isset($_GET['delete_customer'])){
                include 'delete-customer.php';
            }
            if(isset($_GET['view_order'])){
                include 'view-order.php';
            }
            if(isset($_GET['pending_order'])){
                include 'pending-order.php';
            }
            if(isset($_GET['complete_order'])){
                include 'complete-order.php';
            }
            if(isset($_GET['delete_order'])){
                include 'delete-order.php';
            }
            if(isset($_GET['deleted_orders'])){
                include 'deleted-orders.php';
            }
            if(isset($_GET['completed_orders'])){
                include 'completed-orders.php';
            }
            if(isset($_GET['view_payment'])){
                include 'view-payment.php';
            }
            if(isset($_GET['pending_payment'])){
                include 'pending-payment.php';
            }
            if(isset($_GET['delete_payment'])){
                include 'delete-payment.php';
            }
            if(isset($_GET['deleted_payment'])){
                include 'deleted-payment.php';
            }
            if(isset($_GET['insert_customer'])){
                include 'insert-customer.php';
            }
            if(isset($_GET['admin_profile'])){
                include 'admin-profile.php';
            }
            if(isset($_GET['updatepassword'])){
                include 'updatepassword.php';
            }
            if(isset($_GET['edit_profile'])){
                include 'edit-admin-profile.php';
            }
            
            
            

            

         
            
         

    


     


            
         
           
                
            
            
            
            
           
           
           
            
            

            ?>
            

</body>

</html>

<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  