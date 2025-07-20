<!-- FORM ULASAN -->
<form method="POST" action="proses_ulasan.php">
    <input type="hidden" name="id_buku" value="<?= $id_buku ?>">
    <label>Rating (1-5):</label>
    <input type="number" name="rating" min="1" max="5" required><br>
    <label>Ulasan:</label><br>
    <textarea name="ulasan" required></textarea><br>
    <button type="submit">Kirim Ulasan</button>
</form>

<?php
$ulasan = mysqli_query($conn, "SELECT u.ulasan, u.rating, u.tanggal_ulasan, p.nama_lengkap
                               FROM tb_ulasan u
                               JOIN tb_user p ON u.id_user = p.id_user
                               WHERE u.id_buku = $id_buku");
while($row = mysqli_fetch_assoc($ulasan)) {
    echo "<p><b>{$row['nama_lengkap']}</b> ({$row['rating']}/5):<br>{$row['ulasan']}<br><small>{$row['tanggal_ulasan']}</small></p><hr>";
}
?>
