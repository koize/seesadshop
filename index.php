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
      <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block bg-dark" style="z-index: 3000;" height="110%">
        <div class="container-fluid">
          <!-- Navbar brand -->
          <a class="navbar-brand nav-link" target="_blank" href="https://mdbootstrap.com/docs/standard/">
          <img src="img/cyoher.jpg" class="rounded-circle" alt="a" width= "30" height= "30">
          </a>
          <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarExample01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="#intro">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow"
                  target="_blank">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://mdbootstrap.com/docs/standard/" target="_blank">Support</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://mdbootstrap.com/docs/standard/" target="_blank">Gabriel's game</a>
              </li>
            </ul>

            <ul class="navbar-nav d-flex flex-row">
              <!-- Icons -->
          
             
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

// Fetch the promotions
$query = $db->query('SELECT * FROM promotions');
$promotions = $query->fetchAll();

// Generate the HTML code for the carousel
/*echo '<div class="carousel slide" id="promotions">';
echo '<ol class="carousel-indicators">';
foreach ($promotions as $index => $promotion) {
  echo '<li data-target="#promotions" data-slide-to="' . $index . '" class="active"></li>';
}
echo '</ol>';
echo '<div class="carousel-inner">';
foreach ($promotions as $index => $promotion) {
  echo '<div class="item active">';
    echo '<img src="' . $promotion['image'] . '" alt="' . $promotion['name'] . '">';
  echo '<div class="carousel-caption">';
  echo '<h3>' . $promotion['title'] . '</h3>';
  echo '<p>' . $promotion['start_date'] . ' - ' . $promotion['end_date'] . '</p>';
  echo '</div>';
  echo '</div>';
}
echo '</div>';
echo '<a class="left carousel-control" href="#promotions" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>';
echo '<a class="right carousel-control" href="#promotions" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>';
echo '</div>'; */

//<!--mdbootstrap carousel -->

echo '<!-- Carousel wrapper -->
<div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">';
  foreach ($promotions as $index => $promotion) {
    echo '
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="$index"
      class="active"
      aria-current="true"
      aria-label="Slide '.($index + 1).'"
    ></button> ';
  }
    echo '
  </div>
  
  <!-- Inner -->
  <div class="carousel-inner">';
  foreach ($promotions as $index => $promotion) {
    echo '  <!-- Single item -->
    <div class="carousel-item active">
      <img src="img/carousel1.jpg" class="d-block w-100" alt="Sunset Over the City"/>
      <div class="carousel-caption d-none d-md-block">
        <h3>New product: '.$promotion['name'].'</h3>
        <p>'.$promotion['details'].'</p>
        <p>'.'Sale price: $'.$promotion['sale_price'].'</p>
        <p>'.'Ends on: '.$promotion['end_date'].'</p>
      </div>
    </div>';
  }
  echo '
  <!-- Inner -->

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->';

?>
     <!--end carousel -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-5">
      <div class="container">
        <!--Section: Content-->
        <section class="text-center">
          <h4 class="mb-5"><strong>Products of the month</strong></h4>

          <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card text-body bg-info mb-3">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <img
                    src="img/ph1.jpg"
                    class="card-img-top"
                  />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">best seller: race war</h5>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the
                    card's content.
                  </p>
                  <a href="#!" class="btn btn-primary">Button</a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <img
                    src="img/hj2.jpg"
                    class="card-img-top"
                  />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">my reaction</h5>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the
                    card's content.
                  </p>
                  <a href="#!" class="btn btn-primary">Button</a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card text-white bg-dark mb-3">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <img
                    src="img/ph3.jpg"
                    class="card-img-top"
                  />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">amogus</h5>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the
                    card's content.
                  </p>
                  <a href="#!" class="btn btn-primary">Button</a>
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
                <img src="img/ph5.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
            </div>

            <div class="col-md-6 gx-5 mb-4">
              <h4><strong>About us</strong></h4>
              <p class="text-muted">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur
                eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum
                sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.
              </p>
              <p><strong>Why choose us?</strong></p>
              <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod itaque voluptate
                nesciunt laborum incidunt. Officia, quam consectetur. Earum eligendi aliquam illum
                alias, unde optio accusantium soluta, iusto molestiae adipisci et?
              </p>
            </div>
          </div>
        </section>
        <!--Section: Content-->

        <hr class="my-5" />

        <!--Section: Content-->
        <section class="mb-5">
          <h4 class="mb-5 text-center"><strong>Sign up now!</strong></h4>

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
                  <input
                    class="form-check-input me-2"
                    type="checkbox"
                    value=""
                    id="form2Example3"
                    checked
                  />
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
        <div class="row d-flex justify-content-center align-items-center h-100" style="max-width: 100%;">
    <div class="col">
      <div class="row align-items-center justify-content-around">
        <div class="col-lg-6 px-5 align-text-center">
          
          <h1>Where are we?</h1>
          <br>
            <h4>
              <i class="fa-regular fa-map"></i>
              <span class="m-1"></span>
              535 Clementi Rd, Singapore 599489
            </h4>

            <h4>
              <i class="fa-regular fa-envelope"></i>
              <span class="m-1"></span>
              hananoyado@gmail.com
            </h4>

            <h4>
              <i class="fa-solid fa-phone"></i>
              <span class="m-1"></span>
              +65 8123 0192
            </h4>

            <h4>
              <i class="fa-regular fa-clock"></i>
              <span class="m-1"></span>
              Mondays to Saturdays, 9AM to 5PM
            </h4>
        </div>

        <br>

        <div class="col text-align-center">
          <div class="m-5">
            <div class="iframe-rwd">
              <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3708.281749908684!2d103.77215791453851!3d1.332103599028431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da107d8eb4e359%3A0x75d2e7ffdeeb0c43!2sNgee%20Ann%20Polytechnic!5e1!3m2!1sen!2sus!4v1675999527895!5m2!1sen!2sus"></iframe><br />
              <small>
                <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3708.281749908684!2d103.77215791453851!3d1.332103599028431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da107d8eb4e359%3A0x75d2e7ffdeeb0c43!2sNgee%20Ann%20Polytechnic!5e1!3m2!1sen!2sus!4v1675999527895!5m2!1sen!2sus"
                  style="color:#0000FF;text-align:left">View Larger Map</a>
              </small>
            </div>
          </div>
        </div>

      </div>
    </div>
    </section>
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
          Hana No Yado also known as The Flowering Inn is an e-commerce shop that provides flower
          bouquets for special occasions and gardening essentials to make gardening more enjoyable.
          The store aims to conveniently deliver spring to your doorstep and provide a helping
          hand to your gardening journey.
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
          <h5 class="text-uppercase mb-0">Quick shortcuts</h5>

          <ul class="list-unstyled">
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
              <a href="#!" class="text-white">About us</a>
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
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>
  
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

