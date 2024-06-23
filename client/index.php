<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satgas PPKS | Home</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="../assets/styles/home.css">
    <link rel="stylesheet" href="../assets/styles/mediaqueries.css">
    <link rel="icon" href="../assets/img/Lambang_Politeknik_Statistika_STIS.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <!-- saya coba masukan semua page client di index -->
    <!-- Hanya bagian client saja yang saya masukan -->
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    switch ($page) {
        case 'home':
            include 'pages/home.php';
            break;
        case 'report':
            include 'pages/report.php';
            break;
        case 'article':
            include 'pages/article.php';
            break;
        default:
            include 'pages/home.php';
            break;
    }
    ?>
    <footer class="site-footer">
        <?php include 'footer.php'; ?>
    </footer>
    <!-- Script -->
    <script src="../script/script.js"></script>
    <script src="../script/chart.js"></script>
</body>

</html>