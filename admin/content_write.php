<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_name'])) {
        $nama = $_SESSION['user_name']; // ini ngambil namanya dari akun yang login
    } else {
        echo "Nama penulis tidak ditemukan dalam sesi.";
        exit();
    }

    $judul = $_POST['judul'];
    $artikel = $_POST['artikel'];

    try {
        $stmt = $pdo->prepare("INSERT INTO artikel (nama, judul, artikel) VALUES (:nama, :judul, :artikel)");
        $stmt->execute(['nama' => $nama, 'judul' => $judul, 'artikel' => $artikel]);

        header("Location: /ppks/admin/main.php?page=content");
        exit();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Content</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <form action="content_write.php" method="POST">
        <div>
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" required>
        </div>
        <div>
            <label for="artikel">Artikel</label>
            <textarea id="artikel" name="artikel" rows="10" required></textarea>
        </div>
        <button type="submit">Post Artikel</button>
    </form>
</body>

</html>
