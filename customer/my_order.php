<?php
include("includes/db.php");

?>
<div class="box"><!--box start-->
<center>
<h1>My Orders</h1>
<p>We focus on media that adds maximum value to your business<a href="../contact.php">
contactus</p></a>
</center>
<hr>
   <div class="table-responsive">
     <table class="table table-bordered table-hover">
       <thead>
             <tr>
                 <th>S.no</th>
                 <th>Due Amount</th>
                 <th>Invoice Numbe</th>
                 <th>Quantity</th>
                 <th>size</th>
                 <th>Order Date</th>
                 <th>Paid/Unpaid</th>
                 <th>Status</th>
             </tr>
         </thead>
         <tbody>
         <?php
        $customer_session= $_SESSION['customer_email'];
        $get_customer="SELECT * FROM customers WHERE customer_email='$customer_session'";
        $run_cust=mysqli_query($con,$get_customer);
        $row_cust=mysqli_fetch_array($run_cust);
        $customer_id=$row_cust['customer_id'];
        $get_order="SELECT * FROM customer_order WHERE customer_id='$customer_id'";
        $run_order=mysqli_query($con,$get_order);
        $i=0;
        while($row_order=mysqli_fetch_array($run_order)){
          $order_id=$row_order['order_id'];
          $order_due_amount=$row_order['due_amount'];
          $order_invoice=$row_order['invoice_no'];
          $order_qty=$row_order['qty'];
          $order_size=$row_order['size'];
          //$order_date=substr($row_order['size'],0,11);
          $order_date=$row_order['order_date'];
          $payment_status=$row_order['payment_status'];
          $i++;
          if($payment_status=='unpaid'){
                 $payment_status="unpaid";
          }else{
            $payment_status="paid";
          }
        
         
         ?><tr>
                <td><?php echo $i ?></td>
                <td><?php echo $order_due_amount ?></td>
                <td><?php echo $order_invoice ?></td>
                <td><?php echo $order_qty  ?></td>
                <td><?php echo $order_size ?></td>
                <td><?php echo $order_date ?></td>
                <td><?php echo $payment_status ?></td>

                <td><a href="confirm.php?order_id=<?php  echo $order_id ?>" target="_blank"
                 class="btn btn-primary btn-sm">Confirm If paid</td>

                <?php
                }
                ?></tr>
         </tbody>
     </table>
   </div>


</div><!--box end -->