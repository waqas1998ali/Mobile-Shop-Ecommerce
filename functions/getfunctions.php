<?php
 $db = mysqli_connect("localhost","root","","ecommerce");


 //for getting ip address
 function getUserIP(){
   
   switch(true){
     case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];

     case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];

     case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

     default : return $_SERVER['REMOTE_ADDR'];

   }

 }

//sentmail customers and admin
function sendmail(){
      
  if(isset($_POST['submit'])){
    $senderName=$_POST['name'];
    $senderemail=$_POST['email'];
    $sendersubject=$_POST['subject'];
    $sendermessage=$_POST['message'];
    $receviverEmail="waqas1998ali@gmail.com";
    mail($receviverEmail,$senderName,$sendersubject,$sendermessage,$senderemail);
    //customers mail
    $email=$_POST['email'];
    $subject="welcome to our website";
    $mes="I shall get you sooon , thanks for sending email";
    $from="waqas1998ali@gamil.com";
    mail($email,$subject,$mes,$from);
    echo "<h2 align='center'>Your Mail sent</h2>";
  }

}
 //latest product
 function latest_product(){
  global $db;

  $get_product="SELECT * FROM products ORDER BY 1 LIMIT 0,3";
  $run_product=mysqli_query($db,$get_product);
  while($row=mysqli_fetch_array($run_product)){
      $pro_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_price=$row['product_price'];
      $product_img1=$row['product_img1'];
      
      echo"<div class='center-responsive col-md-3 col-sm-6 '>
          <div class='product same-height'>
          <a href='details.php?pro_id=$pro_id'>
              <img src='admin_area/product_images/upload/$product_img1'class='img-responsive'>
          </a>
              <div class='text'>
                  <h3><a href='details.php?pro_id=$pro_id'> $product_title</a></h3>
                  <p class='price'> $product_price</p>
                  <p class='button'> 
                      <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                      <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                          <i class='fa fa-shopping-cart'></i>  Add to card
                          </a>
                          </p> 
           </div>
              </div>
                  </div>";
  
  
  }
  


 }
    
  //Delete cart item

  function update_cart(){
    global $db;
    if(isset($_POST['update'])){
      foreach($_POST['remove'] as $remove_id){
        $delete_product="DELETE FROM cart WHERE p_id='$remove_id'";
        $run_del=mysqli_query($db,$delete_product);
        if($run_del){
          echo"
          <script>  window.open('cart.php','_self')</script>";
        }
      }
    }
  }


  //items counts
  function item(){
    global $db;
    $ip_add=getUserIP();
    $get_items="SELECT * FROM cart where ip_add='$ip_add'";
    $run_item=mysqli_query($db,$get_items);
    $count=mysqli_num_rows($run_item);
    echo $count;
 }
//items total price
function totalPrice(){
  global $db;
  $ip_add=getUserIP();
  $total=0;
  $select_cart="SELECT * FROM cart WHERE ip_add='$ip_add'";
  $run_cart=mysqli_query($db,$select_cart);
  while($record=mysqli_fetch_array($run_cart)){
       $pro_id=$record['p_id'];
       $pro_qty=$record['qty'];
       $get_price="SELECT * FROM products WHERE product_id='$pro_id'";
       $run_price=mysqli_query($db,$get_price);
       while($row=mysqli_fetch_array($run_price)){
         $sub_total=$row['product_price']*$pro_qty;
         $total += $sub_total;
       }
  }
  echo  $total;

  
}
 function addCart(){
   global $db;
   if(isset($_GET['add_cart'])){
     $ip_add=getUserIP();
     $p_id=$_GET['add_cart'];
     $product_qty=$_POST['product_qty'];
     $product_size=$_POST['product_size'];
     $check_product="SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
     $run_check=mysqli_query($db,$check_product);
     if(mysqli_num_rows($run_check)>0){
       echo "<script>alert('This Product is already added in cart')</script>";
       echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
     }else{
           $query="INSERT into cart (p_id,ip_add,qty,size) VALUES ('$p_id','$ip_add','$product_qty','$product_size')";
           $run_query=mysqli_query($db,$query);
           echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
       }


      }

 }

 