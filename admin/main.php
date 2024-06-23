<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Ambil peran pengguna dari sesi
$role_name = $_SESSION['role_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="dashboard.css">
    <title>Admin</title>
</head>

<body>

    <!-- SIDEBAR -->
    <?php
    include 'partials/sidebar.php';
    ?>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <?php
        include 'partials/navbar.php';
        ?>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

            switch ($page) {
                case 'dashboard':
                    if ($role_name == 'admin') {
                        include 'dashboard.php';
                    } else {
                        echo 'Access denied';
                    }
                    break;
                case 'content':
                    if ($role_name == 'satgas' || $role_name == 'admin') {
                        include 'content.php';
                    } else {
                        echo 'Access denied';
                    }
                    break;
                case 'case':
                    if ($role_name == 'writer' || $role_name == 'admin') {
                        include 'case.php';
                    } else {
                        echo 'Access denied';
                    }
                    break;
                default:
                    echo 'Gak ada njir';
            }
            ?>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="<?php echo $base_url; ?>client/script.js"></script>
</body>

</html>
