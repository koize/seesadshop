<?php
if($_COOKIE['id'] != "99999999") {
    echo "You are not an admin.";
    exit();
}

$db = new PDO("mysql:host=localhost;dbname=seesad", "root", "");
$query = $db->query('CREATE DATABASE IF NOT EXISTS seesad');


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['mode'] == "save_user_changes") {
        saveUserChanges();
    } else if($_POST['mode'] == "delete_user") {
        deleteUser();
    } else if($_POST['mode'] == "save_reward_changes") {
        saveRewardChanges();
    } else if($_POST['mode'] == "delete_reward") {
        deleteReward();
    } 
}

function saveUserChanges() {
    global $db;
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $user_name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $img_path = $_POST['img_path'];
    $created_at = $_POST['created_at'];
    $db->query('UPDATE users SET name = "' . $name . '", username = "' . $user_name . '", email = "' . $email . '", password = "' . $password . '", address = "' . $address . '", phone = "' . $phone . '", img_filepath = "' . $img_path . '", created_at = "' . $created_at . '" WHERE id = "' . $user_id . '"');
    echo "Successfully updated user!";
}

function deleteUser() {
    global $db;
    $user_id = $_POST['user_id'];
    $db->query('DELETE FROM users WHERE id = "' . $user_id . '"');
    echo "Successfully deleted user!";
}

function saveRewardChanges() {
    global $db;
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $discount = $_POST['discount'];
    $discount_code = $_POST['discount_code'];
    $used_code = $_POST['used_code'];
    $db->query('UPDATE reward_codes SET user_id = "' . $user_id . '", discount = "' . $discount . '", discount_code = "' . $discount_code . '", used_code = "' . $used_code . '" WHERE id = "' . $id . '"');
    echo "Successfully updated reward!";
}

function deleteReward() {
    global $db;
    $id = $_POST['id'];
    $db->query('DELETE FROM reward_codes WHERE id = "' . $id . '"');
    echo "Successfully deleted reward!";
}

?>