<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
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
                    include 'dashboard.php';
                    break;
                case 'content':
                    include 'content.php';
                    break;
                case 'case':
                    include 'case.php';
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