<?php
session_start();
/*
if (!isset($_SESSION['username'])) {
    echo 'You are not logged in! Log in to get rewards while playing!';
    exit();
}
*/
function generateRewardCodes() { //taking in stuff(probs ID/score?)
    $rewardCode = "";
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($i = 0; $i < 20; $i++) {
        $rewardCode .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $rewardCode;
}
echo "<code>" . generateRewardCodes() . "</code>";
exit();
//create connection to SQL database using PDO
$db = new PDO("mysql:host=localhost;dbname=seesad", "root", "");
$query = $db->query('CREATE DATABASE IF NOT EXISTS seesad');
//this thing doesn't work yet, I'll have to mess around with the DB first... 
$query = $dp->query('CREATE TABLE IF NOT EXISTS reward_codes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    )');

?>