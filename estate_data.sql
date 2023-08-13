-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2023 at 05:21 PM
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
-- Database: `estate_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `name`, `email`, `phone`, `message`, `submission_date`) VALUES
(1, 'Hai Dang', 'dangtran862000@gmail.com', '0862006806', 'Hai Dang qua giỏi', '2023-08-13 15:08:42'),
(2, 'Hai Dang', 'dangtran862000@gmail.com', '0862006806', 'Hai Dang qua giỏi', '2023-08-13 15:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `picture_filename` varchar(255) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `feedback`, `picture_filename`, `submission_date`) VALUES
(1, 'John Doe', 'Your team provided exceptional service. I\'m truly grateful for the dedication and effort put into helping me find my dream home. The properties you offered were all fantastic, and the agents were knowledgeable and attentive. My experience has been nothing but positive. Thank you!', 'client.jpg', '2023-08-13 14:02:31'),
(2, 'Jane Smith', 'I want to express my heartfelt thanks for the outstanding service I received from your agency. The properties I visited were all impressive and suited my needs perfectly. Your agents were patient and guided me through the entire process. The attention to detail and professionalism were top-notch. I highly recommend your agency to anyone seeking quality properties.', 'client1.jpg', '2023-08-13 14:02:31'),
(3, 'Mike Johnson', 'I\'m pleased to share my positive experience with your agency. The level of commitment your team demonstrated was exceptional. The properties I viewed were all well-maintained and met my requirements. Your agents were friendly and took the time to understand my preferences. I appreciate the personalized service and attention to detail.', 'client2.jpg', '2023-08-13 14:02:31'),
(4, 'Emily Brown', 'I wanted to extend my gratitude for the wonderful experience I had with your agency. The properties I explored were all impressive and showcased a range of options. Your agents were knowledgeable and patient, addressing all my queries and concerns. The professionalism and transparency during the entire process made me feel confident in my choices.', 'client3.jpg', '2023-08-13 14:02:31'),
(5, 'David Lee', 'I wanted to express my appreciation for the exceptional service provided by your agency. The properties I viewed were all of high quality and matched my criteria. Your agents were attentive, ensuring that every detail was taken care of. I was thoroughly impressed by the commitment to customer satisfaction and the personalized approach.', 'client4.jpg', '2023-08-13 14:02:31'),
(6, 'Sarah Miller', 'I\'m writing to thank your agency for the seamless and efficient service I received. The properties I visited were all stunning and well-maintained. Your agents were approachable and guided me through the entire process, making it stress-free. I\'m delighted with my new property and the support I received.', 'client5.jpg', '2023-08-13 14:02:31'),
(7, 'Alex Davis', 'I wanted to express my gratitude for the exceptional service provided by your team. The properties I explored exceeded my expectations in terms of quality and variety. Your agents were friendly and patient, ensuring I had all the information I needed. I\'m thrilled with my new home and the excellent assistance I received.', 'client6.jpg', '2023-08-13 14:02:31'),
(8, 'Laura Wilson', 'I\'m writing to commend your agency for the outstanding service I received. The properties I visited were all thoughtfully curated and met my preferences. Your agents were not only professional but also attentive to my needs. The level of care and dedication displayed by your team is truly commendable.', 'client7.jpg', '2023-08-13 14:02:31'),
(9, 'Chris Taylor', 'I\'m delighted to share my positive experience with your agency. The properties I explored were all top-notch and aligned with my preferences. Your agents were patient and provided valuable insights, helping me make informed decisions. I\'m grateful for the wonderful support I received throughout the process.', 'client8.jpg', '2023-08-13 14:02:31'),
(10, 'Sophia Clark', 'I wanted to express my appreciation for the excellent service provided by your agency. The properties I viewed were all impressive and of high quality. Your agents were professional and dedicated, making the entire process smooth and enjoyable. I\'m extremely satisfied with my new home and the assistance I received.', 'client9.jpg', '2023-08-13 14:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`username`, `password`, `email`) VALUES
('haidang', '$2y$10$4ygX5aKlv5mD9GOeUfwgb.hE1dNVz4CzGUeoJ8sBAsws9Q5WNzzyG', 'dangtran862000@gmail.com'),
('admin', '$2y$10$CRmKzj7iJ61le/FhHB.WZ.3P26ev0PoOeLbtUTvVMVqk1T15ukMve', 'dangtran862000@gmail.com'),
('sdcbklb', '$2y$10$7JW1bR64Zt0j70yPp3CJ7O1k8ciNwyoeRF0HKXX6lqRnaUdxL5TEO', 'dangtran862000@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
