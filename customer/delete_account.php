<div class="box"><!--start  box-->
  <center>
     <h1>Delete Your Account</h1>
  
      <form action="" method="post">
        <input type="submit" name="yes" value="yes , I want To Deletes" class="btn btn-danger">
        <input type="submit" name="no" value="No , I Dont Want" class="btn btn-primary">
      
      </form>
      </center>
  </div>
  <?php 
  $c_email=$_SESSION['customer_email'];
  if(isset($_POST['yes'])){
    $delete="DELETE FROM customers WHERE customer_email='$c_email'";
    $run=mysqli_query($con,$delete);
    if($run){
      session_destroy();
      echo "<script>alert('Your account has been delete')</script>";
      echo "<script>window.open('../index.php','_self')</script>";

    }
  
  
  }
  
  ?>