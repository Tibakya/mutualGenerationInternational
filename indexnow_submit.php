<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
// API endpoint for IndexNow
$url = "https://api.indexnow.org";

// Data to send
$data = [
    "host" => "www.mutualgenerationinternational.or.tz",
    "key" => "2bc08f8684cf41c4876d5848c60f4ce0",
    "keyLocation" => "https://www.mutualgenerationinternational.or.tz/2bc08f8684cf41c4876d5848c60f4ce0.txt",
    "urlList" => [
        "https://www.mutualgenerationinternational.or.tz/",
        "https://www.mutualgenerationinternational.or.tz/about",
        "https://www.mutualgenerationinternational.or.tz/global-networks",
        "https://www.mutualgenerationinternational.or.tz/events",
        "https://www.mutualgenerationinternational.or.tz/blog",
        "https://www.mutualgenerationinternational.or.tz/team",
        "https://www.mutualgenerationinternational.or.tz/contacts",
    ]
];

// Set up HTTP POST request
$options = [
    "http" => [
        "header" => "Content-Type: application/json\r\n",
        "method" => "POST",
        "content" => json_encode($data), // Convert data to JSON
    ]
];

// Create context for the HTTP request
$context = stream_context_create($options);

// Send the POST request
$response = @file_get_contents($url, false, $context);

// Check for errors
if ($response === FALSE) {
    echo "Error: Unable to submit URLs. Please check your configuration.";
} else {
    echo "Response from IndexNow API: " . $response;
}
?>
