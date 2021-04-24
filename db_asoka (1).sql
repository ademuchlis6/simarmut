-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 07:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asoka`
--

-- --------------------------------------------------------

--
-- Table structure for table `ref_jenis`
--

CREATE TABLE `ref_jenis` (
  `id` int(4) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `waktu` int(5) NOT NULL,
  `uraian` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_jenis`
--

INSERT INTO `ref_jenis` (`id`, `kode`, `nama`, `waktu`, `uraian`) VALUES
(2, '2', 'Surat B', 14, 'B'),
(3, '1', 'Surat A', 7, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ref_klasifikasi`
--

CREATE TABLE `ref_klasifikasi` (
  `id` int(4) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_klasifikasi`
--

INSERT INTO `ref_klasifikasi` (`id`, `kode`, `nama`, `uraian`) VALUES
(1, '000', 'UMUM', '-\r\n'),
(2, '100', 'PEMERINTAHAN', ''),
(3, '200', 'POLITIK', ''),
(4, '300', 'KEAMANAN /KETERTIBAN', ''),
(5, '400', 'KESEJAHTERAAN RAKYAT', ''),
(6, '500', 'PEREKONOMIAN', ''),
(7, '600', 'PEKERJAAN UMUM DAN KETENAGAAN', ''),
(8, '700', 'PENGAWASAN', ''),
(9, '800', 'KEPEGAWAIAN', ''),
(10, '900', 'KEUANGAN', '');

-- --------------------------------------------------------

--
-- Table structure for table `tr_instansi`
--

CREATE TABLE `tr_instansi` (
  `id` int(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kepsek` varchar(100) NOT NULL,
  `nip_kepsek` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_instansi`
--

INSERT INTO `tr_instansi` (`id`, `nama`, `alamat`, `kepsek`, `nip_kepsek`, `logo`) VALUES
(1, 'KECAMATAN CITEUREUP', 'Jl. Mayor OkingJayaatmadja No. 107 Citeureup Bogor Telp. (021) 8752312', 'ASEP MULYANA SUDRAJAT,SH', '196408031994031004', 'logo2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(75) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `level` enum('Super Admin','Admin','Kepala','Kasubag','Pelaksana','Operator','Administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id`, `username`, `password`, `nama`, `nip`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '19900326 201401 1 002', 'Super Admin'),
(2, 'umum', 'adfab9c56b8b16d6c067f8d3cff8818e', 'Nur Akhwan', '19900326 201401 1 002', 'Admin'),
(3, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'Administrator 1', '199003262017011001', 'Admin'),
(6, 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 'nama kepala', '123', 'Kepala'),
(7, 'kasubag', '143ad2695caf8f2368b5d9ef03d37ee8', 'nama kasubag', '1234', 'Kasubag'),
(8, 'pelaksana', '6875ccc2c267a8c215afb1f25f81d7a0', 'nama pelaksana', '12345', 'Pelaksana'),
(9, 'operator', '4b583376b2767b923c3e1da60d10de59', 'nama operator', '123', 'Operator'),
(10, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'nama administra', '123', 'Administrator'),
(11, 'pelaksana1', '6875ccc2c267a8c215afb1f25f81d7a0', 'nama pelaksana1', '123', 'Pelaksana');

-- --------------------------------------------------------

--
-- Table structure for table `t_disposisi`
--

CREATE TABLE `t_disposisi` (
  `id` int(6) NOT NULL,
  `id_surat` int(6) NOT NULL,
  `kpd_yth` varchar(250) NOT NULL,
  `isi_disposisi` varchar(250) NOT NULL,
  `sifat` enum('Biasa','Segera','Perlu Perhatian Khusus','Perhatian Batas Waktu') NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(250) NOT NULL,
  `kpd_yth_2` varchar(250) DEFAULT NULL,
  `isi_disposisi_2` varchar(250) DEFAULT NULL,
  `tgl_dis_2` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_disposisi`
--

INSERT INTO `t_disposisi` (`id`, `id_surat`, `kpd_yth`, `isi_disposisi`, `sifat`, `batas_waktu`, `catatan`, `kpd_yth_2`, `isi_disposisi_2`, `tgl_dis_2`) VALUES
(12, 47, 'nama kasubag', 'isi disposisi dari kepala ke kasubag', 'Biasa', '2021-02-15', 'catatan dari kepala ke kasubag', 'nama pelaksana1', 'isi disposisi kasubag ke pelaksana 1', '2021-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `t_pejabat`
--

CREATE TABLE `t_pejabat` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `path_ttd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pejabat`
--

INSERT INTO `t_pejabat` (`id`, `nama`, `nip`, `jabatan`, `path_ttd`) VALUES
(1, 'nama camat', '199003262017011001', 'camat', '2.png'),
(2, 'nama sekcam', '199003262017011001', 'sekcam', '1.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_keluar`
--

CREATE TABLE `t_surat_keluar` (
  `id` int(6) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `no_agenda` varchar(7) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `isi_ringkas` mediumtext NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `indeks` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_catat` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `pengolah` int(11) NOT NULL,
  `catatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_surat_keluar`
--

INSERT INTO `t_surat_keluar` (`id`, `kode`, `no_agenda`, `perihal`, `isi_ringkas`, `tujuan`, `no_surat`, `indeks`, `tgl_surat`, `tgl_catat`, `keterangan`, `file`, `pengolah`, `catatan`) VALUES
(1, '000', '0001', 'IYA', 'Pengajuan Pencetakan E-KTP', 'DISDUKCAPIL', '474.1/23/III/PEM', '00', '2016-03-26', '2016-03-26', 'PEMERINTAHAN', '', 1, 'tidak ada'),
(2, '000', '0002', 'IYA', 'cepat', 'DISDUKCAPIL', '123', '', '2016-04-28', '2016-04-28', 'PEMERINTAHAN', '', 1, ''),
(3, '100', '0003', 'SATU', 'PENGUMUMAN', 'PEMDA', '01', '', '2016-04-30', '2016-04-30', 'PEMERINTAHAN', '', 1, ''),
(4, '100', '0004', 'APA AJA', 'ABC', 'DINAS', '0001', '-', '2016-05-01', '2016-05-01', 'PEM', '', 1, 'apa'),
(6, '1', '0005', '1', '1', '1', '1', '1', '2016-05-01', '2016-05-01', 'AA', '', 1, '11111'),
(7, '000', '0001', 'Ijin', 'Sosialisasi mengenai pelayanan di masa Pandemi', 'DISDUKCAPIL', '001', '', '2020-08-08', '2020-08-08', 'PELAYANAN', '', 2, 'CC');

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_keputusan`
--

CREATE TABLE `t_surat_keputusan` (
  `id` int(6) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `tahun` varchar(7) NOT NULL,
  `tentang` mediumtext NOT NULL,
  `tgl_surat` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `pengolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_masuk`
--

CREATE TABLE `t_surat_masuk` (
  `id` int(6) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `no_agenda` varchar(7) NOT NULL,
  `indek_berkas` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `isi_ringkas` mediumtext NOT NULL,
  `dari` varchar(250) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `pengolah` int(11) DEFAULT NULL,
  `tgl_selesai` date NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `pelaksana` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_surat_masuk`
--

INSERT INTO `t_surat_masuk` (`id`, `kode`, `no_agenda`, `indek_berkas`, `kegiatan`, `isi_ringkas`, `dari`, `no_surat`, `tgl_surat`, `tgl_diterima`, `keterangan`, `file`, `pengolah`, `tgl_selesai`, `jenis`, `status`, `pelaksana`) VALUES
(47, '1', '0001', '', 'Perihal isi', 'isi ringkasan surat', 'Kecamatan kidul', '01nomorsurat', '2021-02-15', '2021-02-15', 'Nur Akhwan', 'kkmaluku.JPG', 2, '2021-02-22', '3', 3, 'pelaksana1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ref_jenis`
--
ALTER TABLE `ref_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_klasifikasi`
--
ALTER TABLE `ref_klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_instansi`
--
ALTER TABLE `tr_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_disposisi`
--
ALTER TABLE `t_disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pejabat`
--
ALTER TABLE `t_pejabat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `t_surat_keluar`
--
ALTER TABLE `t_surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_surat_keputusan`
--
ALTER TABLE `t_surat_keputusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_surat_masuk`
--
ALTER TABLE `t_surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ref_jenis`
--
ALTER TABLE `ref_jenis`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_klasifikasi`
--
ALTER TABLE `ref_klasifikasi`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tr_instansi`
--
ALTER TABLE `tr_instansi`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_disposisi`
--
ALTER TABLE `t_disposisi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_pejabat`
--
ALTER TABLE `t_pejabat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_surat_keluar`
--
ALTER TABLE `t_surat_keluar`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_surat_keputusan`
--
ALTER TABLE `t_surat_keputusan`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_surat_masuk`
--
ALTER TABLE `t_surat_masuk`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
