<?php
// Include the Revelon.php File
include_once "../src/Revelon.php";

// Define Your Api Key
$apiKey = "Your_Api_Key";

// Create a new API instance with your api Key
$revelon = new Revelon($apiKey);

// Get Account Information
$accountInfo = $revelon->get_accountinfo();

// Display the Result
if (isset($accountInfo['username'])) {
    echo 'Account Name: ' . $accountInfo['username'] . '<br>';
    echo 'Account Email: ' . $accountInfo['email'] . '<br>';
    echo 'Account Status: ' . $accountInfo['accountstatus'] . '<br>';
    echo 'Account 2FA: ' . $accountInfo['2fa'] . '<br>';
    echo 'Account Creation: ' . $accountInfo['joined_at'] . '<br>';
    // Add more details as needed
} else {
    echo 'An Error Occurred. Check Your Error Log For Details';
}
?>
