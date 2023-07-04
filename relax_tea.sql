-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2023 at 02:36 PM
-- Server version: 5.6.38
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relax_tea`
--

-- --------------------------------------------------------

--
-- Table structure for table `accept_order`
--

CREATE TABLE `accept_order` (
  `order_id` int(11) NOT NULL,
  `customer_token` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `user_token` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_token`) VALUES
(27, '40', 'ghs__26tk95'),
(28, '41', 'ghs__26tk95');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `noti_id` int(11) NOT NULL,
  `notification` varchar(30) NOT NULL,
  `user_token` varchar(50) NOT NULL,
  `product_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`noti_id`, `notification`, `user_token`, `product_id`) VALUES
(21, 'New Order ', 'ghs__26tk95', '40');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `user_token` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `product_id`, `country`, `region`, `district`, `phone`, `user_token`) VALUES
(30, '40', 'United States (USA) ', 'Washington DC State', 'New York City', '0130000027', 'ghs__26tk95');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `product_price` varchar(500) NOT NULL,
  `product_description` text NOT NULL,
  `product_color` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_rate` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `delivery_type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_price`, `product_description`, `product_color`, `product_type`, `product_rate`, `payment_type`, `delivery_type`) VALUES
(43, 'New Sylheti Green Tea | Fresh Products', 'ghs__tea4.jpg', 'BDT - 470 TK', 'This product is uploaded for testing purposes.', 'Red Color Tea', 'Online Shopping Products', '', 'Online & Offline Delivery', 'Cash On Delivery'),
(41, 'National Tea Full Red Color', 'ghs__tea1.jpg', 'BDT - 350 TK', 'This product is new in the market and , it is fresh Products you can buy it . Just order now .', 'Green Color', 'Fresh Tea Leaf', '', 'Online Shopping', 'Cash On Delivery'),
(42, 'New Fresh Products Green Tea Leaf', 'ghs__tea2.jpg', 'BDT - 893 TK', 'This Is Demo Products Green Tea Leaf you can test it.', 'Red Green Tea', 'Fresh Products Green Tea', '', 'Online Shopping', 'Cash On Delivery'),
(40, 'Fresh Products Green Tea Leaf', 'ghs__tea3.jpg', 'BDT - 670 TK', 'Something else to eat and you can check my profile or GitHub', 'RED COLOR', 'Fresh Products', '', 'Cash On Delivery', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `avtar` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `phone`, `user_password`, `token`, `user_role`, `avtar`, `country`, `region`, `district`) VALUES
(10, 'Dlx Dipto Munda', 'dlxdipto@gmail.com', '0130000027', 'dc07fec61631c9fb863bdacdd25a1b32b372d4cf', 'ghs__5sga9t', 'Admin_ghs', 'ghs_dlx_dipto.jpg', 'United States (USA) ', 'Washington DC State', 'New York City'),
(9, 'Ghs Julian', 'ghsjulian@gmail.com', '0130000027', 'bf040c1339dfad8652f32092731d2763e0082450', 'ghs__26tk95', '', 'ghs_developer.jpg', 'United States (USA) ', 'Washington DC State', 'New York City');

-- --------------------------------------------------------

--
-- Table structure for table `user_noti`
--

CREATE TABLE `user_noti` (
  `noti_id` int(11) NOT NULL,
  `user_token` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accept_order`
--
ALTER TABLE `accept_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_id` (`order_id`,`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_noti`
--
ALTER TABLE `user_noti`
  ADD PRIMARY KEY (`noti_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accept_order`
--
ALTER TABLE `accept_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_noti`
--
ALTER TABLE `user_noti`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
