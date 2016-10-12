-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2016 at 05:30 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

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

CREATE TABLE `activity` (
  `id` int(5) UNSIGNED NOT NULL,
  `customer_id` int(5) UNSIGNED NOT NULL,
  `car_id` int(5) UNSIGNED NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `detail` text,
  `date_create` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) UNSIGNED NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('owner','admin') NOT NULL DEFAULT 'admin',
  `date_create` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `role`, `date_create`) VALUES
(1, 'นาย.ชื่อ นามสกุล', 'admin', 'password', 'owner', '');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(5) UNSIGNED NOT NULL,
  `customer_id` int(5) UNSIGNED NOT NULL,
  `name_brand` varchar(100) NOT NULL,
  `name_version` varchar(100) NOT NULL,
  `identity` varchar(10) NOT NULL,
  `date_create` varchar(10) NOT NULL,
  `picture` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `customer_id`, `name_brand`, `name_version`, `identity`, `date_create`, `picture`) VALUES
(1, 1, 'porsche', '718cayman', '12345', '12/10/2016', ''),
(2, 2, 'volkswagen', 'scirocco', '13542', '12/10/2016', ''),
(3, 3, 'peugeot', '308sw', '15243', '12/10/2016', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `card` varchar(13) NOT NULL,
  `address` text,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `date_create` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `card`, `address`, `email`, `phone`, `date_create`) VALUES
(1, 'customer1', '1234567891', 'address', 'customer1@email.com', '0000000001', '12/10/2016'),
(2, 'customer2', '1234567892', 'address', 'customer2@email.com', '0000000002', '12/10/2016'),
(3, 'customer3', '1234567893', 'address', 'customer3@email.com', '0000000003', '12/10/2016');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `amount` int(5) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `name`, `brand`, `size`, `detail`, `amount`, `picture`) VALUES
(1, 'primacy3st', 'michelin', '165/65/14/79/T', 'DCP (Durable Contact Patch) กระจายแรงกด (Z-Pressure) อย่างสม่ำเสมอมากที่สุด ลดการสะสมตัวของความร้อน ทำให้ยางทนทาน ใช้งานได้ยาวนาน และ เพิ่มประสิทธิภาพการสัมผัสถนน ทำให้ได้สมรรถนะการยึดเกาะที่ดีอีกด้วย การออกแบบแก้มยางแบบแถบสี่เหลี่ยมหนา เพื่อป้องกันและลดความเสียหายที่จะเกิดขึ้นที่แก้มยางในขณะใช้งาน', 100, ''),
(2, 'capsule egr 36', 'enegy reform', '36', 'ถังแก๊ส ENERGY REFORM มีให้เลือกหลากหลายขนาด เช่น ถังแก๊สแคปซูล ขนาด 36 ลิตร, ถังแก๊สแคปซูล ขนาด 48 ลิตร, ถังแก๊สแคปซูล ขนาด 58 ลิตร, ถังแก๊สแคปซูล ขนาด 60 ลิตร ตอบสนองความต้องการได้ทุกรูปแบบ เหมาะกับรถยนต์ทุกรุ่น ทุกยี่ห้อ ผลิดจากเหล็กเกรดคุณภาพ โดยโรงงานที่ได้มาตรฐาน มั่นใจถังแก๊ส ENERGY REFORM ทุกใบมีความปลอดภัยสูงสุด', 100, ''),
(3, 'max bullet', 'lenso', '17x10.0/PCD6x139.7/ET20', 'ล้อแม็กซ์สีดำด้าน กลึงเงาหน้า ลาย เคลียร์ด้าน(MBF) MODEL : MAX - BULLET 17x10.0 PCD: 6x139.7 ET:-20 Wgt: 11.5 Kg', 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `material_usage`
--

CREATE TABLE `material_usage` (
  `id` int(5) UNSIGNED NOT NULL,
  `activity_id` int(5) UNSIGNED NOT NULL,
  `material_id` int(5) UNSIGNED NOT NULL,
  `quantity` int(5) UNSIGNED NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
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
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `material_usage`
--
ALTER TABLE `material_usage`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
