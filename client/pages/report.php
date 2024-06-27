<head>
    <link rel="stylesheet" href="../assets/styles/report.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<section id="report-form" class="report_section">
    <div id="check-status" style="margin-top: 130px; text-align: center;">
        <h2>Cek Status Laporan</h2>
        <div>
            <input style="height: 40px; width: 20%;" placeholder=" kode unik..." type="text" id="kode_unik" name="kode_unik" required>
            <button type="button" onclick="checkStatus()" style="height:40px; width: 40px;">Cek</button>
        </div>
        <div id="status-result" style="margin-top: 50px;">
            <!-- Hasil status laporan akan ditampilkan di sini -->
        </div>
    </div>
    <div class="container">
        <h2>FORM LAPORAN</h2>
        <form action="process_report.php" method="POST" enctype="multipart/form-data">
            <fieldset class="identitas">
                <legend>IDENTITAS</legend>
                <div>
                    <label for="nama_lengkap">Nama Lengkap *</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required>
                </div>
                <div>
                    <label for="alamat">Alamat *</label>
                    <input type="text" id="alamat" name="alamat" required>
                </div>
                <div>
                    <label for="jenis_identitas">Jenis Identitas *</label>
                    <select id="jenis_identitas" name="jenis_identitas" required>
                        <option value="">Pilih...</option>
                        <option value="KTP">KTM</option>
                        <option value="SIM">KTP</option>
                        <option value="Passport">SIM</option>
                    </select>
                </div>
                <div>
                    <label for="no_hp">No HP *</label>
                    <input type="tel" id="no_hp" name="no_hp" required>
                </div>
                <div>
                    <label for="nomor_identitas">Nomor Identitas *</label>
                    <input type="text" id="nomor_identitas" name="nomor_identitas" required>
                </div>
                <div>
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </fieldset>

            <fieldset class="pelapor">
                <legend>PELAPOR</legend>
                <div>
                    <label for="status_pelapor">Status Pelapor *</label>
                    <select id="status_pelapor" name="status_pelapor" required>
                        <option value="">Pilih...</option>
                        <option value="mahasiswa">Mahasiswa/i Polstat STIS</option>
                        <option value="dosen">Dosen Plostat STIS</option>
                        <option value="pegawai">Pegawai Polstat STIS</option>
                        <option value="luar">Luar Polstat STIS</option>
                    </select>
                </div>
                <div>
                    <label for="kategori">Kategori *</label>
                    <select id="kategori" name="kategori" required>
                        <option value="">Pilih...</option>
                        <option value="korban">Korban</option>
                        <option value="saksi">Pelapor Saksi</option>
                        <option value="nonsaksi">Pelapor Non-Saksi</option>
                    </select>
                </div>
            </fieldset>

            <fieldset class="terlapor">
                <legend>TERLAPOR</legend>
                <div>
                    <label for="nama_terlapor">Nama Lengkap Terlapor *</label>
                    <input type="text" id="nama_terlapor" name="nama_terlapor" required>
                </div>
                <div>
                    <label for="status_terlapor">Status Terlapor *</label>
                    <select id="status_terlapor" name="status_terlapor" required>
                        <option value="">Pilih...</option>
                        <option value="mahasiswa">Mahasiswa/i Polstat STIS</option>
                        <option value="dosen">Dosen Plostat STIS</option>
                        <option value="pegawai">Pegawai Polstat STIS</option>
                    </select>
                </div>
                <div>
                    <label for="no_hp_terlapor">No HP Terlapor</label>
                    <input type="tel" id="no_hp_terlapor" name="no_hp_terlapor">
                </div>
                <div>
                    <label for="no_hp_terlapor">Email Terlapor</label>
                    <input type="email" id="email_terlapor" name="email_terlapor">
                </div>
            </fieldset>

            <fieldset class="peristiwa">
                <legend>PERISTIWA</legend>
                <div>
                    <label for="tanggal_peristiwa">Tanggal Peristiwa *</label>
                    <input type="date" id="tanggal_peristiwa" name="tanggal_peristiwa" required>
                </div>
                <div>
                    <label for="lokasi_peristiwa">Lokasi Peristiwa *</label>
                    <input type="text" id="lokasi_peristiwa" name="lokasi_peristiwa" required>
                </div>
                <div>
                    <label for="kronologi_peristiwa">Kronologi Peristiwa *</label>
                    <textarea id="kronologi_peristiwa" name="kronologi_peristiwa" required></textarea>
                </div>
            </fieldset>

            <fieldset class="keamanan">
                <legend>KEAMANAN LAPORAN</legend>
                <div>
                    <div id="captcha">
                        <!-- <div class="g-recaptcha" data-sitekey="6LfMvwIqAAAAALdOqH7MahGSlggxzDMWa1xL0sQj"></div> -->
                        <div class="g-recaptcha" data-sitekey="6LdC6wIqAAAAANJVcjXx4-akA0WsTMBZP0IQORgp"></div>
                    </div>
                </div>
            </fieldset>

            <div>
                <button type="submit">SUBMIT</button>
            </div>
        </form>

        <div id="check-status" class="report_section" style="display: none;">
            <div class="container">
                <h2>CEK STATUS LAPORAN</h2>
                <div>
                    <label for="kode_unik">Masukkan Kode Unik:</label>
                    <input type="text" id="kode_unik" name="kode_unik" required>
                    <button type="button" onclick="checkStatus()">Cek Status</button>
                </div>
                <div id="status-result" style="margin-top: 20px;">
                    <!-- Hasil status laporan akan ditampilkan di sini -->
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function toggleMenu() {
        var menuLinks = document.querySelector('.menu-links');
        menuLinks.classList.toggle('active');
    }

    // Ambil elemen form
    var form = document.getElementById('reportForm');

    // Tambahkan event listener untuk event submit
    form.addEventListener('submit', function(event) {
        // Mencegah form untuk memuat ulang halaman
        event.preventDefault();

        // Mengumpulkan data form
        var formData = new FormData(form);

        // Kirim data form ke server menggunakan fetch
        fetch('process_report.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                // Handle response from server if needed
                console.log('Data berhasil dikirim:', data);
                // Reset form jika diperlukan
                form.reset();
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    function checkStatus() {
        var kodeUnik = document.getElementById('kode_unik').value;

        // Kirim permintaan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'process_check_status.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Tangkap hasil dari server
                var response = xhr.responseText;
                // Tampilkan hasil status laporan
                document.getElementById('status-result').innerHTML = response;
            } else {
                console.error('Request failed. Status: ' + xhr.status);
            }
        };
        // Kirim data kode unik
        xhr.send('kode_unik=' + kodeUnik);
    }

    function showStatus(data) {
        // Menampilkan hasil status laporan
        var statusResult = document.getElementById('status-result');
        statusResult.innerHTML = `
            <h1>Status Laporan</h1>
            <div>
                <h2>Informasi Laporan</h2>
                <p>Nama Lengkap: ${data.nama_lengkap}</p>
                <p>Tanggal Lapor: ${data.tanggal_peristiwa}</p>
                <p>Status Pelapor: ${data.status_pelapor}</p>
                <p>Kategori: ${data.kategori}</p>
                <p>Kode Unik: ${data.kode_unik}</p>
                <p>Gunakan kode unik untuk cek status laporan secara berkala.</p>
            </div>
            <a href="index.php?page=home" class="button">Kembali ke Halaman Utama</a>
        `;

        // Sembunyikan form laporan
        document.getElementById('report-form').style.display = 'none';
        // Tampilkan hasil status
        document.getElementById('check-status').style.display = 'block';
    }
</script>