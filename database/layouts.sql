-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 02:42 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layouts`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminb`
--

CREATE TABLE `adminb` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminb`
--

INSERT INTO `adminb` (`id`, `username`, `password`, `otp`, `date`) VALUES
(1, 'admin', '123', '1640', '2020-06-05 08:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `mailall`
--

CREATE TABLE `mailall` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `msg` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `ip` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`id`, `email`, `ip`, `date`) VALUES
(1, 'sralli73@gmail.com', '203.81.241.66', '2020-06-02 08:11:08'),
(2, 'sralli@gmail.com', '1', '2020-06-02 09:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `themeall`
--

CREATE TABLE `themeall` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `theme_url` text NOT NULL,
  `liveurl` text NOT NULL,
  `theme_image` text NOT NULL,
  `theme_file` text NOT NULL,
  `theme_cat` int(100) NOT NULL,
  `text2` text NOT NULL,
  `date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themeall`
--

INSERT INTO `themeall` (`id`, `title`, `theme_url`, `liveurl`, `theme_image`, `theme_file`, `theme_cat`, `text2`, `date`) VALUES
(4, 'Interior and Furniture Website Template', 'Interior-and-Furniture-Website-Template', 'https://shubham110019.github.io/layouts.github.io/', 'https://raw.githubusercontent.com/shubham110019/layouts.github.io/master/img/inside.jpg', 'http://github.com//shubham110019/layouts.github.io/archive/master.zip', 1, '						  <b>TEMPLATE INFORMATION:</b>\r\n						  <br><br>\r\n\r\n<p><b>Template Name :</b> Inclusive a Corporate Category Bootstrap Responsive Web Template.</p>\r\n\r\n<p><b>License :</b> Life Time Free License Under Creative Commons Attribution 3.0 Unported. Unlimited Use, you can help & support us (W3Layouts, a Non-Profit) by donations or you should keep link to our website.\r\n</p>\r\n\r\n<p>\r\n<b>Compatible Browsers :</b> Google Chrome, Firefox, Safari, IE 10, Opera etc.\r\n</p>\r\n<p>\r\n<b>Source Files included :</b> HTML files (.html), Style Sheets (.css), Images (.jpg/.png/.gif),\r\n</p>\r\n\r\n\r\n<p><b>High Resolution :</b> Yes.</p>\r\n\r\n<p><b>Features:</b>\r\n\r\n Bootstrap Framework,\r\n\r\nHTML5 & CSS3,\r\n\r\n100% Responsive,\r\n\r\nIcons based on Font Awesome,\r\n\r\nGoogle Fonts used,\r\n\r\nSimple & Easy to Use/Customize,\r\n\r\nClean and Professional design,\r\n\r\nAnd much moreâ€¦\r\n</p>\r\n\r\n<p><b>Images :</b> Pexels</p>\r\n\r\n						  ', '02 / 06 / 2020'),
(5, 'shubham', 'shubham', 'shubham', 'https://raw.githubusercontent.com/shubham110019/layouts.github.io/master/img/inside.jpg', 'http://github.com//shubham110019/layouts.github.io/archive/master.zip', 2, '						  <b>TEMPLATE INFORMATION:</b>\r\n						  <br><br>\r\n\r\n<p><b>Template Name :</b> Inclusive a Corporate Category Bootstrap Responsive Web Template.</p>\r\n\r\n<p><b>License :</b> Life Time Free License Under Creative Commons Attribution 3.0 Unported. Unlimited Use, you can help & support us (W3Layouts, a Non-Profit) by donations or you should keep link to our website.\r\n</p>\r\n\r\n<p>\r\n<b>Compatible Browsers :</b> Google Chrome, Firefox, Safari, IE 10, Opera etc.\r\n</p>\r\n<p>\r\n<b>Source Files included :</b> HTML files (.html), Style Sheets (.css), Images (.jpg/.png/.gif),\r\n</p>\r\n\r\n\r\n<p><b>High Resolution :</b> Yes.</p>\r\n\r\n<p><b>Features:</b>\r\n\r\n Bootstrap Framework,\r\n\r\nHTML5 & CSS3,\r\n\r\n100% Responsive,\r\n\r\nIcons based on Font Awesome,\r\n\r\nGoogle Fonts used,\r\n\r\nSimple & Easy to Use/Customize,\r\n\r\nClean and Professional design,\r\n\r\nAnd much moreâ€¦\r\n</p>\r\n\r\n<p><b>Images :</b> Pexels</p>\r\n\r\n						  ', '05 / 06 / 2020');

-- --------------------------------------------------------

--
-- Table structure for table `themecat`
--

CREATE TABLE `themecat` (
  `id` int(11) NOT NULL,
  `catname` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themecat`
--

INSERT INTO `themecat` (`id`, `catname`, `date`) VALUES
(1, 'login', '2020-06-05 09:51:07'),
(2, '404 Error Page', '2020-06-05 09:51:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminb`
--
ALTER TABLE `adminb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailall`
--
ALTER TABLE `mailall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themeall`
--
ALTER TABLE `themeall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themecat`
--
ALTER TABLE `themecat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminb`
--
ALTER TABLE `adminb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mailall`
--
ALTER TABLE `mailall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub`
--
ALTER TABLE `sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `themeall`
--
ALTER TABLE `themeall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `themecat`
--
ALTER TABLE `themecat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
