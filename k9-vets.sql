-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 06:09 PM
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
-- Database: `k9-vets`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `A_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`A_id`, `name`, `email`, `password`) VALUES
(1, 'Test Admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `problem` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `mobile`, `date`, `time`, `problem`, `created_at`) VALUES
(1, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-30', '15:30:00', 'test', '2024-08-24 06:07:16'),
(3, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-30', '17:00:00', 'test', '2024-08-24 07:38:19'),
(4, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-30', '17:00:00', 'test', '2024-08-24 07:39:46'),
(5, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-09-06', '16:30:00', 'test', '2024-08-24 07:40:01'),
(6, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-28', '16:00:00', 'test', '2024-08-24 07:41:09'),
(7, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-29', '16:00:00', '111', '2024-08-24 07:43:55'),
(8, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-29', '17:00:00', '1111', '2024-08-24 07:47:09'),
(9, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-29', '17:00:00', '1111', '2024-08-24 07:47:23'),
(10, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-29', '17:00:00', '1111', '2024-08-24 07:47:28'),
(11, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-09-06', '16:30:00', 'qqq', '2024-08-24 07:50:15'),
(12, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-31', '16:00:00', '1111111', '2024-08-24 07:52:55'),
(13, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-29', '10:30:00', '111111', '2024-08-24 07:54:35'),
(14, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-28', '15:00:00', '1234', '2024-08-24 07:58:09'),
(16, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-29', '16:00:00', 'ibiubiub', '2024-08-24 09:24:48'),
(18, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-27', '16:30:00', 'test', '2024-08-25 12:47:20'),
(19, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-27', '15:00:00', '11', '2024-08-25 12:50:58'),
(21, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-26', '11:30:00', '11', '2024-08-25 12:52:25'),
(22, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-26', '14:30:00', '//', '2024-08-25 12:55:16'),
(23, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-27', '11:30:00', '11', '2024-08-25 12:56:25'),
(24, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-27', '09:30:00', '44', '2024-08-25 12:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Kasun Rathnayake', 'madkasunmax@gmail.com', 'test', 'test', '2024-08-25 14:20:34'),
(2, 'Kasun Rathnayake', 'madkasunmax@gmail.com', 'qq', 'qq', '2024-08-25 14:21:41'),
(3, 'Kasun Rathnayake', 'madkasunmax@gmail.com', 'qq', 'qq', '2024-08-25 14:22:47'),
(4, 'Kasun Rathnayake', 'madkasunmax@gmail.com', 'qq', 'sss', '2024-08-25 14:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `total_price`, `created_at`) VALUES
(1, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 1720500.00, '2024-08-25 07:16:49'),
(2, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 1720500.00, '2024-08-25 07:16:51'),
(3, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 1720500.00, '2024-08-25 07:16:53'),
(4, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 1720500.00, '2024-08-25 07:16:56'),
(5, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 1720500.00, '2024-08-25 07:16:58'),
(6, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 1720500.00, '2024-08-25 07:17:13'),
(7, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 1720500.00, '2024-08-25 07:17:19'),
(8, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 5500.00, '2024-08-25 07:19:48'),
(9, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 40500.00, '2024-08-25 07:22:48'),
(10, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 141500.00, '2024-08-25 07:24:57'),
(11, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 68000.00, '2024-08-25 09:36:16'),
(12, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 109000.00, '2024-08-25 09:40:35'),
(13, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 109000.00, '2024-08-25 09:40:44'),
(14, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 109000.00, '2024-08-25 09:42:22'),
(15, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 109000.00, '2024-08-25 09:45:31'),
(16, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 109000.00, '2024-08-25 09:47:51'),
(17, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 109000.00, '2024-08-25 09:51:57'),
(18, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 109000.00, '2024-08-25 09:52:48'),
(19, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 144000.00, '2024-08-25 09:53:04'),
(20, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 179000.00, '2024-08-25 09:53:59'),
(21, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 179000.00, '2024-08-25 09:56:50'),
(22, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 179000.00, '2024-08-25 10:01:12'),
(23, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 179000.00, '2024-08-25 10:01:29'),
(24, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 179000.00, '2024-08-25 10:05:47'),
(25, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 179000.00, '2024-08-25 10:06:02'),
(26, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 179000.00, '2024-08-25 10:08:14'),
(27, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 179000.00, '2024-08-25 10:08:51'),
(28, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 179000.00, '2024-08-25 10:09:03'),
(29, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 179000.00, '2024-08-25 10:10:58'),
(30, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 73500.00, '2024-08-25 13:02:45'),
(31, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '550/36 A\r\nRanawirugama ,palandagoda', 145000.00, '2024-08-25 13:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `product_price`, `quantity`) VALUES
(1, 1, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(2, 1, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 14),
(3, 1, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 12),
(4, 1, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 36),
(5, 2, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(6, 2, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 14),
(7, 2, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 12),
(8, 2, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 36),
(9, 3, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(10, 3, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 14),
(11, 3, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 12),
(12, 3, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 36),
(13, 4, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(14, 4, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 14),
(15, 4, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 12),
(16, 4, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 36),
(17, 5, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(18, 5, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 14),
(19, 5, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 12),
(20, 5, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 36),
(21, 6, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(22, 6, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 14),
(23, 6, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 12),
(24, 6, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 36),
(25, 7, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(26, 7, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 14),
(27, 7, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 12),
(28, 7, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 36),
(29, 8, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(30, 9, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(31, 9, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 1),
(32, 10, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(33, 10, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 2),
(34, 10, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 2),
(35, 11, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 1),
(36, 11, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(37, 12, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 1),
(38, 12, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(39, 12, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(40, 12, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(41, 13, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 1),
(42, 13, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(43, 13, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(44, 13, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(45, 14, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 1),
(46, 14, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(47, 14, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(48, 14, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(49, 15, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 1),
(50, 15, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(51, 15, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(52, 15, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(53, 16, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 1),
(54, 16, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(55, 16, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(56, 16, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(57, 17, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 1),
(58, 17, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(59, 17, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(60, 17, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(61, 18, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 1),
(62, 18, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(63, 18, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(64, 18, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(65, 19, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 2),
(66, 19, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(67, 19, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(68, 19, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(69, 20, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 3),
(70, 20, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(71, 20, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(72, 20, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(73, 21, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 3),
(74, 21, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(75, 21, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(76, 21, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(77, 22, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 3),
(78, 22, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(79, 22, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(80, 22, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(81, 23, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 3),
(82, 23, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(83, 23, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(84, 23, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(85, 24, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 3),
(86, 24, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(87, 24, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(88, 24, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(89, 25, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 3),
(90, 25, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(91, 25, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(92, 25, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(93, 26, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 3),
(94, 26, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(95, 26, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(96, 26, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(97, 27, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 3),
(98, 27, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(99, 27, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(100, 27, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(101, 28, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 3),
(102, 28, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(103, 28, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(104, 28, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(105, 29, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 3),
(106, 29, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(107, 29, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(108, 29, 'Blackhawk Puppy - Lamb and Rice 20Kg', 35500.00, 1),
(109, 30, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 1),
(110, 30, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 1),
(111, 30, 'Royal Canin Maxi Puppy - 15KG', 33000.00, 1),
(112, 31, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 5500.00, 20),
(113, 31, 'Blackhawk Adult - Lamb and Rice 20kg', 35000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `url`) VALUES
(1, 'Advanced Anesthesia ', 'When absolutely required, PetVet will suggest companion animals undergo surgery. Our experience, both as pet owners and clinicians, has taught us that suggesting it, even as a last resort, is met with some degree of reluctance. Such concerns are legitimate; older, injectable anaesthetics come with some risk, even though such risks can be minimized.\n\nTo address such concerns, PetVet uses gas anesthesia (known as inhalant anaesthesia) for all surgical procedures. Inhalant anesthesia is safer for many reasons:\n\nThere is a breathing tube going directly into the animal’s lungs, carrying oxygen throughout, ensuring that your pet has a continuous air supply\nThe gas anaesthetic, which is mixed into this air supply, rapidly enters the pet providing quick comfortable sleep\nIt ensures precise control\nThe gas can be rapidly removed from the body as soon as it is turned off, allowing for immediate recovery\nInhalant anesthetic is comparatively more expensive but, as pet owners ourselves, we ', 'img_anesthetics.jpg'),
(3, 'Companion Animal Surgery', 'K9-Vets offers all surgery procedures from the standard to more complex operations such as ophthalmic and orthopedic surgeries.\r\n\r\nSurgeries are conducted in a sterile, fully equipped, and state-of-the-art theatre. Our highly qualified team of surgeons and nursing staff has many years of experience – both internationally and locally.\r\n\r\nOur primary focus is on safety and quality. We use modern sedatives, pain medication and anesthetics such as isoflurane gas to ensure the maximum comfort and safety of your pet during these procedures.', 'unnamed.jpg'),
(4, 'Companion Animal Medical Services', 'From the very beginning of operations,s founder-doctors have always sought to raise the bar on quality of veterinarian care in Sri Lanka. PetVet’s team of veterinarians combine a strong fundamental grasp of general medicine with areas of special interest.\r\n\r\nOur approach is to focus on obtaining accurate and actionable diagnosis which, in turn, allows us to plan the appropriate course of treatment for your pet.\r\n\r\nSpecialist areas such as cardiology, dermatology, dentistry, feline medicine require hours of additional training – PetVet encourages our vets to pursue their areas of interest through extensive training at local and international\r\neducation centres that specialize in these areas.\r\n\r\nAs such, we expect to have a strong core of fully qualified specialists in the near future – this will ensure that our customers and their pets continue to turn to us to provide competence, guidance, and compassion when they need it most.', 'com.jpg'),
(5, 'Laboratory Services', 'K9-Vets state-of-the-art laboratory is operated by staff who bring over 20 years experience with animals. This ensures accurate, precise laboratory results at all times. Our clinicians work as teams with our lab technicians to make sure these results are converted to a good diagnosis.\r\n\r\nOur vets combine understanding of lab results, with proper physical examination of pets, and transparent discussions with you, the pet owner/parent, to arrive at the correct diagnosis and course of treatment.\r\n\r\n', 'lav.jpeg'),
(6, 'Pet Salon', 'Good grooming is just as important for your pet as it is for all of us. To make this convenient, and pleasure for your pet, our specially trained teams are available to keep your pet well groomed and looking fine at all times.', 'salon.jpg'),
(7, 'Dental Services', 'Dental pain can be as uncomfortable and painful for animals as it would be for us humans.\r\n\r\nK9_vets is a pioneer in animal dentistry, and have strived from the outset to highlight its importance to overall quality of an animal’s life. We encourage our customers to bring their companion animals in for regular annual check-ups to ensure their dental health isn’t ignored.\r\n\r\nSome animals can get oral disease as early as the second year of their lives. If you suspect a problem, it’s best to be proactive and bring your animal family member for a checkup at the earliest.\r\n\r\nRegular and proactive dental hygiene and care of animal companions can make a massive difference in ensuring strong teeth – avoiding tooth extraction procedures much later in their lives. More importantly, their quality of life will be very positive and pain-free.\r\n', 'dental.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `description`, `price`, `url`) VALUES
(1, 'Pedigree Chicken & Vegetables 3Kg - Adult Dog', 'Product Information Pedigree Chicken & Vegetables 3Kg - Adult Dog PEDIGREE® Adult Complete Nutrition Roasted Chicken, Rice & Vegetable Flavor is formulated to meet the nutritional levels established by the AAFCO Dog Food Nutrient Profiles for maintenance.', 5500, 'PedigreeChicken .webp'),
(2, 'Blackhawk Adult - Lamb and Rice 20kg', 'Product Information BlackHawk Adult - Lamb & Rice BlackHawk Lamb & Rice is a high quality, Australian made, holistic diet for adult dogs. This high quality dry food contains functional ingredients from nature with known beneficial properties like blueberries, dandelion...', 35000, 'backhawk.webp'),
(3, 'Royal Canin Maxi Puppy - 15KG', 'Product Information Royal Canin Maxi Puppy - 15Kg Complete feed for dogs - for large breed puppies (adult weight from 26 to 44 kg) - up to 15 months old. ROYAL CANIN® Maxi Puppy is specially formulated with the nutritional needs...', 33000, 'royalpuppy.jpg'),
(5, 'Blackhawk Puppy - Lamb and Rice 20Kg', 'Product Information Black Hawk Original Puppy Lamb & Rice BlackHawk Puppy Lamb & Rice is a high quality, Australian made, holistic diet packed with nutrition for growing puppies. This high quality dry puppy food contains functional ingredients from nature with...', 35500, 'blackhawk.webp'),
(6, 'Whiskas Tuna & White Fish 85g - Adult Cat', 'WHISKAS® Food for Cats Whitefish and Tuna Dinner is formulated to meet the nutritional levels established by the AAFCO cat food nutrient profiles for growth and maintenance.\r\nNew & Improved Whiskas : 100% complete and balanced meal for Cat’s vital system-Adult & Kitten.\r\nHigh Calcium, Phosphorus, Vitamin, Mineral, Taurine, Vitamin E and Protein', 400, 'Tuna_Whitefish_1024x1024.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
