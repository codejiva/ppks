<?php
// Include database connection script (replace with your actual path)
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

// Case count query
$case_count_stmt = $pdo->query("SELECT COUNT(*) AS case_count FROM reports");
$case_count_row = $case_count_stmt->fetch(PDO::FETCH_ASSOC);
$case_count = $case_count_row['case_count'];

// Completed case count query (assuming "4" represents "Selesai")
$completed_case_stmt = $pdo->query("SELECT COUNT(*) AS completed_count FROM reports WHERE status = 4");
$completed_case_row = $completed_case_stmt->fetch(PDO::FETCH_ASSOC);
$completed_case_count = $completed_case_row['completed_count'];

// Content count query
$content_count_stmt = $pdo->query("SELECT COUNT(*) AS content_count FROM artikel");
$content_count_row = $content_count_stmt->fetch(PDO::FETCH_ASSOC);
$content_count = $content_count_row['content_count'];
?>


<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
        </div>
    </div>
    <ul class="box-info">
        <li>
            <i class='bx bxs-group'></i>
            <span class="text">
                <h3><?php echo $case_count; ?></h3>
                <p>Kasus</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-calendar-check'></i>
            <span class="text">
                <h3><?php echo $completed_case_count; ?></h3>
                <p>Selesai</p>
            </span>
        </li>
        <li>
            <i class='bx bx-book-content'></i>
            <span class="text">
                <h3><?php echo $content_count; ?></h3>
                <p>Artikel</p>
            </span>
        </li>
    </ul>
</main>