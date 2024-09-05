-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 11:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpeminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','Lainnya') NOT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `nomor_telepon`, `alamat`) VALUES
(1, 'Ajais', '2024-08-23', 'Perempuan', '09823472364712', 'jl. asbdkasbdj no12'),
(3, 'Ajais', '2024-08-25', 'Laki-Laki', '1231544365123', 'asjhdkasdljksad'),
(4, 'Candra', '2024-07-31', 'Perempuan', '123981240812', 'dnhakjsndasjfasd');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_sidoarjo`
--

CREATE TABLE `keranjang_sidoarjo` (
  `id` int(11) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `noHp` varchar(15) NOT NULL,
  `kelas` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `noHp`, `kelas`) VALUES
(6, 'caren', '7842367542376', 'petugas'),
(7, 'isan', '08990385641', 'admin'),
(8, 'intan', '082336705225', 'petugas'),
(9, 'abil', '7842367542376', 'petugas'),
(10, 'caren', '082336705225', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kontak2`
--

CREATE TABLE `kontak2` (
  `id_kontak2` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `noHp` varchar(15) NOT NULL,
  `kelas` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak2`
--

INSERT INTO `kontak2` (`id_kontak2`, `nama`, `noHp`, `kelas`) VALUES
(6, 'caren', '7842367542376', 'petugas'),
(7, 'isan', '08990385641', 'admin'),
(8, 'intan', '082336705225', 'petugas'),
(9, 'abil', '7842367542376', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `poltek_jember`
--

CREATE TABLE `poltek_jember` (
  `no` int(100) NOT NULL,
  `no_bmn` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `tahun_pengadaan` int(100) NOT NULL,
  `kondisi_baik` int(100) NOT NULL,
  `rusak_ringan` int(100) NOT NULL,
  `rusak_berat` int(100) NOT NULL,
  `jumlah_barang` int(100) NOT NULL,
  `durasi_pemakaian` int(100) NOT NULL,
  `fungsi_alat` varchar(100) NOT NULL,
  `stock_barang` int(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poltek_jember`
--

INSERT INTO `poltek_jember` (`no`, `no_bmn`, `nama_barang`, `spesifikasi`, `tahun_pengadaan`, `kondisi_baik`, `rusak_ringan`, `rusak_berat`, `jumlah_barang`, `durasi_pemakaian`, `fungsi_alat`, `stock_barang`, `foto`) VALUES
(1, '', 'Komputer Dekstop', 'Acer Veliton X-Core i5', 2022, 0, 0, 0, 0, 0, 'Sarana dan Prasarana Praktikum', 38, '221-109-Reader TIF.jpg'),
(2, '3.10.01.02.001/2022', 'Komputer Dekstop', 'Acer Veriton X-Core i7', 2022, 29, 0, 0, 29, 24, 'Sarana dan Prasarana Praktikum', 44, '889-642-442-516-komputer.jpg'),
(3, '3.10.01.02.001/C.15', 'Komputer', 'Dell', 2022, 2, 0, 11, 13, 24, 'Sarana dan Prasarana Praktikum', 50, '772-642-442-516-komputer.jpg'),
(4, '3.10.01.02.001/C.15', 'Keyboard', 'Acer', 2022, 31, 0, 0, 31, 24, 'Sarana dan Prasarana Praktikum', 50, '30-keyboard.jpeg'),
(5, '3.10.01.02.001/C.15', 'Mouse', 'Acer', 2022, 38, 0, 0, 38, 24, 'Sarana dan Prasarana Praktikum', 48, '394-mouse.jpg'),
(6, '3.10.01.02.001/C.902', 'Monitor', 'Dell 20 inch', 2011, 5, 0, 0, 5, 156, 'Sarana dan Prasarana Praktikum', 50, '104-PC Asus.jpg'),
(7, '3.10.01.02.001/2022', 'Monitor', 'Acer 27 inch', 2022, 29, 0, 0, 29, 24, 'Sarana dan Prasarana Praktikum', 50, '862-PC Asus.jpg'),
(8, '3.10.01.02.001', 'PC All in One', 'Asus', 2018, 1, 0, 0, 1, 72, 'sarana dan Prasarana Praktikum', 46, '725-PC Asus.jpg'),
(9, '0.05.02.01.0003/AX.162', 'Kursi Lipat Hitam', 'Chitos', 2015, 35, 0, 0, 35, 108, 'Sarana dan Prasarana Praktikum', 50, '998-kursi.jpg'),
(10, '', 'AC', 'Panasonic 2 PK', 2016, 2, 0, 0, 2, 96, 'Sarana dan Prasarana Praktikum', 44, '134-ac.jpg'),
(11, '', 'Meja Panjang Baru Tanpa Rak', '', 0, 8, 0, 0, 8, 0, 'Sarana Dan Prasarana Praktikum', 50, '298-meja-kantor.jpg'),
(12, '3.05.02.01.009/C.119', 'Meja Panjang Dengan Rak', '', 2012, 10, 0, 0, 10, 0, 'Sarana dan Prasarana Praktikum', 50, '389-meja.jpg'),
(13, '3.05.02.01.009/C.119', 'Meja Lama', '', 2012, 0, 0, 5, 5, 144, 'Sarana da Prasarana Praktikum', 50, '692-meja.jpg'),
(14, '2.05.02.01.009/c.115', 'Meja Kecil Kaca', '', 2007, 3, 0, 0, 3, 204, 'Sarana dan Prasarana Praktikum', 50, '553-298-meja-kantor.jpg'),
(15, '3.05.02.01.003', 'Meja Jepang Mahasiswa', '', 2012, 5, 0, 0, 5, 144, 'Sarana dan Prasarana Praktikum', 50, '929-meja-jepang.jpg'),
(16, '3.05.02.01.002/TIF', 'Meja Kantor', '', 2017, 3, 0, 2, 5, 84, 'Sarana dan Prasarana Praktikum', 50, '195-553-298-meja-kantor.jpg'),
(17, '', 'Meja Dosen', '', 2022, 1, 0, 0, 1, 24, 'Sarana dan Prasarana Praktikum', 50, '97-meja-dosen.jpg'),
(18, '2.05.01.04.001/C119', 'Lemari Besi Besar VIP', '', 2017, 4, 0, 0, 4, 84, 'Sarana dan Prasarana Praktikum', 50, '97-lemari.jpg'),
(19, '3.05.01.04.005', 'Lemari Besar Brother 4 laci VIP', '', 2017, 3, 0, 0, 3, 84, 'Sarana dan Prasarana Praktikum', 50, '608-lemari.jpg'),
(20, '2.05.01.05.010/X.407', 'White Board Besar', '', 2006, 2, 0, 0, 2, 216, 'Sarana dan Prasarana Praktikum', 49, '43-papan.jpg'),
(21, '3.08.01.41.241/A-408', 'UPS', 'ICA 1082-2000 VA', 2012, 17, 0, 5, 22, 144, 'Sarana dan Prasarana Praktikum', 50, '272-ups.jpg'),
(22, '2.12.02.02.008', 'Printer', 'HP Laserjet 1020', 2012, 1, 0, 0, 1, 144, 'Sarana dan Prasarana Praktikum', 50, '867-printer.png'),
(23, '', 'Printer', 'Epson L3150', 0, 1, 0, 0, 1, 0, 'Sarana dan Prasarana Praktikum', 50, '599-867-printer.png'),
(24, '3.10.02.01.009/C.902', 'Scanner', 'Plustek Opticpro A320', 2015, 1, 0, 0, 1, 108, 'Sarana dan Prasarana Praktikum', 50, '170-scanner.jpg'),
(25, '', 'HUB', 'Linksys Switch 16 Port SD 216', 0, 1, 0, 0, 1, 0, 'Sarana Dan Prasarana Praktikum', 50, '437-hub.jpg'),
(26, '', 'HUB', 'D-Link 24 port', 0, 1, 0, 0, 1, 0, 'Sarana Dan Prasaran Praktikum', 0, '249-437-hub.jpg'),
(27, '', 'HUB', 'Cisco 48 Pord', 0, 1, 0, 0, 1, 0, 'Sarana dan Prasarana Praktikum', 0, '544-249-437-hub.jpg'),
(28, '', 'LCD Proyektor', 'Dell', 0, 3, 0, 0, 3, 0, 'Sarana dan Prasarana Praktikum', 0, '642-597-Scanner MIF.jpg'),
(29, '', 'Screen Proyektor JK', '', 0, 1, 0, 0, 1, 0, 'Sarana dan Prasarana Praktikum', 0, '240-201-958-proyektor.jpg'),
(30, ' ', 'GPS', 'Magellan', 2015, 21, 0, 0, 21, 108, 'Saran dan Prasarana Praktikum', 0, '111-GPS.jpg'),
(31, '', 'Appar Rakindo', '', 2023, 2, 0, 0, 2, 12, 'Sarana dan Prasarana Praktikum', 0, '811-170-scanner.jpg'),
(32, 'POLIJE/2017', 'Kursi Bundar', '', 2017, 24, 0, 0, 24, 84, 'Sarana dan Prasarana Praktikum', 0, '537-kursi-bundar.jpg'),
(33, '', 'Meja Besar Workshop', '', 0, 5, 0, 0, 5, 0, 'Sarana dan Prasarana Praktikum', 0, '681-meja-besar.jpg'),
(34, '3.05.02.01.003/L.TIF', 'Kursi Jepang', '', 2015, 2, 0, 0, 2, 108, 'Sarana Dan Prasarana Praktikum', 0, '88-929-meja-jepang.jpg'),
(35, 'POLIJE/2017', 'Kursi Kotak Kayu', '', 2017, 11, 0, 0, 11, 84, 'Sarana dan Prasarana Praktikum', 0, '504-kursi-kotak.jpg'),
(36, '0.05.02.01.0003/AX.162', 'Kursi Kantor Ruang Staff', 'Chitose', 2017, 2, 0, 0, 2, 84, 'Sarana dan Prasarana Praktikum', 0, '794-kursi.jpg'),
(37, '', 'Barcode Scanner MIF', '', 2024, 6, 0, 0, 6, 7, 'Sarana dan Prasarana Praktikum', 0, '597-Scanner MIF.jpg'),
(38, '', 'Portable Thermal Printer MIF', '', 2024, 6, 0, 0, 6, 7, 'Sarana dan Prasarana Praktikum', 0, '898-597-Scanner MIF.jpg'),
(39, '', 'Portable Thermal Printer TIF', '', 2022, 12, 0, 0, 12, 24, 'Sarana dan Prasarana Praktikum', 0, '949-Reader TIF.jpg'),
(40, '', 'RFID Reader TIF', '', 2022, 12, 0, 0, 12, 24, 'Sarana dan Prasana Praktikum', 0, '360-Reader TIF.jpg'),
(41, '64273846', 'Barcode Scanner TIF', 'baik', 2022, 12, 0, 0, 12, 24, 'Sarana dan Prasarana Praktikum', 0, '109-Reader TIF.jpg'),
(42, '54 5', '65y ', '6y 5y', 6, 0, 6, 0, 0, 0, 'h yht', 0, '636-91-proyektor.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rsi_sidoarjo`
--

CREATE TABLE `rsi_sidoarjo` (
  `no` int(100) NOT NULL,
  `no_bmn` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `tahun_pengadaan` int(100) NOT NULL,
  `kondisi_baik` int(100) NOT NULL,
  `rusak_ringan` int(100) NOT NULL,
  `rusak_berat` int(100) NOT NULL,
  `jumlah_barang` int(100) NOT NULL,
  `durasi_pemakaian` int(100) NOT NULL,
  `fungsi_alat` varchar(100) NOT NULL,
  `stock_barang` int(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rsi_sidoarjo`
--

INSERT INTO `rsi_sidoarjo` (`no`, `no_bmn`, `nama_barang`, `spesifikasi`, `tahun_pengadaan`, `kondisi_baik`, `rusak_ringan`, `rusak_berat`, `jumlah_barang`, `durasi_pemakaian`, `fungsi_alat`, `stock_barang`, `foto`) VALUES
(1, '3.10.01.02.001/2022', 'Komputer Dekstop', 'Acer Verition X-Core i5', 2022, 25, 0, 0, 25, 24, 'Sarana dan Prasarana Praktikum', 48, '954-397-442-516-komputer.jpg'),
(2, '3.10.01.02.001/2022', 'Keyboard', 'Acer', 2022, 25, 0, 0, 25, 24, 'Sarana dan Prasarana Praktikum', 49, '723-30-keyboard.jpeg'),
(3, '3.10.01.02.001/2022', 'Mouse', 'Acer', 2022, 25, 0, 0, 25, 24, 'Sarana dan Prasarana Praktikum', 47, '875-394-mouse.jpg'),
(4, '3.05.02.01.003', 'Kursi Hitam', '', 2012, 26, 0, 0, 26, 144, 'Sarana dan Prasarana Praktikum', 50, '915-794-kursi.jpg'),
(5, '3.05.02.01.009/AK-SDJ', 'Meja Komputer', '', 2012, 30, 0, 0, 30, 144, 'Sarana dan Prasarana Praktikum', 50, '779-195-553-298-meja-kantor.jpg'),
(6, '3.05.02.01.002/PSDKU-SIDOARJO', 'Meja Dosen', '', 2023, 1, 0, 0, 1, 12, 'Sarana dan Prasarana Praktikum', 49, '20-78-97-meja-dosen.jpg'),
(7, '3.05.02.01.003/PSDKU-SIDOARJO', 'Kursi Dosen', '', 2023, 1, 0, 0, 1, 12, 'Sarana dan Prasarana Praktikum', 47, '384-794-kursi.jpg'),
(8, '', 'AC', 'Panasonic 1.5 PK', 2021, 2, 0, 0, 2, 36, 'Sarana dan Prasarana Praktikum', 46, '416-134-ac.jpg'),
(9, '', 'AC', 'Panasonic 3 PK', 2022, 1, 0, 0, 1, 24, 'Sarana dan Prasarana Praktikum', 44, '767-134-ac.jpg'),
(10, '3.05.01.04.005/PSDKU-SIDOARJO', 'Lemari Besi Besar  VIP', '', 2023, 1, 0, 0, 1, 12, 'Sarana dan Prasarana Praktikum', 50, '354-97-lemari.jpg'),
(11, '', 'Lemari Besi Brother 4 Laci VIP', '', 2023, 1, 0, 0, 1, 12, 'Sarana dan Prasarana Praktikum', 50, '662-97-lemari.jpg'),
(12, '', 'Waite Board Besar', '', 2023, 1, 0, 0, 1, 12, 'Sarana dan Prasarana Praktikum', 50, '816-43-papan.jpg'),
(13, '', 'UPS', 'Prolink 1500VA/900W', 2022, 1, 0, 0, 1, 24, 'Sarana dan Prasarana Praktikum', 50, '526-ups.jpg'),
(14, '', 'Switch Hub', 'Tenda 24-Port', 2022, 2, 0, 0, 2, 24, 'Sarana dan Prasarana Praktikum', 50, '5-544-249-437-hub.jpg'),
(15, '', 'Unifi Access Point', '', 0, 1, 0, 0, 1, 0, 'Sarana dan Prasarana Praktikum', 49, '24-Unifi.jpg'),
(16, '', 'Nokia', 'G-240W-L Access Point', 0, 1, 0, 0, 1, 0, 'Sarana dan Prasarana Praktikum', 48, '745-nokia.jpeg'),
(17, '', 'Printer', 'Epson L121', 2024, 1, 0, 0, 1, 7, 'Sarana dan Prasarana Praktikum', 50, '282-printer.png'),
(18, '3.10.02.01.009/AK-SDJ', 'Printer', 'Hp Laser Jet P3015', 2012, 0, 1, 0, 1, 144, 'Sarana dan Prasarana Praktikum', 50, '217-printer.png'),
(19, '3.05.01.05.048/AK-SDJ', 'Proyektor', 'Epson EB-1880', 2018, 1, 0, 0, 1, 144, 'Sarana dan Prasarana praktikum', 49, '352-240-201-958-proyektor.jpg'),
(20, '', 'Proyektor', 'ViewSonic VS-16909', 2013, 1, 0, 0, 1, 132, 'Sarana dan Prasarana Praktikum', 50, '91-proyektor.jpg'),
(22, 'fdgd', 'gdf', 'sdf', 0, 0, 0, 0, 0, 0, 'fd', 0, '255-78-97-meja-dosen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jember`
--

CREATE TABLE `transaksi_jember` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_peminjam` varchar(255) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `status_pengembalian` enum('belum','sudah') DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_jember`
--

INSERT INTO `transaksi_jember` (`id`, `id_barang`, `nama_peminjam`, `tanggal_pinjam`, `tanggal_pengembalian`, `jumlah_barang`, `status_pengembalian`) VALUES
(2, 1, 'Ajais', '2024-09-05', '2024-08-16', 5, 'sudah'),
(3, 2, 'Ajais', '2024-09-05', '2024-08-16', 4, 'sudah'),
(4, 3, 'Ajais', '2024-09-05', '2024-08-16', 1, 'sudah'),
(7, 1, 'Candra', '2024-08-25', '2024-08-25', 1, 'sudah'),
(8, 3, 'Candra', '2024-08-25', '2024-08-25', 1, 'sudah'),
(9, 1, 'Ajais', '2024-08-25', '2024-08-26', 2, 'sudah'),
(10, 2, 'Candra', '2024-08-25', '2024-08-23', 1, 'sudah'),
(11, 1, 'Candra', '2024-08-25', '2024-08-26', 1, 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_sidoarjo`
--

CREATE TABLE `transaksi_sidoarjo` (
  `id` int(11) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `tanggal_minjam` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `jumlah_barang` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_sidoarjo`
--

INSERT INTO `transaksi_sidoarjo` (`id`, `id_barang`, `nama_peminjam`, `nama_barang`, `spesifikasi`, `tanggal_minjam`, `tanggal_pengembalian`, `jumlah_barang`) VALUES
(21, 16, 'ahmad', '', '', '2024-08-02', '2024-08-02', 1),
(22, 15, 'farah', '', '', '2024-08-02', '2024-08-02', 1),
(23, 16, 'farah', '', '', '2024-08-02', '2024-08-02', 1),
(25, 9, 'fe', '', '', '2024-08-02', '2024-08-02', 1),
(26, 3, 'rgte', '', '', '2024-08-02', '2024-08-02', 1),
(27, 1, 'caren', '', '', '2024-08-02', '2024-08-02', 1),
(28, 3, 'farah', '', '', '2024-08-02', '2024-08-02', 1),
(29, 0, 'hjgy', '', '', '2024-08-02', '2024-08-02', 1),
(30, 9, 'grdt', '', '', '2024-08-02', '2024-08-02', 1),
(31, 8, 'tujy', 'AC', 'Panasonic 1.5 PK', '2024-08-08', '2024-08-08', 1),
(32, 10, 'tujy', 'Lemari Besi Besar  VIP', '', '2024-08-08', '2024-08-08', 1),
(33, 9, 'kuuy', 'AC', 'Panasonic 3 PK', '2024-08-08', '2024-08-08', 1),
(34, 7, 'kuuy', 'Kursi Dosen', '', '2024-08-08', '2024-08-08', 1),
(35, 1, 'kuuy', 'Komputer Dekstop', 'Acer Verition X-Core i5', '2024-08-08', '2024-08-08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `noHp` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kelas` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `noHp`, `username`, `password`, `kelas`) VALUES
(6, 'caren', '082336705225', 'caren', '$2y$10$b3KC6ORjIjCTI6UMdMuXiOLfHNVgYXENYZP2Ui8hrl2W3IYGOM1c.', 'petugas'),
(7, 'isan', '08990385641', 'xcore', '$2y$10$8t90s88bYGyj3zLUvRwD/uEUA5bTXgJQfe9yX/crSkSrmfBC3a8Wi', 'admin'),
(8, 'intan', '082336705225', 'intan', '$2y$10$R0MhM5JYh8YLSh2y8t/C2uRPwLpHPr8NQ5rNW38CqLsWVLPIJfmhC', 'petugas'),
(9, 'abil', '7842367542376', 'abil', '$2y$10$kQ3Nj8wd0kXBtmRQ8dgQW.gIxQt.5hcVawTmLMYeqND5nbfm3rNhS', 'petugas'),
(10, 'caren', '082336705225', 'caren', '$2y$10$b3KC6ORjIjCTI6UMdMuXiOLfHNVgYXENYZP2Ui8hrl2W3IYGOM1c.', 'admin'),
(11, 'caren', '082336705225', 'caren', '$2y$10$b3KC6ORjIjCTI6UMdMuXiOLfHNVgYXENYZP2Ui8hrl2W3IYGOM1c.', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang_sidoarjo`
--
ALTER TABLE `keranjang_sidoarjo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kontak2`
--
ALTER TABLE `kontak2`
  ADD PRIMARY KEY (`id_kontak2`);

--
-- Indexes for table `poltek_jember`
--
ALTER TABLE `poltek_jember`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `rsi_sidoarjo`
--
ALTER TABLE `rsi_sidoarjo`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `transaksi_jember`
--
ALTER TABLE `transaksi_jember`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `transaksi_sidoarjo`
--
ALTER TABLE `transaksi_sidoarjo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang_sidoarjo`
--
ALTER TABLE `keranjang_sidoarjo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kontak2`
--
ALTER TABLE `kontak2`
  MODIFY `id_kontak2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `poltek_jember`
--
ALTER TABLE `poltek_jember`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76974;

--
-- AUTO_INCREMENT for table `rsi_sidoarjo`
--
ALTER TABLE `rsi_sidoarjo`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `transaksi_jember`
--
ALTER TABLE `transaksi_jember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi_sidoarjo`
--
ALTER TABLE `transaksi_sidoarjo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi_jember`
--
ALTER TABLE `transaksi_jember`
  ADD CONSTRAINT `transaksi_jember_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `poltek_jember` (`no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
