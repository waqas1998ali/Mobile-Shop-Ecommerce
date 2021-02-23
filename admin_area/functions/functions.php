<?php
 $db = mysqli_connect("localhost","root","","ecommerce");

 function getorders(){
     global $db;
     $i=0;
     $get_order="SELECT * FROM customer_order ORDER BY 1 DESC LIMIT 0,5";
     $run_order=mysqli_query($db,$get_order);
     while($row_order=mysqli_fetch_array($run_order)){
         $order_id=$row_order['order_id'];
         $customer_id=$row_order['customer_id'];
         $product_id=$row_order['product_id'];
         $invoice_no=$row_order['invoice_no'];
         $order_date=$row_order['order_date'];
         $due_amount=$row_order['due_amount'];
         $order_status=$row_order['order_status'];
         $qty=$row_order['qty'];
         $size=$row_order['size'];
         $i++;
     }
    }
     
              
 ?>