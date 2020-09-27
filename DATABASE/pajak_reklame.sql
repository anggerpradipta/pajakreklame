-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2019 at 04:44 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pajak_reklame`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `nama`, `nip`, `alamat`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Admin  Pajak', '1000157', 'Banguntapan, Bantul', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_sewa_reklame`
--

CREATE TABLE IF NOT EXISTS `daftar_sewa_reklame` (
  `id_daftar_sewa` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(20) NOT NULL DEFAULT '-',
  `uraian` text NOT NULL,
  `lokasi` varchar(50) NOT NULL DEFAULT '-',
  `jenis_reklame` varchar(70) NOT NULL,
  `harga` int(10) NOT NULL,
  `masa_pajak` int(4) NOT NULL,
  `jenis_sewa` enum('Permanen','Insidentil') NOT NULL,
  `status` enum('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id_daftar_sewa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `daftar_sewa_reklame`
--

INSERT INTO `daftar_sewa_reklame` (`id_daftar_sewa`, `kelas`, `uraian`, `lokasi`, `jenis_reklame`, `harga`, `masa_pajak`, `jenis_sewa`, `status`) VALUES
(1, 'Utama', 'Dinilai dari sudut pandan yang luas / banyak titik strategis', 'Jl. Urip Sumoharjo', 'Megatron/Videotron', 1200000, 12, 'Permanen', 'Yes'),
(2, 'Utama', 'Dinilai dari sudut pandan yang luas / banyak titik strategis', 'Jl. Ahmad Yani', 'Bersinar/Disinari', 1000000, 12, 'Permanen', 'No'),
(3, 'GOL A', 'Dinilai berdasarkan aspek kegiatan dibidang usaha, pasar, pertokoan', 'Jl. Dr. Cipto', 'Tidak Bersinar/Tidak Disinari', 600000, 12, 'Permanen', 'No'),
(4, 'GOL B', 'Dinilai berdasarkan kelas utama dan Dol A', 'Kota Madiun', 'Megatron/Videotron', 1000000, 12, 'Permanen', 'Yes'),
(5, '-', '-', '-', 'Baliho / Tenda', 160000, 1, 'Insidentil', 'No'),
(6, '-', '-', '-', 'Reklame Papan', 40000, 1, 'Insidentil', 'No'),
(14, 'GOL A', 'dasd d asdasdas', 'asdas', 'Brosur', 10000, 1, 'Permanen', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_sewa` int(11) NOT NULL,
  `no_rek` varchar(25) NOT NULL,
  `bank` varchar(25) NOT NULL DEFAULT '-',
  `pajak` int(9) NOT NULL,
  `jumlah_bayar` int(9) NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `bukti_bayar` text NOT NULL,
  `status_verifikasi` enum('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_sewa` (`id_sewa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_sewa`, `no_rek`, `bank`, `pajak`, `jumlah_bayar`, `tanggal_bayar`, `bukti_bayar`, `status_verifikasi`) VALUES
(1, 1, '12312312', 'dsa', 3000000, 12000000, '2019-12-06 03:45:39', 'BUKTI-2019-12-06-034539-depositphotos_114331910-stock-illustration-initial-letter-rw-red-swoosh.jpg', 'Yes'),
(2, 5, '123123123', 'BNI', 2400000, 12000000, '2019-12-06 03:51:18', 'BUKTI-2019-12-06-035118-logotitle.png', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE IF NOT EXISTS `pimpinan` (
  `id_pimpinan` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'Pimpinan',
  PRIMARY KEY (`id_pimpinan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`id_pimpinan`, `username`, `password`, `email`, `nama`, `nip`, `alamat`, `role`) VALUES
(1, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'pimpinan@gmail.com', 'Pimpinan Perusahaan', '1000158', 'Kota Yogyakarta', 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE IF NOT EXISTS `sewa` (
  `id_sewa` int(11) NOT NULL AUTO_INCREMENT,
  `id_wp` int(11) NOT NULL,
  `id_daftar_sewa` int(11) NOT NULL,
  `tanggal_selesai_sewa` datetime NOT NULL,
  `judul` text NOT NULL,
  `ukuran` smallint(6) NOT NULL,
  `total_bayar` int(9) NOT NULL,
  `tanggal_sewa` datetime NOT NULL,
  PRIMARY KEY (`id_sewa`),
  KEY `id_wp` (`id_wp`),
  KEY `id_daftar_sewa` (`id_daftar_sewa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_wp`, `id_daftar_sewa`, `tanggal_selesai_sewa`, `judul`, `ukuran`, `total_bayar`, `tanggal_sewa`) VALUES
(1, 1, 4, '2019-12-03 01:32:14', 'Konveksi', 12, 12000000, '2019-12-03 00:00:00'),
(5, 1, 1, '2020-12-05 07:25:05', 'panorama ', 8, 12000000, '2019-12-05 13:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `wajib_pajak`
--

CREATE TABLE IF NOT EXISTS `wajib_pajak` (
  `id_wp` int(11) NOT NULL AUTO_INCREMENT,
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
  `npwpd` varchar(20) NOT NULL,
  PRIMARY KEY (`id_wp`),
  UNIQUE KEY `no_formulir` (`no_formulir`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wajib_pajak`
--

INSERT INTO `wajib_pajak` (`id_wp`, `no_formulir`, `email`, `password`, `nama_instansi`, `alamat_instansi`, `notelp_instansi`, `kodepos_instansi`, `no_suratizin_instansi`, `tgl`, `bidang_usaha`, `nama_pemilik`, `jabatan`, `alamat_pemilik`, `notelp_pemilik`, `kodepos_pemilik`, `npwpd`) VALUES
(1, 'FRM-1000001', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Test', 'Jl. Test', '08000000000', '10101', '101010101010101', '2019-12-02 00:00:00', 'Jasa', 'Test Pertama', 'Manager', 'Jl. Test Pemilik', '08000000001', '10101', '123456789');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
