<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

// mastiin tiap role login baru bisa akses
// if (!isset($_SESSION['user_id'])) {
//     header('Location: /ppks/client/login.php');
//     exit();
// }

// // ini nyesuaiin rolenya
// $role_name = $_SESSION['role_name'];

// $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

var_dump($_SESSION['user_id']);
?>
