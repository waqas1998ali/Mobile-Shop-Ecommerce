
<?php
$session_email=$_SESSION['customer_email'];
$select_customer="SELECT * FROM customers WHERE customer_email='$session_email'";
$run_cust=mysqli_query($con,$select_customer);
$row_customer=mysqli_fetch_array($run_cust);
$customer_id=$row_customer['customer_id'];


?>
<div class="col-md-9"><!-- start col-md-9 -->
<div class="box">
<h1 class="text-center">Payement Options</h1>
<p class="lead text-center">
<a href="order.php?c_id=<?php echo $customer_id?>">Pay offline</a>
</p>
<center>
  <p class="lead">
  
    <a href="#">
    Pay with jazzcash <br> <img src="images/pay.png" width="500" height="270"></a>
       </p>

</center>
</div>
</div>