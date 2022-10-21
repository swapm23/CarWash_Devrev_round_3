-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 09:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `sno` int(11) NOT NULL,
  `booking_name` text NOT NULL,
  `date` date NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`sno`, `booking_name`, `date`, `location`) VALUES
(18, 'Swapnil Mishra', '2022-10-21', 'Chennai'),
(19, 'Abhinav Pathak', '2022-10-21', 'Chennai');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user` varchar(23) NOT NULL,
  `sno` int(11) NOT NULL,
  `fname` varchar(23) NOT NULL,
  `lname` varchar(23) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user`, `sno`, `fname`, `lname`, `email`, `phone`) VALUES
('admin', 1, 'Swapnil', 'Mishra', 'swapnilmishra@xyz.com', '1212121212'),
('rage2366', 12, 'Prakhar', 'Patel', 'adfsad@afasf.com', '123124'),
('Abhinav', 13, 'Abhinav', 'Pathak', 'xyasd@jkaf.com', '214214'),
('xyz', 14, 'abc', 'cba', 'a@b.com', '12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `username` varchar(23) NOT NULL,
  `password` varchar(23) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `password`, `dt`) VALUES
(1, 'admin', 'admin', '2021-10-06 14:03:57'),
(2, 'rage', 'nicktv', '2021-10-07 17:18:24'),
(3, 'ninja', 'reeve', '2021-10-07 17:18:43'),
(4, 's4u', 'halwai', '2021-10-08 18:35:16'),
(5, 'rishj', 'rish', '2021-10-16 08:30:31'),
(6, 'flexgod', 'umair', '2021-10-19 18:55:19'),
(7, 'mota', 'mota', '2021-10-19 18:56:20'),
(8, 'barik', 'chin', '2021-10-20 20:20:34'),
(9, 'jimsaken', 'valo', '2021-10-21 18:34:54'),
(10, 'uttu', 'uttu', '2021-10-26 13:44:02'),
(52, 'abcd', 'abcd', '2021-11-09 07:50:27'),
(53, 'rage2366', '123', '2022-10-21 12:19:32'),
(54, 'Abhinav', '1234', '2022-10-21 12:25:21'),
(55, 'xyz', 'xyz', '2022-10-21 12:39:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
