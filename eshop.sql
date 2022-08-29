-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 06:14 AM
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
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descrip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_descrip`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', 'All type of Electronic available here', 0, 1, '1661303060.png', 'Electronics', 'all types of good electronics', 'all types of good electronics', '2022-08-23 15:04:20', '2022-08-23 15:04:20'),
(2, 'Fashion', 'fashion', 'all types of brands items here', 0, 1, '1661303111.jpg', 'Fashion', 'all types of brands ,sizes and color available', 'all types of brands ,sizes and color available', '2022-08-23 15:05:11', '2022-08-23 15:05:11'),
(3, 'Kitchen', 'kitchen', 'kitchen appliances available here', 0, 1, '1661303186.jpg', 'Kitchen', 'all types of kitchen ware available in good quality', 'all types of kitchen ware available in good quality', '2022-08-23 15:06:26', '2022-08-23 15:06:26'),
(4, 'Cleaning', 'cleaning', 'Cleaning items available', 0, 1, '1661303227.jpg', 'Cleaning', 'Cleaning items available', 'Cleaning items available', '2022-08-23 15:07:07', '2022-08-23 15:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_22_040554_create_categories_table', 1),
(6, '2022_08_23_002211_create_product_table', 1),
(7, '2022_08_24_000253_create_cart_table', 1),
(8, '2022_08_24_234342_create_orders_table', 2),
(9, '2022_08_24_234746_create_order_items_table', 2),
(10, '2022_08_25_063126_create_wishlist_table', 3),
(11, '2022_08_26_061606_create_ratings_table', 4),
(12, '2022_08_27_012658_create_review_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `status`, `message`, `tracking_no`, `total_price`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(11, '2', 'Dhara', 'Patel', 'test1@test1.com', '54675765', '3/843 Sandy Bay Road', 'sandy bay', 'Hobart', 'Tasmania', 'Australia', '7005', 0, NULL, 'dhara6596', '3400', 'COD', '', '2022-08-24 17:25:29', '2022-08-24 19:41:35'),
(12, '2', 'Test 1', 'Patel', 'test1@test1.com', '54675765', '3/843 Sandy Bay Road', 'sandy bay', 'Hobart', 'Tasmania', 'Australia', '7005', 0, NULL, 'dhara9547', '0.1', 'Paid by RazorPay', 'pay_KA9SFMXIllPKit', '2022-08-25 19:47:16', '2022-08-25 19:47:16'),
(13, '2', 'Test 1', 'Patel', 'test1@test1.com', '54675765', '3/843 Sandy Bay Road', 'sandy bay', 'Hobart', 'Tasmania', 'Australia', '7005', 0, NULL, 'dhara9487', '0.1', 'Paid by Paypal', '5BX99908A16981723', '2022-08-25 19:49:51', '2022-08-25 19:49:51'),
(14, '2', 'Test 1', 'Patel', 'test1@test1.com', '54675765', '3/843 Sandy Bay Road', 'sandy bay', 'Hobart', 'Tasmania', 'Australia', '7005', 1, NULL, 'dhara9662', '2200', 'COD', NULL, '2022-08-25 19:50:59', '2022-08-28 15:38:02'),
(15, '2', 'Test 1', 'Patel', 'test1@test1.com', '54675765', '3/843 Sandy Bay Road', 'sandy bay', 'Hobart', 'Tasmania', 'Australia', '7005', 0, NULL, 'dhara4028', '1', 'Paid by RazorPay', 'pay_KBFw0qaX1yOt9u', '2022-08-28 14:46:38', '2022-08-28 14:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(11, '11', '2', '1', '400', '2022-08-24 17:25:29', '2022-08-24 17:25:29'),
(12, '11', '4', '2', '1500', '2022-08-24 17:25:29', '2022-08-24 17:25:29'),
(13, '12', '2', '1', '0.1', '2022-08-25 19:47:16', '2022-08-25 19:47:16'),
(14, '13', '2', '1', '0.1', '2022-08-25 19:49:51', '2022-08-25 19:49:51'),
(15, '14', '1', '2', '1100', '2022-08-25 19:50:59', '2022-08-25 19:50:59'),
(16, '15', '2', '1', '1', '2022-08-28 14:46:38', '2022-08-28 14:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cate_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `tax`, `status`, `trending`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dress', 'dress', 'all sizes color and quality available', 'all sizes color and quality available', '1200', '1100', '1661303314.jpg', '7', '0', 0, 1, 'Dress', 'western ware', 'western ware', '2022-08-23 15:08:34', '2022-08-25 19:50:59'),
(2, 2, 'T-shirt', 't-shirt', 'Different color and sizes  arrived', 'all type of color, good quality', '500', '1', '1661303406.avif', '12', '0', 0, 1, 'T-shirt', 'all type of color, good quality', 'all type of color, good quality', '2022-08-23 15:10:06', '2022-08-28 14:46:38'),
(3, 1, 'Mobile', 'mobile', 'all color available', 'different price and brands', '120000', '110000', '1661303528.png', '19', '1000', 0, 1, 'Mobile', 'different price and brands', 'different price and brands', '2022-08-23 15:12:08', '2022-08-23 15:12:08'),
(4, 1, 'Charger', 'charger', 'different brands  charger available', 'different brands charger available', '2000', '1500', '1661303689.png', '19', '0', 0, 1, 'Charger', 'different brands  charger available', 'different brands  charger available', '2022-08-23 15:14:49', '2022-08-24 17:25:29'),
(5, 3, 'Mixer', 'mixer', 'good quality', 'good quality, different brands', '4000', '3700', '1661303811.png', '1', '0', 0, 1, 'Mixer', 'good quality, different brands , different color', 'good quality, different brands , different color', '2022-08-23 15:16:51', '2022-08-23 15:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars_rated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `prod_id`, `stars_rated`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '3', '2022-08-25 20:35:12', '2022-08-25 20:35:12'),
(2, '2', '1', '3', '2022-08-25 20:35:12', '2022-08-25 20:35:12'),
(3, '1', '1', '2', '2022-08-25 20:55:34', '2022-08-25 21:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_review` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `prod_id`, `user_review`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 'The product is amazing', '2022-08-26 16:01:23', '2022-08-26 16:41:27'),
(2, '1', '1', 'The product is good', '2022-08-26 16:01:23', '2022-08-26 16:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dhara', 'dhara@dhara.com', NULL, '$2y$10$K9NepQbsdFQoTjoCODJiBuAsTMR/XRgwGyD5N/pYaawBSJ.joePtm', '', '', '', '', '', '', '', '', 1, NULL, '2022-08-23 15:02:50', '2022-08-23 15:02:50'),
(2, 'Test 1', 'test1@test1.com', NULL, '$2y$10$A5lEGmargW.v5cesL54X1e/rvxHFY0g2es7Ng/spVlOAxA0iOR4em', 'Patel', '54675765', '3/843 Sandy Bay Road', 'sandy bay', 'Hobart', 'Tasmania', 'Australia', '7005', 0, NULL, '2022-08-23 15:22:01', '2022-08-24 14:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `prod_id`, `created_at`, `updated_at`) VALUES
(2, '1', '5', '2022-08-24 20:50:18', '2022-08-24 20:50:18'),
(3, '1', '4', '2022-08-24 21:26:23', '2022-08-24 21:26:23'),
(4, '1', '1', '2022-08-24 21:28:14', '2022-08-24 21:28:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
