-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 05:30 AM
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
-- Database: `olms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogindetails`
--

CREATE TABLE `adminlogindetails` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aadharid` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogindetails`
--

INSERT INTO `adminlogindetails` (`id`, `username`, `password`, `aadharid`) VALUES
(1, 'admin@gmail.com', 'admin@123', 586232932760),
(2, 'admin2@gmail.com', 'admin2@123', 123456789123);

-- --------------------------------------------------------

--
-- Table structure for table `bookapply`
--

CREATE TABLE `bookapply` (
  `id` int(255) NOT NULL,
  `studentid` varchar(2000) NOT NULL,
  `studentname` varchar(2000) NOT NULL,
  `aadharid` bigint(255) NOT NULL,
  `studentphno` bigint(255) NOT NULL,
  `selectthebook` varchar(2000) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookapply`
--

INSERT INTO `bookapply` (`id`, `studentid`, `studentname`, `aadharid`, `studentphno`, `selectthebook`, `status`) VALUES
(1, 's170220', 'Ganesh Guntuku', 586232932760, 9182994733, 'C Programming', 'yes'),
(2, 's170268', 'jalluri prudhvi raj', 573893729846, 9398784277, 'Java Programming', ''),
(3, 's170219', 'Nimmana Naveen Kumar', 837296745927, 9494032909, 'C Programming', '');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(255) NOT NULL,
  `books` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `books`) VALUES
(1, 'Python Programming'),
(2, 'Data structures and Algorithms'),
(3, 'Computer Networks'),
(4, 'Operating Systems'),
(5, 'C Programming'),
(6, 'Java Programming'),
(7, 'R programming'),
(8, 'Cryptography and Network Security'),
(9, 'Rich dad Poor dad'),
(10, 'The Secret'),
(11, 'How to win friends and influence people'),
(12, '5 am club'),
(13, 'C Programming'),
(14, 'Data structures and Algorithms'),
(15, 'The Secret');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `aadhar_id` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`id`, `username`, `password`, `aadhar_id`) VALUES
(6, 's170320@rguktsklm.ac.in', 'srinu', 123456789012),
(3, 's170264@rguktsklm.ac.in', 'jagan@123', 263874227482),
(2, 's170268@rguktsklm.ac.in', 'prudhvi@123', 573893729846),
(1, 's170220@rguktsklm.ac.in', 'ganesh@123', 586232932760),
(4, 's170205@rguktsklm.ac.in', 'gani@123', 738664839873),
(5, 's170219@rguktsklm.ac.in', 'naveen@123', 837296745927);

-- --------------------------------------------------------

--
-- Table structure for table `profiledata`
--

CREATE TABLE `profiledata` (
  `id` int(255) NOT NULL,
  `studentid` varchar(255) NOT NULL,
  `aadharid` bigint(255) NOT NULL,
  `studentname` varchar(2000) NOT NULL,
  `studentphno` bigint(255) NOT NULL,
  `year` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `userimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiledata`
--

INSERT INTO `profiledata` (`id`, `studentid`, `aadharid`, `studentname`, `studentphno`, `year`, `gender`, `branch`, `userimage`) VALUES
(6, 's170320', 123456789012, 'durga srinivas', 7288937729, 'e4', 'MALE', 'CSE', ''),
(3, 's170264', 263874227482, 'tumula jagan', 8373927382, 'e4', 'MALE', 'CSE', ''),
(2, 's170268', 573893729846, 'jalluri prudhvi raj', 9398784277, 'e4', 'MALE', 'ECE', ''),
(1, 's170220', 586232932760, 'Ganesh Guntuku', 9182994733, 'e4', 'MALE', 'CSE', ''),
(4, 's170205', 738664839873, 'Beena Ganesh', 9010181925, 'e4', 'MALE', 'MECH', ''),
(5, 's170219', 837296745927, 'Nimmana Naveen Kumar', 9494032909, 'e4', 'MALE', 'ECE', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogindetails`
--
ALTER TABLE `adminlogindetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookapply`
--
ALTER TABLE `bookapply`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`aadhar_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `profiledata`
--
ALTER TABLE `profiledata`
  ADD PRIMARY KEY (`aadharid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogindetails`
--
ALTER TABLE `adminlogindetails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookapply`
--
ALTER TABLE `bookapply`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `logindetails`
--
ALTER TABLE `logindetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profiledata`
--
ALTER TABLE `profiledata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
