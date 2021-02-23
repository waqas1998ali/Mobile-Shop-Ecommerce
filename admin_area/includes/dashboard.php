
<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))

{

?>


<div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-lg-2 col-md-6 no-padding bg-flat-color-1">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-users text-light"></i>
                    </div>

                    <div class="h4 mb-0 text-light">
                        <span class="count"><?php echo $count_customers?></span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Total Client</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div> <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-2">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-user-plus text-light"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count"><?php echo $count_new_clients?></span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">New Clients</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-3">
                    <div class="h1 text-right mb-4">
                        <i class="fa fa-cart-plus text-light"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count"><?php echo $count_customer_order?></span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Orders</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-5">
                    <div class="h1 text-right text-light mb-4">
                    <i class="fa fa-product-hunt"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count"><?php echo $count_products?></span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Products</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-4">
                    <div class="h1 text-light text-right mb-4">
                    <i class="fa fa-list-alt"></i>
                    </div>
                    <div class="h4 mb-0 text-light"><?php echo  $count_product_categories?></div>
                    <small class="text-light text-uppercase font-weight-bold">Categories</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-1">
                    <div class="h1 text-light text-right mb-4">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">972</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">COMMENTS</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
        </div>

    </div>










            <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">New Orders</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">S No:</th>
                                            <th scope="col">Order No:</th>
                                            <th scope="col">Customer Email:</th>
                                            <th scope="col">Invoice no:</th>
                                            <th scope="col">Total:</th>
                                            <th scope="col">Date:</th>
                                            <th scope="col">Status:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=0;
                                      //  $get_payment="SELECT * FROM payments Where status='InComplete'";

                                        $get_order="SELECT * FROM customer_order  Where order_status='InComplete' ORDER BY 1 DESC LIMIT 0,5";
                                        $run_order=mysqli_query($con,$get_order);
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
                                            

                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo  $i ?></th>
                                            <td><?php echo  $order_id ?></td>
                                            <?php 
                                            $get_cust="SELECT * FROM customers WHERE customer_id='$customer_id'";
                                            $run_cust=mysqli_query($con,$get_cust);
                                            $row_customer=mysqli_fetch_array($run_cust);
                                            $customer_email=$row_customer['customer_email'];
                                            ?>
                                            <td><?php echo  $customer_email ?></td>
                                            <td><?php echo $invoice_no ?></td>
                                            <td><?php echo $due_amount ?></td>
                                            <td><?php echo $order_date ?></td>
                                            <td><?php echo  $order_status ?></td>
                                        </tr>
                                        <?php }
                                      ?>
                                        
                                    </tbody>
                                    
                                </table>
                                <a href="index.php?view_order"> <button type="button" class="btn btn-primary btn-sm">View Orders</button></a>

                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-2"><?php echo $admin_name ?></strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="admin_images/<?php echo $admin_image ?>" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $admin_email ?></h5>
                                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> <?php echo $admin_country ?></div>
                                    <div class="location text-sm-center"> <?php echo $admin_job ?></div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                    <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                    <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                    <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
include('footer.php');}
else{ header("location:login.php");}
?> 