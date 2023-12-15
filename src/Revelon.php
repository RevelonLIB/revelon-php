<?php

class Revelon {
   private $apiBaseUrl = 'https://api.revelon.net/';
    private $apiUrlAccountInfo = 'get_account_info';
    private $apiUrlgetBalance = 'balance';
    private $apiUrlcreateInvoice = 'create_invoice';
    private $apiUrlDepositAddress = 'get_deposit_address';
    private $apiUrlcheckDeposit = 'check_deposit';
    private $apiUrlgetPaymentInfo = 'get_payment_info';
    private $apiUrlcreateWithdrawal = 'create_withdrawal';
    private $apiUrlcreateTransfer = 'create_transfer';
    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getDepositAddress($coinName) {
        // Check if $coinName is not set or empty
        if (!isset($coinName)) {
            $this->handleError('Coin Not Defined');
        }

        $postData = [
            'coin' => $coinName,
            'apiKey' => $this->apiKey
        ];

        return $this->sendPostRequest($this->apiUrlDepositAddress, $postData);
    }

    public function check_deposit($coinName, $address) {
        // Check if $coinName or $payment_auth is not set
        if (!isset($coinName) || !isset($address)) {
            $this->handleError('Coin or Address Not Defined');
        }

        $postData = [
            'coin' => $coinName,
            'apiKey' => $this->apiKey,
            'address' => $address
        ];

        return $this->sendPostRequest($this->apiUrlcheckDeposit, $postData);
    }

    public function balance($coinName) {

        if (empty($coinName)) {
            $this->handleError('Coin Not Defined');
        }

        $postData = [
            'coin' => $coinName,
            'apiKey' => $this->apiKey
        ];

        return $this->sendPostRequest($this->apiUrlgetBalance, $postData);
    }

    public function get_accountinfo() {
        $postData = [
            'apiKey' => $this->apiKey
        ];
        return $this->sendPostRequest($this->apiUrlAccountInfo, $postData);
    }

    public function get_paymentInfo($invoice_id) {
        // Check if $invoice_id is not set
        if (!isset($invoice_id)) {
            $this->handleError('Invoice ID Not Defined');
        }

        $postData = [
            'invoice_id' => $invoice_id,
            'apiKey' => $this->apiKey
        ];

        return $this->sendPostRequest($this->apiUrlgetPaymentInfo, $postData);
    }

    public function create_invoice($additionalData) {
        // Combine additional data with apiKey
        $postData = ['apiKey' => $this->apiKey] + $additionalData;
        return $this->sendPostRequest($this->apiUrlcreateInvoice, $postData);
    }
    
     public function create_transfer($coinName, $amount, $to, $identifier) {
        // Check if required parameters are missing
        if (!isset($coinName) || !isset($amount) || !isset($to) || !isset($identifier)) {
            $this->handleError('Missing Required Parameters');
        }

        $postData = [
            'coin' => $coinName,
            'apiKey' => $this->apiKey,
            'amount' => $amount,
            'to' => $to,
            'identifier' => $identifier  
        ];

        return $this->sendPostRequest($this->apiUrlcreateTransfer, $postData);
    }


    public function create_withdrawal($coinName, $amount, $to) {
        // Check if required parameters are missing
        if (!isset($coinName) || !isset($amount) || !isset($to)) {
            $this->handleError('Missing Required Parameters');
        }

        $postData = [
            'coin' => $coinName,
            'apiKey' => $this->apiKey,
            'amount' => $amount,
            'to' => $to
        ];

        return $this->sendPostRequest($this->apiUrlcreateWithdrawal, $postData);
    }

    private function sendPostRequest($route, $data) {
          $url = $this->apiBaseUrl . $route;
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            // Handle cURL error
            $this->handleError('cURL Error: ' . curl_error($ch));
        }

        curl_close($ch);
        $res = json_decode($response, true);

        // Check if the API response status is not success
        if ($res['status'] !== 'success') {
            $this->handleError('API Error: ' . $res['error']);
        }

        return $res["result"];
    }

    private function handleError($errorMessage) {
        // Handle the error (You can customize this part based on your needs)
        echo  $errorMessage;
        error_log( $errorMessage);
        exit();
    }
}

?>
