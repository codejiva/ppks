<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Artikel</h3>
            <a href="content_write.php"><i class='bx bx-plus'>Tambah</i></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Penulis</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Pengaturan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM artikel ORDER BY tanggal DESC");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td><p>{$row['nama']}</p></td>
                            <td>{$row['tanggal']}</td>
                            <td><p>{$row['judul']}</p></td>
                            <td>
                                <a href='content_edit.php?id={$row['id']}' class='edit'><i class='bx bx-edit-alt'></i></a>
                                <a href='content_delete.php?id={$row['id']}' class='delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus artikel ini?\")'><i class='bx bx-trash'></i></a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
