-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2024 at 08:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_list_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(8) NOT NULL,
  `nama_admin` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`) VALUES
('ADMIN097', 'Fifi Alfiaturrohmah', 'fifi123@gmail.com', 'Fifi123'),
('ADMIN163', 'Cheppi Garda Muhamad', 'cheppi123@gmail.com', 'Cheppi123'),
('ADMIN182', 'Yuyun Khanafiyah ', 'yuyun123@gmail.com', 'Yuyun123'),
('ADMIN184', 'Pawit Widiyantoro', 'pawit123@gmail.com', 'Pawit123'),
('ADMIN186', 'Rosita Dian Febriyanti', 'rosita123@gmail.com', 'Rosita123'),
('ADMIN310', 'Abdul Jabbar Robbani', 'abdul123@gmail.com', 'Abdul123');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` varchar(8) NOT NULL,
  `nama_event` varchar(30) DEFAULT NULL,
  `tgl_event` varchar(30) DEFAULT NULL,
  `deskripsi_event` varchar(50) DEFAULT NULL,
  `lokasi` varchar(30) DEFAULT NULL,
  `harga_tiket` int(10) DEFAULT NULL,
  `poster` varchar(100) DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `tgl_event`, `deskripsi_event`, `lokasi`, `harga_tiket`, `poster`, `jam`) VALUES
('EVENT001', 'Kirab Hari Jadi Kabupaten Bany', '22-02-2024', 'Prosesi Kirab Pusaka dilaksanakan dalam rangka per', 'Alun-alun Banyumas', 50000, 'poster/image/Kirab Hari Jadi Kabupaten Banyumas.jpg', '07.00'),
('EVENT002', 'Festival Serayu Banyumas', '05-07-2024', 'Dilaksanakan pada Bulan Juli setiap tahunnya. Ada ', 'Serayu Banyumas', 100000, 'poster/image/Festival Serayu Banyumas.jpg', '08.00'),
('EVENT003', 'Banyumas Extravaganza', '10-01-2024', 'Merupakan event unggulan tahunan berupa Karnaval S', 'Alun-alun Purwokerto', 75000, 'poster/image/Banyumas Extravaganza.jpg', '14.00'),
('EVENT004', 'Prosesi Jaro Rojab', '13-01-2024', 'Jaro Rojab merupakan tradisi penggantian jaro atau', 'Masjid Saka Tunggal, Banyumas', 150000, 'poster/image/Prosesi Jaro Rojab.jpg', '03.00'),
('EVENT005', 'Prosesi Grebeg Suran', '04-05-2024', 'Grebeg Suran dilaksanakan pada bulan Sura setiap s', 'Baturaden', 30000, 'poster/image/Prosesi Grebeg Suran.jpg', '09.00'),
('EVENT006', 'Boyongan Saka Guru Sipanji dan', '20-02-2024', 'Boyongan Saka Guru Sipanji adalah kirab yang mengg', 'Banyumas', 20000, 'poster/image/Boyongan Saka Guru Sipanji dan Kirab Prosesi Pusaka Banyumas.jpg', '07.00'),
('EVENT007', 'Ebeg/Kuda Lumping', '12-03-2024', 'Adalah tarian yang dibawakan dengan menggunakan ku', 'Purbalingga', 60000, 'poster/image/EbegKuda Lumping.jpg', '10.00'),
('EVENT008', 'Wayang Kulit Gragag Banyumasan', '16-01-2024', 'Wayang Kulit Gragag Banyumasan adalah jenis pertun', 'Banyumas', 25000, 'poster/image/Wayang Kulit Gragag Banyumasan.jpg', '19.00'),
('EVENT009', 'Tari Lengger & Calung Banyumas', '25-01-2024', 'Tari Lengger Banyumasan dibawakan oleh dua orang w', 'Alun-alun Purwokerto', 40000, 'poster/image/Tari Lengger & Calung Banyumasan.jpeg', '08.00'),
('EVENT010', 'Festival Musik Etnik Banyumasa', '18-02-2024', 'Festival seni kerakyatan yang dinamis yang diselen', 'Banyumas', 200000, 'poster/image/Festival Musik Etnik Banyumasan.jpeg', '19.00'),
('EVENT011', 'Festival Ogoh-Ogoh', '10-05-2024', 'Umat Hindu di Banyumas menggelar Festival Ogoh-ogo', 'Banyumas', 30000, 'poster/image/Festival Ogoh-Ogoh.jpg', '10.00'),
('EVENT012', 'Tutup Sadran Kalitanjung', '10-03-2024', 'Masyarakat Dusun Kalitanjung memiliki tradisi turu', 'Kalitanjung', 80000, 'poster/image/Tutup Sadran Kalitanjung.jpg', '19.00'),
('EVENT013', 'Festival Kenthongan', '28-03-2024', 'Festival Kenthongan menyuguhkan lomba musik tradis', 'Purwokerto', 10000, 'poster/image/Festival Kenthongan.jpg', '18.30'),
('EVENT014', 'Unggah-Unggahan Bonokeling', '29-02-2024', 'Unggah-unggahan merupakan tradisi bersih-bersih ma', 'Banyumas', 70000, 'poster/image/Unggah-Unggahan Bonokeling.jpg', '07.00'),
('EVENT015', 'Festival Baturaden', '10-05-2024', 'Festival Baturraden merupakan serangkaian acara bu', 'Baturaden', 100000, 'poster/image/Festival Baturaden.jpg', '09.00'),
('EVENT016', 'Explore Purwokerto', '16-05-2024', 'Explore Purwokerto merupakan event gowes khusus se', 'Purwokerto', 150000, 'poster/image/Explore Purwokerto.jpg', '08.00'),
('EVENT017', 'Banyumasan Wera', '25-05-2024', 'Banyumas Wera menampilkan karnaval kreativitas fes', 'Banyumas', 65000, 'poster/image/Banyumasan Wera.jpg', '07.00'),
('EVENT018', 'Penjamasan Jimat Kalisalak dan', '17-09-2024', 'Penjamasan jimat peninggalan Sultan Amangkurat di ', 'Banyumas', 110000, 'poster/image/Penjamasan Jimat Kalisalak dan Kalibening.jpg', '14.00'),
('EVENT019', 'Pemilihan Kakang dan Mbekayu s', '23-06-2024', 'Dilaksanakan secara rutin oleh Pemerintah Daerah m', 'Banyumas', 250000, 'poster/image/Pemilihan Kakang dan Mbekayu sebagai Duta Wisata Banyumas.jpg', '07.00'),
('EVENT020', 'Unggah-Unggahan Jatilawang', '22-07-2024', 'Prosesi ini dilakukan di makam Bonokeling desa Pek', 'Jatilawang', 55000, 'poster/image/Unggah-Unggahan Jatilawang.jpeg', '07.00'),
('EVENT021', 'bootcamp', '2024-01-17', 'bootcamp pemrograman', 'banyumas', 200000, '65a7376aaf5b1.png', '09:11');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` varchar(8) NOT NULL,
  `id_user` varchar(8) DEFAULT NULL,
  `id_event` varchar(8) DEFAULT NULL,
  `harga_tiket` int(10) DEFAULT NULL,
  `jumlah_tiket` int(3) DEFAULT NULL,
  `tgl_event` varchar(30) DEFAULT NULL,
  `metode_pembayaran` varchar(20) DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_user`, `id_event`, `harga_tiket`, `jumlah_tiket`, `tgl_event`, `metode_pembayaran`, `jam`) VALUES
('IDTIC001', 'USER001', 'EVENT001', 50000, 5, '22-02-2024', 'Transfer Bank BRI', '07.00'),
('IDTIC002', 'USER002', 'EVENT002', 100000, 10, '05-07-2024', 'Transfer Bank BNI', '08.00'),
('IDTIC003', 'USER003', 'EVENT003', 75000, 20, '10-01-2024', 'Kartu Kredit/Debit', '14.00'),
('IDTIC004', 'USER004', 'EVENT004', 150000, 1, '13-01-2024', 'Transfer Bank MANDIR', '03.00'),
('IDTIC005', 'USER005', 'EVENT005', 30000, 15, '04-05-2024', 'QRIS', '09.00'),
('IDTIC006', 'USER006', 'EVENT001', 50000, 1, '07.00', 'on', '07.00'),
('IDTIC007', 'USER006', 'EVENT003', 75000, 2, '10-01-2024', 'cash', '14.00'),
('IDTIC008', 'USER006', 'EVENT001', 50000, 3, '22-02-2024', 'cash', '07.00'),
('IDTIC009', 'USER006', 'EVENT001', 50000, 2, '22-02-2024', 'cash', '07.00'),
('IDTIC010', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC011', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC012', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC013', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC014', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC015', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC016', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC017', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC018', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC019', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC020', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC021', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', '', '07.00'),
('IDTIC022', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', '', '07.00'),
('IDTIC023', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', '', '07.00'),
('IDTIC024', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC025', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC026', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'cash', '07.00'),
('IDTIC027', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'credit_card', '07.00'),
('IDTIC028', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'mobile_payment', '07.00'),
('IDTIC029', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'bank_transfer', '07.00'),
('IDTIC030', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'credit_card', '07.00'),
('IDTIC031', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'bank_transfer', '07.00'),
('IDTIC032', 'USER006', 'EVENT001', 50000, 1, '22-02-2024', 'credit_card', '07.00'),
('IDTIC033', 'USER006', 'EVENT002', 100000, 1, '05-07-2024', 'mobile_payment', '08.00'),
('IDTIC034', 'USER006', 'EVENT003', 75000, 1, '10-01-2024', 'cash', '14.00'),
('IDTIC035', 'USER006', 'EVENT001', 50000, 2, '22-02-2024', 'bank_transfer', '07.00'),
('IDTIC036', 'USER006', 'EVENT001', 50000, 2, '22-02-2024', 'bank_transfer', '07.00'),
('IDTIC037', 'USER006', 'EVENT001', 50000, 2, '22-02-2024', 'bank_transfer', '07.00'),
('IDTIC038', 'USER006', 'EVENT001', 50000, 2, '22-02-2024', 'credit_card', '07.00'),
('IDTIC039', 'USER006', 'EVENT002', 100000, 1, '05-07-2024', 'credit_card', '08.00'),
('IDTIC040', 'USER006', 'EVENT002', 100000, 1, '05-07-2024', 'mobile_payment', '08.00'),
('IDTIC041', 'USER006', 'EVENT002', 100000, 1, '05-07-2024', 'mobile_payment', '08.00'),
('IDTIC042', 'USER006', 'EVENT002', 100000, 1, '05-07-2024', 'credit_card', '08.00'),
('IDTIC043', 'USER006', 'EVENT002', 100000, 1, '05-07-2024', 'mobile_payment', '08.00'),
('IDTIC044', 'USER006', 'EVENT002', 100000, 2, '05-07-2024', 'mobile_payment', '08.00'),
('IDTIC045', 'USER006', 'EVENT001', 50000, 2, '22-02-2024', 'bank_transfer', '07.00'),
('IDTIC046', 'USER006', 'EVENT002', 100000, 2, '05-07-2024', 'bank_transfer', '08.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(8) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `no_telp`, `password`, `alamat`) VALUES
('USER002', 'Dina', 'dina123@gmail.com', '085678912345', 'dina123', 'Jakarta'),
('USER003', 'Dono', 'dono123@gmail.com', '082345678912', 'dono123', 'Bekasi'),
('USER004', 'Bayu', 'bayu123@gmail.com', '08789123456', 'bayu123', 'Bogor'),
('USER005', 'Bima', 'bima123@gmail.com', '089123456789', 'bima123', 'Semarang'),
('USER006', 'Pawit', 'pawitwidiantoro@gmai', '0822222', '1234', 'banyumas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
