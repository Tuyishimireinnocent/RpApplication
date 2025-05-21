-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 03:38 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl_applications`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `assessment_id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `assessment_date` date DEFAULT NULL,
  `assessor_name` varchar(100) DEFAULT NULL,
  `result` enum('Pending','Passed','Failed') DEFAULT 'Pending',
  `certificate_issued` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `registration_number` varchar(20) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `nationality` enum('Rwandan','Resident') NOT NULL,
  `national_id_passport` varchar(255) NOT NULL,
  `field_of_assessment` enum('Masonry','Domestic Electricity Installation') NOT NULL,
  `years_experience` int(11) NOT NULL CHECK (`years_experience` >= 2),
  `employer_name` varchar(255) NOT NULL,
  `trade_union_member` enum('Yes','No') NOT NULL,
  `trade_union_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `registration_number`, `full_name`, `date_of_birth`, `nationality`, `national_id_passport`, `field_of_assessment`, `years_experience`, `employer_name`, `trade_union_member`, `trade_union_name`, `phone`, `email`, `submission_date`) VALUES
(49, '25VS00001', 'TUYISHIMIRE Innocent', '2025-05-02', 'Resident', '1234556789098761', 'Domestic Electricity Installation', 2, 'IPRCKIGALI', 'No', '', '0791475619', 'tuyishimireinnocent2002@gmail.Com', '2025-05-21 10:22:57'),
(50, '25VS00002', 'jean paul uwihoreye', '2025-05-01', 'Resident', '1234556789091261', 'Domestic Electricity Installation', 2, 'nsnffjrnf', 'No', '', '0791475614', 'uyuwe60@gmail.vom', '2025-05-21 10:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `id_document_path` varchar(255) NOT NULL,
  `recommendation_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `candidate_id`, `id_document_path`, `recommendation_path`) VALUES
(10, 49, 'uploads/1747822977_id_f33f4c3194708210a2fe4430333325bd.png', 'uploads/1747822977_rec_cc66b445555c1db61d3507cd3745016f.pdf'),
(11, 50, 'uploads/1747824301_id_31069ec0c76ce30239cbbc9d6a300b65.png', 'uploads/1747824301_rec_42d8a612801943ec6504a576acb77afe.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`assessment_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `national_id_passport` (`national_id_passport`),
  ADD UNIQUE KEY `registration_number` (`registration_number`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`candidate_id`) ON DELETE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`candidate_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
