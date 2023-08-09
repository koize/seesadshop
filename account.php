<?php

session_start();

   $db = new PDO('mysql:host=localhost;dbname=seesad', 'root', '');
   $id = "";
   $name = "";
   $username = "";
   $email = "";
   $password = "";

  //get sign in or login info from POST and check if user exist and set cookie
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $db->query('SELECT id, name, username, email FROM users WHERE email = "'.$_POST['email'].'"');

    //check if user already exists
    if ($query->rowCount() == 0) {
      //add new user to database
      $query = $db->query('INSERT INTO users (name, username, email, password) VALUES ("'.$name.'","'.$username.'","'.$email.'","'.$password.'")');
    }
    $cookie_name = "id";
    $query = $db->query('SELECT id, name, username, email FROM users WHERE email = "'.$_POST['email'].'"');
    $result = $query->fetchAll();

    //set cookie session and local variables
    foreach ($result as $index => $user) {
      $_SESSION["userId"] = $user['id'];
      $_SESSION["userName"] = $user['name'];
      $_SESSION["userUserName"] = $user['username'];
      $_SESSION["userEmail"] = $user['email'];
      $id = $user['id'];
      $name = $user['name'];
      $username = $user['username'];
      $email = $user['email'];
      $cookie_value = $user['id'];
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    }
    
  }

  

  //get user details from cookie
  if (isset($_COOKIE['id'])) {
    $query = $db->query('SELECT id, name, username, email FROM users WHERE id = "'.$_COOKIE['id'].'"');
    $result = $query->fetchAll();
    foreach ($result as $index => $user) {
      $_SESSION["userId"] = $user['id'];
      $_SESSION["userName"] = $user['name'];
      $_SESSION["userUserName"] = $user['username'];
      $_SESSION["userEmail"] = $user['email'];
      $id = $user['id'];
      $name = $user['name'];
      $username = $user['username'];
      $email = $user['email'];
    }
  
  }
 
 


  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

</head>
<body>
        <!--Main Navigation-->
    <header>
      <style>
        /* Carousel styling */
        #introCarousel,
        .carousel-inner,
        .carousel-item,
        .carousel-item.active {
          height: 100vh;
        }

        .carousel-item:nth-child(1) {
          background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center center;
        }
        .carousel-item:nth-child(2) {
          background-image: url('https://mdbootstrap.com/img/Photos/Others/images/77.jpg');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center center;
        }
        .carousel-item:nth-child(3) {
          background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center center;
        }

        /* Height for devices larger than 576px */
        @media (min-width: 992px) {
          #introCarousel {
            margin-top: -58.59px;
          }
          #introCarousel,
          .carousel-inner,
          .carousel-item,
          .carousel-item.active {
            height: 50vh;
          }
        }

        .navbar .nav-link {
          color: #fff !important;
        }
      </style>

      <!-- Navbar -->
        <div id = "navbar-support">

        </div>

        <script>
          $(function(){
            $("#navbar-support").load("navbar.php");
          });

        </script>
      <!-- Navbar -->

      <!-- Carousel wrapper -->
      
      <!-- Carousel wrapper -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main >
    
    <section style="background-color: #eee;">
  <div class="container py-5">
    
  

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 130px;">
            <h5 class="my-3"><?php echo $name ?></h5>
            <p class="text-muted mb-1"><?php echo $username . "#" . $id ?></p>
            <p class="text-muted mb-4"><?php echo $email ?></p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div>
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $name ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Username</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $username ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $email ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">99999999</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">T18A307</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Account creation date</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">1/1/1111</p>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $name ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Username</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $username ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $name ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(098) 765-4321</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
      
    </main>
    <!--Main layout-->

    <!--Footer-->
    <div id = "footer-support">

    </div>

    <script>
      $(function(){
        $("#footer-support").load("footer.php");
      });

    </script>
    <!--Footeeeeeer-->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>

