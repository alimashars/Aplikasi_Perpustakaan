<?php
session_start();
include '../koneksi.php';

$id_user = $_SESSION['id_user'];
$id_buku = $_POST['id_buku'];
$rating = $_POST['rating'];
$ulasan = $_POST['ulasan'];

$query = "INSERT INTO tb_ulasan (id_user, id_buku, rating, ulasan)
          VALUES ('$id_user', '$id_buku', '$rating', '$ulasan')";
mysqli_query($conn, $query);

header("Location: detail_buku.php?id=$id_buku");
?>
