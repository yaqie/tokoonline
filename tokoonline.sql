-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2019 at 06:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama_lengkap`, `password`, `email`, `no_hp`) VALUES
(1, 'admin', 'gallery98pwt', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@admin.admin', '081234567890');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `kategori` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori`, `harga`, `satuan`, `stok`, `deskripsi`, `gambar`, `created_at`) VALUES
(6, 'yaqie ganteng banget', 5, '90000', '/3bungkus', '11', '<p>kja sdjjwb jas jdas</p>\r\n', '', '2019-03-23 16:36:22'),
(7, 'manks dam sda', 4, '2000', '/pcs', '4', '<p>kajsn dnakjsn d</p>\r\n', '09dd8c2662b96ce14928333f055c5580.png', '2019-03-23 22:42:03'),
(8, 'manks dam sda', 4, '2000', '/pcs', '4', '<p>kajsn dnakjsn d</p>\r\n', '2ded63fa303040ce3dddfd6f0be69f70.jpg', '2019-03-23 22:43:36'),
(9, 'manks dam sda', 4, '2000', '/pcs', '4', '<p>kajsn dnakjsn d</p>\r\n', '09dd8c2662b96ce14928333f055c5580.png', '2019-03-23 22:44:08'),
(10, 'a smd asdm ams d,asd', 4, '90000', '/pcs', '9', '<p>naksjdnwakjn sd anksdn</p>\r\n', '8266e4bfeda1bd42d8f9794eb4ea0a13.png', '2019-03-23 23:28:43'),
(11, 'lkansmd ma smd', 4, '9000', '/pcs', '100', '<p>lkas dkjaks nd</p>\r\n', '6f5c20d585da8519e652f9c2d93822d1.png', '2019-03-23 23:29:15'),
(12, 'nama barang', 4, '2000', '/3bungkus', '2', '<p>as dasd asd</p>\r\n', '9c0097dc99a22bbbff984af69195525f.jpeg', '2019-04-05 01:32:30'),
(13, 'yahya', 4, '2000', '/3bungkus', '5', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione, voluptates, porro perferendis nobis totam quibusdam consequuntur ducimus odio incidunt, quo exercitationem itaque obcaecati! Sunt vel esse exercitationem dolorum. Debitis, similique.</p>\r\n', '9c0097dc99a22bbbff984af69195525f.jpeg', '2019-04-05 02:12:55'),
(14, 'asdasd', 4, '4000', '/3bungkus', '3', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione, voluptates, porro perferendis nobis totam quibusdam consequuntur ducimus odio incidunt, quo exercitationem itaque obcaecati! Sunt vel esse exercitationem dolorum. Debitis, similique.</p>\r\n', '', '2019-04-05 02:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'kosmetik'),
(5, 'krudung'),
(6, 'lain');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `kuantiti` int(11) NOT NULL,
  `kode_user` int(11) NOT NULL,
  `tanggaljam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `kode_barang`, `status`, `kuantiti`, `kode_user`, `tanggaljam`) VALUES
(2, 'TR-148617', 14, 0, 2, 1, '2019-04-23 03:23:57'),
(3, 'TR-123870', 12, 0, 2, 1, '2019-04-23 03:26:26'),
(4, 'TR-142752', 14, 0, 1, 1, '2019-04-23 23:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_lengkap`, `password`, `email`, `no_hp`) VALUES
(1, 'user', 'user', '12dea96fec20593566ab75692c9949596833adc9', 'user@gmail.com', '1234567890123'),
(2, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `id_web` int(11) NOT NULL,
  `bagian` varchar(20) NOT NULL,
  `keterangan1` text NOT NULL,
  `keterangan2` text NOT NULL,
  `keterangan3` text NOT NULL,
  `keterangan4` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id_web`, `bagian`, `keterangan1`, `keterangan2`, `keterangan3`, `keterangan4`, `created_at`) VALUES
(1, 'judul_website', 'judul website', '', '', '', '2019-03-23 00:00:00'),
(2, 'about', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam aut eaque inventore sint quae quibusdam obcaecati reprehenderit placeat veritatis ipsam tempore est aliquid, nam provident necessitatibus, rerum accusantium repellat possimus.</p>\r\n\r\n<p>Corporis aut rem beatae quos expedita, dolores fugit excepturi perferendis perspiciatis quam eaque, sapiente alias praesentium. Quod beatae reiciendis dignissimos distinctio nemo corrupti tenetur, animi odio accusantium, dolor nihil rem!</p>\r\n\r\n<p>Fuga ducimus possimus ullam quos nostrum dolorum totam eos incidunt laborum fugit quod esse numquam quidem at id dolores enim officia, repellendus neque nisi pariatur. Inventore quis aliquid dolorum repellat.</p>\r\n\r\n<p>Earum, culpa perferendis sed atque tempore alias cupiditate tenetur eveniet impedit eum assumenda sunt est veritatis vitae asperiores, nostrum vel, iste optio voluptatum officiis aperiam sapiente nemo soluta! Obcaecati, rem.</p>\r\n\r\n<p>Quo sit reiciendis soluta provident possimus, voluptatum ipsa maxime fugit ab consequuntur suscipit perspiciatis beatae eius rem officia nemo neque qui ullam quos nostrum maiores animi esse? Vitae, perspiciatis repudiandae?</p>\r\n', '', '', '', '2019-04-05 00:00:00'),
(3, 'contact', '0895357948031', '<p>E-Shopper Inc. 935 W. Webster Ave New Streets Chicago, IL 60614, NY Newyork USA</p>\r\n', 'ahmadyahyay@gmail.com', '', '2019-04-05 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id_web`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `web`
--
ALTER TABLE `web`
  MODIFY `id_web` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
