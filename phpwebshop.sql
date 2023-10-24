-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2023 at 07:05 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpwebshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id` int(11) NOT NULL,
  `Person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Id`, `Person_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `Name`) VALUES
(1, 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `PhoneNumber` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `IsAdmin` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Id`, `Name`, `PhoneNumber`, `Address`, `Email`, `Password`, `IsAdmin`) VALUES
(1, 'Gintoki', '198560935', 'logue town, edo 1000', 'Silversoul@edo.com', 'Shinpachi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Tag_id` int(11) NOT NULL,
  `Price` float NOT NULL,
  `ImagePath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Name`, `Description`, `Tag_id`, `Price`, `ImagePath`) VALUES
(1, 'MSI GF63', 'NVIDIA GeForce GTX 1650 Graphics, 15.6\" 8GB 256GB Intel Core i5-10300H X4 2.5GHz Win10, Black', 1, 100, 'MSI_1_Laptop'),
(2, 'MSI G2712', 'MSI G2712, 27\" Gaming Monitor, 1920 x 1080 (FHD), IPS, 1ms, 170Hz, FreeSync Premium, HDMI, Displayport, Tilt,Black', 2, 139, 'MSI_1_Monitor');

-- --------------------------------------------------------

--
-- Table structure for table `productcart`
--

CREATE TABLE `productcart` (
  `Product_id` int(11) NOT NULL,
  `Cart_id` int(11) NOT NULL,
  `Amount` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productcart`
--

INSERT INTO `productcart` (`Product_id`, `Cart_id`, `Amount`) VALUES
(1, 1, 13),
(2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productreceipt`
--

CREATE TABLE `productreceipt` (
  `Product_id` int(11) NOT NULL,
  `Receipt_id` int(11) NOT NULL,
  `Amount` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `Id` int(11) NOT NULL,
  `Person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`Id`, `Name`, `Category_id`) VALUES
(1, 'Laptop', 1),
(2, 'Monitor', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Person_id` (`Person_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Tag_id` (`Tag_id`);

--
-- Indexes for table `productcart`
--
ALTER TABLE `productcart`
  ADD PRIMARY KEY (`Product_id`,`Cart_id`),
  ADD KEY `Cart_id` (`Cart_id`);

--
-- Indexes for table `productreceipt`
--
ALTER TABLE `productreceipt`
  ADD PRIMARY KEY (`Product_id`,`Receipt_id`),
  ADD KEY `Receipt_id` (`Receipt_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Person_id` (`Person_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Category_id` (`Category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`Person_id`) REFERENCES `person` (`Id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Tag_id`) REFERENCES `tag` (`Id`);

--
-- Constraints for table `productcart`
--
ALTER TABLE `productcart`
  ADD CONSTRAINT `productcart_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`),
  ADD CONSTRAINT `productcart_ibfk_2` FOREIGN KEY (`Cart_id`) REFERENCES `cart` (`Id`);

--
-- Constraints for table `productreceipt`
--
ALTER TABLE `productreceipt`
  ADD CONSTRAINT `productreceipt_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`),
  ADD CONSTRAINT `productreceipt_ibfk_2` FOREIGN KEY (`Receipt_id`) REFERENCES `receipt` (`Id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`Person_id`) REFERENCES `person` (`Id`);

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `category` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
