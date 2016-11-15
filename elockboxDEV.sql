-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2016-11-16 00:50:37
-- 服务器版本： 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elockboxDEV`
--

-- --------------------------------------------------------

--
-- 表的结构 `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(2, 2, 'qNRLnrlxlUtzNNDxFbbkWrMHfASKGaJs', 1, '2016-10-28 08:00:35', '2016-10-28 08:00:35', '2016-10-28 08:00:35'),
(3, 3, 'aPEFjpbSTA1W5nPteCVmBEGXI503x1Go', 1, '2016-10-29 06:38:31', '2016-10-29 06:38:31', '2016-10-29 06:38:31'),
(4, 4, 'ENOVzwnRSDgO0LBaCHTJZZ0KWb678LUo', 1, '2016-10-29 07:28:45', '2016-10-29 07:28:45', '2016-10-29 07:28:45'),
(5, 5, 'Qfexa0j5Pon8Uo6EtPCXuA2Dvk1rycC6', 1, '2016-11-01 06:54:01', '2016-11-01 06:54:01', '2016-11-01 06:54:01'),
(6, 6, 'FnOiCLhRlLQtSTirNY7cCizYRhTVOYTQ', 1, '2016-11-08 09:27:31', '2016-11-08 09:27:31', '2016-11-08 09:27:31'),
(7, 7, 'PQn58WJgwBFlhSCjiRX3wZf0xdhazzmP', 1, '2016-11-12 09:39:15', '2016-11-12 09:39:15', '2016-11-12 09:39:15'),
(8, 8, 'Ji0thZWTRDOiUv5DQE60JTt0OLicI3Eh', 1, '2016-11-12 09:42:46', '2016-11-12 09:42:46', '2016-11-12 09:42:46'),
(9, 9, 'fYmtZSrgVrNxnEm9V0EXNUJPQ2DMaBZY', 1, '2016-11-12 09:46:34', '2016-11-12 09:46:34', '2016-11-12 09:46:34');

-- --------------------------------------------------------

--
-- 表的结构 `code`
--

CREATE TABLE `code` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `code`
--

INSERT INTO `code` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(2, 2, '439951', '2016-10-28 08:00:35', '2016-10-28 08:00:35'),
(3, 3, '455863', '2016-10-29 06:38:31', '2016-10-29 06:38:31'),
(4, 4, '412723', '2016-10-29 07:28:45', '2016-10-29 07:28:45'),
(5, 5, '855938', '2016-11-01 06:54:01', '2016-11-01 06:54:01'),
(6, 6, '959806', '2016-11-08 09:27:31', '2016-11-08 09:27:31'),
(7, 7, '100000000', '2016-11-12 09:39:15', '2016-11-12 09:39:15'),
(8, 8, '100000000', '2016-11-12 09:42:46', '2016-11-12 09:42:46'),
(9, 9, '100000000', '2016-11-12 09:46:34', '2016-11-12 09:46:34');

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(2, '2016_10_27_035054_vrfycode', 1),
(3, '2016_11_12_004440_profile', 2);

-- --------------------------------------------------------

--
-- 表的结构 `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 2, 'zdor0yWHnd7EFH2SX1vy4VwpA2lAJDo1', '2016-10-28 08:10:03', '2016-10-28 08:10:03'),
(2, 2, 'pKnhZ3v0vSmrZ8hb7OqukXbV3XQOZdKG', '2016-10-28 08:13:39', '2016-10-28 08:13:39'),
(3, 2, 'yyKf40NJxh3vWx5ECWPMBru5lRTOtG2c', '2016-10-28 08:14:58', '2016-10-28 08:14:58'),
(4, 2, '8Jpj0CvpYMEc0MP2nx6dehk53Kft5bXy', '2016-10-28 08:15:50', '2016-10-28 08:15:50'),
(5, 2, 'gV6Uccc3vlJQpUdlYP9i5TC23xDmJu2p', '2016-10-28 08:19:48', '2016-10-28 08:19:48'),
(6, 2, 'tn63sz1RPyYfiEP3dKU62ThTwOu9D5Al', '2016-10-28 08:20:05', '2016-10-28 08:20:05'),
(7, 2, 'etrQD3qlBdxokhG34jvYpgL66kLlVaGu', '2016-10-28 08:28:44', '2016-10-28 08:28:44'),
(8, 2, 'hyiwI9q8R6SaHUEZBy1L0Y7pns4r4g7Y', '2016-10-28 08:35:53', '2016-10-28 08:35:53'),
(9, 2, '8pHEjZdvKs3lrmjlHEt7AgOc27kIZlqR', '2016-10-28 08:36:18', '2016-10-28 08:36:18'),
(10, 2, 'ZCgQoKdgxPA3zRKOckuOlgbuip6w9v2V', '2016-10-28 08:37:02', '2016-10-28 08:37:02'),
(11, 2, '3LZNucG53oKpNrvyxehtbAvRnU1oDGFf', '2016-10-28 08:39:16', '2016-10-28 08:39:16'),
(12, 2, 'fV0YaSyYi92r5yqkoRxFd2L6crJGfyKx', '2016-10-28 08:39:54', '2016-10-28 08:39:54'),
(13, 2, '9P0F1RUNZAZufI7J81nGfedovp4LAJUc', '2016-10-28 08:40:35', '2016-10-28 08:40:35'),
(14, 2, 'k3VTrZ4kyGg6x11AavQnJtnu3HFnJzn4', '2016-10-28 08:41:31', '2016-10-28 08:41:31'),
(15, 2, 'oCTzqyyK3ZOMqQjCeIX5kPlgOAHW0UDW', '2016-10-28 08:41:50', '2016-10-28 08:41:50'),
(16, 2, 'KjG8ExurThZJj5vmld7RrVqKPDYHy9Qc', '2016-10-28 08:41:57', '2016-10-28 08:41:57'),
(17, 2, 'tK4wRLUd6OHfjBjm8VqH236pXoYPZdCx', '2016-10-28 08:44:41', '2016-10-28 08:44:41'),
(18, 2, 'y1ViLeFCWGUcWOXzNAPfXOckhYfSLMhr', '2016-10-28 08:46:22', '2016-10-28 08:46:22'),
(19, 2, 'hptaBvh9vxXuraByEqNcLbEabLmz2Ihu', '2016-10-28 08:48:48', '2016-10-28 08:48:48'),
(20, 2, '5WmrP02x57c4PUQbFDoD7iKKB5OOOrN1', '2016-10-28 08:50:33', '2016-10-28 08:50:33'),
(21, 2, 'Ss8rjl0y92OlXi7NniC1dYiyoQjU9qQ2', '2016-10-28 08:51:51', '2016-10-28 08:51:51'),
(22, 2, 'Pzk3mpnUsY7gfklohL12p4vx9QDE0jxn', '2016-10-28 08:53:01', '2016-10-28 08:53:01'),
(23, 2, '8og7qpOEWxdzxfWPX0zR5hz7Vvq9fsCj', '2016-10-28 08:53:29', '2016-10-28 08:53:29'),
(24, 2, 'TD7fNg38bGgEc27ADnqZrYsOMYhyhNFj', '2016-10-28 08:54:09', '2016-10-28 08:54:09'),
(25, 2, 'B4LK6R0Wqe8xqFXnBkFwI5M1TK75KUNJ', '2016-10-28 08:56:07', '2016-10-28 08:56:07'),
(26, 2, 'HfjMXHLfO4Z1P28QYVOJKcs5NBOLUzA2', '2016-10-28 08:57:56', '2016-10-28 08:57:56'),
(27, 2, 'CnHH1l0Lnv4W7ATO2iBUnpk9maseU555', '2016-10-28 08:58:53', '2016-10-28 08:58:53'),
(28, 2, 'sYiVDUzrnwrbAfkhEI7CdQ6t6rKs5ykL', '2016-10-28 08:59:03', '2016-10-28 08:59:03'),
(29, 2, 'tIyUY1Xfx2IT9Ssd3nYli6MzDi1rtM7N', '2016-10-28 08:59:48', '2016-10-28 08:59:48'),
(30, 2, 'wivvuWXYgGoT2c2v9VWIAzlknSYmBi3i', '2016-10-28 09:00:58', '2016-10-28 09:00:58'),
(31, 2, 'xvVzFO3XBOmLChbdRxX8okrJAf7cckwL', '2016-10-28 09:01:17', '2016-10-28 09:01:17'),
(32, 2, 'v2FRrR7YAJeCv1BEDtGDEIqZH4SE56sj', '2016-10-28 09:02:04', '2016-10-28 09:02:04'),
(33, 2, 'qroQTgfYiDjVzJfzNXGmCjORR6XHFxBN', '2016-10-28 09:02:35', '2016-10-28 09:02:35'),
(34, 2, '4XhNoRhjWbHgvmqJK427ZuI7vRSOz32b', '2016-10-28 09:03:28', '2016-10-28 09:03:28'),
(35, 2, '13NXFOT8krjMRtRFSrxp9arqV8UkIMEO', '2016-10-28 09:08:00', '2016-10-28 09:08:00'),
(36, 2, 'znItijmwA5kumg4oM50vijTw92jQs5fs', '2016-10-28 09:08:27', '2016-10-28 09:08:27'),
(37, 2, 'tBb0998OhANdH7VlmVKPPg9KPn5hKzdB', '2016-10-28 09:08:50', '2016-10-28 09:08:50'),
(38, 2, 'joe5K8duyKL2k2BYj9RPz5M0yxExtp8X', '2016-10-28 09:10:47', '2016-10-28 09:10:47'),
(39, 2, 'Gnn7wMOkYQ1cmUgaFMWfHokWrUBiR6Ve', '2016-10-28 09:12:50', '2016-10-28 09:12:50'),
(40, 2, 'Et7xrppRBmYEb822CP5MnkpRRVQ8ARe3', '2016-10-28 09:13:30', '2016-10-28 09:13:30'),
(41, 2, 'VxSuPgC5PVbe72BLbPaXdyKgY3kHUF95', '2016-10-28 09:15:55', '2016-10-28 09:15:55'),
(42, 2, 'sdCePlDUoJB5LCaVGGOct1JdPzQMzrzv', '2016-10-28 09:16:13', '2016-10-28 09:16:13'),
(43, 2, 'fcYX931oI5tnPbllvgGcJPG6m6AfB6Zb', '2016-10-28 09:16:38', '2016-10-28 09:16:38'),
(44, 2, '7UR2zJHpTf7kqcN5ylWrcAygpjqQI74T', '2016-10-28 09:16:53', '2016-10-28 09:16:53'),
(45, 2, 'WsHLBKacpgD8jZVQxn1sD00cqvYAs78K', '2016-10-28 09:17:12', '2016-10-28 09:17:12'),
(46, 2, 'aVW82gwZ4NmujE1hF1DTAhrXesk9skx7', '2016-10-28 09:18:55', '2016-10-28 09:18:55'),
(47, 2, '8ckTY8vzipJMnIfG4aNy2iYai5XtxMs8', '2016-10-28 09:19:36', '2016-10-28 09:19:36'),
(48, 2, 'LTLazguTnjWDwnhY0UGSUkJzcRkfVtbz', '2016-10-28 09:20:08', '2016-10-28 09:20:08'),
(49, 2, 'kSwUWs4wU3jXL8UK3Qmv4jzV5gVeymlD', '2016-10-28 09:20:52', '2016-10-28 09:20:52'),
(50, 2, 'UMcshVF84HffiLEjXgUyOuzuZCqmoaqd', '2016-10-28 09:21:04', '2016-10-28 09:21:04'),
(51, 2, 'aLclAfpcRx9ddXRZd62wuVGsoFXoieaG', '2016-10-28 09:24:01', '2016-10-28 09:24:01'),
(52, 2, 'fiEzMUerZdF4mJZ20KQyioeif3exwp9A', '2016-10-28 09:27:29', '2016-10-28 09:27:29'),
(53, 2, '8KXj66b9lxNcxShMbuiTt2HLf684azlh', '2016-10-28 09:29:05', '2016-10-28 09:29:05'),
(54, 2, 'BNz2FOyjC0jmLUsEHNXeGEKq7zrnKNqk', '2016-10-28 09:29:38', '2016-10-28 09:29:38'),
(55, 2, '4EL2StiN4b0yBd67MNay2uQcYFXuBOc2', '2016-10-28 09:31:20', '2016-10-28 09:31:20'),
(56, 2, 'vsCaSJx9Fhaab6UFjjvUXk2FsWeMXtJr', '2016-10-28 09:32:59', '2016-10-28 09:32:59'),
(57, 2, 'NfwbiEH1rOpIuFKCutLaAdbOPZpL5xkQ', '2016-10-28 09:36:12', '2016-10-28 09:36:12'),
(58, 2, 'IM1NmHgy3PDU8BW3zzKXG9DWNAt0meYo', '2016-10-28 09:37:04', '2016-10-28 09:37:04'),
(59, 2, 'aj5APfRkHvkbQR7bxi4XFXzX1HqThoWb', '2016-10-28 09:48:04', '2016-10-28 09:48:04'),
(60, 2, 'uusMnFiUQH3Pduzd9m8FQfIpcCiaOsML', '2016-10-28 09:48:28', '2016-10-28 09:48:28'),
(61, 2, 'ACtnxZxk2GSD3I1mUcTyxSO5nO2qxHaB', '2016-10-28 09:52:47', '2016-10-28 09:52:47'),
(62, 2, 'ygXFIl2SxdyJBkIjd0oXuFU55MNKxCdt', '2016-10-28 09:53:24', '2016-10-28 09:53:24'),
(63, 2, '7Nifp3gUjztoV2VUIcgufAtU3IgEdSgx', '2016-10-28 09:54:48', '2016-10-28 09:54:48'),
(64, 2, 'jr3bFET0aKmhMdrBvQZ45Emw3mqWIjj6', '2016-10-28 10:00:15', '2016-10-28 10:00:15'),
(65, 2, 'nVpzLd3lKj5Y3uD9u6m68oo1fTSMgnXd', '2016-10-28 10:00:27', '2016-10-28 10:00:27'),
(66, 3, '4hnr5BPsNWvAaLjgRKX9NDxEzxYYjP1h', '2016-10-29 06:38:51', '2016-10-29 06:38:51'),
(67, 3, 'c0FxkgMvysrZmYBEoJp9g9LHrqqtMKRs', '2016-10-29 06:39:55', '2016-10-29 06:39:55'),
(68, 3, '7tTYxKIQVjDY761FykY4Rvn92QZYqj5F', '2016-10-29 06:41:15', '2016-10-29 06:41:15'),
(69, 3, '2owhXpQ9iTi0Qj6dGM6yE04wLpR7ALZX', '2016-10-29 06:44:35', '2016-10-29 06:44:35'),
(70, 3, '6YmudjxgkWOhlocJl2RDxI3RG5j0oBAe', '2016-10-29 06:47:17', '2016-10-29 06:47:17'),
(71, 3, '93VIFEd5VFTnlSqcPPklM3Jx1NStlWAu', '2016-10-29 06:50:20', '2016-10-29 06:50:20'),
(72, 3, '1MvAOaWq7jndNlXDOLzbNhoVgWW45BFM', '2016-10-29 06:52:34', '2016-10-29 06:52:34'),
(73, 3, 'oT3f1xXawPrNooceJZAVexW09VeEQk93', '2016-10-29 06:57:30', '2016-10-29 06:57:30'),
(74, 3, 'zNMeiOSHwA4zxVeDhPGPriXSizBnfk66', '2016-10-29 07:00:40', '2016-10-29 07:00:40'),
(75, 3, 'lwTqR9tP84F9J6XH2lWMTmSHoyqUh70K', '2016-10-29 07:01:55', '2016-10-29 07:01:55'),
(76, 3, 'odgVcjxjDECvJek8gnUCGA9RBBBDMbvC', '2016-10-29 07:03:48', '2016-10-29 07:03:48'),
(77, 3, 'J6o3u2J7dOol7jjN4sSfv2cGGbCJNCI8', '2016-10-29 07:04:51', '2016-10-29 07:04:51'),
(78, 3, 'CRXDND66yQTgl62YCi1nSQT7BQeWmF0G', '2016-10-29 07:08:57', '2016-10-29 07:08:57'),
(79, 3, 'jK0IgTInGeM3wli3a9tHOC6iqBlBdUFf', '2016-10-29 07:11:32', '2016-10-29 07:11:32'),
(80, 3, 'otPMLVnoQxSblu99MKN9FgGgzSPXsEMk', '2016-10-29 07:13:08', '2016-10-29 07:13:08'),
(81, 3, 'LeFK1DYnTyeNDfJEqjVwq1Ch2rhLhLnn', '2016-10-29 07:18:38', '2016-10-29 07:18:38'),
(82, 3, 'xVH0TdJzEvsRMbBONxODLGMZdo1iz0GM', '2016-10-29 07:19:39', '2016-10-29 07:19:39'),
(83, 3, 'QYi9rwBJfyd62SOm8xhsuXrw6WGz2yRN', '2016-10-29 07:23:16', '2016-10-29 07:23:16'),
(84, 3, 'T9A5YbcecLGAPuRyimAwmzGs7G7qUZfE', '2016-10-29 07:23:24', '2016-10-29 07:23:24'),
(85, 3, 'qv5D58uWRsS1Wl7qZZnFXtvn0PFwxQOv', '2016-10-29 07:27:26', '2016-10-29 07:27:26'),
(86, 4, 'TDFhDBCBIRmHDd5pWRY8VSDkk1OFgSHr', '2016-10-29 07:28:55', '2016-10-29 07:28:55'),
(87, 3, 'pfSQC8j4FJQT1P25WPdEAgP0aeiPra9Z', '2016-10-29 07:39:21', '2016-10-29 07:39:21'),
(88, 3, 'YhvZlLCMtb7riyoto0J73KVAllfc1j6X', '2016-10-29 07:39:54', '2016-10-29 07:39:54'),
(89, 3, 'l9xKseNfLiiJOBzxKAMJ7sHhACAhrnkn', '2016-10-29 07:41:57', '2016-10-29 07:41:57'),
(90, 3, 'jN2r1eDAZC05CwqvwVPss3EI00l1fTZC', '2016-10-29 07:42:12', '2016-10-29 07:42:12'),
(91, 3, 'mqGbmS1RpVpsVXmx21R1Iy97QbYuHqzX', '2016-10-29 07:42:33', '2016-10-29 07:42:33'),
(92, 3, 'RIFf5MGVklThACSUAjCxCOOHX9XGDvyQ', '2016-10-29 07:44:26', '2016-10-29 07:44:26'),
(93, 3, 'x2caxctLrrDUTymCE3WDDL2BGpQdavqY', '2016-10-29 07:45:56', '2016-10-29 07:45:56'),
(94, 3, 'JYZdNKgnYNBr5AYJiIh6dyrws0SMF4JW', '2016-10-29 09:30:42', '2016-10-29 09:30:42'),
(95, 3, 'Zdlse9JU5NsKFhFS2RFksE37wLAXZho7', '2016-10-29 09:31:34', '2016-10-29 09:31:34'),
(96, 3, 'V5Lg7wPMqZ8wE0dd54y7Vh0XH8ydYt0R', '2016-10-29 09:32:06', '2016-10-29 09:32:06'),
(97, 3, '6vPs5Pr07M4mC6rVKwCG6oXakfjpMduD', '2016-11-01 06:34:45', '2016-11-01 06:34:45'),
(98, 3, '26ZApk4QFpEuV7vnPA7DRZeu8mOwnYES', '2016-11-01 06:54:43', '2016-11-01 06:54:43'),
(99, 5, 'SxoAIiDGgpcZLcWDGFjcLSpwX8huQyn2', '2016-11-01 06:55:14', '2016-11-01 06:55:14'),
(100, 3, 'a5Dvu1cGjE9579jQUY6LceuGV1NV6sdK', '2016-11-01 07:11:16', '2016-11-01 07:11:16'),
(101, 3, 'kbVt1HkWUtOMs6gDFDlPAIcjZSUxS79d', '2016-11-01 08:21:00', '2016-11-01 08:21:00'),
(102, 3, 'zsSEMDImx4c1VTr9cJfhc2TJoHAAUYUp', '2016-11-01 08:22:02', '2016-11-01 08:22:02'),
(103, 3, 'hfrT1aOXRXhm5HPy2FOqAoiI8rq4OLnZ', '2016-11-01 08:23:11', '2016-11-01 08:23:11'),
(104, 3, '9DjWGY6QmTpYB4aJJHLqiFyOwqf1PQsy', '2016-11-01 08:26:26', '2016-11-01 08:26:26'),
(105, 3, '6jVZMuW6k3X7zJt5GcFPl5gyiXCHlwZj', '2016-11-01 08:29:11', '2016-11-01 08:29:11'),
(106, 3, 'q7nP8w5chrj60UYaMvLiCo3in3GlVoKh', '2016-11-01 08:29:47', '2016-11-01 08:29:47'),
(107, 3, 'kUWdl8P5nJ9skQeQ0nWkOCAV1qNMPwKS', '2016-11-01 08:30:16', '2016-11-01 08:30:16'),
(108, 3, '0gbezaeckgwwxnBIZb7YePuqEd048n78', '2016-11-01 08:31:14', '2016-11-01 08:31:14'),
(109, 3, 'AfQAIzDLaOLx50nPUqN05E6IqByKkZIo', '2016-11-01 08:32:31', '2016-11-01 08:32:31'),
(110, 3, '0Faow49jyNETZBIjq0L6WDMIQzxEkPh2', '2016-11-01 08:33:24', '2016-11-01 08:33:24'),
(111, 3, '3BTSJLezTd1WHnCihGt8qtrPlw2CfzqO', '2016-11-01 08:35:09', '2016-11-01 08:35:09'),
(112, 3, 'dezpbbMzFGF8nAwT3JDbesi94JWzEaK4', '2016-11-01 08:38:32', '2016-11-01 08:38:32'),
(113, 3, 'ikTRMSr5AVxiO55oxZG3wPQf7Rz5mICo', '2016-11-01 08:39:41', '2016-11-01 08:39:41'),
(114, 3, '7epVXKh2kgFOgFLd3LCuOOGF9hcfUEBf', '2016-11-01 08:41:11', '2016-11-01 08:41:11'),
(115, 3, '3VdKHKOvtdI3suPoWrgA94Lsk9y8ooyE', '2016-11-01 08:41:49', '2016-11-01 08:41:49'),
(116, 3, 'ZAKKDYJQy5KdFrjMZGyHe78klsODGgKY', '2016-11-01 08:44:48', '2016-11-01 08:44:48'),
(117, 3, 'XzFOAw2Sd8lk7M2nHn6B5RjbfEl3uKK1', '2016-11-01 08:46:48', '2016-11-01 08:46:48'),
(118, 2, 'y90qu6nKFRZ5rrCJeDyffEw0lkINqzmF', '2016-11-01 08:49:02', '2016-11-01 08:49:02'),
(119, 3, 'Sh7UhuXNfU7fMuJnaYMnP2POvizbLNnx', '2016-11-01 08:56:52', '2016-11-01 08:56:52'),
(120, 3, '05plfC8EUiGDY6Tg63cwFYAl6SVbAPUO', '2016-11-01 08:58:43', '2016-11-01 08:58:43'),
(121, 3, 'bt2AdyFN17aSYp81W4b098lHWNLOFJ3j', '2016-11-01 09:04:35', '2016-11-01 09:04:35'),
(122, 3, 'OoPCJKHcxLHcnE9UrNGFI0U2jRQnjHzc', '2016-11-01 09:07:07', '2016-11-01 09:07:07'),
(123, 3, 'pv7ZYFm6zimSg0zl5mql3VfjqDr9ZJ0X', '2016-11-01 09:08:52', '2016-11-01 09:08:52'),
(124, 3, 'lVq3Kfpd0IPMuDDJk91YUNOBGxBInm80', '2016-11-01 09:12:37', '2016-11-01 09:12:37'),
(125, 3, 'sJriDV682S893dB4H95wksurytSOp5jR', '2016-11-01 09:13:58', '2016-11-01 09:13:58'),
(126, 3, 'ncp618gOurjsKer8HcIEgR8so3fIpJib', '2016-11-01 09:15:52', '2016-11-01 09:15:52'),
(127, 3, '64HjcOqzkVi0UgzWo4uRXIROujwiwwcm', '2016-11-01 09:16:27', '2016-11-01 09:16:27'),
(128, 3, 'ciTOZtt5OLw10xI7hBrrSIKUYAEBMDvs', '2016-11-01 09:19:39', '2016-11-01 09:19:39'),
(129, 3, 't9yWXR8mlWCfkTyGYnvOyPqMx0usPbeS', '2016-11-01 09:22:35', '2016-11-01 09:22:35'),
(130, 3, 'HLc945GtSL4BakYJaYqWmeaqDGtpP1vJ', '2016-11-01 09:30:20', '2016-11-01 09:30:20'),
(131, 3, 'Blk68k3XH5TamEcNXQNzDbDIahgDBEej', '2016-11-01 09:48:27', '2016-11-01 09:48:27'),
(132, 3, 'AX1RNG6iITv4yj0Tr4pKX5HDC0dNEixa', '2016-11-01 09:54:52', '2016-11-01 09:54:52'),
(133, 3, 'c9wNfuV9FtYXd0WTCfldlOmp0c2TVf5Z', '2016-11-01 09:55:26', '2016-11-01 09:55:26'),
(134, 3, 'nFlNyJ9baS1NU6NskYaiWKWH8j4FbHYy', '2016-11-01 09:57:52', '2016-11-01 09:57:52'),
(135, 3, '9bnfErlpHGCjVlrBfijnnQNndPnyI2yz', '2016-11-01 09:58:33', '2016-11-01 09:58:33'),
(136, 3, '79k6eHFnrHzJfw44bcjTpzdorFWlE8SR', '2016-11-08 09:03:43', '2016-11-08 09:03:43'),
(137, 3, 'E5cZHM3cKY56HYTMhsezMRb2h8AjLn0k', '2016-11-08 09:07:02', '2016-11-08 09:07:02'),
(138, 3, 'm0A0uiqpdGW4LRGAaZACmP2fMyeXgIzJ', '2016-11-08 09:08:03', '2016-11-08 09:08:03'),
(139, 3, 'BgtgyNIKwlVlOok67bXyN86znpqpMfzc', '2016-11-08 09:09:33', '2016-11-08 09:09:33'),
(140, 3, 'XLew3dDAKs4ee8BDSOYaa6MO5UnBKYRK', '2016-11-08 09:24:54', '2016-11-08 09:24:54'),
(141, 6, 'Daylz820gvF5WNMDHONycHABgZwOTdHu', '2016-11-08 09:27:58', '2016-11-08 09:27:58'),
(142, 3, '7EvBDyvIeF7txiJAJbU8eyCCfFLS11C1', '2016-11-09 09:08:05', '2016-11-09 09:08:05'),
(143, 3, 'mEwHp9dQENmEoPv6j2HEOsm2TqvtiC4b', '2016-11-09 09:08:28', '2016-11-09 09:08:28'),
(144, 3, 'wQtG2MVpo24gpzCP8uivruV3269mzPiB', '2016-11-09 09:10:23', '2016-11-09 09:10:23'),
(145, 3, 'L1epWTYNOYLNQ1QlFHLr0WtXiPyxgntz', '2016-11-09 09:10:35', '2016-11-09 09:10:35'),
(146, 3, 'Yq5VTsewyR0v5FsEfHchdYX9Umc8UN0W', '2016-11-09 09:11:04', '2016-11-09 09:11:04'),
(147, 3, 'ZwMwhkvVFXtaDMpZJpSmd64X2B2OXZG6', '2016-11-09 09:11:17', '2016-11-09 09:11:17'),
(148, 3, '8g1Yo9mySGiUikWABmSASsHCHi3F6TgN', '2016-11-09 09:13:14', '2016-11-09 09:13:14'),
(149, 3, 'XmbTtKEGlm2xI3HQUUesX6FIDtbWtN7N', '2016-11-09 09:13:28', '2016-11-09 09:13:28'),
(150, 3, 'KRzQ8EsJQd8Go6fgbns8GfyYjxRCrj0o', '2016-11-09 09:15:19', '2016-11-09 09:15:19'),
(151, 3, 'HM4qYIwzSBHgC43OOzBNmrZ7AoHmrn00', '2016-11-09 09:15:30', '2016-11-09 09:15:30'),
(152, 3, '7UPZKquSaAnwfoR60lPg3xtHVjgrvSTg', '2016-11-09 09:16:19', '2016-11-09 09:16:19'),
(153, 3, 'GtiJGQZ23v8SzLfCp3q6BHIbiN8Qx3fK', '2016-11-09 09:16:31', '2016-11-09 09:16:31'),
(154, 3, 'AxH89DQAPWG1fOSMmjZKWfCKSd97WUlT', '2016-11-09 09:26:44', '2016-11-09 09:26:44'),
(155, 3, 'St1QLGVFRQsR924OJ5Aj18g2ogYYdMRL', '2016-11-09 09:27:00', '2016-11-09 09:27:00'),
(156, 3, '7QH0YQHLcTSsA5mPoHHMymmQy1XdTw7g', '2016-11-09 09:28:31', '2016-11-09 09:28:31'),
(157, 3, 'KuSuKKqgOTClaMCLFquaVkJSYf2tvUBi', '2016-11-09 09:28:42', '2016-11-09 09:28:42'),
(158, 3, 'OHF3cuJToaBHrulA4nX8Ca8dBnF3OdQI', '2016-11-09 09:34:19', '2016-11-09 09:34:19'),
(159, 3, 'eGTghyESxhjelFE6LVieYMOHjA10fKOh', '2016-11-09 09:34:30', '2016-11-09 09:34:30'),
(160, 3, 'HH2ssZVedV3B9uL51nCj7oQuN6iYUJS8', '2016-11-09 09:37:56', '2016-11-09 09:37:56'),
(161, 3, 'YBocoulpsvRYZFrLZlAlrkmwLEem7nZC', '2016-11-09 09:38:11', '2016-11-09 09:38:11'),
(163, 3, 'LpZR8PrwtyGh8rzKXGnPAGIoBVBaAhZN', '2016-11-09 09:59:30', '2016-11-09 09:59:30'),
(164, 3, '0hOE9k6beqcLt0wE4LswjHWPV0p9ADKN', '2016-11-09 09:59:43', '2016-11-09 09:59:43'),
(165, 3, 'pe4e7sDpk1WNxhUCmEiZ8C41sURSuGst', '2016-11-10 07:48:02', '2016-11-10 07:48:02'),
(167, 6, '9bGIQn2Q8rwZS3VhOjhq427bL6PMJHoP', '2016-11-10 07:55:10', '2016-11-10 07:55:10'),
(169, 3, 'HCHTLR2efBSnQDKuTGokAHzDHEwVmH46', '2016-11-10 09:03:00', '2016-11-10 09:03:00'),
(170, 3, 'sxJe1kIaEnHMfkjSd8kkHC3TmwOYirmK', '2016-11-10 09:08:57', '2016-11-10 09:08:57'),
(172, 3, '3bVjM7eyxLcT5RKoHJAVdbggm5BGR93O', '2016-11-10 09:14:21', '2016-11-10 09:14:21'),
(174, 3, 'RLb1ntOWFMOF7evGZaqArjph3h4iWv7Y', '2016-11-10 09:45:07', '2016-11-10 09:45:07'),
(176, 3, 'bHK6uure39cK9hT8I9zv7rlGGUmD7bEI', '2016-11-10 10:05:13', '2016-11-10 10:05:13'),
(178, 3, 'ODuutcCP6PvkxRR8gdj2OFFLjLSdx5fM', '2016-11-10 10:09:40', '2016-11-10 10:09:40'),
(180, 6, 'G1EWBvZWKZLaP6xUvFxxqpirJbTWyp2i', '2016-11-10 10:12:03', '2016-11-10 10:12:03'),
(183, 3, 'M0nkNRpVS2leXZbZpZA54AzBmfsHi9bi', '2016-11-10 10:47:33', '2016-11-10 10:47:33'),
(185, 3, 'KqH1uD2Lz35Nam5H6cWl67qxpXhwURO6', '2016-11-10 11:56:57', '2016-11-10 11:56:57'),
(186, 3, 'D4bs11I7VqBzeQKZK5jnGEU5MDxAG3yj', '2016-11-10 13:20:01', '2016-11-10 13:20:01'),
(187, 3, 'tHDbX9M4osLjDMGrFsJu5d4KhDTDzTNr', '2016-11-12 08:17:57', '2016-11-12 08:17:57'),
(190, 3, 'b2de06ekiUJbhf3CeA6iSInQZI0dX2bT', '2016-11-12 08:34:21', '2016-11-12 08:34:21'),
(191, 3, '51VB9fneAC0KYAV8Xby9uhYQaFFer4se', '2016-11-12 08:34:33', '2016-11-12 08:34:33'),
(192, 3, 'baVPq5G6kWModQZv6idpJilsAmipphiA', '2016-11-12 10:18:05', '2016-11-12 10:18:05'),
(193, 3, 'TD9IswGZPFlBDEuANAkgphMycrMqILYl', '2016-11-12 10:18:36', '2016-11-12 10:18:36'),
(194, 3, 'Pu7k5S5tfZUix9yBNAeDqzYSbrhMXP63', '2016-11-15 08:41:13', '2016-11-15 08:41:13'),
(196, 6, '8B8sUHmXa90rp4rTNf10KrGtysvVLzbs', '2016-11-15 09:30:57', '2016-11-15 09:30:57'),
(198, 3, 'iiRq4FrNTc6nkrq19xlYta9XMrsOUcQ0', '2016-11-15 09:32:33', '2016-11-15 09:32:33'),
(200, 6, 'OlEpBvaK8a5X3l8viKdKYtKctHzkqZGw', '2016-11-15 09:35:36', '2016-11-15 09:35:36'),
(202, 3, 'IZDKioxDlUYTh0kU0qJRTbykIYtzS5kW', '2016-11-15 09:36:31', '2016-11-15 09:36:31'),
(204, 6, 'E6vcdC3v3B8sJ8oKZqXq4tufWFRxC9KJ', '2016-11-15 09:59:41', '2016-11-15 09:59:41'),
(206, 3, 'eiV6yLFDFXlWyttF0aXeMbJp9jlU5eqR', '2016-11-15 10:11:46', '2016-11-15 10:11:46'),
(207, 3, 'IkNqUz4TBYeO84gH74y54LKxAnhHB0Fx', '2016-11-15 10:11:56', '2016-11-15 10:11:56'),
(208, 3, 'Jy9Bfr7Cx75co31IDZZlv3zFyVDS3nHr', '2016-11-16 07:46:43', '2016-11-16 07:46:43'),
(209, 3, 'G3E9baIRH2ruxfRYn5VkOfHciCMxDEDR', '2016-11-16 07:47:14', '2016-11-16 07:47:14');

-- --------------------------------------------------------

--
-- 表的结构 `profile`
--

CREATE TABLE `profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `phone_number`, `address1`, `address2`, `city`, `state`, `zip`, `created_at`, `updated_at`) VALUES
(1, 7, '213-819-1830', '2222 Juliet St.', '', 'Los Angeles', 'CA', '90007', '2016-11-12 09:39:15', '2016-11-12 09:39:15'),
(2, 8, '', '', '', '', 'choose', '', '2016-11-12 09:42:46', '2016-11-12 09:42:46'),
(3, 9, '111-111-1111', '', '', 'Los Angeles', 'N/A', '90007', '2016-11-12 09:46:34', '2016-11-12 09:46:34');

-- --------------------------------------------------------

--
-- 表的结构 `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admins', 'Admins', NULL, '2016-10-28 07:57:20', '2016-10-28 07:57:20'),
(2, 'managers', 'Managers', NULL, '2016-10-28 07:57:20', '2016-10-28 07:57:20'),
(3, 'staff', 'Staff', NULL, '2016-10-28 07:57:20', '2016-10-28 07:57:20'),
(4, 'youths', 'Youths', NULL, '2016-10-28 07:57:20', '2016-10-28 07:57:20');

-- --------------------------------------------------------

--
-- 表的结构 `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2016-10-28 07:58:13', '2016-10-28 07:58:13'),
(2, 1, '2016-10-28 08:00:35', '2016-10-28 08:00:35'),
(3, 1, '2016-10-29 06:38:31', '2016-10-29 06:38:31'),
(4, 1, '2016-10-29 07:28:45', '2016-10-29 07:28:45'),
(5, 1, '2016-11-01 06:54:01', '2016-11-01 06:54:01'),
(6, 2, '2016-11-08 09:27:31', '2016-11-08 09:27:31'),
(7, 3, '2016-11-12 09:39:15', '2016-11-12 09:39:15'),
(8, 4, '2016-11-12 09:42:46', '2016-11-12 09:42:46'),
(9, 3, '2016-11-12 09:46:34', '2016-11-12 09:46:34');

-- --------------------------------------------------------

--
-- 表的结构 `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2016-10-28 08:14:37', '2016-10-28 08:14:37'),
(2, NULL, 'ip', '::1', '2016-10-28 08:14:37', '2016-10-28 08:14:37'),
(3, NULL, 'global', NULL, '2016-10-28 08:16:00', '2016-10-28 08:16:00'),
(4, NULL, 'ip', '::1', '2016-10-28 08:16:00', '2016-10-28 08:16:00'),
(5, NULL, 'global', NULL, '2016-10-28 09:32:54', '2016-10-28 09:32:54'),
(6, NULL, 'ip', '::1', '2016-10-28 09:32:54', '2016-10-28 09:32:54'),
(7, 2, 'user', NULL, '2016-10-28 09:32:54', '2016-10-28 09:32:54'),
(8, NULL, 'global', NULL, '2016-10-29 09:31:29', '2016-10-29 09:31:29'),
(9, NULL, 'ip', '::1', '2016-10-29 09:31:29', '2016-10-29 09:31:29'),
(10, 3, 'user', NULL, '2016-10-29 09:31:29', '2016-10-29 09:31:29'),
(11, NULL, 'global', NULL, '2016-11-01 08:28:50', '2016-11-01 08:28:50'),
(12, NULL, 'ip', '::1', '2016-11-01 08:28:50', '2016-11-01 08:28:50'),
(13, NULL, 'global', NULL, '2016-11-01 08:29:35', '2016-11-01 08:29:35'),
(14, NULL, 'ip', '::1', '2016-11-01 08:29:35', '2016-11-01 08:29:35'),
(15, NULL, 'global', NULL, '2016-11-01 08:34:40', '2016-11-01 08:34:40'),
(16, NULL, 'ip', '::1', '2016-11-01 08:34:40', '2016-11-01 08:34:40'),
(17, NULL, 'global', NULL, '2016-11-01 08:35:00', '2016-11-01 08:35:00'),
(18, NULL, 'ip', '::1', '2016-11-01 08:35:00', '2016-11-01 08:35:00'),
(19, NULL, 'global', NULL, '2016-11-01 08:41:39', '2016-11-01 08:41:39'),
(20, NULL, 'ip', '::1', '2016-11-01 08:41:39', '2016-11-01 08:41:39'),
(21, NULL, 'global', NULL, '2016-11-01 08:44:37', '2016-11-01 08:44:37'),
(22, NULL, 'ip', '::1', '2016-11-01 08:44:37', '2016-11-01 08:44:37'),
(23, NULL, 'global', NULL, '2016-11-01 08:45:02', '2016-11-01 08:45:02'),
(24, NULL, 'ip', '::1', '2016-11-01 08:45:02', '2016-11-01 08:45:02'),
(25, NULL, 'global', NULL, '2016-11-01 08:50:35', '2016-11-01 08:50:35'),
(26, NULL, 'ip', '::1', '2016-11-01 08:50:35', '2016-11-01 08:50:35'),
(27, NULL, 'global', NULL, '2016-11-01 08:51:25', '2016-11-01 08:51:25'),
(28, NULL, 'ip', '::1', '2016-11-01 08:51:25', '2016-11-01 08:51:25'),
(29, NULL, 'global', NULL, '2016-11-01 08:51:44', '2016-11-01 08:51:44'),
(30, NULL, 'ip', '::1', '2016-11-01 08:51:44', '2016-11-01 08:51:44');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(2, '111@111.com', '$2y$10$6orYmt0IYqAAjn.ZuNNazuIaMPJo/DnGBoF5p6YmH4xylYvLH.dzS', NULL, '2016-11-01 08:49:02', '111', '111', '2016-10-28 08:00:35', '2016-11-01 08:49:02'),
(3, 'zhan324@usc.edu', '$2y$10$KdYw3v6zG7SEH4/5hHOBR.nl9b.7SUhOtmDCZ3MJ.04RnGMzp8x06', NULL, '2016-11-16 07:47:14', 'Cheng', 'Zhang', '2016-10-29 06:38:31', '2016-11-16 07:47:14'),
(4, '1324690304@qq.com', '$2y$10$T5Ji.f9/cGXoeftaR71.iOgyMTlney.O7qgGRRGO1zZvaM9ahySnG', NULL, '2016-10-29 07:28:55', 'Cheng', 'Zhang', '2016-10-29 07:28:45', '2016-10-29 07:28:55'),
(5, 'brandon013188@gmail.com', '$2y$10$bc/30Cyj88zIW8Ipxnmk0O7dSwFM.ChCgIQQOJnVyhiB34i5Kl9Ce', NULL, '2016-11-01 06:55:14', 'Guancheng', 'Li', '2016-11-01 06:54:01', '2016-11-01 06:55:14'),
(6, 'qingwei@usc.edu', '$2y$10$WVtA5su64VhOGI6Vq7f.O.zlWA0./sXrzoeA7c1dJicS9Mj/xXwbe', NULL, '2016-11-15 09:59:53', 'Qing', 'Wei', '2016-11-08 09:27:31', '2016-11-15 09:59:53'),
(7, '222@222.com', '$2y$10$1aVZOTMMWcoknI77ng9/Ue2oSSjwJQuyd75odIYe7UOD6ud9lwjCG', NULL, NULL, '222', '222', '2016-11-12 09:39:15', '2016-11-12 09:39:15'),
(8, '333@333.com', '$2y$10$bXksJJAFKewciP9wkulo7O01mMpZqRRSuM9hhFRFwBkqAfip5oORm', NULL, NULL, '333', '333', '2016-11-12 09:42:46', '2016-11-12 09:42:46'),
(9, '444@444.com', '$2y$10$jHBZERNC1aTsX6nq1hhJ6eFgQNaXtmBZa2GKpZoA2rjJUdQtwqd2G', NULL, NULL, '444', '444', '2016-11-12 09:46:34', '2016-11-12 09:46:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `code`
--
ALTER TABLE `code`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;
--
-- 使用表AUTO_INCREMENT `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
