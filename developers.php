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
  <main class="mt-1 mb-5">

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: #2980B9">
            Meet our
            <span style="color: #6DD5FA">overworked and underpaid</span>
            <span style="color: #2980B9"> developers</span>
          </h1>

        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">

        
        </div>
      </div>

      <div class="card py-1 px-5 mb-5" id="gab">
        <h6 class="my-5 display-6 fw-bold ls-tight" style="color: #6DD5FA">
          Gabriel
          <span style="color: #2980B9">(hackerman that abandoned us 2 days before submission)</span>
        </h6>
        <div class="col">
        <div class="row">
        <div class="col-md-6 gx-5 mb-4">
          <img src="portfolio-img/dru.jpg" class="img-fluid" alt="..." width="50%" height="50%" />
        </div>
        <div class="col-md-6 gx-6 mb-4">
          <p class="lead fw-normal text-muted mb-5 mr-5">
            <span style="color: #2980B9">"went to habourfront while we are here losing braincells"</span>
          </p>
        </div>
        </div>
        </div>
       

      </div>

      <div class="card py-1 px-5 mb-5" id="dru">
        <h6 class="my-5 display-6 fw-bold ls-tight" style="color: #6DD5FA">
          Gabriel
          <span style="color: #2980B9">(hackerman that abandoned us 2 days before submission)</span>
        </h6>
        <div class="col">
        <div class="row">
        <div class="col-md-6 gx-5 mb-4">
          <img src="portfolio-img/dru.jpg" class="img-fluid" alt="..." width="50%" height="50%" />
        </div>
        <div class="col-md-6 gx-6 mb-4">
          <p class="lead fw-normal text-muted mb-5 mr-5">
            <span style="color: #2980B9">"went to habourfront while we are here losing braincells"</span>
          </p>
        </div>
        </div>
        </div>
       

      </div>

      <div class="card py-1 px-5 mb-5" id="j">
        <h6 class="my-5 display-6 fw-bold ls-tight" style="color: #6DD5FA">
          Gabriel
          <span style="color: #2980B9">(hackerman that abandoned us 2 days before submission)</span>
        </h6>
        <div class="col">
        <div class="row">
        <div class="col-md-6 gx-5 mb-4">
          <img src="img/hj1.jpg" class="img-fluid" alt="..." width="50%" height="50%" />
        </div>
        <div class="col-md-6 gx-6 mb-4">
          <p class="lead fw-normal text-muted mb-5 mr-5">
            <span style="color: #2980B9">"went to habourfront while we are here losing braincells"</span>
          </p>
        </div>
        </div>
        </div>
       

      </div>

      <div class="card py-1 px-5 mb-5" id="xav">
        <h6 class="my-5 display-6 fw-bold ls-tight" style="color: #6DD5FA">
          Gabriel
          <span style="color: #2980B9">(hackerman that abandoned us 2 days before submission)</span>
        </h6>
        <div class="col">
        <div class="row">
        <div class="col-md-6 gx-5 mb-4">
          <img src="img/hj1.jpg" class="img-fluid" alt="..." width="50%" height="50%" />
        </div>
        <div class="col-md-6 gx-6 mb-4">
          <p class="lead fw-normal text-muted mb-5 mr-5">
            <span style="color: #2980B9">"went to habourfront while we are here losing braincells"</span>
          </p>
        </div>
        </div>
        </div>
       

      </div>
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