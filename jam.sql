-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 06:50 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jam`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('ariq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `name` varchar(50) NOT NULL,
  `description` varchar(225) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` varchar(5) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`name`, `description`, `price`, `image`, `id_produk`) VALUES
('Fossil', 'automatic', '4500000', 'a.jpg', 1),
('Casio', 'quartz', '3000000', 'c.jpg', 2),
('Apple Watch', 'smarwatch', '3500000', 'h.jpg', 3),
('Alba', 'digital', '2500000', 'd.jpg', 4),
('Alexander Christie', 'chronograph', '5000000', 'e.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_stok` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `stok_tersedia` int(11) DEFAULT NULL,
  `stok_terjual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`id_stok`, `id_produk`, `stok_awal`, `stok_tersedia`, `stok_terjual`) VALUES
(1, 1, 16, 8, 8),
(2, 2, 15, 7, 8),
(3, 3, 13, 6, 7),
(4, 4, 9, 5, 4),
(5, 5, 20, 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `jumlah`, `tanggal`) VALUES
(1, 1, 2, '2024-06-01'),
(2, 2, 8, '2024-06-01'),
(3, 5, 7, '2024-06-02'),
(4, 3, 2, '2024-06-02'),
(5, 4, 5, '2024-06-03'),
(6, 3, 3, '2024-06-03'),
(7, 2, 4, '2024-06-12'),
(8, 6, 6, '2024-06-13'),
(9, 1, 3, '2024-06-13'),
(10, 3, 1, '2024-06-13'),
(11, 1, 3, '2024-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(0, 'ariq', 'jam@gmail.com', '$2y$10$Hwc5rAoshLuXmtuBp7g85embKFKpZf1N/YITt0ChojDhqF3ELkqdq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
