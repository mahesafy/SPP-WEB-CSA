-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 10:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sppbines`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukti_bayar`
--

CREATE TABLE `bukti_bayar` (
  `kode_bayar` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `foto_bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bukti_bayar`
--

INSERT INTO `bukti_bayar` (`kode_bayar`, `id_pembayaran`, `foto_bukti`) VALUES
(230001, 637, '648c38ccbfc35.png'),
(230002, 661, '64a0d7be324f8.png'),
(230003, 638, '64a1238e0d733.png'),
(230004, 639, '64a267159ae35.png'),
(230005, 640, '64a6602f0edd4.jpeg'),
(230006, 641, '64ae1b98da1ee.jpg'),
(230007, 642, '64b7868dda451.png');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` char(20) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jurusan`) VALUES
('O01', 'OTKP-1', 'Otomatisasi dan Tata Kelola Perkantoran'),
('O02', 'OTKP-2', 'Otomatisasi dan Tata Kelola Perkantoran'),
('TB01', 'TBSM-1', 'Teknik Bisnis Sepeda Motor'),
('TB02', 'TBSM-2', 'Teknik Bisnis Sepeda Motor'),
('TK01', 'TKJ-1', 'Teknik Komputer Jaringan'),
('TK02', 'TKJ-2', 'Teknik Komputer Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nisn` char(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jatuh_tempo` date NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `id_spp` int(11) NOT NULL,
  `kode_bayar` int(11) DEFAULT NULL,
  `status` enum('Lunas','Belum-Lunas','Menunggu-Konfirmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nisn`, `id_user`, `jatuh_tempo`, `bulan`, `tanggal_bayar`, `id_spp`, `kode_bayar`, `status`) VALUES
(637, '2109001', 1, '2023-06-16', 'Juni  2023', '2023-06-16', 5, 230001, 'Lunas'),
(638, '2109001', 1, '2023-07-16', 'Juli  2023', '2023-07-03', 5, 230003, 'Lunas'),
(639, '2109001', 1, '2023-08-16', 'Agustus  2023', '2023-07-06', 5, 230004, 'Lunas'),
(640, '2109001', 1, '2023-09-16', 'September  2023', '2023-07-09', 5, 230005, 'Lunas'),
(641, '2109001', 1, '2023-10-16', 'Oktober  2023', '2023-07-19', 5, 230006, 'Lunas'),
(642, '2109001', 1, '2023-11-16', 'November  2023', '2023-07-20', 5, 230007, 'Lunas'),
(643, '2109001', NULL, '2023-12-16', 'Desember  2023', NULL, 5, NULL, 'Belum-Lunas'),
(644, '2109001', NULL, '2024-01-16', 'januari  2024', NULL, 5, NULL, 'Belum-Lunas'),
(645, '2109001', NULL, '2024-02-16', 'Februari  2024', NULL, 5, NULL, 'Belum-Lunas'),
(646, '2109001', NULL, '2024-03-16', 'Maret  2024', NULL, 5, NULL, 'Belum-Lunas'),
(647, '2109001', NULL, '2024-04-16', 'April  2024', NULL, 5, NULL, 'Belum-Lunas'),
(648, '2109001', NULL, '2024-05-16', 'Mei  2024', NULL, 5, NULL, 'Belum-Lunas'),
(661, '2109002', 1, '2023-07-02', 'Juli  2023', '2023-07-09', 5, 230002, 'Lunas'),
(662, '2109002', NULL, '2023-08-02', 'Agustus  2023', NULL, 5, NULL, 'Belum-Lunas'),
(663, '2109002', NULL, '2023-09-02', 'September  2023', NULL, 5, NULL, 'Belum-Lunas'),
(664, '2109002', NULL, '2023-10-02', 'Oktober  2023', NULL, 5, NULL, 'Belum-Lunas'),
(665, '2109002', NULL, '2023-11-02', 'November  2023', NULL, 5, NULL, 'Belum-Lunas'),
(666, '2109002', NULL, '2023-12-02', 'Desember  2023', NULL, 5, NULL, 'Belum-Lunas'),
(667, '2109002', NULL, '2024-01-02', 'januari  2024', NULL, 5, NULL, 'Belum-Lunas'),
(668, '2109002', NULL, '2024-02-02', 'Februari  2024', NULL, 5, NULL, 'Belum-Lunas'),
(669, '2109002', NULL, '2024-03-02', 'Maret  2024', NULL, 5, NULL, 'Belum-Lunas'),
(670, '2109002', NULL, '2024-04-02', 'April  2024', NULL, 5, NULL, 'Belum-Lunas'),
(671, '2109002', NULL, '2024-05-02', 'Mei  2024', NULL, 5, NULL, 'Belum-Lunas'),
(672, '2109002', NULL, '2024-06-02', 'Juni  2024', NULL, 5, NULL, 'Belum-Lunas'),
(673, '2109003', NULL, '2023-07-03', 'Juli  2023', NULL, 5, NULL, 'Belum-Lunas'),
(674, '2109003', NULL, '2023-08-03', 'Agustus  2023', NULL, 5, NULL, 'Belum-Lunas'),
(675, '2109003', NULL, '2023-09-03', 'September  2023', NULL, 5, NULL, 'Belum-Lunas'),
(676, '2109003', NULL, '2023-10-03', 'Oktober  2023', NULL, 5, NULL, 'Belum-Lunas'),
(677, '2109003', NULL, '2023-11-03', 'November  2023', NULL, 5, NULL, 'Belum-Lunas'),
(678, '2109003', NULL, '2023-12-03', 'Desember  2023', NULL, 5, NULL, 'Belum-Lunas'),
(679, '2109003', NULL, '2024-01-03', 'januari  2024', NULL, 5, NULL, 'Belum-Lunas'),
(680, '2109003', NULL, '2024-02-03', 'Februari  2024', NULL, 5, NULL, 'Belum-Lunas'),
(681, '2109003', NULL, '2024-03-03', 'Maret  2024', NULL, 5, NULL, 'Belum-Lunas'),
(682, '2109003', NULL, '2024-04-03', 'April  2024', NULL, 5, NULL, 'Belum-Lunas'),
(683, '2109003', NULL, '2024-05-03', 'Mei  2024', NULL, 5, NULL, 'Belum-Lunas'),
(684, '2109003', NULL, '2024-06-03', 'Juni  2024', NULL, 5, NULL, 'Belum-Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_kelas` char(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `password`, `id_kelas`, `alamat`, `no_tlp`, `id_spp`) VALUES
('2109001', '1111', 'Wanda', '5d0aecec3cbbf1da2ec93b114db636c2', 'O01', 'Cimahi Tengah', '089668842074', 5),
('2109002', '2222', 'Teguh', 'f5cd3a020bc94866049206a7cf14e266', 'TB02', 'Cimahi Utara', '081321821374', 5),
('2109003', '3333', 'Rizal', '150fb021c56c33f82eef99253eb36ee1', 'TK01', 'Koppo', '0812138131', 5);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` char(9) NOT NULL,
  `nominal` int(11) NOT NULL,
  `status_spp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`, `status_spp`) VALUES
(1, '2021/2022', 150000, 'Tidak Aktif'),
(4, '2022/2023', 175000, 'Tidak Aktif'),
(5, '2023/2024', 200000, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'bagas', 'Admin'),
(5, 'kuch', '5fc936ecbc229cd09c9aed8649ae1ece', 'Bagmar', 'Pemimpin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  ADD PRIMARY KEY (`kode_bayar`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_user`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `nisn_2` (`nisn`),
  ADD KEY `id_bukti` (`kode_bayar`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=685;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`kode_bayar`) REFERENCES `bukti_bayar` (`kode_bayar`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
