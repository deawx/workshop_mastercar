-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2016 at 09:52 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mastercar`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(5) unsigned NOT NULL,
  `customer_id` int(5) unsigned NOT NULL,
  `car_id` int(5) unsigned NOT NULL,
  `category` enum('บันทึกจ่ายออก','บันทึกเก็บเข้า') NOT NULL DEFAULT 'บันทึกจ่ายออก',
  `title` varchar(100) NOT NULL,
  `detail` text,
  `date_create` varchar(10) NOT NULL,
  `date_modify` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(5) unsigned NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('owner','admin') NOT NULL DEFAULT 'admin',
  `date_create` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `role`, `date_create`) VALUES
(1, 'นาย.ชื่อ นามสกุล', 'owner', 'password', 'owner', '');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `id` int(5) unsigned NOT NULL,
  `name_brand` varchar(100) NOT NULL,
  `name_version` varchar(100) NOT NULL,
  `identity` varchar(10) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `date_create` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `name_brand`, `name_version`, `identity`, `picture`, `date_create`) VALUES
(1, 'tesla', 'model-s', 'tsl-100', 'tsl-100.jpg', '18/04/2016'),
(2, 'tesla', 'model-x', 'tsl-150', 'tsl-150.jpg', '18/04/2016');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(5) unsigned NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `card` varchar(13) NOT NULL,
  `address` text,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `date_create` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `card`, `address`, `email`, `phone`, `date_create`) VALUES
(1, 'customer1', '0000000000000', 'address', 'customer1@email.com', '0000000000', '18/04/2016');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `id` int(5) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `amount` int(5) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `name`, `brand`, `size`, `detail`, `amount`, `picture`) VALUES
(1, 'deestone-r702', 'deestone', '225/30R20XL 85W', 'ยางสปอร์ตที่ให้ความมั่นใจทุกสภาวะการขับขี่ ทั้งทางตรง ทางโค้ง ถนนแห้ง และถนนเปียก บล็อคดอกยางแบบ 3 มิติ เพิ่มประสิทธิภาพในการคุมควมทั้งทางตรงและการเข้าโค้งมีตั้งแต่ขอบล้อ 15 นิ้ว ถึง 17 นิ้ว ซีรีส์ 45 ถึง 65', 14, 'deestone-r702_.jpg'),
(2, 'deestone-r302', 'deestone', '265/30ZR19XL 93W', 'ยาง Comfort นุ่มเงียบ ความสะดวกสบาย ตลอดการเดินทาง ลายดอกยางแบบทิศทางเดียว เพื่อการควบคุมที่แม่นยำ', 14, 'deestone-r302_.jpg'),
(3, 'firestone-le2', 'firestone', 'P215/75R15', 'Firestone, using the philosophy of continuous improvement, is constantly making our great tires even better, including improving environmental performance. The Eco-Products designation shows this tire has the following characteristics:', 14, 'firestone-le2_firestone_P21575R15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `material_usage`
--

CREATE TABLE IF NOT EXISTS `material_usage` (
  `id` int(5) unsigned NOT NULL,
  `activity_id` int(5) unsigned NOT NULL,
  `material_id` int(5) unsigned NOT NULL,
  `quantity` int(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_usage`
--
ALTER TABLE `material_usage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `material_usage`
--
ALTER TABLE `material_usage`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
