<?php

session_start();

$db = new PDO('mysql:host=localhost;dbname=seesad', 'root', '');
$id = "";
$name = "";
$username = "";
$email = "";
$password = "";
$phone = "";
$address = "";
$img_filepath = "";
$created_at = "";


//get sign in or login info from POST and check if user exist and set cookie
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = $db->query('CREATE DATABASE IF NOT EXISTS seesad');
  $query = $db->query('CREATE TABLE IF NOT EXISTS users (
      id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name TEXT NOT NULL,
      username TEXT,
      email TEXT UNIQUE NOT NULL,
      password TEXT,
      address TEXT,
      phone TEXT,
      img_filepath TEXT,
      created_at TEXT)
    ');

  //sample user data
  $query = $db->query('INSERT IGNORE INTO users (id, name, username, email, password, address, phone, created_at) VALUES ("1","gyoza test 1","seesadtest1","sp_aviation@ichat.sp.edu.sg","1234", "535 Clementi Rd, Singapore 599489, #T18A307", "99999999", "' . date('Y-m-d') . '")');
  $query = $db->query('SELECT id, name, username, email FROM users WHERE email = "' . $_POST['email'] . '"');

  //check if user already exists
  if ($query->rowCount() == 0) {
    //add new user to database
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');
    $query = $db->query('INSERT INTO users (name, username, email, password, address, phone, created_at) VALUES ("' . $_POST['name'] . '","' . $_POST['username'] . '","' . $email . '","' . $password . '","' . $_POST['address'] . '","' . $_POST['phone'] . '","' . $date . '")');
  }
  $cookie_name = "id";
  $query = $db->query('SELECT * FROM users WHERE email = "' . $_POST['email'] . '"');
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
    $phone = $user['phone'];
    $address = $user['address'];
    $img_filepath = $user['img_filepath'];
    $created_at = $user['created_at'];

    $cookie_value = $user['id'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  }
}



//get user details from cookie
if (isset($_COOKIE['id'])) {
  $query = $db->query('SELECT * FROM users WHERE id = "' . $_COOKIE['id'] . '"');
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
    $phone = $user['phone'];
    $address = $user['address'];
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
  <script src="signout.js"></script>

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
    <div id="navbar-support">

    </div>

    <script>
      $(function() {
        $("#navbar-support").load("navbar.php");
      });
    </script>
    <!-- Navbar -->

    <!-- Carousel wrapper -->

    <!-- Carousel wrapper -->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main>

    <section style="background-color: #eee;">
      <div class="container py-5">



        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-4 ">
              <div class="card-body text-center">
                <img src="https://subwayisfresh.com.sg/wp-content/uploads/2022/02/Sides-Double-Chocolate-Cookie.jpg" alt="cookie" class="rounded-circle img-fluid" style="width: 130px;">
                <h5 class="my-3"><?php echo $name ?></h5>
                <p class="text-muted mb-1"><?php echo $username . "#" . $id ?></p>
                <p class="text-muted mb-4"><?php echo $email ?></p>
                <div class="d-flex justify-content-center mb-2">
                  <button type="button" class="btn btn-outline-danger" data-mdb-toggle="modal" data-mdb-target="#signOutModal">Sign out</button>
                  <button type="button" class="btn btn-danger ms-2" data-mdb-toggle="modal" data-mdb-target="#deleteModal">Delete account</button>
                </div>
                <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#editModal">Edit profile</button>
                </div>
              </div>
            </div>
          </div>
          <!-- EditModal -->
          <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true" style="z-index: 10000000 !important;">
            <div class="modal-dialog mt-20">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit profile</h5>
                  <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" onclick="accountSignOut()">Save</button>
                </div>
              </div>
            </div>
          </div>
          <!-- SignOutModal -->
          <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModal" aria-hidden="true" style="z-index: 10000000 !important;">
            <div class="modal-dialog mt-20">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">You are about to sign out</h5>
                  <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are your sure you want to sign out?</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" onclick="accountSignOut()">Sign out</button>
                </div>
              </div>
            </div>
          </div>
          <?php
          if (array_key_exists('deleteAcc', $_GET)) {
            $db = new PDO('mysql:host=localhost;dbname=seesad', 'root', '');
            $query = $db->query('DELETE FROM users WHERE id = "' . $_COOKIE['id'] . '"');
            echo "<script>accountSignOut();</script>";
          }
          if (array_key_exists('editAcc', $_GET)) {
            $db = new PDO('mysql:host=localhost;dbname=seesad', 'root', '');
            $query = $db->query('DELETE FROM users WHERE id = "' . $_COOKIE['id'] . '"');
            echo "<script>accountSignOut();</script>";
          }
          ?>
          <!-- DeleteModal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true" style="z-index: 10000000 !important;">
            <div class="modal-dialog mt-20">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">YOU ARE DELETING YOUR ACCOUNT</h5>
                  <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">ARE YOU SURE YOU WANT TO CONTINUE? THERE IS NO RECOVERY OF YOUR DATA (OR YOUR IMAGINARY PURCHASES!!!!)</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">sry press wrong</button>
                  <form method="get">
                    <button type="submit" name="deleteAcc" class="btn btn-primary">DELETE ACCOUNT (NO REFUNDS)</button>
                  </form>
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
                    <p class="text-muted mb-0"><?php echo $phone ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $address ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Account creation date</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $created_at ?></p>
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
                    <h6 class="font-weight-bold">Past orders#</h6>
                  </div>
                  <div class="col-sm-9">
                    <h6 class="font-weight-bold">Order contents</h6>
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
  <div id="footer-support">

  </div>

  <script>
    $(function() {
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