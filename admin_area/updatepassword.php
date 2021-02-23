<?php 
include('includes/db.php');
if(isset($_SESSION['admin_email']))
{

?>

        <div class="col-lg-12 mt-2">
    <div class="card">
        <div class="card-header">
            <strong>Update</strong> Password
        </div>
        <div class="card-body card-block">
        <?php if(isset($_SESSION['message']))
        {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
         ?>
          <?php if(isset($_SESSION['error']))
        {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
         ?>
            <form action="updatepassword-db.php" method="post"class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3">
                    </div>
                    <div class="col col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="password" id="input1-group1" name="old_password" placeholder="old password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                    </div>
                    <div class="col col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="password" id="input1-group1" name="new_password" placeholder="New password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                    </div>
                    <div class="col col-md-6">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="password" id="input1-group1" name="compassword" placeholder="Confirm Password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                    </div>
                    <div class="col col-md-6">
                        <div class="input-group">
                             <input type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"  name="update" value="Update">
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    </div>

    
   
</div>

</body>

</htm>









<?php
include('footer.php');}
else{ header("location:login.php");}
?>       
  