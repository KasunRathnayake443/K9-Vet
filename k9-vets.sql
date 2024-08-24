-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 10:16 AM
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
(2, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-25', '16:30:00', 'test', '2024-08-24 07:37:54'),
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
(15, 'Kasun Rathnayake', 'madkasunmax@gmail.com', '0718948284', '2024-08-26', '16:00:00', '15161684684', '2024-08-24 08:13:50');

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
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
