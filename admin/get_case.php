<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM reports WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data) {
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Data not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid ID']);
}
