-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 07:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siaok`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `no_reff` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_reff` varchar(40) NOT NULL,
  `keterangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`no_reff`, `id_user`, `nama_reff`, `keterangan`) VALUES
(111, 1, 'Kas', 'Kas'),
(112, 1, 'Piutang', 'Piutang Usaha'),
(113, 1, 'Perlengkapan', 'Perlengkapan Perusahaan'),
(121, 1, 'Peralatan', 'Peralatan Perusahaan'),
(122, 1, 'Akumulasi Peralatan', 'Akumulasi Peralatan'),
(211, 1, 'Utang Usaha', 'Utang Usaha'),
(311, 1, 'Modal', 'Modal'),
(312, 1, 'Prive', 'Prive'),
(411, 1, 'Pendapatan', 'Pendapatan'),
(511, 1, 'Beban Gaji', 'Beban Gaji'),
(512, 1, 'Beban Sewa', 'Beban Sewa'),
(513, 1, 'Beban Penyusutan Peralatan', 'Beban Penyusutan Peralatan'),
(514, 1, 'Beban Lat', 'Beban Lat'),
(515, 1, 'Beban Perlengkapan', 'Beban Perlengkapan');

-- --------------------------------------------------------

--
-- Table structure for table `berangkas`
--

CREATE TABLE `berangkas` (
  `tgl` date NOT NULL,
  `berangkas` int(25) NOT NULL,
  `inc_tgl` int(25) NOT NULL,
  `exp_bank` int(20) NOT NULL,
  `nontunai` int(20) NOT NULL,
  `kas_kecil` int(20) NOT NULL,
  `inc_kas` int(20) NOT NULL,
  `operasional` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berangkas`
--

INSERT INTO `berangkas` (`tgl`, `berangkas`, `inc_tgl`, `exp_bank`, `nontunai`, `kas_kecil`, `inc_kas`, `operasional`) VALUES
('2023-12-19', 2848500, 2848500, 0, 0, 0, 0, 0),
('2023-12-20', 3259000, 410500, 0, 0, 0, 0, 0),
('2023-12-21', 9006000, 5747000, 0, 0, 0, 0, 0),
('2023-12-22', 8879690, 574700, 5, 5, 675000, 20000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dexlite`
--

CREATE TABLE `dexlite` (
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `dex` int(6) NOT NULL,
  `hrg_dex` int(6) NOT NULL,
  `inc_dex` int(20) NOT NULL,
  `stock_dex` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dexlite`
--

INSERT INTO `dexlite` (`tgl`, `dex`, `hrg_dex`, `inc_dex`, `stock_dex`) VALUES
('2023-12-18', 10, 15900, 159000, 0),
('2023-12-19', 60, 15900, 954000, 330),
('2023-12-20', 5, 15900, 79500, 270),
('2023-12-21', 70, 15900, 1113000, 1200),
('2023-12-22', 7, 15900, 111300, 1223);

-- --------------------------------------------------------

--
-- Table structure for table `kas_kecil`
--

CREATE TABLE `kas_kecil` (
  `tgl` date NOT NULL,
  `kas` int(255) NOT NULL,
  `exp_kas` int(20) NOT NULL,
  `inc_kas` int(20) NOT NULL,
  `berangkas_kecil` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `inc_dex` int(20) NOT NULL,
  `inc_pl2` int(20) NOT NULL,
  `inc_tb` int(20) NOT NULL,
  `inc_pmax` int(20) NOT NULL,
  `inc_pl1` int(20) NOT NULL,
  `inc_pdex` int(20) NOT NULL,
  `inc_tgl` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`tgl`, `inc_dex`, `inc_pl2`, `inc_tb`, `inc_pmax`, `inc_pl1`, `inc_pdex`, `inc_tgl`) VALUES
('2023-12-18', 159000, 100000, 157000, 139500, 100000, 165500, 821000),
('2023-12-19', 954000, 500000, 471000, 558000, 200000, 165500, 2848500),
('2023-12-20', 79500, 50000, 78500, 69750, 50000, 82750, 410500),
('2023-12-21', 1113000, 700000, 1099000, 976500, 700000, 1158500, 5747000),
('2023-12-22', 111300, 70000, 109900, 97650, 70000, 115850, 574700);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `dex` int(6) NOT NULL,
  `pl2` int(6) NOT NULL,
  `tb` int(6) NOT NULL,
  `pmax` int(6) NOT NULL,
  `pl1` int(6) NOT NULL,
  `pdex` int(6) NOT NULL,
  `penjualan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`tgl`, `dex`, `pl2`, `tb`, `pmax`, `pl1`, `pdex`, `penjualan`) VALUES
('0000-00-00', 0, 0, 0, 0, 0, 0, 0),
('2023-12-16', 9, 9, 9, 9, 9, 9, 54),
('2023-12-17', 6, 6, 6, 6, 6, 6, 36),
('2023-12-18', 10, 10, 10, 10, 10, 10, 60),
('2023-12-19', 60, 50, 30, 40, 20, 10, 210),
('2023-12-20', 5, 5, 5, 5, 5, 5, 30),
('2023-12-21', 70, 70, 70, 70, 70, 70, 420),
('2023-12-22', 7, 7, 7, 7, 7, 7, 42);

-- --------------------------------------------------------

--
-- Table structure for table `pertadex`
--

CREATE TABLE `pertadex` (
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `pdex` int(6) NOT NULL,
  `hrg_pdex` int(6) NOT NULL,
  `inc_pdex` int(20) NOT NULL,
  `stock_pdex` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertadex`
--

INSERT INTO `pertadex` (`tgl`, `pdex`, `hrg_pdex`, `inc_pdex`, `stock_pdex`) VALUES
('2023-12-18', 10, 16550, 165500, 0),
('2023-12-19', 10, 16550, 165500, 330),
('2023-12-20', 5, 16550, 82750, 270),
('2023-12-21', 70, 16550, 1158500, 1200),
('2023-12-22', 7, 16550, 115850, 1223);

-- --------------------------------------------------------

--
-- Table structure for table `pertalite_t1`
--

CREATE TABLE `pertalite_t1` (
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `pl1` int(6) NOT NULL,
  `hrg_pl1` int(6) NOT NULL,
  `inc_pl1` int(20) NOT NULL,
  `stock_pl1` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertalite_t1`
--

INSERT INTO `pertalite_t1` (`tgl`, `pl1`, `hrg_pl1`, `inc_pl1`, `stock_pl1`) VALUES
('2023-12-18', 10, 10000, 100000, 0),
('2023-12-19', 20, 10000, 200000, 330),
('2023-12-20', 5, 10000, 50000, 270),
('2023-12-21', 70, 10000, 700000, 1200),
('2023-12-22', 7, 10000, 70000, 1223);

-- --------------------------------------------------------

--
-- Table structure for table `pertalite_t2`
--

CREATE TABLE `pertalite_t2` (
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `pl2` int(6) NOT NULL,
  `hrg_pl2` int(6) NOT NULL,
  `inc_pl2` int(20) NOT NULL,
  `stock_pl2` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertalite_t2`
--

INSERT INTO `pertalite_t2` (`tgl`, `pl2`, `hrg_pl2`, `inc_pl2`, `stock_pl2`) VALUES
('2023-12-18', 10, 10000, 100000, 0),
('2023-12-19', 50, 10000, 500000, 330),
('2023-12-20', 5, 10000, 50000, 270),
('2023-12-21', 70, 10000, 700000, 1200),
('2023-12-22', 7, 10000, 70000, 1223);

-- --------------------------------------------------------

--
-- Table structure for table `pertamax`
--

CREATE TABLE `pertamax` (
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `pmax` int(6) NOT NULL,
  `hrg_pmax` int(6) NOT NULL,
  `inc_pmax` int(20) NOT NULL,
  `stock_pmax` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertamax`
--

INSERT INTO `pertamax` (`tgl`, `pmax`, `hrg_pmax`, `inc_pmax`, `stock_pmax`) VALUES
('2023-12-18', 10, 13950, 139500, 0),
('2023-12-19', 40, 13950, 558000, 330),
('2023-12-20', 5, 13950, 69750, 270),
('2023-12-21', 70, 13950, 976500, 1200),
('2023-12-22', 7, 13950, 97650, 1223);

-- --------------------------------------------------------

--
-- Table structure for table `petty_kas`
--

CREATE TABLE `petty_kas` (
  `id` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `pengeluaran` int(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petty_kas`
--

INSERT INTO `petty_kas` (`id`, `tgl`, `pengeluaran`, `keterangan`) VALUES
(1, '2023-12-22', 20000, 'ditaa'),
(2, '2023-12-22', 200000, 'beli plite'),
(3, '2023-12-22', 200000, 'beli plite'),
(4, '2023-12-22', 200000, 'beli plite'),
(5, '2023-12-22', 200000, 'beli plite'),
(6, '2023-12-22', 200000, 'beli plite'),
(7, '2023-12-22', 100000, 'beli jajan'),
(8, '2023-12-22', 100000, 'beli jajan'),
(9, '2023-12-22', 100000, 'beli jajan'),
(10, '2023-12-22', 100000, 'beli jajan'),
(11, '2023-12-22', 100000, 'beli jajan'),
(12, '2023-12-22', 100000, 'beli jajan'),
(13, '2023-12-22', 100000, 'beli jajan'),
(14, '2023-12-22', 100000, 'beli jajan'),
(15, '2023-12-22', 100000, 'beli jajan'),
(16, '2023-12-22', 100000, 'beli jajan'),
(17, '2023-12-22', 100000, 'beli jajan'),
(18, '2023-12-22', 100000, 'beli jajan'),
(19, '2023-12-22', 100000, 'beli jajan'),
(20, '2023-12-22', 100000, 'beli jajan'),
(21, '2023-12-22', 100000, 'beli jajan'),
(22, '2023-12-22', 100000, 'beli jajan'),
(23, '2023-12-22', 100000, 'beli jajan'),
(24, '2023-12-22', 100000, 'beli jajan'),
(25, '2023-12-22', 100000, 'beli jajan'),
(26, '2023-12-22', 100000, 'beli jajan'),
(27, '2023-12-22', 25000, 'beli laptop');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `stok_dex` int(6) NOT NULL,
  `isi_stok_dex` int(6) NOT NULL,
  `stok_pl2` int(6) NOT NULL,
  `isi_stok_pl2` int(6) NOT NULL,
  `stok_tb` int(6) NOT NULL,
  `isi_stok_tb` int(6) NOT NULL,
  `stok_pmax` int(6) NOT NULL,
  `isi_stok_pmax` int(6) NOT NULL,
  `stok_pl1` int(6) NOT NULL,
  `isi_stok_pl1` int(6) NOT NULL,
  `stok_pdex` int(6) NOT NULL,
  `isi_stok_pdex` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`tgl`, `stok_dex`, `isi_stok_dex`, `stok_pl2`, `isi_stok_pl2`, `stok_tb`, `isi_stok_tb`, `stok_pmax`, `isi_stok_pmax`, `stok_pl1`, `isi_stok_pl1`, `stok_pdex`, `isi_stok_pdex`) VALUES
('2023-12-18', 321, 0, 321, 0, 321, 0, 321, 0, 321, 0, 321, 0),
('2023-12-19', 640, 330, 640, 330, 640, 330, 640, 330, 640, 330, 640, 330),
('2023-12-20', 70, 270, 70, 270, 70, 270, 70, 270, 70, 270, 70, 270),
('2023-12-21', 1000, 1200, 1000, 1200, 1000, 1200, 1000, 1200, 1000, 1200, 1000, 1200),
('2023-12-22', 30, 1223, 30, 1223, 30, 1223, 30, 1223, 30, 1223, 30, 1223);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_reff` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_saldo` enum('debit','kredit','','') NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `no_reff`, `tgl_input`, `tgl_transaksi`, `jenis_saldo`, `saldo`) VALUES
(15, 1, 111, '2018-11-26 17:45:45', '2018-11-03', 'debit', 80000000),
(16, 1, 311, '2018-11-26 17:45:45', '2018-11-03', 'kredit', 80000000),
(17, 1, 121, '2018-11-26 17:46:37', '2018-11-03', 'debit', 35000000),
(18, 1, 311, '2018-11-26 17:46:37', '2018-11-03', 'kredit', 35000000),
(19, 1, 512, '2018-11-26 17:49:00', '2018-11-04', 'debit', 6000000),
(20, 1, 111, '2018-11-26 17:49:00', '2018-11-04', 'kredit', 6000000),
(21, 1, 111, '2018-11-26 17:52:00', '2018-11-05', 'kredit', 1900000),
(22, 1, 113, '2018-11-26 17:52:00', '2018-11-05', 'debit', 1900000),
(23, 1, 121, '2018-11-26 17:55:08', '2018-11-08', 'debit', 2000000),
(24, 1, 211, '2018-11-26 17:55:08', '2018-11-08', 'kredit', 2000000),
(25, 1, 411, '2018-11-26 17:57:04', '2018-11-10', 'kredit', 950000),
(26, 1, 112, '2018-11-26 17:57:04', '2018-11-10', 'debit', 950000),
(27, 1, 111, '2018-11-26 17:57:49', '2018-11-12', 'debit', 2500000),
(28, 1, 411, '2018-11-26 17:57:49', '2018-11-12', 'kredit', 2500000),
(29, 1, 211, '2018-11-26 17:59:24', '2018-11-15', 'debit', 200000),
(30, 1, 111, '2018-11-26 17:59:24', '2018-11-15', 'kredit', 200000),
(31, 1, 312, '2018-11-26 18:05:40', '2018-11-20', 'debit', 750000),
(32, 1, 111, '2018-11-26 18:05:40', '2018-11-20', 'kredit', 750000),
(33, 1, 111, '2018-11-26 18:06:13', '2018-11-28', 'debit', 750000),
(34, 1, 112, '2018-11-26 18:06:13', '2018-11-28', 'kredit', 750000),
(35, 1, 511, '2018-11-26 18:10:23', '2018-11-29', 'debit', 900000),
(36, 1, 111, '2018-11-26 18:10:23', '2018-11-29', 'kredit', 900000),
(37, 1, 514, '2018-11-26 18:10:57', '2018-11-30', 'debit', 1600000),
(38, 1, 111, '2018-11-26 18:10:57', '2018-11-30', 'kredit', 1600000),
(39, 1, 515, '2018-11-26 18:12:55', '2018-11-30', 'debit', 1150000),
(40, 1, 113, '2018-11-26 18:12:55', '2018-11-30', 'kredit', 1150000),
(41, 1, 513, '2018-11-26 18:14:43', '2018-11-30', 'debit', 250000),
(42, 1, 122, '2018-11-26 18:14:43', '2018-11-30', 'kredit', 250000),
(43, 1, 512, '2018-11-26 18:15:20', '2018-11-26', 'debit', 500000),
(44, 1, 111, '2018-11-26 18:15:20', '2018-11-26', 'kredit', 500000),
(45, 1, 111, '2018-11-28 10:40:25', '2019-11-30', 'debit', 2000000),
(46, 1, 112, '2018-11-28 10:40:25', '2019-11-30', 'kredit', 2000000),
(47, 1, 514, '2018-11-29 12:56:41', '2018-10-01', 'debit', 1000),
(48, 1, 111, '2018-11-29 12:56:41', '2018-10-01', 'kredit', 1000),
(49, 1, 112, '2018-11-28 12:15:31', '2018-10-02', 'debit', 2000000),
(50, 1, 113, '2018-11-28 12:15:31', '2018-10-02', 'kredit', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `turbo`
--

CREATE TABLE `turbo` (
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `tb` int(6) NOT NULL,
  `hrg_tb` int(6) NOT NULL,
  `inc_tb` int(20) NOT NULL,
  `stock_tb` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turbo`
--

INSERT INTO `turbo` (`tgl`, `tb`, `hrg_tb`, `inc_tb`, `stock_tb`) VALUES
('2023-12-18', 10, 15700, 157000, 0),
('2023-12-19', 30, 15700, 471000, 330),
('2023-12-20', 5, 15700, 78500, 270),
('2023-12-21', 70, 15700, 1099000, 1200),
('2023-12-22', 7, 15700, 109900, 1223);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('laki-laki','perempuan','','') NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jk`, `alamat`, `email`, `username`, `password`, `last_login`) VALUES
(1, 'Hamid', 'laki-laki', 'JL.H.B Jassin No.337', 'hidayatchandra08@gmail.com', 'hamid', '69005bb62e9622ee1de61958aacf0f63', '2023-12-22 14:40:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_reff`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `berangkas`
--
ALTER TABLE `berangkas`
  ADD PRIMARY KEY (`tgl`);

--
-- Indexes for table `dexlite`
--
ALTER TABLE `dexlite`
  ADD PRIMARY KEY (`tgl`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`tgl`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`tgl`);

--
-- Indexes for table `pertadex`
--
ALTER TABLE `pertadex`
  ADD PRIMARY KEY (`tgl`);

--
-- Indexes for table `pertalite_t1`
--
ALTER TABLE `pertalite_t1`
  ADD PRIMARY KEY (`tgl`);

--
-- Indexes for table `pertalite_t2`
--
ALTER TABLE `pertalite_t2`
  ADD PRIMARY KEY (`tgl`);

--
-- Indexes for table `pertamax`
--
ALTER TABLE `pertamax`
  ADD PRIMARY KEY (`tgl`);

--
-- Indexes for table `petty_kas`
--
ALTER TABLE `petty_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`tgl`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `no_reff` (`no_reff`);

--
-- Indexes for table `turbo`
--
ALTER TABLE `turbo`
  ADD PRIMARY KEY (`tgl`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petty_kas`
--
ALTER TABLE `petty_kas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
