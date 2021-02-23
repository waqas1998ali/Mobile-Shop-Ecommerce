
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
                        <h1>Slider</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">View Slider</li>
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
                            <a href="index.php?insert_slider" class="btn btn-info" role="button">Add Slider</a>

                            </div>
                            <?php if(isset($_SESSION['message']))
                           {
                             echo $_SESSION['message'];
                             unset($_SESSION['message']);
                           }
         ?>
                            <div class="card-body ">
                            
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    
                                        <tr>
                                            
                                
                                      
                                        <th scope="col">S No:</th>
                                            <!-- <th scope="col">Product id:</th> -->
                                            <th scope="col">Title:</th>
                                            <th scope="col">Image:</th>
                                            
                                            <th scope="col">Rmove:</th>
                                            <!-- <th scope="col">Keyword:</th>
                                            <th scope="col">Date:</th> -->
                                            <!-- <th scope="col">Edit:</th>
                                            <th scope="col">Delete:</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    <?php

                                        $i=0;
                                        $get_slider="SELECT * FROM slider";
                                        $run_slider=mysqli_query($con,$get_slider);
                                        while($row_slider=mysqli_fetch_array($run_slider)){
                                            $id=$row_slider['id'];
                                            $slider_name=$row_slider['slider_name'];
                                            $slider_image=$row_slider['slider_image'];
                                            $i++;
                                              
                                            
                                         
                                        ?>
                                        <tr>
                                         <th scope="row"><?php echo  $i ?></th>
                                           
                                            <!-- <td><?php echo $id ?></td> -->
                                            <td><?php echo $slider_name ?></td>
                                            <td><img  src="slider_images/<?php echo $slider_image ?>"  width="150" height="100"></td>
                                           
                                           
                                            <td>
                                            <a class="btn btn-success" href="index.php?edit_slider=<?php echo $id ?>">Edit</a>
                                                <a id="txt" class="btn btn-danger btn-sm" href="index.php?delete_slider=<?php echo $id ?>"> Delete</a>                                        </tr>
                                        
                                            
                                           
                                         
                                     
                                        <?php     
    }
    
?> 
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

   

    

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
