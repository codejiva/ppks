<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

// mastiin tiap role login baru bisa akses
if (!isset($_SESSION['user_id'])) {
    header('Location: /ppks/client/login.php');
    exit();
}

// ini nyesuaiin rolenya
$role_name = $_SESSION['role_name'];

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="dashboard.css">
    <!-- <link rel="stylesheet" href="/styles/content_php.css"> -->
    <link rel="stylesheet" href="modal.css">
    <link rel="icon" href="../assets/img/Lambang_Politeknik_Statistika_STIS.png" type="image/png">
    <title>Admin | <?php echo $page ?></title>
</head>
<style>
    body {
        overflow: hidden;
    }
</style>
<body>
    <!-- SIDEBAR -->
    <?php
    include 'partials/sidebar.php';
    ?>
    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <?php
        include 'partials/navbar.php';
        ?>
        <!-- MAIN -->
        <main>
            <?php
            switch ($page) {
                case 'dashboard':
                    if ($role_name == 'admin') {
                        include 'dashboard.php';
                    } else {
                        echo 'Access denied';
                    }
                    break;
                case 'case':
                    if ($role_name == 'satgas' || $role_name == 'admin') {
                        include 'case.php';
                    } else {
                        echo 'Access denied';
                    }
                    break;
                case 'content':
                    if ($role_name == 'writer' || $role_name == 'admin') {
                        include 'content.php';
                    } else {
                        echo 'Access denied';
                    }
                    break;
                default:
                    header('Location: /ppks/admin/main.php?page=dashboard');
            }
            ?>
        </main>
    </section>
    <script src="<?php echo $base_url; ?>/admin/script.js"></script>
</body>
</html>
