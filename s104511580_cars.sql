-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 05:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s104511580_cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `make` varchar(25) NOT NULL,
  `model` varchar(25) NOT NULL,
  `price` float NOT NULL,
  `yom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `make`, `model`, `price`, `yom`) VALUES
(1, 'Holden', 'Astra', 14000, 2009),
(2, 'BMW', 'X3', 35000, 2010),
(3, 'Ford', 'Falcon', 39000, 2013),
(4, 'Toyota', 'Corolla', 20000, 2012),
(5, 'Holden', 'Commodore', 13500, 2005),
(6, 'Holden', 'Astra', 8000, 2004),
(7, 'Holden', 'Commodore', 28000, 2009),
(8, 'Ford', 'Falcon', 14000, 2011),
(9, 'Ford', 'Falcon', 7000, 2003),
(10, 'Ford', 'Laser', 10000, 2010),
(11, 'Toyota', 'Corolla', 56565, 2024),
(12, 'BMW', 'X4', 99998, 2023),
(13, 'Ford', 'Fusion', 87090, 2015);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
