-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: July 04, 2022 at 05:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronic`
--
CREATE DATABASE electronic;
USE electronic;
-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phoneNo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `fullname`, `phoneNo`, `address`, `role_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '9ef9ee5a94d29fbc31c2509e1afb60e8', 'Ngô Quang Vinh', '0925024948', 'Dong Da,Ha Noi', 1, 'a48a6eafa876e02aafc51cc34aed99df', '2022-07-04 22:17:15', '2022-07-26 01:37:40'),
(2, 'admin1@gmail.com', 'd9b11768790af31fdfc19cc17e3d5027', 'vinh', '12345678', 'ha noi', 1, '7dbc982200434bc7be5c71c2b17157d9', '2022-07-18 04:43:08', NULL),
(3, 'user@gmail.com', 'd9b11768790af31fdfc19cc17e3d5027', 'user', '123456789', 'hanoi', 2, '14a8e7a171209d4a5d30fe533c56fd98', '2022-07-23 18:44:58', NULL),
(4, 'ngovinh1211@gmail.com', 'd9b11768790af31fdfc19cc17e3d5027', 'Ngô Quang Vinh', '0925024948', 'Dong Da, Ha Noi', 2, NULL, '2022-07-26 06:54:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`) VALUES
(1, 'Apple'),
(3, 'Oppo'),
(2, 'Samsung'),
(4, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Cellphones'),
(4, 'Earphone'),
(3, 'Smartwatch'),
(2, 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color_name`) VALUES
(2, 'Black'),
(6, 'Blue'),
(7, 'Cream'),
(1, 'Gold'),
(5, 'Green'),
(8, 'Pink'),
(9, 'Purple'),
(10, 'Red'),
(3, 'Silver'),
(4, 'White');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNo` varchar(255) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fullname`, `email`, `phoneNo`, `subject_name`, `note`, `created_at`, `status`) VALUES
(1, 'user', 'user123@gmail.com', '123', 'testfb', 'testing feedback 123', '2022-07-24 03:42:59', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_id` varchar(255) DEFAULT NULL,
  `storage_id` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `color_id`, `storage_id`, `price`, `quantity`) VALUES
(1, 1, 1, 'Gold', '128GB', 1499, 1);


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `soft_delete` int(11) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `thumbnail`, `price`, `category_id`, `brand_id`, `created_at`, `updated_at`, `soft_delete`, `deleted_at`) VALUES
(1, 'Apple Iphone 13 Pro Max', './public/description/ip13pm.doc', './public/img/product/B1.jpg', 1499, 1, 1, NULL, '2022-07-26 02:50:33', 0, NULL),
(2, 'Apple Iphone 13 Pro', './public/description/ip13p.doc', './public/img/product/B2.jpg', 1399, 1, 1, NULL, NULL, 0, NULL),
(3, 'Apple Iphone 13 ', './public/description/ip13.doc', './public/img/product/B3.jpg', 1199, 1, 1, NULL, NULL, 0, NULL),
(4, 'Apple Iphone 12 Pro Max', './public/description/ip12pm.doc', './public/img/product/B4.jpg', 1299, 1, 1, NULL, '2022-07-24 03:54:43', 0, NULL),
(5, 'Apple Iphone 12 Pro', './public/description/ip12p.doc', './public/img/product/B5.jpg', 1199, 1, 1, NULL, NULL, 0, NULL),
(6, 'Apple Iphone 12 ', './public/description/ip12.doc', './public/img/product/B6.jpg', 899, 1, 1, NULL, NULL, 0, NULL),
(7, 'Samsung Galaxy S22 Ultra', './public/description/sss22u.doc', './public/img/product/B7.jpg', 1299, 1, 2, NULL, NULL, 0, NULL),
(8, 'Samsung Galaxy S22 Plus', './public/description/sss22p.doc', './public/img/product/B8.jpg', 1199, 1, 2, NULL, NULL, 0, NULL),
(9, 'Samsung Galaxy Z Fold3', './public/description/sszf3.doc', './public/img/product/B9.jpg', 2099, 1, 2, NULL, NULL, 0, NULL),
(10, 'Samsung Galaxy Z Flip3', './public/description/sszflip3.doc', './public/img/product/B10.jpg', 1149, 1, 2, NULL, NULL, 0, NULL),
(11, 'OPPO Reno 6', './public/description/opreno6.doc', './public/img/product/B11.jpg', 399, 1, 3, NULL, NULL, 0, NULL),
(12, 'OPPO Reno 6 Z', './public/description/opreno6z.doc', './public/img/product/B12.jpg', 359, 1, 3, NULL, NULL, 0, NULL),
(13, 'OPPO Reno 7 Z', './public/description/opreno7z.doc', './public/img/product/B13.jpg', 399, 1, 3, NULL, NULL, 0, NULL),
(14, 'OPPO Reno 7 ', './public/description/opreno7.doc', './public/img/product/B14.jpg', 459, 1, 3, NULL, NULL, 0, NULL),
(15, 'Xiaomi 12 Pro ', './public/description/xiaomi12p.doc', './public/img/product/B15.jpg', 1099, 1, 4, NULL, NULL, 0, NULL),
(16, 'Xiaomi Mi 11 ', './public/description/xiaomi11.doc', './public/img/product/B16.jpg', 899, 1, 4, NULL, NULL, 0, NULL),
(17, 'Apple iPad Pro M1', './public/description/ipadpro.doc', './public/img/product/B17.jpg', 1269, 2, 1, NULL, '2022-07-24 03:41:16', 0, NULL),
(18, 'Apple iPad Air 10.9', './public/description/ipadair.doc', './public/img/product/B18.jpg', 749, 2, 1, NULL, NULL, 0, NULL),
(19, 'Samsung Galaxy Tab S8 Ultra', './public/description/sstabs8u.doc', './public/img/product/B19.jpg', 1299, 2, 2, NULL, NULL, 0, NULL),
(20, 'Samsung Galaxy Tab S8', './public/description/sstabs8.doc', './public/img/product/B20.jpg', 899, 2, 2, NULL, NULL, 0, NULL),
(21, 'Xiaomi Tab 5', './public/description/xiaomipad5.doc', './public/img/product/B21.jpg', 399, 2, 4, NULL, NULL, 0, NULL),
(22, 'Apple Watch Series 6', './public/description/apws6.doc', './public/img/product/B22.jpg', 799, 3, 1, NULL, NULL, 0, NULL),
(23, 'Apple Watch Series 7', './public/description/apws7.doc', './public/img/product/B23.jpg', 849, 3, 1, NULL, NULL, 0, NULL),
(24, 'Samsung Galaxy Watch 3', './public/description/ssgw3.doc', './public/img/product/B24.jpg', 349, 3, 2, NULL, NULL, 0, NULL),
(25, 'Samsung Galaxy Watch 4 Classic', './public/description/ssgw4.doc', './public/img/product/B25.jpg', 419, 3, 2, NULL, NULL, 0, NULL),
(26, 'Samsung Galaxy Watch 5 ', './public/description/ssgw5.doc', './public/img/product/B26.jpg', 499, 3, 2, NULL, NULL, 0, NULL),
(27, 'OPPO BAND', './public/description/oppoband.doc', './public/img/product/B27.jpg', 49, 3, 3, NULL, NULL, 0, NULL),
(28, 'Apple Airpod Max', './public/description/airpodmax.doc', './public/img/product/B28.jpg', 599, 4, 1, NULL, NULL, 0, NULL),
(29, 'Apple Airpod Pro', './public/description/airpodpro.doc', './public/img/product/B29.jpg', 299, 4, 1, NULL, NULL, 0, NULL),
(30, 'Apple Airpod 2', './public/description/airpod2.doc', './public/img/product/B30.jpg', 159, 4, 1, NULL, NULL, 0, NULL),
(31, 'Apple Airpod 3', './public/description/airpod3.doc', './public/img/product/B31.jpg', 199, 4, 1, NULL, NULL, 0, NULL),
(32, 'Samsung Galaxy Buds Pro', './public/description/ssbudspro.doc', './public/img/product/B32.jpg', 139, 4, 2, NULL, NULL, 0, NULL),
(33, 'Xiaomi Buds 3T Pro', './public/description/xiaomibuds3tpro.doc', './public/img/product/B33.jpg', 119, 4, 4, NULL, NULL, 0, NULL),
(34, 'Xiaomi Redmi Buds 3 Pro', './public/description/xiaomiredmibuds.doc', './public/img/product/B34.jpg', 69, 4, 4, NULL, NULL, 0, NULL),
(35, 'Oppo Enco Air', './public/description/oppoencoair.doc', './public/img/product/B35.jpg', 39, 4, 3, NULL, '2022-07-26 01:40:03', 0, NULL),
(36, 'Samsung Galaxy A53', './public/description/ssa53.doc', './public/img/product/B36.jpg', 389, 1, 2, NULL, '2022-07-26 01:40:59', 0, NULL),
(37, 'Samsung Galaxy A73', './public/description/ssa73.doc', './public/img/product/B37.jpg', 469, 1, 2, NULL, '2022-07-26 01:42:31', 0, NULL),
(38, 'Samsung Galaxy Buds 2', './public/description/ssbuds2.doc', './public/img/product/B38.jpg', 219, 4, 2, NULL, '2022-07-26 01:43:13', 0, NULL),
(39, 'Samsung Galaxy Buds Live', './public/description/ssbudslive.doc', './public/img/product/B39.jpg', 169, 4, 2, NULL, '2022-07-26 01:43:49', 0, NULL),
(40, 'Samsung Galaxy Tab A8', './public/description/sstaba8.doc', './public/img/product/B40.jpg', 349, 2, 2, NULL, '2022-07-26 01:44:30', 0, NULL),
(41, 'Xiaomi Pad 5 Pro', './public/description/xiaomipad5pro.doc', './public/img/product/B41.jpg', 439, 2, 4, NULL, '2022-07-26 01:45:04', 0, NULL),
(42, 'Apple iPad Mini 6', './public/description/ipadmini6.doc', './public/img/product/B42.jpg', 649, 2, 1, NULL, '2022-07-26 01:45:41', 0, NULL),
(43, 'Apple iPad 10.2', './public/description/ipad10-2.doc', './public/img/product/B43.jpg', 499, 2, 1, NULL, '2022-07-26 01:46:25', 0, NULL),
(44, 'Xiaomi Mi Band 7', './public/description/xiaomiband7.doc', './public/img/product/B44.jpg', 59, 3, 4, NULL, '2022-07-26 01:46:44', 0, NULL),
(45, 'Xiaomi Mi Watch', './public/description/xiaomiwatch.doc', './public/img/product/B45.jpg', 89, 3, 4, NULL, '2022-07-26 01:47:11', 0, NULL),
(46, 'OPPO Watch', './public/description/oppowatch.doc', './public/img/product/B46.jpg', 199, 3, 3, NULL, '2022-07-26 01:47:46', 0, NULL),
(47, 'Apple Watch SE', './public/description/apwse.doc', './public/img/product/B47.jpg', 499, 3, 1, NULL, '2022-07-26 01:48:16', 0, NULL),
(48, 'Samsung Galaxy Tab A7 Lite', './public/description/sstaba7.doc', './public/img/product/B48.jpg', 299, 2, 2, NULL, '2022-07-26 01:48:40', 0, NULL),
(49, 'Oppo Enco Air 2', './public/description/oppoencoair2.doc', './public/img/product/B49.jpg', 59, 4, 3, NULL, '2022-07-26 01:48:57', 0, NULL),
(50, 'Oppo A95', './public/description/oppoa95.doc', './public/img/product/B50.jpg', 299, 1, 3, NULL, '2022-07-26 01:49:14', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`product_id`, `color_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 2),
(3, 4),
(3, 10),
(3, 6),
(3, 8),
(5, 1),
(5, 2),
(5, 4),
(5, 6),
(6, 4),
(6, 10),
(6, 5),
(6, 2),
(7, 2),
(7, 4),
(7, 6),
(7, 9),
(8, 2),
(8, 5),
(8, 8),
(8, 7),
(9, 2),
(9, 5),
(9, 9),
(10, 2),
(10, 1),
(10, 5),
(10, 9),
(11, 2),
(11, 6),
(12, 2),
(12, 6),
(13, 2),
(13, 6),
(14, 2),
(14, 4),
(15, 6),
(15, 2),
(15, 9),
(16, 6),
(16, 2),
(16, 4),
(17, 2),
(17, 3),
(18, 2),
(18, 3),
(19, 2),
(19, 3),
(20, 2),
(20, 3),
(21, 2),
(21, 3),
(22, 2),
(22, 1),
(22, 3),
(23, 2),
(23, 1),
(23, 3),
(24, 2),
(24, 3),
(25, 2),
(26, 2),
(27, 2),
(27, 9),
(28, 3),
(28, 6),
(28, 5),
(28, 10),
(29, 4),
(30, 4),
(31, 4),
(32, 3),
(32, 9),
(32, 2),
(33, 2),
(33, 4),
(34, 2),
(34, 4),
(14, 6),
(15, 5),
(1, 1),
(1, 2),
(1, 5),
(1, 4),
(1, 6),
(4, 1),
(4, 2),
(4, 4),
(4, 6),
(35, 2),
(35, 6),
(35, 5),
(35, 4),
(36, 2),
(36, 6),
(36, 4),
(37, 2),
(37, 6),
(37, 9),
(38, 2),
(38, 9),
(38, 4),
(39, 2),
(39, 8),
(39, 4),
(40, 2),
(40, 3),
(41, 2),
(41, 4),
(42, 2),
(42, 8),
(42, 9),
(42, 3),
(43, 2),
(43, 8),
(43, 3),
(44, 2),
(45, 2),
(45, 6),
(45, 3),
(46, 2),
(46, 8),
(47, 2),
(47, 8),
(47, 4),
(48, 2),
(48, 3),
(49, 2),
(49, 6),
(49, 4),
(50, 2),
(50, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `canceled_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `account_id`, `note`, `order_date`, `status`, `canceled_at`) VALUES
(1, 3, 'đơn hàng ck', '2022-07-15 15:16:55', 'Ordered successfully', NULL);


-- --------------------------------------------------------

--
-- Table structure for table `product_storage`
--

CREATE TABLE `product_storage` (
  `product_id` int(11) DEFAULT NULL,
  `storage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_storage`
--

INSERT INTO `product_storage` (`product_id`, `storage_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3),
(7, 2),
(7, 3),
(7, 4),
(8, 1),
(8, 2),
(8, 3),
(9, 2),
(9, 3),
(9, 4),
(10, 2),
(10, 3),
(10, 4),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 2),
(15, 3),
(15, 4),
(16, 2),
(16, 3),
(16, 4),
(17, 3),
(17, 4),
(18, 3),
(18, 4),
(19, 3),
(19, 4),
(20, 3),
(20, 4),
(21, 2),
(21, 3),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 5),
(32, 5),
(33, 5),
(34, 5),
(4, 2),
(4, 3),
(4, 4),
(35, 5),
(36, 1),
(36, 2),
(36, 3),
(37, 1),
(37, 2),
(37, 3),
(38, 5),
(39, 5),
(40, 2),
(40, 3),
(41, 1),
(41, 2),
(41, 3),
(42, 1),
(42, 2),
(42, 3),
(43, 1),
(43, 2),
(43, 3),
(44, 5),
(45, 5),
(46, 5),
(47, 5),
(48, 1),
(48, 2),
(49, 5),
(50, 1),
(50, 2),
(1, 2),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `storage_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`id`, `storage_name`) VALUES
(1, '64GB'),
(2, '128GB'),
(3, '256GB'),
(4, '512GB'),
(5, 'NON STORAGE');

-- --------------------------------------------------------

--
-- Table structure for table `thumbnail`
--

CREATE TABLE `thumbnail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thumbnail`
--

INSERT INTO `thumbnail` (`id`, `product_id`, `thumbnail`) VALUES
(1, 1, './public/img/product/A1-1.jpg'),
(2, 1, './public/img/product/A1-2.jpg'),
(3, 1, './public/img/product/A1-3.jpg'),
(4, 1, './public/img/product/A1-4.jpg'),
(5, 2, './public/img/product/A2-1.jpg'),
(6, 2, './public/img/product/A2-2.jpg'),
(7, 2, './public/img/product/A2-3.jpg'),
(8, 2, './public/img/product/A2-4.jpg'),
(9, 3, './public/img/product/A3-1.jpg'),
(10, 3, './public/img/product/A3-2.jpg'),
(11, 3, './public/img/product/A3-3.jpg'),
(12, 3, './public/img/product/A3-4.jpg'),
(13, 4, './public/img/product/A4-1.jpg'),
(14, 4, './public/img/product/A4-2.jpg'),
(15, 4, './public/img/product/A4-3.jpg'),
(16, 4, './public/img/product/A4-4.jpg'),
(17, 5, './public/img/product/A5-1.jpg'),
(18, 5, './public/img/product/A5-2.jpg'),
(19, 5, './public/img/product/A5-3.jpg'),
(20, 5, './public/img/product/A5-4.jpg'),
(21, 6, './public/img/product/A6-1.jpg'),
(22, 6, './public/img/product/A6-2.jpg'),
(23, 6, './public/img/product/A6-3.jpg'),
(24, 6, './public/img/product/A6-4.jpg'),
(25, 7, './public/img/product/A8-1.jpg'),
(26, 7, './public/img/product/A8-2.jpg'),
(27, 7, './public/img/product/A8-3.jpg'),
(28, 7, './public/img/product/A8-4.jpg'),
(29, 8, './public/img/product/A7-1.jpg'),
(30, 8, './public/img/product/A7-2.jpg'),
(31, 8, './public/img/product/A7-3.jpg'),
(32, 8, './public/img/product/A7-4.jpg'),
(33, 9, './public/img/product/A9-1.jpg'),
(34, 9, './public/img/product/A9-2.jpg'),
(35, 9, './public/img/product/A9-3.jpg'),
(36, 10, './public/img/product/A10-1.jpg'),
(37, 10, './public/img/product/A10-2.jpg'),
(38, 10, './public/img/product/A10-3.jpg'),
(39, 10, './public/img/product/A10-4.jpg'),
(40, 11, './public/img/product/A11-1.jpg'),
(41, 11, './public/img/product/A11-2.jpg'),
(42, 12, './public/img/product/A11-3.jpg'),
(43, 12, './public/img/product/A11-4.jpg'),
(44, 15, './public/img/product/A14-1.jpg'),
(45, 15, './public/img/product/A14-2.jpg'),
(46, 15, './public/img/product/A14-3.jpg'),
(47, 16, './public/img/product/A13-1.jpg'),
(48, 16, './public/img/product/A13-2.jpg'),
(49, 16, './public/img/product/A13-3.jpg'),
(50, 20, './public/img/product/A17-1.jpg'),
(51, 21, './public/img/product/A15-1.jpg'),
(52, 21, './public/img/product/A15-2.jpg'),
(53, 22, './public/img/product/A18-1.jpg'),
(54, 22, './public/img/product/A18-2.jpg'),
(55, 22, './public/img/product/A18-3.jpg'),
(56, 22, './public/img/product/A18-4.jpg'),
(57, 23, './public/img/product/A19-1.jpg'),
(58, 23, './public/img/product/A19-2.jpg'),
(59, 23, './public/img/product/A19-3.jpg'),
(60, 27, './public/img/product/A21-1.jpg'),
(61, 28, './public/img/product/A23-1.jpg'),
(62, 28, './public/img/product/A23-2.jpg'),
(63, 28, './public/img/product/A23-3.jpg'),
(64, 28, './public/img/product/A23-4.jpg'),
(65, 32, './public/img/product/A28-1.jpg'),
(66, 32, './public/img/product/A28-2.jpg'),
(67, 32, './public/img/product/A28-3.jpg'),
(68, 32, './public/img/product/A28-4.jpg'),
(69, 31, './public/img/product/A29-1.jpg'),
(70, 31, './public/img/product/A29-2.jpg'),
(71, 31, './public/img/product/A29-3.jpg'),
(72, 30, './public/img/product/A30-1.jpg'),
(73, 30, './public/img/product/A30-2.jpg'),
(74, 30, './public/img/product/A30-3.jpg'),
(75, 29, './public/img/product/A31-1.jpg'),
(76, 29, './public/img/product/A31-2.jpg'),
(77, 29, './public/img/product/A31-3.jpg'),
(78, 27, './public/img/product/A21-2.jpg'),
(79, 27, './public/img/product/A21-3.jpg'),
(80, 26, './public/img/product/A32-1.jpg'),
(81, 26, './public/img/product/A32-2.jpg'),
(82, 26, './public/img/product/A32-3.jpg'),
(83, 25, './public/img/product/A33-1.jpg'),
(84, 25, './public/img/product/A33-2.jpg'),
(85, 25, './public/img/product/A33-4.jpg'),
(86, 20, './public/img/product/A17-2.jpg'),
(87, 20, './public/img/product/A17-3.jpg'),
(88, 20, './public/img/product/A17-4.jpg'),
(89, 19, './public/img/product/A34-1.jpg'),
(90, 19, './public/img/product/A34-2.jpg'),
(91, 19, './public/img/product/A34-3.jpg'),
(92, 18, './public/img/product/A35-1.jpg'),
(93, 18, './public/img/product/A35-2.jpg'),
(94, 18, './public/img/product/A35-4.jpg'),
(95, 18, './public/img/product/A35-3.jpg'),
(96, 17, './public/img/product/A36-1.jpg'),
(97, 17, './public/img/product/A36-2.jpg'),
(98, 17, './public/img/product/A35-6.jpg'),
(99, 14, './public/img/product/A37-1.jpg'),
(100, 14, './public/img/product/A37-2.jpg'),
(101, 14, './public/img/product/A37-3.jpg'),
(102, 14, './public/img/product/A37-4.jpg'),
(103, 13, './public/img/product/A38-1.jpg'),
(104, 13, './public/img/product/A38-2.jpg'),
(105, 13, './public/img/product/A38-3.jpg'),
(106, 13, './public/img/product/A38-4.jpg'),
(107, 12, './public/img/product/A39-1.jpg'),
(108, 12, './public/img/product/A39-2.jpg'),
(109, 11, './public/img/product/A11-5.jpg'),
(110, 11, './public/img/product/A11-6.jpg'),
(111, 15, './public/img/product/A40-1.jpg'),
(112, 24, './public/img/product/A41-1.jpg'),
(113, 24, './public/img/product/A41-2.jpg'),
(114, 24, './public/img/product/A41-3.jpg'),
(115, 24, './public/img/product/A41-4.jpg'),
(116, 33, './public/img/product/A42-1.jpg'),
(117, 33, './public/img/product/A42-2.jpg'),
(118, 33, './public/img/product/A42-3.jpg'),
(119, 33, './public/img/product/A42-4.jpg'),
(120, 34, './public/img/product/A43-1.jpg'),
(121, 34, './public/img/product/A43-2.jpg'),
(122, 35, './public/img/product/A44-1.jpg'),
(123, 35, './public/img/product/A44-2.jpg'),
(124, 35, './public/img/product/A44-3.jpg'),
(125, 35, './public/img/product/A44-4.jpg'),
(126, 36, './public/img/product/A45-1.jpg'),
(127, 36, './public/img/product/A45-2.jpg'),
(128, 36, './public/img/product/A45-3.jpg'),
(129, 36, './public/img/product/A45-4.jpg'),
(130, 37, './public/img/product/A46-1.jpg'),
(131, 37, './public/img/product/A46-2.jpg'),
(132, 37, './public/img/product/A46-3.jpg'),
(133, 37, './public/img/product/A46-4.jpg'),
(134, 38, './public/img/product/A47-1.jpg'),
(135, 38, './public/img/product/A47-2.jpg'),
(136, 38, './public/img/product/A47-3.jpg'),
(137, 38, './public/img/product/A47-4.jpg'),
(138, 39, './public/img/product/A48-1.jpg'),
(139, 39, './public/img/product/A48-2.jpg'),
(140, 39, './public/img/product/A48-3.jpg'),
(141, 39, './public/img/product/A48-4.jpg'),
(142, 40, './public/img/product/A49-1.jpg'),
(143, 40, './public/img/product/A49-2.jpg'),
(144, 40, './public/img/product/A49-3.jpg'),
(145, 40, './public/img/product/A49-4.jpg'),
(146, 41, './public/img/product/A50-1.jpg'),
(147, 41, './public/img/product/A50-2.jpg'),
(148, 41, './public/img/product/A50-3.jpg'),
(149, 41, './public/img/product/A50-4.jpg'),
(150, 42, './public/img/product/A51-1.jpg'),
(151, 42, './public/img/product/A51-2.jpg'),
(152, 42, './public/img/product/A51-3.jpg'),
(153, 42, './public/img/product/A51-4.jpg'),
(154, 43, './public/img/product/A52-1.jpg'),
(155, 43, './public/img/product/A52-2.jpg'),
(156, 43, './public/img/product/A52-3.jpg'),
(157, 43, './public/img/product/A52-4.jpg'),
(158, 44, './public/img/product/A53-1.jpg'),
(159, 44, './public/img/product/A53-2.jpg'),
(160, 44, './public/img/product/A53-3.jpg'),
(161, 44, './public/img/product/A53-4.jpg'),
(162, 45, './public/img/product/A54-1.jpg'),
(163, 45, './public/img/product/A54-2.jpg'),
(164, 45, './public/img/product/A54-3.jpg'),
(165, 45, './public/img/product/A54-4.jpg'),
(166, 46, './public/img/product/A55-1.jpg'),
(167, 46, './public/img/product/A55-2.jpg'),
(168, 46, './public/img/product/A55-3.jpg'),
(169, 46, './public/img/product/A55-4.jpg'),
(170, 47, './public/img/product/A56-1.jpg'),
(171, 47, './public/img/product/A56-2.jpg'),
(172, 47, './public/img/product/A56-3.jpg'),
(173, 47, './public/img/product/A56-4.jpg'),
(174, 48, './public/img/product/A57-1.jpg'),
(175, 48, './public/img/product/A57-2.jpg'),
(176, 48, './public/img/product/A57-3.jpg'),
(177, 48, './public/img/product/A57-4.jpg'),
(178, 49, './public/img/product/A58-1.jpg'),
(179, 49, './public/img/product/A58-2.jpg'),
(180, 49, './public/img/product/A58-3.jpg'),
(181, 49, './public/img/product/A58-4.jpg'),
(182, 50, './public/img/product/A59-1.jpg'),
(183, 50, './public/img/product/A59-2.jpg'),
(184, 50, './public/img/product/A59-3.jpg'),
(185, 50, './public/img/product/A59-4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `color_name` (`color_name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `product_storage`
--
ALTER TABLE `product_storage`
  ADD KEY `storage_id` (`storage_id`),
  ADD KEY `product_storage_ibfk_2` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thumbnail`
--
ALTER TABLE `thumbnail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `product_order` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_color_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_color_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `product_color_ibfk_4` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`);

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `product_storage`
--
ALTER TABLE `product_storage`
  ADD CONSTRAINT `product_storage_ibfk_1` FOREIGN KEY (`storage_id`) REFERENCES `storage` (`id`),
  ADD CONSTRAINT `product_storage_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD CONSTRAINT `thumbnail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
