<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ppks";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Assuming $conn is already initialized properly
$kode_unik = $_POST['kode_unik'];

// Query untuk mengambil data berdasarkan kode_unik
$sql = "SELECT * FROM reports WHERE kode_unik = '$kode_unik'";

// Eksekusi query
$result = mysqli_query($conn, $sql);

// Memeriksa apakah query berhasil
if ($result) {
    // Proses hasil query
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        // Ubah kode status menjadi teks yang sesuai
        switch ($row['status']) {
            case 1:
                $status_text = 'Process';
                break;
            case 2:
                $status_text = 'Checking';
                break;
            case 3:
                $status_text = 'Discussion';
                break;
            case 4:
                $status_text = 'Finish';
                break;
            default:
                $status_text = 'Unknown';
                break;
        }

        // Konstruksi respons HTML
        $response = '<div class="container">
                        <h1>Status Laporan</h1>
                        <div>
                            <p>Nama Lengkap: ' . $row['nama_lengkap'] . '</p>
                            <p>Tanggal Lapor: ' . $row['tanggal_peristiwa'] . '</p>
                            <p>Status Pelapor: ' . $row['status_pelapor'] . '</p>
                            <p>Kategori: ' . $row['kategori'] . '</p>
                            <p>Kode Unik: ' . $kode_unik . '</p>
                            <strong><p>Gunakan kode unik untuk cek status laporan secara berkala.</p></strong>
                            <p>Status: <span class="status">' . $status_text . '</span></p>
                        </div>
                        <a href="' . $base_url . '/client/index.php?page=home" class="button">Kembali ke Halaman Utama</a>
                    </div>';
        echo $response;
    } else {
        echo "Data tidak ditemukan"; // Mengatasi jika data tidak ditemukan berdasarkan kode_unik yang diberikan
    }
} else {
    echo "Error pada query: " . mysqli_error($conn); // Mengatasi kesalahan eksekusi query
}

// Menutup koneksi
mysqli_close($conn);
?>
