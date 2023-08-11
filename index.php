<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Clear Skin All Day Home</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/style.css" />
  <!-- Material Icons3 -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,400,0,0" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="promotion.js"></script>
    <link rel="icon" href="img/csad_icon.png" type="image/x-icon"/>


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

    


      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #introCarousel {
          margin-top: -58.59px;
        }

        #introCarousel,
        .carousel-inner,
        .carousel-item,
        .carousel-item.active {
          height: 47vh;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>

    <!-- Navbar -->
      <div id = "nav-products">

      </div>
      <script>
        $(function() {
          $("#nav-products").load("navbar.php");
        });
      </script>
    <!-- Navbar -->
    <!-- carousel -->
    
    <?php

    // Connect to the MySQL database
    $db = new PDO('mysql:host=localhost;dbname=seesad', 'root', '');

    $query = $db->query('CREATE DATABASE IF NOT EXISTS seesad');
    $query = $db->query('CREATE TABLE IF NOT EXISTS promotions (
      id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name TEXT NOT NULL,
      original_price INT,
      sale_price INT,
      start_date DATE,
      end_date DATE,
      details TEXT,
      img_filepath TEXT
    )');

    //sample carousel data
    $query = $db->query('INSERT IGNORE INTO promotions (id, name, original_price, sale_price, start_date, end_date, details, img_filepath) VALUES ("1", "Biore UV Aqua Rich Aqua Protect Mist SPF50 PA++++", "16", "16", "0000-00-00", "2023-10-10", "Biore\'s unique Aqua Protect Mist Technology", "img/carousel_pmnt1.jpg")');
    $query = $db->query('INSERT IGNORE INTO promotions (id, name, original_price, sale_price, start_date, end_date, details, img_filepath) VALUES ("2", "Biore UV Perfect Milk SPF50+ PA++++", "0", "12", "0000-00-00", "2023-10-10", "Lasting powdery smooth finish
    + Smooth Skin Feel", "img/carousel_pmnt2.jpg")');
    $query = $db->query('INSERT IGNORE INTO promotions (id, name, original_price, sale_price, start_date, end_date, details, img_filepath) VALUES ("3", "Biore UV Anti-Pollution Body Care Serum SPF 50+ PA+++ (Intensive Aura)", "16", "9", "0000-00-00", "2023-10-10", "Anti-pollution body lotion with high UV protection", "img/carousel_pmnt3.jpg")');


    //add admin acc


    // Fetch the promotions
    $query = $db->query('SELECT * FROM promotions');
    $promotions = $query->fetchAll();
    $active = true;
    // Generate the HTML code for the carousel

    echo '<!-- Carousel wrapper -->
  <div id="carouselBasicExample" class="carousel slide carousel-fade carousel-dark" data-mdb-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">';
    foreach ($promotions as $index => $promotion) {
      echo '
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="' . ($index) . '"
      class="active"
      aria-current="true"
      aria-label="Slide ' . ($index + 1) . '"
    ></button> ';
    }
    echo '
  </div>
  
  <!-- Inner -->
  <div class="carousel-inner">';
    foreach ($promotions as $index => $promotion) {
      
        echo '  <!-- Single item -->
      <div class="carousel-item active">
        <img src="' . $promotion['img_filepath'] . '" class="d-block w-100" alt="' . $promotion['name'] . '"/>
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.2);">
                          <div class="carousel-caption">
                              <div class="text-white text-center">
                               <div class="row">
                                <div class="col">
                                </div>
                                 <div class="col">
                                 <h1 class="mb-4">' . $promotion['name'] . '</h1>
                                 <h2 class="mb-4">Sale price: $' . $promotion['sale_price'] . '</h2>
                                 <p class="mb-4">Promotion ends on ' . $promotion['end_date'] . '</p>
                                 </div>
                                <div class="col">
                                </div>
                              </div>                            
                              </div>
                          </div>
                      </div>
  
      </div>';
      }
    
    ?>
  
    <!-- Inner -->

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="visually-hidden">Next</span>
    </button>
    </div>

    <!-- Carousel wrapper -->


    <!--end carousel -->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="mt-5">
    <div class="container">
      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>Featured products</strong></h4>

        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-body mb-3" style="height:600px">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/featured_pmnt1.jpg" class="card-img-top" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Biore UV Aqua Rich Aqua Protect Mist SPF50 PA++++</h5>
                <p class="card-text">
                  Features Biore's unique Aqua Protect Mist Technology
                </p>
                <div class="row">
                  <div class="col">
                    <p class="card-text"><small class="text-muted">Price: $15.99</small></p>
                  </div>
                
                  <div class="col">
                    <a href="#!" class="btn btn-primary">Shop</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-body mb-3" style="height:600px">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/featured_pmnt1.jpg" class="card-img-top" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Biore UV Aqua Rich Aqua Protect Mist SPF50 PA++++</h5>
                <p class="card-text">
                  Features Biore's unique Aqua Protect Mist Technology
                </p>
                <div class="row">
                  <div class="col">
                    <p class="card-text"><small class="text-muted">Price: $15.99</small></p>
                  </div>
                
                  <div class="col">
                    <a href="#!" class="btn btn-primary">Shop</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-body mb-3" style="height:600px">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="img/featured_pmnt1.jpg" class="card-img-top" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Biore UV Aqua Rich Aqua Protect Mist SPF50 PA++++</h5>
                <p class="card-text">
                  Features Biore's unique Aqua Protect Mist Technology
                </p>
                <div class="row">
                  <div class="col">
                    <p class="card-text"><small class="text-muted">Price: $15.99</small></p>
                  </div>
                  
                  <div class="col">
                    <a href="#!" class="btn btn-primary">Shop</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Content-->


      <hr class="my-5" />

      <!--Section: Content-->
      <section>
        <div class="row">
          <div class="col-md-6 gx-5 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
              <img src="img/csad_logo_korean_big.png" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
          </div>

          <div class="col-md-6 gx-5 mb-4">
            <h4><strong>About us</strong></h4>
            <p class="text-muted">
              Seesad is an online shop dedicated to providing high-quality, natural face wash products that are gentle on the skin. We believe that everyone deserves to have clear, healthy skin, and we are committed to providing our customers with the best possible products to help them achieve their skin care goals.
            </p>
            <p><strong>Why choose us?</strong></p>
            <p class="text-muted">
              We offer a variety of different face wash products to suit different skin types.

              In addition to our high-quality products, we also offer excellent customer service. We are always available to answer your questions and help you find the right product for your skin.

              We believe that Seesad is the best place to buy face wash online. We offer a wide variety of products, excellent customer service, and competitive prices.

              Thank you for choosing Seesad!
            </p>
            <p><strong>For more details, go to our <a href="about.php">About Us</a> page.</strong></p>
          </div>
        </div>
      </section>
      <!--Section: Content-->

      <hr class="my-5" />

      <!--Section: Content-->
      <section class="mb-5">
        <h4 class="mb-5 text-center"><strong>A short introduction to the Seesad online store</strong></h4>

        <div class="row d-flex justify-content-center">
          <div class="col-md-6">
            <div class="ratio ratio-16x9">
              <iframe src="https://www.youtube.com/embed/NPeL2FGY3n0" title="YouTube video" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Content-->


    </div>


    </div>
    </div>

  </main>
  <!--Main layout-->
    <div id = "footer-home">

    </div>
    <script> 
      $(function(){
        $("#footer-home").load("footer.php"); 
      });
    </script>

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>