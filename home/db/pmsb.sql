-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 05:34 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmsb`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` longblob NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `gambar`, `timestamp`) VALUES
(11, 'Liburan Telah Tiba!', '<p>Liburan Telah Tiba! Semester Genap telah berakhir<br></p>', '', '2019-08-26 16:43:03'),
(12, 'Upacara Bendera 17 Agustus 2019', '<p>Memakai baju hitam putih</p>', 0x4e6f20496d616765, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nisn` int(30) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nik` varchar(19) NOT NULL,
  `tl` varchar(50) NOT NULL,
  `tgll` date NOT NULL,
  `jk` varchar(30) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `asal_sekolah` text NOT NULL,
  `alt_sekolah` text NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `nohp_ortu` varchar(16) NOT NULL,
  `penghasilan` varchar(16) NOT NULL,
  `pj` varchar(50) NOT NULL,
  `semester` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `timestampp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nisn`, `nama_lengkap`, `nik`, `tl`, `tgll`, `jk`, `alamat_rumah`, `asal_sekolah`, `alt_sekolah`, `nama_ortu`, `nohp_ortu`, `penghasilan`, `pj`, `semester`, `status`, `timestampp`) VALUES
(1, 90909, 'Ridwan Lawson', '121929272191819189', 'Jakarta', '2004-01-01', 'Perempuan', 'Jl Kebenaran', 'SMPN 10 Padang', 'Jl Jati Baru', 'Niki Gema', '089670732780', '7000000', '3', 1, 'aktif', '2019-10-27 07:16:31'),
(2, 2147483647, 'Ujangasda', '12312421833421827', 'Padang ', '1994-01-01', 'Laki-laki', 'Jl Kaki', 'SMP Payahkambuh', 'Jl Pulang', 'Udin', '90887689890087', '900000', '12', 4, 'aktif', '2019-10-27 07:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `cu`
--

CREATE TABLE `cu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cu`
--

INSERT INTO `cu` (`id`, `nama`, `email`, `hp`, `pesan`) VALUES
(1, 'Handika', 'handikaputra394@gmail.com', '0123912', 'Hoiii'),
(2, 'Handika', 'handikaputra394@gmail.com', '0123912', 'Hoiii');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `today` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `alamat`, `nohp`, `email`, `today`) VALUES
(1, 'Fadyl', 'Jl Keluar', '081280828282', 'fadyl@smk2pp.sch.id', '2 November 2019, 12:19 am'),
(2, 'Vanessa', 'Jl Pulang', '0812312389120', 'vanessa@smk2pp.sch.id', '2 November 2019, 12:19 am'),
(3, 'Umar Bakri', 'Jl Kaki', '0822121217878', 'umar_bakri@smk2pp.sch.id', '2 November 2019, 12:20 am');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'kelompok a wajib');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`) VALUES
(3, 'tkj'),
(12, 'tata boga');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `sem` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `id_guru`, `id_siswa`, `status`, `sem`, `tahun`) VALUES
(1, 'X-TKJ 1', 1, 90909, 'progress', 1, 2019),
(2, 'XI-TB 1', 2, 2147483647, 'progress', 4, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE `keterangan` (
  `id_ket` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `absen` int(11) NOT NULL,
  `cat` text NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`id_ket`, `nisn`, `sakit`, `izin`, `absen`, `cat`, `sem`) VALUES
(1, 90909, 34, 2, 15, 'Tingkatkan lagi prestasimu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `kkm` int(11) NOT NULL,
  `jenis` text NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `id_guru`, `nama_mapel`, `semester`, `kkm`, `jenis`, `id_jurusan`) VALUES
(1, 1, 'Matematika', 1, 80, '1', 3),
(2, 2, 'Kewirausahaan', 2, 78, '1', 3),
(3, 1, 'Pemrograman I', 4, 89, '1', 12);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nisn` varchar(18) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nilai1` int(3) NOT NULL,
  `desk1` text NOT NULL,
  `nilai2` int(11) NOT NULL,
  `desk2` text NOT NULL,
  `sem` int(11) NOT NULL,
  `timestampp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nisn`, `id_mapel`, `id_guru`, `nilai1`, `desk1`, `nilai2`, `desk2`, `sem`, `timestampp`) VALUES
(1, '90909', 1, 1, 89, 'SELECT nilai.nisn, biodata.nama_lengkap, kelas.kode_kelas, SUM(nilai1) as np, SUM(nilai2) as nk, COUNT(nilai1) as tot FROM nilai, biodata, kelas WHERE nilai.nisn = biodata.nisn AND nilai.id_guru = \'$_GET[nagu]\' AND YEAR(nilai.timestampp) = \'$_GET[tape]\' AND kelas.id_guru = \'$_GET[nagu]\' AND tahun = \'$_GET[tape]\' ', 90, 'SELECT nilai.nisn, biodata.nama_lengkap, kelas.kode_kelas, SUM(nilai1) as np, SUM(nilai2) as nk, COUNT(nilai1) as tot FROM nilai, biodata, kelas WHERE nilai.nisn = biodata.nisn AND nilai.id_guru = \'$_GET[nagu]\' AND YEAR(nilai.timestampp) = \'$_GET[tape]\' AND kelas.id_guru = \'$_GET[nagu]\' AND tahun = \'$_GET[tape]\' ', 1, '2019-11-03 16:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(16) NOT NULL,
  `web` varchar(50) NOT NULL,
  `maps` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sikap`
--

CREATE TABLE `sikap` (
  `id` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `pssp` varchar(2) NOT NULL,
  `desk_pssp` text NOT NULL,
  `psso` varchar(2) NOT NULL,
  `desk_psso` text NOT NULL,
  `sem` int(11) NOT NULL,
  `timestampp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sikap`
--

INSERT INTO `sikap` (`id`, `nisn`, `id_guru`, `pssp`, `desk_pssp`, `psso`, `desk_psso`, `sem`, `timestampp`) VALUES
(1, 90909, 0, 'A', 'Gud Nak ', 'B', 'Mantap Djiwa', 1, '2019-11-03 00:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL,
  `timestamp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `hp`, `password`, `level`, `timestamp`) VALUES
(1, 'Fadyl', 'fadyl@smk2pp.sch.id', '081280828282', '202cb962ac59075b964b07152d234b70', 'guru', '2 November 2019, 12:19 am'),
(2, 'Vanessa', 'vanessa@smk2pp.sch.id', '0812312389120', '202cb962ac59075b964b07152d234b70', 'guru', '2 November 2019, 12:19 am'),
(3, 'Umar Bakri', 'umar_bakri@smk2pp.sch.id', '0822121217878', '202cb962ac59075b964b07152d234b70', 'guru', '2 November 2019, 12:20 am'),
(4, 'admin', 'admin@admin.com', '081212121212', '21232f297a57a5a743894a0e4a801fc3', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cu`
--
ALTER TABLE `cu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_ket`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sikap`
--
ALTER TABLE `sikap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `hp` (`hp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cu`
--
ALTER TABLE `cu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_ket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sikap`
--
ALTER TABLE `sikap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
