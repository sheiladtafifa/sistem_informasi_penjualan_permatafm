-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 07:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `permata`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `kategori_barang` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `satuan`, `kategori_barang`, `harga_jual`, `harga_beli`, `stok`, `supplier`, `gambar`) VALUES
(16, 'Fro202104121916', 'CEDEA Fish Ball Bakso Ikan', '2', 19, 35000, 28300, 27, 6, 'cedea_fish_ball_baso_ikan1.jpg'),
(17, 'Fro202104121917', 'CEDEA Bakso Ikan Sayur Goreng', '2', 19, 33000, 26400, 28, 6, 'cedea_baso_ikan_sayur_goreng1.jpg'),
(31, 'Fro202106081931', 'Dimsum Ayam', '2', 19, 30000, 20000, 20, 6, ''),
(32, 'Aya202106081832', 'Ayam Negeri', '4', 18, 30000, 20000, 16, 1, ''),
(33, 'Dag202106092133', 'beef', '6', 21, 55000, 40000, 26, 1, ''),
(34, 'Beb202106091634', 'Bebek', '4', 16, 30000, 20000, 26, 1, ''),
(38, 'Aya202106271838', 'Ayam Kampung Kecil', '3', 18, 50000, 35000, 5, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_barang`, `jumlah`, `status`) VALUES
(30, 36, 16, 3, 2),
(32, 38, 16, 10, 2),
(33, 38, 17, 10, 2),
(36, 39, 16, 10, 2),
(37, 39, 17, 10, 2),
(40, 40, 16, 10, 2),
(41, 40, 17, 10, 2),
(44, 41, 16, 10, 2),
(46, 43, 17, 10, 2),
(47, 44, 31, 20, 2),
(48, 45, 32, 15, 2),
(49, 46, 16, 15, 2),
(50, 46, 17, 15, 2),
(51, 47, 32, 10, 2),
(52, 47, 33, 10, 2),
(99, 83, 33, 10, 2),
(100, 84, 38, 10, 2),
(101, 86, 31, 15, 2),
(102, 87, 33, 16, 2),
(103, 87, 34, 16, 2);

--
-- Triggers `detail_pembelian`
--
DELIMITER $$
CREATE TRIGGER `trigger_tambah` AFTER INSERT ON `detail_pembelian` FOR EACH ROW BEGIN 
	UPDATE barang SET stok = stok + NEW.jumlah 
    WHERE id_barang = new.id_barang; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah`, `sub_total`) VALUES
(22, 17, 16, 4, 140000),
(23, 17, 17, 4, 132000),
(28, 22, 16, 3, 105000),
(29, 22, 17, 6, 198000),
(32, 25, 17, 1, 33000),
(50, 39, 17, 9, 297000),
(57, 43, 16, 1, 35000),
(59, 45, 31, 10, 300000),
(60, 46, 16, 5, 175000),
(61, 46, 17, 5, 165000),
(62, 46, 31, 5, 150000),
(63, 47, 33, 8, 440000),
(64, 47, 32, 9, 270000),
(65, 48, 16, 2, 70000),
(66, 48, 17, 2, 66000),
(67, 48, 33, 2, 110000),
(68, 49, 38, 5, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `kode_kategori` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`, `kode_kategori`) VALUES
(16, 'Bebek', 'Beb'),
(17, 'Milk', 'Mil'),
(18, 'Ayam', 'Aya'),
(19, 'Frozen Food', 'Fro'),
(20, 'Seafood', 'Sea'),
(21, 'Daging', 'Dag'),
(22, 'Pempek', 'pek');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`) VALUES
(1, 'Buah'),
(2, 'Bungkus'),
(3, 'Potong'),
(4, 'Ekor'),
(5, 'Botol'),
(6, 'KiloGram'),
(7, 'Gram');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `telp_supplier` varchar(20) NOT NULL,
  `alamat_supplier` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `telp_supplier`, `alamat_supplier`, `username`, `password`, `email`) VALUES
(1, 'PT Agro Boga Utama', '0711 5722123', 'Komp. Pergudangan Cosmo Bizland Jalan Terminal B/Jalan Jepang Blok A2 Rt.020, Rw.004, Kelurahan Alang-alang Lebar Kec.Alang-alang Lebar, Kota Palembang. ', 'agrobogautama', '01c63c51ecbd4f3fbe5cd82778434a2c', 'sheiladitaafifaa@gmail.com'),
(5, 'PT Primafood International', '0711 813442', 'Kebun Bunga, Kec. Sukarami, Kota Palembang, Sumatera Selatan 30961', 'primafood', 'd2bcdd81055508f305c97239b6829ca7', 'sheiladtfa@gmail.com'),
(6, 'PD Sumber Berkah Abadi', '082186673983', 'Jl.kh wahid hasyim Lr.jeruk/Demak 1 No.1140 Palembang', 'sumberberkahabadi', 'df433651a6f64f09e5a858a5f5ffb3f5', 'trieviamahmudah.tm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_pembelian`
--

INSERT INTO `transaksi_pembelian` (`id_pembelian`, `id_user`, `tanggal_pembelian`, `total_pembelian`) VALUES
(36, 5, '2021-04-28', 84900),
(38, 5, '2021-04-30', 927000),
(39, 5, '2021-05-03', 927000),
(40, 5, '2021-05-03', 927000),
(41, 5, '2021-05-04', 283000),
(43, 5, '2021-05-31', 264000),
(44, 5, '2021-06-08', 400000),
(45, 5, '2021-06-08', 300000),
(46, 5, '2021-06-08', 820500),
(47, 5, '2021-06-09', 600000),
(83, 5, '2021-06-27', 400000),
(84, 5, '2021-06-27', 350000),
(86, 5, '2021-06-27', 300000),
(87, 5, '2021-06-27', 960000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_trx` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tgl_trx` date NOT NULL,
  `waktu_trx` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id_penjualan`, `id_user`, `no_trx`, `grand_total`, `total`, `bayar`, `kembalian`, `tgl_trx`, `waktu_trx`) VALUES
(17, 3, 202103303, 272000, 272000, 300000, 28000, '2021-04-03', '12:49:49'),
(22, 3, 202103308, 303000, 303000, 305000, 2000, '2021-04-03', '14:01:25'),
(25, 3, 202103311, 33000, 33000, 35000, 2000, '2021-04-04', '18:24:22'),
(39, 3, 202103324, 297000, 297000, 297000, 0, '2021-05-02', '21:41:50'),
(43, 3, 202103328, 35000, 35000, 40000, 5000, '2021-05-31', '13:53:09'),
(45, 3, 202103330, 300000, 300000, 300000, 0, '2021-06-08', '00:36:55'),
(46, 3, 202103331, 490000, 490000, 500000, 10000, '2021-06-08', '20:57:39'),
(47, 3, 202103332, 710000, 710000, 720000, 10000, '2021-06-09', '09:31:22'),
(48, 3, 202103333, 246000, 246000, 250000, 4000, '2021-06-09', '10:47:46'),
(49, 3, 202103334, 250000, 250000, 260000, 10000, '2021-06-27', '17:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `jabatan`) VALUES
(2, 'manager', '1d0258c2440a8d19e716292b231e3190', 'Asep', 'Manager'),
(3, 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'Artha', 'Pegawai'),
(5, 'gudang', '202446dd1d6028084426867365b0c7a1', 'Saipul', 'Gudang'),
(8, 'manager1', 'c240642ddef994358c96da82c0361a58', 'Eci', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
