-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2019 pada 18.55
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinicoshoes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `d_trans_id` int(11) NOT NULL,
  `id_transaksi` varchar(15) NOT NULL,
  `d_trans_jasa_id` int(11) NOT NULL,
  `d_trans_jasa_nama` varchar(50) NOT NULL,
  `d_trans_qty` int(3) NOT NULL,
  `d_trans_harga` int(15) DEFAULT NULL,
  `d_trans_total` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`d_trans_id`, `id_transaksi`, `d_trans_jasa_id`, `d_trans_jasa_nama`, `d_trans_qty`, `d_trans_harga`, `d_trans_total`) VALUES
(3, 'TS-0001', 3, 'Warnain', 1, 20000, 20000),
(4, 'TS-0001', 2, 'Cuci', 1, 500000, 500000),
(5, 'TS-0002', 3, 'Warnain', 1, 20000, 20000),
(6, 'TS-0003', 2, 'Cuci', 3, 500000, 1500000),
(7, 'TS-0003', 3, 'Warnain', 1, 20000, 20000),
(8, 'TS-0004', 3, 'Warnain', 1, 20000, 20000),
(9, 'TS-0004', 4, 'Deep Clean Express', 1, 100000, 100000),
(10, 'TS-0004', 2, 'Cuci', 2, 500000, 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'staff', 'staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `nama_jasa` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `nama_jasa`, `harga`, `keterangan`) VALUES
(2, 'Cuci', 500000, 'cuci aja'),
(3, 'Warnain', 20000, 'warnain sepatu'),
(4, 'Deep Clean Express', 100000, 'Deep Clean semua area sepatu (upper sole, mid sole'),
(5, 'Deep Clean Canvas / Sneakers', 50000, 'Paket ini pencucian sepatu pada seluruh bagian, ti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(5) NOT NULL,
  `id_users` int(5) NOT NULL,
  `testimoni` varchar(100) NOT NULL,
  `rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `id_users`, `testimoni`, `rating`) VALUES
(1, 2, 'Bagus', 3.6),
(2, 2, 'Nicee', 3.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(15) NOT NULL,
  `id_pelanggan` int(11) UNSIGNED DEFAULT NULL,
  `id_staff` int(11) UNSIGNED DEFAULT NULL,
  `trans_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `trans_total` int(15) DEFAULT NULL,
  `trans_jml_uang` int(15) DEFAULT NULL,
  `trans_kembalian` int(15) DEFAULT NULL,
  `trans_status` varchar(20) DEFAULT NULL,
  `trans_pengiriman` varchar(10) DEFAULT NULL,
  `trans_nota` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_staff`, `trans_tanggal`, `trans_total`, `trans_jml_uang`, `trans_kembalian`, `trans_status`, `trans_pengiriman`, `trans_nota`) VALUES
('TS-0001', 2, 4, '2019-08-02 17:31:36', 520000, 520000, 0, 'Proses Pengeringan', NULL, ''),
('TS-0002', 9, 6, '2019-09-12 07:17:21', 20000, 20000, 0, 'Sudah Dikirim', NULL, ''),
('TS-0003', 3, 6, '2019-08-03 17:07:50', 1520000, 2000000, 480000, 'Menunggu Konfirmasi', NULL, NULL),
('TS-0004', 9, 4, '2019-08-03 18:26:09', 1120000, 1120000, 0, 'Menunggu Konfirmasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `address`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', 'suPo-mllp0t.uEXFBxuWeu01206297e748015fbf', 1501472329, 'c.JN/a5NatMoXrnk5WrY1.', 1268889823, 1565186521, 1, 'Aal', 'Ganteng', 'ADMIN', '0', NULL),
(2, '::1', 'user@gmai.com', '$2y$08$ryXP3ClrhRLaHcXUPFKkb.6gHWqQ0TpsjXtdKRruSj1arAh0YkkRe', NULL, 'user@gmail.com', NULL, NULL, NULL, NULL, 1564733294, 1565196763, 1, 'user', 'last', NULL, '082131231', 'Jakarta'),
(3, '::1', 'test@gmail.com', '$2y$08$sizuRgkudLMumwGqPgNLseNC/jOthPOtFqEc9kZpBKXGgsSwgBJGm', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 1564733397, 1564857033, 1, 'tes', 'tesss', NULL, '0213123', 'Ciputat'),
(4, '::1', 'staff1@gmail.com', '$2y$08$MIFtBq/KUK6/zmSXZ9bxde.V92OL5VIQf444XudcYtOgSxtju241W', NULL, 'staff1@gmail.com', NULL, NULL, NULL, NULL, 1564733574, 1565155498, 1, 'staff1', 'staff1', 'Clinico Shoes', '021312312', 'Depok'),
(5, '::1', 'mawar@gmail.com', '$2y$08$j/N8Cx1rnfxGZnWr/lZipO1rF782DfS1gBeS.YD8.UNQfMjAm.Vlu', NULL, 'mawar@gmail.com', NULL, NULL, NULL, NULL, 1564811478, 1564811900, 1, 'Mawar', 'Hitam', NULL, '08213213', 'Depok'),
(6, '::1', 'staff2@gmail.com', '$2y$08$g9k8pSabLv5C8E22dDplUOdSwWIN9GLUJUDZscLmbVaBfD1wbkjvy', NULL, 'staff2@gmail.com', NULL, NULL, NULL, NULL, 1564813944, 1565158761, 1, 'staff2', 'Dandi', NULL, '0812312', 'Alamat Staff2'),
(9, '::1', 'nova@gmail.com', '$2y$08$xfIUMuj.nDmdNWcmPCfToe5SoA4uir/N81ZNWH3sIyTveiZjXNy0K', NULL, 'nova@gmail.com', NULL, NULL, NULL, NULL, 1564816469, 1565159923, 1, 'nova', 'last', NULL, '0213123', 'Jaksel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(14, 1, 1),
(9, 2, 2),
(24, 3, 2),
(21, 4, 3),
(13, 5, 2),
(23, 6, 3),
(22, 9, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`d_trans_id`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `d_trans_jasa_id` (`d_trans_jasa_id`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `d_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`d_trans_jasa_id`) REFERENCES `jasa` (`id_jasa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
