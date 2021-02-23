<?php
session_start();
include 'includes/db.php';
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";

}else{
    
?>
<?php
$admin_Session=$_SESSION['admin_email'];
$get_admin="SELECT * FROM admins WHERE admin_email='$admin_Session'";
$run_admin=mysqli_query($con,$get_admin);
$row_admin=mysqli_fetch_array($run_admin);
$admin_id=$row_admin['admin_id'];
$admin_name=$row_admin['admin_name'];

$get_products="SELECT * FROM products";
$run_products=mysqli_query($con,$get_products);
$count_products=mysqli_num_rows($run_products);

$get_customers="SELECT * FROM customers";
$run_customers=mysqli_query($con,$get_customers);
$count_customers=mysqli_num_rows($run_customers);

$get_product_categories="SELECT * FROM product_categories";
$run_product_categories=mysqli_query($con,$get_product_categories);
$count_product_categories=mysqli_num_rows($run_product_categories);


?>