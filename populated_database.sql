-- phpMyAdmin SQL Dump
-- version 5.2.2deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2025 at 03:36 PM
-- Server version: 10.11.14-MariaDB-deb12
-- PHP Version: 8.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigrig`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_company`
--

CREATE TABLE `about_company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_picture` varchar(255) NOT NULL,
  `history_title` varchar(255) NOT NULL,
  `training_hours` float DEFAULT NULL,
  `company_history` text NOT NULL,
  `mission_statement` text NOT NULL,
  `students_count` int(11) DEFAULT NULL,
  `years_of_existence` int(11) DEFAULT NULL,
  `instructors_count` int(11) DEFAULT NULL,
  `pass_rate` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_company`
--

INSERT INTO `about_company` (`id`, `banner_title`, `banner_picture`, `history_title`, `training_hours`, `company_history`, `mission_statement`, `students_count`, `years_of_existence`, `instructors_count`, `pass_rate`, `created_at`, `updated_at`) VALUES
(1, 'About Our Driving School', 'banners/gQD9shYdL4rMwaXY1BfYserc6aLX6FTOVMu6VH9b.jpg', 'Driving Excellence: The BigRig Advantage', 86.5, '<p>At BigRig International Truck Driving Academy, we are dedicated to empowering aspiring professional drivers with the skills and knowledge needed to excel in the transportation industry. Our mission is to deliver high-quality, comprehensive training tailored to the needs of both beginners and experienced drivers seeking to upgrade their qualifications. With a state-of-the-art fleet of trucks and highly experienced instructors, we provide hands-on learning in a supportive and safe environment. Our curriculum emphasizes safety, technical proficiency, and real-world applications, ensuring our graduates are confident and road-ready. We take pride in fostering a community where students not only achieve their driving goals but also build lasting careers. Whether you&rsquo;re preparing for your commercial driver&rsquo;s license (CDL) or aiming to specialize in advanced operations, BigRig Driving School is your partner in professional growth. Join us to embark on a transformative journey and become a trusted name in the trucking industry. At BigRig Driving School, your success is our destination!</p>', '<p>BigRig International Truck Driving Academy helps aspiring drivers gain the skills, confidence, and knowledge needed for professional driving. With expert instructors and a safe learning environment, we train responsible drivers to ensure safer roads and a better transportation industry.</p>', 1752, 12, 27, 92.5, NULL, '2025-09-18 14:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `year`, `description`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Pioneering Road Safety Initiative', '2024', '<p>In 2024, <strong>BigRig International Truck Driving Academy&nbsp;</strong>proudly launched its Pioneering Road Safety Initiative, a program designed to enhance driver awareness and reduce road accidents nationwide. The initiative focused on comprehensive safety workshops, simulated driving scenarios, and hands-on training sessions led by industry experts. Over the course of the year, we successfully trained over 1,000 participants, equipping them with advanced safety strategies and fostering a culture of responsibility on the road. This milestone reflects our unwavering dedication to creating safer roads for everyone.</p>', 'achievements/gSwq6WoHYHCFZwSdX18AeHhK7wQ5e8FKW4gOxX6C.jpg', '2025-03-25 11:17:43', '2025-09-18 14:15:13'),
(2, 'Award of Excellence', '2025', '<p>In 2022, <strong>BigRig International Truck Driving Academy</strong> proudly launched its Pioneering Road Safety Initiative, a program designed to enhance driver awareness and reduce road accidents nationwide. The initiative focused on comprehensive safety workshops, simulated driving scenarios, and hands-on training sessions led by industry experts. Over the course of the year, we successfully trained over 1,000 participants, equipping them with advanced safety strategies and fostering a culture of responsibility on the road. This milestone reflects our unwavering dedication to creating safer roads for everyone.</p>', 'achievements/BSOhkAshL1MgWY8Xt6gHCevIsbwh7D8iTCRVvB6A.jpg', '2025-03-25 11:18:46', '2025-09-18 14:14:38'),
(3, 'Best Truck Driving Institution', '2025', '<p>In 2025, <strong>BigRig International Truck Driving Academy</strong> proudly launched its Pioneering Road Safety Initiative, a program designed to enhance driver awareness and reduce road accidents nationwide. The initiative focused on comprehensive safety workshops, simulated driving scenarios, and hands-on training sessions led by industry experts. Over the course of the year, we successfully trained over 1,000 participants, equipping them with advanced safety strategies and fostering a culture of responsibility on the road. This milestone reflects our unwavering dedication to creating safer roads for everyone.</p>', 'achievements/aR6SZCo6omRevPJNrfsf1aoq4Sd1SEj7wonQldAp.jpg', '2025-03-25 11:19:37', '2025-09-18 14:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` enum('general','course','batch','urgent') NOT NULL,
  `priority` enum('low','medium','high') NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `publish_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcement_reads`
--

CREATE TABLE `announcement_reads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `announcement_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `read_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `type` enum('client','partner') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `logo`, `type`, `created_at`, `updated_at`) VALUES
(3, 'Federal Road Safety Corps', NULL, 'partner', '2025-04-08 21:56:45', '2025-04-08 21:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `course_materials`
--

CREATE TABLE `course_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `objective_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `uploaded_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_materials`
--

INSERT INTO `course_materials` (`id`, `objective_id`, `file_name`, `file_url`, `file_size`, `file_type`, `description`, `uploaded_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'BigRIg Road Signs.pdf', 'course_materials/EMqzHhpcHn3cay2CHXHfXpDIege2asHegOsMsaIN.pdf', NULL, NULL, NULL, NULL, '2025-09-02 09:38:03', '2025-09-02 09:38:03'),
(2, 1, 'CDL Pre-Trip Inspection.pdf', 'course_materials/uGU6LfbFC56tTkQaxQnLzP1q7Dygy6V3eaVbsN01.pdf', NULL, NULL, NULL, NULL, '2025-09-02 09:38:04', '2025-09-02 09:38:04'),
(3, 1, 'Air brake.pptx', 'course_materials/lhDvw7HR2vBf0ErLSASKpJtyg0LNhRpswbp8lyuQ.pptx', NULL, NULL, NULL, NULL, '2025-09-02 09:41:03', '2025-09-02 09:41:03'),
(4, 1, 'Defensive driving.pptx', 'course_materials/WDPSReaa4F4WDZ11wtdOBseDM2bn8sx43q2ezbGp.pptx', NULL, NULL, NULL, NULL, '2025-09-02 09:41:34', '2025-09-02 09:41:34'),
(5, 1, 'Double trailer handout.pptx', 'course_materials/31wyN9gOcsBYw29Njqe1cTRDf3QKUIPV1lmcTa4o.pptx', NULL, NULL, NULL, NULL, '2025-09-02 09:41:34', '2025-09-02 09:41:34'),
(6, 1, 'hazmat Note.pdf', 'course_materials/weu8TYaF20BFrDZgty9kbaGeHA4P3Mt62rTHXwFX.pdf', NULL, NULL, NULL, NULL, '2025-09-02 09:41:34', '2025-09-02 09:41:34'),
(7, 1, 'Road-Signs-Europe.pdf', 'course_materials/n8iKxhRWUqtZMAWHmHJgpSh3Mch6z2sBLishIQFF.pdf', NULL, NULL, NULL, NULL, '2025-09-02 09:41:34', '2025-09-02 09:41:34'),
(8, 1, 'Road signs in Nigeria.pdf', 'course_materials/KxHpMSHG1UUunpOVdUSx2d1GHaBiP5nv56mcNe2S.pdf', NULL, NULL, NULL, NULL, '2025-09-02 09:41:34', '2025-09-02 09:41:34'),
(9, 1, 'Truck driving.pptx', 'course_materials/hZkiUnfakju20wKkREsJwH8AkHyL20HJDFyISIfK.pptx', NULL, NULL, NULL, NULL, '2025-09-02 09:43:35', '2025-09-02 09:43:35'),
(10, 1, 'Truck_Driving 2.pptx', 'course_materials/4YjgPNpPqJjFCiyxb3bzOKzxnfmrXRvVVLCh0LXm.pptx', NULL, NULL, NULL, NULL, '2025-09-02 09:43:45', '2025-09-02 09:43:45'),
(11, 3, 'Air brake.pptx', 'course_materials/Bpk1LH7EWGaZNxPPEZ5R0xXBYTYax29dc7dLeg9W.pptx', NULL, NULL, NULL, NULL, '2025-09-02 09:50:08', '2025-09-02 09:50:08'),
(12, 3, 'Defensive driving.pptx', 'course_materials/JbXsCJgoAihBuuuwWNsYUIbTTZchylEx41w2QkbE.pptx', NULL, NULL, NULL, NULL, '2025-09-02 09:50:08', '2025-09-02 09:50:08'),
(13, 3, 'school bus endorsement curriculum.pptx', 'course_materials/SHisyEKvnT2cDVVfGBcLQYynO0cS5chmrQMaYdLi.pptx', NULL, NULL, NULL, NULL, '2025-09-02 09:50:08', '2025-09-02 09:50:08'),
(14, 3, 'BigRIg Road Signs.pdf', 'course_materials/1Lf9NLmACzrjSfpv5mjcv3oC0uHHqa56XvkENBfu.pdf', NULL, NULL, NULL, NULL, '2025-09-02 09:57:09', '2025-09-02 09:57:09'),
(15, 2, 'BigRIg Road Signs.pdf', 'course_materials/1UxsqqJXdlpYfCfC7cIIv6bh1KIMwaySwWXKbQlA.pdf', NULL, NULL, NULL, NULL, '2025-09-02 09:58:39', '2025-09-02 09:58:39'),
(16, 4, 'BigRIg Road Signs.pdf', 'course_materials/IuXjgU5QZNxj3U8ywyKa47GDfJpjoMMhtIkTLUXb.pdf', NULL, NULL, NULL, NULL, '2025-09-02 09:59:11', '2025-09-02 09:59:11'),
(17, 4, 'Defensive driving.pptx', 'course_materials/dz353r8R82l1zMX2P5lxY9URM1KCzlQwtmK9pf7e.pptx', NULL, NULL, NULL, NULL, '2025-09-02 09:59:11', '2025-09-02 09:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `objective_id` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`id`, `objective_id`, `topic`, `summary`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pre-Trip Inspection', 'Pre-Trip Inspection', '2025-04-04 19:56:45', '2025-04-04 19:56:45'),
(2, 1, 'Airbrakes Practical and Safety Inspections', 'Airbrakes Practical and Safety Inspections', '2025-04-04 19:57:03', '2025-04-04 19:57:03'),
(3, 1, 'Defensive Driving', 'Defensive Driving', '2025-04-04 19:57:13', '2025-04-04 19:57:13'),
(4, 1, 'Route ​​Planning', 'Route ​​Planning', '2025-04-04 19:57:25', '2025-04-04 19:57:25'),
(5, 1, 'Cargo/ Load Security', 'Cargo/ Load Security', '2025-04-04 19:57:41', '2025-04-04 19:57:41'),
(6, 1, 'Regulatory and legal requirements in Canada and the US Highway Training', 'Regulatory and legal requirements in Canada and the US Highway Training', '2025-04-04 19:58:08', '2025-04-04 19:58:08'),
(7, 1, 'Turns, Backing, Shifting, Coupling & Uncoupling', 'Turns, Backing, Shifting, Coupling & Uncoupling', '2025-04-04 19:58:24', '2025-04-04 19:58:24'),
(8, 3, 'Passenger Safety & Responsibilities', 'Learn protocols for safe boarding, seating, and disembarking, with emphasis on child/passenger welfare.', '2025-09-02 10:32:40', '2025-09-02 10:32:40'),
(9, 3, 'Traffic Laws & Regulations', 'Understand bus-specific traffic laws, right-of-way rules, and BRT regulations.', '2025-09-02 10:32:57', '2025-09-02 10:32:57'),
(10, 3, 'Route & Schedule Management', 'Training in route planning, stop timing, and efficient scheduling.', '2025-09-02 10:33:16', '2025-09-02 10:33:16'),
(11, 3, 'Emergency Response & Evacuation', 'Practice fire safety, first-aid basics, and evacuation drills.', '2025-09-02 10:33:33', '2025-09-02 10:33:33'),
(12, 3, 'Vehicle Inspection & Maintenance', 'Pre-trip, en-route, and post-trip inspection for safe operations.', '2025-09-02 10:33:53', '2025-09-02 10:33:53'),
(15, 2, 'Forklift Types & Basics', 'Introduction to forklift classes, controls, and workplace uses.', '2025-09-02 10:35:26', '2025-09-02 10:35:26'),
(16, 2, 'Safety Procedures & PPE', 'Proper use of helmets, gloves, and safety rules to prevent accidents.', '2025-09-02 10:35:42', '2025-09-02 10:35:42'),
(17, 2, 'Load Handling Techniques', 'Learn lifting, carrying, stacking, and balancing cargo safely.', '2025-09-02 10:35:57', '2025-09-02 10:35:57'),
(18, 2, 'Hazard Recognition & Prevention', 'Identifying risks in warehouses, docks, and construction sites.', '2025-09-02 10:36:13', '2025-09-02 10:36:13'),
(19, 2, 'Inspection & Maintenance', 'Conducting daily checks, troubleshooting, and basic servicing.', '2025-09-02 10:36:35', '2025-09-02 10:36:35'),
(20, 4, 'Road Signs & Traffic Laws', 'Learn rules of the road, signs, and defensive driving concepts.', '2025-09-02 10:37:09', '2025-09-02 10:37:09'),
(21, 4, 'Vehicle Control & Basics', 'Understand steering, braking, clutch, and gear operations.', '2025-09-02 10:37:28', '2025-09-02 10:37:28'),
(22, 4, 'Parking & Maneuvering', 'Training in parking, reversing, turning, and lane discipline.', '2025-09-02 10:37:46', '2025-09-02 10:37:46'),
(23, 4, 'Highway & City Driving', 'Experience driving in both urban and highway conditions safely.', '2025-09-02 10:38:08', '2025-09-02 10:38:08'),
(24, 4, 'Safety & Emergency Skills', 'Handling breakdowns, emergencies, and accident prevention techniques.', '2025-09-02 10:38:25', '2025-09-02 10:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `email_configs`
--

CREATE TABLE `email_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `from_email` varchar(255) DEFAULT NULL,
  `smtp_username` varchar(255) DEFAULT NULL,
  `smtp_password` text DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(255) DEFAULT NULL,
  `smtp_encryption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_configs`
--

INSERT INTO `email_configs` (`id`, `from_name`, `from_email`, `smtp_username`, `smtp_password`, `smtp_host`, `smtp_port`, `smtp_encryption`, `created_at`, `updated_at`) VALUES
(1, 'BigRig International Truck Driving Academy', 'no-reply@bigrigdrivingschool.ng', 'no-reply@bigrigdrivingschool.ng', 'eyJpdiI6Ik11OThlNXJhaUJDL2plRFV6TUlsQVE9PSIsInZhbHVlIjoidDYzTnJYbWp5SkRvV2RYSEcyOFMvdz09IiwibWFjIjoiNWE5MDA4NGQyMDUwYzdmMTY3NjFkY2ExNTkzMjg5MWUyMzUxYjI2MTBiMzQ1OWYyMjUwYzkzNDI2M2E4NjEwNyIsInRhZyI6IiJ9', 'bigrigdrivingschool.ng', '465', 'ssl', '2025-06-11 11:02:40', '2025-09-18 14:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `email_subscriptions`
--

CREATE TABLE `email_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrolment_batches`
--

CREATE TABLE `enrolment_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_name` varchar(255) NOT NULL,
  `c_date` date NOT NULL,
  `active_batch` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrolment_batches`
--

INSERT INTO `enrolment_batches` (`id`, `batch_name`, `c_date`, `active_batch`, `created_at`, `updated_at`) VALUES
(1, '2025 Batch A', '2025-04-01', 1, '2025-03-25 11:27:57', '2025-03-25 11:27:57');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'How long does the truck driving course take?', 'The training last for 3 months which is 12 weeks', '2025-04-08 22:15:32', '2025-04-08 22:15:32'),
(2, 'Is first aid or emergency training included?', 'Yes, it’s often mandatory for school bus drivers.', '2025-04-08 22:19:26', '2025-04-08 22:19:26'),
(3, 'Do I receive a certification after my forklift training?', 'Yes, a forklift operator certificate is issued after passing.', '2025-04-08 22:20:47', '2025-04-08 22:22:59'),
(4, 'Where is the BigRig office located?', 'No 6, Blue Gate Estate, Opposite Liberty Stadium, Ring Road, Ibadan, Oyo State.', '2025-04-08 22:25:50', '2025-04-08 22:25:50'),
(5, 'What types of licenses do you offer training for?', 'Typically Class A, B, or C (depending on the country).', '2025-04-08 22:27:17', '2025-04-08 22:27:17'),
(6, 'Do I need a driving license before enrolling for the truck driving course?', 'Yes, usually a valid regular driver’s license is required with a minimum of 6 months experience.', '2025-04-08 22:29:23', '2025-04-08 22:30:49'),
(7, 'Are there refresher courses for forklift operators?', 'Yes, refresher courses are available and recommended every 3 years to maintain certification.', '2025-04-15 03:02:21', '2025-04-15 03:02:21'),
(8, 'What qualifications do I need to become a school bus driver?', 'You need a valid CDL with a school bus endorsement, be at least 21 years old, pass a background check, and have good vision and hearing.', '2025-04-15 03:03:55', '2025-04-15 03:03:55'),
(9, 'Can I drive a school bus if I have a criminal record?', 'Criminal history checks are part of the application process, and certain offenses may disqualify you from becoming a school bus driver.', '2025-04-15 03:04:28', '2025-04-15 03:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE `forum_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `forum_post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `votes_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `founder`
--

CREATE TABLE `founder` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `founder_name` varchar(255) NOT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `speech_title` varchar(255) NOT NULL,
  `speech_content` text NOT NULL,
  `facebook_handle` varchar(255) DEFAULT NULL,
  `twitter_handle` varchar(255) DEFAULT NULL,
  `linkedin_handle` varchar(255) DEFAULT NULL,
  `instagram_handle` varchar(255) DEFAULT NULL,
  `founder_picture` varchar(255) NOT NULL,
  `secondary_picture` varchar(255) NOT NULL,
  `show_founder` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `founder`
--

INSERT INTO `founder` (`id`, `founder_name`, `signature`, `speech_title`, `speech_content`, `facebook_handle`, `twitter_handle`, `linkedin_handle`, `instagram_handle`, `founder_picture`, `secondary_picture`, `show_founder`, `created_at`, `updated_at`) VALUES
(1, 'Adekola Adedapo', 'founder/V4KlnMkYOp68p93A3eiQ3crQhuU93MwfBF6aeEwc.png', 'Welcome to BigRig International Truck Driving School', '<p>At BigRig International Truck Driving Academy, we are committed to delivering top-tier instruction that is both comprehensive and up-to-date, ensuring our students are well-equipped for today driving environment.</p>\r\n\r\n<p>Our training goes beyond the basics, providing in-depth knowledge and practical skills that drivers can apply every time they take the wheel. From understanding traffic regulations and identifying potential hazards&mdash;such as reckless motorists and construction zones&mdash;to mastering safe driving techniques in adverse weather conditions, we prepare our students to navigate the road with confidence, responsibility, and professionalism.</p>', NULL, NULL, NULL, NULL, 'founder/3cYUT5wFNQtPmhQIxo5WdZ9FI49g98BEekRAGU2X.jpg', 'founder/s6Eg1jo77uJ5S3K9Zpctoo9a00FJjRjmk6w6V80h.jpg', 0, '2025-03-25 11:14:16', '2025-09-18 14:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `medicals`
--

CREATE TABLE `medicals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `height` decimal(8,2) DEFAULT NULL,
  `visual_impairment` varchar(255) DEFAULT NULL,
  `hearing_aid` varchar(255) DEFAULT NULL,
  `physical_disability` varchar(255) DEFAULT NULL,
  `weed` varchar(255) NOT NULL DEFAULT 'No',
  `alcohol` varchar(255) NOT NULL DEFAULT 'Casually',
  `prescribed_medication` text DEFAULT NULL,
  `failed_drug_test` text DEFAULT NULL,
  `attachments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2012_01_30_034123_create_enrolment_batches_table', 1),
(2, '2012_12_18_041151_create_roles_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2022_03_23_163443_create_sessions_table', 1),
(9, '2022_05_11_154250_create_datafeeds_table', 1),
(10, '2022_07_04_131100_create_customers_table', 1),
(11, '2022_07_04_151619_create_orders_table', 1),
(12, '2022_07_06_104457_create_invoices_table', 1),
(13, '2022_07_06_132214_create_members_table', 1),
(14, '2022_07_07_125834_create_transactions_table', 1),
(15, '2022_07_07_134715_create_jobs_table', 1),
(16, '2022_07_08_143725_create_campaigns_table', 1),
(17, '2022_07_08_151254_create_marketers_table', 1),
(18, '2022_07_08_153041_create_campaign_marketer_table', 1),
(19, '2024_11_25_123640_create_medicals_table', 1),
(20, '2024_11_25_123640_create_subscriptions_table', 1),
(21, '2024_11_25_133921_create_training_objective_table', 1),
(22, '2024_12_05_051758_create_settings_table', 1),
(23, '2024_12_08_053622_create_faqs_table', 1),
(24, '2024_12_08_103031_create_sliders_table', 1),
(25, '2024_12_08_131112_create_founder_table', 1),
(26, '2024_12_09_052658_create_services_table', 1),
(27, '2024_12_09_105108_create_clients_table', 1),
(28, '2024_12_09_150245_create_about_company_table', 1),
(29, '2024_12_10_113731_create_achievements_table', 1),
(30, '2024_12_18_041307_create_permissions_table', 1),
(31, '2024_12_18_041352_create_role_permission_table', 1),
(32, '2025_01_19_170931_create_curriculum_table', 1),
(33, '2025_01_21_125717_create_course_materials_table', 1),
(35, '2025_03_18_145255_create_student_instructor_distributions_table', 2),
(37, '2025_03_19_134710_create_role_courses_table', 3),
(38, '2025_01_23_120007_create_training_schedules_table', 4),
(39, '2025_04_02_125452_create_testimonials_table', 5),
(40, '2025_04_04_152052_create_email_subscriptions_table', 6),
(41, '2025_05_27_070913_create_role_user_table', 7),
(42, '2025_05_30_225535_create_messages_table', 7),
(43, '2025_05_31_012743_add_is_read_to_messages_table', 7),
(44, '2025_06_01_192507_create_email_configs_table', 7),
(45, '2025_06_01_202934_create_payment_gateway_configs_table', 7),
(46, '2025_06_11_131008_create_forum_posts_table', 7),
(47, '2025_06_11_131047_create_forum_comments_table', 7),
(48, '2025_08_24_055610_create_student_attendance_table', 8),
(49, '2025_08_24_055829_create_student_progress_table', 9),
(50, '2025_08_24_060010_create_announcements_table', 10),
(51, '2025_08_24_061532_create_announcement_reads_table', 11),
(52, '2025_08_24_153202_create_schedule_change_requests_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway_configs`
--

CREATE TABLE `payment_gateway_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `public_key` varchar(255) DEFAULT NULL,
  `secret_key` text DEFAULT NULL,
  `merchant_email` varchar(255) DEFAULT NULL,
  `sandbox` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateway_configs`
--

INSERT INTO `payment_gateway_configs` (`id`, `name`, `public_key`, `secret_key`, `merchant_email`, `sandbox`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Paystack', 'pk_live_2bb51c6aad857886fd0e951b31aa9d427de64077', 'eyJpdiI6Ii9kaHpCVGtYRHVreWtNamtTK1QxVXc9PSIsInZhbHVlIjoiN0RsclhzSlVDRkZkNXZIQ0pzQlFvZVlKUGFPZFVNcHpNUHVMRlU3SzFzeEF5ZUZZYWJhS1FGUU8xVkZ3aCtqaHVYTmpYMk15amt1V044ajNYSHpvSVE9PSIsIm1hYyI6IjA4YmQzMGUxZWFhYmE4MWIwYTVhODMwZmMwZjNmMDhiZTE4YmJjOWU0MDY3N2U3OGFlZjBkZTU0MWE5NWFhOTkiLCJ0YWciOiIifQ==', 'payment@bigrigdrivingschool.ng', 0, 1, '2025-06-02 16:08:07', '2025-09-18 14:31:31'),
(2, 'Flutterwave', NULL, NULL, NULL, 1, 0, '2025-06-02 16:08:07', '2025-06-02 16:08:07'),
(3, 'Autocredit', NULL, NULL, NULL, 1, 0, '2025-06-02 16:08:07', '2025-06-02 16:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'read_calendar', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(2, 'read_chats', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(3, 'read_course_management', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(4, 'update_course_management', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(5, 'create_forum', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(6, 'delete_forum', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(7, 'read_forum', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(8, 'update_forum', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(9, 'create_instructors', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(10, 'delete_instructors', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(11, 'read_instructors', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(12, 'update_instructors', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(13, 'read_dashboard_instructor_card', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(14, 'read_dashboard_revenue_card', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(15, 'read_dashboard_user_card', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(16, 'read_management_navigation', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(17, 'create_newsletter', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(18, 'read_newsletter', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(19, 'update_email_configuration', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(20, 'update_payment_configuration', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(21, 'create_payments', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(22, 'read_payments', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(23, 'read_roles_and_permissions', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(24, 'create_roles_and_permissions', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(25, 'delete_roles_and_permissions', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(26, 'update_roles_and_permissions', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(27, 'update_role_course_permission', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(28, 'read_student_accounts', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(29, 'create_testimonials', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(30, 'delete_testimonials', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(31, 'read_testimonials', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(32, 'update_testimonials', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(33, 'read_training_schedule', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(34, 'create_training_schedule', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(35, 'delete_training_schedule', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(36, 'update_suspend_user_account', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(37, 'read_suspend_user_account', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(38, 'update_verify_user_account', '2025-06-02 16:08:06', '2025-06-02 16:08:06'),
(39, 'update_website_management', '2025-06-02 16:08:06', '2025-06-02 16:08:06');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_description`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', NULL, '2025-03-10 15:27:27', '2025-03-10 15:27:27'),
(2, 'IT Consultant', NULL, '2025-03-10 15:27:27', '2025-03-10 15:27:27'),
(3, 'Lead Instructor', NULL, '2025-03-10 15:27:27', '2025-03-10 15:27:27'),
(4, 'Admin', NULL, '2025-03-10 15:27:27', '2025-03-10 15:27:27'),
(5, 'MV Instructor', NULL, '2025-03-10 15:27:27', '2025-03-10 15:27:27'),
(6, 'CMV Instructor', NULL, '2025-03-10 15:27:27', '2025-03-10 15:27:27'),
(7, 'Forklift Instructor', NULL, '2025-03-10 15:27:27', '2025-03-10 15:27:27'),
(8, 'Defensive Driving Instructor', NULL, '2025-03-10 15:27:27', '2025-03-10 15:27:27'),
(9, 'Safety & Compliance Instructor', NULL, '2025-03-10 15:27:27', '2025-03-10 15:27:27'),
(10, 'Student', NULL, '2025-03-10 15:27:27', '2025-03-10 15:27:27'),
(14, 'Hazmat Instructor', NULL, '2025-04-08 21:07:03', '2025-04-08 21:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_courses`
--

CREATE TABLE `role_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_courses`
--

INSERT INTO `role_courses` (`id`, `role_id`, `course_id`, `created_at`, `updated_at`) VALUES
(4, 6, 1, '2025-04-04 20:36:53', '2025-04-04 20:36:53'),
(5, 6, 3, '2025-04-04 20:36:54', '2025-04-04 20:36:54'),
(6, 8, 1, '2025-04-04 20:37:05', '2025-04-04 20:37:05'),
(7, 8, 3, '2025-04-04 20:37:08', '2025-04-04 20:37:08'),
(8, 8, 4, '2025-04-04 20:37:09', '2025-04-04 20:37:09'),
(9, 7, 2, '2025-04-04 20:37:23', '2025-04-04 20:37:23'),
(10, 3, 1, '2025-04-04 20:37:36', '2025-04-04 20:37:36'),
(11, 3, 2, '2025-04-04 20:37:37', '2025-04-04 20:37:37'),
(12, 3, 3, '2025-04-04 20:37:38', '2025-04-04 20:37:38'),
(13, 3, 4, '2025-04-04 20:37:39', '2025-04-04 20:37:39'),
(14, 5, 4, '2025-04-04 20:37:55', '2025-04-04 20:37:55'),
(15, 9, 1, '2025-04-04 20:38:09', '2025-04-04 20:38:09'),
(16, 9, 3, '2025-04-04 20:38:10', '2025-04-04 20:38:10'),
(17, 9, 4, '2025-04-04 20:38:11', '2025-04-04 20:38:11'),
(18, 14, 1, '2025-04-08 21:08:33', '2025-04-08 21:08:33'),
(19, 6, 4, '2025-04-08 21:12:28', '2025-04-08 21:12:28'),
(20, 8, 2, '2025-04-08 21:13:13', '2025-04-08 21:13:13'),
(21, 14, 2, '2025-04-08 21:14:29', '2025-04-08 21:14:29'),
(22, 9, 2, '2025-04-08 21:16:53', '2025-04-08 21:16:53'),
(23, 1, 1, '2025-08-11 16:15:53', '2025-08-11 16:15:53'),
(24, 1, 2, '2025-08-11 16:15:55', '2025-08-11 16:15:55'),
(25, 1, 3, '2025-08-11 16:15:56', '2025-08-11 16:15:56'),
(26, 1, 4, '2025-08-11 16:15:56', '2025-08-11 16:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2025-08-11 16:12:39', '2025-08-11 16:12:39'),
(2, 1, 1, '2025-08-11 16:12:40', '2025-08-11 16:12:40'),
(3, 1, 3, '2025-08-11 16:12:41', '2025-08-11 16:12:41'),
(4, 1, 4, '2025-08-11 16:13:56', '2025-08-11 16:13:56'),
(5, 1, 13, '2025-08-11 16:13:58', '2025-08-11 16:13:58'),
(6, 1, 14, '2025-08-11 16:13:59', '2025-08-11 16:13:59'),
(7, 1, 15, '2025-08-11 16:14:00', '2025-08-11 16:14:00'),
(8, 1, 19, '2025-08-11 16:14:01', '2025-08-11 16:14:01'),
(9, 1, 5, '2025-08-11 16:14:02', '2025-08-11 16:14:02'),
(10, 1, 7, '2025-08-11 16:14:03', '2025-08-11 16:14:03'),
(11, 1, 8, '2025-08-11 16:14:06', '2025-08-11 16:14:06'),
(12, 1, 6, '2025-08-11 16:14:07', '2025-08-11 16:14:07'),
(13, 1, 10, '2025-08-11 16:14:08', '2025-08-11 16:14:08'),
(14, 1, 12, '2025-08-11 16:14:10', '2025-08-11 16:14:10'),
(15, 1, 11, '2025-08-11 16:14:11', '2025-08-11 16:14:11'),
(16, 1, 9, '2025-08-11 16:14:12', '2025-08-11 16:14:12'),
(17, 1, 16, '2025-08-11 16:14:14', '2025-08-11 16:14:14'),
(18, 1, 17, '2025-08-11 16:14:26', '2025-08-11 16:14:26'),
(19, 1, 18, '2025-08-11 16:14:28', '2025-08-11 16:14:28'),
(20, 1, 20, '2025-08-11 16:14:30', '2025-08-11 16:14:30'),
(21, 1, 22, '2025-08-11 16:14:33', '2025-08-11 16:14:33'),
(22, 1, 21, '2025-08-11 16:14:34', '2025-08-11 16:14:34'),
(23, 1, 27, '2025-08-11 16:14:37', '2025-08-11 16:14:37'),
(24, 1, 24, '2025-08-11 16:14:39', '2025-08-11 16:14:39'),
(25, 1, 23, '2025-08-11 16:14:40', '2025-08-11 16:14:40'),
(26, 1, 26, '2025-08-11 16:14:42', '2025-08-11 16:14:42'),
(27, 1, 25, '2025-08-11 16:14:43', '2025-08-11 16:14:43'),
(28, 1, 28, '2025-08-11 16:14:45', '2025-08-11 16:14:45'),
(29, 1, 37, '2025-08-11 16:14:46', '2025-08-11 16:14:46'),
(30, 1, 36, '2025-08-11 16:14:48', '2025-08-11 16:14:48'),
(31, 1, 29, '2025-08-11 16:15:25', '2025-08-11 16:15:25'),
(32, 1, 31, '2025-08-11 16:15:26', '2025-08-11 16:15:26'),
(33, 1, 32, '2025-08-11 16:15:28', '2025-08-11 16:15:28'),
(34, 1, 30, '2025-08-11 16:15:29', '2025-08-11 16:15:29'),
(35, 1, 35, '2025-08-11 16:15:30', '2025-08-11 16:15:30'),
(36, 1, 33, '2025-08-11 16:15:32', '2025-08-11 16:15:32'),
(37, 1, 34, '2025-08-11 16:15:33', '2025-08-11 16:15:33'),
(38, 1, 38, '2025-08-11 16:15:35', '2025-08-11 16:15:35'),
(39, 1, 39, '2025-08-11 16:15:37', '2025-08-11 16:15:37'),
(40, 2, 1, '2025-08-11 16:17:46', '2025-08-11 16:17:46'),
(41, 2, 2, '2025-08-11 16:17:47', '2025-08-11 16:17:47'),
(42, 2, 3, '2025-08-11 16:17:48', '2025-08-11 16:17:48'),
(43, 2, 4, '2025-08-11 16:17:49', '2025-08-11 16:17:49'),
(44, 2, 13, '2025-08-11 16:17:50', '2025-08-11 16:17:50'),
(45, 2, 14, '2025-08-11 16:17:51', '2025-08-11 16:17:51'),
(46, 2, 15, '2025-08-11 16:17:52', '2025-08-11 16:17:52'),
(47, 2, 19, '2025-08-11 16:17:54', '2025-08-11 16:17:54'),
(48, 2, 5, '2025-08-11 16:17:56', '2025-08-11 16:17:56'),
(49, 2, 7, '2025-08-11 16:17:57', '2025-08-11 16:17:57'),
(50, 2, 8, '2025-08-11 16:17:59', '2025-08-11 16:17:59'),
(51, 2, 6, '2025-08-11 16:18:00', '2025-08-11 16:18:00'),
(52, 2, 10, '2025-08-11 16:18:01', '2025-08-11 16:18:01'),
(53, 2, 12, '2025-08-11 16:18:02', '2025-08-11 16:18:02'),
(54, 2, 11, '2025-08-11 16:18:04', '2025-08-11 16:18:04'),
(55, 2, 9, '2025-08-11 16:18:05', '2025-08-11 16:18:05'),
(56, 2, 16, '2025-08-11 16:18:06', '2025-08-11 16:18:06'),
(57, 2, 18, '2025-08-11 16:18:07', '2025-08-11 16:18:07'),
(58, 2, 17, '2025-08-11 16:18:08', '2025-08-11 16:18:08'),
(59, 2, 20, '2025-08-11 16:18:10', '2025-08-11 16:18:10'),
(60, 2, 22, '2025-08-11 16:18:15', '2025-08-11 16:18:15'),
(61, 2, 21, '2025-08-11 16:18:17', '2025-08-11 16:18:17'),
(62, 2, 27, '2025-08-11 16:18:19', '2025-08-11 16:18:19'),
(63, 2, 24, '2025-08-11 16:18:21', '2025-08-11 16:18:21'),
(64, 2, 23, '2025-08-11 16:18:22', '2025-08-11 16:18:22'),
(65, 2, 26, '2025-08-11 16:18:24', '2025-08-11 16:18:24'),
(66, 2, 25, '2025-08-11 16:18:25', '2025-08-11 16:18:25'),
(67, 2, 28, '2025-08-11 16:18:26', '2025-08-11 16:18:26'),
(68, 2, 37, '2025-08-11 16:18:28', '2025-08-11 16:18:28'),
(69, 2, 36, '2025-08-11 16:18:29', '2025-08-11 16:18:29'),
(70, 2, 30, '2025-08-11 16:18:30', '2025-08-11 16:18:30'),
(71, 2, 32, '2025-08-11 16:18:31', '2025-08-11 16:18:31'),
(72, 2, 31, '2025-08-11 16:18:32', '2025-08-11 16:18:32'),
(73, 2, 29, '2025-08-11 16:18:33', '2025-08-11 16:18:33'),
(74, 2, 34, '2025-08-11 16:18:34', '2025-08-11 16:18:34'),
(75, 2, 33, '2025-08-11 16:18:44', '2025-08-11 16:18:44'),
(76, 2, 38, '2025-08-11 16:18:45', '2025-08-11 16:18:45'),
(77, 2, 39, '2025-08-11 16:18:46', '2025-08-11 16:18:46'),
(78, 2, 35, '2025-08-11 16:18:47', '2025-08-11 16:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 4, NULL, NULL),
(4, 4, 4, NULL, NULL),
(5, 5, 5, NULL, NULL),
(6, 6, 9, NULL, NULL),
(7, 7, 6, NULL, NULL),
(8, 8, 10, NULL, NULL),
(9, 9, 10, NULL, NULL),
(10, 10, 10, NULL, NULL),
(11, 11, 10, NULL, NULL),
(12, 12, 10, NULL, NULL),
(13, 8, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_change_requests`
--

CREATE TABLE `schedule_change_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('reschedule','cancel','substitute') NOT NULL,
  `reason` text NOT NULL,
  `new_date` date DEFAULT NULL,
  `new_time_start` time DEFAULT NULL,
  `new_time_stop` time DEFAULT NULL,
  `substitute_instructor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `admin_notes` text DEFAULT NULL,
  `reviewed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_description` varchar(255) NOT NULL,
  `service_picture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_description`, `service_picture`, `created_at`, `updated_at`) VALUES
(3, 'CDL Training', 'Class A trains for bigrigs; Class B covers dump trucks, delivery vehicles, and commercial buses.', 'custom-services/uw3diFhbAA2RoewYbhdReu27diLkIjTb40pKNHlr.png', '2025-04-06 15:39:07', '2025-04-08 19:40:39'),
(4, 'Forklift Operator Training', 'Programs offering certification in operating warehouse and industrial equipment safely and efficiently.', 'custom-services/Zx82fQpj8ZPIxvttJdtc9567x7tX08S2w5hNaFPU.png', '2025-04-06 15:40:54', '2025-04-08 19:47:52'),
(5, 'School Bus & BRT Training', 'Training designed for individuals planning to operate school buses or Bus Rapid Transit vehicles safely.', 'custom-services/d7OcHdvA6ZCngGWmsCtLHgUfg9fZ3sI1MQE9f4Xs.png', '2025-04-06 15:42:28', '2025-04-08 19:43:07'),
(6, 'Defensive Driving Courses', 'Teaching advanced driving techniques focused on safety, accident prevention, and handling emergencies.', 'custom-services/0g8JQ7VrGBVemhw6tGza4AeZy67jgoW5iaTegJGV.png', '2025-04-06 15:43:59', '2025-04-06 15:43:59'),
(7, 'Refresher Courses', 'For drivers who already have a CDL but want to refresh their skills or get updated on new laws/regulations.', 'custom-services/TwnmTnk5xLYhha1ygNa6qGAW4wPap0AIy5Ifs80Y.png', '2025-04-06 15:44:54', '2025-04-06 15:44:54'),
(8, 'Vehicle Inspection & Road Test Preparation', 'Pre-trip inspection training with mock tests and hands-on CDL road test practice.', 'custom-services/9bfBWNtMvQ2izBNAFYFJ3ctHXFTZLjOpJ2PMqUz2.png', '2025-04-06 15:46:15', '2025-04-08 19:50:42'),
(9, 'Regular/Private Vehicle Driving Lessons', 'Designed for individuals seeking basic car driving lessons or driver’s license preparation support.', 'custom-services/5w4ifV79RknkVKR3ICGjYbSXePflabK3dgMoRNDJ.png', '2025-04-06 15:57:06', '2025-04-08 19:52:58'),
(10, 'Corporate Training Programs', 'Customized programs for companies needing to certify or upskill their fleet drivers.', 'custom-services/OLS6GHF5CR5Z9wol5TnalgX8nbaK9KZ2F1k1nFlr.png', '2025-04-06 15:58:33', '2025-04-06 15:58:33'),
(11, 'Job Placement Assistance', 'Helping graduates connect with trucking companies or logistics firms looking to hire qualified drivers.', 'custom-services/r8BrsT5pZvZBPSIGQiYTXCnRnVxJwlzHKNKDGFMy.png', '2025-04-06 15:59:57', '2025-04-06 15:59:57'),
(12, 'Licensing Assistance', 'Assistance with scheduling and completing the DMV/FRSC written and driving tests.', 'custom-services/pQvwE192qtROhqCVvvJJp1qmUkGRz8hK1k6g0QlI.png', '2025-04-06 16:01:47', '2025-04-06 16:01:47'),
(13, 'Heavy Equipment Operation Training', 'Training to operate cranes, bulldozers, or other construction and heavy-duty equipment.', 'custom-services/yHpKBjQ88W90Ru6cDAXkfzKAP8Ty8yYzZ5OIPjUZ.png', '2025-04-06 16:02:52', '2025-04-06 16:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NbVjXvcZPPF0Y4UKkI44SxEYUjoOTs7lrV0tgkN6', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib1VZRER6RkZubW5CcUMzTXlmYmx0VUUxajlpcW56b2lLcEtZQzR6bSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MDoiaHR0cDovLzEyNy4wLjAuMTo4MDAxL3NldHRpbmdzL2VtYWlsLWNvbmZpZ3VyYXRpb24iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NzoiaHR0cDovLzEyNy4wLjAuMTo4MDAxL3NldHRpbmdzL3BheW1lbnQtZ2F0ZXdheXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1758209491);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_tagline` varchar(255) DEFAULT NULL,
  `commence_year` year(4) NOT NULL,
  `site_description` text NOT NULL,
  `site_keywords` text NOT NULL,
  `headquarters` text NOT NULL,
  `business_email` varchar(255) NOT NULL,
  `secondary_email` varchar(255) DEFAULT NULL,
  `business_contact` varchar(255) NOT NULL,
  `secondary_contact` varchar(255) DEFAULT NULL,
  `whatsapp_support` varchar(255) DEFAULT NULL,
  `telegram_support` varchar(255) DEFAULT NULL,
  `dark_theme_logo` varchar(255) DEFAULT NULL,
  `light_theme_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `facebook_handle` varchar(255) DEFAULT NULL,
  `twitter_handle` varchar(255) DEFAULT NULL,
  `instagram_handle` varchar(255) DEFAULT NULL,
  `youtube_handle` varchar(255) DEFAULT NULL,
  `tiktok_handle` varchar(255) DEFAULT NULL,
  `linkedin_handle` varchar(255) DEFAULT NULL,
  `show_whatsapp_support` tinyint(1) NOT NULL DEFAULT 0,
  `show_telegram_support` tinyint(1) NOT NULL DEFAULT 0,
  `show_preloader` tinyint(1) NOT NULL DEFAULT 0,
  `preferred_landing_page` int(11) NOT NULL DEFAULT 1,
  `base_currency` varchar(5) NOT NULL DEFAULT '₦',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_tagline`, `commence_year`, `site_description`, `site_keywords`, `headquarters`, `business_email`, `secondary_email`, `business_contact`, `secondary_contact`, `whatsapp_support`, `telegram_support`, `dark_theme_logo`, `light_theme_logo`, `favicon`, `facebook_handle`, `twitter_handle`, `instagram_handle`, `youtube_handle`, `tiktok_handle`, `linkedin_handle`, `show_whatsapp_support`, `show_telegram_support`, `show_preloader`, `preferred_landing_page`, `base_currency`, `created_at`, `updated_at`) VALUES
(1, 'BigRig International Truck Driving School', NULL, '2024', 'Kickstart your career with confidence at BigRig International Truck Driving School! We specialize in professional CDL training designed to equip aspiring truck drivers with the skills, knowledge, and hands-on experience needed to excel in the transportation industry. Whether you\'re a beginner or looking to enhance your driving expertise, our certified instructors and modern fleet ensure a top-tier learning environment. Join us to navigate the road to success and drive your future forward!', 'Truck driving school, CDL training, Commercial driver’s license, Professional truck driver training, CDL certification, Class A CDL training, Trucking career, CDL test preparation, Hands-on truck driving experience, Transportation industry training, Big rig driving school, International truck driving training, CDL license school, Start a trucking career, Truck driver education', 'No 6, Blue Gate Estate, Opposite Liberty Stadium, Ring Road, Ibadan, Oyo State.', 'info@bigrigdrivingschool.ng', NULL, '+1 (210) 422-3150', NULL, '+1 (210) 422-3150', NULL, 'logo/rAaWpcHKRoUhPojPRMC92hdk17CD7PArJrNavTqn.png', 'logo/rmL4Uh0lvxz7mz3vh9XQ5QjYqelrb9ZgQKy6Yvay.png', 'logo/wkf3mzYjeo7PMRLCKxTOs7Vy93acsdcvaxhE0FwV.ico', NULL, NULL, 'https://www.instagram.com/bigrig_truckdrivingschool/', NULL, NULL, NULL, 1, 0, 0, 2, '₦', '2025-03-10 15:27:27', '2025-04-08 21:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `image_url_2` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `text`, `button_name`, `button_url`, `image_url`, `image_url_2`, `created_at`, `updated_at`) VALUES
(3, 'Shift Gears Toward a Better Future.', 'Join our dedicated team and get hand-on experience with truck, forklift, school bus and regular vehicles.', 'Already A Member?', '/login', 'sliders/71NMebEk88TInneucsN8ekvkFgmQQ8E5E8b8iSUK.png', 'sliders/4kKlbwwEcVSPt45zmibeHJ0DBo9dXgs6CfTmouDO.png', '2025-03-26 19:15:18', '2025-04-04 15:05:53'),
(8, 'Shift Gears Toward a Better Future.', 'Join our dedicated team and get hand-on experience with truck, forklift, school bus and regular vehicles.', NULL, NULL, 'sliders/kGLpo0mj0p8iXd0lILtvbRSKGyAgWIBFy0RFXlUZ.png', 'sliders/eC1hkRWuhZmYSuLNUekNhSs4SB0HF170rFgWP1Dn.jpg', '2025-04-05 18:43:12', '2025-04-06 02:20:06'),
(9, 'Kickstart Your Trucking Career Today!', 'Ready for a high-paying, in-demand career? Become a Professional Truck Driver and hit the open road with confidence! Get top-notch training, great benefits, and job security.', NULL, NULL, 'sliders/ARiAIChGAi0PhMDEUsCQ4WoLcBFbV3rchnDZk0nF.png', 'sliders/4HFFdGeV2R3V6KWswyD79L92UZttpWV3ExO7hHeV.jpg', '2025-04-05 18:45:36', '2025-04-06 13:58:32'),
(10, 'Shift Gears Toward a Better Future.', 'Join our dedicated team and get hand-on experience with truck, forklift, school bus and regular vehicles.', NULL, NULL, 'sliders/RB4iA4bBIsN1XvvLWMwLff83XIOBZuJDezEc3iFr.png', 'sliders/d5JXD2xMDIs7qzrN7B0u6E8IaJ0jOFROwqTKWkPo.jpg', '2025-04-05 18:51:07', '2025-04-06 13:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('present','absent','late','excused') NOT NULL DEFAULT 'absent',
  `check_in_time` time DEFAULT NULL,
  `check_out_time` time DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `marked_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_instructor_distributions`
--

CREATE TABLE `student_instructor_distributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enrolment_batch_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_progress`
--

CREATE TABLE `student_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('theory','practical') NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `score` int(11) DEFAULT NULL,
  `hours_completed` int(11) NOT NULL DEFAULT 0,
  `completion_date` date DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_reference` varchar(255) DEFAULT NULL,
  `objectives` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`objectives`)),
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_status` enum('pending','completed','failed') NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `testimony` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `image_url` varchar(2048) DEFAULT NULL,
  `website_visibility` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `full_name`, `testimony`, `rating`, `image_url`, `website_visibility`, `created_at`, `updated_at`) VALUES
(1, 'Ololade Shittu', '<p>I could not imagine a driving school looking like BigRig Truck Driving School. It is a state-of-the-art facility with rich content and outstanding trainers. It was fun learning, &amp; I enjoyed the whole experience.</p>', 4, 'testimonials/pHtPdw90JVDXE0gVBpTNTFgSHv4GPoro6EZbYnKv.jpg', 1, '2025-04-02 12:51:44', '2025-04-02 13:53:33'),
(2, 'Sodiq Opayinka', '<p>Best driving school I&rsquo;ve never been to love it; the instructors are very patient. Professional understanding &amp; help gain my confidence in driving, which I recommend to friends.</p>', 5, 'testimonials/nXt6xKgJk0c0TH0aNWkKKo9tV6I5Ihepx8ojYf8m.jpg', 1, '2025-04-02 13:09:54', '2025-04-02 14:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `training_objectives`
--

CREATE TABLE `training_objectives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `objective` varchar(255) NOT NULL,
  `requirement` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `theory_session` int(11) DEFAULT NULL,
  `practical_session` int(11) DEFAULT NULL,
  `examination` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `video_thumbnail_url` varchar(255) DEFAULT NULL,
  `course_details` text DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_objectives`
--

INSERT INTO `training_objectives` (`id`, `objective`, `requirement`, `price`, `duration`, `theory_session`, `practical_session`, `examination`, `image_url`, `video_thumbnail_url`, `course_details`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 'CDL Truck Driving Training', '<ul>\r\n	<li><strong>You must have a valid driver&#39;s license</strong></li>\r\n	<li><strong>You must have a minimum of 6 months driving experience&nbsp;</strong></li>\r\n	<li><strong>You must be 18&nbsp;years of age&nbsp;and&nbsp;above</strong></li>\r\n	<li><strong>You must have a valid NIN</strong></li>\r\n	<li><strong>You must be a Nigerian Citizen or member of ECOWAS States</strong></li>\r\n	<li><strong>Road test will be conducted for pre-qualification for #5,000 NGN</strong></li>\r\n	<li><strong>No&nbsp;felony (e.g Kidnapping ,Terrorism, Murder, trafficking etc)</strong></li>\r\n	<li><strong>You must pass vision Test, medical Test(physical)&nbsp;and pre-employment drug screening, within 90 days of enrolment&nbsp;</strong></li>\r\n</ul>', 1800000.00, 12, 40, 40, '2 hours', 'courses/Tkj5y9Uvev7j8PeQ2RcTyUHCXLGOeWIA8h0Do3s1.jpg', 'courses/ndCGhmlRjYGRYWUlaQyUvne0CsDsUCGaS0chXQSh.jpg', '<h2><strong>Learn Truck Driving at BigRig International Truck Driving School</strong></h2>\r\n\r\n<p>BigRig International Truck Driving Training is based on the National Skills Qualification curriculum and framework while maintaining international best practices. We provide training in all aspects of trucking, including inspection, air brake system maintenance, all forms of docking, goods carriage, hazards and journey management, just to mention a few.</p>\r\n\r\n<p>BigRig International Truck Driving&nbsp;Training Breakdown</p>\r\n\r\n<p>Lesson Days: 2 month 3 times a week (Mondays, Wednesdays and Fridays)<br />\r\nTraining Hours: 1 hr. Practical<br />\r\nCertificate of Participant (Issued based on performance)</p>\r\n\r\n<p>Student assessment takes place every Tuesday and Thursday, and it is applicable only to CATEGORY<strong>&nbsp;A.&nbsp;</strong>This is based on National Skills Qualification Operating standard to be sure the learning process is adhered to and the learner understand all the units of the curriculum and outcome of the training</p>\r\n\r\n<p>Note: Our crash course for our busy &ldquo;students,&rdquo; which is scheduled for every&nbsp;<strong>Saturday and Sunday,</strong>&nbsp;attracts an additional fee of N20,000/weekend</p>\r\n\r\n<p><strong>​REQUIREMENT FOR ENROLLING FOR THIS COURSE</strong></p>\r\n\r\n<p>For you to be eligible for enrollment for this course at BigRig International Truck Driving School</p>\r\n\r\n<ul>\r\n	<li>You must have a valid driver&#39;s license</li>\r\n	<li>You must have a minimum of 6 months driving experience&nbsp;</li>\r\n	<li>You must be 18&nbsp;years of age&nbsp;and&nbsp;above</li>\r\n	<li>You must have a valid NIN</li>\r\n	<li>You must be a Nigerian Citizen or member of ECOWAS States</li>\r\n	<li>Road test will be conducted for pre-qualification for #5,000 NGN</li>\r\n	<li>No&nbsp;felony (e.g Kidnapping ,Terrorism, Murder, trafficking etc)</li>\r\n	<li>You must pass vision Test, medical Test(physical)&nbsp;and pre-employment drug screening, within 90 days of enrolment</li>\r\n</ul>\r\n\r\n<p><strong>CATEGORY A</strong></p>\r\n\r\n<p><strong>Schedule</strong>: Training will run for a total of Three (3) months, Two (2) months of practical and theory Three (3) times a week and one (1) month of assessment two (2) times a week.</p>\r\n\r\n<p><strong>Training includes</strong></p>\r\n\r\n<ol>\r\n	<li>All 16 units use the National Skills Qualification standard while maintaining international best practices.</li>\r\n	<li><strong>Forklift training</strong>&nbsp;for self loading and unloading of fragile cargo</li>\r\n	<li>Tea break</li>\r\n	<li>Globally recognized certification</li>\r\n	<li>Hand gloves, helmet and reflective jacket</li>\r\n</ol>\r\n\r\n<p><strong>Training Fee: (N1,450,000)</strong></p>\r\n\r\n<p><strong>CATEGORY B</strong></p>\r\n\r\n<p>Regular class twelve (12) sessions of theory and ten (10) practical sessions<br />\r\n1 hour practical training (1 month)</p>\r\n\r\n<p><strong>CATEGORY C</strong></p>\r\n\r\n<p>Pay as you learn: This is for students who do not have the full amount but still want to enroll for truck training. A minimum of three (3) sessions will be required for you to enroll.</p>', 'https://www.youtube.com/watch?v=mwqoD6O5JII', '2025-03-27 03:43:09', '2025-09-02 10:01:10'),
(2, 'Forklift Training', '<ul>\r\n	<li><strong>You must be 18&nbsp;years of age or older</strong></li>\r\n	<li><strong>You must have a valid NIN</strong></li>\r\n	<li><strong>You must be a Nigerian Citizen or member of ECOWAS States</strong></li>\r\n	<li><strong>You must pass pre-employment drug test &amp; physical test</strong></li>\r\n	<li><strong>You must have class C (regular driver&#39;s license) with at least 6 months of driving experience</strong></li>\r\n</ul>', 470000.00, 3, 15, 10, '2 hours', 'courses/mWPglaDjZQ2sUEGWMghhC1z9rUPocUecuOiOXHtl.jpg', 'courses/O6HOfUNfKZYCffDBlMpoVyIMntu2wSSrQNZ7mc4C.jpg', '<h1><strong>🏗 Forklift Training</strong></h1>\r\n\r\n<h3><strong>Lift With Skill, Operate With Safety</strong></h3>\r\n\r\n<p>Forklifts are the backbone of warehouses, ports, and construction sites. But operating one without training is dangerous and costly. Our <strong>Forklift Training</strong> program at BigRig equips you with the <strong>technical knowledge and hands-on skills</strong> to safely operate forklifts in real-world environments.</p>\r\n\r\n<h3>The Training Journey</h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Introduction</strong> &ndash; Overview of forklift types and workplace hazards.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Safety First</strong> &ndash; Learning about protective gear, load balance, and accident prevention.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Hands-On Driving</strong> &ndash; Practical sessions on lifting, stacking, carrying, and maneuvering.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Inspection &amp; Maintenance</strong> &ndash; Pre-use checks, routine servicing, and troubleshooting.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Final Evaluation</strong> &ndash; Written and practical tests to certify your competency.</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>What You&rsquo;ll Learn</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Forklift safety rules and hazard awareness</p>\r\n	</li>\r\n	<li>\r\n	<p>Proper lifting, carrying, and stacking techniques</p>\r\n	</li>\r\n	<li>\r\n	<p>Pre-operation inspection routines</p>\r\n	</li>\r\n	<li>\r\n	<p>Workplace best practices (warehouse, logistics, construction)</p>\r\n	</li>\r\n	<li>\r\n	<p>Emergency handling and accident prevention</p>\r\n	</li>\r\n</ul>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>Schedule &amp; Duration</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>2 Weeks (10 practical + 4 theory sessions)</p>\r\n	</li>\r\n	<li>\r\n	<p>2 hours per session</p>\r\n	</li>\r\n	<li>\r\n	<p>Weekend crash course: ₦10,000/weekend</p>\r\n	</li>\r\n</ul>', NULL, '2025-03-27 03:55:14', '2025-09-02 10:29:09'),
(3, 'BRT or School Bus Training', '<ul>\r\n	<li><strong>Must have a valid driver&#39;s license</strong></li>\r\n	<li><strong>Must have a minimum of 6 months driving experience</strong></li>\r\n	<li><strong>Must be 18&nbsp;years old and older</strong></li>\r\n	<li><strong>A valid NIN is required</strong></li>\r\n	<li><strong>You must be a Nigerian Citizen or member of ECOWAS States</strong></li>\r\n</ul>', 1200000.00, 8, 20, 20, '2 hours', 'courses/GlndcLcglhkF56REEKLwmUMgyZkRv67jonyM3H9r.jpg', 'courses/l8CXSBkSmaShA0Qaar91zGCrsCpGbezcxsuXdzVl.jpg', '<h1><strong>🚌 BRT / School Bus Driving Training</strong></h1>\r\n\r\n<h3><strong>Safe Transport, Trusted Drivers</strong></h3>\r\n\r\n<p>Driving a <strong>school bus or BRT</strong> requires more than just steering a vehicle &mdash; it requires patience, alertness, and a sense of responsibility for lives on board. At <strong>BigRig International</strong>, our BRT/School Bus Driving Training prepares drivers for the <strong>unique challenges of passenger transport</strong>, from school children to urban commuters.</p>\r\n\r\n<h3>The Training Journey</h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Orientation</strong> &ndash; Introduction to the duties of a passenger vehicle driver, child/passenger safety, and BRT operations.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Classroom Sessions</strong> &ndash; Laws governing school buses and BRT systems, passenger rights, and route/ticketing management.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Practical Driving</strong> &ndash; Hands-on sessions on <strong>urban routes, bus stops, and simulated emergencies</strong>.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Safety Drills</strong> &ndash; Fire safety, evacuation, and first-aid scenarios.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Professional Development</strong> &ndash; Training on communication, patience, and customer service for public transport settings.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Certification</strong> &ndash; School Bus/BRT Driving Certificate that qualifies you for professional passenger transport roles.</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>What You&rsquo;ll Learn</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Passenger safety protocols &amp; child safeguarding</p>\r\n	</li>\r\n	<li>\r\n	<p>Emergency evacuation &amp; safety drills</p>\r\n	</li>\r\n	<li>\r\n	<p>Traffic laws for buses and large passenger vehicles</p>\r\n	</li>\r\n	<li>\r\n	<p>BRT route/ticketing management</p>\r\n	</li>\r\n	<li>\r\n	<p>Vehicle inspection and preventive maintenance</p>\r\n	</li>\r\n</ul>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>Schedule &amp; Duration</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>6 Weeks (3x weekly sessions, 1.5 hours each)</p>\r\n	</li>\r\n	<li>\r\n	<p>Weekend fast-track available (₦15,000 per weekend)</p>\r\n	</li>\r\n</ul>', NULL, '2025-03-27 04:25:31', '2025-09-02 10:28:18'),
(4, 'Conventional Driving Training', '<ul>\r\n	<li><strong>You must be 18&nbsp;years of age or older</strong></li>\r\n	<li><strong>You must have a valid NIN</strong></li>\r\n	<li><strong>You must be a Nigerian Citizen or member of ECOWAS States</strong></li>\r\n	<li><strong>You must pass&nbsp;vision test and basic medical check</strong></li>\r\n</ul>', 350000.00, 6, 20, 20, '40 Hours', 'courses/sCpiaEr9c1i7mrU4ZrhQpPOSaymwxWVtLoIvSdM0.png', NULL, '<h1><strong>🚗 Conventional Driving Training</strong></h1>\r\n\r\n<h3><strong>Build Confidence Behind the Wheel</strong></h3>\r\n\r\n<p>Driving is a life skill &mdash; but learning it the right way builds confidence for a lifetime. At <strong>BigRig International</strong>, our Conventional Driving Training helps new drivers master everyday driving with <strong>professional instruction, structured practice, and road safety awareness</strong>.</p>\r\n\r\n<h3>The Training Journey</h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Getting Started</strong> &ndash; Familiarization with vehicle controls and traffic rules.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Road Basics</strong> &ndash; Simple maneuvers, parking, reversing, and lane discipline.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>City Driving</strong> &ndash; Navigating through intersections, highways, and urban routes.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Defensive Driving</strong> &ndash; Techniques for accident avoidance, anticipation, and safe decision-making.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Final Assessment</strong> &ndash; Written test and road test to ensure competence.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Graduation</strong> &ndash; Receive your <strong>Standard Driving Certificate</strong>.</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>What You&rsquo;ll Learn</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Traffic laws, road signs, and right-of-way rules</p>\r\n	</li>\r\n	<li>\r\n	<p>Parking, turning, reversing, and lane changes</p>\r\n	</li>\r\n	<li>\r\n	<p>City and highway driving practice</p>\r\n	</li>\r\n	<li>\r\n	<p>Emergency handling and safety drills</p>\r\n	</li>\r\n	<li>\r\n	<p>Defensive driving skills</p>\r\n	</li>\r\n</ul>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>Schedule &amp; Duration</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>1 Month (12 theory + 12 practical sessions)</p>\r\n	</li>\r\n	<li>\r\n	<p>1 hour per session, weekdays</p>\r\n	</li>\r\n	<li>\r\n	<p>Weekend fast track: ₦8,000/weekend</p>\r\n	</li>\r\n</ul>', NULL, '2025-04-04 16:03:57', '2025-09-18 14:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `training_schedules`
--

CREATE TABLE `training_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `session_type` enum('theory','practical') NOT NULL DEFAULT 'theory',
  `students` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`students`)),
  `schedule_date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_stop` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enrolment_batch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `user_active` tinyint(1) NOT NULL DEFAULT 0,
  `website_visibility` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `enrolment_batch_id`, `firstName`, `middleName`, `lastName`, `gender`, `mobileNumber`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `role_id`, `profile_photo_path`, `user_active`, `website_visibility`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Adekola', NULL, 'Adedapo', 'Male', '+1 (913) 705-0526', 'adekola.adedapo@bigrigdrivingschool.ng', '2023-12-31 23:00:00', '$2y$12$4vyZtQOTNnFjM8NhiHI2H.3ztaH2eC24f3/KpbKzMsVIGvBTDlJf.', NULL, NULL, NULL, NULL, NULL, NULL, 'profile-photos/2Ygx6fHJ90yt0VjfK3sIBLPpg1Fi92kEqMfUNR3t.jpg', 1, 1, '2025-03-10 15:27:28', '2025-04-04 20:49:22'),
(2, NULL, 'Rilwan', NULL, 'Adelaja', 'Male', '+234 814 648 2898', 'rilwan.adelaja@bigrigdrivingschool.ng', '2025-03-23 22:17:15', '$2y$12$3uT/xrDuRSlDDcpMCSLIWO4ywrlQr9iva/erj3zT2arRQAk8ehM1.', NULL, NULL, NULL, NULL, NULL, NULL, 'profile-photos/EYJ8sIxdMY9JDq8DJPl4MF05Jkg89AtXt8c5RydO.jpg', 1, 1, '2025-03-22 16:53:47', '2025-04-04 20:51:54'),
(3, NULL, 'Tolulope', NULL, 'Fashola', 'Female', '+234 815 616 2164', 'tolulope.fashola@bigrigdrivingschool.ng', '2025-03-23 22:17:21', '$2y$12$lINfMn839kqbF2hSg173NOKHViCD32izROmDNdLiF0YuCbZ0f4xfe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-03-22 16:54:58', '2025-03-22 16:54:58'),
(4, NULL, 'Fegor', NULL, 'Otomi', 'Male', '+234 813 267 0440', 'fegor.otomi@bigrigdrivingschool.ng', '2025-03-23 22:17:25', '$2y$12$SLrvdmtqJYXUklV6LrU.C.PjDK0S1qsaQIa/qigC20mn8adP7BF/2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-03-22 16:56:27', '2025-03-22 16:56:27'),
(5, NULL, 'Iyanu', 'Damilare', 'Adabale', 'Male', '07033102202', 'iyanu.adebale@bigrigdrivingschool.ng', '2025-08-25 04:46:56', '$2y$12$lIFleG/a0KmFXRZ8ckn.aeZj.G0pdMyEPBypsPJP3MeBuarEZIzY2', NULL, NULL, NULL, NULL, NULL, NULL, 'users/xaevYaBzv0n1lcvCa49Edb3pnxg5SOhQubgt3NZ1.jpg', 1, 1, '2025-03-23 22:22:56', '2025-03-23 22:30:29'),
(6, NULL, 'Akinwumi', 'Hammed', 'Olalekan', 'Male', '08068650846', 'akinwumi.olalekan@bigrigdrivingschool.ng', '2025-08-25 04:47:02', '$2y$12$cotDgnAeozfXNT5icBOoIumDlVWamOBcwqRz5Q9v6WNZHX6Z6rFu.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-03-24 05:26:30', '2025-04-28 04:47:22'),
(7, NULL, 'Emeka', NULL, 'Okafor', 'Male', '+1 (318) 625-2254', 'emeka.okafor@bigrigdrivingschool.ng', '2025-08-24 07:38:42', '$2y$12$TT7kOUtCMJCCLpsscuVirOiSVzb/SkvGZ4/8OC4C5aqAYhROcg4cC', NULL, NULL, NULL, NULL, NULL, NULL, 'users/Ybm1pC2JK4sPNJkZzXLqHgvBemTH5sivOF0AMty0.png', 1, 1, '2025-03-27 14:13:27', '2025-03-27 14:13:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_company`
--
ALTER TABLE `about_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_course_id_foreign` (`course_id`),
  ADD KEY `announcements_batch_id_foreign` (`batch_id`),
  ADD KEY `announcements_created_by_foreign` (`created_by`);

--
-- Indexes for table `announcement_reads`
--
ALTER TABLE `announcement_reads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `announcement_reads_announcement_id_user_id_unique` (`announcement_id`,`user_id`),
  ADD KEY `announcement_reads_user_id_foreign` (`user_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_materials_objective_id_foreign` (`objective_id`),
  ADD KEY `course_materials_uploaded_by_foreign` (`uploaded_by`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curriculum_objective_id_foreign` (`objective_id`);

--
-- Indexes for table `email_configs`
--
ALTER TABLE `email_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_subscriptions`
--
ALTER TABLE `email_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolment_batches`
--
ALTER TABLE `enrolment_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_comments_forum_post_id_foreign` (`forum_post_id`),
  ADD KEY `forum_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `founder`
--
ALTER TABLE `founder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicals`
--
ALTER TABLE `medicals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicals_user_id_foreign` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_gateway_configs`
--
ALTER TABLE `payment_gateway_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indexes for table `role_courses`
--
ALTER TABLE `role_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_courses_role_id_foreign` (`role_id`),
  ADD KEY `role_courses_course_id_foreign` (`course_id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_role_id_foreign` (`role_id`),
  ADD KEY `role_permission_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedule_change_requests`
--
ALTER TABLE `schedule_change_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_change_requests_schedule_id_foreign` (`schedule_id`),
  ADD KEY `schedule_change_requests_instructor_id_foreign` (`instructor_id`),
  ADD KEY `schedule_change_requests_substitute_instructor_id_foreign` (`substitute_instructor_id`),
  ADD KEY `schedule_change_requests_reviewed_by_foreign` (`reviewed_by`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_attendance_student_id_schedule_id_unique` (`student_id`,`schedule_id`),
  ADD KEY `student_attendance_schedule_id_foreign` (`schedule_id`),
  ADD KEY `student_attendance_course_id_foreign` (`course_id`),
  ADD KEY `student_attendance_marked_by_foreign` (`marked_by`);

--
-- Indexes for table `student_instructor_distributions`
--
ALTER TABLE `student_instructor_distributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_instructor_distributions_enrolment_batch_id_foreign` (`enrolment_batch_id`),
  ADD KEY `student_instructor_distributions_student_id_foreign` (`student_id`),
  ADD KEY `student_instructor_distributions_instructor_id_foreign` (`instructor_id`),
  ADD KEY `student_instructor_distributions_course_id_foreign` (`course_id`);

--
-- Indexes for table `student_progress`
--
ALTER TABLE `student_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_progress_student_id_course_id_topic_id_type_unique` (`student_id`,`course_id`,`topic_id`,`type`),
  ADD KEY `student_progress_course_id_foreign` (`course_id`),
  ADD KEY `student_progress_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_objectives`
--
ALTER TABLE `training_objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_schedules`
--
ALTER TABLE `training_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_schedules_batch_id_foreign` (`batch_id`),
  ADD KEY `training_schedules_instructor_id_foreign` (`instructor_id`),
  ADD KEY `training_schedules_course_id_foreign` (`course_id`),
  ADD KEY `training_schedules_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobilenumber_unique` (`mobileNumber`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_enrolment_batch_id_foreign` (`enrolment_batch_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_company`
--
ALTER TABLE `about_company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement_reads`
--
ALTER TABLE `announcement_reads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_materials`
--
ALTER TABLE `course_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `email_configs`
--
ALTER TABLE `email_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_subscriptions`
--
ALTER TABLE `email_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrolment_batches`
--
ALTER TABLE `enrolment_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `founder`
--
ALTER TABLE `founder`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicals`
--
ALTER TABLE `medicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `payment_gateway_configs`
--
ALTER TABLE `payment_gateway_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role_courses`
--
ALTER TABLE `role_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schedule_change_requests`
--
ALTER TABLE `schedule_change_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_instructor_distributions`
--
ALTER TABLE `student_instructor_distributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_progress`
--
ALTER TABLE `student_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `training_objectives`
--
ALTER TABLE `training_objectives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `training_schedules`
--
ALTER TABLE `training_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `enrolment_batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcements_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `training_objectives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `announcement_reads`
--
ALTER TABLE `announcement_reads`
  ADD CONSTRAINT `announcement_reads_announcement_id_foreign` FOREIGN KEY (`announcement_id`) REFERENCES `announcements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcement_reads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD CONSTRAINT `course_materials_objective_id_foreign` FOREIGN KEY (`objective_id`) REFERENCES `training_objectives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_materials_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD CONSTRAINT `curriculum_objective_id_foreign` FOREIGN KEY (`objective_id`) REFERENCES `training_objectives` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD CONSTRAINT `forum_comments_forum_post_id_foreign` FOREIGN KEY (`forum_post_id`) REFERENCES `forum_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forum_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD CONSTRAINT `forum_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
