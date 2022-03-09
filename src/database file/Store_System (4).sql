-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Mar 09, 2022 at 04:39 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Store_System`
--

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `orderId` int NOT NULL,
  `userId` int NOT NULL,
  `productId` int NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `shipping_address` varchar(200) DEFAULT NULL,
  `shipping_pincode` int DEFAULT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `delivery_date` datetime DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total_amount` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`orderId`, `userId`, `productId`, `status`, `shipping_address`, `shipping_pincode`, `order_date`, `delivery_date`, `quantity`, `total_amount`) VALUES
(3026, 1, 2011, 'Approved', 'asdsa', 110111, '2022-03-08 12:13:12', NULL, 1, 14000);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `productId` int NOT NULL,
  `productName` varchar(30) NOT NULL,
  `productImage` varchar(100) DEFAULT NULL,
  `productCategory` varchar(50) NOT NULL,
  `productSalePrice` int NOT NULL,
  `productCostPrice` int NOT NULL,
  `productSku` varchar(20) DEFAULT NULL,
  `product_added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`productId`, `productName`, `productImage`, `productCategory`, `productSalePrice`, `productCostPrice`, `productSku`, `product_added_date`) VALUES
(2011, 'Samsung', 'product-1.jpg', 'Mobile', 14000, 15000, NULL, '2022-03-07 07:07:33'),
(2012, 'Nokia 7700', 'product-2.jpg', 'Mobile', 23000, 25000, NULL, '2022-03-07 07:07:33'),
(2013, 'LG 523x', 'product-3.jpg', 'Mobile', 10000, 12000, NULL, '2022-03-07 07:07:33'),
(2014, 'Sony Xperia 80px2', 'product-4.jpg', 'Mobile', 25000, 30000, NULL, '2022-03-07 07:07:33'),
(2015, 'Apple Iphone 6s', 'product-5.jpg', 'Mobile', 28000, 35000, NULL, '2022-03-07 07:07:33'),
(2017, 'Mobile', 'logo.png', 'Sakeeb', 50, 51, NULL, '2022-03-07 07:07:33'),
(2018, 'Mobile', 'logo.png', 'Sakeeb', 50, 51, NULL, '2022-03-07 07:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userId` int NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'Customer',
  `status` varchar(20) NOT NULL DEFAULT 'Restricted',
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pincode` int DEFAULT NULL,
  `state` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userId`, `username`, `firstName`, `lastName`, `email`, `password`, `role`, `status`, `address`, `pincode`, `state`, `country`) VALUES
(2, 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', 'Approved', 'Not Updated', 0, NULL, NULL),
(5, 'hello', 'hello', 'World', 'hello@gmail.com', 'hello@123', 'Customer', 'Approved', 'Not Updated', 110001, NULL, NULL),
(9, 'admin@gmail.com', 'Vikas', 'Rathore', 'hello@gmil.com', '123', 'Customer', 'Approved', 'Not Updated', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `orderId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3027;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `productId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
