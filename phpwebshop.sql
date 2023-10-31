-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2023 at 01:57 PM
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
(1, 1),
(2, 45),
(3, 48),
(4, 49);

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
(1, 'Electronics'),
(2, 'Furniture'),
(3, 'Video games'),
(4, 'Clothes');

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
  `IsAdmin` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Id`, `Name`, `PhoneNumber`, `Address`, `Email`, `Password`, `IsAdmin`) VALUES
(1, 'Gintoki', '198560935', 'logue town, edo 1000', 'Silversoul@edo.com', 'Shinpachi', b'1'),
(45, 'Kagura', '29854678', 'Franky town', 'Umbrella@edo.com', 'Umibozu', b'0'),
(48, 'Shinpachi', '90875634', 'Dojo 3', 'Glasses@edo.com', '!Glasses9', b'0'),
(49, 'dsfd', '12345678', 'werwerwer', 'sfds@ewr.fg', '!2dfgtwqac', b'0');

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
(2, 'MSI Katana 17', '13th gen Intel Core 17 4060', 1, 1374, 'Laptop_2'),
(4, 'MSI G2712', 'Gaming Monitor, 1920 X 1080 170 Hz', 2, 159, 'Monitor'),
(5, 'Baldurs Gate 3', 'Dungeon and dragons, turn based, larian studios', 11, 60, 'BaldursGate3'),
(6, 'Counter Strike 2', 'Free upgrade to CS:GO', 10, 60, 'CounterStrike2'),
(7, 'SteelSeries Apex 3', 'RGB Gaming Keyboard, Premium Mangetic Wrist Rest', 4, 49, 'Keyboard'),
(8, 'Reddragon M612', 'RGB Gaming Mouse, 8000 DPI Wired', 3, 24, 'Mouse'),
(9, 'Flexispot Standing Desk', 'Height Adjustable, 48 x 24 inch', 8, 209, 'Table'),
(10, 'OTK Bolt Hoodie', 'Black, Small, Cotton poly soft mix', 5, 66, 'Hoodie_2'),
(11, 'RAZER', 'Gaming chair, racing chair', 7, 81, 'Chair_2'),
(12, 'MSI Vigor GK30', 'RGB Gaming Keyboard, Mechanical black', 4, 38, 'Keyboard_2'),
(14, 'OTK Winter Hoodie', 'Large, Cozy ,Cotton poly soft mix', 5, 70, 'Hoodie_3'),
(15, 'Logitech G PRO', 'Mechanical Gaming Keyboard, Ultra Portable, black, Micro USB', 4, 88, 'Keyboard_3'),
(16, 'Dungeon Table', 'Darkest of dungeons table', 8, 66, 'Table_2'),
(17, 'Dungeon Gaming Chair', 'The chair from the lair', 7, 50, 'Chair'),
(18, 'Same Shirt', 'Wool', 6, 10, 'T-shirt'),
(19, 'MSI G31', 'Halloween Gaming mouse', 3, 25, 'Mouse_3'),
(20, 'Razer Basilisk V3', 'Customizable Ergonomic Gaming Mouse: Fastest Gaming Mouse Switch, RGB', 3, 48, 'Mouse_2'),
(21, 'World Of Warcraft', 'Wow Classic', 12, 60, 'Wow_2'),
(22, 'World Of Warcraft', 'Retail Wow', 12, 100, 'Wow'),
(23, 'Xbox controller', '360', 13, 100, 'XboxController');

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
(2, 1, 2),
(2, 3, 5),
(4, 1, 10),
(10, 1, 1),
(11, 1, 1),
(14, 1, 1),
(20, 1, 1),
(21, 1, 1),
(22, 1, 1),
(23, 1, 7);

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
(2, 'Monitor', 1),
(3, 'Computer mouse', 1),
(4, 'Keyboard', 1),
(5, 'Hoodie', 4),
(6, 'T-shirt', 4),
(7, 'Chair', 2),
(8, 'Table', 2),
(10, 'FPS', 3),
(11, 'Turn based', 3),
(12, 'MMO', 3),
(13, 'Accessory', 1);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
