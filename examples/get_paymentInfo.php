<?php
// Include the Revelon.php File
include_once "../src/Revelon.php";

// Define Your Api Key
$apiKey = "Your_Api_Key";

// Create a new API instance with your api Key
$revelon = new Revelon($apiKey);

// Define The Parameters
$invoiceId = "INVOICE_ID"; // Replace with the actual invoice ID you want to retrieve payment information for

// Get Payment Information
$paymentInfo = $revelon->get_paymentInfo($invoiceId);

// Display the Result
if (isset($paymentInfo['invoice_status'])) {
    echo 'Payment Status: ' . $paymentInfo['invoice_status'] . '<br>';
    echo 'Amount: ' . $paymentInfo['price'] . '<br>';
    echo 'Coin To Pay: ' . $paymentInfo['pay_coin'] . '<br>';
    echo 'Payment Address: ' . $paymentInfo['pay_address'] . '<br>';
    echo 'Created At: ' . $paymentInfo['created_at'] . '<br>';
    echo 'Currency: ' . $paymentInfo['currency'] . '<br>';
  
} else {
    echo 'An Error Occurred. Check Your Error Log For Details';
}
?>
