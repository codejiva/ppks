<?php
// config.php

// Menentukan base URL
$base_url = 'https://' . $_SERVER['HTTP_HOST'] . '/ppks';


$servername = "localhost";
$username = "rfaridhm_admin";
$password = "D7cj5X.PF[QH";
$dbname = "rfaridhm_ppks";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>