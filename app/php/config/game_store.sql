-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 08:12 PM
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
-- Database: `game_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(40) NOT NULL,
  `admin_password` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `admin_password`, `created_at`) VALUES
(1, 'admin', '$2y$10$.VsJVY6lFvFkyr7O70sNqO/aA0y5fKzdXPSQ8rpZ/yt6Wr6rj1xMS', '2025-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(40) NOT NULL,
  `brand_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`) VALUES
(1, 'Logitech', '1747210571_brand-logitech-svgrepo-com (1).svg'),
(4, 'Red Dragon', '1747212135_5dQBVyQuIbUUmCug6lRgSlusiuK7Stm3m0ik5m6J.svg'),
(5, 'Sony', '1747409726_images.png'),
(6, 'Xbox', '1747423198_Xbox-Logo-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `quantity`) VALUES
(24, 4, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(40) NOT NULL,
  `category_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`) VALUES
(1, 'Controller', '1747210674_controller-svgrepo-com.svg'),
(3, 'Mouse', '1747211881_mouse-alt-5-svgrepo-com.svg'),
(4, 'Keybaord', '1747314100_keyboard-svgrepo-com.svg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(40) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_phone` varchar(12) NOT NULL,
  `customer_password` text NOT NULL,
  `customer_image` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_email`, `customer_phone`, `customer_password`, `customer_image`, `created_at`) VALUES
(1, 'test', 'test@gmail.com', '07511233445', 'test@gmail.com', 'avatar.png', '2025-05-12'),
(3, 'Mustafa', 'mustafaslah167@gmail.com', '07051759162', '$2y$10$mOLJuXVUCz7GlPxJGh9RVOqD74IPW2IVNH61uapbU8wJvOpxjVQlm', 'default.png', '2025-05-15'),
(4, 'evan', 'evan7@gmail.com', '', '$2y$10$QM612.f15RkFe9fXPZ9Sk.OYTyTPc0shdoRLHmjkiJBHKdaQJadEm', 'default.png', '2025-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `delivery_price` double NOT NULL,
  `total_price` double NOT NULL,
  `status` enum('waiting','active','delivering','completed','canceled') NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `customer_id`, `location`, `quantity`, `delivery_price`, `total_price`, `status`, `created_at`) VALUES
(4, 3, '36.16322504592537,44.054989479789185', 2, 5000, 57000, 'active', '2025-05-15'),
(5, 3, '36.16769354288779,44.033479554530274', 6, 5000, 214000, 'completed', '2025-05-15'),
(6, 3, '36.24309500058213,44.08328219305128', 2, 5000, 14000, 'completed', '2025-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

CREATE TABLE `invoice_products` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_products`
--

INSERT INTO `invoice_products` (`id`, `invoice_id`, `product_id`, `quantity`, `price`, `created_at`) VALUES
(5, 4, 16, 1, 7000, '2025-05-15'),
(6, 4, 17, 1, 50000, '2025-05-15'),
(7, 5, 16, 2, 7000, '2025-05-15'),
(8, 5, 17, 4, 50000, '2025-05-15'),
(9, 6, 16, 2, 7000, '2025-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_content` text NOT NULL,
  `product_price` double NOT NULL,
  `product_price_sell` double NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_new` enum('true','false') NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_quantity`, `product_content`, `product_price`, `product_price_sell`, `product_image`, `brand_id`, `category_id`, `product_new`, `created_at`) VALUES
(16, 'Amela Wong', 47, 'Rem at qui assumenda', 20000, 25000, '1747245530_3.jpg', 5, 1, 'true', '2025-05-14'),
(17, 'Logitech G502 HERO', 50, 'Ducimus autem velit', 35000, 50000, '1747245601_26.jpg', 1, 3, 'true', '2025-05-14'),
(18, 'Camilla Lucas', 50, 'Ex et adipisci nemo', 7000, 75000, '1747313977_14.jpg', 4, 4, 'true', '2025-05-15'),
(19, 'Gaming Mouse', 45, 'Wired Gaming Mouse', 30000, 35000, '1747411442_30.jpg', 4, 3, 'true', '2025-05-16'),
(20, 'Redragon M601-3', 20, 'Redragon M601-3 Gaming Mouse', 35000, 40000, '1747419220_antgrip-redragon-centrophous-1-square.jpg', 4, 3, 'true', '2025-05-16'),
(21, 'Wired Mouse', 65, 'wired Gaming Mouse for PC', 20000, 25000, '1747419414_242.jpg', 1, 3, 'true', '2025-05-16'),
(22, 'DualSense™ Wireless Controller PS5', 34, 'PlayStation DualSense™ Wireless Controller PS5 | Starlight Blue', 25000, 30000, '1747419524_8.webp', 5, 1, 'true', '2025-05-16'),
(23, 'Controller Gear Special Edition', 53, 'Controller Gear Phantom Magenta Special Edition  - Xbox One', 20000, 25000, '1747420402_Phantom_Magenta-xbox-controller.jpg', 6, 1, 'true', '2025-05-16'),
(24, 'Alienware Pro Wireless gaming keyboard', 40, 'The Alienware Pro Wireless gaming keyboard is perfect for professionals', 60000, 65000, '1747421170_12.jpg', 1, 4, 'true', '2025-05-16'),
(25, 'MK1 Mechanical Gaming Keyboard', 43, 'MK1 RED LED Backlit Mechanical Gaming Keyboard', 57000, 64000, '1747421379_86586963.webp', 4, 4, 'true', '2025-05-16'),
(26, 'DUALSHOCK 4 wireless controller', 54, 'DUALSHOCK 4 wireless controller - Black', 19000, 23000, '1747421920_black-gaming-controller-desk-surrounded-by-neon-purple-blue-lights-from-gaming-setup-background-offering-sleek-futuristic-gaming-experience_600978-18267.jpg', 5, 1, 'true', '2025-05-16'),
(27, 'Mechanical Gaming Keyboard', 38, 'Mechanical Gaming Keyboard - Single LED Light version', 54000, 60000, '1747422437_vertical-shot-of-a-keyboard-with-lights-perfect-for-a-beautiful-background-2C7E7GG.jpg', 1, 4, 'true', '2025-05-16'),
(28, 'Xbox Wireless Controller', 46, 'Official Xbox Series X & S Wireless Controller - White', 17000, 23000, '1747422588_xboxcontrollermineralcamo-1747330885719.jpg', 6, 1, 'true', '2025-05-16'),
(29, 'Wireless Gaming Mouse', 49, 'K6 Wireless Gaming Mouse - Rechargeable Silent LED Optical Computer Mice with USB Receiver', 38000, 45000, '1747422770_27.jpg', 1, 3, 'true', '2025-05-16'),
(30, 'Wireless Keyboard', 52, 'Wireless bluetooth Dual Mode Keyboard - White', 43000, 47000, '1747423093_19.jpg', 4, 4, 'true', '2025-05-16'),
(31, 'Xbox Wireless Controller', 23, '\"Microsoft has revealed and launched the Stellar Shift Xbox Series X/S controller', 25000, 30000, '1747423542_close-up-white-xbox-game-controller-vibrant-blue-light-streaks-background-close-up-white-xbox-game-364460022.webp', 6, 1, 'true', '2025-05-16'),
(32, 'Dualshock 4 Wireless Controller', 35, 'Special Edition Dualshock 4 Wireless Controller for PS4', 23000, 27000, '1747423753_1000_F_572785391_KQba9huYQH4P8WTxCBk8sbxRDTKF5S4z.jpg', 5, 1, 'true', '2025-05-16'),
(33, 'PS5 wireless controller', 50, 'PS5 DualSense Edge® wireless controller - Midnight Black', 25000, 30000, '1747475080_images.jpg', 5, 1, 'true', '2025-05-16'),
(34, 'Redragon TIGER Gaming Mouse', 31, 'Redragon M709 TIGER 10000 DPI Gaming Mouse – REDRAGON ZONE', 33000, 37000, '1747475143_24.jpeg', 4, 3, 'true', '2025-05-16'),
(35, 'Gaming Wired Mouse', 45, 'basics flat RGB Gaming Wired Mouse with RGB Light', 44000, 47000, '1747475177_23.jpg', 1, 3, 'true', '2025-05-16'),
(36, 'Mechanical Gaming keyboard', 25, 'Mechanical Gaming keyboard With RGB LED', 66000, 70000, '1747475197_gaming-keyboard-rgb-light-white-mechanical-backlight-212226943.webp', 1, 4, 'true', '2025-05-16'),
(37, 'Gaming Keyboard', 20, 'Rgb Lit Gaming Keyboard And 3d Rendered Pc Case For Ultimate Game Space Background', 76000, 80000, '1747475233_pngtree-d-render-of-pc-case-game-space-with-gaming-keyboard-featuring-picture-image_4845088.jpg', 4, 4, 'true', '2025-05-16'),
(38, 'Wireless Mechanical Keyboard', 47, 'Wireless Mechanical Keyboard - 65% Heat Insertion Gaming Keyboard', 70000, 75000, '1747475252_bb88f2a6-4f98-4bf4-8cf3-c74366730d8c.jpg', 1, 4, 'true', '2025-05-16'),
(39, 'Sanrio Cinnamoroll Gaming Mouse', 20, 'Sanrio Cinnamoroll Special Edition Gaming Mouse', 30000, 35000, '1747475270_IMG_0777__62131.jpg', 4, 3, 'true', '2025-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD CONSTRAINT `invoice_products_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
