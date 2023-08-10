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
  <main class="mt-5">
    <div class="container">
      <section>
        <h3 class="mb-5"><strong>Shopping Cart</strong></h3>
      </section>
      <section>
        <div class="row">
          <div class="col-md-7 gx-5 mb-4">
            <div class="card">
              <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "csad_projek_test";
              $dbname = "seesad";


              $conn = new mysqli($servername, $username, $password, $dbname);
              $db = new PDO('mysql:host=localhost;dbname=seesad', 'root', '');
              $query = $db->query('CREATE DATABASE IF NOT EXISTS seesad');
              $query = $db->query('CREATE TABLE IF NOT EXISTS shopping_cart (
      id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      product_id INT,
      image_link TEXT,
      product_name TEXT ,
      product_price INT,
      product_quantity INT,
      cart_id INT)
    ');

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $sqlViewCart = "SELECT id,image_link,product_name,product_price,product_quantity FROM shopping_cart";
              $result = $conn->query($sqlViewCart);

              if ($result->num_rows > 0) {
                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                  $row = mysqli_fetch_assoc($result);
                  echo '<div class="row" style = "margin: 20px 10px 0px 10px">';
                  echo '<div class="col-md-3">';
                  echo '<img src="img/' . $row['image_link'] . '" class="img-fluid"/>';
                  echo '</div>';
                  echo '<div class="col-md-7">';
                  echo $row['product_name'];
                  echo '</div>';
                  echo '<div class="col-md-2">';
                  echo '<div class=row>';
                  echo '<a href="">Delete</a>';
                  echo '</div>';
                  echo '<div class=row>';
                  echo '<span style="text-align: bottom-right; padding-top: 10px; font-weight: bold">$' . $row['product_price'] . '</span>';
                  echo '</div>';
                  echo '</div>';
                  echo '<hr class="hr hr-blurry" style="margin: 10px 0px 0px 0px">';
                  echo '</div>';
                }
              }

              ?>
              <!-- Each item -->
              <div class="row" style="margin: 20px 10px 0px 10px">
                <div class="col-md-3">
                  <img src="img/about_page_kao1.jpg" class="img-fluid" style="height:100%" />
                </div>
                <div class="col-md-7">
                  Product Item
                </div>
                <div class="col-md-2">
                  <div class=row>
                    <a href="">Delete</a>
                  </div>
                  <div class=row>
                    <span style="text-align: bottom-right; padding-top: 10px; font-weight: bold">$3.69</span>
                  </div>
                </div>
                <hr class="hr hr-blurry" style="margin: 10px 0px 0px 0px">
              </div>
              <!-- Each item -->

            </div>
          </div>
          <div class="col-md-5 gx-5 mb-4">
            <div class="card" style="margin-bottom: 20px; ">
              <!-- Card start -->
              <div class="row" style="margin: 20px 10px 0px 10px">
                <div class="col-md-6">
                  Subtotal:
                </div>
                <div class="col-md-6">
                  <span style="padding-left:100px">$TOTAL.exe</span>
                </div>
              </div>
              <hr class="hr" style="margin: 10px 0px 0px 0px">

              <div class="row" style="margin: 20px 10px 0px 10px">
                <div class="col-md-6">
                  Voucher
                </div>
                <div class="col-md-6">
                  <span style="padding-left:100px">ADD/Input</span>
                </div>
              </div>
              <hr class="hr" style="margin: 10px 0px 0px 0px">

              <div class="row" style="margin: 20px 10px 0px 10px">
                <div class="col-md-6">
                  Delivery fee
                </div>
                <div class="col-md-6">
                  <span style="padding-left:100px">$5.00</span>
                </div>
              </div>
              <hr class="hr" style="margin: 10px 0px 0px 0px">

              <div class="row" style="margin: 20px 10px 0px 10px">
                <div class="col-md-6">
                  Service fee
                </div>
                <div class="col-md-6">
                  <span style="padding-left:100px">$3.69</span>
                </div>
              </div>
              <hr class="hr" style="margin: 10px 0px 0px 0px">

              <div class="card" style="margin:20px; background-color:grey">
                <div class="row" style="margin: 15px 15px 15px 15px">
                  <div class="col-md-6">
                    <b>Total</b>
                  </div>
                  <div class="col-md-6">
                    <span style="padding-left:100px; font-weight:bold;">$439.10</span>
                  </div>
                </div>
              </div>
              <!-- Card end -->
            </div>
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title">Checkout $23.19</h5>
                <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
              </div>
            </div>
          </div>
      </section>
    </div>
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