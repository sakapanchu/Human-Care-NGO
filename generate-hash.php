<?php
header('Content-Type: application/json');

// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);

// Check if the required fields are present
if (!isset($data['merchant_id'], $data['order_id'], $data['amount'], $data['currency'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

// Extract fields
$merchant_id = $data['merchant_id'];
$order_id = $data['order_id'];
$amount = $data['amount'];
$currency = $data['currency'];
$merchant_secret = 'NzczMTM5NTUxMTAzMzUxNjcyMTYwNTQyODM1NTQwMTQ4MTIyNjc'; // Replace with your actual Merchant Secret

// Validate amount (must be a positive number)
if (!is_numeric($amount) || $amount <= 0) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid amount']);
    exit;
}

// Generate the hash
$hash = strtoupper(
    md5(
        $merchant_id . 
        $order_id . 
        number_format($amount, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchant_secret)) 
    ) 
);

// Return the hash as JSON
echo json_encode(['hash' => $hash]);
?>