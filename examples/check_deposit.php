<?php
// Include the Revelon.php File
include_once "../src/Revelon.php";

// Define Your Api Key
$apiKey = "Your_Api_Key";

// Create a new API instance with your api Key
$revelon = new Revelon($apiKey);

// Define The Parameters
$coin = "COIN_CODE"; // Replace with your desired coin code (Eg ETH, BNB)
$address = "Wallet_Address"; // Replace with the target address to check

// Check Deposit
$depositStatus = $revelon->check_deposit($coin, $address);

// Display the Result
if (isset($depositStatus['amount'])) {
    echo 'Amount Deposited  for ' . $coin . ' to ' . $address . ': ' . $depositStatus['amount'] . '<br>';
    // You may also display other details like confirmations, amount, etc.
} else if($depositStatus === "No Deposit Found") {
    echo 'No Deposit Received';
    
} else {
    echo 'An Error Occurred. Check Your Error Log For Details';
}
?>
