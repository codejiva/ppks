<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

// Pemetaan status
$status_map = [
    1 => 'Process',
    2 => 'Checking',
    3 => 'Discussion',
    4 => 'Finish'
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasus</title>
    <link rel="stylesheet" href="../assets/styles/home.css">
    <link rel="stylesheet" href="../assets/styles/modal.css">
</head>

<body>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Kasus</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM reports");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $status_text = isset($status_map[$row['status']]) ? $status_map[$row['status']] : 'Unknown';
                        echo "<tr>
                                <td><p>" . htmlspecialchars($row['nama_lengkap']) . "</p></td>
                                <td>" . htmlspecialchars($row['tanggal_lapor']) . "</td>
                                <td><button class='btn-desc' data-id='" . htmlspecialchars($row['id']) . "'><i class='bx bx-note'></i></button></td>
                                <td><span class='status " . strtolower($status_text) . "'>" . htmlspecialchars($status_text) . "</span></td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="desc-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Detail Kasus</h2>
            <div id="modal-body">
                <!-- Detail kasus akan ditampilkan di sini -->
            </div>
            <h3>Ubah Status</h3>
            <select id="status-select">
                <option value="1">Process</option>
                <option value="2">Checking</option>
                <option value="3">Discussion</option>
                <option value="4">Finish</option>
            </select>
            <button id="update-status-btn">Update Status</button>
        </div>
    </div>
    <script src="case.js"></script>
</body>

</html>