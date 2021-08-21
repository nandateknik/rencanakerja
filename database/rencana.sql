-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2021 pada 11.13
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rencana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `divisi`) VALUES
(1, 'Master'),
(2, 'Teknik'),
(3, 'Produksi'),
(4, 'Quality Control');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `id_user`, `tanggal`, `jam`, `keterangan`) VALUES
(1, 1, '2021-08-19', '00:58', 'Membuat Missi Baru Cek Now'),
(2, 1, '2021-08-19', '01:06', 'Menambah kemajuan kerja'),
(3, 1, '2021-08-19', '01:41', 'Membuat Missi Baru Cek Now'),
(4, 1, '2021-08-19', '01:41', 'Menambah kemajuan kerja'),
(5, 4, '2021-08-19', '08:58', 'Menambah kemajuan kerja'),
(6, 4, '2021-08-19', '08:58', 'Membuat Missi Baru Cek Now'),
(7, 4, '2021-08-19', '09:02', 'Menambah kemajuan kerja'),
(8, 4, '2021-08-19', '09:03', 'Membuat Missi Baru Cek Now'),
(9, 5, '2021-08-19', '09:04', 'Menambah kemajuan kerja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mission`
--

CREATE TABLE `mission` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(250) NOT NULL,
  `mission` text NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mission`
--

INSERT INTO `mission` (`id`, `tanggal`, `jam`, `mission`, `deskripsi`, `status`, `divisi`) VALUES
(1, '2021-08-17', '06:00', 'Ass roda patah', 'Ass roda lori divisi PK patah dan minta diganti.', 'Selesai', 'teknik'),
(2, '2021-08-18', '05:13', 'Ac mati', 'Ac mati di ruang super grade. Tolong di cek dan dipastikan', 'baru', 'Teknik'),
(3, '2021-08-18', '09:37', 'Repack size 40', 'Repack barang size 40 untuk 2 container', 'Selesai', 'Produksi'),
(4, '2021-08-19', '00:57', 'Membersihkan area teknik', 'Untuk seluruh divisi membersihkan area teknik karna mau ada audit.', 'baru', 'Teknik'),
(5, '2021-08-19', '00:58', 'Membersihkan area teknik', 'Untuk seluruh divisi membersihkan area teknik karna mau ada audit.', 'Progres', 'Teknik'),
(6, '2021-08-19', '01:41', 'membuat bak sampah', 'Butuh bak sampah 30 buah untuk area proses', 'Progres', 'Teknik'),
(7, '2021-08-19', '08:58', 'Membersihkan area produksi', 'dibersihkan sekarang juga', 'Selesai', 'Produksi'),
(8, '2021-08-19', '09:03', 'Data dibaru', 'desskrpsi', 'Progres', 'Produksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `alamat`, `foto`, `no_hp`) VALUES
(1, 'PT. GMCP BWI', 'Jl. Yos Sudarso no.72, Klatak, Banyuwangi.  ', '1.jpg', '0823323333');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progres`
--

CREATE TABLE `progres` (
  `id` int(11) NOT NULL,
  `id_mission` int(11) NOT NULL,
  `progres` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `progres`
--

INSERT INTO `progres` (`id`, `id_mission`, `progres`, `tanggal`, `jam`, `status`, `id_user`) VALUES
(1, 2, 'sudah dicek dan butuh kabel ukuran 2x0,75', '2021-08-18', '06:39', 'Progres', 1),
(2, 2, 'Sudah diganti. dan dapat digunakan', '2021-08-18', '07:14', 'Selesai', 1),
(3, 1, 'Bahan belum ada mau beli dahulu.', '2021-08-18', '07:31', 'Progres', 1),
(4, 2, 'jajal mawon', '2021-08-18', '09:07', 'Selesai', 3),
(5, 1, 'Sudah diperbaiki dan sudah bisa.', '2021-08-18', '09:25', 'Selesai', 1),
(6, 1, 'Sudah selesai boss', '2021-08-19', '00:45', 'Selesai', 1),
(7, 5, 'Sek kesel boss', '2021-08-19', '01:06', 'Progres', 1),
(8, 6, 'Oke butuh bahan karna bahan tidak ada', '2021-08-19', '01:41', 'Progres', 1),
(9, 3, 'sudah', '2021-08-19', '08:58', 'Selesai', 4),
(10, 7, 'MASIH DALAM TAHAP ', '2021-08-19', '09:02', 'Selesai', 4),
(11, 8, 'on progress', '2021-08-19', '09:04', 'Progres', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Master'),
(2, 'Admin'),
(3, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `role_id` int(1) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `foto`, `is_active`, `role_id`, `divisi`) VALUES
(1, 'Nanda Krisbianto', 'master', 'master', 'user1.jpg', 1, 1, 'Master'),
(2, 'Indah Nur Sasi', 'admin', 'admin', 'no-image.png', 1, 2, 'Teknik'),
(3, 'Tery Nur Hadi', 'user', 'user', 'no-image.png', 1, 3, 'Teknik'),
(4, 'admin2', 'admin2', 'admin', 'no-image.png', 1, 2, 'Produksi'),
(5, 'user2', 'user2', 'user', 'no-image.png', 1, 3, 'Produksi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `progres`
--
ALTER TABLE `progres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mission`
--
ALTER TABLE `mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `progres`
--
ALTER TABLE `progres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
