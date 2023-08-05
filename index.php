<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>seeee saaad shop</title>
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
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block bg-info bg-gradient" style="z-index: 2000; --mdb-bg-opacity: 0.8;" height="150%">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" href="index.php">
          <img src="img/logo.png" alt="a" width="200" height="55">
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="game.php">Rewards</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://mdbootstrap.com/docs/standard/">Support</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About us</a>
            </li>
          </ul>

          <ul class="navbar-nav d-flex flex-row">
            <!-- Icons -->
            <li class="nav-item me-3 me-lg-0">
              <form class="d-flex input-group w-auto">
                <input type="search" class="form-control rounded" placeholder="Search all products" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                  <i class="fas fa-search"></i>
                </span>
              </form>
            </li>

            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://twitter.com/MDBootstrap" rel="nofollow" target="_blank">
                <i class="fas fa-cart-arrow-down"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://github.com/mdbootstrap/mdb-ui-kit" rel="nofollow" target="_blank">
                <i class="fas fa-user"></i>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
    <!-- carousel -->
    <?php

    // Connect to the MySQL database
    $db = new PDO('mysql:host=localhost;dbname=seesad', 'root', '');

    $query = $db->query('CREATE DATABASE IF NOT EXISTS seesad');
    $query = $db->query('CREATE TABLE IF NOT EXISTS promotions (
      id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      original_price INT NOT NULL,
      sale_price INT NOT NULL,
      start_date DATE NOT NULL,
      end_date DATE NOT NULL,
      details TEXT NOT NULL,
      img_filepath VARCHAR(255) NOT NULL
    )');

    //sample carousel data
    $query = $db->query('INSERT IGNORE INTO promotions (id, name, original_price, sale_price, start_date, end_date, details, img_filepath) VALUES ("1", "Biore UV Aqua Rich Aqua Protect Mist SPF50 PA++++", "16", "16", "0000-00-00", "2023-10-10", "Biore\'s unique Aqua Protect Mist Technology", "img/carousel_pmnt1.jpg")');
    $query = $db->query('INSERT IGNORE INTO promotions (id, name, original_price, sale_price, start_date, end_date, details, img_filepath) VALUES ("2", "Biore UV Perfect Milk SPF50+ PA++++", "0", "12", "0000-00-00", "2023-10-10", "Lasting powdery smooth finish
    + Smooth Skin Feel", "img/carousel_pmnt2.jpg")');
    $query = $db->query('INSERT IGNORE INTO promotions (id, name, original_price, sale_price, start_date, end_date, details, img_filepath) VALUES ("3", "Biore UV Anti-Pollution Body Care Serum SPF 50+ PA+++ (Intensive Aura)", "16", "9", "0000-00-00", "2023-10-10", "Anti-pollution body lotion with high UV protection", "img/carousel_pmnt3.jpg")');



    // Fetch the promotions
    $query = $db->query('SELECT * FROM promotions');
    $promotions = $query->fetchAll();

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
      if ($promotion['name'] == '') {
        echo '
      <div class="carousel-item active">
      <img src="' . $promotion['img_filepath'] . '" class="d-block w-100" alt="' . $promotion['name'] . '"/>
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.15);">
                        <div class="carousel-caption">
                            <div class="text-white text-center">
                                <h3 class="mb-4">Promotion ends on ' . $promotion['end_date'] . '</h3>
                                <a class="btn btn-outline-light btn-lg m-2" href="https://www.youtube.com/watch?v=c9B4TPnak1A" role="button" rel="nofollow" target="_blank">Start tutorial</a>
                                <a class="btn btn-outline-light btn-lg m-2" href="https://mdbootstrap.com/docs/standard/" target="_blank" role="button">Download MDB UI KIT</a>
                            </div>
                        </div>
                    </div>

    </div>';
      } else {
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
                    <p class="card-text"><small class="text-muted">1 left</small></p>
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
                    <p class="card-text"><small class="text-muted">1 left</small></p>
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
                    <p class="card-text"><small class="text-muted">1 left</small></p>
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
              <img src="img/logo.png" class="img-fluid" />
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
        <h4 class="mb-5 text-center"><strong>Sign up now to start shopping!</strong></h4>

        <div class="row d-flex justify-content-center">
          <div class="col-md-6">
            <form>
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" />
                    <label class="form-label" for="form3Example1">First name</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form3Example2" class="form-control" />
                    <label class="form-label" for="form3Example2">Last name</label>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" checked />
                <label class="form-check-label" for="form2Example3">
                  Subscribe to our newsletter
                </label>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">
                Get goodies!!
              </button>
            </form>
          </div>
        </div>
      </section>
      <!--Section: Content-->


    </div>


    </div>
    </div>

  </main>
  <!--Main layout-->
  <footer class="bg-secondary text-white">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">about seesad</h5>

          <p>
            Seesad is an online shop dedicated to providing high-quality, natural face wash products that are gentle on the skin. We believe that everyone deserves to have clear, healthy skin, and we are committed to providing our customers with the best possible products to help them achieve their skin care goals. For more details, go to our <a href="about.php">About Us</a> page.
          </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">the poor developers</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">hackerman gab</a>
            </li>
            <li>
              <a href="#!" class="text-white">slave 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">slave 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">slave 3</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Quick shortcuts</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">View all products</a>
            </li>
            <li>
              <a href="#!" class="text-white">Free vouchers</a>
            </li>
            <li>
              <a href="#!" class="text-white">Support</a>
            </li>
            <li>
              <a href="about.php" class="text-white">About us</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
      <section class="mb-1">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitch"></i></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
    </div>
    <!-- Section: Social media -->

    <!-- Section: Form -->
    <div class="container">
      <section class="">
        <form action="">
          <!--Grid row-->
          <div class="row d-flex justify-content-center">
            <!--Grid column-->
            <div class="col-auto">
              <p class="pt-2">
                <strong>Sign up for updates!</strong>
              </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-5 col-12">
              <!-- Email input -->
              <div class="form-outline form-light mb-4 ">
                <input type="email" id="newsEmail" class="form-control" style="color: white" />
                <label class="form-label" for="newsEmail" style="color: white">Email address</label>
              </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-auto">
              <!-- Submit button -->
              <button id="news" type="button" class="btn btn-outline-light mb-4">
                Subscribe
              </button>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </form>
      </section>

      <!-- Section: Form -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
  </section>
  <!--Footer-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/script.js"></script>
</body>

</html>