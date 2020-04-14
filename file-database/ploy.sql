-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 05:25 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ploy`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `number_std` varchar(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `class` varchar(50) NOT NULL,
  `d_partment` varchar(100) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `late` varchar(11) NOT NULL,
  `c_early` varchar(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `dont_come` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `number_std`, `username`, `class`, `d_partment`, `photo`, `late`, `c_early`, `status`, `dont_come`) VALUES
(3, 'admin123', 'admin root', 'teacher', 'teacher', '123.jpg', 'null', 'null', 'admin', 'null'),
(4, '6100110435', 'ชูไรนี  ลาเตะ', 'ปวส2/2', 'ไอที', 'img_5e94a3c706645.jpg', '4    ', '11     ', 'user', '50     '),
(5, '6139010035', 'อับดุลเราะห์มาน เส็นสอ', 'ปวส 2/2', 'ไอที', 'img_5e957cfd040af.jpg', '2 ', '10', 'user', '1 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
