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
              <a class="nav-link" href="game.php">Rewards</a>
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