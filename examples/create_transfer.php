<?php
// Include the Revelon.php File
include_once "../src/Revelon.php";

// Define Your Api Key
$apiKey = "Your_Api_Key";

// Create a new API instance with your api Key
$revelon = new Revelon($apiKey);

// Define The Parameters
$coin = "COIN CODE"; // Replace with your desired coin code (Eg ETH, BNB)
$amount = "AMOUNT"; // Replace with the amount to transfer
$to = "Target_Address"; // Replace with the target address (Email Or Username of the Receiver Depending on the "identifier")
$identifier = "email"; // Replace with an optional identifier (username or email)

// Create Transfer
$transferResult = $revelon->create_transfer($coin, $amount, $to, $identifier);

// Display the Result
if (isset($transferResult['txHash'])) {
    echo 'Transfer Successfull with hash : ' . $transferResult['txHash'] . '<br>';
    echo 'Amount Transferred: ' . $transferResult['amount'] . '<br>';
    // You may also display other details like fee, timestamp, etc.
} else {
    echo 'An Error Occurred. Check Your Error Log For Details';
}
?>
