
<div class="panel panel-default sidebar-menu"><!--start panel panel-default sidebar-menu-->
   <div class="panel-heading"><!--start ppanel-heading-->
   <?php
   $session_customer=$_SESSION['customer_email'];
   $get_cust="SELECT * FROM customers WHERE customer_email='$session_customer'";
   $run_cust=mysqli_query($con,$get_cust);
   $row_customers=mysqli_fetch_array($run_cust);
   $customer_image=$row_customers['customer_image'];
   $customer_name=$row_customers['customer_name'];
   if(!isset($_SESSION['customer_email'])){

   }else{
     echo" <center>
     <img src='customer_images/$customer_image' class='img-responsive'>
   </center>
   <br>
   <h3 align='center' class='panel-title'> $customer_name</h3>";
   }
   
   
   
   
   
   ?>




      
   </div><!--end  panel-heading-->
   <div class="panel-body"><!--start  panel-body-->
     <ul class="nav nav-pills nav-stacked">
        <li class="<?php if(isset($_GET[my_order])){echo "active";}?>">
            <a href="my_account.php?my_order"><i class="fa fa-list"></i> My Order</a>
        </li>
        <li class="<?php if(isset($_GET[pay_offline])){echo "active";}?>">
            <a href="my_account.php?pay_offline">
           <i class="fa fa-bolt"></i> Pay offline 
             </a>
        </li>

        <!-- <li class="<?php if(isset($_GET[my_address])){echo "active";}?>">
            <a href="my_account.php?my_address">
           <i class="fa fa-user"></i> My Address 
             </a>
        </li> -->

        <li class="<?php if(isset($_GET[edit_account])){echo "active";}?>">
            <a href="my_account.php?edit_account">
           <i class="fa fa-pencil"></i> Edit Account
             </a>
        </li>

        <li class="<?php if(isset($_GET[change_password])){echo "active";}?>">
            <a href="my_account.php?change_password">
           <i class="fa fa-user"></i> Change Password
             </a>
        </li>

        <!-- <li class="<?php if(isset($_GET[my_wishlist])){echo "active";}?>">
            <a href="my_account.php?my_wishlist">
           <i class="fa fa-bolt"></i> My Wishlist</a>
        </li> -->

        <li class="<?php if(isset($_GET[delete_account])){echo "active";}?>">
            <a href="my_account.php?delete_account">
            <i class="fa fa-trash"></i> Delete Account
             </a>
        </li>

        <li class="<?php if(isset($_GET[logout])){echo "active";}?>">
            <a href="../logout.php?logout">
           <i class="fa fa-sign-out"></i> Logout
             </a>
        </li>




     </ul>
   </div><!--end panel-body-->
</div><!--end  panel panel-default sidebar-menu-->