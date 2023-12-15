<?php
// Include the Revelon.php File
include_once "../src/Revelon.php";

// Define Your Api Key
$apiKey = "Your_Api_Key";

// Create a new API instance with your api Key
$revelon = new Revelon($apiKey);

// Define The Parameters
$coin = "COIN_CODE"; // Replace with your desired coin code

// Get Account Balance
$balance = $revelon->balance($coin);

// Display the Result
if (isset($balance['balance'])) {
    echo 'Balance for ' . $coin . ': ' . $balance['balance'] . '<br>';
} else {
    echo 'An Error Occurred. Check Your Error Log For Details';
}
?>
