-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 08:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orange_tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'ammar', 'ammar@gmail.com', '1234'),
(2, 'walaa', 'walaa12@gmail.com', '1234'),
(4, 'test', 'deaiaa.1999@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `address`, `image`) VALUES
(18, 'ajloun', '16401822511ajloun.jpg'),
(19, 'AL-SALT', '16401970221salt.jpg'),
(20, 'Jerash', '16401970431jerash.jpg'),
(21, 'Irbid', '16401971211irbid.jpg'),
(22, 'Ma\'daba', '16401972141madaba.jpg'),
(23, 'Ma\'an', '16401972871m.jpg'),
(24, 'AL-Aqapa', '16401974171aqapa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `email`, `subject`) VALUES
(1, 'ammar', 'ammarhardan@gmail.com', 'qqqq wwwww eeeee rrrrr ttttttt yyyyyy\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tourist_place`
--

CREATE TABLE `tourist_place` (
  `id` int(11) NOT NULL,
  `nameplace` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourist_place`
--

INSERT INTO `tourist_place` (`id`, `nameplace`, `description`, `img`, `lat`, `lon`, `city_id`) VALUES
(1, 'wadii ram', 'awgfvoepiasnveesgvssssss\r\nssssssssssssssssssssssss\r\nsssssssssssssssssssssssss\r\nssssssssssssssssssssssssss\r\nsssssssssssd', '', '12.24.234', '34414.14', NULL),
(2, 'petra', 'qewfeqfeaveav\r\neveaeaveavaeveabea\r\nvaevaeva', '', '12.2312', '3e.12', NULL),
(3, 'Dead Sea', 'wdwavcawvaevaevavav\r\navavavavavdsbrhbr\r\nsdv\r\ned\r\nv\r\nsed\r\nvsed', '', '12.3324', '12.3243', NULL),
(6, 'Yahya', 'eff', '164017364013c23fb91-5996-4c0a-a32d-d81c5e18e2ed.jpg', '12.4324', '13.3535', NULL),
(7, 'orange', 'sasgveages', '164018364911.webp', '12.32432', '23..3223', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'ammar', 'ammar@gmail.com', '+962799271885', '1234'),
(10, 'ammar', 'abed@gmail.com', '023428523', '1233'),
(11, 'test', 'test12@gmail.com', '3254375867', '1234'),
(12, 'ammarrr', 'abed11@gmail.com', '0234285232w', '123311');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourist_place`
--
ALTER TABLE `tourist_place`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tourist_place`
--
ALTER TABLE `tourist_place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tourist_place`
--
ALTER TABLE `tourist_place`
  ADD CONSTRAINT `city_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
