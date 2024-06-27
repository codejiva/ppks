<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ppks/client/config.php';

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
$status_pelapor = $_POST['status_pelapor'];
$kategori = $_POST['kategori'];
$nama_terlapor = $_POST['nama_terlapor'];
$status_terlapor = $_POST['status_terlapor'];
$no_hp_terlapor = $_POST['no_hp_terlapor'];
$email_terlapor = $_POST['email_terlapor'];
$tanggal_peristiwa = $_POST['tanggal_peristiwa'];
$lokasi_peristiwa = $_POST['lokasi_peristiwa'];
$kronologi_peristiwa = $_POST['kronologi_peristiwa'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptchaSecret = 'YOUR_SECRET_KEY';
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verify reCAPTCHA response
    $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
    $responseData = json_decode($verifyResponse);

    if ($responseData->success) {
        // reCAPTCHA verification successful
        // Process the form data here
        $nama_lengkap = $_POST['nama_lengkap'];
        $alamat = $_POST['alamat'];
        // Other form processing code

        // Redirect or output success message
        echo "Form submitted successfully!";
    } else {
        // reCAPTCHA verification failed
        echo "reCAPTCHA verification failed. Please try again.";
    }
} else {
    // Handle other request methods if needed
}

// Generate uniqid buat kode unik
$kode_unik = uniqid();

// Menyimpan data ke database
$sql = "INSERT INTO reports (
    nama_lengkap, alamat, jenis_identitas, no_hp, nomor_identitas, email, status_pelapor, kategori, nama_terlapor, status_terlapor, no_hp_terlapor, email_terlapor,
    tanggal_peristiwa, lokasi_peristiwa, kronologi_peristiwa, kode_unik
) VALUES (
    '$nama_lengkap', '$alamat', '$jenis_identitas', '$no_hp', '$nomor_identitas', '$email',
    '$status_pelapor', '$kategori', '$nama_terlapor', '$status_terlapor', '$no_hp_terlapor', '$email_terlapor',
    '$tanggal_peristiwa', '$lokasi_peristiwa', '$kronologi_peristiwa', '$kode_unik'
)";

if ($conn->query($sql) === TRUE) {
    // Pesan sukses setelah data berhasil disimpan
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Diterima</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                margin: 0;
                padding: 20px;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1,
            h2,
            p {
                margin-bottom: 10px;
            }

            a.button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            a.button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Laporan Diterima</h1>
            <p>Terima kasih telah melaporkan kejadian yang terjadi.</p>
            <p>Anda dapat melihat laporan yang telah Anda kirim <a href="<?php echo $base_url; ?>/client/index.php?page=report">di sini</a>.</p>
            <div>
                <h2>Informasi Laporan</h2>
                <p>Nama Lengkap: <?php echo $nama_lengkap; ?></p>
                <p>Tanggal lapor: <?php echo $tanggal_peristiwa; ?></p>
                <p>Status Pelapor: <?php echo $status_pelapor; ?></p>
                <p>Kategori: <?php echo $kategori; ?></p>
                <p>Kode Unik: <?php echo $kode_unik; ?></p>
                <p>Gunakan kode unik untuk cek status laporan secara berkala.</p>
            </div>
            <a href="<?php echo $base_url; ?>/client/index.php?page=home" class="button">Kembali ke Halaman Utama</a>
        </div>
    </body>

    </html>
<?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>