-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 10:58 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobilestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `name_model` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name_model`) VALUES
(1, 'Alcatel'),
(2, 'Apple'),
(3, 'HTC'),
(4, 'Huawei'),
(5, 'Lg'),
(6, 'Microsoft'),
(7, 'Nokia'),
(8, 'Samsung'),
(9, 'Sony'),
(10, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `products` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `adress`, `products`) VALUES
(1, 'Sally', 'Seljasnica BB', '{"3":"2"}'),
(2, 'parker', 'orovac', '{"6":"1"}'),
(3, 'Carl', 'Osoje', '{"13":"3"}'),
(10, 'tim', 'Blagoja Parovica 24a', '{"13":"1"}'),
(12, 'peter', 'Seljasnica BB', '{"24":"2"}'),
(14, 'Sandra', 'Nade dimic', '{"5":"2"}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name_brand` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_model` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `models_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_brand`, `name_model`, `image`, `price`, `availability`, `models_id`) VALUES
(1, 'Samsung', 'Galaxy S6', 'smg6.jpg', '320.00', 1, 8),
(12, 'Apple', 'Iphone 7', 'iphone7.jpg', '500.00', 1, 2),
(2, 'Alcatel', '1042D', 'alc1042d.jpg', '20.00', 1, 1),
(3, 'Apple', 'Iphone 6s Plus', 'apple6splus.jpg', '470.00', 1, 2),
(4, 'Huawei', 'P10 Plus', 'huaweip10.jpg', '415.00', 1, 4),
(5, 'Huawei', 'Honor 10', 'honor10.jpg', '410.00', 1, 4),
(6, 'Lg', 'G7', 'lgg7.jpg', '685.00', 1, 5),
(7, 'Microsoft', 'Lumia 650LTE', 'microsoftlumia.jpg', '160.00', 1, 6),
(8, 'Nokia', '7 Plus', 'nokia7.jpg', '359.00', 1, 7),
(9, 'Sony', 'Xperia X', 'xperiax.jpg', '300.00', 1, 9),
(10, 'Xiaomi', 'Redmi 4X note', 'xiaomiredmi.jpg', '149.00', 1, 10),
(13, 'HTC', 'One x9', 'htcone.jpg', '250.00', 1, 3),
(14, 'Huawei', 'Mate 10Lite', 'huaweimate.jpg', '255.00', 1, 4),
(18, 'Xiaomi', 'Redmi 5A note', 'xiaomiredmi5a.jpg', '139.00', 1, 10),
(17, 'Lg', 'G6', 'lgg6.jpg', '335.00', 1, 5),
(19, 'Alcatel', '1010D', 'alcatel1010d.jpg', '21.00', 1, 1),
(20, 'Samsung', 'Galaxy A8', 'samsunga8.jpg', '335.00', 1, 8),
(21, 'Samsung', 'Galaxy S9', 'galaxys9.jpg', '699.00', 1, 8),
(22, 'Huawei', 'P20 LITE', 'huawei.jpg', '280.00', 1, 4),
(23, 'Apple', 'Iphone 8', 'iphone8.jpg', '860.00', 1, 2),
(24, 'Apple', 'Iphone X', 'iphonex.jpg', '910.00', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `related_products`
--

CREATE TABLE `related_products` (
  `id` int(11) NOT NULL,
  `name_brand` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_model` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `related_products`
--

INSERT INTO `related_products` (`id`, `name_brand`, `name_model`, `image`, `price`) VALUES
(22, 'Huawei', 'P20 LITE', 'huaweip20lite.jpg', '280.00'),
(21, 'Samsung', 'Galaxy S9', 'galaxys9.jpg', '669.00'),
(23, 'Apple', 'Iphone X', 'iphonex.jpg', '910.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '123', 3),
(2, 'tom', '456', 1),
(3, 'sally', '789', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_products`
--
ALTER TABLE `related_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `related_products`
--
ALTER TABLE `related_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

