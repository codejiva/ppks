<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM artikel WHERE id = ?");
    $stmt->execute([$id]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$article) {
        header('Location: main.php?page=content');
        exit;
    }
} else {
    header('Location: main.php?page=content');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $nama = $_POST['nama'];
    $artikel = $_POST['artikel'];

    $stmt = $pdo->prepare("UPDATE artikel SET judul = ?, nama = ?, artikel = ? WHERE id = ?");
    $stmt->execute([$judul, $nama, $artikel, $id]);

    header('Location: main.php?page=content');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/styles/home.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/styles/style.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/styles/report.css">
</head>

<body>
    <div class="container" style="margin-top: 17vh;">
        <h2>Edit Artikel</h2>
        <form action="content_edit.php?id=<?php echo $id; ?>" method="POST">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" value="<?php echo htmlspecialchars($article['judul']); ?>">
            <label for="nama">Penulis:</label>
            <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($article['nama']); ?>">
            <label for="artikel">Artikel:</label>
            <textarea name="artikel" id="artikel" rows="10"><?php echo htmlspecialchars($article['artikel']); ?></textarea>
            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>
