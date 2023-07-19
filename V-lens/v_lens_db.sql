-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 12:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v_lens_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctus`
--

CREATE TABLE `ctus` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `msg` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ctus`
--

INSERT INTO `ctus` (`id`, `name`, `email`, `msg`) VALUES
(1, 'AloneWarrior', 'darshannakum2004@gmail.com', 'asd'),
(2, 'Darshan', 'asda@asd.sad', 'sada'),
(3, 'Darshan', 'qweqwe@sa.dsf', 'asdsad'),
(4, 'Darshan', 'qweqwe@sa.dsf', 'asdad'),
(5, 'ede', 'asda@asd.sad', 'sdc');

-- --------------------------------------------------------

--
-- Table structure for table `v_users`
--

CREATE TABLE `v_users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_users`
--

INSERT INTO `v_users` (`id`, `username`, `email`, `name`, `password`) VALUES
(1, 'Dominic_Toretto', 'Dominictoretto1327@webmail.com', 'Dominic Toretto', 'Dominictoretto1327@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ctus`
--
ALTER TABLE `ctus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_users`
--
ALTER TABLE `v_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ctus`
--
ALTER TABLE `ctus`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `v_users`
--
ALTER TABLE `v_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
