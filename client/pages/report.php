<head>
    <link rel="stylesheet" href="../assets/styles/report.css">
</head>
<section id="report-form" class="report_section">
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
                <div>
                    <label for="prodi">Program Studi *</label>
                    <select id="prodi" name="prodi" required>
                        <option value="">Pilih...</option>
                        <option value="ST">D-IV Statistika Terapan</option>
                        <option value="KS">D-IV Komputasi Statistik</option>
                        <option value="D3">D-III Statistika</option>
                    </select>
                </div>
                <div>
                    <label for="file_identitas">Unggah File Identitas</label>
                    <input type="file" id="file_identitas" name="file_identitas">
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
                <div>
                    <label for="file_bukti">Unggah File Bukti Tindakan Kekerasan Seksual</label>
                    <input type="file" id="file_bukti" name="file_bukti">
                </div>
            </fieldset>

            <fieldset class="keamanan">
                <legend>KEAMANAN LAPORAN</legend>
                <div>
                    <label for="captcha">Saya adalah robot terkuat di dunia RAAHHHHHH</label>
                    <div id="captcha">
                        <!-- Ntar taro captcha di sini -->
                        <input type="checkbox" required> Saya bukan robot
                    </div>
                </div>
            </fieldset>

            <div>
                <button type="submit">SUBMIT</button>
            </div>
        </form>
    </div>
</section>
<script>
    function toggleMenu() {
        var menuLinks = document.querySelector('.menu-links');
        menuLinks.classList.toggle('active');
    }
</script>