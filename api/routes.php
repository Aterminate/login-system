<?php
require 'UserService.php';

function handleRequest($requestMethod, $requestUri) {
    $userService = new UserService();

    // Clean the URI to match your route expectations
    // Adjust this based on how you're accessing your API
    $requestUri = trim($requestUri, '/'); // Remove leading/trailing slashes

     // If you need to remove a specific base path (like "api/index.php"), do that here
    // This assumes you have a known base path to strip out
    $basePath = 'login-system/api/index.php/'; // Set this to the path you want to ignore
    if (strpos($requestUri, $basePath) === 0) {
        $requestUri = substr($requestUri, strlen($basePath)); // Remove the base path
    }

    //return ['status' => 'error', 'message' =>  $requestUri];
    switch ($requestUri) {
        case 'login':
            if ($requestMethod === 'POST') {
                $data = json_decode(file_get_contents('php://input'), true);
                return $userService->authenticate($data['email'], $data['password']);
            }
            break;

        case 'logout':
            if ($requestMethod === 'POST') {
                // Handle logout logic here (e.g., clearing sessions)
                return ['status' => 'ok', 'message' => 'Logged out successfully.'];
            }
            break;

        case 'rememberMe':
            if ($requestMethod === 'POST') {
                // Handle remember me logic here (e.g., setting cookies)
                return ['status' => 'ok', 'message' => 'Remember Me set.'];
            }
            break;

        case 'register':
            if ($requestMethod === 'POST') {
                $data = json_decode(file_get_contents('php://input'), true);
                return $userService->register($data['email'], $data['password']);
            }
            break;

        default:
            http_response_code(404);
            return ['status' => 'error', 'message' => 'Not Found'];
    }
}
