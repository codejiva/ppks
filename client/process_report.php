<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ppks";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$jenis_identitas = $_POST['jenis_identitas'];
$no_hp = $_POST['no_hp'];
$nomor_identitas = $_POST['nomor_identitas'];
$email = $_POST['email'];
$prodi = $_POST['prodi'];
$status_pelapor = $_POST['status_pelapor'];
$kategori = $_POST['kategori'];
$nama_terlapor = $_POST['nama_terlapor'];
$status_terlapor = $_POST['status_terlapor'];
$no_hp_terlapor = $_POST['no_hp_terlapor'];
$email_terlapor = $_POST['email_terlapor'];
$tanggal_peristiwa = $_POST['tanggal_peristiwa'];
$lokasi_peristiwa = $_POST['lokasi_peristiwa'];
$kronologi_peristiwa = $_POST['kronologi_peristiwa'];

// Membuat direktori upload jika belum ada
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Mengunggah file identitas
$file_identitas = $_FILES['file_identitas']['name'];
$target_file_identitas = $target_dir . basename($file_identitas);

if (move_uploaded_file($_FILES['file_identitas']['tmp_name'], $target_file_identitas)) {
    echo "File identitas berhasil diunggah. sip jalan<br>";
} else {
    echo "Terjadi kesalahan saat mengunggah file identitas.<br>";
    $target_file_identitas = null; // Set null jika gagal diipload
}

// Mengunggah file bukti
$file_bukti = $_FILES['file_bukti']['name'];
$target_file_bukti = $target_dir . basename($file_bukti);

if (move_uploaded_file($_FILES['file_bukti']['tmp_name'], $target_file_bukti)) {
    echo "File bukti berhasil diunggah. alhamdulillah ya Allah<br>";
} else {
    echo "Terjadi kesalahan saat mengunggah file bukti.<br>";
    $target_file_bukti = null; // Set null jika gagal diupload
}

// Menyimpan data ke database
$sql = "INSERT INTO reports (
    nama_lengkap, alamat, jenis_identitas, no_hp, nomor_identitas, email, prodi, file_identitas,
    status_pelapor, kategori, nama_terlapor, status_terlapor, no_hp_terlapor, email_terlapor,
    tanggal_peristiwa, lokasi_peristiwa, kronologi_peristiwa, file_bukti
) VALUES (
    '$nama_lengkap', '$alamat', '$jenis_identitas', '$no_hp', '$nomor_identitas', '$email', '$prodi', '$target_file_identitas',
    '$status_pelapor', '$kategori', '$nama_terlapor', '$status_terlapor', '$no_hp_terlapor', '$email_terlapor',
    '$tanggal_peristiwa', '$lokasi_peristiwa', '$kronologi_peristiwa', '$target_file_bukti'
)";

if ($conn->query($sql) === TRUE) {
    echo "Laporan berhasil disimpan. akhirnya jinxxx";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
