-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 02, 2019 at 05:47 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtr`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_review`
--

CREATE TABLE `app_review` (
  `app_review_id` int(10) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `feedback_title` varchar(200) NOT NULL,
  `feedback_content` text NOT NULL,
  `feedback_rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_reservation`
--

CREATE TABLE `menu_reservation` (
  `menubook_id` int(20) NOT NULL,
  `tablebook_id` int(20) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rest_id` int(20) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `rest_name` varchar(200) NOT NULL,
  `SSM` varchar(200) NOT NULL,
  `rest_address` text NOT NULL,
  `rest_email` varchar(200) NOT NULL,
  `rest_phone_no` varchar(20) NOT NULL,
  `operating_hours` varchar(200) NOT NULL,
  `rest_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rest_id`, `user_id`, `rest_name`, `SSM`, `rest_address`, `rest_email`, `rest_phone_no`, `operating_hours`, `rest_img`) VALUES
(1, 'concillia@gmail.com', 'Hard Rock Cafe', 'HR0713636', '28, Lorong Hang Jebat, 75200 Melaka', 'hardrockcafe.com.my', '06-292 5188', '123', 'abc'),
(2, 'concillia@gmail.com', 'Wild Coriander Melaka', 'WC0112334', '40, Jalan Kampung Pantai, 75200 Melaka', 'wildcoriandermelaka.com.my', '012-380 7211', '123', 'abc'),
(3, 'izyana@gmail.com', 'Salud Tapas', 'ST1213626', '94, Jalan Tun Tan Cheng Lock, 75300 Melaka', 'saludtapas.com.my', '016-722 0183', '123', 'abc'),
(4, 'izyana@gmail.com', 'Restoran Tong Sheng', 'RT2357621', 'No. 377 & 378, Taman Melaka Raya, 75000 Melaka', 'restoran tong shengstongsheng.com.my', '016-776 7811', '123', 'abc'),
(5, 'izyana@gmail.com', 'Geographer Cafe', 'GC4118264', '83, Jalan Hang Jebat, 75200 Melaka', 'geographercafe.com.my', '06-281 6813', '123', 'abc'),
(6, 'syahirahnabilah@gmail.com', 'The Daily Fix Cafe', 'DF9375817', '55, Jalan Hang Jebat, 75200 Melaka', 'thedailyfixcafe.com.my', '013-290 6855', '123', 'abc'),
(7, 'syahirahnabilah@gmail.com', 'Bert\'s Garden Seafood', 'GS9375924', '2078-C,, Jalan Kampung Pinang B, 76400 Tanjung Kling, Melaka', 'bertsgardenseafood.com.my', '06-315 2213', '123', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_menu`
--

CREATE TABLE `restaurant_menu` (
  `menu_id` int(20) NOT NULL,
  `rest_id` int(20) NOT NULL,
  `menu_name` varchar(200) NOT NULL,
  `menu_category` varchar(200) NOT NULL,
  `menu_price` varchar(10) NOT NULL,
  `menu_desc` text NOT NULL,
  `menu_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_table`
--

CREATE TABLE `restaurant_table` (
  `table_id` int(20) NOT NULL,
  `rest_id` int(20) NOT NULL,
  `table_no` int(10) NOT NULL,
  `table_status` varchar(200) NOT NULL,
  `table_pax` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rest_review`
--

CREATE TABLE `rest_review` (
  `rest_rev_id` int(10) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `rest_id` int(20) NOT NULL,
  `rest_rating` int(10) NOT NULL,
  `comment` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_reservation`
--

CREATE TABLE `table_reservation` (
  `tablebook_id` int(20) NOT NULL,
  `table_id` int(10) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `deposit` varchar(10) NOT NULL,
  `datetime` datetime NOT NULL,
  `checkout` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_level` varchar(20) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `last_login` datetime NOT NULL,
  `user_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_level`, `user_status`, `last_login`, `user_img`) VALUES
('aienatirah97@gmail.com', 'NUR AIN ATIRAH', '202cb962ac59075b964b07152d234b70', 'CUSTOMER', 'ACTIVE', '2019-11-02 19:16:55', '165615.jpeg'),
('concillia@gmail.com', 'CONCILLIA BELFA', '202cb962ac59075b964b07152d234b70', 'MANAGER', 'ACTIVE', '0000-00-00 00:00:00', ''),
('izyana@gmail.com', 'NUR IZYANA', '202cb962ac59075b964b07152d234b70', 'MANAGER', 'ACTIVE', '0000-00-00 00:00:00', ''),
('syahirahnabilah@gmail.com', 'NURSYAHIRAH NABILAH', '202cb962ac59075b964b07152d234b70', 'MANAGER', 'ACTIVE', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_review`
--
ALTER TABLE `app_review`
  ADD PRIMARY KEY (`app_review_id`);

--
-- Indexes for table `menu_reservation`
--
ALTER TABLE `menu_reservation`
  ADD PRIMARY KEY (`menubook_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rest_id`);

--
-- Indexes for table `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `restaurant_table`
--
ALTER TABLE `restaurant_table`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `rest_review`
--
ALTER TABLE `rest_review`
  ADD PRIMARY KEY (`rest_rev_id`);

--
-- Indexes for table `table_reservation`
--
ALTER TABLE `table_reservation`
  ADD PRIMARY KEY (`tablebook_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
