
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
                        <h1>View Customers</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Customers</li>
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
                            <a href="index.php?insert_customer" class="btn btn-info" role="button">Add Customers</a>

                            </div></div>
                            <div class="card-body ">
                            <?php if(isset($_SESSION['message']))
                           {
                             echo $_SESSION['message'];
                             unset($_SESSION['message']);
                           }
         ?>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    
                                        <tr>
                                            
                                
                                      
                                        <th scope="col">S No:</th>
                                            <!-- <th scope="col">Product id:</th> -->
                                            <th scope="col">Name:</th>
                                            <th scope="col">Email:</th>
                                            <th scope="col">city:</th>
                                            <th scope="col">Image:</th>
                                            <th scope="col">View / Rmove:</th>
                                            <!-- <th scope="col">Keyword:</th>
                                            <th scope="col">Date:</th> -->
                                            <!-- <th scope="col">Edit:</th>
                                            <th scope="col">Delete:</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    <?php

                                        $i=0;
                                        $get_customer="SELECT * FROM customers Where customer_status=1";
                                        $run_customer=mysqli_query($con,$get_customer);
                                        while($row_customer=mysqli_fetch_array($run_customer)){
                                            $customer_id=$row_customer['customer_id'];
                                            $customer_name=$row_customer['customer_name'];
                                            $customer_pass=$row_customer['customer_pass'];
                                            $customer_image=$row_customer['customer_image'];
                                            $customer_country=$row_customer['customer_country'];
                                            $customer_city=$row_customer['customer_city'];
                                            $customer_contact=$row_customer['customer_contact'];
                                            $customer_address=$row_customer['customer_address'];
                                            $customer_ip=$row_customer['customer_ip'];
                                            $customer_email=$row_customer['customer_email'];
                                         $i++;
                                              
                                            
                                         
                                        ?>
                                        <tr>
                                         <th scope="row"><?php echo  $i ?></th>
                                           
                                            <td><?php echo $customer_name ?></td>
                                            <td><?php echo $customer_email?></td>
                                            <td><?php echo $customer_city ?></td>
                                            <td><img  src="../customer/customer_images/<?php echo  $customer_image ?>"  width="100" height="100"></td>
                                            
                                            <td>
                                            <a class="btn btn-success" href="index.php?details_customer=<?php echo  $customer_id ?>">Details</a>
                                             <a  class="btn btn-danger btn-sm" href="index.php?delete_customer=<?php echo  $customer_id?>"> Delete</a>                                        </tr>
                                        
                                            
                                           
                                         
                                     
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
