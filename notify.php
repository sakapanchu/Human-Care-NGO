<?php
session_start();

// PayHere credentials
$merchant_id = '1229851';
$merchant_secret = 'NzczMTM5NTUxMTAzMzUxNjcyMTYwNTQyODM1NTQwMTQ4MTIyNjc=';

// Retrieve payment data from PayHere
$payment_data = $_POST;

// Verify the payment
$local_hash = strtoupper(
    md5(
        $payment_data['merchant_id'] .
        $payment_data['order_id'] .
        $payment_data['payhere_amount'] .
        $payment_data['payhere_currency'] .
        strtoupper(md5($merchant_secret))
    )
);

if ($local_hash === $payment_data['md5sig']) {
    // Payment is valid
    $order_id = $payment_data['order_id'];
    $amount = $payment_data['payhere_amount'];
    $status = $payment_data['status_code'];

    // Save payment details to the database or perform other actions
    echo "Payment successful for Order ID: $order_id, Amount: $amount, Status: $status";
} else {
    // Payment is invalid
    echo "Invalid payment.";
}
?>