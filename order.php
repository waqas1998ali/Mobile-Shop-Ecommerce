<?php
session_start();
include("includes/db.php");
include("functions/getfunctions.php");
?>
<?php
if(isset($_GET['c_id'])){
    $customer_id=$_GET['c_id'];
}
$ip_add=getUserIP();
$payment_status="unpaid";
$order_status="InComplete";
$status=2;
$invoice_no=mt_rand();
$select_cart="SELECT * FROM cart WHERE ip_add='$ip_add'";
$run_cart=mysqli_query($con,$select_cart);
while($row_cart=mysqli_fetch_array($run_cart)){
    $pro_id=$row_cart['p_id'];
    $size=$row_cart['size'];
    $qty=$row_cart['qty'];

    $get_product="SELECT * FROM products WHERE product_id='$pro_id'";
    $run_pro=mysqli_query($con, $get_product);
    
    while($row_pro=mysqli_fetch_array($run_pro)){
        $sub_total=$row_pro['product_price'] * $qty;

        $insert_cust="INSERT INTO customer_order(customer_id,product_id,due_amount,invoice_no,qty,size,order_date,payment_status,order_status,status) 
        VALUES ('$customer_id','$pro_id','$sub_total','$invoice_no','$qty','$size',NOW(),'$payment_status','$order_status','$status')";
        $run_cust=mysqli_query($con,$insert_cust);
      

        // $insert_pending_orders="INSERT INTO pending_orders (customer_id,invoice_no,product_id,qty,size,order_status)
         // VALUES ('$customer_id','$invoice_no','$pro_id','$qty','$size','$status')";
        
      //  $run_pending_order=mysqli_query($con,$insert_pending_orders);
        

        $delete_cart="DELETE  FROM cart WHERE ip_add='$ip_add'";
        $run_del=mysqli_query($con,$delete_cart);

        echo "<script>alert('Your order has been submitted')</script>";
        echo "<script>window.open('customer/my_account.php?my_order','_self')</script>";
    }
}














?>