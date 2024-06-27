<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

function excerpt($content, $length = 20)
{
    $words = explode(' ', $content);
    if (count($words) > $length) {
        return implode(' ', array_slice($words, 0, $length)) . '...';
    } else {
        return $content;
    }
}

$stmt = $pdo->query("SELECT * FROM artikel ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
    <link rel="stylesheet" href="../assets/styles/home.css">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="../assets/styles/report.css">
    <script src="../script/search.js" defer></script>
</head>

<body>
    <div class="container" style="margin-top: 17vh;">
        <div class="artikel-container">
            <h2>ARTIKEL</h2>
            <input type="text" id="search-input" placeholder="Cari artikel..." style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 20px;">
            <div id="results-container" class="articles-grid">
                <?php
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='card'>
                        <h3 class='card__title'>" . htmlspecialchars($row['judul']) . "</h3>
                        <p class='card__content'>" . htmlspecialchars(excerpt($row['artikel'])) . "</p>
                        <div class='card__date'>" . htmlspecialchars($row['tanggal']) . "</div>
                        <div class='card__arrow'>
                            <form action='article_display.php' method='GET' style='margin: 0;'>
                                <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                                <button type='submit' style='all: unset; cursor: pointer;'>
                                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' height='15' width='15'>
                                        <path fill='#fff' d='M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z'></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
