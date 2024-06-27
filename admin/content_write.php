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
    <title>Tulis Artikel</title>
    <link rel="stylesheet" href="../admin/styles/content_php.css">
    <link rel="icon" href="../assets/img/Lambang_Politeknik_Statistika_STIS.png" type="image/png">
</head>

<body>
  <form action="content_write.php" method="POST" class="form-container">
    <div class="judul">
      <label for="judul">Judul</label>
      <input type="text" id="judul" name="judul" required class="judul-input">
    </div>
    <div class="isi">
      <label for="artikel">Artikel</label>
      <textarea id="artikel" name="artikel" required></textarea>
    </div>
    <button type="submit">Post Artikel</button>
  </form>
</body>

</html>
