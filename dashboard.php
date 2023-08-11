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
if ($_COOKIE['id'] != "1") {
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
        foreach ($result as $row) {
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
            echo "<td><button type='button' class='btn btn-primary' data-mdb-toggle='modal' data-mdb-target='#" . "edit_user_" . $row['id'] . "'>Edit</button></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <style>
        .user_input {
            padding-top: 4px;
            padding-bottom: 4px;
            padding-left: 7px;
            padding-right: 7px;
            background-color: #e0e0e0;
            border-radius: 5px;
        }
    </style>
    <?php
    $sql = "SELECT * FROM users";
    $result = $db->query($sql);
    foreach ($result as $row) {
        echo "<div class='modal fade' id='edit_user_" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='"
            . "edit_user_" . $row['id'] . "' aria-hidden='true'>";
        echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='" . "edit" . $row['id'] . "Title" . "'>Edit User ID: " . $row['id'] . "</h5>";
        echo "<button type='button' class='btn-close' data-mdb-dismiss='modal' aria-label='Close'>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "User ID: <div id='user_user_id' class='user_input'>" . $row['id'] . "</div>";
        echo "Name: <div id='user_name' class='user_input' contenteditable='true'>" . $row['name'] . "</div>";
        echo "Username: <div id='user_username' class='user_input' contenteditable='true'>" . $row['username'] . "</div>";
        echo "Email: <div id='user_email' class='user_input' contenteditable='true'>" . $row['email'] . "</div>";
        echo "Password: <div id='user_password' class='user_input' contenteditable='true'>" . $row['password'] . "</div>";
        echo "Address: <div id='user_address' class='user_input' contenteditable='true'>" . $row['address'] . "</div>";
        echo "Phone: <div id='user_phone' class='user_input' contenteditable='true'>" . $row['phone'] . "</div>";
        echo "Profile Picture Path: <div id='user_img_path' class='user_input' contenteditable='true'>" . $row['img_filepath'] . "</div>"; //I'm questioning myself
        echo "Time Created: <div id='user_created_at' class='user_input' contenteditable='true'>" . $row['created_at'] . "</div>";

        //content here
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-primary' onclick='saveUserChanges();'>Save changes</button>";
        echo "<button type='button' class='btn btn-danger' onclick='deleteUser();'>Delete Account</button>";
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
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['discount'] . "</td>";
            echo "<td>" . $row['discount_code'] . "</td>";
            echo "<td>" . $row['used_code'] . "</td>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td><button type='button' class='btn btn-primary' data-mdb-toggle='modal' data-mdb-target='#" . "edit_code_" . $row['id'] . "'>Edit</button></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    $sql = "SELECT * FROM reward_codes";
    $result = $db->query($sql);
    foreach ($result as $row) {
        echo "<div class='modal fade' id='edit_code_" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='"
            . "edit_code_" . $row['id'] . "' aria-hidden='true'>";
        echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='" . "edit_code_" . $row['id'] . "Title" . "'>Reward code: " . $row['id'] . "</h5>";
        echo "<button type='button' class='btn-close' data-mdb-dismiss='modal' aria-label='Close'>";
        echo "</button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        //content here
        echo "User ID: <div id='reward_user_id' class='user_input' contenteditable='true'>" . $row['user_id'] . "</div>";
        echo "Code ID: <div id='reward_id' class='user_input'>" . $row['id'] . "</div>";
        echo "Discount %: <div id='reward_discount' class='user_input' contenteditable='true'>" . $row['discount'] . "</div>";
        echo "Discount Code: <div id='reward_code' class='user_input' contenteditable='true'>" . $row['discount_code'] . "</div>";
        echo "Used: <div id='reward_used_code' class='user_input' contenteditable='true'>" . $row['used_code'] . "</div>";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-primary' onclick='saveRewardChanges();'>Save changes</button>";
        echo "<button type='button' class='btn btn-danger' onclick='deleteReward();'>Delete Reward Code</button>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        //echo "<script>$(document).ready(function() { $('#edit" . $row['id'] . "').modal('show');});</script>";
    }
    ?>
    <script>
        function saveUserChanges() {
            var xmlhttp = new XMLHttpRequest();
            var str = "mode=save_user_changes";
            let user_id = "&user_id=" + document.getElementById("user_user_id").innerText;
            let name = "&name=" + document.getElementById("user_name").innerText;
            let username = "&username=" + document.getElementById("user_username").innerText;
            let email = "&email=" + document.getElementById("user_email").innerText;
            let password = "&password=" + document.getElementById("user_password").innerText;
            let address = "&address=" + document.getElementById("user_address").innerText;
            let phone =  "&phone=" + document.getElementById("user_phone").innerText;
            let img_path = "&img_path=" + document.getElementById("user_img_path").innerText;
            let created_at = "&created_at=" + document.getElementById("user_created_at").innerText;
            str = str + user_id + name + username + email + password + address + phone + img_path + created_at;
            xmlhttp.open('POST', "admin.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                }
            };
            xmlhttp.send(str);
        }
        function deleteUser() {
            var xmlhttp = new XMLHttpRequest();
            var str = "mode=delete_user";
            var user_id = "&user_id=" + document.getElementById("user_user_id").innerText;
            str = str + user_id;
            xmlhttp.open('POST', "admin.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                }
            };
            xmlhttp.send(str);
        }

        function saveRewardChanges() {
            var xmlhttp = new XMLHttpRequest();
            var str = "mode=save_reward_changes";
            let id = "&id=" + document.getElementById("reward_id").innerText;
            let user_id = "&user_id=" + document.getElementById("reward_user_id").innerText;
            let discount = "&discount=" + document.getElementById("reward_discount").innerText;
            let discount_code = "&discount_code=" + document.getElementById("reward_code").innerText;
            let used_code = "&used_code=" + document.getElementById("reward_used_code").innerText;
            str = str + id + user_id + discount + discount_code + used_code;
            xmlhttp.open('POST', "admin.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                }
            };
            xmlhttp.send(str);
        }
        function deleteReward() {
            var xmlhttp = new XMLHttpRequest();
            var str = "mode=delete_reward";
            var id = "&id=" + document.getElementById("reward_id").innerText;
            str = str + id;
            xmlhttp.open('POST', "admin.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                }
            };
            xmlhttp.send(str);
        }
    </script>

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