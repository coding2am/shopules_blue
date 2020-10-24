-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2020 at 10:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b18_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `logo` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'G-Shock', 'image/brand/8380187.jpg', '2020-10-19 08:36:11', '2020-10-19 08:36:11'),
(2, 'Omega', 'image/brand/2371578.png', '2020-10-19 08:36:23', '2020-10-19 08:36:23'),
(3, 'Samsung', 'image/brand/1080013.jpg', '2020-10-19 08:37:17', '2020-10-19 08:37:17'),
(4, 'Apple', 'image/brand/2663986.png', '2020-10-19 08:38:00', '2020-10-19 08:38:00'),
(5, 'Gucci', 'image/brand/9510047.jpg', '2020-10-19 08:39:16', '2020-10-19 08:39:16'),
(6, 'Nike', 'image/brand/8174163.jpg', '2020-10-19 08:39:52', '2020-10-19 08:39:52'),
(7, 'Lego', 'image/brand/6578016.jpg', '2020-10-19 08:40:51', '2020-10-19 08:40:51'),
(8, 'Razer', 'image/brand/7684965.jpeg', '2020-10-24 07:31:26', '2020-10-20 15:38:21'),
(9, 'logitech', 'image/brand/5135109.png', '2020-10-20 15:38:57', '2020-10-20 15:38:57'),
(10, 'Bella', 'image/brand/2369135.png', '2020-10-24 06:48:47', '2020-10-24 06:48:47'),
(11, 'Ariel ', 'image/brand/8854293.png', '2020-10-24 06:49:31', '2020-10-24 06:49:17'),
(12, '3M', 'image/brand/3m-lordco-parts-ltd-png-logo-0.png', '2020-10-24 06:54:51', '2020-10-24 06:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Electronic Device', 'image/category/ee.webp', '2020-10-19 08:27:03', '2020-10-19 08:25:32'),
(2, 'Babies & Toys', 'image/category/9937342.jpg', '2020-10-19 08:28:16', '2020-10-19 08:28:16'),
(3, 'Men\'s Fashion', 'image/category/men.jpg', '2020-10-20 05:06:31', '2020-10-19 08:29:18'),
(4, 'Women\'s Fashion', 'image/category/wom.jpg', '2020-10-23 15:11:06', '2020-10-19 08:30:00'),
(5, 'Baby\'s Fashion', 'image/category/6353956.jpg', '2020-10-19 08:30:36', '2020-10-19 08:30:36'),
(6, 'Health', 'image/category/medical-family-insurance.jpg', '2020-10-23 15:12:24', '2020-10-20 05:00:41'),
(7, 'Games', 'image/category/ga.jpg', '2020-10-23 15:26:14', '2020-10-20 05:01:42'),
(8, 'Beauty', 'image/category/beauty.png', '2020-10-23 14:17:51', '2020-10-20 05:02:18'),
(9, 'Book', 'image/category/download.jpg', '2020-10-23 15:15:34', '2020-10-20 05:03:48'),
(10, 'Drinks', 'image/category/5397156.jpg', '2020-10-24 06:46:42', '2020-10-24 06:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `codeno` varchar(225) DEFAULT NULL,
  `name` varchar(225) NOT NULL,
  `photo` text NOT NULL,
  `price` varchar(225) NOT NULL,
  `discount` varchar(225) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `brand_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `codeno`, `name`, `photo`, `price`, `discount`, `description`, `created_at`, `updated_at`, `brand_id`, `subcategory_id`) VALUES
(1, 'AGBA-98874', 'lego shield ship avengers edition', 'image/item/508281.jpg', '130000', '115000', 'lego shield ship avengers edition', '2020-10-20 05:08:18', '2020-10-19 08:42:54', 7, 5),
(2, 'AGBA-19449', 'G-Shock Dw6900DS-1', 'image/item/2024178.jpg', '2200000', '195000', 'G-Shock DW6900DS-1 Classic Series Luxury Watches', '2020-10-20 05:08:32', '2020-10-19 08:45:03', 1, 12),
(3, 'AGBA-68580', 'Gucci Disney x Gucci oversize T-shirt', 'image/item/7833858.jpg', '1900000', '', 'Gucci Disney x Gucci oversize T-shirt', '2020-10-19 08:46:32', '2020-10-19 08:46:32', 5, 8),
(4, 'AGBA-51247', 'Nike Adapt BB', 'image/item/2078382.jpg', '1600000', '150000', 'Nike Adapt BB', '2020-10-20 05:08:45', '2020-10-19 08:47:55', 6, 6),
(5, 'AGBA-55983', 'Samsung S20e', 'image/item/4597652.jpg', '1500000', '', 'Samsung S20e', '2020-10-19 08:49:36', '2020-10-19 08:49:36', 3, 1),
(6, 'AGBA-91863', 'Ipad Pro', 'image/item/9682755.jpg', '1800000', '', 'Ipad Pro 2020', '2020-10-24 07:25:45', '2020-10-19 08:51:38', 4, 2),
(7, 'AGBA-70405', 'Samsung Notebook 9 Pen NP930QAA-K01US', 'image/item/6216760.jpg', '865000', '800000', 'Samsung Notebook 9 Pen NP930QAA-K01US', '2020-10-20 05:08:55', '2020-10-19 08:55:06', 3, 3),
(8, 'AGBA-38803', ' G-Shock G-SHOCK Analog-Digital GA2100-4A', 'image/item/4853071.webp', '145000', '', '\r\nG-Shock\r\nG-SHOCK Analog-Digital GA2100-4A', '2020-10-19 08:56:06', '2020-10-19 08:56:06', 1, 12),
(9, 'AGBA-54544', ' Watches of Switzerland Omega Seamaster Planet Ocean 600m Co-Axial', 'image/item/1628386.jpg', '6800000', '6600000', '\r\nWatches of Switzerland\r\nOmega Seamaster Planet Ocean 600m Co-Axial', '2020-10-20 05:09:06', '2020-10-19 08:58:04', 2, 12),
(10, 'AGBA-32744', 'lego minecraft', 'image/item/260909.jpg', '32000', '18000', 'lego minecraft', '2020-10-20 05:09:16', '2020-10-19 08:59:30', 7, 5),
(11, 'AGBA-29536', 'gucci baby hat', 'image/item/7798179.jpg', '15000', '', 'gucci baby hat', '2020-10-19 09:00:49', '2020-10-19 09:00:49', 5, 10),
(12, 'AGBA-49512', 'gshock gm6900', 'image/item/9060085.webp', '220000', '', 'gshock gm6900', '2020-10-19 09:02:31', '2020-10-19 09:02:31', 1, 12),
(13, 'AGBA-42341', 'Razer BlackWidow Elite', 'image/item/5452650.jpg', '321000', '', 'Razer BlackWidow Elite Mechanical Gaming Keyboard', '2020-10-20 15:40:13', '2020-10-20 15:40:13', 8, 4),
(14, 'AGBA-64177', 'Razer Kraken X', 'image/item/3403077.jpg', '155000', '130000', 'Razer Kraken X', '2020-10-20 15:41:53', '2020-10-20 15:41:53', 8, 13),
(15, 'AGBA-29181', 'Logitech MX Vertical Advanced ', 'image/item/8631486.jpg', '132000', '', 'Logitech MX Vertical Advanced Ergonomic Mouse', '2020-10-20 15:43:42', '2020-10-20 15:43:42', 9, 14),
(16, 'AGBA-45088', 'Samsung Galaxy Note 10 lite ', 'image/item/5327038.png', '1340000', '', '\r\nSamsung Galaxy Note 10 Lite', '2020-10-22 15:14:26', '2020-10-22 15:14:26', 3, 1),
(17, 'AGBA-94254', 'CMR CHAMARIPA', 'image/item/zoom-pegasus-turbo-2-womens-running-shoe-lBb48K.jpg', '53000', '51000', 'CMR CHAMARIPA', '2020-10-24 07:53:22', '2020-10-23 02:41:26', 6, 6),
(18, 'AGBA-87085', 'Face Shield Protection', 'image/item/6194523.jpg', '1500', '', 'Face Shield Protection', '2020-10-24 06:55:36', '2020-10-24 06:51:37', 3, 0),
(19, 'AGBA-36877', '3Ply Face Mask', 'image/item/9505097.jpg', '200', '', '3Ply Face Mask', '2020-10-24 06:56:47', '2020-10-24 06:56:47', 11, 16),
(20, 'AGBA-98903', '1Pack 3ply mask', 'image/item/8733508.jpg', '1500', '', '1Pack 3ply mask', '2020-10-24 07:15:45', '2020-10-24 06:57:33', 12, 16),
(21, 'AGBA-23070', 'iPhone 12', 'image/item/5203501.jpg', '1750000', '', 'iPhone 12', '2020-10-24 07:03:01', '2020-10-24 07:03:01', 4, 1),
(22, 'AGBA-82361', 'iPhone 11 Pro Max', 'image/item/1799040.jpg', '1860000', '', 'iPhone 11 Pro Max', '2020-10-24 07:15:03', '2020-10-24 07:04:08', 4, 1),
(23, 'AGBA-82680', 'S6 Lite', 'image/item/8762429.jpg', '920000', '', 'S6 Lite', '2020-10-24 07:25:11', '2020-10-24 07:25:11', 3, 2),
(24, 'AGBA-86855', 'Mac book 2020', 'image/item/2061200.jpg', '2900000', '', 'Mac book 2020', '2020-10-24 07:27:08', '2020-10-24 07:27:08', 4, 3),
(25, 'AGBA-36396', 'Mac book 2019', 'image/item/8934377.png', '1700000', '', 'Mac book 2019', '2020-10-24 07:29:07', '2020-10-24 07:29:07', 4, 3),
(26, 'AGBA-10778', 'Razer Anansi', 'image/item/9066456.png', '200000', '', 'Razer Anansi', '2020-10-24 07:31:02', '2020-10-24 07:31:02', 8, 4),
(27, 'AGBA-61439', ' Techbuy Razer DeathAdder Expert', 'image/item/5821829.jpg', '340000', '', '\r\nTechbuy\r\nRazer DeathAdder Expert', '2020-10-24 07:33:38', '2020-10-24 07:33:38', 8, 14),
(28, 'AGBA-35683', ' Razer Razer Kraken 7.1 Chroa', 'image/item/940x573-purple.png', '421000', '', 'Razer\r\nRazer Kraken 7.1 Chroma', '2020-10-24 07:51:36', '2020-10-24 07:50:16', 8, 13);

-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE `item_order` (
  `id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_order`
--

INSERT INTO `item_order` (`id`, `qty`, `created_at`, `updated_at`, `item_id`, `order_id`) VALUES
(1, 2, '2020-10-22 05:58:32', '2020-10-22 05:58:32', 1, 1),
(2, 1, '2020-10-22 05:58:32', '2020-10-22 05:58:32', 2, 1),
(3, 1, '2020-10-22 06:00:32', '2020-10-22 06:00:32', 15, 2),
(4, 1, '2020-10-22 06:00:32', '2020-10-22 06:00:32', 11, 2),
(5, 1, '2020-10-22 06:04:23', '2020-10-22 06:04:23', 13, 3),
(6, 1, '2020-10-22 06:05:17', '2020-10-22 06:05:17', 9, 4),
(7, 1, '2020-10-22 13:59:08', '2020-10-22 13:59:08', 14, 5),
(8, 1, '2020-10-22 13:59:08', '2020-10-22 13:59:08', 10, 5),
(9, 2, '2020-10-22 15:07:41', '2020-10-22 15:07:41', 11, 6),
(10, 1, '2020-10-22 15:07:41', '2020-10-22 15:07:41', 2, 6),
(11, 1, '2020-10-22 15:07:41', '2020-10-22 15:07:41', 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `voucherno` varchar(191) NOT NULL,
  `total` varchar(191) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `voucherno`, `total`, `note`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, '2020-10-22', '1603346312', '425000', '', 'confirm', '2020-10-23 02:52:43', '2020-10-22 05:58:32', 2),
(2, '2020-10-22', '1603346432', '147000', '', 'delete', '2020-10-23 02:55:29', '2020-10-22 06:00:32', 2),
(3, '2020-10-22', '1603346663', '321000', '', 'confirm', '2020-10-23 02:53:48', '2020-10-22 06:04:23', 2),
(4, '2020-10-22', '1603346717', '6600000', 'please send it between 2 days', 'delete', '2020-10-24 06:58:08', '2020-10-22 06:05:17', 2),
(5, '2020-10-22', '1603331948', '148000', '', 'order', '2020-10-22 13:59:08', '2020-10-22 13:59:08', 3),
(6, '2020-10-22', '1603336061', '445000', '', 'order', '2020-10-22 15:07:41', '2020-10-22 15:07:41', 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-10-21 02:55:47', '2020-10-21 02:55:47'),
(2, 'customer', '2020-10-21 02:55:47', '2020-10-21 02:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Mobile ', '2020-10-19 10:28:29', '2020-10-19 08:31:15', 1),
(2, 'Tablet', '2020-10-19 08:31:23', '2020-10-19 08:31:23', 1),
(3, 'Laptop', '2020-10-19 08:31:30', '2020-10-19 08:31:30', 1),
(4, 'Keyboard', '2020-10-19 10:29:51', '2020-10-19 08:31:56', 1),
(5, 'Toys and Games', '2020-10-19 08:32:08', '2020-10-19 08:32:08', 2),
(6, 'Shoes', '2020-10-19 08:32:18', '2020-10-19 08:32:18', 3),
(8, 'T-Shirt', '2020-10-19 08:33:03', '2020-10-19 08:33:03', 4),
(9, 'Shoes', '2020-10-19 08:33:14', '2020-10-19 08:33:14', 4),
(10, 'Hat', '2020-10-19 08:33:28', '2020-10-19 08:33:28', 5),
(11, 'Shoes', '2020-10-19 08:33:35', '2020-10-19 08:33:35', 5),
(12, 'Watch', '2020-10-19 08:34:42', '2020-10-19 08:34:42', 3),
(13, 'Headphones', '2020-10-20 15:41:09', '2020-10-20 15:41:09', 1),
(14, 'Mouse', '2020-10-20 15:43:02', '2020-10-20 15:43:02', 1),
(15, 'Make up', '2020-10-22 12:46:55', '2020-10-22 12:46:55', 8),
(16, 'Face Mask & Face Shield', '2020-10-24 07:13:07', '2020-10-24 06:47:25', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `profile` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `profile`, `email`, `password`, `phone`, `status`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Thura Sitt Naing', 'image/user/user.png', 'admin@gmail.com', 'admin2142', '0995973873', 0, 'NayPyiTaw', '2020-10-24 05:55:59', NULL),
(2, 'Kyaw Min Htun ', 'image/user/user.png', 'kyawminhtun@gmaiil.com', '123456789', '0938738387 ', 0, 'Mandalay', '2020-10-23 07:44:45', NULL),
(3, 'Hein Ko Htin', 'image/user/user.png', 'kohtinpya@gmail.com', '123456789', '0938736743', 0, 'Yangon', '2020-10-22 12:26:25', NULL),
(5, 'Tin Mar Aye', 'image/user/user.png', 'cuttiePinky@gmail.com', '123456789', '06776243', 0, 'Singapore', '2020-10-22 15:05:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `item_order`
--
ALTER TABLE `item_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
