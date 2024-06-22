<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';
?>

<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Satgas PPKS STIS</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="<?php echo $base_url; ?>/admin/main.php?page=dashboard">
                <i class='bx bx-line-chart'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo $base_url; ?>/admin/main.php?page=case">
                <i class='bx bxs-report'></i>
                <span class="text">Kasus</span>
            </a>
        </li>
        <li>
            <a href="<?php echo $base_url; ?>/admin/main.php?page=content">
                <i class='bx bx-book-content'></i>
                <span class="text">Artikel</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog'></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
