
<?php 
include('includes/db.php');
session_start();

?>
<?php
if(isset($_POST['update'])){
        $admin_email=$_SESSION['admin_email'];
        $old_password=$_POST['old_password'];
        $new_password=$_POST['new_password'];
        $compassword=$_POST['compassword'];
        
        $select_admin="SELECT * FROM admins
        WHERE admin_email='$admin_email' AND admin_pass='$old_password'";
        $run_admin=mysqli_query($con,$select_admin);
        $check_old_pass=mysqli_num_rows($run_admin);
      
        if($check_old_pass==0){
           // $_SESSION['error']="Old password not match try again";
            $_SESSION['error']= '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">OLD PASSWORD</span>
            Old password not match try again!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>';

                echo"<script>window.open('index.php?updatepassword','_self')</script>";

                exit();
        }
        if($new_password!==$compassword){
               // echo"<script>alert('Your password dose not match with confirm password')</script>";
              //  $_SESSION['error']="Password Does not match with confirm password ";
                $_SESSION['error']= '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                <span class="badge badge-pill badge-danger">NOT MATCH</span>
                Password Does not match with confirm password.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>';

                echo"<script>window.open('index.php?updatepassword','_self')</script>";

                exit();

        }
        $update_query="UPDATE admins SET admin_pass='$new_password' WHERE admin_email='$admin_email'";
        $run_query=mysqli_query($con,$update_query);
     
    $_SESSION['message']= ' <div class="card-body">
   <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
       <span class="badge badge-pill badge-primary">UPDATED</span>
       Your  Successfully Password Change.
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
   </div>';
       // $_SESSION['message']="Successfully Update";
       // echo"<script>alert('Your')</script>";
        echo"<script>window.open('index.php?updatepassword','_self')</script>";

           // header("location:updatepassword.php");
    }
     
?>

