<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM artikel WHERE id = ?");
    $stmt->execute([$id]);
}

header('Location: main.php?page=content');
exit;
?>
