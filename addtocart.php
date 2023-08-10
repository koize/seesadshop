<?php

session_start();
$db = mysqli_connect('localhost','root','','seesad');
if(!$db){
    die("Connection Failed: " . mysqli_connect_error());
}

$id = 0;
$product_name = "";
$product_price = 0;

if(isset($_GET['addToCart'])){
    $id = $_GET['addToCart'];

    $getProductName = mysqli_query($db,"SELECT product_name FROM products WHERE id=$id");
    $product_name = $getProductName->fetch_array()['product_name'];

    $getProductPrice = mysqli_query($db,"SELECT product_price FROM products WHERE id=$id");
    $product_price = $getProductPrice->fetch_array()['product_price'];

    $getImageLink = mysqli_query($db,"SELECT image_link FROM products WHERE id=$id");
    $image_link = $getImageLink->fetch_array()['image_link'];
    
    $productCheck = "SELECT * FROM shopping_cart WHERE product_id=$id";
    $resultCheck = mysqli_query($db,$productCheck);
    
    if(mysqli_num_rows($resultCheck) == 0){
        $sql = "INSERT INTO shopping_cart(product_id,image_link,product_name,product_price,product_quantity,cart_id) 
    VALUES ('$id','$image_link','$product_name','$product_price','1','1')";
    }else{
        $sql = "UPDATE shopping_cart SET product_quantity = product_quantity + 1,product_price = product_price * product_quantity WHERE product_id = $id";
    }

    if(mysqli_query($db,$sql)){

    }else {

    }
}