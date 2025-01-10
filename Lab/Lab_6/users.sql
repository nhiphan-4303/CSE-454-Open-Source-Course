-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 04:46 PM
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
-- Database: `storeuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FullName` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(11) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `DateOfRegister` date DEFAULT NULL,
  `Type` enum('Admin','Author','Normal User') DEFAULT 'Normal User',
  `Status` enum('activated','disabled') DEFAULT 'activated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Email`, `Password`, `FullName`, `PhoneNumber`, `Address`, `DateOfRegister`, `Type`, `Status`) VALUES
(11, 'vananh@gmail.com', '$2y$10$p92SCxxJck.N/.DNRwZjHuzqwkRkaxyoiefatiyBwF02ytLozks3e', 'Nguyễn Văn Anh', '0123456789', 'Thu Dau Mot', '2024-02-14', 'Normal User', 'activated'),
(13, 'sonbinh@gmail.com', '$2y$10$oW/4EGo.bx3jLksVRQRNAe8Jj11TMDUStc/Wil2jrY7', 'Nguyễn Sơn Bình', '0908070605', 'Thuan An', '2005-06-04', 'Admin', 'disabled'),
(14, 'vancong@gmail.com', '$2y$10$crAT3rzCS9KrMwzbbfLNIecfYfbXTiN1RcKPFOXk4B4', 'Nguyễn Văn Công', '0929468521', 'Lái Thiêu', '2003-05-12', 'Author', 'activated'),
(16, 'tuminh@gmail.com', '$2y$10$/eaG5LDskQD4hNVhq5vQPOZK/k377wGprE31dpug2f6', 'Khổng Tú Minh', '0909123654', 'An Điền', '1998-02-15', 'Author', 'disabled'),
(18, 'trongkhang@gmai.com', '$2y$10$gctBdEJiYXRguYm3ZTGq7uKQEdGbLBFOewC.g2AcOTz', 'Trần Trọng Khang', '0989725246', 'Bình Thuận', '2003-04-03', 'Normal User', 'disabled'),
(21, 'maiphuong@gmail.com', '$2y$10$9coTui6VA8/SolTxp0aLEeozxWqfuMwl3rpFZQBCRqP', 'Tôn Nữ Mai Phương', '0939512683', 'Dĩ An', '2002-04-25', 'Normal User', 'disabled'),
(22, 'hnhi@gmail.com', '$2y$10$2aj9Z1ZXuRetEADyZqvW/O.4l8iliB2shIgN9yvm3KD3eYsNXL3L.', 'Phan Ngọc Hạnh Nhi', '093456789', '241 Hưng Phước', '2003-03-04', 'Author', 'activated'),
(23, 'nhi@gmail.com', '$2y$10$bPQ2lahbFMYxbu698T.DzeqIsFFgTSEbCfA1xZryoKXzGa9jkaUQu', 'Phan Ngọc Hạnh Nhi', '0789654632', '241 Hưng Phước', '2020-11-20', 'Admin', 'activated'),
(24, 'a@gmail.com', '$2y$10$nbN9p.Sj3pxRQPEWPinHpOeIpCHeH2ZZ//cWA26b2uKg2khy6J2Ai', 'nguyễn a', '895573424', 'Bến Cát', '2003-11-20', 'Admin', 'activated'),
(25, 'b@gmail.com', '$2y$10$t7o7hss65DxN5G6UmcVIWuo4nDQkpmWrmte8VRvF.F66VXk4ftyKG', 'Phan Ngọc Hạnh Nhi', '0123456789', '241 Hưng Phước', '2005-02-05', 'Author', 'activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
