<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT * FROM artikel WHERE judul LIKE :query OR nama LIKE :query";
$stmt = $pdo->prepare($sql);
$search_query = '%' . $query . '%';
$stmt->bindParam(':query', $search_query, PDO::PARAM_STR);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

function excerpt($content, $length = 20) {
    $words = explode(' ', $content);
    if (count($words) > $length) {
        return implode(' ', array_slice($words, 0, $length)) . '...';
    } else {
        return $content;
    }
}

foreach ($articles as &$article) {
    $article['excerpt'] = excerpt($article['artikel']);
}

header('Content-Type: application/json');
echo json_encode($articles);
