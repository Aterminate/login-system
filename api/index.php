<?php
header("Content-Type: application/json");
require 'routes.php'; // Include the routes file for handling requests

// Get the request method (GET, POST, etc.) and the requested URI
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);




// Handle the request based on the route and method
$response = handleRequest($requestMethod, $requestUri);

// Return the response as JSON
echo json_encode($response);
