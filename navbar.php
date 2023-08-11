<!-- Navbar -->
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
<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/script.js"></script>


<nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block bg-info bg-gradient" style="z-index: 2000; --mdb-bg-opacity: 0.8;" height="150%">
  <div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand nav-link" href="index.php">
      <img src="img/logo.png" alt="a" width="200" height="55" class="img-fluid rounded-pill">
    </a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarExample01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item" href="#">Kao (Biore)</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Gatsby</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Others</a>
            </li>
            <li>
              <a class="dropdown-item" href="products.php">All products</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="rewards.php">Rewards</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supportPage.php">Support</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About us</a>
        </li>
      </ul>

      <ul class="navbar-nav d-flex flex-row">
        <!-- Icons -->
        <li class="nav-item me-3 me-lg-0">
          <form class="d-flex input-group w-auto" action="search.php" method="get">
            <input type="search" class="form-control rounded" placeholder="Search all products" aria-label="Search" aria-describedby="search-addon" name="search_products" />
            <span class="input-group-text border-0" id="search-addon">
              <i class="fas fa-search"></i>
            </span>
          </form>
        </li>

        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="cart.php" rel="nofollow">
            <i class="fas fa-cart-arrow-down"></i>
          </a>
        </li>
        <?php
        $db = new PDO('mysql:host=localhost;dbname=seesad', 'root', '');

        if (isset($_COOKIE['id'])) {
          $query = $db->query('SELECT id, name, username, email FROM users WHERE id = "' . $_COOKIE['id'] . '"');
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
          echo '<li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="account.php">
              <i class="fas fa-user"></i>
            </a>
            </li>
            ';
        }
        else {
          echo '<li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="login.php">
              <i class="fas fa-user"></i>
            </a>
            </li>
            ';
        }

        ?>
        

      </ul>
    </div>
  </div>
</nav>
<!-- Navbar -->