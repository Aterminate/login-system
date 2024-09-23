<?php
// Database connection configuration
$host = 'localhost';  // Change if your DB is hosted elsewhere
$db = 'login_system'; // Change to your database name
$user = 'root';       // Change to your DB username
$pass = '';           // Change to your DB password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
