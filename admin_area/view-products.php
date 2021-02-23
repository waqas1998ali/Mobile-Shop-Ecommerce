
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
                        <h1>View Product Category</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">View Product Category</li>
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
                            <a href="index.php?insert_products" class="btn btn-info" role="button">Add Products</a>

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
                                            <th scope="col">Title:</th>
                                            <th scope="col">Image:</th>
                                            <th scope="col">Price:</th>
                                            <th scope="col">Description:</th>
                                            <th scope="col">Edit / Rmove:</th>
                                            <!-- <th scope="col">Keyword:</th>
                                            <th scope="col">Date:</th> -->
                                            <!-- <th scope="col">Edit:</th>
                                            <th scope="col">Delete:</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    <?php

                                        $i=0;
                                        $get_product="SELECT * FROM products";
                                        $run_product=mysqli_query($con,$get_product);
                                        while($row_product=mysqli_fetch_array($run_product)){
                                            $product_id=$row_product['product_id'];
                                            $product_title=$row_product['product_title'];
                                            $product_img1=$row_product['product_img1'];
                                            $product_price=$row_product['product_price'];
                                            $product_desc=$row_product['product_desc'];
                                            $length=substr($product_desc,0,30);
                                            $length=$length. "  /...more";
                                            
                                            
                                            $product_keyword=$row_product['product_keyword'];
                                            $date=$row_product['date'];
                                              $i++;
                                              
                                            
                                         
                                        ?>
                                        <tr>
                                         <th scope="row"><?php echo  $i ?></th>
                                           
                                            <!-- <td><?php echo $product_id ?></td> -->
                                            <td><?php echo $product_title ?></td>
                                            <td><img  src="product_images/upload/<?php echo $product_img1 ?>"  width="70" height="70"></td>
                                            <td><?php echo $product_price ?></td>
                                            <td> <?php echo $length  ?> </td> 
                                            <td>
                                            <a class="btn btn-success" href="index.php?edit_product=<?php echo $product_id ?>">Edit</a>
                                            <a class="btn btn-outline-primary" href="index.php?view_product=<?php echo $product_id ?>">View</a><br><br>
                                                <a  class="btn btn-danger btn-sm" href="index.php?delete_product=<?php echo $product_id ?>"> Delete</a>                                        </tr>
                                        
                                            
                                           
                                         
                                     
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
