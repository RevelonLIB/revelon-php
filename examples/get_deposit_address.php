<?php
// Include the Revelon.php File
include_once "../src/Revelon.php";

// Define Your Api Key
$apiKey = "Your_Api_Key";

// Create a new API instance with your api Key
$revelon = new Revelon($apiKey);

// Define The Parameters
$coin = "COIN_CODE"; // Replace with your desired coin code

// Get Deposit Address
$depositAddress = $revelon->getDepositAddress($coin);

// Display the Result
if (isset($depositAddress['address'])) {
    echo 'Deposit Address for ' . $coin . ': ' . $depositAddress['address'] . '<br>';
    
} else {
    echo 'An Error Occurred. Check Your Error Log For Details';
}
?>
