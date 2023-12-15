<?php
// Include the Revelon.php File
include_once "../src/Revelon.php";

// Define Your Api Key
$apiKey = "Your_Api_Key";


// Create a new API instance with your api Key
// $revelon = new Revelon("8035NW7XV4CVQLqf13ZVyfPbrbZwagI4A0cI4AjukNblBBIGwOy05Db3UEhpHNqc");
 $revelon = new Revelon($apiKey);
 
// Define The Parameters
$coin = "COIN CODE"; // Replace with your desired coin code (Eg ETH, BNB)
$amount = "AMOUNT"; // Replace with the amount to Send
$to = "Receiver_Wallet_Address"; // Replace with the Receiver Wallet address

 // Create Your Transaction
$payment = $revelon->create_withdrawal($coin, $amount, $to);
 if (isset($payment['txHash'])) {
// Success
    $output = 'Transaction Successfull with hash : ' . $payment['txHash']. '<br>';
    $output .= 'Amount Sent: ' . $payment['amount'] . '<br>';
 } else {
     $output = 'An Error Occured Check Your Error Log For Details';
 }
// Show the output
echo $output;
?>