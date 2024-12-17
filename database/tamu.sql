-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2022 at 08:38 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tamu_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `pertanyaan`) VALUES
(2, 'Apakah anda puas dengan Pelayanan Kantor Kami ? '),
(3, 'Apakah anda puas dengan kebersihan Kantor kami ?'),
(4, 'Apakah anda puas fasilitas kantor kami ?');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai2`
--

CREATE TABLE `tb_pegawai2` (
  `id_pegawai` int(9) NOT NULL,
  `nip` varchar(70) DEFAULT NULL,
  `nama_peg` varchar(255) DEFAULT NULL,
  `id_u_kerja` int(9) DEFAULT NULL,
  `telpon` varchar(15) NOT NULL,
  `qr_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pegawai2`
--

INSERT INTO `tb_pegawai2` (`id_pegawai`, `nip`, `nama_peg`, `id_u_kerja`, `telpon`, `qr_code`) VALUES
(542, '3221222', 'Dading Hermawan', 100, '6211111', '3221222.png'),
(543, '5454545', 'Farid Aja', 100, '6211111223', '5454545.png'),
(544, '344444543', 'Indah Lestari', 101, '62233', '344444543.png'),
(546, '33343443311', 'bejo santosa2', 101, '6211111', '33343443311.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perlu`
--

CREATE TABLE `tb_perlu` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perlu`
--

INSERT INTO `tb_perlu` (`id`, `judul`) VALUES
(2, 'Rapat\r\n'),
(9, 'Penawaran'),
(3, 'Konsultasi'),
(10, 'Mengurus Perizinan'),
(11, 'Mengantar Barang/Paket');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id_profile` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profile`
--

INSERT INTO `tb_profile` (`id_profile`, `nama_perusahaan`, `foto`, `foto2`) VALUES
(1, 'PT MAJU MUNDUR', 'png-clipart-logo-brand-company-trademark-design-furniture-text.png', 'bukutamu2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spk`
--

CREATE TABLE `tb_spk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  `id_unit_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `id_tamu` int(9) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `ketemu` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ttd` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_register` int(11) NOT NULL,
  `id_unit_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(9) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `unit_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `pass`, `level`, `foto`, `unit_kerja`) VALUES
(5, 'admin', 'admin', 'admin', 'admin', 'avatar5.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_u_kerja`
--

CREATE TABLE `t_u_kerja` (
  `id` int(9) NOT NULL,
  `u_kerja` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_u_kerja`
--

INSERT INTO `t_u_kerja` (`id`, `u_kerja`, `ket`) VALUES
(100, 'UPTD BLORA', ''),
(101, 'UPTD SURABAYA', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pegawai2`
--
ALTER TABLE `tb_pegawai2`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_perlu`
--
ALTER TABLE `tb_perlu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `tb_spk`
--
ALTER TABLE `tb_spk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_u_kerja`
--
ALTER TABLE `t_u_kerja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pegawai2`
--
ALTER TABLE `tb_pegawai2`
  MODIFY `id_pegawai` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=547;

--
-- AUTO_INCREMENT for table `tb_perlu`
--
ALTER TABLE `tb_perlu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_spk`
--
ALTER TABLE `tb_spk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=521;

--
-- AUTO_INCREMENT for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  MODIFY `id_tamu` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_u_kerja`
--
ALTER TABLE `t_u_kerja`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
