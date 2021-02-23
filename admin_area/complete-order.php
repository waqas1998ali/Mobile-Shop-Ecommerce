
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))

{

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    
</head>

<body>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>COMPLETE ORDERS</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">complete Order</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content row-1">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <a href="index.php?view_order" class="btn btn-info" role="button">View Orders </a> 
                 <a href="index.php?pending_order" class="btn btn-warning" role="button">Pending Orders</a> 
                 <a href="index.php?complete_order" class="btn btn-success" role="button">Complete Orders</a> 
                 <a href="index.php?deleted_orders" class="btn btn-danger" role="button">Delete Orders</a> 

                            </div></div>
         
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    
                                        <tr>
                                            
                                
                                      
                                        <th scope="col">S No:</th>
                                            <th scope="col">Invoce NO:</th>
                                            <th scope="col">Title:</th>
                                            <th scope="col">Email:</th>
                                            <!-- <th scope="col">Qty:</th>
                                            <th scope="col">Size:</th> -->
                                            <th scope="col">Address:</th>
                                            <th scope="col">Date:</th>
                                            <!-- <th scope="col">Total Amount:</th>
                                            <th scope="col">Image:</th>  -->
                                            <th scope="col">Payment:</th> 
                                            <th scope="col">Order Status:</th> 
                                             <!-- <th scope="col">Delete</th> -->
                                            <!-- <th scope="col">Delete:</th> --> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                   <?php
                                   $i=0;
                                   $get_orders="SELECT * FROM customer_order Where order_status='complete order'";

                                  // $get_orders="SELECT * FROM customer_order";
                                   $run_orders=mysqli_query($con,$get_orders);
                                   while($row_orders=mysqli_fetch_array($run_orders)){
                                       $order_id=$row_orders['order_id'];
                                       $customer_id=$row_orders['customer_id'];
                                       $product_id=$row_orders['product_id'];
                                       $invoice_no=$row_orders['invoice_no'];
                                       $due_amount=$row_orders['due_amount'];
                                       $invoice_no=$row_orders['invoice_no'];
                                       $qty=$row_orders['qty'];
                                       $size=$row_orders['size'];
                                       $order_date=$row_orders['order_date'];
                                       $payment_status=$row_orders['payment_status'];
                                       $order_status=$row_orders['order_status'];
                                       $get_products="SELECT * FROM products WHERE product_id='$product_id'";
                                       $run_products=mysqli_query($con,$get_products);
                                       $row_products=mysqli_fetch_array($run_products);
                                       $product_title=$row_products['product_title'];
                                       $product_img1=$row_products['product_img1'];

                                       $i++;
                                  
                                   $get_customer="SELECT * FROM customers WHERE customer_id='$customer_id'";
                                   $run_customer=mysqli_query($con,$get_customer);
                                   $row_customer=mysqli_fetch_array($run_customer);	
                                   $customer_email=$row_customer['customer_email'];
                                   $customer_address=$row_customer['customer_address'];
                                   $length=substr($customer_address,0,30);
                                   $length=$length. "  /...Read more";
                                            
                                   
                                   
                                   
                                   
                                   ?>
                                        <tr>
                                         <th scope="row"><?php echo $i?></th>
                                          
                                           
                                            <td> <?php echo $invoice_no ?> </td> 
                                            <td><?php  echo  $product_title?></td>
                                            <td> <?php echo $customer_email?> </td> 
                                            <!-- <td><?php  echo $qty?></td>
                                            <td> <?php echo $size ?> </td>  -->
                                            <td> <?php echo $length ?> </td> 
                                            <td><?php  echo $order_date?></td>
                                           <td> <?php echo $due_amount  ?> </td> 
                                             <!-- <td><img  src="product_images/upload/<?php echo $product_img1 ?>"  width="70" height="70"></td>
                                            <td> <?php echo $payment_status ?> </td>  -->
                                            <td> <?php echo $order_status ?> </td> 
                                            


                                            <td>
                                          
                                            <!-- <a class="btn btn-outline-primary" href="index.php?view_product=<?php  ?>">View</a><br><br> -->
                                            <!-- <a  class="btn btn-danger btn-sm" href="index.php?delete_product=<?php   ?>"> Delete</a>                                        </tr> -->
                                        
                                            <?php
                                   }
                                            
                                            ?>
                                           
                                         
                                     
   
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
                          
</body>


    

</body>

<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  
</html>
<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/js/init-scripts/data-table/datatables-init.js"></script>
