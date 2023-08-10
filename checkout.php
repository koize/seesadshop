<?php 
$db = new PDO('mysql:host=localhost;dbname=seesad', 'root', '');

if(isset($_GET['checkOut'])){
  if (isset($_COOKIE['id'])) {
    $query = $db->query('SELECT id, name, username, email FROM users WHERE id = "' . $_COOKIE['id'] . '"');
    $result = $query->fetchAll();
    foreach ($result as $index => $user) {
      $user_id = $user['id'];
      $address = $user['address'];
    }

    
    
  }else{
  
  }

}



