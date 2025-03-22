<?php
// Start the session
// session_start();

// // Retrieve form data
// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];
// $amount = $_POST['amount'];

// // PayHere credentials
// $merchant_id = '1229851'; // Replace with your PayHere Merchant ID
// $merchant_secret = 'NzczMTM5NTUxMTAzMzUxNjcyMTYwNTQyODM1NTQwMTQ4MTIyNjc='; // Replace with your PayHere Merchant Secret

// // Generate a unique order ID
// $order_id = uniqid();

// // PayHere payment URL
// $payhere_url = 'https://sandbox.payhere.lk/pay/o8d0d8f57'; // Use sandbox for testing

// // Payment details
// $payment_data = [
//     'merchant_id' => $merchant_id,
//     'return_url' => 'http://localhost/NGO/return.php',
//     'cancel_url' => 'http://localhost/NGO/cancel.php',
//     'notify_url' => 'http://localhost/NGO/notify.php',
//     'order_id' => $order_id,
//     'items' => 'Donation',
//     'amount' => $amount,
//     'currency' => 'LKR',
//     'first_name' => $first_name,
//     'last_name' => $last_name,
//     'email' => $email,
//     'phone' => $phone,
//     'address' => 'No Address',
//     'city' => 'Colombo',
//     'country' => 'Sri Lanka',
// ];

// // Generate the hash
// $hash = strtoupper(
//     md5(
//         $merchant_id .
//         $order_id .
//         number_format($amount, 2, '.', '') .
//         $payment_data['currency'] .
//         strtoupper(md5($merchant_secret))
//     )
// );

// // Add the hash to the payment data
// $payment_data['hash'] = $hash;

// // Redirect to PayHere
// header('Location: ' . $payhere_url . '?' . http_build_query($payment_data));
// exit;
?>