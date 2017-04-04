-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 12:04 PM
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

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `customer_id`, `car_id`, `category`, `title`, `detail`, `date_create`) VALUES
(1, 1, 1, 'บันทึกจ่ายออก', '11', '11', '16/02/2017'),
(2, 2, 2, 'บันทึกจ่ายออก', 'ๅๅ', 'ๅๅ', '16/02/2017'),
(3, 0, 0, 'บันทึกเก็บเข้า', 'test', 'test', '16/02/2017');

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
  `identity` varchar(50) NOT NULL,
  `date_create` varchar(10) NOT NULL,
  `picture` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `customer_id`, `name_brand`, `name_version`, `identity`, `date_create`, `picture`) VALUES
(1, 1, 'porsche', '718cayman', '99999กรุงเทพมหานคร', '16/02/2017', ''),
(2, 2, 'volkswagen', 'scirocco', '99999ประจวบคีรีขันธ์', '16/02/2017', ''),
(3, 3, 'peugeot', '308sw', '99999เชียงใหม่', '16/02/2017', '');

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
  `phone_home` varchar(15) NOT NULL,
  `phone_mobile` varchar(15) NOT NULL,
  `date_create` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `card`, `address`, `email`, `phone_home`, `phone_mobile`, `date_create`) VALUES
(1, 'customer1', '1234567891', 'address', 'customer1@email.com', '0000000000', '0000000000', '16/02/2017'),
(2, 'customer2', '1234567892', 'address', 'customer2@email.com', '0000000000', '0000000000', '16/02/2017'),
(3, 'customer3', '1234567893', 'address', 'customer3@email.com', '0000000000', '0000000000', '16/02/2017'),
(4, '12123123', '1231231231231', '12323', '123123@123.com', '1231231231', '1231231231', '02/04/2017'),
(5, 'test', '5461541654564', '123123', '45646@4564.com', '4564654564', '4564564564', '02/04/2017');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` enum('อะไหล่รถ','ถังแก็ส','ล้อรถ','อื่นๆ') NOT NULL DEFAULT 'อื่นๆ',
  `brand` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `amount` int(5) NOT NULL,
  `amount_alert` int(3) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `name`, `type`, `brand`, `size`, `detail`, `amount`, `amount_alert`, `picture`) VALUES
(1, 'primacy3st', 'อื่นๆ', 'michelin', '165/65/14/79/T', 'DCP (Durable Contact Patch) กระจายแรงกด (Z-Pressure) อย่างสม่ำเสมอมากที่สุด ลดการสะสมตัวของความร้อน ทำให้ยางทนทาน ใช้งานได้ยาวนาน และ เพิ่มประสิทธิภาพการสัมผัสถนน ทำให้ได้สมรรถนะการยึดเกาะที่ดีอีกด้วย การออกแบบแก้มยางแบบแถบสี่เหลี่ยมหนา เพื่อป้องกันและลดความเสียหายที่จะเกิดขึ้นที่แก้มยางในขณะใช้งาน', 5, 10, ''),
(2, 'capsule egr 36', 'อื่นๆ', 'enegy reform', '36', 'ถังแก๊ส ENERGY REFORM มีให้เลือกหลากหลายขนาด เช่น ถังแก๊สแคปซูล ขนาด 36 ลิตร, ถังแก๊สแคปซูล ขนาด 48 ลิตร, ถังแก๊สแคปซูล ขนาด 58 ลิตร, ถังแก๊สแคปซูล ขนาด 60 ลิตร ตอบสนองความต้องการได้ทุกรูปแบบ เหมาะกับรถยนต์ทุกรุ่น ทุกยี่ห้อ ผลิดจากเหล็กเกรดคุณภาพ โดยโรงงานที่ได้มาตรฐาน มั่นใจถังแก๊ส ENERGY REFORM ทุกใบมีความปลอดภัยสูงสุด', 10, 10, ''),
(3, 'max bullet', 'อื่นๆ', 'lenso', '17x10.0/PCD6x139.7/ET20', 'ล้อแม็กซ์สีดำด้าน กลึงเงาหน้า ลาย เคลียร์ด้าน(MBF) MODEL : MAX - BULLET 17x10.0 PCD: 6x139.7 ET:-20 Wgt: 11.5 Kg', 99, 10, '');

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

--
-- Dumping data for table `material_usage`
--

INSERT INTO `material_usage` (`id`, `activity_id`, `material_id`, `quantity`, `price`) VALUES
(1, 1, 3, 1, 10),
(2, 1, 2, 1, 10),
(3, 1, 1, 1, 10),
(4, 2, 3, 1, 10),
(5, 2, 2, 1, 10),
(6, 2, 1, 1, 10),
(7, 3, 3, 1, 20),
(8, 3, 2, 1, 20),
(9, 3, 1, 1, 20);

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
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `material_usage`
--
ALTER TABLE `material_usage`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
