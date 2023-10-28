-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 04:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skindistrochriss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'chriss', '1234', 'Ilham Fajar F');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(20) NOT NULL,
  `nama_kota` varchar(200) NOT NULL,
  `tarif` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Bekasi', 15000),
(2, 'Jakarta', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `email_pelanggan` varchar(30) NOT NULL,
  `password_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telpon`, `alamat_pelanggan`) VALUES
(1, 'ilhamjar123@gmail.com', '123456', 'Fajar Firmansyah', '087886031122', ''),
(2, 'annisarzkaa@gmail.com', '123456', 'Annisa Rizka W', '087823232323', ''),
(3, 'manix212@gmail.com', '123456', 'Ilham Fajar', '087886031122', 'ujung harapan Bahagia bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(2, 14, 'ilham Fajar', 'mandiri', 475000, '2020-04-10', '202004100822456a4654fa-c874-4554-a43b-f26aabb00d31.jpg'),
(3, 13, 'ilham Fajar', 'mandiri', 485000, '2020-04-10', '2020041008242774f604ddb0cd464c947b0431430b0258.mov'),
(4, 16, 'Manix ', 'BCA', 710000, '2020-04-10', 'Minions - ice cream.jpg'),
(5, 17, 'Manix ', 'BCA', 950000, '2020-04-10', 'Minions - jamesbond.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(20) NOT NULL,
  `id_pelanggan` int(20) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tangga_beli` date NOT NULL,
  `total_pembelian` int(100) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `status_beli` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tangga_beli`, `total_pembelian`, `nama_kota`, `tarif`, `alamat`, `status_beli`, `resi_pengiriman`) VALUES
(11, 2, 2, '2020-03-27', 680000, 'Jakarta', 20000, 'bekasi barat', 'pending', ''),
(12, 2, 2, '2020-03-27', 680000, 'Jakarta', 20000, 'bekasi selatan', 'pending', ''),
(13, 1, 1, '2020-03-27', 485000, 'Bekasi', 15000, 'bekasi utara', 'Sudah Transfer', ''),
(14, 1, 1, '2020-03-27', 475000, 'Bekasi', 15000, 'Gg alhijrah 1 rt 05 rw 03 no22 Bekasi Utara', 'Sudah Transfer', ''),
(15, 2, 2, '2020-04-03', 450000, 'Jakarta', 20000, 'Bekasi utara', 'pending', ''),
(16, 3, 2, '2020-04-10', 710000, 'Jakarta', 20000, 'Ujung kulon rumah badak ', 'Sudah Transfer', ''),
(17, 3, 2, '2020-04-10', 950000, 'Jakarta', 20000, 'Kalimantan Selatan sunda', 'Barang Dikirim', '1234567890'),
(18, 3, 1, '2020-04-10', 875000, 'Bekasi', 15000, 'Gg Jamban', 'pending', ''),
(19, 3, 2, '2020-04-10', 880000, 'Jakarta', 20000, 'Gg jamban', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(30) NOT NULL,
  `id_pembelian` int(20) NOT NULL,
  `id_produk` int(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(22, 10, 2, 1, 'Hardcase', 230000, 1, 1, 230000),
(23, 10, 3, 1, 'Hardcase', 240000, 1, 1, 240000),
(24, 10, 4, 1, 'Hardcase', 230000, 1, 1, 230000),
(25, 11, 1, 1, 'Hardcase', 200000, 1, 1, 200000),
(26, 11, 4, 1, 'Hardcase', 230000, 1, 1, 230000),
(27, 11, 6, 1, 'Hardcase', 230000, 1, 1, 230000),
(28, 12, 1, 1, 'Hardcase', 200000, 1, 1, 200000),
(29, 12, 4, 1, 'Hardcase', 230000, 1, 1, 230000),
(30, 12, 6, 1, 'Hardcase', 230000, 1, 1, 230000),
(31, 13, 2, 1, 'Hardcase', 230000, 1, 1, 230000),
(32, 13, 3, 1, 'Hardcase', 240000, 1, 1, 240000),
(33, 14, 2, 1, 'Hardcase', 230000, 1, 1, 230000),
(34, 14, 7, 1, 'Hardcase', 230000, 1, 1, 230000),
(35, 15, 1, 1, 'Hardcase', 200000, 1, 1, 200000),
(36, 15, 2, 1, 'Hardcase', 230000, 1, 1, 230000),
(37, 16, 2, 1, 'Hardcase', 230000, 1, 1, 230000),
(38, 16, 7, 1, 'Hardcase', 230000, 1, 1, 230000),
(39, 16, 4, 1, 'Hardcase', 230000, 1, 1, 230000),
(40, 17, 2, 2, 'Hardcase', 230000, 1, 2, 460000),
(41, 17, 3, 1, 'Hardcase', 240000, 1, 1, 240000),
(42, 17, 4, 1, 'Hardcase', 230000, 1, 1, 230000),
(45, 19, 2, 2, 'Hardcase', 230000, 1, 2, 460000),
(46, 19, 1, 2, 'Hardcase', 200000, 1, 2, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(20) NOT NULL,
  `berat` int(20) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat`, `foto_produk`, `deskripsi`, `stok_produk`) VALUES
(69, 'ilham', 3000000, 1, '2.PNG', 'hardcasse', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
