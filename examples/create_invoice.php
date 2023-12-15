<?php
// Include the Revelon.php File
include_once "../src/Revelon.php";

// Define Your Api Key
$apiKey = "Your_Api_Key";

// Create a new API instance with your api Key
$revelon = new Revelon($apiKey);

// Define data for invoice creation
$data = array(
    'businessName' => 'YourBusinessName', // Replace with your business name
    'redirectUrl' => 'https://yoursite.com/depositsuccess', // Replace with your success redirect URL
    'closeUrl' => 'https://yoursite.com/dashboard', // Replace with your dashboard URL
    'productName' => 'YourProductName', // Replace with your product name
    'currency' => 'USD', // Replace with your preferred currency code
    'price' => 10, // Replace with your product price
    'notificationUrl' => 'https://yoursite.com/resources/webhook.php', // Replace with your webhook URL
    'buyersEmail' => 'buyer@example.com' // Replace with the buyer's email
);

// Create Your Transaction
$payment = $revelon->create_invoice($data);

// Display the Result
if (isset($payment['invoice_id'])) {
    // Success
    $output = 'Invoice Created Successfully with Id : ' . $payment['invoice_id'] . '<br>';
    $output .= 'Payment Link: https://revelon.net/invoice?id=' . $payment['invoice_id'] . '<br>';
} else {
    $output = 'An Error Occurred. Check Your Error Log For Details';
}

// Show the output
echo $output;
?>
