-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2021 at 11:59 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mytube`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(255) NOT NULL,
  `ad_cont` bigint(15) NOT NULL,
  `ad_email` varchar(255) NOT NULL,
  `ad_pass` text NOT NULL,
  `ad_flag` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_cont`, `ad_email`, `ad_pass`, `ad_flag`) VALUES
(1, 'admin', 9823040456, 'admin@gmail.com', '$2y$10$hGH4hmvZFiNMm7ZhtjMtqeRrXs7Qs4ApxStWasmwFBskuup.FDQLu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `m_id` int(11) NOT NULL,
  `m_head` varchar(500) NOT NULL,
  `m_desc` text NOT NULL,
  `m_prv` varchar(100) NOT NULL,
  `m_link` varchar(500) NOT NULL,
  `m_time` varchar(200) NOT NULL,
  `l_time` varchar(200) NOT NULL,
  `m_author` varchar(500) NOT NULL,
  `m_views` bigint(15) NOT NULL,
  `m_flag` int(10) NOT NULL,
  `ad_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`m_id`, `m_head`, `m_desc`, `m_prv`, `m_link`, `m_time`, `l_time`, `m_author`, `m_views`, `m_flag`, `ad_id`, `cat_id`) VALUES
(1, 'Python tutorial', 'Description test', '../thumbvideos/270_1612100611_1.jpg', '../videos/1612100611_1.mp4', '1612100611', '1612031400', 'rk', 0, 1, 1, 1),
(2, 'Republic Day', 'Republic Day Celebration at DRM', '../thumbvideos/270_1612774256_1.jpg', '../videos/1612774256_1.mp4', '1612774266', '1612722600', 'Vishal Domal', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_cat`
--

CREATE TABLE `m_cat` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_flag` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_cat`
--

INSERT INTO `m_cat` (`cat_id`, `cat_name`, `cat_flag`) VALUES
(1, 'news', 1),
(2, 'your life', 1),
(3, 'unboxing  cool', 1),
(4, 'Cooking', 1),
(5, 'education', 1),
(6, 'technology tutorials', 1),
(7, 'english', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `r_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `m_id` int(10) NOT NULL,
  `rdate` varchar(100) NOT NULL,
  `rflag` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`r_id`, `u_id`, `m_id`, `rdate`, `rflag`) VALUES
(7, 1, 1, '1592425471', 1),
(10, 1, 2, '1600366184', 1),
(11, 3, 2, '1612774455', 1),
(12, 4, 2, '1612774488', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shareto`
--

CREATE TABLE `shareto` (
  `st_id` int(10) NOT NULL,
  `m_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `to_id` bigint(15) NOT NULL,
  `st_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shareto`
--

INSERT INTO `shareto` (`st_id`, `m_id`, `u_id`, `to_id`, `st_date`) VALUES
(1, 1, 1, 9823070456, '1612090558'),
(2, 2, 4, 9326822923, '1612774370');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_cont` bigint(15) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_pass` text NOT NULL,
  `u_flag` int(5) NOT NULL,
  `ad_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_cont`, `u_email`, `u_pass`, `u_flag`, `ad_id`) VALUES
(1, 'Advait katare', 8007026979, 'ark@g.c', '$2y$10$UttwdrIwKtvW6ozWX4gt1.3wMpHk3M5OnLd8r07pQb4Fb3nomOoYO', 1, 1),
(2, 'Dattatraya Katare', 9823070456, 'd@g.c', '$2y$10$56L3/luJMwCeXc/BEurw/uQt10IZDZq5frYFMPqb0HofwXMjoKdVm', 1, 1),
(3, 'Arvind', 9326822923, 'arvind@gmail.com', '$2y$10$XdZu5KVdpTGt3yhDBTSge.42Z.849WuhF4L.9u0JCfm/Tuolgtdxq', 1, 1),
(4, 'Pratibha', 7057788910, 'domalpratibha2138@gmail.com', '$2y$10$MNb8TnX00mHCpPF/BQGUW.bJO9AAcvMm.DxRd8ue6rhUGaTe4Nce2', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visiters`
--

CREATE TABLE `visiters` (
  `vid` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `m_id` int(10) NOT NULL,
  `vdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visiters`
--

INSERT INTO `visiters` (`vid`, `u_id`, `m_id`, `vdate`) VALUES
(1, 1, 1, '1592418336'),
(2, 1, 2, '1592418355'),
(3, 2, 1, '1600367823'),
(4, 2, 2, '1600368250'),
(5, 3, 1, '1612196249'),
(6, 4, 1, '1612419686'),
(7, 4, 2, '1612774329'),
(8, 3, 2, '1612774426');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `m_cat`
--
ALTER TABLE `m_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `shareto`
--
ALTER TABLE `shareto`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `visiters`
--
ALTER TABLE `visiters`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_cat`
--
ALTER TABLE `m_cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shareto`
--
ALTER TABLE `shareto`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visiters`
--
ALTER TABLE `visiters`
  MODIFY `vid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
