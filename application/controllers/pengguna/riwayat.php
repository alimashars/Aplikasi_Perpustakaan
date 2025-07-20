<?php
session_start();
include '../koneksi.php';
$id_user = $_SESSION['id_user'];

$data = mysqli_query($conn, "SELECT b.judul, p.tgl_pinjam, p.tgl_kembali, p.status
                             FROM tb_peminjam p
                             JOIN tb_buku b ON p.id_buku = b.id_buku
                             WHERE p.id_user = $id_user
                             ORDER BY p.tgl_pinjam DESC");
?>
<h2>Riwayat Peminjaman</h2>
<table border="1">
<tr>
    <th>Judul Buku</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Status</th>
</tr>
<?php while($row = mysqli_fetch_assoc($data)): ?>
<tr>
    <td><?= $row['judul'] ?></td>
    <td><?= $row['tgl_pinjam'] ?></td>
    <td><?= $row['tgl_kembali'] ?></td>
    <td><?= $row['status'] ?></td>
</tr>
<?php endwhile; ?>
</table>
