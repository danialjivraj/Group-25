-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 04:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goldenriver`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `Address_ID` int(11) NOT NULL,
  `Account_ID` int(11) NOT NULL,
  `Address_Status` enum('Default','Hidden','Normal') NOT NULL,
  `ZIP` varchar(10) NOT NULL,
  `City` varchar(40) NOT NULL,
  `Country` varchar(40) NOT NULL,
  `Street` varchar(40) NOT NULL,
  `County` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`Address_ID`, `Account_ID`, `Address_Status`, `ZIP`, `City`, `Country`, `Street`, `County`, `created_at`, `updated_at`) VALUES
(1, 24, 'Default', 'Ub8 6GH', 'London', 'England', '434 Ben Street', 'Hillingdon', '2023-03-20 00:46:17', '2023-03-20 00:46:54'),
(2, 26, 'Default', 'B38 8QT', 'Birmingham', 'UK', '89 Down cl', 'West Mid', '2023-03-29 23:49:56', '2023-03-29 23:52:43'),
(3, 27, 'Default', 'B14 5PA', 'London', 'UK', '28 Brend Road', 'Hillingdon', '2023-03-31 13:04:13', '2023-03-31 13:05:09'),
(4, 28, 'Default', 'pending', 'pending', 'pending', 'pending', 'pending', '2023-03-31 13:43:04', '2023-03-31 13:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`) VALUES
(5, 'Earirngs'),
(6, 'Necklace'),
(7, 'Bracelets'),
(8, 'Rings'),
(9, 'Exclusive sets');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `linked_product_order`
--

CREATE TABLE `linked_product_order` (
  `Product_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `POL_ID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `linked_product_order`
--

INSERT INTO `linked_product_order` (`Product_ID`, `Order_ID`, `Amount`, `Price`, `POL_ID`, `created_at`, `updated_at`) VALUES
(6, 1, 2, 25, 1, '2023-03-20 00:46:17', '2023-03-20 00:46:17'),
(16, 1, 3, 65, 2, '2023-03-20 00:46:24', '2023-03-20 00:46:24'),
(7, 2, 3, 45, 3, '2023-03-20 00:47:25', '2023-03-20 00:47:25'),
(6, 3, 2, 25, 4, '2023-03-26 15:39:36', '2023-03-26 15:39:36'),
(7, 4, 1, 45, 6, '2023-03-26 20:05:52', '2023-03-26 20:05:52'),
(11, 5, 2, 38, 7, '2023-03-28 01:42:26', '2023-03-28 01:42:26'),
(19, 5, 1, 63, 8, '2023-03-28 01:42:31', '2023-03-28 01:42:31'),
(20, 5, 3, 78, 9, '2023-03-28 01:42:36', '2023-03-28 01:42:45'),
(35, 5, 3, 45, 10, '2023-03-28 01:42:42', '2023-03-28 01:42:42'),
(17, 5, 1, 80, 11, '2023-03-28 01:42:49', '2023-03-28 01:42:49'),
(8, 6, 3, 45, 12, '2023-03-29 19:08:18', '2023-03-29 19:08:18'),
(10, 7, 2, 35, 14, '2023-03-29 19:16:04', '2023-03-29 19:16:04'),
(6, 9, 2, 25, 16, '2023-03-29 23:49:56', '2023-03-29 23:50:00'),
(11, 10, 4, 38, 17, '2023-03-29 23:53:22', '2023-03-29 23:54:18'),
(24, 11, 2, 75, 18, '2023-03-30 00:04:29', '2023-03-30 00:04:29'),
(11, 8, 1, 38, 20, '2023-03-30 18:58:35', '2023-03-30 18:58:35'),
(6, 12, 2, 25, 22, '2023-03-30 19:28:01', '2023-03-30 19:28:01'),
(6, 13, 3, 25, 23, '2023-03-31 13:04:13', '2023-03-31 13:04:13'),
(5, 13, 1, 30, 24, '2023-03-31 13:04:16', '2023-03-31 13:04:16'),
(4, 13, 1, 60, 25, '2023-03-31 13:04:20', '2023-03-31 13:04:20'),
(6, 14, 2, 25, 27, '2023-03-31 13:19:16', '2023-03-31 13:19:16'),
(11, 15, 2, 38, 30, '2023-03-31 13:53:35', '2023-03-31 13:53:35'),
(11, 16, 2, 38, 33, '2023-03-31 14:14:52', '2023-03-31 14:14:52'),
(10, 17, 1, 35, 35, '2023-03-31 14:45:00', '2023-03-31 14:45:00'),
(7, 18, 1, 45, 36, '2023-03-31 14:54:13', '2023-03-31 14:54:13'),
(10, 18, 3, 35, 37, '2023-03-31 14:54:34', '2023-03-31 14:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_02_07_000659_create_test_table', 1),
(6, '2023_02_15_023554_add_timestamps_to_account', 1),
(7, '2023_02_22_022400_add_remember_token_to_account_table', 1),
(8, '2023_02_22_185030_add__user__surname_to_users_table', 2),
(9, '2023_03_01_041709_add_columns_to_orderb_table', 3),
(10, '2023_03_01_042237_add_columns_to_address_table', 4),
(11, '2023_03_01_060749_add_columns_to_linked_product_order_table', 5),
(12, '2023_03_19_040016_add_timestamps_to_product_name', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orderb`
--

CREATE TABLE `orderb` (
  `Order_ID` int(11) NOT NULL,
  `Account_ID` int(11) NOT NULL,
  `Address_ID` int(11) NOT NULL,
  `Order_Status` enum('Shipped','Processing','Delivered','Canceled','Basket') NOT NULL,
  `Order_Total_Price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderb`
--

INSERT INTO `orderb` (`Order_ID`, `Account_ID`, `Address_ID`, `Order_Status`, `Order_Total_Price`, `created_at`, `updated_at`) VALUES
(1, 24, 1, 'Delivered', 245, '2023-03-20 00:46:17', '2023-03-20 00:46:54'),
(2, 24, 1, 'Shipped', 135, '2023-03-20 00:47:25', '2023-03-26 03:12:05'),
(3, 24, 1, 'Canceled', 50, '2023-03-26 15:39:36', '2023-03-26 15:39:41'),
(4, 24, 1, 'Shipped', 45, '2023-03-26 15:41:54', '2023-03-26 20:06:38'),
(5, 24, 1, 'Processing', 588, '2023-03-28 01:42:26', '2023-03-28 01:42:53'),
(6, 24, 1, 'Canceled', 135, '2023-03-29 19:08:18', '2023-03-29 19:08:50'),
(7, 24, 1, 'Processing', 70, '2023-03-29 19:15:57', '2023-03-29 19:17:58'),
(8, 24, 1, 'Processing', 38, '2023-03-29 19:18:24', '2023-03-30 18:58:54'),
(9, 26, 2, 'Processing', 50, '2023-03-29 23:49:56', '2023-03-29 23:52:43'),
(10, 26, 2, 'Processing', 152, '2023-03-29 23:53:22', '2023-03-29 23:54:32'),
(11, 26, 2, 'Shipped', 150, '2023-03-30 00:04:29', '2023-03-30 00:05:32'),
(12, 24, 1, 'Processing', 50, '2023-03-30 19:27:56', '2023-03-30 19:28:55'),
(13, 27, 3, 'Processing', 165, '2023-03-31 13:04:13', '2023-03-31 13:05:09'),
(14, 24, 1, 'Processing', 50, '2023-03-31 13:19:11', '2023-03-31 13:20:25'),
(15, 28, 4, 'Basket', 76, '2023-03-31 13:43:04', '2023-03-31 13:53:35'),
(16, 24, 1, 'Processing', 76, '2023-03-31 13:57:52', '2023-03-31 14:15:58'),
(17, 24, 1, 'Processing', 35, '2023-03-31 14:44:53', '2023-03-31 14:46:08'),
(18, 24, 1, 'Basket', 150, '2023-03-31 14:54:13', '2023-03-31 14:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Category_ID` int(11) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Product_Discount` int(2) NOT NULL,
  `Product_Price` double NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Category_ID`, `Product_Name`, `Product_Discount`, `Product_Price`, `Product_ID`, `Amount`, `Description`, `created_at`, `updated_at`) VALUES
(6, 'Gold Pendant Necklace', 0, 60, 4, 9, 'Golden Chain Necklace with Pearls and Coin Pendant.', NULL, '2023-03-31 13:05:09'),
(6, 'White and Blue Pearl  Necklace', 0, 30, 5, 9, 'Gold Linear Chain Pearl Necklace.', NULL, '2023-03-31 13:05:09'),
(6, 'White and Blue Crystal Necklace', 10, 25, 6, 10, 'Blue Stone Heart Shaped Pendant with Silver Stoned Detailing and Chain.', NULL, '2023-03-31 13:20:25'),
(6, 'Silver Peal Drop Pendant Necklace', 5, 45, 7, 10, 'Stainless Steel Single Drop Necklace.', NULL, '2023-03-26 20:06:38'),
(6, 'Gold and Silver Intricate Pearl Drop Necklace', 0, 45, 8, 12, 'Vintage Pearl Drop Necklace With Silver detailing.', NULL, '2023-03-29 19:08:50'),
(6, 'Golden Chain Necklace', 0, 35, 9, 10, 'Thick Band Gold Chain Necklace.', NULL, '2023-03-19 05:23:12'),
(6, 'Rose Gold Chain Neckalce', 0, 35, 10, 9, 'Thin Band Rose Gold Necklace.', NULL, '2023-03-31 14:46:08'),
(6, 'Silver and Gold Arrow Necklace', 0, 38, 11, 8, 'Crossed Gold Arrow Necklace with Silver Arrowhead.', NULL, '2023-03-31 14:15:58'),
(5, 'Golden Small Hoop Clip Earrings', 0, 45, 12, 0, 'Minimalistic Golden Clip on Hoop Earrings. ', NULL, '2023-03-19 05:18:59'),
(5, 'Silver Stud Earings', 0, 65, 13, 0, 'Sterling Silver Square Crystal Stud Earrings with backing included.', NULL, NULL),
(5, 'Sterling Silver Leaf Hoop Earrings', 0, 95, 14, 0, 'Sterling Silver Leaf small hooped Earrings.', NULL, '2023-03-19 05:07:44'),
(5, 'Silver and Blue Stud  Earings', 10, 65, 16, 3, 'Diamonfire Blue Cubic Zirconia Halo Sterling Silver Stud Earrings.', NULL, '2023-03-20 00:46:54'),
(5, 'Oval Stud Earrings', 0, 80, 17, 97, 'Sterling Silver Oval Studs with Backing included.', NULL, '2023-03-28 01:42:53'),
(5, 'Intricate Dangly Earrings', 0, 63, 18, 98, 'Rustic Silver Dangly Earring with Flower detailing. Cloud like design with a Blue Beading. ', NULL, '2023-03-19 05:21:33'),
(5, 'Snowflake Studs', 0, 63, 19, 96, 'Snowflake Diamond Stud Earrings.', NULL, '2023-03-28 01:42:53'),
(5, 'Sparkling Crystal Drop Earrings', 5, 78, 20, 88, 'Graduated Cubic Zirconia Fancy Drop Earrings.', NULL, '2023-03-28 01:42:53'),
(7, 'Golden Strap Bracelet', 0, 45, 21, 100, 'Golden Triple Twisted Bracelet with circular design.', NULL, NULL),
(7, 'Pearl Bracelet', 0, 68, 22, 100, 'Pearl Bracelet with Blue Crystal Pendant.', NULL, NULL),
(7, 'Golden Slider Bracelet', 0, 40, 23, 100, 'Dainty adjustable Gold Bracelet.', NULL, NULL),
(7, 'Gold Swarovski Bangle', 0, 75, 24, 98, 'Rose Gold with Silver Diamond Crystal Bracelet.', NULL, '2023-03-30 00:05:32'),
(7, 'Silver Sparkling Polished Bracelet', 0, 85, 25, 100, 'Silver Square Bracelet with Clasp.', NULL, NULL),
(7, 'Sparkling Heart Pendant Bracelet', 0, 55, 26, 10, 'Simple Gold Chain Bracelet with Red Heart Pendant.', NULL, NULL),
(7, 'Colorful Pearl Slider Bracelet', 0, 65, 27, 100, 'Gold diamante and Multi Pearl adjustable Bracelet.', NULL, NULL),
(7, 'Golden Thick Strap Bracelet', 0, 55, 28, 100, 'Gold Thick Snake Chain Bracelet.', NULL, NULL),
(8, 'Radiant Golden Triple Square Ring', 0, 45, 29, 100, 'Gold Ring with Square Diamond Detailing and Thin Golden Band.', NULL, NULL),
(8, 'Gold and Clear Flower Ring', 0, 86, 30, 100, 'Crystal Silver and Gold Flower Ring with Diamond Band.', NULL, NULL),
(8, 'Pink and Blue Large Square Ring', 0, 65, 31, 10, 'Swarzovski Pink and Blue Crystal Ring.', NULL, NULL),
(8, 'Silver Sparkle Ring', 0, 45, 32, 10, 'Elegant Silver Ring with Crystal Detailing.', NULL, NULL),
(8, 'Double Halo Gold Ring', 0, 55, 33, 10, 'Double Rounded Gold Ring with Diamond detailing.', NULL, NULL),
(8, 'Eternity Gold Plated Ring', 0, 65, 34, 100, 'Gold Ring with Studded band and Large Oval Crystal.', NULL, NULL),
(8, 'Paris Rusted Gold Ring', 0, 45, 35, 97, 'Thin Band Gold Ring with Circular design and Studded Crystals.', NULL, '2023-03-28 01:42:53'),
(8, 'Gold Plated Vintage Ring', 0, 45, 36, 100, 'Simple thin patterned ring with silver diamond', NULL, NULL),
(9, 'Swarzovski Bella set,  rounded cut', 0, 90, 37, 5, 'Silver set including clip-on earrings necklace and ring', NULL, NULL),
(9, 'Exclusive Diamond Earring & Necklace', 0, 120, 38, 5, 'Havy necklace Set, Silver and Pink Diamond detailing with a bead chain attachment.', NULL, NULL),
(9, 'Solitaire Squared Set', 0, 79, 39, 10, 'Square Necklace Set including Earrings, with a Crystal Studded detailed look.', NULL, NULL),
(9, 'Solitaire Rounded Set', 0, 79, 40, 10, 'Circular Designed Earring and Necklace, Set with Silver Crystals.', NULL, NULL),
(9, 'Pink Cluster Set', 5, 68, 41, 5, 'Simple swarzovski pink and silver necklace with stud earrings.', NULL, NULL),
(9, 'Purple Ribbon Set', 0, 68, 42, 10, 'Simple Purple and Gold Necklace with Drop Earrings.', NULL, NULL),
(9, 'Evergreen Stonework Set', 5, 80, 43, 10, 'Elegant Gold Earring and Necklace Set with Studded Evergreen Stones.', NULL, NULL),
(9, 'Swan Vermeil Complete Set', 5, 99, 44, 10, 'Silver and Rose Set with Swan detailing includes Necklace, Bangle, Earrings And Ring.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Phone_Number` varchar(20) NOT NULL DEFAULT '-',
  `User_Surname` varchar(30) NOT NULL DEFAULT '-',
  `User_Sex` enum('Male','Female','Other') DEFAULT NULL,
  `User_DOB` date DEFAULT NULL,
  `User_Status` enum('Customer','Admin') NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `Phone_Number`, `User_Surname`, `User_Sex`, `User_DOB`, `User_Status`) VALUES
(21, 'faraz ahmed', 'farazahmed9910@gmail.com', NULL, '$2y$10$i9l9GUMOWuvhPmfsqZfQ9ut1JrH4SooGlGkWM/O/O1.RiH96k5j2C', NULL, '2023-03-18 19:55:35', '2023-03-18 19:55:35', '-', '-', NULL, NULL, 'Admin'),
(24, 'faraz ahmed a', 'farazahmed99@gmail.com', NULL, '$2y$10$yioXTiSiqqqXANzuOpDrt.SmmEBkILa4RzKKLXUJl.gFCkaq4Vxcq', NULL, '2023-03-20 00:46:08', '2023-03-31 14:46:35', '07199292211', '-', NULL, NULL, 'Admin'),
(25, 'faraz ahmed', 'farazahmed910@gmail.com', NULL, '$2y$10$8tRjUbOSpdEn2QSjBxdY9e5hJWjHyhn/2ZqU63/b9.T9F58HTAGqq', NULL, '2023-03-26 03:08:20', '2023-03-26 03:08:20', '-', '-', NULL, NULL, 'Customer'),
(26, 'faraz ahmed', 'farazahmed9@gmail.com', NULL, '$2y$10$Cu3Uv31.aLKzGOj9JNNWYe.ZMEL4hGw8c34lFeugGzSod.x6mca0y', NULL, '2023-03-29 23:08:54', '2023-03-29 23:52:43', '07123456789', '-', NULL, NULL, 'Admin'),
(29, 'faraz ahmed', 'farazaahmed9910@gmail.com', NULL, '$2y$10$lKh1foDguK0z122v.oY9AO147LyVLYr4ymI2o.MLkp8aVVREmntQS', NULL, '2023-03-31 14:13:23', '2023-03-31 14:13:23', '-', '-', NULL, NULL, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Address_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `linked_product_order`
--
ALTER TABLE `linked_product_order`
  ADD PRIMARY KEY (`POL_ID`),
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderb`
--
ALTER TABLE `orderb`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Address_ID` (`Address_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `Address_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `linked_product_order`
--
ALTER TABLE `linked_product_order`
  MODIFY `POL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orderb`
--
ALTER TABLE `orderb`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `linked_product_order`
--
ALTER TABLE `linked_product_order`
  ADD CONSTRAINT `linked_product_order_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `orderb` (`Order_ID`),
  ADD CONSTRAINT `linked_product_order_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`);

--
-- Constraints for table `orderb`
--
ALTER TABLE `orderb`
  ADD CONSTRAINT `orderb_ibfk_1` FOREIGN KEY (`Address_ID`) REFERENCES `address` (`Address_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
