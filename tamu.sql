-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 07:37 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tamu`
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
(542, '3221222', 'PAK YUDA', 103, '6211111', '3221222.png'),
(543, '5454545', 'PAK RADIT', 102, '6211111223', '5454545.png'),
(544, '344444543', 'PAK IMAM', 104, '62233', '344444543.png'),
(546, '33343443311', 'PAK LINGGA', 100, '6211111', '33343443311.png'),
(547, '23444', 'PAK DANI', 101, '234234323', '');

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
(1, 'BPK Provinsi Gorontalo', 'gbpk.png', 'bukutamu2.png');

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

--
-- Dumping data for table `tb_spk`
--

INSERT INTO `tb_spk` (`id`, `nama`, `pertanyaan`, `jawaban`, `id_unit_kerja`) VALUES
(521, 'firman', 'Apakah anda puas dengan Pelayanan Kantor Kami ? ', 'Sangat Puas', 0),
(522, 'firman', 'Apakah anda puas dengan Pelayanan Kantor Kami ? ', 'Sangat Puas', 0),
(523, 'a', 'Apakah anda puas dengan Pelayanan Kantor Kami ? ', 'Sangat Puas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `id_tamu` int(9) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jumlah_tamu` varchar(300) NOT NULL,
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

--
-- Dumping data for table `tb_tamu`
--

INSERT INTO `tb_tamu` (`id_tamu`, `nama`, `alamat`, `jumlah_tamu`, `telp`, `jk`, `keperluan`, `tanggal`, `jam`, `jam_keluar`, `ketemu`, `foto`, `ttd`, `instansi`, `status`, `no_hp`, `id_register`, `id_unit_kerja`) VALUES
(37, 'firman', 'jl. Taman Hiburan 1', '3', '082259126158', 'L', '9', '2022-05-12', '07:36:15', '08:22:08', 'bejo santosa2', '627c567fcdc9b.png', '', 'Badan Pemeriksa Keuangan', '', '6211111', 0, 101),
(38, 'a', 'a', '1', 'a', 'L', '9', '2022-05-15', '13:07:01', '00:00:00', 'PAK YUDA', '628098857d905.png', '', 'a', '', '6211111', 0, 103),
(39, 'Marten', 'Jl. Taman Hiburan 1', '10', '09999999', '--Pilih Jenis Kelamin--', '3', '2022-05-16', '11:46:29', '00:00:00', 'PAK IMAM', '6281d7255edd3.png', '', 'Kantor Dinas Perhubungan', '', '62233', 0, 104);

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
(100, 'SUBBAG SDM', ''),
(101, 'SUBBAG KEUANGAN', ''),
(102, 'SUBBAG HUMAS', ''),
(103, 'SUBBAG HUKUM', ''),
(104, 'SUBBAG  UMUM DAN TI', '');

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
  MODIFY `id_pegawai` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=548;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;

--
-- AUTO_INCREMENT for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  MODIFY `id_tamu` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_u_kerja`
--
ALTER TABLE `t_u_kerja`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
