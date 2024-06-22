<?php
// config.php

// Menentukan base URL
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/ppks';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ppks";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>