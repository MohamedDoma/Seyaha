-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 12:08 AM
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
-- Database: `seyaha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `users_type` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `users_type`) VALUES
(1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(2, 'mohamed', 'modoma2002@gmail.com', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cafe`
--

CREATE TABLE `cafe` (
  `cafe_id` int(255) NOT NULL,
  `cafe_name` varchar(255) NOT NULL,
  `cafe_name_ar` varchar(255) NOT NULL,
  `cafe_location` varchar(255) NOT NULL,
  `cafe_img` varchar(255) NOT NULL,
  `cafe_city_id` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafe`
--

INSERT INTO `cafe` (`cafe_id`, `cafe_name`, `cafe_name_ar`, `cafe_location`, `cafe_img`, `cafe_city_id`) VALUES
(1, 'HAVANNA JUICE IN HAY ELANDOLUS', 'عصائر هافانا في حي الأندلس', 'https://goo.gl/maps/BQbMLEzQamZ75ZWj8', 'Restaurant2.jpg', 9),
(2, 'srbrv', 'يبمرعلعلايمرقبdf', 'https://goo.gl/maps/BQbMLEzQamZ75ZWj8', 'standard-grocery-receipt-template.png', 9);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_name_ar` varchar(255) NOT NULL,
  `city_caption` varchar(255) NOT NULL,
  `city_caption_ar` varchar(255) NOT NULL,
  `city_img` varchar(255) NOT NULL,
  `city_cover` varchar(255) NOT NULL,
  `city_location` varchar(255) NOT NULL,
  `city_type` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `city_name_ar`, `city_caption`, `city_caption_ar`, `city_img`, `city_cover`, `city_location`, `city_type`) VALUES
(9, 'Ghadames', 'غدامس', 'Country', 'مدينة', 'Ghadames2.jpg', '65144.jpg', 'https://goo.gl/maps/KKsjyjGehuzVcJaz5', 1),
(10, 'Benghazi', 'بنغازي', 'bb', 'مدينة', 'Benghazi2.jpg', 'images.jpeg', 'https://goo.gl/maps/DdyJP3rEqVmPUeto9', 2),
(11, 'Tripoly', 'يللا', 'skdfu', 'سيتؤتتلانم', 'FullLogo.jpg', '', 'https://goo.gl/maps/DdyJP3rEqVmPUeto9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city_info`
--

CREATE TABLE `city_info` (
  `info_id` int(255) NOT NULL,
  `info_title` varchar(255) NOT NULL,
  `info_title_ar` varchar(255) NOT NULL,
  `info_description` varchar(255) NOT NULL,
  `info_description_ar` varchar(255) NOT NULL,
  `info_img` varchar(255) NOT NULL,
  `info_city_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_info`
--

INSERT INTO `city_info` (`info_id`, `info_title`, `info_title_ar`, `info_description`, `info_description_ar`, `info_img`, `info_city_id`) VALUES
(1, 'the old city', 'المدينة القديمة', 'It is located in Tripoli, the capital of Libya. It is considered the ancient centre of Tripoli, which overlooks the Mediterranean Sea. It is surrounded by a wall and contains a number of shops an', 'تقع في طرابلس عاصمة ليبيا. تعتبر المركز القديم لمدينة طرابلس المطلة على البحر الأبيض المتوسط. إنه محاط بسور ويحتوي على عدد من المحلات التجارية', '½⌐ƒ∩ƒ4.jpg', '9'),
(2, 'The red castle', 'السرايا الحمراء', 'It is considered one of the oldest and largest Libyan museums, and it is practically divided into four levels of “museums” that display the heritage and history of Libya through the periods that include the civilizations of the Libyan tribes, the Greeks, ', 'تقع في طرابلس عاصمة ليبيا. تعتبر المركز القديم لمدينة طرابلس المطلة على البحر الأبيض المتوسط. إنه محاط بسور ويحتوي على عدد من المحلات التجارية', 'Red Castle2.jpg', '9'),
(3, 'srtbh', 'يشقلاسلاdgb', '                    aerkvuubakhrvi                ', '                    شثقلاسثرشقثلاسقفلاسثقففلا                ', 'sdv.png', '9');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_email` varchar(255) NOT NULL,
  `employee_password` varchar(255) NOT NULL,
  `users_type` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_email`, `employee_password`, `users_type`) VALUES
(1, 'Employee', 'employee@gmail.com', '202cb962ac59075b964b07152d234b70', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(255) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_name_ar` varchar(255) NOT NULL,
  `hotel_location` varchar(255) NOT NULL,
  `hotel_img` varchar(255) NOT NULL,
  `hotel_city_id` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `hotel_name_ar`, `hotel_location`, `hotel_img`, `hotel_city_id`) VALUES
(1, 'AL WADDAN HOTEL', 'فندق الودان', 'https://goo.gl/maps/nYVmkr7DL5RJ2PxT9', 'Hotel1.jpg', 9),
(2, 'adteb', 'شيمقههرلبdgb', 'https://goo.gl/maps/nYVmkr7DL5RJ2PxT9', 'Ghadames2.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(255) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_title_ar` varchar(255) NOT NULL,
  `news_description` text NOT NULL,
  `news_description_ar` varchar(255) NOT NULL,
  `news_img` varchar(255) NOT NULL,
  `news_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_title_ar`, `news_description`, `news_description_ar`, `news_img`, `news_status`) VALUES
(4, 'News1', 'خبر1', 'A tourist guide to the distinctive and popular landmarks and cities in beloved Libya. A project submitted for a bachelor                ', 'دليل سياحي للمعالم والمدن المميزة والشعبية في ليبيا الحبيبة', 'Hotel1.jpg', 2),
(5, 'News2', 'خبر2', 'sdfv', 'دليل سياحي للمعالم والمدن المميزة والشعبية في ليبيا الحبيبة', 'Restaurant2.jpg', 1),
(6, 'News3', 'خبر3', 'sd', 'دليل سياحي للمعالم والمدن المميزة والشعبية في ليبيا الحبيبةشيسرسير', 'Ghadames2.jpg', 1),
(7, 'dtbtg', 'يفلاليبfdv', '                                        Dtbdbfdb                                                ', '                                        يقلاميىلايللاف                                ', 'england-1671977243350-1864.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(255) NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_type` tinyint(255) NOT NULL,
  `type_city` tinyint(255) NOT NULL,
  `language` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_email`, `users_password`, `users_type`, `type_city`, `language`) VALUES
(2, 'nn', 'nn@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 1),
(3, 'user', 'user@user.user', '202cb962ac59075b964b07152d234b70', 1, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`cafe_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `city_info`
--
ALTER TABLE `city_info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cafe`
--
ALTER TABLE `cafe`
  MODIFY `cafe_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `city_info`
--
ALTER TABLE `city_info`
  MODIFY `info_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
