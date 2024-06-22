<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Debug log: Print email and hashed password
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Hashed Password: " . htmlspecialchars($password) . "<br>";

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->execute(['email' => $email, 'password' => $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Debug log: Print fetched user data
    echo "User data: ";
    print_r($user);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        header("Location: /ppks/admin/main.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Invalid request method.";
}
