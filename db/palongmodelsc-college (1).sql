-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 04:16 AM
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
-- Database: `palongmodelsc-college`
--

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `committee_name` varchar(50) NOT NULL,
  `committee_designation` varchar(100) NOT NULL,
  `committee_photo` varchar(100) DEFAULT NULL,
  `added_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `committee_name`, `committee_designation`, `committee_photo`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(3, 'প্রধান শিক্ষক/শিক্ষিকা (পদাধিকার বলে)', 'সম্পাদক / সদস্য সচিব', 'Committee_Member_65467a153f6d8.jpg', 1, 1, '2023-11-04 11:06:29', '2023-11-04 11:06:29'),
(4, 'জনাব জালাল আহমদ', 'সভাপতি', NULL, 1, 1, '2023-11-04 11:13:11', '2023-11-04 11:13:11'),
(5, 'জনাব আকবর আহমদ চৌধুরী', 'দাতা সদস্য', NULL, 1, 1, '2023-11-04 11:13:54', '2023-11-04 11:13:54'),
(6, 'জনাব আকবর আহমদ চৌধুরী', 'দাতা সদস্য 2', NULL, 1, 0, '2023-11-04 11:19:37', '2023-11-04 11:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_description` varchar(1200) NOT NULL,
  `event_date` date NOT NULL,
  `event_photo` varchar(100) DEFAULT NULL,
  `added_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_description`, `event_date`, `event_photo`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'বার্ষিক ক্রীয়া ও পুরষ্কার বিতরণী অনুষ্ঠান ২০২৩', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '2023-11-05', NULL, 1, 1, '2023-11-03 13:45:46', '2023-11-04 00:51:39'),
(2, 'বার্ষিক ক্রীয়া ও পুরষ্কার বিতরণী অনুষ্ঠান ২০২৩', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '2023-11-09', 'Event_65454e1c2db16.jpg', 1, 1, '2023-11-03 13:46:36', '2023-11-04 12:22:31'),
(3, 'বার্ষিক ক্রীয়া ও পুরষ্কার বিতরণী অনুষ্ঠান ২০২৩', 'ioudhf  odiyhf  dioghf', '2023-11-11', 'Event_65468c451a390.png', 1, 1, '2023-11-04 12:24:05', '2023-11-04 12:24:05');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_title` varchar(100) NOT NULL,
  `image_paths` text DEFAULT NULL,
  `added_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `gallery_title`, `image_paths`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Admission Test 2023', '[\"Gallery_6545e5ffd32f8.jpg\",\"Gallery_6545e5ffd348d.png\"]', 1, 1, '2023-11-04 00:34:39', '2023-11-04 00:52:53'),
(3, 'Admission Test 2023', '[\"Gallery_6545e67c93574.png\"]', 1, 1, '2023-11-04 00:36:44', '2023-11-04 00:36:44'),
(4, 'সবার জন্য কম্পিউটার প্রশিক্ষণ প্রোগ্রাম', '[\"Gallery_6545eaa2707ba.jpg\",\"Gallery_6545eaa2709fd.jpg\",\"Gallery_6545eaa270b1b.jpg\",\"Gallery_6545eaa270c74.jpg\",\"Gallery_6545eaa270db0.jpg\",\"Gallery_6545eaa270ed0.jpg\"]', 1, 1, '2023-11-04 00:54:26', '2023-11-04 00:54:26');

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
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2023_10_30_150109_create_notices_table', 1),
(17, '2023_11_03_131450_create_teachers_table', 1),
(18, '2023_11_03_181251_create_committees_table', 1),
(19, '2023_11_03_190434_create_events_table', 2),
(20, '2023_11_04_060732_create_galleries_table', 3),
(21, '2023_11_04_103641_create_students_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notice_type` varchar(100) NOT NULL,
  `notice_summary` varchar(255) NOT NULL,
  `notice_file` varchar(100) NOT NULL,
  `added_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice_type`, `notice_summary`, `notice_file`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'School oihufd a 8aodfgyuh oahyudf oady oo8dyf9 oiyhg9asd f99y9asd  y98ydf  98ydf', 'School oihufd a 8aodfgyuh oahyudf oady oo8dyf9 oiyhg9asd f9', 'Notice_65468761e719c.pdf', 1, 1, '2023-11-04 12:03:13', '2023-11-04 12:03:46');

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` tinyint(3) UNSIGNED NOT NULL,
  `class_section` varchar(20) NOT NULL,
  `male_students` int(10) UNSIGNED NOT NULL,
  `female_students` int(10) UNSIGNED NOT NULL,
  `hindu_students` int(10) UNSIGNED NOT NULL,
  `buddhist_students` int(10) UNSIGNED NOT NULL,
  `added_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `class_name`, `class_section`, `male_students`, `female_students`, `hindu_students`, `buddhist_students`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'A', 108, 0, 2, 15, 1, 1, '2023-11-04 04:56:48', '2023-11-04 06:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_designation` varchar(100) NOT NULL,
  `taken_subject` varchar(150) NOT NULL,
  `teacher_description` varchar(150) NOT NULL,
  `teacher_photo` varchar(100) NOT NULL,
  `added_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_name`, `teacher_designation`, `taken_subject`, `teacher_description`, `teacher_photo`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'মোঃ আশেক উল্লাহ', 'ট্রেড ইন্সট্রাকটর', 'আইটি সাপোর্ট অ্যান্ড আইওটি বেসিক', 'আইটি সাপোর্ট অ্যান্ড আইওটি বেসিক', 'Teacher_654682f98ff9e.jpg', 1, 1, '2023-11-04 11:44:25', '2023-11-04 11:47:50'),
(2, 'মোঃ নুর হোসেন', 'প্রধান শিক্ষক (ভারপ্রাপ্ত)', 'I am an ambitious workaholic, but apart from that, pretty simple person.', 'I am an ambitious workaholic, but apart from that, pretty simple person.', 'Teacher_654684b39f1fb.jpg', 1, 1, '2023-11-04 11:51:47', '2023-11-04 11:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `permission` tinyint(4) NOT NULL DEFAULT 0,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `permission`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Rezaul Islam Khan', 'rezaul0495@gmail.com', 0, 1, NULL, '$2y$10$skanR1XjZJ8JDaIPbjJtF.reFzuVs7XhMg4vcEZldocvpIK81UsF2', 'E3I41HfXlUp9HUrHezDB2wwAdNiu346PqLzrRDBKMhwEjQo4GLA8JodzBae5', '2023-11-03 12:32:38', '2023-11-03 12:32:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
