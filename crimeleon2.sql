-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 07:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crimeleon2`
--

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `data_id` int(11) NOT NULL,
  `a_family_name` varchar(100) DEFAULT NULL,
  `a_first_name` varchar(100) DEFAULT NULL,
  `a_middle_name` varchar(100) DEFAULT NULL,
  `a_qualifier` varchar(100) DEFAULT NULL,
  `a_nickname` varchar(100) DEFAULT NULL,
  `a_citizenship` varchar(100) DEFAULT NULL,
  `a_gender` varchar(100) DEFAULT NULL,
  `a_civil_status` varchar(100) DEFAULT NULL,
  `a_date_of_birth` date DEFAULT NULL,
  `a_age` int(11) DEFAULT NULL,
  `a_place_of_birth` varchar(100) DEFAULT NULL,
  `a_home_phone` varchar(100) DEFAULT NULL,
  `a_mobile_phone` varchar(100) DEFAULT NULL,
  `a_current_address` varchar(100) DEFAULT NULL,
  `a_village_sitio_current` varchar(100) DEFAULT NULL,
  `a_barangay_current` varchar(100) DEFAULT NULL,
  `a_town_city_current` varchar(100) DEFAULT NULL,
  `a_province_current` varchar(100) DEFAULT NULL,
  `a_other_address` varchar(100) DEFAULT NULL,
  `a_village_sitio_other` varchar(100) DEFAULT NULL,
  `a_barangay_other` varchar(100) DEFAULT NULL,
  `a_town_city_other` varchar(100) DEFAULT NULL,
  `a_province_other` varchar(100) DEFAULT NULL,
  `a_highest_educational_attainment` varchar(100) DEFAULT NULL,
  `a_occupation` varchar(100) DEFAULT NULL,
  `a_id_card_presented` varchar(100) DEFAULT NULL,
  `a_email_address` varchar(100) DEFAULT NULL,
  `b_family_name` varchar(100) DEFAULT NULL,
  `b_first_name` varchar(100) DEFAULT NULL,
  `b_middle_name` varchar(100) DEFAULT NULL,
  `b_qualifier` varchar(100) DEFAULT NULL,
  `b_nickname` varchar(100) DEFAULT NULL,
  `b_citizenship` varchar(100) DEFAULT NULL,
  `b_gender` varchar(100) DEFAULT NULL,
  `b_civil_status` varchar(100) DEFAULT NULL,
  `b_date_of_birth` date DEFAULT NULL,
  `b_age` int(11) DEFAULT NULL,
  `b_place_of_birth` varchar(100) DEFAULT NULL,
  `b_home_phone` varchar(100) DEFAULT NULL,
  `b_mobile_phone` varchar(100) DEFAULT NULL,
  `b_current_address` varchar(100) DEFAULT NULL,
  `b_village_sitio_current` varchar(100) DEFAULT NULL,
  `b_barangay_current` varchar(100) DEFAULT NULL,
  `b_town_city_current` varchar(100) DEFAULT NULL,
  `b_province_current` varchar(100) DEFAULT NULL,
  `b_other_address` varchar(100) DEFAULT NULL,
  `b_village_sitio_other` varchar(100) DEFAULT NULL,
  `b_barangay_other` varchar(100) DEFAULT NULL,
  `b_town_city_other` varchar(100) DEFAULT NULL,
  `b_province_other` varchar(100) DEFAULT NULL,
  `b_highest_educational_attainment` varchar(100) DEFAULT NULL,
  `b_occupation` varchar(100) DEFAULT NULL,
  `b_id_card_presented` varchar(100) DEFAULT NULL,
  `b_email_address` varchar(100) DEFAULT NULL,
  `b_rank` varchar(100) DEFAULT NULL,
  `b_unit_assignment` varchar(100) DEFAULT NULL,
  `b_group_affiliation` varchar(100) DEFAULT NULL,
  `b_criminal_record` varchar(100) DEFAULT NULL,
  `b_status_of_previous_case` varchar(100) DEFAULT NULL,
  `b_height` varchar(100) DEFAULT NULL,
  `b_weight` varchar(100) DEFAULT NULL,
  `b_built` varchar(100) DEFAULT NULL,
  `b_color_of_eyes` varchar(100) DEFAULT NULL,
  `b_description_of_eyes` varchar(100) DEFAULT NULL,
  `b_color_of_hair` varchar(100) DEFAULT NULL,
  `b_description_of_hair` varchar(100) DEFAULT NULL,
  `b_guardian_name` varchar(100) DEFAULT NULL,
  `b_guardian_address` varchar(100) DEFAULT NULL,
  `b_guardian_home_phone` varchar(100) DEFAULT NULL,
  `b_guardian_mobile_phone` varchar(100) DEFAULT NULL,
  `c_family_name` varchar(100) DEFAULT NULL,
  `c_first_name` varchar(100) DEFAULT NULL,
  `c_middle_name` varchar(100) DEFAULT NULL,
  `c_qualifier` varchar(100) DEFAULT NULL,
  `c_nickname` varchar(100) DEFAULT NULL,
  `c_citizenship` varchar(100) DEFAULT NULL,
  `c_gender` varchar(100) DEFAULT NULL,
  `c_civil_status` varchar(100) DEFAULT NULL,
  `c_date_of_birth` date DEFAULT NULL,
  `c_age` int(11) DEFAULT NULL,
  `c_place_of_birth` varchar(100) DEFAULT NULL,
  `c_home_phone` varchar(100) DEFAULT NULL,
  `c_mobile_phone` varchar(100) DEFAULT NULL,
  `c_current_address` varchar(100) DEFAULT NULL,
  `c_village_sitio_current` varchar(100) DEFAULT NULL,
  `c_barangay_current` varchar(100) DEFAULT NULL,
  `c_town_city_current` varchar(100) DEFAULT NULL,
  `c_province_current` varchar(100) DEFAULT NULL,
  `c_other_address` varchar(100) DEFAULT NULL,
  `c_village_sitio_other` varchar(100) DEFAULT NULL,
  `c_barangay_other` varchar(100) DEFAULT NULL,
  `c_town_city_other` varchar(100) DEFAULT NULL,
  `c_province_other` varchar(100) DEFAULT NULL,
  `c_highest_educational_attainment` varchar(100) DEFAULT NULL,
  `c_occupation` varchar(100) DEFAULT NULL,
  `c_id_card_presented` varchar(100) DEFAULT NULL,
  `c_email_address` varchar(100) DEFAULT NULL,
  `type_of_incident` varchar(100) DEFAULT NULL,
  `datetime_of_incident` datetime DEFAULT NULL,
  `datetime_reported` datetime DEFAULT NULL,
  `place_of_incident` varchar(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  `narrative` text DEFAULT NULL,
  `administering_officer` varchar(100) DEFAULT NULL,
  `rank_name_of_desk_officer` varchar(100) DEFAULT NULL,
  `blotter_number` varchar(50) DEFAULT NULL,
  `police_station_name` varchar(100) DEFAULT NULL,
  `investigator_on_case` varchar(100) DEFAULT NULL,
  `chief_head_of_office` varchar(100) DEFAULT NULL,
  `latitude` decimal(11,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `places` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`data_id`, `a_family_name`, `a_first_name`, `a_middle_name`, `a_qualifier`, `a_nickname`, `a_citizenship`, `a_gender`, `a_civil_status`, `a_date_of_birth`, `a_age`, `a_place_of_birth`, `a_home_phone`, `a_mobile_phone`, `a_current_address`, `a_village_sitio_current`, `a_barangay_current`, `a_town_city_current`, `a_province_current`, `a_other_address`, `a_village_sitio_other`, `a_barangay_other`, `a_town_city_other`, `a_province_other`, `a_highest_educational_attainment`, `a_occupation`, `a_id_card_presented`, `a_email_address`, `b_family_name`, `b_first_name`, `b_middle_name`, `b_qualifier`, `b_nickname`, `b_citizenship`, `b_gender`, `b_civil_status`, `b_date_of_birth`, `b_age`, `b_place_of_birth`, `b_home_phone`, `b_mobile_phone`, `b_current_address`, `b_village_sitio_current`, `b_barangay_current`, `b_town_city_current`, `b_province_current`, `b_other_address`, `b_village_sitio_other`, `b_barangay_other`, `b_town_city_other`, `b_province_other`, `b_highest_educational_attainment`, `b_occupation`, `b_id_card_presented`, `b_email_address`, `b_rank`, `b_unit_assignment`, `b_group_affiliation`, `b_criminal_record`, `b_status_of_previous_case`, `b_height`, `b_weight`, `b_built`, `b_color_of_eyes`, `b_description_of_eyes`, `b_color_of_hair`, `b_description_of_hair`, `b_guardian_name`, `b_guardian_address`, `b_guardian_home_phone`, `b_guardian_mobile_phone`, `c_family_name`, `c_first_name`, `c_middle_name`, `c_qualifier`, `c_nickname`, `c_citizenship`, `c_gender`, `c_civil_status`, `c_date_of_birth`, `c_age`, `c_place_of_birth`, `c_home_phone`, `c_mobile_phone`, `c_current_address`, `c_village_sitio_current`, `c_barangay_current`, `c_town_city_current`, `c_province_current`, `c_other_address`, `c_village_sitio_other`, `c_barangay_other`, `c_town_city_other`, `c_province_other`, `c_highest_educational_attainment`, `c_occupation`, `c_id_card_presented`, `c_email_address`, `type_of_incident`, `datetime_of_incident`, `datetime_reported`, `place_of_incident`, `status`, `narrative`, `administering_officer`, `rank_name_of_desk_officer`, `blotter_number`, `police_station_name`, `investigator_on_case`, `chief_head_of_office`, `latitude`, `longitude`, `places`) VALUES
(8, 'idk', '', '', '', 'bro', '', '', '', '0000-00-00', 0, '', '', '0', '0', '', '', '0', '0', '', '', '0', '0', '', '', '0', '0', '', '', '0', '0', '', '', '0', '0', '', '0000-00-00', 0, '0', '', '0', '0', '0', '', '0', '0', '', '', '0', '0', '', '', '0', '0', '', '', '0', '0', '', '', '0', '0', '', '', '0', '0', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '0000-00-00', 0, '', '', '0', '0', '', '', '0', '0', '', '', '0', '0', '', '', '0', '0', '', 'idk2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Lapaz', 'Approved', 'bol', '', '', '', '', '', '', '10.72082628', '0.00000000', ''),
(9, 'dan', '', '', '', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'arguelles', 'clethjude', 'gabucay', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'Approved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(10, 'daniel', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'Declined', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(11, '', '', '', '', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jude', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'tuk-ap', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'Approved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(12, 'demaala', 'daniel2', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'arguelles', 'jude', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'consuelo', 'ariel', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'murder', '2023-11-14 14:23:00', '2023-11-14 15:24:00', 'lapaz', 'Approved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(13, 'zed ', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'akali', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'rape', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'Pending', 'aaaaa', '', '', '', '', '', '', NULL, NULL, ''),
(14, 'zed ', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'akali', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'rape', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'Pending', 'aaaaa', '', '', '', '', '', '', NULL, NULL, ''),
(15, 'hello', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'what ', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'the', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'damn', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'Pending', '', '', '', '', '', '', '', NULL, NULL, ''),
(16, 'hello', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'what ', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', 'the', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'damn', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'Pending', '', '', '', '', '', '', '', '0.00000000', NULL, ''),
(28, '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '22132', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Pending', '', '', '', '', '', '', '', '10.71845969', '122.58091330', '1231312'),
(29, 'dan', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Approved', '', '', '', '', '', '', '', '10.71692058', '122.57694361', 'batchoy'),
(30, '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Pending', '', '', '', '', '', '', '', '10.71694965', '122.57678809', 'batchoy2'),
(32, '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Pending', '', '', '', '', '', '', '', '10.71705140', '122.57671548', 'batchoy3 '),
(35, '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Pending', '', '', '', '', '', '', '', '10.71668195', '122.57680022', 'batchoy4'),
(39, '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Declined', '', '', '', '', '', '', '', '10.71901284', '122.57880054', 'Ninja Van'),
(46, '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Declined', '', '', '', '', '', '', '', '10.72117029', '122.57962933', 'qqq'),
(47, 'dan', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Approved', '', '', '', '', '', '', '', '10.71565032', '122.56577667', 'isatu'),
(50, '1', '1', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'a', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Approved', '', '', '', '', '', '', '', '10.71753080', '122.57843575', 'Ticud Barangay Hall '),
(51, '2', '2', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '2', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Approved', '', '', '', '', '', '', '', '10.71748703', '122.57834820', 'Ticud Elementary School '),
(52, 'qw', 'qw', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'qw', 'qw', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'murder', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Approved', '', '', '', '', '', '', '', '10.71659786', '122.57877907', 'WMM Building & Supplies'),
(53, '21', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'murder', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Approved', '', '', '', '', '', '', '', '10.71683522', '122.57837880', 'Reggie\'s Store '),
(54, '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'murder', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'Approved', '', '', '', '', '', '', '', '10.71792156', '122.57867754', 'Tintin Eatery'),
(55, 'OP', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 'single', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'MURDER', 'Pending', '', '', '', '', '', '', '', '10.71561718', '122.56640004', 'Near ISAT U');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `licensed_idno` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `gov_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `badge_no` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `address`, `contact`, `licensed_idno`, `position`, `gov_email`, `password`, `badge_no`, `created_at`) VALUES
(21, 'daniel', 'admin', 'demaala', 'tapaz', '22193089213', '456789', 'idk', 'daniel@admin.pnp.gov.ph', '$2y$10$qbIb9XLN9Pz2uZ0FAIU5oOySxiZIx3MDRNPlfhT2aHRPdUk09CjgG', '019213', '2023-11-06 07:33:29'),
(22, 'daniel', 'police', 'demaala', 'tapaz', '09284109832', '321890321', 'boss', 'daniel@police.pnp.gov.ph', '$2y$10$lBPR9nsHgwxwLuY0.X9wHO/z2Lp9pcGDGVpUWyR4YM8Q1NgLz2.8u', '678021', '2023-11-06 07:35:37'),
(25, 'daniel', 'police', 'demaala', 'tapaz', '09284109832', '321890321', 'boss', 'daniel@investigator.pnp.gov.ph', '$2y$10$OGOi3Ru9fmVrN2vTpATU9.eWEleh1BoPDWGxQvBbJlV091o5VRF/i', '67802121', '2023-11-06 07:38:53'),
(26, 'rhea', 'police', 'libo-on', 'japann', '9374019', '32137123', 'mafia boss', 'rhea@police.pnp.gov.ph', '$2y$10$Xu75hD/6NDRIC2Mrizdpaekm.RILkBO2o7W1Gr2hCld7Fq4Ksk.VK', '021305', '2023-11-06 07:40:09'),
(27, 'Ariel', 'M.', 'Consuelo', 'Maasin', '090621312312', '1212', 'cat', 'ariel@police.pnp.gov.ph', '$2y$10$wMpqBZnBf1Mm4zf0Nb3tSeBsUFu.hgp.d4FeB1fpfaIkh2./xUE8a', '0291', '2023-11-10 05:59:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `government_email` (`gov_email`),
  ADD UNIQUE KEY `badge_number` (`badge_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
