-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 02:34 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aset`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_area`
--

CREATE TABLE `tb_area` (
  `no_id` int(3) NOT NULL,
  `id_area` varchar(20) NOT NULL,
  `nama_area` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0:nonaktif, 1:aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_area`
--

INSERT INTO `tb_area` (`no_id`, `id_area`, `nama_area`, `alamat`, `status`) VALUES
(1, 'APD', 'Area Pengatur Distribusi', 'Jl. Embong Wungu No.4, Surabaya', 1),
(3, 'BWG', 'Banyuwangi', 'Jl. Nusantara No.1 Banyuwangi', 1),
(4, 'GRK', 'Gresik', 'Jl. Dr. Wahidin Sudiro Husodo No.134 Gresik', 1),
(5, 'JBR', 'Jember', 'Jl. Gajah Mada No.198 Jember', 1),
(6, 'KDR', 'Kediri', 'Jl. Basuki Rahmad No.03 Kediri', 1),
(7, 'MDN', 'Madiun', 'Jl. MT Haryono No.30, Madiun', 1),
(8, 'MJK', 'Mojokerto', 'Jl. Ra. Basuni 67 Mojokerto', 1),
(9, 'MLG', 'Malang', 'Jl. Basuki Rahmat No.100 Malang', 1),
(10, 'PKS', 'Pamekasan', 'Jl. Joko Tole 127-A, Pamekasan', 1),
(11, 'PNG', 'Ponorogo', 'Jl. Dr. Soetomo No.34, Ponorogo', 1),
(12, 'PSR', 'Pasuruan', 'Jl. Pb Sudirman No. 69, Pasuruan', 1),
(13, 'SBB', 'Surabaya Barat', 'Jl Raya Taman No. 48D Sepanjang Surabaya', 1),
(14, 'SBS', 'Surabaya Selatan', 'Jl. Ngagel Timur 14 - 16 Surabaya', 1),
(15, 'SBU', 'Surabaya Utara', 'Jl. Gemblongan 64 Surabaya', 1),
(16, 'SDA', 'Sidoarjo', 'Jl. A. Yani No.47-49,Sidoarjo', 1),
(17, 'STB', 'Situbondo', 'Jl. Cempaka No.35, Situbondo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bangunan`
--

CREATE TABLE `tb_bangunan` (
  `id_tanah` varchar(16) DEFAULT NULL,
  `id_bangunan` int(11) NOT NULL,
  `nama_bangunan` varchar(100) DEFAULT NULL,
  `harga_bangunan` varchar(20) DEFAULT NULL,
  `luas_bangunan` varchar(10) DEFAULT NULL,
  `no_imb_bangunan` varchar(50) DEFAULT NULL,
  `status_layer` varchar(3) DEFAULT NULL,
  `status_terjual` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bangunan`
--

INSERT INTO `tb_bangunan` (`id_tanah`, `id_bangunan`, `nama_bangunan`, `harga_bangunan`, `luas_bangunan`, `no_imb_bangunan`, `status_layer`, `status_terjual`) VALUES
('1', 1, 'BANGUNAN GEDUNG UTAMA & LAHTA', '1334318419', '6575', '188.45/813-95/402.5.09/1992', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_as_tanah` varchar(16) DEFAULT NULL,
  `id_gudang` int(11) NOT NULL,
  `nama_gudang` varchar(100) DEFAULT NULL,
  `harga_gudang` varchar(20) DEFAULT NULL,
  `luas_gudang` varchar(10) DEFAULT NULL,
  `no_imb_gudang` varchar(50) DEFAULT NULL,
  `status_terjual_gd` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_as_tanah`, `id_gudang`, `nama_gudang`, `harga_gudang`, `luas_gudang`, `no_imb_gudang`, `status_terjual_gd`) VALUES
('1', 1, 'GUDANG TAMBAK LANGON', '800000000', '2619', '188/1668.94/402.5.09/1995', '2'),
('1', 2, 'coba 1', '9000000', '1000', '188/1668.94/402.5.09/2000', '1'),
('1', 3, 'coba 2', '100000000', '1000', '188/1668.94/402.5.09/1999', '3'),
('1', 4, 'coba 3', '200000000', '1000', '188/1668.94/402.5.09/1996', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `id_plant` int(11) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `id_plant`, `nama_lokasi`, `alamat`, `id_provinsi`, `kabupaten`, `kecamatan`, `kode_pos`, `lat`, `lng`) VALUES
(510100001, 1, 'LOKASI KANTOR DISTRIBUSI', 'JL. EMBONG TRENGGULI 9 - 21', 1, 'SURABAYA', 'GENTENG', '60271', -7.265226, 112.744),
(510100002, 2, 'LOKASI MASJID', 'JL. EMBONG TRENGGULI 9 - 21', 1, 'SURABAYA', 'GENTENG', '60271', -7.120398, 112.121),
(510100003, 3, 'LOKASI MASJID 1', 'Kletek', 1, 'Sidoarjo', 'Taman', '12', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_notif`
--

CREATE TABLE `tb_notif` (
  `id_notif` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `kategori` int(1) DEFAULT NULL COMMENT '1: pengajuan oleh area, 2: pengajuan oleh admin(distribusi), 3:persetujuan oleh aset, 4: persetujuan oleh distribusi',
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0: menunggu, 1: disetujui, 2: ditolak',
  `dilihat` int(1) NOT NULL DEFAULT 0 COMMENT '0: blm diliat, 1: sudh diliat',
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_notif`
--

INSERT INTO `tb_notif` (`id_notif`, `id_user`, `id_proyek`, `kategori`, `status`, `dilihat`, `last_update`) VALUES
(1, 3, 29, 3, 1, 1, '2018-08-04 10:07:50'),
(2, 3, 30, 5, 2, 1, '2018-08-21 09:38:23'),
(3, 3, 31, 3, 1, 1, '2018-08-21 09:44:30'),
(4, 3, 32, 3, 1, 1, '2018-08-21 09:44:41'),
(5, 3, 33, 5, 2, 1, '2018-08-21 09:45:00'),
(6, 3, 34, 5, 2, 1, '2018-08-21 09:45:14'),
(7, 3, 35, 3, 1, 1, '2021-07-03 00:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(3) NOT NULL,
  `nama_pengajuan` text NOT NULL,
  `distribusi` varchar(200) DEFAULT NULL,
  `thn_pengajuan` year(4) NOT NULL,
  `id_rayon` varchar(20) DEFAULT NULL,
  `id_area` varchar(20) DEFAULT NULL,
  `lokasi_pengajuan` text NOT NULL,
  `nilai_pengajuan` float NOT NULL,
  `uraian_pekerjaan` varchar(255) NOT NULL,
  `data_pendukung` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0:nunggu, 1:setujui by dist, 2:tolak by dist, 3: setujui by aset, 4: tolak by aset',
  `alasan_tolak` text NOT NULL,
  `tgl_pengajuan` datetime NOT NULL DEFAULT current_timestamp(),
  `request_id` int(11) NOT NULL,
  `approval_id` int(11) NOT NULL,
  `nilai_persetujuan` float NOT NULL,
  `kategori` int(1) NOT NULL COMMENT '1: area, 2:rayon, 3:distribusi',
  `approval_aset_id` int(11) DEFAULT NULL,
  `approval_aset_reason` text DEFAULT NULL,
  `approval_aset_date` datetime DEFAULT NULL,
  `persetujuan_setengah` int(1) NOT NULL DEFAULT 0,
  `id_tanah` varchar(20) NOT NULL,
  `id_wisma` varchar(20) NOT NULL,
  `id_gudang` varchar(20) NOT NULL,
  `id_bangunan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `nama_pengajuan`, `distribusi`, `thn_pengajuan`, `id_rayon`, `id_area`, `lokasi_pengajuan`, `nilai_pengajuan`, `uraian_pekerjaan`, `data_pendukung`, `status`, `alasan_tolak`, `tgl_pengajuan`, `request_id`, `approval_id`, `nilai_persetujuan`, `kategori`, `approval_aset_id`, `approval_aset_reason`, `approval_aset_date`, `persetujuan_setengah`, `id_tanah`, `id_wisma`, `id_gudang`, `id_bangunan`) VALUES
(2, 'pengajuan 1', 'Distribusi Jawa Timur', 2018, '', 'JBR', 'Jl. Gajah Mada No.198 Jember', 700, '', 'freebie-bootstrap-footers.zip', 4, 'alasan tolak distribusi', '2017-03-11 00:04:30', 4, 1, 999, 1, 1, '', '2018-07-24 01:57:11', 1, '0', '0', '0', '0'),
(5, 'perbaikan pos satpam', 'Distribusi Jawa Timur', 2018, '', 'JBR', 'Jl. Gajah Mada No.198 Jember', 15000000, '', 'freebie-bootstrap-footers.zip', 4, '', '2018-03-13 19:54:29', 4, 0, 99999, 1, NULL, NULL, NULL, 0, '0', '0', '0', '0'),
(8, 'testing pengajuan', 'Distribusi Jawa Timur', 2018, '', 'JBR', 'Jl. Gajah Mada No.198 Jember', 1500, '', 'freebie-bootstrap-footers.zip', 4, '', '2018-04-16 21:26:19', 4, 0, 99999, 1, 8, NULL, '2018-04-16 21:27:54', 0, '0', '0', '0', '0'),
(9, 'Perbaikan Arena Parkir', 'Distribusi Jawa Timur', 2018, '', 'JBR', 'Jl. Gajah Mada No.198 Jember', 20000000, '', '4119.zip', 4, 'alasan ditolak distribusi', '2018-04-20 08:48:07', 4, 3, 10000000, 1, 1, 'alasan persetujuan setengah', '2018-07-24 02:41:01', 1, '0', '0', '0', '0'),
(11, 'bangun rumah ', 'Distribusi Jawa Timur', 2018, '51605', 'MLG', 'Jl. Manggar No. 125 Ambulu', 12000000, '', 'freebie-bootstrap-footers.zip', 1, '', '2018-04-25 19:46:34', 13, 14, 99999, 2, 10, '', '2018-04-25 20:02:37', 0, '0', '1', '0', '0'),
(12, 'bangun gudang', 'Distribusi Jawa Timur', 2018, '51606', 'JBR', 'Jl. Raya Klakah No. 120 Klakah', 90000000, '', 'freebie-bootstrap-footers.zip', 1, '', '2018-04-25 22:04:07', 13, 14, 99999, 2, 10, '', '2018-04-25 22:08:37', 1, '1', '0', '0', '0'),
(26, 'pembangunan pintu kamar mandi', 'Distribusi Jawa Timur', 2018, '', 'MLG', 'Jl. emboh wes mek gae njajal kok', 100000, 'membangun pintu ruangan server (uraian)', 'dist.rar', 1, '', '2018-07-24 14:50:15', 3, 0, 50000, 1, 1, '50 cukup yak, jangan mayak ', '2018-07-24 02:51:40', 1, '', '', '', '1'),
(27, 'Perawatan Rumah', 'Distribusi Jawa Timur', 2018, '51314', 'MLG', 'Jl. Terusan Ambara No.59', 5000000, 'perbaikan ( lantai, atap dan tembok ) dan meperbarui cat', 'svgtopng.zip', 1, '', '2018-07-26 09:21:27', 3, 0, 4000000, 1, 1, 'Keterangan dari Aset', '2018-07-26 09:26:35', 1, '', '1', '', ''),
(28, 'olo1', 'Distribusi Jawa Timur', 2018, '', 'MLG', 'kediriasdasd', 99999, 'dfsdfdsfdsf', 'are-you-human-neodo-inganini-tv_indonesian-1807301.zip', 1, '', '2018-07-31 08:19:19', 3, 0, 70000000, 1, 1, 'hemmm', '2018-08-04 10:02:37', 1, '1', '', '', ''),
(29, 'Pembangunan Gedung A', 'Distribusi Jawa Timur', 2018, '51313', 'MLG', 'Malang Kota', 90000000, 'Membangun keseluruhan', 'PemGame.zip', 1, '', '2018-08-04 10:06:12', 3, 0, 0, 1, NULL, NULL, '2018-08-04 10:07:50', 0, '1', '', '', ''),
(30, 'Pembangunan Masjid 1', 'Distribusi Jawa Timur', 2018, '51312', 'MLG', 'Blimbing', 90000000, 'Membangun Masjid, dll', 'lampiran kegiatan harian.docx', 4, 'elek proyeke', '2018-08-21 05:43:05', 3, 0, 0, 1, NULL, NULL, NULL, 0, '1', '', '', ''),
(31, 'Pembangunan Masjid 1', 'Distribusi Jawa Timur', 2018, '51312', 'MLG', 'coba', 999999, 'coba', 'coba.zip', 1, '', '2018-08-21 06:06:52', 3, 0, 800000, 1, 1, 'ok', '2018-08-21 09:44:30', 1, '1', '', '', ''),
(32, 'Pembangunan Masjid 2', 'Distribusi Jawa Timur', 2018, '51312', 'MLG', 'Blimbing', 90000000, 'coba', 'ADS_1_C-master.zip', 1, '', '2018-08-21 06:08:15', 3, 0, 80000000, 1, 1, 'saya kurangi 10 jt', '2018-08-21 09:44:41', 1, '1', '', '', ''),
(33, 'Pembangunan Masjid 3', 'Distribusi Jawa Timur', 2018, '51312', 'MLG', 'Blimbing', 1111, 'aaaa', 'SAMSUNG_USB_Driver_for_Mobile_Phones.zip', 4, 'kurang bangus', '2018-08-21 09:04:38', 3, 0, 8000, 1, 1, 'bbbbb', '2018-08-21 09:20:56', 1, '', '', '', '1'),
(34, 'Pembangunan Masjid 4', 'Distribusi Jawa Timur', 2018, '51312', 'MLG', 'aaaa', 1111, 'aaaa', 'projectGameMipa-20180411T145521Z-001.zip', 4, 'kurang bangus', '2018-08-21 09:07:09', 3, 0, 9000, 1, 1, 'josssss', '2018-08-21 09:16:46', 1, '', '', '', '1'),
(35, 'Pembangunan Perpustakaan', 'Distribusi Jawa Timur', 2018, '51313', 'MLG', 'Malang kota', 1111, 'coba', 'PemGame.zip', 1, '', '2018-08-27 11:04:52', 3, 0, 0, 1, NULL, NULL, '2021-07-03 12:08:32', 0, '1', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_plant`
--

CREATE TABLE `tb_plant` (
  `id_plant` int(11) NOT NULL,
  `nama_plant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_plant`
--

INSERT INTO `tb_plant` (`id_plant`, `nama_plant`) VALUES
(1, 'Plant 1'),
(2, 'Plant 2'),
(3, 'Plant 3'),
(4, 'Plant 4'),
(5, 'Plant 5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `provinsi_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_provinsi`, `provinsi_nama`) VALUES
(5, ' Sumatera'),
(7, 'Bali'),
(2, 'Jawa Barat'),
(3, 'Jawa Tengah'),
(1, 'Jawa Timur'),
(6, 'Kalimantan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rayon`
--

CREATE TABLE `tb_rayon` (
  `no_id` int(11) NOT NULL,
  `no_id_area` int(11) NOT NULL,
  `id_rayon` varchar(20) NOT NULL,
  `nama_rayon` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0:nonaktif, 1:aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rayon`
--

INSERT INTO `tb_rayon` (`no_id`, `no_id_area`, `id_rayon`, `nama_rayon`, `alamat`, `status`) VALUES
(1, 15, '51101', 'Indrapura', 'Jl. Indrapura No.48, Krembangan Sel., Krembangan, Kota SBY, Jawa Timur 60164', 1),
(2, 15, '51102', 'Ploso', 'Jalan Ploso Timur III No.1, Ploso, Tambaksari, Ploso, Surabaya, Kota SBY, Jawa Timur 60133', 1),
(3, 15, '51103', 'Tandes', 'Komplek pergudangan SuriMulya KavE4 MargoMulyo Kota SBY, Jawa Timur 60183', 1),
(4, 15, '51104', 'Perak', 'Jl. Tanjung Sadari No.82, Perak Bar., Krembangan, Kota SBY, Jawa Timur 60177', 1),
(5, 15, '51105', 'Kenjeran', 'Jl. Wiratno No.53 Surabaya', 1),
(6, 15, '51106', 'Embong Wungu', 'Jl. Embong Wungu No.4, Embong Kaliasin, Genteng, Kota SBY, Jawa Timur 60271', 1),
(7, 4, '51120', 'Giri', 'Jl. Dr Wahidin Sudiro Husodo No. 134 Gresik, Jawa Timur 61114', 1),
(8, 4, '51121', 'Sidayu', 'Jl. Pahlawan No.10 Sedayu, Kabupaten Gresik, Jawa Timur 61153', 1),
(9, 4, '51122', 'Benjeng', 'Jl. Raya Munggugianti No.42, Bengkelolor, Benjeng, Kabupaten Gresik, Jawa Timur 61172', 1),
(10, 4, '51123', 'Bawean', 'Jl. Pendidikan No.10 Sangkapura Bawean, Kabupaten Gresik, Jawa Timur 61181', 1),
(11, 14, '51140', 'Darmo Permai', 'Jl. Raya Darmo Permai Utara No.5, Pradahkalikendal, Dukuh Pakis, Kota SBY, Jawa Timur 60216', 1),
(12, 14, '51141', 'Dukuh Kupang', 'Jl. Raya Dukuh Kupang No.157, Pakis, Kec. Sawahan, Kota SBY, Jawa Timur 60225', 1),
(13, 14, '51142', 'Ngagel', 'Jl. Ngagel Timur No.14-16, Pucang Sewu, Gubeng, Kota SBY, Jawa Timur 60283', 1),
(14, 14, '51143', 'Rungkut', 'Jl. Rungkut Industri VIII No.27, Rungkut Kidul, Rungkut, Kota SBY, Jawa Timur 60291', 1),
(15, 14, '51146', 'Gedangan', 'Jl. Sawo Tratap Km.15, Sidoarjo', 1),
(19, 16, '51180', 'Sidoarjo Kota', 'Jalan Kombespol. M. Duryat No. 9, Sidoarjo, Sidokumpul, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61218', 1),
(20, 16, '51181', 'krian', 'JL. Ki Hajar Diwantoro No.11, Krian, Sidoarjo Regency, East Java 61262', 1),
(21, 16, '51182', 'Porong', 'Jl. Raya Porong, Mindi, Porong, Kabupaten Sidoarjo, Jawa Timur 61274', 1),
(22, 9, '51301', 'Lawang', 'Jl. Diponegoro N.10, Lawang, Malang', 1),
(23, 9, '51302', 'Bululawang', 'Jl. Raya Wandanpuro Bululawang, Malang Jawa Timur', 1),
(24, 9, '51303', 'Batu', 'Jl. Trunojoyo No. 14-A Batu, Malang Jawa Timur', 1),
(25, 9, '51304', 'Singosari', 'Jl. Kertanegara No. 64, Singosari, Malang Jawa Timur', 1),
(26, 9, '51305', 'Kepanjen', 'Jl. Panji No. 2 Kepanjen, Malang Jawa Timur', 1),
(27, 9, '51306', 'Tumpang', 'Jl. Tulusayu, Tumpang, Malang Jawa Timur', 1),
(28, 9, '51307', 'Gondanglegi', 'Jl. Pangeran Diponegoro No. 16, Gondanglegi, Malang Jawa Timur', 1),
(29, 9, '51308', 'Dampit', 'Jl. Gunung Jati No. 11 Dampit,Malang Jawa Timur', 1),
(30, 9, '51309', 'Ngantang', 'Jl. Raya Ngantang No. 4 Ngantang, malang Jawa Timur', 1),
(31, 9, '51310', 'Sumber Pucung', 'Jl. Raya Basuki Rahmad No. 9 Karangkates, Sumberpucung, Malang Jawa Timur', 1),
(32, 9, '51311', 'Dinoyo', 'Jl. MT. Haryono No. 189 Dinoyo, Malang', 1),
(33, 9, '51312', 'Blimbing', 'Jl. Raya Mangliawan No. 3 Blimbing, Malang', 1),
(34, 9, '51313', 'Malang Kota', 'Jl. Basuki Rahmad No. 100, Malang', 1),
(35, 9, '51314', 'Kebon Agung', 'Jl. Satsui Tubun Kebonagung Malang', 1),
(36, 12, '51350', 'Pasuruan Kota', 'Jl. Diponegoro No.1, Pasuruan, Jawa Timur 67114', 1),
(37, 12, '51351', 'Gondang Wetan', 'Jl. Raya Pasuruan-Malang km 7, Kajayan', 1),
(38, 12, '51352', 'Grati', 'Jl. Raya pasuruan-Probolinggo km 8 Desa. Kedung Pasuruan, Jawa Timur 67181', 1),
(39, 12, '51353', 'Bangil', 'Jl. Mangga No.68, Pogar, Bangil, Pasuruan, Jawa Timur 67153', 1),
(40, 12, '51354', 'Pandaan', 'Jl. Raya Kasri No.48, Petungasri, Pandaan, Pasuruan, Jawa Timur 67156', 1),
(41, 12, '513355', 'Prigen', 'Jl. Taman Wisata No.543 Prigen Kota Pasuruan, Jawa Timur 67114', 1),
(42, 12, '51356', 'Probolinggo', 'Jl. Dr Sutomo No.60 Probolinggo', 1),
(43, 12, '51357', 'Kraksaan', 'Jl. Rengganis No.99 Kraksaan', 1),
(44, 12, '51358', 'Sukorejo', 'Jl. Raya Bulu Agung No.56 Purwosari Pasuruan', 1),
(45, 6, '51401', 'Kediri Kota', 'Jl. Basuki Rahmat No.03 Kediri', 1),
(46, 6, '51402', 'Blitar', 'Jl. Ahmad Yani No.23, Blitar', 1),
(47, 6, '51403', 'Tulungagung', 'Jl. Kapten Kasihin No.55 Tulungagung', 1),
(48, 6, '51404', 'Ngunut', 'Jln. Adil No.44 Ngunut', 1),
(49, 6, '51405', 'Srengat', 'Jl. Raya Togogan No.24 Srengat', 1),
(50, 6, '51406', 'Pare', 'Jl. Panglima Sudirman No.25 Pare', 1),
(51, 6, '51408', 'Wlingi', 'Jl. Panglima Sudirman No.02 Wlingi Blitar', 1),
(52, 6, '51409', 'Sutojayan', 'Jl. Raya Utara Sutojayan No.54 Blitar', 1),
(53, 6, '51410', 'Ngadiluwih', 'Jl. Raya Rembang No.151 Ngadiluwih', 1),
(54, 6, '51411', 'Grogol', 'Jl. Raya Gringging No.15 grogol', 1),
(55, 6, '51412', 'Campur Darat', 'Jl. Kanigoro No.12 Campur Darat', 1),
(56, 8, '51450', 'Mojoagung', 'Jl. Raya Veteran No.347 Mojoagung', 1),
(57, 8, '51452', 'Mojokerto', 'Jl. Jend A.Yani No.06 Mojokerto ', 1),
(58, 8, '51453', 'Jombang', 'Jl. KH. Wachid Hasyim No.73 Jombang', 1),
(59, 8, '51454', 'Ngoro', 'Jl. Suropati No.05 Ngoro Jombang', 1),
(61, 8, '51456', 'Mojosari', 'Jl. Pemuda No.78 Mojosari Mojokerto', 1),
(62, 8, '51457', 'Pacet', 'Jl. Komand Hayam Wuruk Pacet', 1),
(63, 8, '51458', 'Kertosono', 'Jl. PB Sudirman No. 18 Kertosono', 1),
(64, 8, '51459', 'Warujayeng', 'Jl. Basuki Rachmad No.17 Warujeng Tanjung Anom', 1),
(65, 8, '51460', 'Nganjuk', 'Jl. Dr Sutomo No.54 Nganjuk', 1),
(66, 7, '51501', 'Madiun Kota', 'Jl. MT. Haryono No.30 Madiun', 1),
(67, 7, '51503', 'Magetan', 'Jl. Basuki Rachmad No.7 Magetan', 1),
(68, 7, '51504', 'Ngawi', 'Jl. Jaksa Agung Suprapto No.37 Ngawi', 1),
(69, 7, '51505', 'Maospati', 'Jl. Raya Maospati Madiun', 1),
(70, 7, '51507', 'Caruban', 'Jl. Raya Caruban Madiun', 1),
(71, 7, '51508', 'Dolopo', 'Jl. Raya Ponorogo No.246 Madiun', 1),
(72, 7, '51509', 'Mantingan', 'Jl. Raya Solo Madiun', 1),
(73, 11, '51540', 'Ponorogo', 'Jl. Dr. Soetomo No.34 Ponorogo', 1),
(74, 11, '51541', 'Balong', 'Jl. Pemuda No.86 Balong', 1),
(75, 11, '51542', 'Pacitan', 'Jl. Achmad Yani No.94 Pacitan', 1),
(76, 11, '51543', 'Trenggalek', 'Jl. Ki Mangunsarkoro No. 7 Trenggalek', 1),
(77, 5, '51601', 'Jember Kota', 'Jl. PB Sudirman No. 24 Jember', 1),
(78, 5, '51602', 'Lumajang', 'Jl. Jend. Sudirman N0. 24 Lumajang', 1),
(79, 5, '51603', 'Kalisat', 'Jl. Dr. Wahidin No. 20 Kalisat', 1),
(80, 5, '51604', 'Rambipuji', 'Jl. Mangunsarkoro No. 42 Rambipuji', 1),
(81, 5, '51605', 'Ambulu', 'Jl. Manggar No. 125 Ambulu', 1),
(82, 5, '51606', 'Klakah', 'Jl. Raya Klakah No. 120 Klakah', 1),
(83, 5, '51607', 'Tanggul', 'Jl. PB Sudirman No. 147-A Tanggul', 1),
(84, 5, '51608', 'Kencong', 'Jl. Kartini No. 4 Ds Wonorejo Kencong', 1),
(85, 5, '51609', 'Tempeh', 'Jl. Sukarno-Hatta depan kec. Tempeh', 1),
(86, 17, '51650', 'Panarukan', 'Jl. Cempaka No. 35 Situbondo', 1),
(87, 17, '51651', 'Besuki', 'Jl. Gunung Ijen No. 30 Besuki', 1),
(88, 17, '51652', 'Asembagus', 'Jl. Raya Asembagus No. 7 Asembagus', 1),
(89, 17, '51653', 'Bondowoso', 'Jl. Kol. Sugiono No. 30 Bondowoso', 1),
(90, 17, '51654', 'Wonosari', 'Ds Wonosari Kab. Situbondo', 1),
(91, 3, '51670', 'Banyuwangi Kota', 'Jl. Nusantara No.1 Banyuwangi', 1),
(92, 3, '51671', 'Rogojampi', 'Jl. Raya Lugonto No. 21 Rogojampi', 1),
(93, 3, '51672', 'Muncar', 'Jl. Raya Kedungrejo No. 60 Muncar', 1),
(94, 3, '51673', 'Genteng', 'Jl. Raya Gambiran No. 340 Genteng', 1),
(95, 3, '51675', 'Jajag', 'Jl. A. Yani No. 47 Jajak', 1),
(96, 10, '51700', 'Pamekasan', 'Jl. Kesehatan No. 1 Pamekasan', 1),
(97, 10, '51710', 'Sumenep', 'Jl. Urip Sumoharjo No. 3 Sumenep', 1),
(98, 10, '51720', 'Sampang', 'Jl. Trunojoyo No. 63 Sampang', 1),
(99, 10, '51730', 'Bangkalan', 'Jl. Letnan Mestu No. 4 Bangkalan', 1),
(100, 10, '51740', 'Kamal', 'Jl. Jeruk Raya Kamal', 1),
(101, 10, '51750', 'Ketapang', 'Jl. Raya Ketapang Barat No. 2 Ketapang', 1),
(102, 10, '51760', 'Blega', 'Jl. Jagalan No. 10 Blega', 1),
(103, 10, '51770', 'Prenduan', 'Jl. Raya Prenduan', 1),
(104, 10, '51780', 'Waru', 'Jl. Raya Waru No. 120 Waru', 1),
(105, 10, '51790', 'Ambunten', 'Jl. KH. As\'ari No. 22 Ambuten', 1),
(106, 2, '51801', 'Bojonegoro Kota', 'Jl. KH. Hasyim Ashari No. 3 Bojonegoro', 1),
(107, 2, '51802', 'Tuban', 'Jl. AKBP Suroko No. 36 Tuban', 1),
(109, 2, '51803', 'Lamongan', 'Jl. Veteran No. 36 Lamongan', 1),
(110, 2, '51804', 'Babat', 'Jl. Raya Plaosan No. 73 Babat', 1),
(111, 2, '51805', 'Padangan', 'Jl. Dr. Sutomo No. 4 Padangan', 1),
(112, 2, '51806', 'Brondong', 'Jl. Raya Paciran km 35 Paciran', 1),
(113, 2, '51807', 'Jatirogo', 'Jl. Raya Blora No. 621 Jatirogo', 1),
(114, 2, '51808', 'Sumber Rejo', 'Ds Sumberrejo kec. Sumberrejo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_kepemilikan`
--

CREATE TABLE `tb_status_kepemilikan` (
  `id_status` int(11) NOT NULL,
  `deskripsi_kepemilikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_kepemilikan`
--

INSERT INTO `tb_status_kepemilikan` (`id_status`, `deskripsi_kepemilikan`) VALUES
(5, 'Hak Pakai'),
(3, 'HGB'),
(4, 'HPL'),
(1, 'Milik Sendiri'),
(0, 'Pinjam Pakai'),
(2, 'Sewa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_layak`
--

CREATE TABLE `tb_status_layak` (
  `id_layak` int(11) NOT NULL,
  `deskripsi_layak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_layak`
--

INSERT INTO `tb_status_layak` (`id_layak`, `deskripsi_layak`) VALUES
(0, 'Layak'),
(1, 'Tidak Layak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_layer`
--

CREATE TABLE `tb_status_layer` (
  `id_layer` int(11) NOT NULL,
  `deskripsi_layer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_layer`
--

INSERT INTO `tb_status_layer` (`id_layer`, `deskripsi_layer`) VALUES
(1, 'Bangunan/Instansi'),
(3, 'coba'),
(2, 'Kantor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_pendayagunaan`
--

CREATE TABLE `tb_status_pendayagunaan` (
  `id_pendayagunaan` int(11) NOT NULL,
  `deskripsi_pendayagunaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_pendayagunaan`
--

INSERT INTO `tb_status_pendayagunaan` (`id_pendayagunaan`, `deskripsi_pendayagunaan`) VALUES
(3, 'BOT/BTO'),
(6, 'coba dulu'),
(1, 'Dipakai Sendiri'),
(2, 'Disewakan'),
(4, 'KSU'),
(5, 'Pinjam Pakai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_rumah`
--

CREATE TABLE `tb_status_rumah` (
  `id_rumah` int(11) NOT NULL,
  `deskripsi_rumah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_rumah`
--

INSERT INTO `tb_status_rumah` (`id_rumah`, `deskripsi_rumah`) VALUES
(6, 'coba dulu'),
(1, 'Rumah Jabatan'),
(2, 'Rumah Operasional 1'),
(3, 'Rumah Operasional 2'),
(4, 'Rumah Operasional 3'),
(5, 'Wisma');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_tanah`
--

CREATE TABLE `tb_status_tanah` (
  `id_status_tanah` int(11) NOT NULL,
  `desc_status_tanah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_tanah`
--

INSERT INTO `tb_status_tanah` (`id_status_tanah`, `desc_status_tanah`) VALUES
(1, 'value 1'),
(2, 'value 2'),
(3, 'value 3'),
(4, 'value 4'),
(5, 'value 5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_terjual`
--

CREATE TABLE `tb_status_terjual` (
  `id_terjual` int(11) NOT NULL,
  `deskripsi_terjual` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_terjual`
--

INSERT INTO `tb_status_terjual` (`id_terjual`, `deskripsi_terjual`) VALUES
(1, 'Belum Terjual'),
(4, 'cobalah'),
(3, 'Proses Lelang'),
(2, 'Terjual'),
(0, 'Tidak Dijual');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanah`
--

CREATE TABLE `tb_tanah` (
  `status_lokasi` varchar(9) DEFAULT NULL,
  `id_tanah` int(11) NOT NULL,
  `nama_tanah` varchar(100) DEFAULT NULL,
  `alamat_tanah` varchar(100) DEFAULT NULL,
  `harga_tanah` varchar(20) DEFAULT NULL,
  `luas_tanah` varchar(10) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `no_pbb` varchar(50) DEFAULT NULL,
  `biaya_pbb` varchar(50) DEFAULT NULL,
  `no_bphtb` varchar(50) DEFAULT NULL,
  `biaya_bphtb` varchar(50) DEFAULT NULL,
  `no_sertifikat` varchar(50) DEFAULT NULL,
  `tgl_berlaku_sertifikat` date DEFAULT NULL,
  `tgl_berakhir_sertifikat` date DEFAULT NULL,
  `status_pendayagunaan` varchar(3) DEFAULT NULL,
  `status_kepemilikan` varchar(3) DEFAULT NULL,
  `status_tanah` varchar(3) DEFAULT NULL,
  `status_terjual` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tanah`
--

INSERT INTO `tb_tanah` (`status_lokasi`, `id_tanah`, `nama_tanah`, `alamat_tanah`, `harga_tanah`, `luas_tanah`, `latitude`, `longitude`, `no_pbb`, `biaya_pbb`, `no_bphtb`, `biaya_bphtb`, `no_sertifikat`, `tgl_berlaku_sertifikat`, `tgl_berakhir_sertifikat`, `status_pendayagunaan`, `status_kepemilikan`, `status_tanah`, `status_terjual`) VALUES
('510100001', 1, 'TANAH KANTOR DISTRIBUSI 1 (GEDUNG UTAMA & LAHTA)', 'JL. EMBONG TRENGGULI 19 - 21', '3837518322', ' 1885 ', '-7.265226', '112.744', '35.78.110.001.005.0058-0', '260752872', '35.78.110.001.005.0058-0', '105400716000', '12.39.07.01.3.00928', '2015-04-14', '2035-01-19', '1', '2', '2', '1'),
('510100002', 17, 'Coba1', 'Coba1', '90000000', '9000', '989898', '-989898', '12345aa', '12345', '12345bb', '12345', 'Coba1bb99', '2018-07-01', '2021-04-07', '2', '3', '2', '1'),
('510100001', 18, 'coba 7', 'Malang', '70000000', '5000', '-56789', '6789', '123zxc', '12345', '123zxc', '123456', '123zxc', '2018-01-01', '2018-12-01', '1', '1', '2', '1'),
('510100001', 19, 'coba 99', 'Malang', '70000000', '5000', '-56789', '6789', '123zxc', '12345', '123zxc', '123456', '123zxc', '2018-01-01', '2018-12-01', '1', '1', '2', '1'),
('510100001', 20, 'coba 5', 'Malang', '70000000', '5000', '-56789', '6789', '123zxc', '12345', '123zxc', '123456', '123zxc', '2018-01-01', '2018-12-01', '1', '1', '2', '1'),
('510100001', 21, 'coba 6', 'Malang', '70000000', '5000', '-56789', '6789', '123zxc', '12345', '123zxc', '123456', '123zxc', '2018-01-01', '2018-12-01', '1', '1', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(21) NOT NULL,
  `jenkel` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0:nonaktif, 1:aktif',
  `jabatan` varchar(100) NOT NULL COMMENT 'admin, distribusi, area, aset',
  `register_date` datetime NOT NULL DEFAULT current_timestamp(),
  `register_user` int(11) NOT NULL,
  `edit_user` int(11) NOT NULL,
  `edit_date` datetime DEFAULT NULL,
  `id_area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `alamat`, `nohp`, `jenkel`, `email`, `username`, `password`, `status`, `jabatan`, `register_date`, `register_user`, `edit_user`, `edit_date`, `id_area`) VALUES
(0, 'Distribusi', 'Surabaya', 'xxx', 'Perempuan', 'distribusi@pln.com', 'distribusi', '4d307b8ca652189ab51e2ee6f1fe8362', 1, 'distribusi', '2018-07-09 08:02:56', 1, 1, '2018-08-25 06:46:30', ''),
(1, 'Aset', 'Surabaya', 'xxx', 'Laki-Laki', 'aset@pln.com', 'aset', '7290cb75ca9c09468fa6c93b981766a3', 1, 'aset', '2018-07-09 01:35:05', 1, 1, '2018-08-21 10:05:29', ''),
(2, 'SurabayaB', 'Surabaya', 'xxx', 'Laki-Laki', 'surabayaB@pln.com', 'sbyB', '8812f73aef011b413b48399bc78faaba', 1, 'area', '2018-07-10 14:54:13', 1, 1, '2018-07-19 08:24:38', 'SBB'),
(3, 'Malang', 'Malang', 'xxx', 'Laki-Laki', 'malang@pln.com', 'malang', 'e84d0187b2f21dbafec81fdfb597217d', 1, 'area', '2018-07-09 08:48:22', 1, 1, '2018-07-19 08:25:36', 'MLG'),
(4, 'Kediri', 'kediri 089', 'xxx', 'Laki-Laki', 'kediri@pln.com', 'kediri', 'f28b2a1d306946d72547678677d7cc70', 1, 'area', '2018-07-19 08:16:00', 1, 1, '2018-07-19 08:25:53', 'KDR'),
(5, 'Banyuwangi', 'Banyuwangi', 'xxx', 'Laki-Laki', 'banyuwangi@pln.com', 'banyuwangi', '3e06f2af88392a8943c423d7d36d307a', 1, 'area', '2018-07-18 13:08:43', 1, 1, '2018-07-19 08:00:40', 'BWG'),
(6, 'Jember', 'jember', 'xxx', 'Laki-Laki', 'jember@pln.com', 'jember', 'fa0b9d2012b890293e885df5cfb474b5', 1, 'area', '2018-07-12 12:56:27', 1, 1, '2018-07-19 08:26:07', 'JBR'),
(7, 'Gresik', 'gresik', '0877774', 'Laki-Laki', 'gresik@pln.com', 'gresik', '00fc02aea6898ced789cee7b4f4cb885', 1, 'area', '2018-08-18 14:50:13', 1, 0, NULL, 'GRK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wisma`
--

CREATE TABLE `tb_wisma` (
  `id_tanah` varchar(16) DEFAULT NULL,
  `id_wisma` int(11) NOT NULL,
  `nama_wisma` varchar(100) DEFAULT NULL,
  `harga_wisma` varchar(20) DEFAULT NULL,
  `luas_wisma` varchar(10) DEFAULT NULL,
  `no_imb_wisma` varchar(50) DEFAULT NULL,
  `status_rumah` varchar(3) DEFAULT NULL,
  `status_terjual` varchar(3) DEFAULT NULL,
  `status_layak` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wisma`
--

INSERT INTO `tb_wisma` (`id_tanah`, `id_wisma`, `nama_wisma`, `harga_wisma`, `luas_wisma`, `no_imb_wisma`, `status_rumah`, `status_terjual`, `status_layak`) VALUES
('1', 1, 'RUMAH JABATAN GENERAL MANAGER', '27549164', '1332', '188/0400.92/402.05.09/2001', '2', '3', '1'),
(NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_area`
--
ALTER TABLE `tb_area`
  ADD PRIMARY KEY (`no_id`),
  ADD UNIQUE KEY `nama_area` (`nama_area`);

--
-- Indexes for table `tb_bangunan`
--
ALTER TABLE `tb_bangunan`
  ADD PRIMARY KEY (`id_bangunan`),
  ADD UNIQUE KEY `nama_bangunan` (`nama_bangunan`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_gudang`),
  ADD UNIQUE KEY `nama_gudang` (`nama_gudang`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD UNIQUE KEY `nama_lokasi` (`nama_lokasi`);

--
-- Indexes for table `tb_notif`
--
ALTER TABLE `tb_notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tb_plant`
--
ALTER TABLE `tb_plant`
  ADD PRIMARY KEY (`id_plant`),
  ADD UNIQUE KEY `nama_plant` (`nama_plant`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_provinsi`),
  ADD UNIQUE KEY `provinsi_nama` (`provinsi_nama`);

--
-- Indexes for table `tb_rayon`
--
ALTER TABLE `tb_rayon`
  ADD PRIMARY KEY (`no_id`),
  ADD UNIQUE KEY `id_rayon` (`id_rayon`),
  ADD UNIQUE KEY `nama_rayon` (`nama_rayon`);

--
-- Indexes for table `tb_status_kepemilikan`
--
ALTER TABLE `tb_status_kepemilikan`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `deskripsi_kepemilikan` (`deskripsi_kepemilikan`);

--
-- Indexes for table `tb_status_layak`
--
ALTER TABLE `tb_status_layak`
  ADD PRIMARY KEY (`id_layak`),
  ADD UNIQUE KEY `deskripsi_layak` (`deskripsi_layak`);

--
-- Indexes for table `tb_status_layer`
--
ALTER TABLE `tb_status_layer`
  ADD PRIMARY KEY (`id_layer`),
  ADD UNIQUE KEY `deskripsi_layer` (`deskripsi_layer`);

--
-- Indexes for table `tb_status_pendayagunaan`
--
ALTER TABLE `tb_status_pendayagunaan`
  ADD PRIMARY KEY (`id_pendayagunaan`),
  ADD UNIQUE KEY `deskripsi_pendayagunaan` (`deskripsi_pendayagunaan`);

--
-- Indexes for table `tb_status_rumah`
--
ALTER TABLE `tb_status_rumah`
  ADD PRIMARY KEY (`id_rumah`),
  ADD UNIQUE KEY `deskripsi_rumah` (`deskripsi_rumah`);

--
-- Indexes for table `tb_status_tanah`
--
ALTER TABLE `tb_status_tanah`
  ADD PRIMARY KEY (`id_status_tanah`),
  ADD UNIQUE KEY `desc_status_tanah` (`desc_status_tanah`);

--
-- Indexes for table `tb_status_terjual`
--
ALTER TABLE `tb_status_terjual`
  ADD PRIMARY KEY (`id_terjual`),
  ADD UNIQUE KEY `deskripsi_terjual` (`deskripsi_terjual`);

--
-- Indexes for table `tb_tanah`
--
ALTER TABLE `tb_tanah`
  ADD PRIMARY KEY (`id_tanah`),
  ADD UNIQUE KEY `nama_tanah` (`nama_tanah`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_wisma`
--
ALTER TABLE `tb_wisma`
  ADD PRIMARY KEY (`id_wisma`),
  ADD UNIQUE KEY `nama_wisma` (`nama_wisma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_area`
--
ALTER TABLE `tb_area`
  MODIFY `no_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_bangunan`
--
ALTER TABLE `tb_bangunan`
  MODIFY `id_bangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=510100004;

--
-- AUTO_INCREMENT for table `tb_notif`
--
ALTER TABLE `tb_notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_plant`
--
ALTER TABLE `tb_plant`
  MODIFY `id_plant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_status_kepemilikan`
--
ALTER TABLE `tb_status_kepemilikan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_status_layak`
--
ALTER TABLE `tb_status_layak`
  MODIFY `id_layak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_status_layer`
--
ALTER TABLE `tb_status_layer`
  MODIFY `id_layer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_status_pendayagunaan`
--
ALTER TABLE `tb_status_pendayagunaan`
  MODIFY `id_pendayagunaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_status_rumah`
--
ALTER TABLE `tb_status_rumah`
  MODIFY `id_rumah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_status_tanah`
--
ALTER TABLE `tb_status_tanah`
  MODIFY `id_status_tanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_status_terjual`
--
ALTER TABLE `tb_status_terjual`
  MODIFY `id_terjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_tanah`
--
ALTER TABLE `tb_tanah`
  MODIFY `id_tanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_wisma`
--
ALTER TABLE `tb_wisma`
  MODIFY `id_wisma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
