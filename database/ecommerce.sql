-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2026 at 02:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `quantity`, `image`, `description`, `type`, `time`) VALUES
(35, 'Wireless Headphones', 30, 17, '1790255123-pexels-caleboquendo-7772548.jpg', 'Cool Headphones', 'Electronics', '2026-09-24 13:05:23'),
(36, 'T - Shirt', 15, 25, '1790255240-pexels-dayong-tien-681073045-18186105.jpg', 'Cool Shirt', 'Fashions', '2026-09-24 13:07:20'),
(37, 'Bracelets', 10, 5, '1790255310-pexels-seljansalim-37401695.jpg', 'Amazing Bracelets', 'Accessories', '2026-09-24 13:08:30'),
(38, 'Flower Pot', 20, 10, '1790255378-pexels-hi-u-le-921253873-38475059.jpg', 'Cool Vase', 'Home & Living', '2026-09-24 13:09:38'),
(39, 'Pet Food', 12, 40, '1790263015-ad1.png', 'Food For Pet', 'Home & Living', '2026-09-24 15:16:55'),
(40, 'Cat', 1000, 1, '1790263633-cat.png', 'Cute Cat', 'Other', '2026-09-24 15:27:13'),
(41, 'Dog', 1000, 1, '1790263676-dog.png', 'Cute Dog', 'Other', '2026-09-24 15:27:56'),
(42, 'Necklace', 50, 5, '1790263861-pexels-enginakyurt-33737462.jpg', 'Cool Necklace', 'Accessories', '2026-09-24 15:31:01'),
(43, 'Candles', 14, 15, '1790263954-pexels-sena-erzem-291180395-13395697.jpg', 'Cool Candles', 'Home & Living', '2026-09-24 15:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(5, 'Hi', '$2y$10$rKyI78dxci.0RORVCBE9/ugOoq48Syv0kCRLStqzvzkS7//LE7.RS', '2026-08-22 15:39:50.501876'),
(6, 'Mg Mg', '$2y$10$L9i9NvBxA8g/xK7Db/MKGO9ddjFnvjqTq2egJ2thECoqJyMY.jqey', '2026-08-22 15:53:19.669973');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
