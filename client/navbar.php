<!-- untuk navbar -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';
?>

<nav id="desktop-nav">
    <div class="logo">Satgas PPKS STIS</div>
    <div>
        <ul class="nav-links" id="nav-links">
            <li><a href="<?php echo $base_url; ?>/client/index.php?page=home">Beranda</a></li>
            <li><a href="<?php echo $base_url; ?>/client/index.php?page=report">Lapor</a></li>
            <li><a href="<?php echo $base_url; ?>/client/index.php?page=article">Artikel</a></li>
            <li class="btn"><a href="login.php">Login</a></li>
        </ul>
    </div>
</nav>
<nav id="burger-nav">
    <div class="logo">Satgas PPKS</div>
    <div class="burger-menu">
        <div class="burger-icon" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="menu-links">
            <li><a href="<?php echo $base_url; ?>/client/index.php?page=home" onclick="toggleMenu()">Beranda</a></li>
            <li><a href="<?php echo $base_url; ?>/client/index.php?page=report" onclick="toggleMenu()">Lapor</a></li>
            <li><a href="<?php echo $base_url; ?>/client/index.php?page=article" onclick="toggleMenu()">Artikel</a></li>
            <li class="btn">
                <a href="login.php" onclick="toggleMenu()">Login</a>
            </li>
        </div>
    </div>
</nav>
