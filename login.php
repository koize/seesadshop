<?php
ob_start();
session_start();
?>
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
    <script src="validateRegistration.js"></script>




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
        <!-- Navbar -->

        <!--Section: Content-->
        <div class="bg-image" style="max-width: 120rem; z-index: 20; position:relative">
            <img src="img/account_bg.jpg" class="w-100" alt="Image" style="height: 700px; object-fit: cover;">
            <div class="card mx-auto my-5" style="width: 500px; display: inline-block; z-index: 2000; position:absolute; top: 20px; right: 250px; bottom:20px">
                <div class="card-body">
                    <h5 class="card-title">Welcome to Seesad!</h5>
                    <p class="card-text">Create an account or login</p>
                    <!-- Pills navs -->
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                        </li>
                    </ul>
                    <!-- Pills navs -->

                    <!-- Pills content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="needs-validation" novalidate>

                                <!-- Email input -->
                                <div class="form-outline mb-5">
                                    <input type="email" id="loginName" class="form-control" name="email" required />
                                    <label class="form-label" for="loginName">Email</label>
                                    <div class="invalid-feedback">Please enter your email</div>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-5">
                                    <input type="password" id="loginPassword" class="form-control" name="password" required />
                                    <label class="form-label" for="loginPassword">Password</label>
                                    <div class="invalid-feedback">Please enter your password</div>
                                </div>

                                <!-- 2 column grid layout -->
                                <div class="row mb-4">
                                    <div class="col-md-6 d-flex justify-content-center">

                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                            </form>
                        </div>
                        <script src="validateRegistration.js"></script>
                        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                            <form action="account.php" method="post" class="needs-validation" novalidate >
                                <!-- Name input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="registerName" class="form-control" name="name" required />
                                    <label class="form-label" for="registerName">Name</label>
                                    <div class="invalid-feedback">Please enter your name</div>
                                </div>

                                <!-- Username input -->
                                <div class="input-group form-outline mb-4">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" id="registerUsername" class="form-control" name="username" required />
                                    <label class="form-label" for="registerUsername">Username</label>
                                    <div class="invalid-feedback">Please enter a username</div>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="registerEmail" class="form-control" name="email" required />
                                    <label class="form-label" for="registerEmail">Email</label>
                                    <div class="invalid-feedback">Please enter a valid email</div>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="registerPassword" class="form-control" name="password" required />
                                    <label class="form-label" for="registerPassword">Password</label>
                                    <div class="invalid-feedback">Please enter a password</div>
                                </div>

                                <!-- Repeat Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="registerRepeatPassword" class="form-control" required />
                                    <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                                    <div class="invalid-feedback">Password does not match!</div>
                                </div>



                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>

                            </form>
                        </div>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $db = new PDO('mysql:host=localhost;dbname=seesad', 'root', '');
                            $query = $db->query('SELECT id, password FROM users WHERE email = "' . $_POST['email'] . '"');
                            $result = $query->fetchAll();

                            //set cookie session and local variables
                            foreach ($result as $index => $user) {
                                $serverPassword = $user['password'];
                                $cookie_value = $user['id'];
                            }

                            if ($serverPassword != $_POST['password'] || $query->rowCount() == 0) {
                                echo '<div class="alert alert-danger">Wrong email or password</div>';
                            } else {
                                $cookie_name = "id";
                                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                                header("Location: account.php");
                                exit;
                            }
                        }


                        ?>

                        <script src="validateRegistration.js"></script>

                    </div>
                    <!-- Pills content -->
                </div>
            </div>
        </div>

        <!--Section: Content-->

        </div>


        </div>
        </div>

        </main>
        <!--Main layout-->
        <div id="footer-home">

        </div>
        <script>
            $(function() {
                $("#footer-home").load("footer.php");
            });
        </script>

        <!-- MDB -->
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <!-- Custom scripts -->
        <script type="text/javascript" src="js/script.js"></script>
</body>

</html>