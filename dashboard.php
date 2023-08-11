<!DOCTYPE html>
<html lang="en">
<?php
session_start();
// Check if the user is logged in
if (!isset($_COOKIE['id'])) {
    header("Location: login.php");
    exit();
}

// Check if the user is an admin
if ($_COOKIE['id'] != "99999999") {
    echo "You are not an admin.";
    exit();
}

?>

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
    <style>
        * {
            text-align: center;
        }
    </style>
    </header>
    <div>
        <?php
        $db = new PDO('mysql:host=localhost;dbname=seesad', 'root', '');
        ?>
    </div>
    <!-- Navbar -->
    <div id="nav-products">
    </div>
        <h3>Users</h3>
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>username</th>
                <th>email</th>
                <th>password</th>
                <th>address</th>
                <th>phone</th>
                <th>image path</th>
                <th>created at</th>
                <th>action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM users";
            $result = $db->query($sql);
            foreach($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['img_filepath'] . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "<td><button type='button' class='btn btn-primary' data-mdb-toggle='modal' data-mdb-target='#"."edit_user_" . $row['id']."'>Edit</button></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <?php
            $sql = "SELECT * FROM users";
            $result = $db->query($sql);
            foreach($result as $row) {
                echo "<div class='modal fade' id='edit_user_" . $row['id']. "' tabindex='-1' role='dialog' aria-labelledby='"
                        ."edit_user_". $row['id']. "' aria-hidden='true'>";
                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                        echo "<div class='modal-content'>";
                            echo "<div class='modal-header'>";
                                echo "<h5 class='modal-title' id='". "edit". $row['id']. "Title"."'>Edit User ID: ".$row['id']."</h5>";
                                echo "<button type='button' class='btn-close' data-mdb-dismiss='modal' aria-label='Close'>";
                                echo "</button>";
                            echo "</div>";
                        echo "<div class='modal-body'>";
                    //content here
                        echo "</div>";
                            echo "<div class='modal-footer'>";
                                echo "<button type='button' class='btn btn-primary'>Save changes</button>";
                                echo "<button type='button' class='btn btn-danger'>Delete Account</button>";
                            echo "</div>";
                        echo "</div>";
                echo "</div>";
                echo "</div>";
            //echo "<script>$(document).ready(function() { $('#edit" . $row['id'] . "').modal('show');});</script>";
            }
        ?>
        <h3>reward codes</h3>
        <table class="table table-striped">
            <tr>
                <th>discount</th>
                <th>discount code</th>
                <th>used code</th>
                <th>user id</th>
                <th>action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM reward_codes";
            $result = $db->query($sql);
            foreach($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['discount'] . "</td>";
                echo "<td>" . $row['discount_code'] . "</td>";
                echo "<td>" . $row['used_code'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td><button type='button' class='btn btn-primary' data-mdb-toggle='modal' data-mdb-target='#"."edit_code_" . $row['id']."'>Edit</button></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <?php
            $sql = "SELECT * FROM reward_codes";
            $result = $db->query($sql);
            foreach($result as $row) {
                echo "<div class='modal fade' id='edit_code_" . $row['id']. "' tabindex='-1' role='dialog' aria-labelledby='"
                        ."edit_code_". $row['id']. "' aria-hidden='true'>";
                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                        echo "<div class='modal-content'>";
                            echo "<div class='modal-header'>";
                                echo "<h5 class='modal-title' id='". "edit_code_". $row['id']. "Title"."'>Reward code: ".$row['id']."</h5>";
                                echo "<button type='button' class='btn-close' data-mdb-dismiss='modal' aria-label='Close'>";
                                echo "</button>";
                            echo "</div>";
                        echo "<div class='modal-body'>";
                    //content here
                        echo "</div>";
                            echo "<div class='modal-footer'>";
                                echo "<button type='button' class='btn btn-primary'>Save changes</button>";
                                echo "<button type='button' class='btn btn-danger'>Delete Account</button>";
                            echo "</div>";
                        echo "</div>";
                echo "</div>";
                echo "</div>";
            //echo "<script>$(document).ready(function() { $('#edit" . $row['id'] . "').modal('show');});</script>";
            }
        ?>

    <script>
        $(function() {
            $("#nav-products").load("navbar.php");
        });
    </script>
    <!-- Navbar -->
    <div id="footer-about">
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