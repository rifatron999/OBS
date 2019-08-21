-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 01:08 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obslaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_book`
--

CREATE TABLE `t_book` (
  `b_id` int(20) NOT NULL,
  `b_name` varchar(300) NOT NULL,
  `b_category` varchar(300) NOT NULL,
  `b_price` varchar(300) NOT NULL,
  `b_author` varchar(300) NOT NULL,
  `b_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_book`
--

INSERT INTO `t_book` (`b_id`, `b_name`, `b_category`, `b_price`, `b_author`, `b_description`) VALUES
(1, 'book1', 'Novel', '300', 'author1', 'book 1 is best seller '),
(2, 'book2', 'Sci-Fi', '250', 'author2', 'book 2 is best seller '),
(3, 'book3', 'Novel', '350', 'author3', 'book3 is good for students'),
(4, 'book4', 'Literature', '550', 'author4', 'book4 is good for students');

-- --------------------------------------------------------

--
-- Table structure for table `t_cart`
--

CREATE TABLE `t_cart` (
  `ca_id` int(20) NOT NULL,
  `b_name` varchar(300) NOT NULL,
  `b_price` varchar(100) NOT NULL,
  `u_name` varchar(300) NOT NULL,
  `ca_status` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_cart`
--

INSERT INTO `t_cart` (`ca_id`, `b_name`, `b_price`, `u_name`, `ca_status`) VALUES
(1, 'book1', '300', 'kazi tanveer', 0),
(3, 'book3', '350', 'kazi tanveer', 0),
(4, 'book4', '550', 'joy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_category`
--

CREATE TABLE `t_category` (
  `c_id` int(20) NOT NULL,
  `c_category` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_category`
--

INSERT INTO `t_category` (`c_id`, `c_category`) VALUES
(1, 'Novel'),
(2, 'Literature'),
(3, 'Sci-Fi');

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `u_id` int(50) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `u_dob` varchar(50) DEFAULT NULL,
  `u_gender` varchar(100) DEFAULT NULL,
  `u_email` varchar(150) DEFAULT NULL,
  `u_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`u_id`, `u_name`, `u_password`, `u_dob`, `u_gender`, `u_email`, `u_type`) VALUES
(9, 'kazi tanveer', '123', '2019-08-21', 'male', 'tanveer@gmail.com', 'customer'),
(10, 'kawsarul alam', '1234', '2019-08-21', 'male', 'kawsar@gmail.com', 'admin'),
(11, 'rifatron', '123', '2019-08-21', 'male', 'rifat@gmail.com', 'admin'),
(13, 'joy', '123', '2019-08-21', 'male', 'joy@gmail.com', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_book`
--
ALTER TABLE `t_book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_book`
--
ALTER TABLE `t_book`
  MODIFY `b_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_cart`
--
ALTER TABLE `t_cart`
  MODIFY `ca_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `c_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `u_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
