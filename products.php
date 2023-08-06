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
    <div id="nav-products">

    </div>
    <script>
      $(function() {
        $("#nav-products").load("navbar.php");
      });   
    </script>
    
  </header>
  <!--Main Navigation-->

   <!--Main layout-->
   <main class="mt-5">
      <div class="container">
      <section class="text-center">
      <h3 class="mb-5"><strong>Our Products</strong></h3>
      </section>

      <section class="text-center">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "csad_projek_test";
      $dbname = "seesad";


      $conn = new mysqli($servername,$username,$password,$dbname);

      if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT image_link,product_name,product_desc,product_price FROM products";
      $result = $conn->query($sql);
      echo '<div class="row">';
      if($result->num_rows > 0){
        for($i = 0; $i < mysqli_num_rows($result); $i++){
          $row = mysqli_fetch_assoc($result);
          echo '<div class="col-lg-4 col-md-12 mb-4">';
          echo '<div class="card">';
          echo '<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">';
          echo '<img src= "' . $row['image_link'] . '"class = "img-fluid"/>';
          echo '<a href="#!">';
          echo '<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>';
          echo '</a>';
          echo '</div>';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $row['product_name']. '</h5>';
          echo '<p class="card-text">';
          echo $row['product_desc'];
          echo '</p>';
          echo '<p class="card-text">';
          echo $row['product_price'];
          echo '</p>';
          echo '<a href="#!" class="btn btn-primary">Button</a>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      }else{
        echo "No results found";
      }
      echo '</div>';
      mysqli_close($conn);  

      ?>
      </section>
      </div>  
    </main>
    <!--Main layout-->
    <div id = "footer-products">

    </div>
    <script>
      $(function() {
        $("#footer-products").load("footer.php");
      });   
    </script>

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/script.js"></script>
</body>

</html>