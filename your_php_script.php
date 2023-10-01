<?php
// Define the server address
$host = "roblox.com"; // Replace with the actual server address
$port = 80; // Default HTTP port

// Retrieve data from the form
$username = $_POST["username"];
$password = $_POST["password"];

// Define the data to send (as an associative array)
$data = [
    "username" => $username,
    "password" => $password,
];

// Convert the data to JSON format
$json_data = json_encode($data);

// Set the HTTP headers
$headers = [
    "Content-Type: application/json",
    "Content-Length: " . strlen($json_data),
];

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, "http://" . $host . "/login");
curl_setopt($ch, CURLOPT_PORT, $port);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session and get the response
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo "Error: " . curl_error($ch);
} else {
    // Output the HTTP response
    echo $response;
}

// Close cURL session
curl_close($ch);
?>
