<!-- buat nampilin artikelnya -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM artikel WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($article) {
        $judul = htmlspecialchars($article['judul']);
        $nama = htmlspecialchars($article['nama']);
        $tanggal = htmlspecialchars($article['tanggal']);
        $isiArtikel = htmlspecialchars($article['artikel']);
    } else {
        echo "Artikel tidak ditemukan.";
        exit();
    }
} else {
    echo "ID artikel tidak diberikan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $judul; ?></title>
    <link rel="stylesheet" href="../assets/styles/home.css">
</head>

<body>
    <div class="artikel-container">
        <h1><?php echo $judul; ?></h1>
        <p><?php echo $nama; ?> - <?php echo $tanggal; ?></p>
        <p><?php echo $isiArtikel; ?></p>
    </div>
</body>

</html>
