<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

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
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-5">
            <!--Section: Content-->
            <section class="text-center">
                <!-- iframe that capures keyboard inputs when clicked on -->
                <iframe id="game_iframe" width="1000" height="800" src="./rewards/game.php"></iframe>
                <div>
                    <button id="claim_reward" class="btn btn-primary" onclick="getRewardCode()">claim rewards!</button>
                </div>
                <span id="reward_code"></span>
            </section>
            <script>
                function getRewardCode() {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            let response = "<br/><h5>Your unique code is: " + this.responseText
                                            + "</h5><br>Copy this code and use it when purchasing to receive your 5% discount!";
                            document.getElementById("reward_code").innerHTML = response;
                        }
                    };
                    const value = `; ${document.cookie}`;
                    //get cookie of name "hscore"
                    const parts = value.split(`; hscore=`);
                    xmlhttp.open("GET", "./rewards/getRewardCode.php?s=" + parts.toString(), true);
                    xmlhttp.send();
                }
            </script>
            <br/>
            <!--Section: Content-->
        </div>
    </main>
    <!--Main layout-->
    <div id="footer-about">

    </div>
    <script>
      $(function() {
        $("#footer-about").load("footer.php");
      });   
    </script>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>