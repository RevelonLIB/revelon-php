<?php


class RevelonValidator
{
    public static function validateCoinName($coinName)
    {
        if (empty($coinName)) {
            throw new \InvalidArgumentException('Coin name cannot be empty.');
        }

        // Add additional validation rules as needed

        return $coinName;
    }

    public static function validateAmount($amount)
    {
        if (!is_numeric($amount) || $amount <= 0) {
            throw new \InvalidArgumentException('Amount must be a positive numeric value.');
        }

        // Add more validation rules for amount if needed

        return $amount;
    }

    public static function validateTo($to)
    {
        if (empty($to)) {
            throw new \InvalidArgumentException('Receiver address cannot be empty.');
        }

        // Add more validation rules for 'to' parameter if needed

        return $to;
    }

    // Add more validation methods for other parameters

    // Example usage in Revelon.php:
    // $validatedCoin = RevelonValidator::validateCoinName($coin);
    // $validatedAmount = RevelonValidator::validateAmount($amount);
    // $validatedTo = RevelonValidator::validateTo($to);
}
?>