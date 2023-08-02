<?php

$databaseURL = 'https://ceesad-6798e-default-rtdb.asia-southeast1.firebasedatabase.app';

$database = new Firebase\Database\FirebaseDatabase($databaseURL);

// Get the promotion data from the database.
$promotions = $database->getReference('promotions')->getValue();

// Print the promotion data.
print_r($promotions);

?>