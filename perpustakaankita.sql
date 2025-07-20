-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2025 pada 14.59
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaankita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `id_kategori`) VALUES
(1, 'Belajar PHP', 'Andi', 'Gramedia', '2021', 1),
(2, 'Laskar Pelangi', 'Andrea Hirata', 'Bentang', '2005', 2),
(3, 'Kingkong', 'Josh', 'Gramedia', '2000', 2),
(4, 'Pemrograman Web Dasar', 'Budi Santoso', 'Informatika', '2022', 1),
(5, 'Logika Matematika', 'Dewi Anggraeni', 'Graha Ilmu', '2020', 3),
(6, 'Sejarah Nusantara', 'Heri Kurniawan', 'Pustaka Indonesia', '2018', 4),
(7, 'Psikologi Remaja', 'Aulia Putri', 'Erlangga', '2019', 5),
(8, 'Pengantar Ilmu Agama', 'Ust. Ahmad', 'Mizan', '2021', 6),
(9, 'Manajemen Modern', 'Rizky Fadillah', 'Salemba Empat', '2023', 7),
(10, 'Novel Dunia Sophie', 'Jostein Gaarder', 'Mizan', '1991', 8),
(11, 'Mengenal AI & Machine Learning', 'Andi Firmansyah', 'Informatika', '2024', 1),
(12, 'Kesehatan Mental di Era Digital', 'Dina Rahma', 'Pustaka Medika', '2023', 10),
(13, 'Algoritma & Struktur Data', 'Tri Wahyuni', 'Gramedia', '2020', 9),
(14, 'Strategi Bisnis UKM', 'Slamet Budi', 'Salemba Empat', '2017', 7),
(15, 'Filosofi Teras', 'Henry Manampiring', 'Kompas', '2019', 5),
(16, 'Bumi', 'Tere Liye', 'Gramedia', '2014', 8),
(17, 'Biologi Umum', 'Siti Aisyah', 'Erlangga', '2016', 3),
(18, 'Agama dan Sains', 'Yusuf Qardhawi', 'Mizan', '2018', 6),
(23, 'Jarotz', 'Muklis', 'Kompas', '2021', 7),
(24, 'Anomali', 'Jhon', 'Dimbn', '2024', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Teknologi'),
(2, 'Sastra'),
(3, 'Sains'),
(4, 'Teknologi'),
(5, 'Sastra'),
(6, 'Sains'),
(7, 'Sejarah'),
(8, 'Psikologi'),
(9, 'Agama'),
(10, 'Bisnis'),
(11, 'Fiksi'),
(12, 'Komputer'),
(13, 'Kesehatan'),
(16, 'Hukum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjam`
--

CREATE TABLE `tb_peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_peminjam`
--

INSERT INTO `tb_peminjam` (`id_peminjam`, `id_user`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(1, 8, 3, '2025-07-08', '2025-07-11', 'Dikembalikan'),
(2, 8, 2, '2025-07-14', '2025-07-04', 'Dikembalikan'),
(5, 10, 3, '2025-07-19', '2025-06-17', 'Dikembalikan'),
(6, 10, 6, '2025-07-19', '2025-07-22', 'Dikembalikan'),
(8, 10, 6, '2025-07-19', '2025-07-28', 'Dikembalikan'),
(9, 10, 3, '2025-07-19', '2025-07-04', 'Dikembalikan'),
(10, 10, 9, '2025-07-19', '2025-07-19', 'Dikembalikan'),
(11, 10, 8, '2025-07-19', '2025-08-05', 'Dikembalikan'),
(12, 10, 10, '2025-07-19', '2025-07-19', 'Dikembalikan'),
(14, 10, 5, '2025-07-19', '2025-07-17', 'Dikembalikan'),
(15, 10, 1, '2025-07-20', '2025-07-20', 'Dipinjam'),
(16, 10, 13, '2025-07-20', '2025-07-20', 'Dipinjam'),
(17, 10, 10, '2025-07-20', '2025-07-30', 'Dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ulasan`
--

CREATE TABLE `tb_ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int(1) NOT NULL,
  `tanggal_ulasan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_ulasan`
--

INSERT INTO `tb_ulasan` (`id_ulasan`, `id_user`, `id_buku`, `ulasan`, `rating`, `tanggal_ulasan`) VALUES
(1, 8, 1, 'Baik', 1, '2025-07-19 18:51:08'),
(2, 8, 1, 'Bagus bukunya', 5, '2025-07-19 18:58:32'),
(6, 10, 2, 'keren', 5, '2025-07-19 19:39:13'),
(12, 10, 1, 'mantap si kwk', 4, '2025-07-19 21:31:13'),
(21, 10, 1, 'ds', 3, '2025-07-20 14:19:17'),
(23, 10, 9, 'baus si', 2, '2025-07-20 14:24:20'),
(25, 10, 8, 'bagus buat kita yakan gais', 5, '2025-07-20 15:17:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` enum('admin','pengguna') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_lengkap`, `level`) VALUES
(6, 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 'Admin', 'admin'),
(8, 'Pengguna', 'a354cc9430dd4275b30e7c923f8cd049', 'Pengguna', 'pengguna'),
(10, 'Ali', '7a9b46ab6d983a85dd4d9a1aa64a3945', 'Ali Mashar Saputra', 'pengguna'),
(11, 'Setiya', 'ffbd66be2b951bdf5484d7620cb7aab3', 'Setiya Dosen', 'admin'),
(12, 'Perpustakaan', 'b908a4b7037f779960148838683c983e', 'Perpustakaan', 'admin'),
(17, 'Unimma', 'cf339393bff5396ee4e3565319deaaee', 'Perpus Unimma', 'admin'),
(18, 'Halan', 'eae09e25f6ead6ffc12cc15d58917c8e', 'Halan London', 'pengguna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wishlist`
--

CREATE TABLE `tb_wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_ditambahkan` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_wishlist`
--

INSERT INTO `tb_wishlist` (`id_wishlist`, `id_user`, `id_buku`, `tanggal_ditambahkan`) VALUES
(15, 10, 1, '2025-07-20 14:23:23'),
(16, 10, 1, '2025-07-20 14:23:24'),
(17, 10, 2, '2025-07-20 14:23:25'),
(22, 10, 1, '2025-07-20 16:11:34'),
(23, 10, 1, '2025-07-20 16:13:39'),
(24, 10, 23, '2025-07-20 16:14:02'),
(25, 10, 3, '2025-07-20 16:18:38'),
(26, 10, 5, '2025-07-20 16:20:25'),
(27, 10, 3, '2025-07-20 16:27:09'),
(30, 10, 3, '2025-07-20 16:37:39'),
(31, 10, 10, '2025-07-20 16:37:51'),
(32, 10, 24, '2025-07-20 18:08:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_buku` (`id_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `fk_buku_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  ADD CONSTRAINT `fk_peminjam_buku` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_peminjam_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD CONSTRAINT `tb_ulasan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_ulasan_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD CONSTRAINT `fk_buku` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
