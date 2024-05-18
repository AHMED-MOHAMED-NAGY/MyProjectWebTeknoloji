<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the raw POST data
    $rawData = file_get_contents('php://input');
    
    // Decode the JSON data
    $data = json_decode($rawData, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400);
        echo "Invalid JSON input.";
        exit;
    }

    // Validate the form data
    $name = strip_tags(trim($data["name"]));
    $email = filter_var(trim($data["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($data["message"]);

    // Check that data was sent to the mailer
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Please complete the form and try again.";
        exit;
    }

    // The Web3Forms API endpoint
    $api_url = 'https://api.web3forms.com/submit';
    
    // Your Web3Forms access key
    $access_key = 'your-access-key';

    // Prepare the data array
    $api_data = [
        'access_key' => $access_key,
        'subject' => 'New Contact Form Submission',
        'from_name' => $name,
        'from_email' => $email,
        'message' => $message
    ];

    // Use cURL to send the request
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($api_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);

    if ($response === false) {
        http_response_code(500);
        echo "There was a problem with your submission. Please try again.";
    } else {
        echo json_encode($data);
    }

    curl_close($ch);
} else {
    http_response_code(403);
    echo "There was a problem with your submission. Please try again.";
}
?>
