<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csad_projek_test";
$dbname = "seesad";

$checkOutSuccessful = false;

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}

$dbb = mysqli_connect('localhost','root','','seesad');
if(!$dbb){
    die("Connection Failed: " . mysqli_connect_error());
} 
$db = new PDO('mysql:host=localhost;dbname=seesad', 'root', '');

$getOrderID = mysqli_query($dbb,"SELECT MAX(order_id) AS order_id_max FROM orders_list");
$order_id_max = $getOrderID->fetch_array()['order_id_max'];
$order_id = $order_id_max + 1;

$voucherWrongWarning = false;
$voucherMultiplier = 1;

if(isset($_GET['voucher'])){
  $voucher_code = $_GET['voucher'];
  $checkVoucher = "SELECT * FROM reward_codes WHERE discount_code = '$voucher_code'";
  $voucherResult = $conn->query($checkVoucher);
  if($voucherResult->num_rows > 0){
    $voucherRow = mysqli_fetch_assoc($voucherResult);
    $discount = $voucherRow['discount'];
    if($discount == 5){
      $voucherMultiplier = 0.95;
    }else if($discount == 10){
      $voucherMultiplier = 0.9;

    }else if($discount == 2){
      $voucherMultiplier = 0.98;
    }
  }else{
    $voucherWrongWarning = true;
  }
}

if(isset($_GET['checkOut'])){
  if (isset($_COOKIE['id'])) {
    $query = $db->query('SELECT id, name, username, address FROM users WHERE id = "' . $_COOKIE['id'] . '"');
    $result = $query->fetchAll();
    foreach ($result as $index => $user) {
      $user_id = $user['id'];
      $address = $user['address'];
    }
    $sql = "SELECT * FROM shopping_cart WHERE user_id =".$_COOKIE['id']."";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      for($i = 0;$i < mysqli_num_rows($result); $i++){
        $row = mysqli_fetch_assoc($result);
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];
      
        $addToList = "INSERT INTO orders_list(product_id,product_name,product_price,product_quantity,order_id,user_id,address) 
        VALUES ('$product_id','$product_name','$product_price','$product_quantity','$order_id','$user_id','$address')";
        $conn->query($addToList);
        
      }
      $checkOutSuccessful = true;
      if($checkOutSuccessful == true){
        $deleteCart = "DELETE FROM shopping_cart WHERE user_id =".$_COOKIE['id']."";
        $conn->query($deleteCart);
      }
    }    
  }else{
  
  }

}



