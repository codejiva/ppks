<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM artikel WHERE id = ?");
    $stmt->execute([$id]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$article) {
        echo "Artikel tidak ditemukan!";
        exit;
    }
} else {
    echo "ID artikel tidak disediakan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['judul']); ?></title>
    <link rel="stylesheet" href="../assets/styles/home.css">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="../assets/styles/report.css">
    <link rel="stylesheet" href="../assets/styles/article_display.css">
</head>

<body>
    <div class="container" style="margin-top: 17vh;">
        <div class="artikel-detail">
            <h1><?php echo htmlspecialchars($article['judul']); ?></h1>
            <p>Ditulis oleh <?php echo htmlspecialchars($article['nama']); ?></p>
            <p style="margin-bottom: 10px;"><?php echo htmlspecialchars($article['tanggal']); ?></p>
            <div>
                <p><?php echo nl2br(htmlspecialchars($article['artikel'])); ?></p>
            </div>
        </div>
    </div>
    <a href="<?php echo $base_url; ?>/client/index.php?page=article" class="back-button">Kembali ke daftar artikel</a>
</body>

</html>
