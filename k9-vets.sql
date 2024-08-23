-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 06:09 PM
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
(1, 'Advanced Anesthesia ', 'When absolutely required, PetVet will suggest companion animals undergo surgery. Our experience, both as pet owners and clinicians, has taught us that suggesting it, even as a last resort, is met with some degree of reluctance. Such concerns are legitimate; older, injectable anaesthetics come with some risk, even though such risks can be minimized.\r\n\r\nTo address such concerns, PetVet uses gas anesthesia (known as inhalant anaesthesia) for all surgical procedures. Inhalant anesthesia is safer for many reasons:\r\n\r\nThere is a breathing tube going directly into the animal’s lungs, carrying oxygen throughout, ensuring that your pet has a continuous air supply\r\nThe gas anaesthetic, which is mixed into this air supply, rapidly enters the pet providing quick comfortable sleep\r\nIt ensures precise control\r\nThe gas can be rapidly removed from the body as soon as it is turned off, allowing for immediate recovery\r\nInhalant anesthetic is comparatively more expensive but, as pet owners ourselves, we ', 'img_anesthetics.jpg');

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
(5, 'Blackhawk Puppy - Lamb and Rice 20Kg', 'Product Information Black Hawk Original Puppy Lamb & Rice BlackHawk Puppy Lamb & Rice is a high quality, Australian made, holistic diet packed with nutrition for growing puppies. This high quality dry puppy food contains functional ingredients from nature with...', 35500, 'blackhawk.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`A_id`);

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
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
