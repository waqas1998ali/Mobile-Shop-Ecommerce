
<?php
 $db = mysqli_connect("localhost","root","","ecommerce");
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

 ?>