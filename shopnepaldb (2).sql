-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 04, 2018 at 06:58 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopnepaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(45) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `created_by`) VALUES
(1, 'shankar', '63a9f0ea7bb98050796b649e85481845', 'super user'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'shankar');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `member_id`, `product_id`, `product_quantity`) VALUES
(1, 4, 55, 1),
(1, 4, 64, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Laptop`
--

CREATE TABLE `Laptop` (
  `model` varchar(50) NOT NULL,
  `cpu` varchar(45) DEFAULT NULL,
  `harddisk` varchar(45) DEFAULT NULL,
  `ram` varchar(45) DEFAULT NULL,
  `os` varchar(45) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Laptop`
--

INSERT INTO `Laptop` (`model`, `cpu`, `harddisk`, `ram`, `os`, `product_id`) VALUES
('', '1.8Ghz', '500HDD', '2GB', '', 55);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `dob` varchar(45) DEFAULT NULL,
  `credit` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `cart_cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `email`, `phone`, `address`, `gender`, `dob`, `credit`, `password`, `cart_cart_id`) VALUES
(4, 'shankar', 'coder.shankar@gmail.com', '+9779843783799', 'Lalitpur ', 'male', '1993-05-02', '1234567890098766', '63a9f0ea7bb98050796b649e85481845', 1),
(5, 'shankar ghimire', 'shankarghimire8766@gmail.com', '+9779843783799', 'Dhapakhel', 'male', '1997-05-02', '3333333333338766', '63a9f0ea7bb98050796b649e85481845', 1),
(6, 'mukesh ', 'mukeshghimire500@gmail.com', '+9779860315108', 'nakhipot', 'male', '1999-03-19', '1234567890098766', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `model` varchar(45) NOT NULL,
  `screen` varchar(45) DEFAULT NULL,
  `os` varchar(45) DEFAULT NULL,
  `camera` varchar(45) DEFAULT NULL,
  `sensor` varchar(45) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`model`, `screen`, `os`, `camera`, `sensor`, `product_id`) VALUES
('galaxy s7', '5.1 inch', 'android  naugaut', '13 mega pixel back with auto focus 5mp  front', 'proximity gravity pressure', 64),
('galaxy s7', '5.1 inch', 'android  naugaut', '13 mega pixel back with auto focus 5mp  front', 'proximity gravity pressure', 65),
('galaxy s7', '5.1 inch', 'android  naugaut', '13 mega pixel back with auto focus 5mp  front', 'proximity gravity pressure', 66);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `product_price` varchar(45) DEFAULT NULL,
  `product_detail` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `last_modified` varchar(255) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_price`, `product_detail`, `image`, `last_modified`, `admin_id`, `product_quantity`, `product_type`) VALUES
(55, 'Dell Inspiron 3421', '40000', '', 'dell.jpg', '2018-03-04 04:52:06', 1, 58, 'laptop'),
(64, 'Samsung s7', '80000', '', 'phone photo.jpeg', '2018-03-04 05:02:36', 1, 36, 'phone'),
(65, 'Samsung s7', '80000', '', 'phone photo.jpeg', '2018-03-04 05:17:03', 1, 40, 'phone'),
(66, 'Samsung s7', '80000', '<p><em><strong>samsung </strong></em>is top selling brand</p>\r\n', 'phone photo.jpeg', '2018-03-04 05:24:42', 1, 39, 'phone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`,`member_id`,`product_id`);

--
-- Indexes for table `Laptop`
--
ALTER TABLE `Laptop`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`,`cart_cart_id`),
  ADD KEY `fk_member_cart1_idx` (`cart_cart_id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_admin1_idx` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Laptop`
--
ALTER TABLE `Laptop`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `fkproduct_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
