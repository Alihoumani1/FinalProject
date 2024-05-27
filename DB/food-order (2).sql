-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 01:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `dinein`
--

CREATE TABLE `dinein` (
  `id` int(11) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `seats` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dinein`
--

INSERT INTO `dinein` (`id`, `user_id`, `seats`, `reservation_date`, `Name`, `Phone`, `Email`, `status`) VALUES
(9, 131, 3, '2024-05-26', 'ali', 2323232, 'rtrtrtrt@gmail.com', 'Reserved'),
(10, 135, 5, '2024-05-27', 'alihoumani', 7655588, 'alihoumani767@gmail.com', 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(18, 'alihoumany', 'ali', '202cb962ac59075b964b07152d234b70'),
(22, 'chefmaster', 'chef', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(36, 'Pizza', 'menu-pizza.jpg', 'Yes', 'Yes'),
(39, 'Burgers', 'menu-burger.jpg', 'Yes', 'Yes'),
(63, 'Shrimps', 'spicy-shrimp-featured-2021.jpg', 'Yes', 'Yes'),
(64, 'milkshake', 'Grilled-shrimp-12-500x500.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Role` text NOT NULL,
  `Salary` varchar(11) NOT NULL,
  `schedule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`id`, `Name`, `Role`, `Salary`, `schedule`) VALUES
(12, 'Bilal', 'employee', '400$', 'MW'),
(13, 'ali', 'waiter', '300', 'tth');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(63, 'Supreme Pizza', 'bacon, pepperoni slices, red and green bell pepper, red onion, black olives, mozzarella, Parmesan, and basil. ', 14.00, 'Food-Name-1231.jpg', 36, 'Yes', 'Yes'),
(66, 'Pepperoni Pizza', 'Pepperoni pizza is a bestseller at any pizzeria. Here’s an easy recipe and, if you use store bought dough,The olives are classic', 12.00, 'Food-Name-4055.jpg', 36, 'Yes', 'Yes'),
(67, 'MSG Smash Burgers', 'Two juicy beef patties are sandwiched with buttery melted onions and a creamy special sauce', 10.00, 'Food-Name-285.jpg', 39, 'Yes', 'Yes'),
(70, 'Classic Burger', 'The onions are dressed with vinegar, the cheese is slightly tangy Red Leicester, the bacon and pickles are so amazing', 8.00, 'Food-Name-6599.jpg', 39, 'Yes', 'Yes'),
(71, 'HONEY GARLIC SHRIMP', 'This honey garlic shrimp is undoubtedly a dinner favorite! Juicy shrimp are coated in a savory-sweet n’ garlicky glaze. ', 25.00, 'Food-Name-7507.jpg', 63, 'Yes', 'Yes'),
(72, 'Grilled Shrimp', 'Bursting with flavor, these grilled shrimp are incredibly easy to prepare and cook in virtually no time at all.', 24.00, 'Food-Name-6376.jpg', 63, 'Yes', 'Yes'),
(73, 'coffre', 'adsasas', 8.00, 'Food-Name-18.jpg', 36, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `user_id`) VALUES
(46, 'MSG Smash Burgers', 10.00, 3, 30.00, '2024-05-26 08:04:13', 'On Delivery', 'dsd', '76555444', 'alihoumani767@gmail.com', 'مقبرة الصرفند الجديدة, As Sarafand, Sarafand, Sidon District, South Governorate, Lebanon', 131),
(47, 'MSG Smash Burgers', 10.00, 1, 10.00, '2024-05-27 11:40:17', 'Ordered', 'alihoumani', '76555888', 'alihoumani767@gmail.com', 'Lebanese international university, Nabih Berri Avenue, Maslakh, Nabatieh et Tahta, Nabatieh Et Tahta, Nabatieh District, Nabatieh Governorate, 1700, Lebanon', 135);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ExpiryDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `title`, `image_name`, `Quantity`, `ExpiryDate`) VALUES
(10, 'raw beef', 'beef-tenderloin-index-657209ecd8346.jpg', 22, '12/2/2024');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(135, 'alihoumani', 'alihoumani767@gmail.com', '$2y$10$ViD9l5oDoOVM3pfyKupMZOBi9pkH75bcjmtMzuELQ/kKoh0ImnVmu', '2024-05-27 11:37:34'),
(136, 'bilal', 'alihoumani767@gmail.com', '$2y$10$REsMFTIg7SkbDgEEIHkKbubRMg1.zyNdcjdwZ1D7MBE4ehDoJGE5W', '2024-05-27 11:42:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dinein`
--
ALTER TABLE `dinein`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dinein`
--
ALTER TABLE `dinein`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
