-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 08:50 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pajak_reklame`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `nama`, `nip`, `alamat`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Admin  Pajak', '1000157', 'Banguntapan, Bantul', 'Admin'),
(3, 'angger', '98ab87d1d9404306227f39d4e96a8d87', 'governante11@gmail.com', 'Angger Panji Pradipta Budi', '1010001', 'Jalan Menur 03', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_sewa_reklame`
--

CREATE TABLE `daftar_sewa_reklame` (
  `id_daftar_sewa` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL DEFAULT '-',
  `uraian` text NOT NULL,
  `lokasi` varchar(50) NOT NULL DEFAULT '-',
  `jenis_reklame` varchar(70) NOT NULL,
  `harga` int(10) NOT NULL,
  `masa_pajak` int(4) NOT NULL,
  `jenis_sewa` enum('Permanen','Insidentil') NOT NULL,
  `status` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_sewa_reklame`
--

INSERT INTO `daftar_sewa_reklame` (`id_daftar_sewa`, `kelas`, `uraian`, `lokasi`, `jenis_reklame`, `harga`, `masa_pajak`, `jenis_sewa`, `status`) VALUES
(17, 'UTAMA', 'Dinilai Berdasarkan Sudut Pandang Yang Luas / Banyak Titik Strategis', 'Jl. Urip Sumoharjo', 'Megatron / Videotron', 1200000, 12, 'Permanen', 'No'),
(18, 'UTAMA', 'Dinilai Berdasarkan Sudut Pandang Yang Luas / Banyak Titik Strategis', 'Jl. Urip Sumoharjo', 'Billboard / Bando Jalan (Bersinar / Disinari)', 1000000, 12, 'Permanen', 'Yes'),
(19, 'UTAMA', 'Dinilai Berdasarkan Sudut Pandang Yang Luas / Banyak Titik Strategis', 'Jl. Urip Sumoharjo', 'Billboard / Bando Jalan (Tidak Bersinar / Tidak Disinari)', 800000, 12, 'Permanen', 'Yes'),
(20, 'UTAMA', 'Dinilai Berdasarkan Sudut Pandang Yang Luas / Banyak Titik Strategis', 'Jl. Urip Sumoharjo', 'Papan Seng / Tembok/ Vinil (Bersinar / Disinari)', 200000, 12, 'Permanen', 'No'),
(21, 'UTAMA', 'Dinilai Berdasarkan Sudut Pandang Yang Luas / Banyak Titik Strategis', 'Jl. Urip Sumoharjo', 'Papan Seng / Tembok/ Vinil (Tidak Bersinar / Tidak Disinari)', 160000, 12, 'Permanen', 'No'),
(22, 'GOL A', 'Dinilai Berdasarkan Aspek Kegiatan Dibidang Usaha, Pasar, Pertokoan', 'Jl. Dr. Cipto', 'Megatron / Videotron', 1000000, 12, 'Permanen', 'No'),
(23, 'GOL A', 'Dinilai Berdasarkan Aspek Kegiatan Dibidang Usaha, Pasar, Pertokoan', 'Jl. Dr. Cipto', 'Billboard / Bando Jalan (Bersinar / Disinari)', 700000, 12, 'Permanen', 'No'),
(24, 'GOL A', 'Dinilai Berdasarkan Aspek Kegiatan Dibidang Usaha, Pasar, Pertokoan', 'Jl. Dr. Cipto', 'Billboard / Bando Jalan (Tidak Bersinar / Tidak Disinari)', 600000, 12, 'Permanen', 'No'),
(25, 'GOL A', 'Dinilai Berdasarkan Aspek Kegiatan Dibidang Usaha, Pasar, Pertokoan', 'Jl. Dr. Cipto', 'Papan Seng / Tembok/ Vinil (Bersinar / Disinari)', 200000, 12, 'Permanen', 'No'),
(27, 'GOL A', 'Dinilai Berdasarkan Aspek Kegiatan Dibidang Usaha, Pasar, Pertokoan', 'Jl. Dr. Cipto', 'Papan Seng / Tembok/ Vinil (Tidak Bersinar / Tidak Disinari)', 140000, 12, 'Permanen', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `no_rek` varchar(25) NOT NULL,
  `bank` varchar(25) NOT NULL DEFAULT '-',
  `pajak` int(9) NOT NULL,
  `jumlah_bayar` int(9) NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `bukti_bayar` text NOT NULL,
  `status_verifikasi` enum('Yes','No','Proses','Ditolak') NOT NULL DEFAULT 'Proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_sewa`, `no_rek`, `bank`, `pajak`, `jumlah_bayar`, `tanggal_bayar`, `bukti_bayar`, `status_verifikasi`) VALUES
(5, 8, '-1463', 'BRI', 2000000, 8000000, '2020-01-03 12:34:44', 'BUKTI-2020-01-03-123444-Chrysanthemum.jpg', 'Yes'),
(6, 9, '-1463', 'BRI', 1200000, 4800000, '2020-01-06 16:42:35', 'BUKTI-2020-01-06-044235-Hydrangeas.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id_pimpinan` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'Pimpinan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`id_pimpinan`, `username`, `password`, `email`, `nama`, `nip`, `alamat`, `role`) VALUES
(1, 'pimpinan', 'a1475279de60efc1b418fa651f695384', 'pimpinan@gmail.com', 'Pimpinan Perusahaan', '1000158', 'Kota Yogyakarta', 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_wp` int(11) NOT NULL,
  `id_daftar_sewa` int(11) NOT NULL,
  `tanggal_selesai_sewa` datetime NOT NULL,
  `judul` text NOT NULL,
  `ukuran` smallint(6) NOT NULL,
  `total_bayar` int(9) NOT NULL,
  `tanggal_sewa` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_wp`, `id_daftar_sewa`, `tanggal_selesai_sewa`, `judul`, `ukuran`, `total_bayar`, `tanggal_sewa`) VALUES
(8, 1, 18, '2021-01-03 06:33:14', 'I Club Madiun', 8, 8000000, '2020-01-03 12:33:14'),
(9, 1, 19, '2021-01-06 10:39:39', '', 6, 4800000, '2020-01-06 16:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `wajib_pajak`
--

CREATE TABLE `wajib_pajak` (
  `id_wp` int(11) NOT NULL,
  `no_formulir` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `notelp_instansi` varchar(12) NOT NULL,
  `kodepos_instansi` varchar(12) NOT NULL,
  `no_suratizin_instansi` varchar(20) NOT NULL,
  `tgl` datetime NOT NULL,
  `bidang_usaha` varchar(30) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `alamat_pemilik` text NOT NULL,
  `notelp_pemilik` varchar(12) NOT NULL,
  `kodepos_pemilik` varchar(12) NOT NULL,
  `npwpd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wajib_pajak`
--

INSERT INTO `wajib_pajak` (`id_wp`, `no_formulir`, `email`, `password`, `nama_instansi`, `alamat_instansi`, `notelp_instansi`, `kodepos_instansi`, `no_suratizin_instansi`, `tgl`, `bidang_usaha`, `nama_pemilik`, `jabatan`, `alamat_pemilik`, `notelp_pemilik`, `kodepos_pemilik`, `npwpd`) VALUES
(1, 'FRM-1000001', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Test', 'Jl. Test', '08000000000', '10101', '101010101010101', '2019-12-02 00:00:00', 'Jasa', 'Test Pertama', 'Manager', 'Jl. Test Pemilik', '08000000001', '10101', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `daftar_sewa_reklame`
--
ALTER TABLE `daftar_sewa_reklame`
  ADD PRIMARY KEY (`id_daftar_sewa`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_wp` (`id_wp`),
  ADD KEY `id_daftar_sewa` (`id_daftar_sewa`);

--
-- Indexes for table `wajib_pajak`
--
ALTER TABLE `wajib_pajak`
  ADD PRIMARY KEY (`id_wp`),
  ADD UNIQUE KEY `no_formulir` (`no_formulir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daftar_sewa_reklame`
--
ALTER TABLE `daftar_sewa_reklame`
  MODIFY `id_daftar_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id_pimpinan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wajib_pajak`
--
ALTER TABLE `wajib_pajak`
  MODIFY `id_wp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`);

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_wp`) REFERENCES `wajib_pajak` (`id_wp`),
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_daftar_sewa`) REFERENCES `daftar_sewa_reklame` (`id_daftar_sewa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
