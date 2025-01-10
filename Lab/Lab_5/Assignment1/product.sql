-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 07:36 AM
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
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductCode` varchar(50) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Quantity` int(200) NOT NULL,
  `ImportingDate` date NOT NULL,
  `ImageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductCode`, `ProductName`, `Brand`, `Quantity`, `ImportingDate`, `ImageURL`) VALUES
('01', 'Áo', 'Hoa', 20, '2007-06-05', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIoBzuAdfGlM-28Z-w_DE0KP_ZtVQJk0p6o4UxbSOV6bzTw0N85IuustMCh0jYtVx_xSE&usqp=CAU'),
('02', 'áo', 'thỏ', 20, '2005-04-20', 'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/472894/item/goods_57_472894_3x4.jpg?width=494'),
('04', 'Áo rabbit', '454', 100, '2004-04-20', 'https://product.hstatic.net/200000037626/product/vyll4742_080355a1158b4e47876b85849ca7d05f_grande.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
