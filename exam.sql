-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 07:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_digital_exam`
--

CREATE TABLE `create_digital_exam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `professional_group_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examing_body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_examination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_release` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_graders` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `create_digital_exam`
--

INSERT INTO `create_digital_exam` (`id`, `professional_group_number`, `examing_body`, `date_of_examination`, `exam_release`, `exam_graders`, `exam_id`, `created_at`, `updated_at`) VALUES
(1, '0884', 'IHK Stuttgart', '2022-03-17', 'asd', '019233', '622812596', '2022-03-04 05:34:20', '2022-03-04 05:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempts`
--

CREATE TABLE `exam_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accuracy` double(8,2) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_attempts`
--

INSERT INTO `exam_attempts` (`id`, `user_id`, `question_id`, `option_id`, `option_text`, `accuracy`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 2, '', 100.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(2, 11, 2, 9, '', 100.00, 1, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(3, 11, 3, 12, '', 100.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(4, 11, 4, 17, '', 100.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(5, 11, 5, 0, '', 100.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(6, 11, 6, 0, NULL, 0.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(7, 11, 6, 0, NULL, 0.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(8, 11, 6, 0, NULL, 0.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(9, 11, 6, 0, NULL, 0.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(10, 11, 7, 34, '', 100.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(11, 11, 8, 0, NULL, 0.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(12, 11, 8, 0, NULL, 0.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(13, 11, 8, 0, NULL, 0.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(14, 11, 8, 0, NULL, 0.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(15, 11, 8, 0, NULL, 0.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(16, 11, 9, 0, '', 100.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42'),
(17, 11, 10, 0, '{\"cost_quantity\":[null],\"cost_unit\":[null],\"cost_importance\":[null],\"cost_total\":[null],\"cost_grand_total\":null,\"material_quantity\":[null],\"material_unit\":[null],\"material_importance\":[null],\"material_total\":[null],\"material_grand_total\":null,\"invoice_sub_total\":null,\"invoice_tax\":null,\"invoice_grand_total\":null}', 0.00, 0, '2022-02-20 00:08:51', '2022-02-23 06:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2022_01_30_123454_create_questions_table', 1),
(6, '2022_01_30_123514_create_options_table', 1),
(7, '2022_01_30_124410_create_exam_attempts_table', 1),
(8, '2022_02_12_191035_create_student_exam_table', 1),
(9, '2022_02_13_181736_update_table_users_add_participant_number', 1),
(10, '2022_02_15_205145_create_question_time_table', 2),
(11, '2022_03_03_205257_create_create_digital_exam_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'An der roten Einfärbung', 0, NULL, NULL),
(2, 1, 'An der schwarzen Einfärbung', 0, NULL, NULL),
(3, 1, 'An der orangen Einfärbung', 1, NULL, NULL),
(4, 1, 'An der grünen Einfärbung', 0, NULL, NULL),
(5, 1, 'An der gelben Einfärbung', 0, NULL, NULL),
(6, 2, 'Nur auf die Wattzahl', 0, NULL, NULL),
(7, 2, 'Nur auf die Voltzahl', 0, NULL, NULL),
(8, 2, 'Auf die Ampere- und die Wattzahl', 0, NULL, NULL),
(9, 2, 'Auf die Volt- und die Wattzahl', 1, NULL, NULL),
(10, 2, 'Auf die Volt- und die Amperezahl', 0, NULL, NULL),
(11, 3, 'Gleichstrom', 0, NULL, NULL),
(12, 3, 'Pulsierender Wechselstrom', 0, NULL, NULL),
(13, 3, 'Gleichgerichteter Wechselstrom', 0, NULL, NULL),
(14, 3, 'Einphasiger Wechselstrom', 0, NULL, NULL),
(15, 3, 'Dreiphasiger Wechselstrom', 1, NULL, NULL),
(16, 4, 'd = 5,2 Inch (Zoll)', 0, NULL, NULL),
(17, 4, 'd = 8,0 Inch (Zoll)', 0, NULL, NULL),
(18, 4, 'd = 15,0 Inch (Zoll)', 1, NULL, NULL),
(19, 4, 'd = 18,0 Inch (Zoll)', 0, NULL, NULL),
(20, 4, 'd = 20,0 Inch (Zoll)', 0, NULL, NULL),
(21, 5, 'Ein Vielfachmessgerät mit Strommesszange in analoger Ausführung', 0, NULL, NULL),
(22, 5, 'Ein Vielfachmessgerät mit Strommesszange in digitaler Ausführung', 1, NULL, NULL),
(23, 5, 'Ein Vielfachmessgerät mit Spannungszange in analoger Ausführung', 0, NULL, NULL),
(24, 5, 'Ein Vielfachmessgerät mit Spannungszange in digitaler Ausführung', 0, NULL, NULL),
(25, 5, 'Ein Vielfachmessgerät mit Befestigungsmöglichkeit in digitaler Ausführung', 0, NULL, NULL),
(26, 6, 'Nicht genickt werden', 1, NULL, NULL),
(27, 6, 'nicht an der Karosserie oder den Fahrzeugachsen scheuern', 1, NULL, NULL),
(28, 6, 'nicht unter Spannung verbaut werden', 1, NULL, NULL),
(29, 6, 'nicht von starken Rost befallen werden', 1, NULL, NULL),
(30, 6, 'keine Vorbeschödigungen aufweisen', 1, NULL, NULL),
(31, 6, 'nicht gequescht sein', 1, NULL, NULL),
(32, 6, 'keine Scheuerstellen', 1, NULL, NULL),
(33, 6, 'Keine Rostnarben', 1, NULL, NULL),
(34, 7, 'Die Bördelbacken VAS 6056/6 sind für braune Bremsleitungen zu verwenden.', 0, NULL, NULL),
(35, 7, 'Die Bördelbacken VAS 6056/6 sind für gelbe Bremsleitungen zu verwenden.', 0, NULL, NULL),
(36, 7, 'Die Bördelbacken VAS 6056/6 sind für schwarze Bremsleitungen zu verwenden.', 1, NULL, NULL),
(37, 7, 'Die Bördelbacken VAS 6056/6 sind für blaue Bremsleitungen zu verwenden.', 0, NULL, NULL),
(38, 8, 'Bremsleitung vom Radbremszylinder abschrauben, die dabei auslaufende Bremsflüssigkeit auffangen und vorschriftsmäßig entsorgen', 1, NULL, NULL),
(39, 8, 'Bremsleitung an geeigneter Stelle (gerades, freizugängiges Stück) mit dem Rohrabschneider durchtrennen', 1, NULL, NULL),
(40, 8, 'Auszutauschendes Stück entfernen', 1, NULL, NULL),
(41, 8, 'Bremsleitungsoberfläche entfetten', 1, NULL, NULL),
(42, 8, 'Bremsleitung in der Gripzange so einklemmen, dass etwa 50 mm aus den Kunststoffbacken herausschauen', 1, NULL, NULL),
(43, 9, 'Mit dem Schälwerkzeug wird die Beschichtung der Bremsleitung entfernt und auch entgratet.', 1, NULL, NULL),
(44, 10, 'Gesamt: 224,79 EUR', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Woran ist der Hochvoltkabelstrang im Kraftfahrzeug zu erkennen?', 'multiple_choice', NULL, NULL),
(2, 'Eine defekte Glühlampe soll ersetzt werden. Worauf ist bei der Auswahl der Ersatzglühlampe unter anderem zu achten?', 'multiple_choice', NULL, NULL),
(3, 'Welche Stromart entsteht in den Ständerwicklungen eines Drehstromgenerators?', 'multiple_choice', NULL, NULL),
(4, 'Auf einem Kundenfahrzeug ist folgendes Rad montiert: Reifenbreite b = 205 mm, Felgendurchmesser d = 381 mm und Reifenhöhe h = 133,25 mm.', 'multiple_choice', NULL, NULL),
(5, 'Welches Messgerät wird im Bild gezeigt?', 'multiple_choice', NULL, NULL),
(6, 'Nennen Sie vier Punkte, die bei der Sichtprüfung und Montage von Bremsleitungen besonders zu beachten sind.', 'blanks_no_sequence', NULL, NULL),
(7, 'Nennen Sie die Besonderheit des Sonderwerkzeugs VAS 6056/6.', 'dropdown', NULL, NULL),
(8, 'Sie wollen das beschädigte Stück der Bremsleitung erneuern. Ermitteln Sie die erforderlichen Arbeitsschritte in der richtigen Reihenfolge, bevor Sie mit dem Schälwerkzeug arbeiten können.', 'blanks_sequence', NULL, NULL),
(9, 'Nennen Sie die Aufgabe des Schälwerkzeugs.', 'textarea', NULL, NULL),
(10, 'Erstellen Sie für die durchgeführten Arbeiten eine Kundenrechnung.', 'invoice', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_time`
--

CREATE TABLE `question_time` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `starttime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endtime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totaltime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_time`
--

INSERT INTO `question_time` (`id`, `user_id`, `starttime`, `endtime`, `totaltime`, `question_id`, `created_at`, `updated_at`) VALUES
(104, 9, '2022-02-21 22:57:39', '2022-02-21 22:57:41', NULL, 2, '2022-02-22 06:57:39', '2022-02-22 06:57:41'),
(105, 9, '2022-02-21 22:57:41', NULL, NULL, 3, '2022-02-22 06:57:41', '2022-02-22 06:57:41'),
(106, 9, '2022-02-23 20:31:51', NULL, NULL, 1, '2022-02-24 04:31:51', '2022-02-24 04:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `student_exam`
--

CREATE TABLE `student_exam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_score` double(8,2) NOT NULL,
  `started_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `marked_correct_by_teacher` tinyint(1) NOT NULL DEFAULT 0,
  `marked_correct_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_exam`
--

INSERT INTO `student_exam` (`id`, `user_id`, `total_score`, `started_time`, `end_time`, `marked_correct_by_teacher`, `marked_correct_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1.00, '2022-02-14 20:03:06', '2022-02-14 20:03:45', 0, NULL, '2022-02-15 04:03:45', '2022-02-15 04:03:45'),
(2, 3, 0.00, '2022-02-15 21:31:20', '2022-02-15 21:47:09', 0, NULL, '2022-02-16 05:47:09', '2022-02-16 05:47:09'),
(3, 3, 0.00, '2022-02-15 21:52:59', '2022-02-15 21:53:21', 0, NULL, '2022-02-16 05:53:21', '2022-02-16 05:53:21'),
(4, 3, 0.00, '2022-02-15 21:55:29', '2022-02-15 21:58:50', 0, NULL, '2022-02-16 05:58:50', '2022-02-16 05:58:50'),
(5, 3, 0.00, '2022-02-15 21:59:51', '2022-02-15 22:00:14', 0, NULL, '2022-02-16 06:00:14', '2022-02-16 06:00:14'),
(6, 3, 0.00, '2022-02-15 21:59:51', '2022-02-15 22:00:33', 0, NULL, '2022-02-16 06:00:33', '2022-02-16 06:00:33'),
(7, 3, 0.00, '2022-02-15 21:59:51', '2022-02-15 22:03:14', 0, NULL, '2022-02-16 06:03:14', '2022-02-16 06:03:14'),
(8, 3, 0.00, '2022-02-15 21:59:51', '2022-02-15 22:03:54', 0, NULL, '2022-02-16 06:03:54', '2022-02-16 06:03:54'),
(9, 3, 0.00, '2022-02-15 22:06:03', '2022-02-15 22:06:31', 0, NULL, '2022-02-16 06:06:31', '2022-02-16 06:06:31'),
(10, 4, 2.00, '2022-02-15 22:07:40', '2022-02-15 22:07:58', 0, NULL, '2022-02-16 06:07:58', '2022-02-16 06:07:58'),
(11, 5, 0.00, '2022-02-15 22:28:35', '2022-02-15 22:29:01', 0, NULL, '2022-02-16 06:29:01', '2022-02-16 06:29:01'),
(12, 5, 1.00, '2022-02-15 22:38:18', '2022-02-15 22:38:43', 0, NULL, '2022-02-16 06:38:43', '2022-02-16 06:38:43'),
(13, 8, 2.00, '2022-02-16 22:12:35', '2022-02-16 22:15:33', 0, NULL, '2022-02-17 06:15:33', '2022-02-17 18:08:20'),
(14, 11, 1.00, '2022-02-19 16:08:32', '2022-02-19 16:08:51', 1, '2022-02-22 22:42:42', '2022-02-20 00:08:51', '2022-02-23 06:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `participant_number`, `code`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 'admin', NULL, '$2y$10$bOmlVaogkzg.WGnIGQ3hL.kXm77Hkp7gg3AbbVFH7bJDY0TIJzLVC', NULL, NULL, NULL),
(9, 'asd', 'stu-621004a26ce55@gmail.com', 'asd', 'asd', NULL, '$2y$10$3/QZEnU0HT683Ce3uEhENOhIjnx0K.gYQmAXeJrjrmYeOwvGvHY7y', NULL, '2022-02-19 05:42:11', '2022-02-19 05:42:11'),
(11, '12', 'stu-621107e223071@gmail.com', '12', '12', NULL, '$2y$10$xVfyVlT3xh5KSyMRyTiwn.xbC/yGRtdJUaOO422xHY2PRGOM7Dd6G', NULL, '2022-02-20 00:08:18', '2022-02-20 00:08:18'),
(12, 'asd1', 'stu-62124bc6468e1@gmail.com', 'asd1', 'asd1', NULL, '$2y$10$.VvIrIqxSVmvFcNcD0hY0OrmXEvNIkz1j8.46fcsCN94B7YX4Qbr.', NULL, '2022-02-20 23:10:14', '2022-02-20 23:10:14'),
(14, 'Maglia', 'Maglia@digitales-pruefen.de', NULL, '842003', NULL, '$2y$10$QxOO5HnfyOlTFLZShKuVz.8oZKfkTLuyXwGcH6f2Yp7cnqvWl1xf2', NULL, NULL, NULL),
(15, 'sajid', 'stu-62154eecab07f@gmail.com', 'sajid', 'sajid', NULL, '$2y$10$r1JEksgBghHQkb5BEtePdOc4zvuIoU66nGuoiZSpO5fNO6wJFq0U2', NULL, '2022-02-23 06:00:28', '2022-02-23 06:00:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_digital_exam`
--
ALTER TABLE `create_digital_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_attempts`
--
ALTER TABLE `exam_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_time`
--
ALTER TABLE `question_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_exam`
--
ALTER TABLE `student_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_code_unique` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_digital_exam`
--
ALTER TABLE `create_digital_exam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_attempts`
--
ALTER TABLE `exam_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `question_time`
--
ALTER TABLE `question_time`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `student_exam`
--
ALTER TABLE `student_exam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
