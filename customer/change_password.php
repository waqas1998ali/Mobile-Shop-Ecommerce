<div class="box"><!--start  box-->
  <center>
     <h1>change Your Password</h1>
  </center>
  <form action="" method="post" >

  <div class="form-group">
          <label> Current Password</label>
         <input type="Password" name="old_password" class="form-control">
  </div>
  <div class="form-group">
          <label> New Password</label>
         <input type="Password" name="new_password" class="form-control">
  </div>
  <div class="form-group">
          <label> Confirm Password</label>
         <input type="Password" name="confirm_password" class="form-control">
  </div>
  <div class="text-center">
        <button type="submit" name="update" class="btn btn-primary">
              Update Password
             </button>
                     </div>
</div>
</form>
<?php
if(isset($_POST['update'])){
        $c_email=$_SESSION['customer_email'];
        $old_password=$_POST['old_password'];
        $new_password=$_POST['new_password'];
        $confirm_password=$_POST['confirm_password'];
        
        $select_customer="SELECT * FROM customers 
        WHERE customer_email='$c_email' AND customer_pass='$old_password'";
        $run_customer=mysqli_query($con,$select_customer);
        $check_old_pass=mysqli_num_rows($run_customer);
        
        if($check_old_pass==0){
                echo"<script>alert('Your current is not Valid...Try Again')</script>";
                exit();
        }
        if($new_password!==$confirm_password){
                echo"<script>alert('Your password dose not match with confirm password')</script>";
                exit();

        }
        $update_query="UPDATE customers SET customer_pass='$new_password' WHERE customer_email='$c_email'";
        $run_query=mysqli_query($con,$update_query);
        echo"<script>alert('Your password changed')</script>";
     




         



}






?>








