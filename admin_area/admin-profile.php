<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>ADMIN PROFILE</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            
                            <li class="active">Adim Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
    <div class="card-header">
             
              <div class="panel panel-default">
          <div class="panel-heading">
           
            <div class="col col-md-3 form-group">
            <img  src="admin_images/<?php echo $admin_image ?>" height="250px" width="250px">
           
</div>
            
           
            
            <!-- User info -->
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">User info</h4><br>
          </div>
          <tr>
                  <th class="cpl-md-"><strong>Name</strong></th>
                  <td><?php echo $admin_name?></td>
                </tr>
                <tr><br>
                  <th><strong>Position</strong></th>
                  <td><?php echo $admin_job?></td>
                </tr><br><br><br>
                <a type="button"  href="index.php?edit_profile" style="margin:5px;" class="btn btn-outline-secondary"><i class="fa fa-lightbulb-o"></i>&nbsp; Edit Account Setting</a>
                <a href="index.php?updatepassword" type="button" class="btn btn-outline-danger"><i class="fa fa-rss"></i>&nbsp; Change Password</a>


          
          <div class="panel-body">
            <table class="table profile__table">
              <tbody>
              <tr>
                  <th><strong>ID</strong></th>
                  <td><?php echo $admin_id?></td>
                </tr>
                <tr>
                  <th><strong>Email</strong></th>
                  <td><?php echo $admin_email?></td>
                </tr>
                
                <tr>
                  <th><strong>Position</strong></th>
                  <td><?php echo $admin_job?></td>
                </tr>
                <tr>
                  <th><strong>Location</strong></th>
                  <td><?php echo $admin_country?></td>
                </tr>
                <tr>
                  <th><strong>Contact</strong></th>
                  <td><?php echo $admin_contact?></td>
                </tr>
                <tr>
                  <th><strong>About Us</strong></th>
                  <td><?php echo $admin_about?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>



                      
                     


                     <!-- <div class="content mt-3">
             <div class="row">
<div class="col-md-12">
<a href="index.php?view_customer" name="update" class="btn btn-info" role="button" value="Back View Customer">Back View Customer</a>
   </div>
                        


   </div>


<div class="row">
  <div class="col-lg-3">

  </div>
  -->

  </div>
</div>
</body>

</htm>















<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  